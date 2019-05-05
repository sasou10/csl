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
			
			
			
			

			while ($data = mysqli_fetch_assoc($result)) {

				//Connexion
			session_start();
        	$_SESSION['mail'] = $mail;
        	$_SESSION['mdp'] = $mdp;
        	$_SESSION['nom'] = $data['nom'];
        	$_SESSION['prenom'] = $data['prenom'];
        	$_SESSION['pseudo'] = $data['pseudo'];
        	$_SESSION['categorie'] = $data['categorie'];
			
		
			
        }

        	//Enregistrement infos acheteur
        		if($_SESSION['categorie'] == 'acheteur'){

        		$sql = " SELECT * FROM acheteurs 
				INNER JOIN utilisateurs 
				ON utilisateurs.mail = acheteurs.mail
				WHERE utilisateurs.mail = '$mail'";
			

				$result = mysqli_query($db_handle, $sql);

				//regarder s'il y a des résultats
				if (mysqli_num_rows($result) != 0) {

				while ($data = mysqli_fetch_assoc($result)) {


        		$_SESSION['adresse'] = $data['adresse'];
        		$_SESSION['typecarte'] = $data['typecarte'];
        		$_SESSION['numerocarte'] = $data['numerocarte'];
        		$_SESSION['dateexp'] = $data['dateexp'];
        		$_SESSION['code'] = $data['code'];
				
				
				echo "Bienvenue ".$data['prenom'].". ";
				echo '<li><a href="moncompte.php">Acceder a mon compte</a></li></p>';
				
				
        		
        	}

        	}

			}

			//Enregistrement infos vendeur
			else if($_SESSION['categorie'] == 'vendeur')
			{
				$sql = "SELECT * FROM vendeurs
						INNER JOIN utilisateurs
						ON utilisateurs.mail = vendeurs.mail
						WHERE utilisateurs.mail = '$mail'";
			

				$result = mysqli_query($db_handle, $sql);

				//regarder s'il y a des résultats
				if (mysqli_num_rows($result) != 0) {

				while ($data = mysqli_fetch_assoc($result)) {

        		$_SESSION['photo'] = $data['photo'];
				
        		echo "Bienvenue ".$data['prenom'].". ";
				echo '<li><a href="moncompte.php">Acceder a mon compte</a></li></p>';
        		
			}

			
        }

        
        }

        else if($_SESSION['categorie'] == 'admin')
        {
        	echo "Bienvenue ".$data['prenom'].". ";
				echo '<li><a href="moncompte.php">Acceder a mon compte</a></li></p>';
        }
    }
            else {
        	echo '<script> alert("Pas de compte associé") </script>
        	<li><a href="connexion.php">Connexion</a></li></p>';
        }
    }
        else {

        	echo '<script> alert("Veuillez remplir les champs") </script>
        	<li><a href="connexion.php">Connexion</a></li></p>';
        }

	} else {
		echo "Database not found";
	}
}//fermer la connexion
mysqli_close($db_handle);
?>