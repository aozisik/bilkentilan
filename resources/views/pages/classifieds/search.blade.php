@extends('layouts.default')
@section('title', 'Arama Sonuçları')
@section('content')
 <!-- Content -->
@include('_partials/left_menu')

<div class="col-lg-9 content-right">
<br />
<hr />
  
  <div class="row classifieds-table">
    <div class="col-lg-12">
      @if(isset($classifieds) && $classifieds->count())
      <p><strong>{{ old('keyword') }}</strong> anahtar kelimesi için sonuçlar gösteriliyor</p>
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

      <div class="alert alert-warning">Herhangi bir sonuç bulunamadı. Lütfen anahtar kelimenin en az 3 harf uzunluğunda olduğundan emin olun.</div>
      @endif
    </div>
    @if(isset($classifieds))
    <div class="col-lg-12" style="text-align: center;">
      {!! $classifieds->render() !!}
    </div>
    @endif
  </div>
</div>

@stop