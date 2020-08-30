<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\Article;
use CategorySeeder;

class CategoryController extends Controller
{
   public  function index()
   {

       $categories=Category::all();

       return view('back.category.index',compact('categories'));
   }
   public  function create(Request $request)
   {
       $isExit=Category::whereSlug(str::slug($request->category_name))->first();
       if($isExit)
       {
           toastError($request->category_name. ' adında bir kategori zaten mevcut!');
           return  redirect()->back();
       }
       $category=new Category();
       $category->name=$request->category_name;
       $category->slug=str::slug($request->category_name);
       $category->save();
       toastSuccess('Kategori Başarıyla Oluşturuludu.');
       return redirect()->back();
       /*  Category::insert([
            'name'=>"deneme",
             'slug'=>"denemee",
       vb.

         ]);*/
   }
   public  function update(Request $request)
   {
       $isSlug=Category::whereSlug(str::slug($request->slug))->first();
       $isName=Category::whereName(($request->category))->first();
       if($isSlug or $isName)
       {
           toastError($request->category_name. ' adında bir kategori zaten mevcut!');
           return  redirect()->back();
       }
       $category=Category::find($request->id);
       $category->name=$request->category_name;
       $category->slug=str::slug($request->category_slug);
       $category->save();
       toastSuccess('Kategori Başarıyla Güncellendi.');
       return redirect()->back();
       /*  Category::insert([
            'name'=>"deneme",
             'slug'=>"denemee",
       vb.

         ]);*/
   }
   public  function delete(Request $request)
   {
       $category=Category::findOrFail($request->id);
       if($category->id==1)
       {
           toastError('Bu Kategori Silinemez.');
           return redirect()->back();
       }
       $count=$category->articleCount();
       $message='';
       if($count>0)
       {
           Article::where('category_id',$category->id)->update(['category_id'=>1]);
           $defaultCategory=Category::find(1);
       $message='Bu Kategoriye Ait '. $count .' makale '. $defaultCategory->name . ' Kategorisine Taşındı.';

       }
       $category->delete();
       toastSuccess('Başarıyla Silindi. ',$message);

       return redirect()->back();

   }

   // Aktif Pasif Durumu Ajax İle
   public  function switch(Request $request)
   {
       $category=Category::findOrFail($request->id);
       $category->status=$request->statu=='true' ? 1 : 0;
       $category->save();;
   }
    // Güncelleme İşlemi Ajax İle
   public  function getData(Request $request)
   {
       $category=Category::findOrFail($request->id);
     return response()->json($category);
   }


}
