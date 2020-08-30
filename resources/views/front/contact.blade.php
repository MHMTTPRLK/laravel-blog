@extends('front.layouts.master') {{-- Master page tum iskeletin birleştiği ve tanımlamların yapıldıgı yer--}}
@section('title','İletisim Sayfası') {{-- Title adı verildi--}}
@section('bg','https://www.banmec.com/wp-content/uploads/2016/09/content-marketing.png')
@section('content') {{-- Master page belirledğimiz content yanı yield('content')
yaparak diger sayflara conten içine alıp mater page eklenti yapıyourz.--}}



<!-- Contact Content -->
<div class=" col-md-8 ">
    @if(session('success'))


    <div class="alert alert-success">
        {{session('success')}}
    </div>
    @endif
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
    <p >Bizimle İletişime Geçebilirsiniz</p>

    <form method="post" action="{{route('contact.post')}}" >
        @csrf
        <div class="control-group">
            <div class="form-group controls">
                <label>Adınız Soyadınız</label>
                <input type="text" class="form-control" placeholder="Adınız Soyadınız"  name="adsoyad" id="adsoyad" value="{{old('adsoyad')}}" required >
                <p class="help-block text-danger"></p>
            </div>
        </div>
        <div class="control-group">
            <div class="form-group  controls">
                <label>Email Adresiniz</label>
                <input type="email" class="form-control" placeholder="Email Adresiniz"   name="email" id="email" value="{{old('email')}}" required >
                <p class="help-block text-danger"></p>
            </div>
        </div>
        <div class="control-group">
            <div class="form-group col-xs-12 controls">
                <label>Konu</label>
               <select  class="form-control" name="topic">
                   <option @if(old('topic')=="Bilgi") selected @endif> Bilgi</option>
                   <option @if(old('topic')=="İstek") selected @endif >İstek</option>
                   <option @if(old('topic')=="Genel") selected @endif>Genel</option>
               </select>
            </div>
        </div>
        <div class="control-group">
            <div class="form-group controls">
                <label>Mesajınız</label>
                <textarea rows="5" class="form-control" placeholder="Mesaj"  name="mesaj"id="mesaj" required >{{old('mesaj')}}</textarea>
                <p class="help-block text-danger"></p>
            </div>
        </div>
        <br>
        <div id="success"></div>
        <button type="submit" class="btn btn-primary" id="sendMessageButton">Gönder</button>
    </form>
</div>
<div class="col-md-4">
    <div class="card card-default">
        <div class="card-body">İletişim Adresleri </div>
        <div class="divider divider-primary divider-small mb-xl">
            <hr>
        </div>

        <ul class="list list-icons list-icons-style-3 mt-xlg mb-xlg">
            <li><i class="fa fa-map-marker"></i> <strong>Adres:</strong></li>
            <li><i class="fa fa-phone"></i> <strong>Telefon:</strong></li>
            <li><i class="fa fa-phone"></i> <strong>GSM:</strong> </li>
            <li><i class="fa fa-envelope"></i> <strong>Email:</strong> <a href=""></a></li>
        </ul>


    </div>
</div>



@endsection






