@extends('layouts.default')
@section('content')
 <!-- Content -->
@include('_partials/left_menu')


<div class="col-lg-9 content-right">

  <ol class="breadcrumb">
    <li><a href="{{ url('/') }}">Ana Sayfa</a></li>
    <!--
    <li><a href="#">Categories</a></li>
    <li><a href="#">Cell Phones & Accessories</a></li>
    <li><a href="#">Smartphones</a></li>
    -->
  </ol>
  
  <h2>Samsung Galaxy S4</h2>
  <div class="row">
    <div class="col-md-8">
      <div class="row">
        <div class="col-md-12" id="slider">
          <div class="col-md-12" id="carousel-bounding-box" style="padding:0px;margin-top:10px;margin-bottom:12px;">
            <div id="detailCarousel" class="carousel slide">
              <div class="carousel-inner">
                <div class="active item" data-slide-number="1">
                  <img src="{{ $classified->photo->url('original') }}" class="img-responsive" />
                </div>
              
              </div>
              
            </div>
          </div>

          <p style="text-align: justify;">{{ $classified->description }}</p>          
        </div>
      </div>

    </div>
    <div class="col-md-4">
      <table class="table table-condensed table-hover">
        <thead>
          <th colspan="2">Ayrıntılar:</th>
        </thead>
        <tbody style="font-size: 12px;">
          <tr>
            <td>İlan No</td>
            <td>{{ $classified->id }}</td>
          </tr>
          @if($classified->price)
          <tr>
            <td>Fiyat</td>
            <td>{{ $classified->price }} ₺</td>
          </tr>
          <tr>
            <td>Adet</td>
            <td>{{ $classified->quantity }}</td>
          </tr>
          @endif
          <tr>
            <td>Görüntüleme</td>
            <td>{{ $classified->visits }}</td>
          </tr>
          <tr>
            <td>İlan Veriliş</td>
            <td>{{ $classified->created_at->format('d.m.Y') }}</td>
          </tr>
          <tr>
            <td>Son Güncelleme</td>
            <td>{{ $classified->updated_at->format('d.m.Y') }}</td>
          </tr>          
          <tr>
            <td>Bitiş Tarihi</td>
            <td>{{ $classified->expires_at->format('d.m.Y') }}</td>
          </tr>
        </tbody>
      </table>
      <div class="row">
        <div class="col-md-12">
          <span style="padding-left: 5px;"><strong>İlan Sahibi:</strong></span>
          <div class="well">
            <div class="row">
              <div class="col-sm-12">
                <h4><a href="#">{{ $classified->user->name }}</a></h4>
                @if( ! Auth::check())
                <p>İlan sahibinin bilgilerini sadece Bilkentilan.com üyeleri görüntüleyebilir.
                @else
                @if($classified->user->location)
                <small>
                  <span class="glyphicon glyphicon-map-marker"></span>
                  <cite title="{{ $classified->user->location }}">{{ $classified->user->location }} </cite>
                </small>
                <br />
                @endif
                @if($classified->user->show_email)
                <span class="glyphicon glyphicon-envelope"></span> {{ $classified->user->email }}<br />
                @endif
                @if($classified->user->show_phone && $classified->user->phone)
                <span class="glyphicon glyphicon-phone-alt"></span> {{ $classified->user->phone }}<br />
                @endif
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>  
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      
    </div>
  </div>
  @if(Auth::check())
  <hr>
  <div class="row">
    <div class="col-md-12">
      <h4>İlan Sahibine Soru Sorun</h4>
      <div class="panel panel-default">
        <div class="panel-body">                
          <form action="#" method="POST">
            <div class="form-group">
              <label for="InputText">Sorunuz</label>
              <textarea class="form-control" id="InputText" name="message" placeholder="Lütfen önce ilan açıklamasını okuyunuz." rows="5" style="margin-bottom:10px;"></textarea>
            </div>
            <button class="btn btn-info" type="submit">Gönder</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  @endif
</div>
@stop