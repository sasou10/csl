<?php

session_start();

//recuperer les données venant de la page HTML
//mail 	adresse 	typecarte 	numerocarte 	dateexp 	code


$mail = isset($_POST["maila"])? $_POST["maila"] : "";
$adresse = isset($_POST["adresse"])? $_POST["adresse"] : "";
$typecarte = isset($_POST["typecarte"])? $_POST["typecarte"] : "";
$numerocarte = isset($_POST["numerocarte"])? $_POST["numerocarte"] : "";
$dateexp = isset($_POST["dateexp"])? $_POST["dateexp"] : "";
$code = isset($_POST["code"])? $_POST["code"] : "";

//identifier votre BDD
$database = "projetweb";
//connectez-vous dans votre BDD
//Rappel: votre serveur = localhost et votre login = root et votre password = <rien>
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

if ($_POST["button2"]) {
	if ($db_found) {
		$sql = "SELECT * FROM acheteurs";
		if ($mail != "") {
			
			$sql .= " WHERE mail LIKE '%$mail%'";
			
		}
		$result = mysqli_query($db_handle, $sql);
		//regarder s'il y a de résultat
		if (mysqli_num_rows($result) != 0) {
			//le mail est déjà dans la BDD
			echo "Un compte a déja été créé avec cette adresse mail.";
		} else {
						
			$sql = "INSERT INTO acheteurs(mail,adresse,typecarte,numerocarte,dateexp,code)
			       VALUES('$mail', '$adresse', '$typecarte', '$numerocarte', '$dateexp','$code')";
			$result = mysqli_query($db_handle, $sql);
			echo "Add successful." . "<br>";
			//on affiche le livre ajouté
			$sql = "SELECT * FROM acheteurs";
			if ($mail != "") {
				//on cherche le livre avec les paramètres titre et auteur
				$sql .= " WHERE mail LIKE '%$mail%'";
			}
			$result = mysqli_query($db_handle, $sql);
			while ($data = mysqli_fetch_assoc($result)) {
				echo "Vos informations personnelles:" . "<br>";
				
				echo "mail: " . $data['mail'] . "<br>";
				echo "adresse: " . $data['adresse'] . "<br>";
				echo "typecarte: " . $data['typecarte'] . "<br>";
				echo "numerocarte: " . $data['numerocarte'] . "<br>";
				echo "dateexp: " . $data['dateexp'] . "<br>";
				echo "code: " . $data['code'] . "<br>";
				echo "<br>";
			}


        /// Connexion à la session de l'acheteur
        
        $_SESSION['adresse'] = $_POST['adresse'];
        $_SESSION['card'] = $_POST['card'];
        $_SESSION['numerocarte'] = $_POST['numerocarte'];
        $_SESSION['dateexp'] = $_POST['dateexp'];
        $_SESSION['code'] = $_POST['code'];
		}

		header('location: moncompte.php');

	} else {
		echo "Database not found";
	}
}//fermer la connexion
mysqli_close($db_handle);
?>