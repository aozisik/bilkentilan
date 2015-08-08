@extends('layouts.default')
@section('content')
<h2>Şifre Sıfırlama</h2> 
<p>
  Bilkent İlan şifrenizi sıfırlayın
</p>
<hr />
<div class="row">


  <div class="col-lg-9">
  @include('_partials.errors')
    <div class="well">
    {!! Form::open(['url' => url('password/reset')]) !!}
      <input type="hidden" name="token" value="{{ $token }}">
      <div class="form-group">
        <label>Bilkent Eposta Adresi</label>
        {!! Form::text('email', null, ['class' => 'form-control']) !!}
        <small>*Aktivasyon postası gönderilecektir</small>
      </div>

      <div class="form-group">
      	<label>Yeni Şifre</label>
		{!! Form::password('password', ['class' => 'form-control', 'autocomplete' => 'off']) !!}
      </div>

      <div class="form-group">
      	<label>Şifre Tekrar</label>
		{!! Form::password('password_confirmation', ['class' => 'form-control', 'autocomplete' => 'off']) !!}
      </div>

      <div class="actions">
      	{!! Form::submit('Sıfırla', ['class' => 'btn btn-primary']) !!}
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