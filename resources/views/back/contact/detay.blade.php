@extends('back.layouts.master')
@section('title','Mesaj Detayı')
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary float-right">
                <a href="{{route('admin.iletisim.index')}}"  class="btn btn-success btn-sm float-right" ><i class="fa fa-check">  Tüm Mesajlar</i></a>

            </h6>

        </div>
        <div class="card-body">
            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach

                </div>
            @endif
            <form>

            @csrf
            <!-- Mesaj Name-->
                <div class="form-group">
                    <label>Gönderen Ad Soyad</label>

                    <input type="text" name="title" class="form-control"  value="{{$mesajlar->name}}" READONLY/>
                </div>
                <!-- Mesaj Email-->
                <div class="form-group">
                    <label>Gönderen Email</label>
                    <input type="text" name="title" class="form-control"  value="{{$mesajlar->email}}" READONLY/>
                </div>
                <!-- Mesaj Konu-->
                <div class="form-group">
                    <label> Mesaj Konu</label> <br>

                    <input type="text" name="title" class="form-control"  value="{{$mesajlar->topic}}" READONLY/>
                </div>
                <!-- Mesaj İçeriği-->
                <div class="form-group">
                    <label>Mesaj İçeriği</label>
                    <textarea  style="height: 150px" class="form-control" readonly >{{$mesajlar->message}}</textarea>

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




