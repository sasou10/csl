<?php
//recuperer les données venant de la page HTML
session_start();

$mail = isset($_POST["mailv"])? $_POST["mailv"] : "";

//identifier votre BDD
$database = "projetweb";
//connectez-vous dans votre BDD
//Rappel: votre serveur = localhost et votre login = root et votre password = <rien>


$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

if ($_POST["button2"]) {

	if ($db_found) { 
	
	

			$sql = "SELECT * FROM items
			WHERE mail = '$mail'";

            $result = mysqli_query($db_handle, $sql);

          
        while ($data = mysqli_fetch_assoc($result)) {

			$categorie = $data['categorie'];

            switch ($categorie) {
			case "livre":

				///Supression des items
            	$sql1 = "DELETE FROM livres INNER JOIN items ON items.id = livres.id WHERE items.mail = '$mail'";
				$result1 = mysqli_query($db_handle, $sql1);
				$sql2 = "DELETE FROM items WHERE mail = '$mail'";
				$result2 = mysqli_query($db_handle, $sql2);
				//echo "L'article est supprimé." . "<br>";


				break;

			case "musique":

				///Supression des items
            	$sql1 = "DELETE FROM musiques INNER JOIN items ON items.id = musiques.id WHERE items.mail = '$mail'";
				$result1 = mysqli_query($db_handle, $sql1);
				$sql2 = "DELETE FROM items WHERE mail = '$mail'";
				$result2 = mysqli_query($db_handle, $sql2);
				//echo "L'article est supprimé." . "<br>";

			

				break;

			case "sport":

				///Supression des items
            	$sql1 = "DELETE FROM sports INNER JOIN items ON items.id = sports.id WHERE items.mail = '$mail'";
				$result1 = mysqli_query($db_handle, $sql1);
				$sql2 = "DELETE FROM items WHERE mail = '$mail'";
				$result2 = mysqli_query($db_handle, $sql2);
				//echo "L'article est supprimé." . "<br>";

			
				break;

			case "vetement":

				///Supression des items
            	$sql1 = "DELETE FROM vetements INNER JOIN items ON items.id = vetements.id WHERE items.mail = '$mail'";
				$result1 = mysqli_query($db_handle, $sql1);
				$sql2 = "DELETE FROM items WHERE mail = '$mail'";
				$result2 = mysqli_query($db_handle, $sql2);
				//echo "L'article est supprimé." . "<br>";

				

				break;            	


			}
			
			
			
			
			

		}
		
		$sql5 = "SELECT * FROM vendeurs
		INNER JOIN utilisateurs
		ON vendeurs.mail = utilisateurs.mail
		WHERE vendeurs.mail = '$mail'";

            $result5 = mysqli_query($db_handle, $sql5);

          
            while ($data = mysqli_fetch_assoc($result5)) {
				$sql3 = "DELETE FROM vendeurs WHERE mail = '$mail'" ;
				$result3 = mysqli_query($db_handle, $sql3);
			
				$sql4 = "DELETE FROM utilisateurs WHERE mail = '$mail'";
				$result4 = mysqli_query($db_handle, $sql4);
				echo " Le vendeur est supprimé." . "<br>";
			}

	
			
		
		
	}else{
		echo "Database not found";
	}
		
}
//fermer la connexion
mysqli_close($db_handle);


?>