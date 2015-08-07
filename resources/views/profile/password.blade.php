@extends('layouts.default')
@section('title', 'Şifre Değişikliği')
@section('content')
<h2>Şifre Değiştir</h2> 
<p>
  Hesabınıza yeni bir şifre belirleyin
</p>
<hr />
<div class="row">


  <div class="col-lg-9">
  @include('_partials.errors')
    <div class="well">
    {!! Form::open(['url' => 'profile/password']) !!}
  
      <div class="form-group">
        <label>Şimdiki Şifre</label>
        {!! Form::password('old_password', ['class' => 'form-control']) !!}
      </div>

      <div class="form-group">
        <label>Yeni Şifre</label>
        {!! Form::password('password', ['class' => 'form-control', 'autofill' => 'off']) !!}
      </div>

      <div class="form-group">
        <label>Yeni Şifre Tekrar</label>
        {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
      </div>      
      <div class="actions">
        {!! Form::submit('Değiştir', ['class' => 'btn btn-primary']) !!}
      </div>

    
    {!! Form::close() !!}
    </div>
  </div>
</div>
@stop