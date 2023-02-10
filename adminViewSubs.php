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
		<h2>User Subscriptions<h2>
		
		<br><br>
			
		<h3>Add New User</h3>
		<form method = "post" action = "">
			<label>Username: </label>
			<br>
			<input type = "text" name = "name">
			<br>
			
			<label>Password: </label>
			<br>
			<input type = "text" name = "pass">
			<br>
			
			<label>Role (Student, Faculty, Driver): </label>
			<br>
			<input type = "text" name = "role">
			<br>
			
			<input type = "submit" value = "Add User">
		</form>
				
		<br>
		
		<?php
		
		if (!empty($_POST['name']) || !empty($_POST['pass']) || !empty($_POST['role']))
			{
				//post variables
				$name=$_POST['name'];
				$pass=$_POST['pass'];
				$role=$_POST['role'];
			
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
		
				// insert
				$query = "insert into users values ('".$name."', '".$pass."', '".$role."')";
			
				$statement = $db->prepare($query);
				$statement->execute();
				$rows = $statement->fetchAll();
				$count = $statement->rowCount();
			
				// report
				if ($statement)
				{
					echo "You have successfully added a new user";
				}
				else
				{
					echo "An error has occured";
				}
			
				$statement->closeCursor();
			}
			
		?>
		
		<h3>User Subscriptions</h3>
		
		<?php
		
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
			$query = "select * from users";
			
			$statement = $db->prepare($query);
			$statement->execute();
			$rows = $statement->fetchAll();
			$count = $statement->rowCount();	
			
			// printing results
			echo '<table>';
			for($i = 0; $i < $count; $i++)
			{
				echo "<tr>";
				echo "<td>";
				echo "<p><b>User ".($i-1)."</b></p>";
				echo "<p>Username: ".$rows[$i][0]."</p>";
				echo "<p>Password: ".$rows[$i][1]."</p>";
				echo "<p>Role:     ".$rows[$i][2]."</p>";
				echo "<form method = 'post' action = 'adminEditUser.php'>";
				echo "<input type = 'submit' value = 'Edit'>";
				echo "</form>";
				echo "<br>";
				echo "<form method = 'post' action = 'adminDeleteUser'>";
				echo "<input type = 'submit' value = 'Delete'>";
				echo "</form>";
				echo "</td>";
				echo "</tr>";
			}
			echo "</table>";
			
			$statement->closeCursor();
		?> 
		
	</body>
</html>