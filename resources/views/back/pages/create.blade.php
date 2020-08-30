@extends('back.layouts.master')
@section('title','Page Oluştur')
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
            <form method="post" action="{{route('admin.page.sayfaOlustur')}}" enctype="multipart/form-data">
                @csrf
                <!-- admin.Pageler.store yapma amacımız resource da böyle default tanımlanabiliyor.-->
                <!-- Page Başlığı-->
                <div class="form-group">
                    <label>Sayfa Başlığı</label>
                    <input type="text" name="title" class="form-control" required/>
                </div>

                <!-- Page Fotografı-->
                <div class="form-group">
                    <label>Sayfa Fotografı</label>
                    <input type="file" name="image" class="form-control" required/>
                </div>
                    <!-- Page Durum-->
                    <div class="form-group">
                        <label>Sayfa Durum</label>
                        <select class="form-control" name="durum" required>
                            <option value="">Seçim Yapınız</option>
                            <option value="0">Pasif</option>
                            <option value="1">Aktif</option>

                        </select>

                    </div>
                <!-- Page İçeriği-->
                <div class="form-group">
                    <label>Sayfa İçeriği</label>
                    <textarea name="editor" class="form-control" ></textarea>

                </div>
                <!-- Page Button-->
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block"> Sayfayı Oluştur</button>
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
    <script>

    </script>

@endsection

