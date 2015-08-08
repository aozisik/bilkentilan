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
    {!! Form::open(['url' => route('classifieds.store'), 'files' => 1]) !!}
    @include('pages.classifieds.form')
      <div class="actions">
        {!! Form::submit('İlan Ekle', ['class' => 'btn btn-primary']) !!}
      </div>    
    {!! Form::close() !!}
    </div>
  </div>

</div>
@stop