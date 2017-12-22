<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	Hello World<br>
	Probando variables<br>
	<ul>
		<li><?=$var1?></li>
		<li><?=$var2?></li>
		<li><?=$var3?></li>
		<li><?=$var4?></li>
		<li><?=$var5?></li>
		<li><?=$var6?></li>
	</ul>
	<!-- old echo -->

	<?php foreach($tasks as $task) : ?>

		<li><?= $task; ?></li> 

	<?php endforeach; ?>

	<hr>
	
	<!-- blade echo and php replacers -->
	@foreach($tasks as $task)

		<li> {{$task}} </li> 

	@endforeach

	
</body>
</html>