@extends('layouts.default')
@section('content')
<h2>Giriş Yap</h2> 
<p>
  Daha önce hesap oluşturmadıysanız, lütfen önce kayıt olun.
</p>
<hr />
<div class="row">


  <div class="col-lg-9">
  @include('_partials.errors')
    <div class="well">
    {!! Form::open(['url' => 'auth/login']) !!}
  
      <div class="form-group">
        <label>Bilkent Eposta Adresi</label>
        {!! Form::text('email', null, ['class' => 'form-control']) !!}
      </div>

      <div class="form-group">
      	<label>Şifre</label>
		{!! Form::password('password', ['class' => 'form-control']) !!}
      </div>

      <div class="actions">
      	{!! Form::submit('Giriş Yap', ['class' => 'btn btn-primary']) !!}
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