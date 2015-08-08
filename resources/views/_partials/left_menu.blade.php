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
            @foreach($popular as $classified)
            <div class="media">
              <a class="pull-left" href="{{ $classified->url() }}">
                <img class="media-object" style="width: 64px; height: 64px;" src="{{ $classified->photo->url('thumb') }}" />
              </a>
              <div class="media-body">
                <p><a href="{{ $classified->url() }}"><strong>{{ $classified->title }}</strong></a></p>
                <p>{{ str_limit($classified->description, 55) }}...</p>
              </div>
            </div>
            @endforeach

            <!-- <p class="text-right show-more"><a href="#">More &rarr;</a></p> -->
          </div>
        </div>