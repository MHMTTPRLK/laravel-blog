@extends('front.layouts.master') {{-- Master page tum iskeletin birleştiği ve tanımlamların yapıldıgı yer--}}
@section('title','Anasyfa') {{-- Title adı verildi--}}
@section('content') {{-- Master page belirledğimiz content yanı yield('content')
yaparak diger sayflara conten içine alıp mater page eklenti yapıyourz.--}}

        <div class="col-md-9 mx-auto">
            @include('front.widgets.articleList')
        </div>

@include('front.widgets.categoryWidget')


@endsection
