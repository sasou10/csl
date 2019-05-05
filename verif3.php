<?php

session_start();

//recuperer les donnÃ©es venant de la page HTML
//mail 	adresse 	typecarte 	numerocarte 	dateexp 	code


$mail = $_SESSION['mail'] ;
$adresse = isset($_POST["adresse"])? $_POST["adresse"] : "";
$typecarte = isset($_POST["typecarte"])? $_POST["typecarte"] : "";
$numerocarte = isset($_POST["numerocarte"])? $_POST["numerocarte"] : "";
$dateexp = isset($_POST["dateexp"])? $_POST["dateexp"] : "";
$code = isset($_POST["code"])? $_POST["code"] : "";
$cat;
$q1=0;
$q2 =0;
$q3;
$f;


//identifier votre BDD
$database = "projetweb";
//connectez-vous dans votre BDD
//Rappel: votre serveur = localhost et votre login = root et votre password = <rien>
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

if ($_POST["button"]) {
	
	if ($db_found) {
		
		$sql = "SELECT * FROM acheteurs
			
            WHERE mail = '" .$mail. "'";
			$result = mysqli_query($db_handle, $sql);
			if($data = mysqli_fetch_assoc($result)) {
				
				if (($adresse ==  $data['adresse'] )&& ($typecarte ==  $data['typecarte'] )&& ($numerocarte ==  $data['numerocarte'] )
					&& ($dateexp ==  $data['dateexp'] )&& ($code ==  $data['code'] )){
						
						echo "achat confirmé";
						
						$sql = "SELECT * FROM paniers
						INNER JOIN items
						ON paniers.id = items.id
						WHERE paniers.mail = '" .$mail. "'";
					
						$result2 = mysqli_query($db_handle, $sql);
					
						while ($data2 = mysqli_fetch_assoc($result2)) 
						{
							$id = $data2['id'];
							$sql = "SELECT quantite FROM paniers WHERE id LIKE '%" . $id . "%'";
							$q4 = mysqli_query($db_handle, $sql);
							$row2 = mysqli_fetch_assoc($q4);
							
								$sql = "SELECT nbvendu FROM items 
								WHERE id LIKE '%" . $id . "%'";
								$result5 = mysqli_query($db_handle, $sql);
								$row5 = mysqli_fetch_assoc($result5);
								
								$f = $row5['nbvendu']+$row2['quantite'];
								
							
							
							
							$sql ="UPDATE items SET nbvendu = '" .$f.  "'
								WHERE id  LIKE '%" . $id . "%'";
							$result4 = mysqli_query($db_handle, $sql);
							
							
							
							$sql = "DELETE FROM paniers WHERE mail LIKE '%" . $mail . "%'";
							$result3 = mysqli_query($db_handle, $sql);
							
							$sql = "SELECT categorie FROM items WHERE id LIKE '%" . $id  ."%'";
							$q3 = mysqli_query($db_handle, $sql);
							$row3 = mysqli_fetch_assoc($q3);
						
						
							switch ($row3['categorie']) {
							
								case "livre":
								
								$sql = "SELECT quantite FROM items 
								WHERE id LIKE '%" . $id . "%'";
								$q1 = mysqli_query($db_handle, $sql);
								$row = mysqli_fetch_assoc($q1);
								$q2 = $row['quantite'] - $row2['quantite'] ;
								
							
								
								
								
								
							if($q2 !=0)
								{
									$sql ="UPDATE items
										SET quantite = '" . $q2 . "'
											WHERE id LIKE '%" . $id . "%'";
									$result = mysqli_query($db_handle, $sql);
								} else {
								
								$sql = "DELETE FROM livres WHERE id LIKE '%" . $id . "%'";
								$result = mysqli_query($db_handle, $sql);
								$sql = "DELETE FROM items WHERE id LIKE '%" . $id . "%'";
								$result = mysqli_query($db_handle, $sql);
								echo "L'article est supprimé." . "<br>";
								}
								
								
								 ;
							
								break;
						
							
								case "vetement":
								
								$sql = "SELECT quantite FROM items 
								WHERE id LIKE '%$id%'";
								$q1 = mysqli_query($db_handle, $sql);
								$row = mysqli_fetch_assoc($q1);
								$q2 = $row['quantite'] - $row2['quantite']  ;
								
								
								
								if($q2 !=0)
								{
									$sql ="UPDATE items
										SET quantite = '" . $q2 . "'
											WHERE id LIKE '%" . $id . "%'";
									$result = mysqli_query($db_handle, $sql);
									echo "L'article est supprimé." . "<br>";
								} else {
								$sql = "DELETE FROM `vetements` WHERE id LIKE '%" . $id . "%'";
								$result = mysqli_query($db_handle, $sql);
								$sql = "DELETE FROM `items` WHERE id LIKE '%" . $id . "%'";
								$result = mysqli_query($db_handle, $sql);
								echo "L'article est supprimé." . "<br>";
								}
								
								
								;
								break;
							
							
								case "musique":
								
								$sql = "SELECT quantite FROM items 
								WHERE id LIKE '%" . $id . "%'";
								$q1 = mysqli_query($db_handle, $sql);
								$row = mysqli_fetch_assoc($q1);
								$q2 = $row['quantite'] - $row2['quantite']  ;
								
								
								if($q2 !=0)
								{
									$sql ="UPDATE items
										SET quantite = '" . $q2 . "'
											WHERE id LIKE '%" . $id . "%'";
									$result = mysqli_query($db_handle, $sql);
									echo "L'article est supprimé." . "<br>";
								} else {
								
								$sql = "DELETE FROM `musiques`WHERE id LIKE '%" . $id . "%'";
								$result = mysqli_query($db_handle, $sql);
								$sql = "DELETE FROM `items` WHERE id LIKE '%" . $id . "%'";
								$result = mysqli_query($db_handle, $sql);
								echo "L'article est supprimé." . "<br>";
								}
						
								;
								break;
							
							
							case "sport":
							
							$sql = "SELECT quantite FROM items 
								WHERE id LIKE '%" . $id . "%'";
								$q1 = mysqli_query($db_handle, $sql);
								$row = mysqli_fetch_assoc($q1);
								$q2 = $row['quantite'] -$row2['quantite']  ;
								
							
								
								if($q2 !=0)
								{
									$sql ="UPDATE items
										SET quantite = '" . $q2 . "'
											WHERE id LIKE '%" . $id . "%'";
									$result = mysqli_query($db_handle, $sql);
									echo "L'article est supprimé." . "<br>";
								} else {
							
							$sql = "DELETE FROM `sports` WHERE id LIKE '%" . $id . "%'";
								$result = mysqli_query($db_handle, $sql);
								$sql = "DELETE FROM `items` WHERE id LIKE '%" . $id . "%'";
								$result = mysqli_query($db_handle, $sql);
								echo "L'article est supprimé." . "<br>";
								}
							;
							break;
								}
						
						
						
						}
					}
					
		
					}else {
						echo "Vous avez rentre de mauvaises donnees.</br> 
						Veuillez recommencer.</br> 
						
						Si l'erreur persiste, verifiez vos informations sur l'onglet Votre compte.</br></br>"
						;
						
						
						echo'<html>
						
						<a href="panier.php">Revenir au panier</a>
						
						
						
						
						</html>';
					}
					
				
			
			
				
		
		


	} else {
		echo "Database not found";
	}
}//fermer la connexion
mysqli_close($db_handle);
?>