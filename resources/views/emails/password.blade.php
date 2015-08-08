<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Email</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>
<body>

	Merhaba, <br />

	Bilkent İlan hesabınızın şifresini sıfırlamak istediniz.<br />
	Lütfen <a href="{{ url('password/reset/'.$token) }}">bu bağlantıya</a> tıklayarak şifrenizi sıfırlayın<br />
	<br />
	Yukarıdaki bağlantı çalışmıyorsa aşağıdaki adresi tarayıcınızın adres çubuğuna yapıştırın:<br />
	{{ url('password/reset/'.$token) }}	
	<br />
	<br />
	Teşekkürler,
	Bilkent İlan
	<br />
	<br />
	<small>Böyle bir talepte bulunmadıysanız, bu epostayı silebilirsiniz. Şifreniz sıfırlanmayacak.<br />
	Lütfen bu epostaya cevap yazmayın</small>
</body>
</html>