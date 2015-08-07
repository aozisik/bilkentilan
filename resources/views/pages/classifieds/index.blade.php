@extends('layouts.default')
@section('title', 'İlanlarım')
@section('content')
<h1>İlanlarım</h1>
<div class="table-responsive">
<table class="table table-striped table-hover ">
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
			<td><img src="{{ $classified->photo->url('thumb') }}" width="64" height="64" alt="Fotoğraf" /></td>
			<td>{{ $classified->id }}</td>
			<td>{{ $classified->title }}</td>
			<td>{{ $classified->categoryName }}</td>
			<td>{{ $classified->price }}</td>
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
@stop