<?php

session_start();

$id = isset($_POST["ids"])? $_POST["ids"] : 0;




//identifier votre BDD
$database = "projetweb";
//connectez-vous dans votre BDD
//Rappel: votre serveur = localhost et votre login = root et votre password = <rien>


$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

if ($_POST["button2"]) {
	if ($db_found) { 
		
		
		

		$sql = "INSERT INTO sports(id)
			   VALUES('$id')";
		$result = mysqli_query($db_handle, $sql);
		echo "Add successful." . "<br>";
		//on affiche le livre ajouté
		$sql = "SELECT * FROM sports";
		if ($id != "") {
			//on cherche le livre avec les paramètres titre et auteur
			$sql .= " WHERE id LIKE '%$id%'";
		}
		$result = mysqli_query($db_handle, $sql);
		while ($data = mysqli_fetch_assoc($result)) {
			echo "Résumé de votre produit:" . "<br>";
			
			echo "id: " . $data['id'] . "<br>";
			echo "<br>";
	
		}
	}else{
		echo "Database not found";
	}
		
}
//fermer la connexion
mysqli_close($db_handle);
?>


