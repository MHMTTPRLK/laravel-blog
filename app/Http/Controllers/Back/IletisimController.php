<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Contact;
use Illuminate\Http\Request;

class IletisimController extends Controller
{
    public  function index()
    {
        $categories=Category::all();
        $mesajlar= Contact::all();

       // return view('back.contact.index',compact('categories'));

        return view('back.contact.index',compact('mesajlar'));
    }
    public function goster($id)
    {
        $mesajlar=Contact::findOrFail($id);

        return view('back.contact.detay',compact('mesajlar'));
    }
    public function delete($id)
    {
        $mesajlar=Contact::findOrFail($id)->delete();
        toastr()->success('Mesaj Başarılı Şekilde Silindi');
        return redirect()->route('admin.iletisim.index');
    }

}
