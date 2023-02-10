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
	
		<h1>User Create Account</h1>
		<form method = "post" action = "">
			<label>Username: </label>
			<br>
			<input type = "text" name = "name">
			<br>
			
			<label>Password: </label>
			<br>
			<input type = "text" name = "pass">
			<br>
			
			<label for="roles">Choose your role:</label>
			<br>
				<select id="roles" name="roles">
					<option value="Student">Student</option>
					<option value="Faculty">Faculty</option>
					<option value="Driver">Driver</option>
				</select>
				<br>
			<input type = "submit" value = "Create Account">
		</form>
		
		<br>
		
		
		<?php 
			
			if (!empty($_POST['name']) || !empty($_POST['pass']) || !empty($_POST['roles']))
			{
				
				//post variables
				$name=$_POST['name'];
				$pass=$_POST['pass'];
				$roles=$_POST['roles'];
				
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
				$query = "insert into users values ('".$name."', '".$pass."', '".$roles."')";
				
				$statement = $db->prepare($query);
				$statement->execute();
				$rows = $statement->fetchAll();
				$count = $statement->rowCount();
				
				// print success link or fail text
				echo '<br><br>';
				
				if ($statement)
				{
					echo 'New Account Created';
					echo '<br>';
					echo '<a href="login.php">To Login Page';
				}
				else
				{
					echo 'The Username/Password you entered is invalid';
				}
			
				$statement->closeCursor();
			}
		?> 
		
	</body>
</html>