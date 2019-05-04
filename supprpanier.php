<?php
//recuperer les données venant de la page HTML



$id = isset($_POST["idsupp"])? $_POST["idsupp"] : 0;

//identifier votre BDD
$database = "projetweb";
//connectez-vous dans votre BDD
//Rappel: votre serveur = localhost et votre login = root et votre password = <rien>


$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

if ($_POST["button"]) {
	if ($db_found) { 
	
	
			$sql = "DELETE FROM paniers WHERE id = '$id'";
			$result = mysqli_query($db_handle, $sql);
			
			echo "L'article est supprimé." . "<br>";
			
			
			
		
		
	}else{
		echo "Database not found";
	}
		
}
//fermer la connexion
mysqli_close($db_handle);

?>