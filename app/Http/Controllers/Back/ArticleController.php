<?php

namespace App\Http\Controllers\Back;

use App\Exceptions\Handler;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\Array_;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


class ArticleController extends Controller
{

    public function index()
    {
        $articles=Article::orderBy('created_at','ASC')->get();
        return view('back.articles.index',compact('articles')); // boylede gonderilebilir.
    }

    public function create()
    {
        // urlde create yerine olustur yazmasını Providers/AppServiceProvide.php bulunan boot fonksiyonunda komut yazarak duzeltildi.
            //kullanıcının oluşturcagı göstereceği view yani
        $categories=Category::all();
        return view('back.articles.create',compact('categories'));
    }


    public function store(Request $request)
    {  // form dan post ile gelenleri kullanacaz.
         // dd($request->post());


        $request->validate([
           'title'=>'min:3',
            'image'=>'required|image|mimes:jpeg,png,jpg|max:2048',

        ]);
        $article=new Article(); //Yeni veri Eklemek İçin kullanılır ::insert ile aynı.
        $article->title=$request->title;
        $article->category_id=$request->category;
        $article->content=$request->editor;
        $article->status=$request->durum;
        $article->slug=Str::slug($request->title);

      if($request->hasFile('image'))
        {
            $imageName=Str::slug($request->title).'.'.$request->image->getClientOriginalExtension();
           $request->image->move(public_path('uploads'),$imageName);
           $article->image='uploads/'.$imageName;
            $article->save();
            toastr()->success('Başarılı', 'Makale Başarıyla Eklendi');
            return redirect()->route('admin.makaleler.index');
        }


        /*  Article::insert([
             'title'=>"deneme",
              'category_id'=>"2",
        vb.

          ]);*/
    }


    public function show($id)
    {
        return  $id;
    }


    public function edit($id)
    {
        //guncelleme işlemi burda olcak.
        $article=Article::findOrFail($id);



        $categories=Category::all();
        return view('back.articles.update',compact('categories','article'));

    }


    public function update(Request $request, $id)
    {

        $request->validate([
            'title'=>'min:3',
            'image'=>'image|mimes:jpeg,png,jpg|max:2048',

        ]);
        $article= Article::findOrFail($id); //Yeni veri Eklemek İçin kullanılır ::insert ile aynı.
        $article->title=$request->title;
        $article->category_id=$request->category;
        $article->content=$request->editor;
        $article->slug=Str::slug($request->title);

      if($request->hasFile('image'))
        {
            $randomSayi=rand(1,100);
            $imageName=Str::slug($request->title).'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads'),$imageName.$randomSayi);
            $article->image='uploads/'.$imageName.$randomSayi;

        }
        $article->save();
        toastr()->success('Başarılı', 'Makale Başarıyla Güncellendi');
        return redirect()->route('admin.makaleler.index');

        /*  Article::insert([
             'title'=>"deneme",
              'category_id'=>"2",
        vb.

          ]);*/

    }

    public function switch(Request $request)
    {
       // return $request->id;
       $article=Article::findOrFail($request->id);
       $article->status=$request->statu=='true' ? 1 : 0;
       $article->save();
    }
    //soft delete ile silindi
    public function delete($id)
    {
        $article=Article::findOrFail($id)->delete();
        toastr()->success('Makale Başarılı Şekilde Silinen Makalelere Taşındı');
        return redirect()->route('admin.makaleler.index');

    }
// silinenleri soft delete yapısı ile oldugu için sildik silinenleri bize gösteriyor.
    public function trashed()
    {
       $articles=Article::onlyTrashed()->orderBy('deleted_at','desc')->get();
       return view('back.articles.trashed',compact('articles'));
    }

    public function recover($id)
    {
        Article::onlyTrashed()->find($id)->restore();
        toastr()->success('Makale Başarılı Şekilde Geri Alındı.');
        return redirect()->back();
    }

    //soft delete ile  hard silindi
    public function hardDelete($id)
    {

        $article=Article::onlyTrashed()->find($id);
       if(File::exists($article->image))
       {
           File::delete(public_path($article->image));

       }

        $article->forceDelete();
        toastr()->success('Makale Başarılı Şekilde Silindi');
        return redirect()->route('admin.makaleler.index');

    }
    public function destroy($id)
    {
       // ilgili sil bututonun form yapısı ilede gönderebilir ama biz normal funk.yazarak yapacaz.


    }
}
