@extends('back.layouts.master')
@section('title','Tüm Mesajlar')
@section('content')

    <div class="row  ">

        <div class="col-md-8"
>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary float-left"><strong>{{$mesajlar->count()}} Mesaj Mevcut</strong>
                    </h6>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Gönderen</th>
                                <th>Gönderen Email</th>
                                <th>Konu</th>
                                <th>Mesaj</th>
                                <th>Tarih</th>

                            </tr>
                            </thead>

                            <tbody>
                            @foreach($mesajlar as  $mesaj)
                                <tr>

                                    <td>{{$mesaj->name}}</td>
                                    <td>{{$mesaj->email}}</td>
                                    <td>
                                        {{$mesaj->topic}}
                                    </td><td>
                                        {{substr($mesaj->message,1,25)}}
                                    </td>
                                    <td>
                                        <a href="{{route('admin.iletisim.goster',$mesaj->id)}}" title="Mesaj Görüntüle" class="btn btn-sm btn-info edit-click"><i class="fa fa-eye  text-white"></i></a>
                                        <a  href="{{route('admin.iletisim.sil',$mesaj->id)}}" title="Mesaj Sil" class="btn btn-sm btn-danger remove-click"><i class="fa fa-times  text-white"></i></a>
                                    </td>
                                </tr>
                            @endforeach



                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection
@section('css')
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@endsection
@section('js')


@endsection

