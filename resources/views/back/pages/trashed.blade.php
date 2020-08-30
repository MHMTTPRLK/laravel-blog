@extends('back.layouts.master')
@section('title','Silinen Makaleler')
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary float-left"><strong>{{$articles->count()}} Makale Mevcut</strong>
            </h6>
            <h6 class="m-0 font-weight-bold text-primary float-right">
                <a href="{{route('admin.makaleler.index')}}"  class="btn btn-success btn-sm float-right" ><i class="fa fa-check">  Aktif Makaleler</i></a>

            </h6>


        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Fotograf</th>
                        <th>Makale Başlığı</th>
                        <th>Kategori</th>
                        <th>Görüntülenme Sayısı</th>
                        <th>Oluşturma Tarihi</th>
                        <th>İşlemler</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($articles as $article)
                        <tr>
                            <td>
                                <img src="{{asset($article->image)}} " width="200px">
                            </td>
                            <td>{{$article->title}}</td>
                            <td>{{$article->get_Category->name}}</td>
                            <td>{{$article->hit}}</td>
                            <td>{{$article->created_at->diffForHumans()}}</td>

                            <td>
                                <a href="{{route('admin.recover.article',$article->id)}}"  title="Geri Al" class="btn btn-sm btn-success"><i class="fa fa-recycle"></i></a>
                                <a href="{{route('admin.hard.delete.article',$article->id)}}" title="Sil"   class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>

                            </td>
                        </tr>
                    @endforeach



                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

