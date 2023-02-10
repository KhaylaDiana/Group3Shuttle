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
	
		<h1>User Login</h1>
		<form method = "post" action = "">
			<label>Username: </label>
			<input type = "text" name = "name">
			
			<label>Password: </label>
			<input type = "text" name = "pass">
			
			<input type = "hidden" value = "user" name = "logType">
			<input type = "submit" value = "Login">
		</form>
		
		<br>
		
		<h1>Admin Login</h1>
		<form method = "post" action = "">
			<label>Username: </label>
			<input type = "text" name = "name">
			
			<label>Password: </label>
			<input type = "text" name = "pass">
			
			<input type = "hidden" value = "admin" name = "logType">
			<input type = "submit" value = "Login">
		</form>
		
		
		<?php 
			
			if (!empty($_POST['name']) || !empty($_POST['pass']) || !empty($_POST['logType']))
			{
				
				//post variables
				$name=$_POST['name'];
				$pass=$_POST['pass'];
				$logType=$_POST['logType'];
				
				// connect
				$dsn = 'mysql:host=localhost;dbname=michniz1_shuttledb'; //replace michniz1 with your name
				$username = 'michniz1_wizard';   
				$password = 'qwerty456!!'; 
 
				try { 
					$db = new PDO($dsn, $username, $password); 
				} catch(PDOException $e) {
					echo "Connection failed: " . $e->getMessage();
					exit(); 
				} 
			
				// get stuff from search info from db
				if ($logType == "user")
				{
					$query = "select * from users";
				}
				else
				{
					$query = "select * from admins";
				}
				
				$statement = $db->prepare($query);
				$statement->execute();
				$rows = $statement->fetchAll();
				$count = $statement->rowCount();
				
				// print success link or fail text
				echo '<br><br>';
				
				for ($x = 0; $x < $count; $x++)
				{
					if ($name == $rows[$x][0] && $pass == $rows[$x][1])
					{
						$valid = true;
						break;
					}
				}
				
				if ($valid != true)
				{
					echo 'The Username/Password you entered is invalid';
				}
				else
				{
					if ($logType == "user")
					{
						echo '<a href="userDashboard.php">To User Dashboard';
					}
					else
					{
						echo '<a href="adminDashboard.php">To Admin Dashboard';
					}
				}
			
				$statement->closeCursor();
			}
		?> 
		
	</body>
</html>