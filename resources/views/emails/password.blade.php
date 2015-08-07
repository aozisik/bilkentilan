<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Email</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>
<body>

	Hello, <br />

	You requested to reset your password for your Alternative Tour account.<br />
	Please click <a href="{{ url('password/reset/'.$token) }}">here</a> to reset your password<br />
	<br />
	If the above link does not work, copy and paste the following URL to your browser:<br />
	{{ url('password/reset/'.$token) }}	
	<br />
	<br />
	Best Regards,
	Alternative Tour Team
	<br />
	<br />
	<small>You can safely delete this email if you did not request to reset your password.<br />
	Please do not reply to this email</small>
</body>
</html>