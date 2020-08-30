@extends('front.layouts.master') {{-- Master page tum iskeletin birleştiği ve tanımlamların yapıldıgı yer--}}
@section('title',$page->title) {{-- Title adı verildi--}}
@section('bg',$page->image)
@section('content') {{-- Master page belirledğimiz content yanı yield('content')
yaparak diger sayflara conten içine alıp mater page eklenti yapıyourz.--}}


<!-- Main Content -->
<article>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                {{$page->content}}
            </div>





@endsection
