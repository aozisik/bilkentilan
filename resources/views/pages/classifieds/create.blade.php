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
      <div class="form-group">
        <label>İlan Başlığı</label>
        {!! Form::text('title', null, ['class' => 'form-control', 'autofocus' => 'true', 'maxlength' => 120]) !!}
        <small>En fazla 120 karakter</small>
      </div>

      <div class="form-group">
        <label>Kategori</label>
        {!! Form::select('category_id', ['' => 'Lütfen Seçiniz'] + $subcategories, null, ['class' => 'form-control']) !!}
      </div>


      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Fiyat</label>
            {!! Form::number('price', null, ['class' => 'form-control']) !!}
            <small>Birim fiyatı giriniz. Bu bir satış değilse, fiyat kısmını boş bırakın.</small>
          </div>        
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Miktar</label>
            {!! Form::text('quantity', 1, ['class' => 'form-control']) !!}
            <small>Bu ilanda birden fazla ürün satılıyorsa, miktar belirtiniz</small>
          </div>          
        </div>
      </div>
      <div class="form-group">
        <label>İlan Fotoğrafı</label>
        {!! Form::file('photo', null, ['class' => 'form-control']) !!}
        <small>Jpg, png veya gif formatında en fazla 1 MB boyutunda bir resim seçiniz</small>
      </div>

      <div class="form-group">
        <label>İlan Açıklaması</label>
        {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
      </div>


      <div class="actions">
      	{!! Form::submit('İlan Ekle', ['class' => 'btn btn-primary']) !!}
      </div>

    
    {!! Form::close() !!}
    </div>
  </div>

</div>
@stop