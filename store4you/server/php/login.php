<?php
   include 'sql.php';

   $url = 'login.php';

   if(isset($_POST['Name']) AND !empty($_POST['Name']) AND isset($_POST['Passwort']) AND !empty($_POST['Passwort'])){

   		$name = htmlspecialchars($_POST['Name']);
		$pwd = htmlspecialchars($_POST['Passwort']);

		$sql = "SELECT name, passwort FROM user WHERE Name='".$name."' AND Passwort='".$pwd."'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_row($result);
			if($row[0] != NULL) {
				echo"login";
				header('Location: ../../client/home.html');
			}else{
				echo "ungültiges Login";
			}

   }else{
   		echo "Wrong username or password";
   }
?>