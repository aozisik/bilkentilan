@extends('layouts.default')
@section('content')
<h2>Şifremi Unuttum</h2> 
<p>
  Bilkent Eposta adresinize bir şifre sıfırlama linki göndereceğiz.
</p>
<hr />
<div class="row">


  <div class="col-lg-9">
  @include('_partials.errors')
    <div class="well">
    {!! Form::open(['url' => url('password/email')]) !!}
  
      <div class="form-group">
        <label>Bilkent Eposta Adresi</label>
        {!! Form::text('email', null, ['class' => 'form-control']) !!}
      </div>


      <div class="actions">
        {!! Form::submit('Şifremi Unuttum', ['class' => 'btn btn-primary']) !!}
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