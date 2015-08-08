@extends('layouts.default')
@section('content')
 <!-- Content -->
@include('_partials/left_menu')

        <div class="col-lg-9 content-right">
          <h4>Son İlanlar</h4>
          <div class="row selected-classifieds">
            @foreach($classifieds as $classified)
            <div class="col-lg-3">
              <div class="thumbnail">
                <a href="{{ route('classifieds.show', $classified->id) }}">
                  <img src="{{ $classified->photo->url('medium') }}" />
                </a>
                <div class="caption">
                  <p><small><a href="{{ route('classifieds.show', $classified->id) }}">{{ $classified->title }}</a></small></p>
                  <p><strong>{{ $classified->price ? $classified->price.' ₺' : '' }}</strong></p>
                </div>
              </div>
            </div>            
            @endforeach

          </div>
        </div>
      
      <!-- /Content -->
@stop