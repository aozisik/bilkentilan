@extends('layouts.default')
@section('title', 'İlan Düzenle')
@section('content')
<h2>İlanı Düzenle</h2> 
<p>
  İlanınızla ilgili bilgileri güncelleyin.
</p>
<hr />
<div class="row">


  <div class="col-lg-9">
  @include('_partials.errors')
    <div class="well">
    {!! Form::open(['url' => route('classifieds.update', $classified->id), 'method' => 'PUT', 'files' => 1]) !!}
    @include('pages.classifieds.form')
      <div class="actions">
      	{!! Form::submit('İlanı Güncelle', ['class' => 'btn btn-primary']) !!}
      </div>    
    {!! Form::close() !!}
    </div>
  </div>

</div>
@stop