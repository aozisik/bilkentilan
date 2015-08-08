@extends('layouts.default')
@section('content')
 <!-- Content -->
@include('_partials/left_menu')

<div class="col-lg-9 content-right">
  <ol class="breadcrumb">
    <li><a href="index.html">Home</a></li>
    <li><a href="#">Categories</a></li>
    <li><a href="#">Computers & Networking</a></li>
    <li><a href="category.html">PC, Computers</a></li>
  </ol>
  <h2>PC, Computers</h2>
  <div class="row classifieds-table">
    <div class="col-lg-12">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Product</th>
            <th class="text-center">Price</th>
            <th class="text-center">Views</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="col-sm-8 col-md-6">
              <div class="media">
                <a class="thumbnail pull-left" href="#">
                  <img class="media-object" src="http://placehold.it/72x72/e0e0e0" style="width: 72px; height: 72px;" />
                </a>
                <div class="media-body">
                  <h4 class="media-heading"><a href="#">Product name</a></h4>
                  <p><small>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla adipiscing tempor ornare. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac ...</small></p>
                </div>
              </div>
            </td>
            <td class="col-sm-1 col-md-1 text-center" style="vertical-align: middle;"><strong>110.87 EUR</strong></td>
            <td class="col-sm-1 col-md-1 text-center" style="vertical-align: middle;">76x</td>
          </tr>
          <tr>
            <td class="col-sm-8 col-md-6">
              <div class="media">
                <a class="thumbnail pull-left" href="#">
                  <img class="media-object" src="http://placehold.it/72x72/e0e0e0" style="width: 72px; height: 72px;" />
                </a>
                <div class="media-body">
                  <h4 class="media-heading"><a href="#">Product name</a></h4>
                  <p><small>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla adipiscing tempor ornare. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac ...</small></p>
                </div>
              </div>
            </td>
            <td class="col-sm-1 col-md-1 text-center" style="vertical-align: middle;"><strong>110.87 EUR</strong></td>
            <td class="col-sm-1 col-md-1 text-center" style="vertical-align: middle;">76x</td>
          </tr>
          <tr>
            <td class="col-sm-8 col-md-6">
              <div class="media">
                <a class="thumbnail pull-left" href="#">
                  <img class="media-object" src="http://placehold.it/72x72/e0e0e0" style="width: 72px; height: 72px;" />
                </a>
                <div class="media-body">
                  <h4 class="media-heading"><a href="#">Product name</a></h4>
                  <p><small>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla adipiscing tempor ornare. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac ...</small></p>
                </div>
              </div>
            </td>
            <td class="col-sm-1 col-md-1 text-center" style="vertical-align: middle;"><strong>110.87 EUR</strong></td>
            <td class="col-sm-1 col-md-1 text-center" style="vertical-align: middle;">76x</td>
          </tr>
          <tr>
            <td class="col-sm-8 col-md-6">
              <div class="media">
                <a class="thumbnail pull-left" href="#">
                  <img class="media-object" src="http://placehold.it/72x72/e0e0e0" style="width: 72px; height: 72px;" />
                </a>
                <div class="media-body">
                  <h4 class="media-heading"><a href="#">Product name</a></h4>
                  <p><small>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla adipiscing tempor ornare. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac ...</small></p>
                </div>
              </div>
            </td>
            <td class="col-sm-1 col-md-1 text-center" style="vertical-align: middle;"><strong>110.87 EUR</strong></td>
            <td class="col-sm-1 col-md-1 text-center" style="vertical-align: middle;">76x</td>
          </tr>
          <tr>
            <td class="col-sm-8 col-md-6">
              <div class="media">
                <a class="thumbnail pull-left" href="#">
                  <img class="media-object" src="http://placehold.it/72x72/e0e0e0" style="width: 72px; height: 72px;" />
                </a>
                <div class="media-body">
                  <h4 class="media-heading"><a href="#">Product name</a></h4>
                  <p><small>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla adipiscing tempor ornare. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac ...</small></p>
                </div>
              </div>
            </td>
            <td class="col-sm-1 col-md-1 text-center" style="vertical-align: middle;"><strong>110.87 EUR</strong></td>
            <td class="col-sm-1 col-md-1 text-center" style="vertical-align: middle;">76x</td>
          </tr>
          <tr>
            <td class="col-sm-8 col-md-6">
              <div class="media">
                <a class="thumbnail pull-left" href="#">
                  <img class="media-object" src="http://placehold.it/72x72/e0e0e0" style="width: 72px; height: 72px;" />
                </a>
                <div class="media-body">
                  <h4 class="media-heading"><a href="#">Product name</a></h4>
                  <p><small>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla adipiscing tempor ornare. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac ...</small></p>
                </div>
              </div>
            </td>
            <td class="col-sm-1 col-md-1 text-center" style="vertical-align: middle;"><strong>110.87 EUR</strong></td>
            <td class="col-sm-1 col-md-1 text-center" style="vertical-align: middle;">76x</td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="col-lg-12" style="text-align: center;">
      <ul class="pagination">
        <li class="disabled"><a href="#">«</a></li>
        <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">5</a></li>
        <li><a href="#">»</a></li>
      </ul>
    </div>
  </div>
</div>

@stop