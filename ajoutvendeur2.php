<?php

session_start();
//recuperer les données venant de la page HTML
//mail 	photo 	image


$mail = isset($_POST["mailv"])? $_POST["mailv"] : "";
$photo = isset($_POST["photo"])? $_POST["photo"] : "";
$image = isset($_POST["image"])? $_POST["image"] : "";


//identifier votre BDD
$database = "projetweb";
//connectez-vous dans votre BDD
//Rappel: votre serveur = localhost et votre login = root et votre password = <rien>
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

if ($_POST["button2"]) {
	if ($db_found) {
		$sql = "SELECT * FROM vendeurs";
		if ($mail != "") {
			
			$sql .= " WHERE mail LIKE '%$mail%'";
			
		}
		$result = mysqli_query($db_handle, $sql);
		//regarder s'il y a de résultat
		if (mysqli_num_rows($result) != 0) {
			//le mail est déjà dans la BDD
			echo "Un compte a déja été créé avec cette adresse mail.";
		} else {
						
			$sql = "INSERT INTO vendeurs(mail,photo,image)
			       VALUES('$mail', '$photo', '$image')";
			$result = mysqli_query($db_handle, $sql);
			echo "Add successful." . "<br>";
			//on affiche le livre ajouté
			$sql = "SELECT * FROM vendeurs";
			if ($mail != "") {
				//on cherche le livre avec les paramètres titre et auteur
				$sql .= " WHERE mail LIKE '%$mail%'";
			}
			$result = mysqli_query($db_handle, $sql);
			while ($data = mysqli_fetch_assoc($result)) {
				echo "Vos informations personnelles:" . "<br>";
				
				echo "mail: " . $data['mail'] . "<br>";
				echo "photo: " . $data['photo'] . "<br>";
				echo "image: " . $data['image'] . "<br>";
				echo "<br>";
			}

			 /// Connexion à la session du vendeur
        
        $_SESSION['photo'] = $_POST['photo'];
        header('location: moncompte.php');

		}
	} else {
		echo "Database not found";
	}
}//fermer la connexion
mysqli_close($db_handle);
?>