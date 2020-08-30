@extends('back.layouts.master')
@section('title','Tüm Sayfalar')
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary float-left"><strong>{{$pages->count()}} Sayfa Mevcut</strong>
            </h6>
            <h6 class="m-0 font-weight-bold text-primary float-right">


            </h6>

        </div>
        <div class="card-body">
            <div id="orderSuccess" style="display: none" class="alert alert-success">
                Sıralama Başarıyla Güncellendi.
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" id="myTable">
                    <thead>
                    <tr>
                        <th>Sıralama</th>
                        <th>Fotograf</th>
                        <th>Sayfa Title</th>
                        <th> Durum</th>
                        <th>İşlemler</th>
                    </tr>
                    </thead>

                    <tbody id="orders">
                    @foreach($pages as $page)
                    <tr id="page_{{$page->id}}">
                        <td  class="text-center" style="width: 5px !important; ">
                            <i class="fa fa-arrows-alt-v handle fa-2x" style="cursor: move">{{$page->order}}</i>
                        </td>
                        <td>
                            <img src="{{asset($page->image)}} " width="200px">
                        </td>
                        <td>{{$page->title}}</td>
                        <td>
                            <input class="switch"  page-id="{{$page->id}}" width="100px" type="checkbox" data-on="Aktif" data-off="Pasif" data-toggle="toggle" data-onstyle="success" data-offstyle="danger" @if($page->status==1) checked @endif>
                         </td>
                        <td>
                            <a href="{{route('page',$page->slug)}}"  target="_blank" title="Görüntüle" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                            <a href="{{route('admin.page.edit',$page->id)}}" title="Düzenle" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></a>
                            <a href="{{route('admin.page.delete',$page->id)}}" title="Sil"   class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
                            <!--  resources controller 1.yontemi boyle.
                             <form method="post" action="{{route('admin.makaleler.destroy',$page->id)}}">
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
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.10.2/Sortable.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script>
        $('#orders').sortable({
            handle:'.handle',
            update:function () {
         var siralama =  $('#orders').sortable('serialize');
        $.get("{{route('admin.page.orders')}}?"+siralama,function (data,status) {});
        $('#orderSuccess').show();
        setTimeout(function () {
            $('#orderSuccess').hide();
        },1000)
                setTimeout(function(){
                    window.location.reload(1);
                }, 1200);


                console.log(data);
            }
        });
    </script>
          <script type="text/javascript">
            function autoRefresh() {
                window.location.reload();
            }

    </script>
    <script>
        $(function() {
            $('.switch').change(function() {
            id= $(this)[0].getAttribute('page-id');
             statu=$(this).prop('checked');
             alert('Durum Değişti');
                $.get("{{route('admin.page.switch')}}", {id:id,statu:statu},function(data, status){
                   console.log(data);
                });
            })
        })
    </script>
@endsection
