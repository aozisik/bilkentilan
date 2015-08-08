@extends('layouts.default')
@section('title', 'İlanlarım')
@section('content')
<h1>İlanlarım</h1>
@if($classifieds->count())
<div class="table-responsive">
<table class="table table-striped table-bordered table-hover table-center">
	<thead>
		<th></th>
		<th>İlan No</th>
		<th>Başlık</th>
		<th>Kategori</th>
		<th>Fiyat</th>
		<th>Gösterim</th>
		<th>Bitiş Tarihi</th>
		<th></th>
	</thead>
	<tbody class="">
		@foreach($classifieds as $classified)
		<tr>
			<td class="text-center"><img src="{{ $classified->photo->url('thumb') }}" width="64" height="64" alt="Fotoğraf" /></td>
			<td>{{ $classified->id }}</td>
			<td><a href="{{ route('classifieds.show', $classified->id) }}">{{ $classified->title }}</a></td>
			<td>{{ $classified->categoryName }}</td>
			<td>{{ $classified->price }} TL</td>
			<td>{{ $classified->visits }}</td>
			<td>{{ $classified->expires_at->format('d.m.Y') }}</td>
			<td>
				<a href="{{ route('classifieds.edit', $classified->id) }}">Düzenle</a>
				|
				<a href="{{ route('classifieds.destroy', $classified->id) }}" data-method="delete" data-confirm="Bu ilanı silmek istediğinize emin misiniz?" class="text-danger">Sil</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
</div>
@else
<p>Size ait herhangi bir ilan bulamadık. <a href="{{ route('classifieds.create') }}">Bir ilan eklemek ister misiniz?</a></p>
@endif
@stop