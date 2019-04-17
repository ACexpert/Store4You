<!DOCTYPE html>
<html>
<body>

<h2>User erstellen</h2>

<form action="userErstellen.php" method="post">
  Name:<br>
  <input type="text" name="Name">
  <br>
  Passwort:<br>
  <input type="text" name="Passwort">
  <br><br>
  <input type="submit" value="Submit">
</form>

<?php
	include '../php/sql.php';
	
	$name = htmlspecialchars($_POST['Name']);
	$pwd = htmlspecialchars($_POST['Passwort']);
		
	$insert = $conn->query("INSERT INTO user (Name, Passwort)VALUES('".$name."', '".$pwd."')");



	
	
?>

</body>
</html>
