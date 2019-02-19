<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
	<form action="/orm/add" method="post">
		{{csrf_field()}}
		<input type="text" name="name">
		<input type="password" name="pwd">
		<input type="submit" name="btn" value="add">
	</form>
</body>
</html>