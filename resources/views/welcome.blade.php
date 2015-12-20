@extends('layouts.default')
@section('content')
 <!-- Content -->
@include('_partials/left_menu')

        <div class="col-lg-9 content-right">
          <h4>Son İlanlar</h4>
          @if($classifieds->count())
          <div class="row selected-classifieds">
          
            @foreach($classifieds as $classified)
            <div class="col-lg-3 thumbnailContainer">
              <div class="thumbnail">
                <a href="{{ $classified->url() }}">
                  <img src="{{ $classified->photo->url('showcase') }}" />
                </a>
                <div class="caption">
                  <p><small><a href="{{ $classified->url() }}">{{ str_limit($classified->title, 48) }}</a></small></p>
                  @if($classified->price > 0)
                  <p><strong>{{ $classified->price.' ₺' }}</strong></p>
                  @endif
                </div>
              </div>
            </div>            
            @endforeach
          </div>
          @else
          <p>Burası biraz boş :/</p>
          @endif          
        </div>
      
      <!-- /Content -->
@stop