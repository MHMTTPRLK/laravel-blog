<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use App\Models\Page;
use Illuminate\Support\Str;

class PageController extends Controller
{

    public  function index()
    {
        $pages=Page::orderBy('order','asc')->get();
        return view('back.pages.index',compact('pages'));
    }
    public function orders(Request $request)
    {

        foreach ($request->get('page') as $key=>$order)
        {
            Page::where('id',$order)->update(['order'=>$key]);
        }
    }
    public function switch(Request $request)
    {
        // return $request->id;
        $page=Page::findOrFail($request->id);
        $page->status=$request->statu=='true' ? 1 : 0;
        $page->save();
    }
    public function create()
    {
        return view('back.pages.create');
    }
    public function sayfaOlustur(Request $request)
    {
        $request->validate([
            'title'=>'min:3',
            'image'=>'required|image|mimes:jpeg,png,jpg|max:2048',

        ]);
        $sonSira=Page::orderBy('order','desc')->first();
        $page=new Page(); //Yeni veri Eklemek İçin kullanılır ::insert ile aynı.
        $page->title=$request->title;
        $page->content=$request->editor;
        $page->status=$request->durum;
        $page->order=$sonSira->order+1;
        $page->slug=Str::slug($request->title);

        if($request->hasFile('image'))
        {
            $imageName=Str::slug($request->title).'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads'),$imageName);
            $page->image='uploads/'.$imageName;
            $page->save();
            toastr()->success( 'Sayfa Başarıyla Eklendi');
            return redirect()->route('admin.page.index');
        }


        /*  Page::insert([
             'title'=>"deneme",
              'order'=>"2",
        vb.

          ]);*/
    }

    public function update($id)
    {    $page=Page::findOrFail($id);

        return view('back.pages.update',compact('page'));
    }
    public function updatePost(Request $request, $id)
    {

        $request->validate([
            'title'=>'min:3',
            'image'=>'image|mimes:jpeg,png,jpg|max:2048',

        ]);
        $page= Page::findOrFail($id); //Yeni veri Eklemek İçin kullanılır ::insert ile aynı.
        $page->title=$request->title;
        $page->content=$request->editor;
        $page->slug=Str::slug($request->title);

        if($request->hasFile('image'))
        {
            $randomSayi=rand(1,100);
            $imageName=Str::slug($request->title).'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads'),$imageName.$randomSayi);
            $page->image='uploads/'.$imageName.$randomSayi;

        }
        $page->save();
        toastr()->success('Başarılı', 'Sayfa Başarıyla Güncellendi');
        return redirect()->route('admin.page.index');

        /*  Page::insert([
             'title'=>"deneme",
              'category_id'=>"2",
        vb.

          ]);*/

    }

    public function delete($id)
    {
        $page=Page::findOrFail($id)->delete();
        toastr()->success('Sayfa Başarılı Şekilde Silindi');
        return redirect()->route('admin.page.index');
    }
}
