<?php
    session_start();
?>

<!DOCTYPE html>
<?php

//recuperer les données venant de la page HTML
//id 	nom 	photo 	description 	video 	prix 	quantite 
//<input type="hidden" name="idl" value="' . $id . '"><html>

		
	$nom = isset($_POST["nom"])? $_POST["nom"] : "";
	$photo = isset($_POST["photo"])? $_POST["photo"] : "";
	$description = isset($_POST["description"])? $_POST["description"] : "";
	$video = isset($_POST["video"])? $_POST["video"] : "";
	$prix = isset($_POST["prix"])? $_POST["prix"] : "";
	$quantite = isset($_POST["quantite"])? $_POST["quantite"] : "";
	$categorie = $_POST["categorie"];

	
	//identifier votre BDD
	$database = "projetweb";
	//connectez-vous dans votre BDD
	//Rappel: votre serveur = localhost et votre login = root et votre password = <rien>
	$db_handle = mysqli_connect('localhost', 'root', '');
	$db_found = mysqli_select_db($db_handle, $database);

	if ($_POST["button2"]) {
		
		if ($db_found) {
			
			
		$sql = "INSERT INTO items(nom,photo,description,video,prix,quantite)
					   VALUES('$nom', '$photo', '$description', '$video','$prix', '$quantite')";
				$result = mysqli_query($db_handle, $sql);
				
				$id = mysqli_insert_id($db_handle);
				echo "Add successful." . "<br>";
				//on affiche le livre ajouté
				$sql = "SELECT * FROM items";
				
					//on cherche le livre avec les paramètres titre et auteur
			  $sql .= " WHERE nom LIKE '%$nom%' AND description LIKE '%$description%' ";
				
				$result = mysqli_query($db_handle, $sql);
				while ($data = mysqli_fetch_assoc($result)) {
					echo "Résumé de votre produit:" . "<br>";
					
					echo "id: " . $data['id'] . "<br>";
					echo "nom: " . $data['nom'] . "<br>";
					echo "photo: " . $data['photo'] . "<br>";
					echo "description: " . $data['description'] . "<br>";
					echo "video: " . $data['video'] . "<br>";
					echo "prix: " . $data['prix'] . "<br>";
					echo "quantite: " . $data['quantite'] . "<br>";
					echo "<br>";
				}

                //nom de la photo sans jpg
                /*$new = basename($_FILES['photo']['name'],".jpg");

                //Modification du nom dans la bdd
                $modif = "UPDATE items SET photo = '$new' WHERE nom LIKE '%$nom%' AND description LIKE '%$description%' ";
                $data = mysqli_query($db_handle, $modif);

                //Deplacement image
                $path = "img/";
                move_uploaded_file($new, "$path/$new");*/

                ///Image !!
                $req = mysqli_query($db_handle, "SELECT * FROM items WHERE nom LIKE '%$nom%' AND description LIKE '%$description%'");
                $data = mysqli_fetch_array($req);

                $user_image = $data['photo'];
                $repertoire = "/img/";

?>

<img src="<?php echo $repertoire.$user_image; ?>" alt="">

<?php

	
		switch ($categorie) {
			case "livre":
			
			echo '<html> 
    <head>  
        <meta charset="utf-8">
        <title> Nouveau Livre</title>
        <link rel="stylesheet" href="style.css" type="text/css">
         <style>
            .content{
               background-image:linear-gradient(white, grey);
                
            }
        
        </style>
    </head>
    <body>
        <div class="topnav">

            <ul>  
                <li><a href="index.php"><img src="img/amazon.png"  width="45px" ></a></li>     
                <li> <div id="cat">Catégories </div>

                    <ul>
                        <li><a href="livres.php">livres</a></li>
                        <li><a href="vetements.php">vetements</a></li>
                        <li><a href="musiques.php">musiques</a></li>
                        <li><a href="sports.php">sports</a></li>
                    </ul>
                </li>

                <li><a href="ventesflash.php">Ventes Flash</a></li>
                <li><a href="ajoutitem.php">Vendre</a></li>';
                
                
                if (isset($_SESSION['mail']) && isset($_SESSION['mdp'])) {
                
                echo '<li><a href="moncompte.php">Votre Compte</a></li>';

                
                } else {

                    echo '<li><a href="ajoututilisateur.php">Votre Compte</a></li>';
                }

                

                echo '<li><a href="admin.php">Admin</a></li>
                <li><a href="admin.php">Admin</a></li>
                <a href="panier.php" style="float:right"><img src="img/panier.png" width="20px" > Panier </a>
            </ul>
        </div>
        <div class="content">
            <p> ALLER, PLUS QUE QUELQUES ETAPES POUR AJOUTER VOTRE LIVRE</p>
            
 <img style="margin: 60px 60px" src="img/livres.png" width="500px">
        <form id="registration" style="margin: 95px 50px" action="ajoutlivre2.php" method="post">
            <h2>Ajouter un livre</h2>
            <div class="barre"></div>
		<input type="hidden" name="idl" value="' . $id . '"><html>
            <table>
                <tr>
                    <td>titre:</td>
                    <td><input type="text" name="titre" placeholder=" ex: Le malade imaginaire"></td>
                </tr>
                <tr>
                    <td>auteur:</td>
                    <td><input type="text" name="auteur"placeholder=" ex: Molière"></td>
                </tr>

                <tr>
                    <td colspan="2" align="center"><input type="submit" name="button2" value="Ajouter"></td>
                </tr>
            </table>
        </form>
        </div>
        <div class="footer">
            <h5> © 1996-2019, Amazon.com, Inc. ou ses filiales. </h5>
        </div>
    </body>
</html>';
        
			break;
		
			case "vetement":
			echo '<html>  
    <head>  
       <meta charset="utf-8">
        <title> Nouveau vêtement</title>
        <link rel="stylesheet" href="style.css" type="text/css">
         .content{
               background-image:linear-gradient(white, grey);
                
            }
    </head>
    <body>
        <div class="topnav">

            <ul>  
                <li><a href="index.php"><img src="img/amazon.png"  width="45px" ></a></li>     
                <li> <div id="cat">Catégories </div>

                    <ul>
                        <li><a href="livres.php">livres</a></li>
                        <li><a href="vetements.php">vetements</a></li>
                        <li><a href="musiques.php">musiques</a></li>
                        <li><a href="sports.php">sports</a></li>
                    </ul>
                </li>

                <li><a href="ventesflash.php">Ventes Flash</a></li>
                <li><a href="ajoutitem.php">Vendre</a></li>';
                
                
                if (isset($_SESSION['mail']) && isset($_SESSION['mdp'])) {
                
                echo '<li><a href="moncompte.php">Votre Compte</a></li>';

                
                } else {

                    echo '<li><a href="ajoututilisateur.php">Votre Compte</a></li>';
                }

                

                echo '<li><a href="admin.php">Admin</a></li>
                <a href="panier.php" style="float:right"><img src="img/panier.png" width="20px" > Panier </a>
            </ul>
        </div>
        <div class="content">
            <p> ALLER, PLUS QUE QUELQUES ETAPES POUR AJOUTER VOTRE VETEMENT</p>
       
      <img style="margin: 60px 60px" src="img/vetements.png" width="500px">
        <form id="registration" style="margin:80px 20px"  action="ajoutvetement2.php" method="post">
             <h2>Ajouter un vêtement</h2>
            <div class="barre"></div>
            <input type="hidden" name="idv" value="' . $id . '">
            <table>
                <tr>
                    <td> Genre : </td>
                    <td> <input type="radio" style="width:15%"  name="genre" value="Homme" >Homme
                    <input type="radio" style="width:15%" name="genre" value="Femme" >Femme</td>
                   
                </tr>
                <tr>
                    <td>Taille:</td>
                    <td><input type="text" name="taille"></td>
                </tr>

                <tr>
                    <td>Couleur:</td>
                    <td><input type="text" name="couleur"></td>
                </tr>

                <tr>
                    <td colspan="2" align="center"><input type="submit" name="button2" value="Ajouter"></td>
                </tr>
            </table>
        </form>
        </div>
        <div class="footer">
            <h5> © 1996-2019, Amazon.com, Inc. ou ses filiales. </h5>
        </div>
    </body>
</html>';
			break;
		
		
			case "musique":
	
			echo '<html>
    <head>  
        <meta charset="utf-8">
        <title> Nouvelle musique</title>
        <link rel="stylesheet" href="style.css" type="text/css">
         .content{
               background-image:linear-gradient(white, grey);
                
            }
    </head>
    <body>
        <div class="topnav">

            <ul>  
                <li><a href="index.php"><img src="img/amazon.png"  width="45px" ></a></li>     
                <li> <div id="cat">Catégories </div>

                    <ul>
                        <li><a href="livres.php">livres</a></li>
                        <li><a href="vetements.php">vetements</a></li>
                        <li><a href="musiques.php">musiques</a></li>
                        <li><a href="sports.php">sports</a></li>
                    </ul>
                </li>

                <li><a href="ventesflash.php">Ventes Flash</a></li>
                <li><a href="ajoutitem.php">Vendre</a></li>';
                
                
                if (isset($_SESSION['mail']) && isset($_SESSION['mdp'])) {
                
                echo '<li><a href="moncompte.php">Votre Compte</a></li>';

                
                } else {

                    echo '<li><a href="ajoututilisateur.php">Votre Compte</a></li>';
                }

                

                echo '<li><a href="admin.php">Admin</a></li>
                <a href="panier.php" style="float:right"><img src="img/panier.png" width="20px" > Panier </a>
            </ul>
        </div>
        <div class="content">
            <p> ALLER, PLUS QUE QUELQUES ETAPES POUR AJOUTER VOTRE ALBUM</p>
             <img style="margin: 60px 60px" src="img/musique.png" width="500px">
        <form  style="margin:12% 20px" action="ajoutmus2.php" method="post">
            <input type="hidden" name="idm" value="' . $id . '">
            <table>
                <tr>
                    <td>Album:</td>
                    <td><input type="text" name="album" placeholder="This is it"></td>
                </tr>
                <tr>
                    <td>Artiste:</td>
                    <td><input type="text" name="artiste"placeholder="Michael Jackson"></td>
                </tr>


                <tr>
                    <td colspan="2" align="center"><input type="submit" name="button2" value="Ajouter"></td>
                </tr>
            </table>
        </form>
        </div>
        <div class="footer">
            <h5> © 1996-2019, Amazon.com, Inc. ou ses filiales. </h5>
        </div>
    </body>
</html>';
			break;
		
		
		case "sport":
        echo '<html>
    <head>  
        <meta charset="utf-8">
        <link rel="stylesheet" href="style.css" type="text/css">
        <style>
            .content{
               background-image:linear-gradient(white, grey);
                
            }
        
        </style>
    </head>
    <body>
        <div class="topnav">

            <ul>  
                <li><a href="index.php"><img src="img/amazon.png"  width="45px" ></a></li>     
                <li> <div id="cat">Catégories </div>

                    <ul>
                        <li><a href="livres.php">livres</a></li>
                        <li><a href="vetements.php">vetements</a></li>
                        <li><a href="musiques.php">musiques</a></li>
                        <li><a href="sports.php">sports</a></li>
                    </ul>
                </li>

                <li><a href="ventesflash.php">Ventes Flash</a></li>
                <li><a href="ajoutitem.php">Vendre</a></li>';
                
                
                if (isset($_SESSION['mail']) && isset($_SESSION['mdp'])) {
                
                echo '<li><a href="moncompte.php">Votre Compte</a></li>';

                
                } else {

                    echo '<li><a href="ajoututilisateur.php">Votre Compte</a></li>';
                }

                

                echo '<li><a href="admin.php">Admin</a></li>
                <a href="panier.php" style="float:right"><img src="img/panier.png" width="20px" > Panier </a>
            </ul>
        </div>
        <div class="content">
            <p> ALLER, PLUS QUE QUELQUES ETAPES POUR AJOUTER VOTRE ARTICLE</p>
             <img style="margin: 60px 60px" src="img/sport.png" width="500px">
        <form  id="registration" style="margin:9% 20px" action="ajoutsport2.php" method="post">
              <input type="hidden" name="ids" value="' . $id . '">
            <h2>Ajouter un article</h2>
            <div class="barre"></div>
            <input type="hidden" name="idm" value="' . $id . '">
            <table>
                <tr>
                    <td>Type de Sport/Loisir:</td>
                    <td><input type="text" name="sport" placeholder="Natation"></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="submit" name="button2" value="Ajouter"></td>
                </tr>
            </table>
        </form>
        
        </div>
        <div class="footer">
            <h5> © 1996-2019, Amazon.com, Inc. ou ses filiales. </h5>
        </div>
    </body>
</html>';
        break;
			}
			
							
		
	} else {
		echo "Database not found";
	}
	
	}

	//fermer la connexion
	mysqli_close($db_handle);
	

?>


