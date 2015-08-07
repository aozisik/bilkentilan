@extends('layouts.default')
@section('title', 'Hesap Bilgilerim')
@section('content')
<h2>Hesap Bilgilerim</h2> 
<p>
  Hesap bilgilerinizi güncelleyin.
</p>
<hr />
<div class="row">


  <div class="col-lg-9">
  @include('_partials.errors')
    <div class="well">
    {!! Form::open(['url' => 'profile/edit', 'method' => 'PUT']) !!}
      <div class="form-group">
        <label>İsim</label>
        {!! Form::text('first_name', Auth::user()->first_name, ['class' => 'form-control', 'autofocus' => 'true']) !!}
      </div>

      <div class="form-group">
        <label>Soyisim</label>
        {!! Form::text('last_name', Auth::user()->last_name, ['class' => 'form-control']) !!}
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