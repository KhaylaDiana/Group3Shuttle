<!DOCTYPE html >

<html>
	<head>
		<title>Shuttle Group 3</title>
	</head>
	<body>
		<h1>Shuttle Group 3 - Login</h1>
		
		<h3>User Login</h3>
		<!-- fill out user info -->
		<form action="authenticate_user.php" method="post">
		<table border="0">
			<tr>
				<td>Username:</td>
				<td><input type="text" name="userid" maxlength="30" size="50"></td> 
			</tr>
			<tr>
				<td>Password:</td>
				<td> <input type="password" name="password" maxlength="50" size="50"></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" value="Login"></td>
			</tr>
		</table>
		</form>

		<!-- button to create account -->
		<form action="create_account.php" method="post">
		<input type="submit" name="create" value="Create Account">
		</form>

		<h3>Admin Login</h3>
		<!-- fill out admin info -->
		<form action="authenticate_admin.php" method="post">
		<table border="0">
			<tr>
				<td>Admin ID:</td>
				<td><input type="text" name="adminid" maxlength="9" size="9"></td>
			</tr>
			<tr>
				<td>Password:</td>
				<td><input type="password" name="password" maxlength="50" size="50"></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" value="Login"></td>
			</tr>
		</table>
		</form>
	</body>
</html>
