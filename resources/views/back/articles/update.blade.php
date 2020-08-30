@extends('back.layouts.master')
@section('title',$article->title)
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
            <form method="post" action="{{route('admin.makaleler.update',$article->id)}}" enctype="multipart/form-data">
            @method('PUT')  <!--Güncelleme işleminde route için methodu belirledik.-->
            @csrf
            <!-- admin.makaleler.store yapma amacımız resource da böyle default tanımlanabiliyor.-->
                <!-- Makale Başlığı-->
                <div class="form-group">
                    <label>Makale Başlığı</label>

                    <input type="text" name="title" class="form-control"  value="{{$article->title}}" required/>
                </div>
                <!-- Makale Kategori-->
                <div class="form-group">
                    <label>Makale Kategori</label>
                    <select class="form-control" name="category" required>
                        <option  value="">Seçim Yapınız</option>
                        @foreach($categories as $category)
                            <option @if($article->category_id==$category->id) selected @endif value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach

                    </select>
                </div>
                <!-- Makale Fotografı-->
                <div class="form-group">
                    <label>Makale Fotografı</label> <br>
                    <img src="{{asset($article->image)}}" class="img-thumbnail" width="300"/>

                    <input type="file" name="image" class="form-control"/>
                </div>
                <!-- Makale İçeriği-->
                <div class="form-group">
                    <label>Makale İçeriği</label>
                    <textarea name="editor" class="form-control" >{{$article->title}}</textarea>

                </div>
                <!-- Makale Button-->
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Makaleyi Güncelle</button>
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



