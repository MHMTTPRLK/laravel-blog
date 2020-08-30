<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Article;
use App\Models\Page;
use App\Models\Category;

use Illuminate\Http\Request;

class Dashboard extends Controller
{
  public  function index()
  {
      $article=Article::all()->count();
      $hit=Article::sum('hit');;
      $page=Page::all()->count();
      $category=Category::all()->count();
      return view('back.dashboard',compact('article','category','page','hit'));
  }
}
