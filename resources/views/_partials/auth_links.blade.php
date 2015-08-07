<ul>

	@if( ! Request::is('auth/register'))
	<li><a href="{{ url('auth/register') }}">Kayıt Ol</a></li>
	@endif

	@if( ! Request::is('auth/login'))
	<li><a href="{{ url('auth/login') }}">Giriş Yap</a></li>
	@endif

	@if( ! Request::is('password/email'))
	<li><a href="{{ url('password/email') }}">Şifremi Unuttum</a></li>
	@endif
</ul>