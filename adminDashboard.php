<!DOCTYPE html>

<?php
session_start();
?>

<html>
	<head>
		<meta charset="utf-8">
		<title>Shuttle Group 3</title>
		<style>
		</style>
	</head>

	<body>

		<h1>Admin Dashboard</h1>
		
		<br><br>
			
		<h3>View Routes</h3>
		<form method = "post" action = "adminViewRoutes.php">
			<input type = "submit" value = "Go">
		</form>
		
		<h3>View User Subscriptions</h3>
		<form method = "post" action = "adminViewSubs.php">
			<input type = "submit" value = "Go">
		</form>
		
	
	</body>
</html>