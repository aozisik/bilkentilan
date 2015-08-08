<div class="form-group">
  <label>İlan Başlığı</label>
  {!! Form::text('title', $classified->title, ['class' => 'form-control', 'autofocus' => 'true', 'maxlength' => 120]) !!}
  <small>En fazla 120 karakter</small>
</div>
<div class="form-group">
  <label>Kategori</label>
  {!! Form::select('category_id', ['' => 'Lütfen Seçiniz'] + $subcategories, $classified->category_id, ['class' => 'form-control']) !!}
</div>
<div class="row">
  <div class="col-md-6">
    <div class="form-group">
      <label>Fiyat</label>
      {!! Form::number('price', $classified->price, ['class' => 'form-control']) !!}
      <small>Birim fiyatı giriniz. Bu bir satış değilse, fiyat kısmını boş bırakın.</small>
    </div>        
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label>Miktar</label>
      {!! Form::text('quantity', $classified->quantity, ['class' => 'form-control']) !!}
      <small>Bu ilanda birden fazla ürün satılıyorsa, miktar belirtiniz</small>
    </div>          
  </div>
</div>
<div class="form-group">
  <label>İlan Fotoğrafı</label>
  @if($classified->photo->size())
    <p><img src="{{ $classified->photo->url('thumb') }}" alt="" /></p>
  @endif
  {!! Form::file('photo', null, ['class' => 'form-control']) !!}
  <small>Jpg, png veya gif formatında en fazla 1 MB boyutunda bir resim seçiniz</small>
</div>
<div class="form-group">
  <label>İlan Açıklaması</label>
  {!! Form::textarea('description', $classified->description, ['class' => 'form-control']) !!}
</div>