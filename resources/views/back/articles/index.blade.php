@extends('back.layouts.master')
@section('title','Tüm Makaleler')
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary float-left"><strong>{{$articles->count()}} Makale Mevcut</strong>
            </h6>
            <h6 class="m-0 font-weight-bold text-primary float-right">
                <a href="{{route('admin.trashed.article')}}"  class="btn btn-warning btn-sm float-right" ><i class="fa fa-trash">  Silinen Makaleler</i></a>

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
                        <th> Durum</th>
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
                            <input class="switch"  article_id="{{$article->id}}" width="100px" type="checkbox" data-on="Aktif" data-off="Pasif" data-toggle="toggle" data-onstyle="success" data-offstyle="danger" @if($article->status==1) checked @endif>
                         </td>
                        <td>
                            <a href="{{route('single',[$article->get_Category->slug,$article->slug])}}"  target="_blank" title="Görüntüle" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                            <a href="{{route('admin.makaleler.edit',$article->id)}}" title="Düzenle" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></a>
                            <a href="{{route('admin.delete.article',$article->id)}}" title="Sil"   class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
                            <!--  resources controller 1.yontemi boyle.
                             <form method="post" action="{{route('admin.makaleler.destroy',$article->id)}}">
                                    @csrf
                                @method('DELETE')
                                <button title="Sil"  type="submit" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button>
                            </form>
                            -->
                        </td>
                    </tr>
                    @endforeach



                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('css')
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@endsection
@section('js')
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script>
        $(function() {
            $('.switch').change(function() {
            id= $(this)[0].getAttribute('article_id');
             statu=$(this).prop('checked');
             alert('Durum Değişti');
                $.get("{{route('admin.switch')}}", {id:id,statu:statu},function(data, status){
                   console.log(data);
                });
            })
        })
    </script>
@endsection
