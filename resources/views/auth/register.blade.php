@extends('layouts.default')
@section('content')
<h2>Yeni Hesap Oluştur</h2> 
<p>
  Bilkent İlan sadece Bilkent mensuplarına yönelik bir hizmettir. 
</p>
<hr />
<div class="row">


  <div class="col-lg-9">
  @include('_partials.errors')
    <div class="well">
    {!! Form::open(['url' => 'auth/register']) !!}
      <div class="form-group">
        <label>İsim</label>
        {!! Form::text('first_name', null, ['class' => 'form-control', 'autofocus' => 'true']) !!}
      </div>

      <div class="form-group">
        <label>Soyisim</label>
        {!! Form::text('last_name', null, ['class' => 'form-control']) !!}
      </div>  

      <div class="form-group">
        <label>Bilkent Eposta Adresi</label>
        {!! Form::text('email', null, ['class' => 'form-control']) !!}
        <small>*Aktivasyon postası gönderilecektir</small>
      </div>

      <div class="form-group">
      	<label>Şifre</label>
		{!! Form::password('password', ['class' => 'form-control', 'autocomplete' => 'off']) !!}
      </div>

      <div class="form-group">
      	<label>Şifre Tekrar</label>
		{!! Form::password('password_confirmation', ['class' => 'form-control', 'autocomplete' => 'off']) !!}
      </div>

     <div class="checkbox">
        <label>
          {!! Form::checkbox('newsletter', '1') !!}
          Yenilikler, püf noktaları ve ilgilendiğim ilanlar ile ilgili bana eposta gönder
        </label>
      </div>    

      <div class="actions">
      	{!! Form::submit('Kayıt Ol', ['class' => 'btn btn-primary']) !!}
      </div>

    
    {!! Form::close() !!}
    </div>
  </div>
  <div class="col-md-3">
    <div class="well">
      @include('_partials/auth_links')
    </div>
  </div>

</div>
@stop