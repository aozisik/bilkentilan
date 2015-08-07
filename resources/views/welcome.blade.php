@extends('layouts.default')
@section('content')
 <!-- Content -->
      
        <div class="col-lg-3 content-left">
          <h4>Arama</h4>
          <div class="well well-sm">
            <form>
              <fieldset>
                <input type="text" class="form-control" />
                <small><a href="#" class="btn-advanced-search">Gelişmiş</a></small>
                <input type="submit" class="btn btn-danger btn-sm btn-search" value="Ara" />
              </fieldset>
            </form>
          </div>
          <h4>Kategoriler</h4>
          <div class="list-group categories">
            @foreach($categories as $category)
            <a href="#" class="list-group-item">{{ $category }} <span class="glyphicon glyphicon-chevron-right"></span></a>
            @endforeach

          </div>
          <h4>Popüler İlanlar</h4>
          <div class="newest-classifieds">
            <div class="media">
              <a class="pull-left" href="#">
                <img class="media-object" style="width: 64px; height: 64px;" src="http://placehold.it/64x64/e0e0e0" />
              </a>
              <div class="media-body">
                <p><a href="#"><strong>Samsung Galaxy S4</strong></a></p>
                <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel ...</p>
              </div>
            </div>
            <div class="media">
              <a class="pull-left" href="#">
                <img class="media-object" style="width: 64px; height: 64px;" src="http://placehold.it/64x64/e0e0e0" />
              </a>
              <div class="media-body">
                <p><a href="#"><strong>Vizio 60" Slim Frame 3D LED</strong></a></p>
                <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel ...</p>
              </div>
            </div>
            <div class="media">
              <a class="pull-left" href="#">
                <img class="media-object" style="width: 64px; height: 64px;" src="http://placehold.it/64x64/e0e0e0" />
              </a>
              <div class="media-body">
                <p><a href="#"><strong>Apple McBook Pro</strong></a></p>
                <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel ...</p>
              </div>
            </div>
            <p class="text-right show-more"><a href="#">More &rarr;</a></p>
          </div>
        </div>
        <div class="col-lg-9 content-right">
          <h4>Son İlanlar</h4>
          <div class="row selected-classifieds">
            <div class="col-lg-3">
              <div class="thumbnail">
                <img src="http://placehold.it/800x600/e0e0e0" />
                <div class="caption">
                  <p><small><a href="#">Samsung Galaxy S4</a></small><p>
                  <p><strong>550 EUR</strong></p>
                </div>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="thumbnail">
                <img src="http://placehold.it/800x600/e0e0e0" />
                <div class="caption">
                  <p><small><a href="#">Vizio 60" Slim Frame 3D LED</a></small><p>
                  <p><strong>370 EUR</strong></p>                 
                </div>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="thumbnail">
                <img src="http://placehold.it/800x600/e0e0e0" />
                <div class="caption">
                  <p><small><a href="#">Logitech 2.1 HS-263</a></small><p>
                  <p><strong>36 EUR</strong></p>
                </div>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="thumbnail">
                <img src="http://placehold.it/800x600/e0e0e0" />
                <div class="caption">
                  <p><small><a href="#">Apple McBook Pro</a></small><p>
                  <p><strong>740 EUR</strong></p>                    
                </div>
              </div>
            </div>
          </div>
          <div class="row selected-classifieds">
            <div class="col-lg-3">
              <div class="thumbnail">
                <img src="http://placehold.it/800x600/e0e0e0" />
                <div class="caption">
                  <p><small><a href="#">Adidas Blake 46"</a></small><p>
                  <p><strong>55 EUR</strong></p>
                </div>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="thumbnail">
                <img src="http://placehold.it/800x600/e0e0e0" />
                <div class="caption">
                  <p><small><a href="#">Card reader MobileLite G2</a></small><p>
                  <p><strong>10 EUR</strong></p>
                </div>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="thumbnail">
                <img src="http://placehold.it/800x600/e0e0e0" />
                <div class="caption">
                  <p><small><a href="#">Electonics toolkit (40 pieces)</a></small><p>
                  <p><strong>28 EUR</strong></p>
                </div>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="thumbnail">
                <img src="http://placehold.it/800x600/e0e0e0" />
                <div class="caption">
                  <p><small><a href="#">Nokia Lumia 800</a></small><p>
                  <p><strong>185 EUR</strong></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      
      <!-- /Content -->
@stop