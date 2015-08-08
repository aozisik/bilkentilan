<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Email</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>
<body>

	Merhaba, <br />

	Bilkent İlan sadece Bilkent mensuplarının katılabildiği bir ilan platformudur.<br />
	Bu nedenle Bilkent tarafından verilen bir eposta adresine sahip olduğunuzu doğrulamak zorundayız.<br /><br />
	Bu işlemi tamamlamak için lütfen <a href="{{ url('auth/activate/'.$user->activation_key) }}">bu bağlantıya</a> tıklayın.<br />
	<br />
	Yukarıdaki bağlantı çalışmıyorsa aşağıdaki adresi tarayıcınızın adres çubuğuna yapıştırın:<br />
	{{ url('auth/activate/'.$user->activation_key) }}	
	<br />
	<br />
	Teşekkürler,
	Bilkent İlan
</body>
</html>