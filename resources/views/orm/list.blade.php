<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
	@foreach($data as $v)
		id:{{$v->id}}----name:{{$v->name}}&nbsp;&nbsp;<a href="/orm/edit/{{$v->id}}">edit</a>&nbsp;&nbsp;<a href="/orm/del/{{$v->id}}">del</a><hr>
	@endforeach
</body>
</html>