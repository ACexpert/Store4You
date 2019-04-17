<!DOCTYPE html>
<html>
<body>

<h2>Produkt erstellen</h2>

<form action="produktErstellen.php" method="post">
  Name:<br>
  <input type="text" name="Name">
  <br>
  Preis:<br>
  <input type="int" name="Preis">
  <br><br>
  <input type="submit" value="Submit">
</form>

<?php
	include '../php/sql.php';
	
	$name = htmlspecialchars($_POST['Name']);
	$preis = htmlspecialchars($_POST['Preis']);
		
	$insert = $conn->query("INSERT INTO artikel (Name, Preis)VALUES('".$name."', '".$preis."')");



	
	
?>

</body>
</html>
