@extends('back.layouts.master')
@section('title',$page->title.'sayfasını Güncelle')
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">

        </div>
        <div class="card-body">
            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach

                </div>
            @endif
            <form method="post" action="{{route('admin.page.edit.post',$page->id)}}" enctype="multipart/form-data">

            @csrf

                <!-- Sayfa Başlığı-->
                <div class="form-group">
                    <label>Sayfa Başlığı</label>

                    <input type="text" name="title" class="form-control"  value="{{$page->title}}" required/>
                </div>

                <!-- Sayfa Fotografı-->
                <div class="form-group">
                    <label>Makale Fotografı</label> <br>
                    <img src="{{asset($page->image)}}" class="img-thumbnail" width="300"/>

                    <input type="file" name="image" class="form-control"/>
                </div>
                <!-- Sayfa İçeriği-->
                <div class="form-group">
                    <label>Makale İçeriği</label>
                    <textarea name="editor" class="form-control" >{{$page->title}}</textarea>

                </div>
                <!-- Sayfa Button-->
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Sayfayı Güncelle</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('js')
    <!-- Ckeditor-->
    <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'editor' );
    </script>
@endsection



