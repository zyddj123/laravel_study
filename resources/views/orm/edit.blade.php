<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
	<form action="/orm/edit/{{$info->id}}" method="post">
		{{csrf_field()}}
		<input type="text" name="name" value="{{$info->name}}">
		<input type="password" name="pwd" value="{{$info->pwd}}">
		<input type="submit" name="btn" value="edit">
	</form>
</body>
</html>