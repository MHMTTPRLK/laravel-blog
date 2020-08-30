<?php

use Illuminate\Support\Facades\Route;

/* Bakim Route */
Route::get('site-bakimda',function (){
    return view('front.layouts.bakim');
});

/* |--------------------------------------------------------------------------
|Admin Routes
|--------------------------------------------------------------------------
 */
Route::prefix('admin')->name('admin.')->middleware('isLogin')->group(function (){
    Route::get('giris','back\AuthController@login')->name('login');
    Route::post('giris','back\AuthController@login_post')->name('login.post');

});

Route::prefix('admin')->name('admin.')->middleware('isAdmin')->group(function (){
    Route::get('panel','back\Dashboard@index')->name('dashboard');
                        /* *********Makale Route************* */
    //soft delete yapısı ile silinenleri göstermek için çöp kutusu
    Route::get('makaleler/silinenler','Back\ArticleController@trashed')->name('trashed.article');
    Route::resource('makaleler','Back\ArticleController'); // resouce için yaptık.
    //Route::get('makaleler','Back\ArticleController@create')->name('olustur'); // böyle ayrı ayrı yapmak yerine resource kullanırız.
    //makale durumunu değiştirmek için
    Route::get('/switch','Back\ArticleController@switch')->name('switch');
   //Makaleyi soft delete yapısı ile silmek için
   Route::get('/deletearticle/{id}','Back\ArticleController@delete')->name('delete.article');
   // Silineni Sİlmek İçin Hard Delete
   Route::get('/harddeleteartcile/{id}','Back\ArticleController@hardDelete')->name('hard.delete.article');
   // soft delete yapısı ile silinenleri geri getirmek için
   Route::get('/recoverarticle/{id}','Back\ArticleController@recover')->name('recover.article');
                     /* **********Category Route***************** */
    Route::get('/kategoriler','Back\CategoryController@index')->name('category.index');
    Route::post('/kategoriler/create','Back\CategoryController@create')->name('category.create');
    Route::post('/kategoriler/update','Back\CategoryController@update')->name('category.update');
    Route::post('/kategoriler/delete','Back\CategoryController@delete')->name('category.delete');
    Route::get('/kategori/status','Back\CategoryController@switch')->name('category.switch');
//ajax kullanarak kategori guncellenmesi
    Route::get('/kategori/getData','Back\CategoryController@getData')->name('category.getdata');
                        /* ************Page Route*********** */
    Route::get('/sayfalar','Back\PageController@index')->name('page.index');
    Route::get('/sayfa/status','Back\PageController@switch')->name('page.switch');
    Route::get('/sayfalar/olustur','Back\PageController@create')->name('page.create');
    Route::post('/sayfalar/olustur','Back\PageController@sayfaOlustur')->name('page.sayfaOlustur');
    Route::get('/sayfalar/guncelle/{id}','Back\PageController@update')->name('page.edit');
    Route::post('/sayfalar/guncelle/{id}','Back\PageController@updatePost')->name('page.edit.post');
    Route::get('/sayfa/sil/{id}','Back\PageController@delete')->name('page.delete');
    Route::get('/sayfa/siralama','Back\PageController@orders')->name('page.orders');
                        /* **********Contact Route***************** */
    Route::get('/mailler','Back\IletisimController@index')->name('iletisim.index');
    Route::get('/mailGoster/{id}','Back\IletisimController@goster')->name('iletisim.goster');
    Route::get('/mailSil/{id}','Back\IletisimController@delete')->name('iletisim.sil');
                         /* **********Ayarlar Route***************** */
    Route::get('/ayarlar','Back\ConfigController@index')->name('config.index');
    Route::post('/ayarlar/update','Back\ConfigController@update')->name('config.update');
    Route::get('cikis','back\AuthController@logout')->name('logout');
});







/*
|--------------------------------------------------------------------------
|Web Routes
|--------------------------------------------------------------------------
*/
/* anasayfa*/
Route::get('/','Front\Homepage@index')->name('homepage');
/* iletisim*/
Route::get('/iletisim','Front\Homepage@contact')->name('contact');
Route::post('/iletisim','Front\Homepage@contact_post')->name('contact.post');
/*  anasayfa paginate */
Route::get('sayfa','Front\Homepage@index');
/* kategori ait yazılar*/
Route::get('/kategori/{category}','Front\Homepage@category')->name('category');
/*yazının kategorisi / adı şeklinde*/
Route::get('/{category}/{slug}','Front\Homepage@single')->name('single');
/* sayfalar anasaya ,iletisim vs. */
Route::get('/{sayfa}','Front\Homepage@page')->name('page');




