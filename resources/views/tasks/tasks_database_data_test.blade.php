<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<!-- blade echo and php replacers -->
	@foreach($tasks as $task)
		<li>
			<a href="/tasks/{{ $task->id}}">{{$task->body}}</a> 
		</li> 
	@endforeach
</body>
</html>