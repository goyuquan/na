<!DOCTYPE html>
<html lang="en-us">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title> 登陆 </title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<style media="screen">
		form label {
			display:inline-block;
			width:60px;
		}
		form input {
			display:inline-block;
			height:2em;
		}
	</style>
</head>
<body>
	<form method="POST" action="{{ url('/loginm_post') }}">
		{!! csrf_field() !!}
		<label>E-mail</label>
		<input type="email" name="email">
		<br>
		<br>
		<label>密码</label>
		<input type="password" name="password">
		<br>
		<br>
		<input type="submit" value="登录">
	</form>
</body>
</html>
