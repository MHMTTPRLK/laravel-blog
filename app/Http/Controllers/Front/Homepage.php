<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Config;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Article;
use App\Models\Page;
use App\Models\Contact;
use Validator;
use Illuminate\Support\Facades\Mail;


class Homepage extends Controller
{
    public function  __construct()
    {
        if(Config::find(1)->active==0)
        {
            return redirect()->to('site-bakimda')->send();
        }
        view()->share('pages',Page::where('status',1)->orderBy('order','ASC')->get());// kod tekrarından kurtulmak için tanımladık.
                            //  1.Kısım paylaşmak istediğimiz değişken adı, 2.kısım değişiken kendisi
        view()->share('categories',Category::where('status',1)->limit(8)->get());

    }

    public function index()
    {
        //$data['articles']=Article::orderBy('created_at','Desc')->get();
        $data['articles']=Article::With('get_Category')->where('status',1)
            ->whereHas('get_Category',function($query){
                $query->where('status',1);

    })->orderBy('created_at','Desc')->paginate(10);// sayfalandırma  her sayfada 2 yazı gorukecek
        $data['articles']->withPath(url('sayfa'));// paginate url duzelttik.
     // $data['categories']=Category::limit(6)->get();share tanımlandı tanımlamaya gerek yok
      //$data['pages']=Page::orderBy('order','ASC')->get(); share tanımlandı tanımlamaya gerek yok

        return view('front.homepage',$data);
    }
    public function single($category,$slug)
    {
       $category= Category::whereSlug($category)->first() ?? abort(403,'Böyle Bir Kategori Bulunamadı');
        $article=Article::whereSlug($slug)->whereCategoryId($category->id)->first()  ?? abort(403,'Böyle Bir Yazı Bulunamadı');
        $article->increment('hit'); // izlenme sayısı
        $data['articles']=$article;


     $data['categories']=Category::limit(8)->get();
        return view('front.single',$data);
    }
    public function category($slug)
    {       $category= Category::whereSlug($slug)->first() ?? abort(403,'Böyle Bir Kategori Bulunamadı');

    $data['category']=$category;
  //  $data['articles']=Article::Where('category_id',$category->id)->orderBy('created_at','Desc')->get();
 $data['articles']=Article::Where('category_id',$category->id)->where('status',1)->orderBy('created_at','Desc')->paginate(1);//sayfalama yaptık her sayfada 1 yazı olcak.
        // $data['categories']=Category::limit(6)->get();share tanımlandı tanımlamaya gerek yok

        return view('front.category',$data);
    }
    public function  page($slug)
    {
       $page=Page::whereSlug($slug)->first() ?? abort(403,'Böyle Bir Sayfa Bulunamadı....');
       $data['page']=$page;
        // $data['categories']=Category::limit(6)->get();share tanımlandı tanımlamaya gerek yok
        //$data['pages']=Page::orderBy('order','ASC')->get(); share tanımlad tanımlamaya gerek yok // menu listelemek ve blade gitmek için tanımladık.

      return view('front.page',$data);
    }
    public function contact()
    {
        return view('front.contact');
    }
   public function contact_post(Request $request)
    {
        $rules=[
            'adsoyad'=>'required|min:5',
            'email'=>'required|email',
            'topic'=>'required',
            'mesaj'=>'required|min:10',

        ];
        $validate=Validator::make($request->post(),$rules);
        if($validate->fails())
        {
           return redirect()->route('contact')->withErrors($validate)->withInput();
            die();
        }
        Mail::send([],[],function ($message)use($request){
            $message->from('iletisim@blogsitesi.com','Blog Sitesi');
            $message->to('mhmttparlak@gmail.com');
            $message->setBody('Mesajı Gönderen:'.$request->adsoyad.'<br>
                        Mesajı Gönderen Mail:'.$request->email.'<br/>
                        Mesaj Konusu:'.$request->topic.'<br/>
                        Mesaj:'.$request->mesaj.'<br/><br/>
                        Mesaj Gönderilme Tarihi:'.now().'','text/html');
            $message->subject($request->name.'iletişimden mesaj gönderdi!');
        });
        $contact=new Contact(); // insert ile aynı
        $contact->name=$request->adsoyad;
        $contact->email=$request->email;
        $contact->topic=$request->topic;
        $contact->message=$request->mesaj;
        $contact->save();


      /*  Contact::insert([
           'name'=>"Esra Nur",
            'email'=>"mhmtprlak@gmail.com",
            'topic'=>'Genel',
            'message'=>'sdmassdofhosdfsd',
        ]);*/




        return redirect()->route('contact')->with('success','İletişim Mesajınız bize İletildi.');
     // print_r($request->post());// tum gelen dataları görmek için yazdık.

    }
}
