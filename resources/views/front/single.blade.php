@extends('front.layouts.master') {{-- Master page tum iskeletin birleştiği ve tanımlamların yapıldıgı yer--}}
@section('title',$articles->title) {{-- Title adı verildi--}}
@section('bg',url($articles->image))
@section('content') {{-- Master page belirledğimiz content yanı yield('content')
yaparak diger sayflara conten içine alıp mater page eklenti yapıyourz.--}}



<!-- Post Content -->
<article>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-9 mx-auto">
                <h2>{{$articles->title}}</h2>
               {!!$articles->content!!}
                <br>
                <span class=" float-right" ><i class="fas fa-book-reader"><b>{{$articles->hit}}</b></i></span>
            </div>


@include('front.widgets.categoryWidget')


@endsection
