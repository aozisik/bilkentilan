@extends('layouts.default')
@section('title', 'Yeni İlan Oluştur')
@section('content')
<h2>Yeni İlan Oluştur</h2> 
<p>
  İlanınızla ilgili bilgileri girin.
</p>
<hr />
<div class="row">


  <div class="col-lg-9">
  @include('_partials.errors')
    <div class="well">
    {!! Form::open(['url' => route('classifieds.store')]) !!}
      <div class="form-group">
        <label>İlan Başlığı</label>
        {!! Form::text('title', null, ['class' => 'form-control', 'autofocus' => 'true', 'maxlength' => 120]) !!}
        <small>En fazla 120 karakter</small>
      </div>

      <div class="form-group">
        <label>Fiyat</label>
        {!! Form::number('price', null, ['class' => 'form-control']) !!}
        <small>Birim fiyatı giriniz. Bu bir satış değilse, fiyat kısmını boş bırakın.</small>
      </div>

      <div class="form-group">
        <label>Miktar</label>
        {!! Form::text('quantity', 1, ['class' => 'form-control']) !!}
        <small>Bu ilanda birden fazla ürün satılıyorsa, miktar belirtiniz</small>
      </div>  

      <div class="form-group">
        <label>Bilkent Eposta Adresi</label>
        {!! Form::text(null, Auth::user()->email, ['class' => 'form-control', 'readonly' => 'readonly']) !!}
        <small>Bu adresi değiştiremezsiniz.</small>
      </div>

      <div class="form-group">
        <label>Konum</label>
        {!! Form::text('location', Auth::user()->location, ['class' => 'form-control']) !!}
        <small>Örn. 76. yurt</small>
      </div>  

      <div class="form-group">
        <label>Telefon</label>
        {!! Form::text('phone', Auth::user()->phone, ['class' => 'form-control']) !!}
        <small>Yurt odası veya cep telefonu.</small>
      </div>  

     <div class="checkbox">
        <label>
          {!! Form::checkbox('show_phone', '1', Auth::user()->show_phone) !!}
          Diğer kullanıcılar telefon numaramı görebilsinler
        </label>
      </div>

     <div class="checkbox">
        <label>
          {!! Form::checkbox('show_email', '1', Auth::user()->show_email) !!}
          Diğer kullanıcılar eposta adresimi görebilsinler
        </label>
      </div>          

     <div class="checkbox">
        <label>
          {!! Form::checkbox('newsletter', '1', Auth::user()->newsletter) !!}
          Yenilikler, püf noktaları ve ilgilendiğim ilanlar ile ilgili bana eposta gönder
        </label>
      </div>    

      <div class="actions">
      	{!! Form::submit('Güncelle', ['class' => 'btn btn-primary']) !!}
      </div>

    
    {!! Form::close() !!}
    </div>
  </div>

</div>
@stop