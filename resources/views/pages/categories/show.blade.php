@extends('layouts.default')
@section('title', $category->name.' Kategorisindeki İlanlar')
@section('content')
 <!-- Content -->
@include('_partials/left_menu')

<div class="col-lg-9 content-right">
  <ol class="breadcrumb">
    <li><a href="{{ url('/') }}">Ana Sayfa</a></li>
    <li><a href="{{ url('/') }}">Kategoriler</a></li>
    @if($category->parent_id)
    <li><a href="{{ route('categories.show', $category->parent_id) }}">{{ $category->parent->name }}</a></li>
    @endif
    <li><a href="{{ route('categories.show', $category->id) }}">{{ $category->name }}</a></li>
  </ol> 
  <h2>{{ $category->name }}</h2>
  
  <p>Tüm <a href="{{ route('categories.show', $mainCategory->id) }}">{{ $mainCategory->name }}</a> Alt Kategorileri</p>
    @foreach($mainCategory->children as $subCategory)
    <span class="label {{ Request::is('categories/'.$subCategory->id) ? 'label-danger' : 'label-primary' }}"><a href="{{ route('categories.show', $subCategory->id) }}" style="color:#fff;">{{ $subCategory->name }}</a></span>
    @endforeach
  </ul> 
  
  <div class="row classifieds-table">
    <div class="col-lg-12">
      @if($classifieds->count())
      <table class="table table-hover">
        <thead>
          <tr>
            <th>İlan Başlığı</th>
            <th class="text-center">Fiyat</th>
            <th class="text-center">Görüntüleme</th>
          </tr>
        </thead>
        <tbody>
          @foreach($classifieds as $classified)
          <tr>
            <td class="col-sm-8 col-md-6">
              <div class="media">
                <a class="thumbnail pull-left" href="{{ $classified->url() }}" style="padding:4px;">
                  <img class="media-object" src="{{ $classified->photo->url('thumb') }}" style="width:64px;height:64px;" />
                </a>
                <div class="media-body">
                  <h4 class="media-heading"><a href="{{ $classified->url() }}">{{ $classified->title }}</a></h4>
                  <p><small>{{ str_limit($classified->description, 150) }} </small></p>
                </div>
              </div>
            </td>
            <td class="col-sm-1 col-md-1 text-center" style="vertical-align: middle;"><strong>{{ $classified->price ? $classified->price.' ₺' : ''  }}</strong></td>
            <td class="col-sm-1 col-md-1 text-center" style="vertical-align: middle;">{{ $classified->visits }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
      @else
      <br />
      <div class="alert alert-warning">Bu kategoride bir ilana rastlanmadı. Diğer kategorileri deneyiniz</div>
      @endif
    </div>
    <div class="col-lg-12" style="text-align: center;">
      {!! $classifieds->render() !!}
    </div>
  </div>
</div>

@stop