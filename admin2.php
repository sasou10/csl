<?php
    session_start();
?>

<?php
//recuperer les données venant de la page HTML
//mail 	pseudo 	nom 	prenom 	mdp 


$mail = isset($_POST["mail"])? $_POST["mail"] : "";
$mdp = isset($_POST["mdp"])? $_POST["mdp"] : "";

//identifier votre BDD
$database = "projetweb";
//connectez-vous dans votre BDD
//Rappel: votre serveur = localhost et votre login = root et votre password = <rien>
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

if ($_POST["button"]) {

	if ($db_found) {

// Vérification du mot de passe et mail

		$sql = "SELECT * FROM utilisateurs";

		if ($mail != "" && $mdp != "") {
			
			$sql .= " WHERE mail LIKE '%$mail%' AND mdp LIKE '%$mdp%'";
			

		$result = mysqli_query($db_handle, $sql);

		//regarder s'il y a des résultats
		if (mysqli_num_rows($result) != 0) {

				$sql = "SELECT * FROM adminis WHERE mail LIKE '%$mail%'";
			
			$result = mysqli_query($db_handle, $sql);

			while ($data = mysqli_fetch_assoc($result)) {
				echo "Vous êtes bien admin. Bienvenue" . "<br>";
				
				echo "mail: " . $data['mail'] . "<br>";
				//echo "mdp: " . $data['mdp'] . "<br>";
				echo "<br>";
			}

		} else {

			echo "Vous n'etes pas administrateur de ce site.";
						
				}
		} 
		else {
			echo "Remplissez les cases" . "<br>";
			include 'admin.php';
			}
	} else {
		echo "Database not found";
	}
}//fermer la connexion
mysqli_close($db_handle);
?>