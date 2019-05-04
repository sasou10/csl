<?php
//recuperer les données venant de la page HTML
//id 	nom 	photo 	description 	video 	prix 	quantite 

		
	$quantite = isset($_POST["quantitep"])? $_POST["quantitep"] : "";
	$id = isset($_POST["idp"])? $_POST["idp"] : 0;
	$mail = isset($_POST["mailp"])? $_POST["mailp"] : "";

	//identifier votre BDD
	$database = "projetweb";
	//connectez-vous dans votre BDD
	//Rappel: votre serveur = localhost et votre login = root et votre password = <rien>
	$db_handle = mysqli_connect('localhost', 'root', '');
	$db_found = mysqli_select_db($db_handle, $database);

	if ($_POST["buttonp"]) {
		
		if ($db_found) {
			
	
			$sql = "INSERT INTO paniers(mail,id,quantite)
				   VALUES('$mail', '$id','$quantite')";
			$result = mysqli_query($db_handle, $sql);
			
			echo "Add successful." . "<br>";
			//on affiche le livre ajouté
			$sql = "SELECT * FROM paniers";
			
				//on cherche le livre avec les paramètres titre et auteur
		  $sql .= " WHERE id LIKE '%$id%' ";
			
			$result = mysqli_query($db_handle, $sql);
			while ($data = mysqli_fetch_assoc($result)) {
				echo "Résumé de votre panier:" . "<br>";
				
				echo "id: " . $data['id'] . "<br>";
				echo "quantite: " . $data['quantite'] . "<br>";
				echo "<br>";
			}
				

			
			
		
		
		} else {
			echo "Database not found";
			}
	
	}

	//fermer la connexion
	mysqli_close($db_handle);
	

?>