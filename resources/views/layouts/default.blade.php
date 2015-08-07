<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <meta name="csrf-param" content="_token" />  
  <title>@yield('title', 'Bilkent Mensuplarına Özel İlan Sitesi') - Bilkent İlan</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="{{ asset('css/all.css') }}" />
</head>
<body>

<div id="header">
 <!-- Logo -->
      <div class="logo">
        <a href="{{ url('/') }}"><img src="{{ asset('images/bilkentilan.png') }}"></a>
        <p class="header_slogan">Bilkentlilere Özel İlan Sitesi</p>
      </div>
      <!-- /Logo -->  
      <!-- Static navbar -->
      <nav class="navbar navbar-default" role="navigation">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="collapse navbar-collapse" id="navbar">
          <div class="container wrapper">
          <a href="{{ Auth::check() ? route('classifieds.create') : url('auth/login') }}" class="btn btn-danger navbar-btn add-classified-btn navbar-left" role="button"><i class="glyphicon glyphicon-plus"></i> İlan Ekle</a>
          
          <ul class="nav navbar-nav navbar-right">
            
            @if(Auth::check())
            <li><a href="{{ route('classifieds.index') }}">İlanlarım</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }} <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="{{ url('profile/edit') }}">Hesap Bilgilerim</a></li>
                <li><a href="{{ url('profile/password') }}">Şifremi Değiştir</a></li>
                <li><a href="{{ url('auth/logout') }}">Çıkış</a></li>
              </ul>
            </li>            
            @else
            <li><a href="{{ url('auth/register') }}">Kayıt Ol</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Giriş Yap <b class="caret"></b></a>
              <ul class="dropdown-menu" style="padding: 15px;min-width: 250px;">
                <li>
                  <div class="row">
                    <div class="col-md-12">
                    {!! Form::open(['url' => url('auth/login')]) !!}
                      <form class="form" role="form" method="post" action="login" accept-charset="UTF-8" id="login-nav">
                        <div class="form-group">
                          <label class="sr-only" for="exampleInputEmail2">Bilkent Eposta Adresi</label>
                          <input type="email" class="form-control" name="email" id="exampleInputEmail2" placeholder="Eposta" required>
                        </div>
                        <div class="form-group">
                          <label class="sr-only" for="exampleInputPassword2">Şifre</label>
                          <input type="password" class="form-control" name="password" id="exampleInputPassword2" placeholder="Şifre" required>
                        </div>
                        <div class="checkbox">
                          <label>
                            <input type="checkbox" name="remember_me" /> Beni Hatırla
                          </label>
                        </div>
                        <div class="form-group">
                          <button type="submit" class="btn btn-success btn-block">Giriş</button>
                        </div>
                      {!! Form::close() !!}
                    </div>
                  </div>
                </li>
              </ul>
            </li>
            @endif
          </ul>
          </div>
        </div>
      </nav>
      <!-- /Static navbar --> 
</div>
<div class="container wrapper">   
    @include('_partials/notifications')
	  <div class="row content">
    		  @yield('content')        
	  </div>
</div>

<div class="footer">
        <div class="well well-sm">
          <div class="pull-left">
            <ul class="nav nav-pills">
              <li><a href="{{ Auth::check() ? route('classifieds.create') : url('auth/login') }}"><span class="glyphicon glyphicon-plus"></span> İlan Ekle</a></li>
            </ul>
          </div>
          <div class="pull-right">
            <ul class="nav nav-pills">
              <li><a href="http://github.com/aozisik/bilkentilan#readme" target="_blank">Hakkında</a></li>
              <li><a href="{{ url('iletisim') }}">İletişim</a></li>
              <li><a href="{{ url('sartlar') }}">Kullanım Şartları</a></li>
            </ul>
          </div>
          <div class="clearfix">&nbsp;</div>
		</div>


   	
   		<div class="text-muted" style="padding-left:30px;padding-right:30px;"><small>
      	Bilkent İlan açık kaynak kodlu bir projedir. Bu siteyi kendi sorumluluğunuzda kullanınız. Eklenen içerikler her ne kadar kontrol edilse de uygunsuz içerik ile karşılaştığınız takdirde bildirimde bulununuz. Bu siteyi kullanmanız Kullanım Şartlarını okuduğunuz ve kabul ettiğiniz anlamına gelir. Bu site hiçbir şekilde İ.D. Bilkent Üniversitesi'nin bir iştiraki değildir.
      	</small></div>
	        
</div>

<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="{{ asset('javascript/rails.js') }}"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>