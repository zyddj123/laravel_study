<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>ajax</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<input type="text" name="name" id="name"><br>
	<input type="text" name="age" id="age"><br>
	<input type="button" name="btn" id="btn" value="click">
	<script src="{{asset('js/jquery-3.3.1.js')}}"></script>
	<script>
		$('#btn').click(function(){
			$.ajax({
				url:'/response/ajax',
				dataType:'json',
				success:function(e){
					$('#name').val(e.name);
					$('#age').val(e.age);
				}
			});
		});
	</script>
</body>
</html>