<!DOCTYPEhtml>

<?php
//recuperer les données venant de la page HTML


$mail = isset($_POST["mail"])? $_POST["mail"] : "";
$pseudo = isset($_POST["pseudo"])? $_POST["pseudo"] : "";
$nom = isset($_POST["nom"])? $_POST["nom"] : "";
$prenom = isset($_POST["prenom"])? $_POST["prenom"] : "";
$mdp = isset($_POST["mdp"])? $_POST["mdp"] : "";
$categorie = $_POST["categorie"];

$database = "projetweb";
	
	$db_handle = mysqli_connect('localhost', 'root', '');
	$db_found = mysqli_select_db($db_handle, $database);


if ($_POST["button2"]) {
	if ($db_found) {
		$sql = "SELECT * FROM utilisateurs";
		if ($mail != "") {
			
			$sql .= " WHERE mail LIKE '%$mail%'";
			
		}
		$result = mysqli_query($db_handle, $sql);
		//regarder s'il y a de résultat
		if (mysqli_num_rows($result) != 0) {
			//le mail est déjà dans la BDD
			echo "Un compte a déja été créé avec cette adresse mail.";
		} else {
						
			$sql = "INSERT INTO utilisateurs(mail,pseudo,nom,prenom,mdp)
			       VALUES('$mail', '$pseudo', '$nom', '$prenom', '$mdp')";
			$result = mysqli_query($db_handle, $sql);
			echo "Add successful." . "<br>";
			//on affiche le livre ajouté
			$sql = "SELECT * FROM utilisateurs";
			if ($mail != "") {
				//on cherche le livre avec les paramètres titre et auteur
				$sql .= " WHERE mail LIKE '%$mail%'";
			}
			$result = mysqli_query($db_handle, $sql);
			while ($data = mysqli_fetch_assoc($result)) {
				/*echo "Vos informations personnelles:" . "<br>";
				
				echo "mail: " . $data['mail'] . "<br>";
				echo "pseudo: " . $data['pseudo'] . "<br>";
				echo "nom: " . $data['nom'] . "<br>";
				echo "prenom: " . $data['prenom'] . "<br>";
				echo "mdp: " . $data['mdp'] . "<br>";
				echo "<br>";*/
                session_start();
        $_SESSION['mail'] = $_POST['mail'];
        $_SESSION['pseudo'] = $_POST['pseudo'];
        $_SESSION['nom'] = $_POST['nom'];
        $_SESSION['prenom'] = $_POST['prenom'];
        $_SESSION['mdp'] = $_POST['mdp'];
        $_SESSION['categorie'] = $_POST['categorie'];

			}
			
			
			
			
			switch ($categorie) {
			case "vendeur":
			
			echo '<html>
    <head>
        <meta charset="utf-8">
        <title> Nouveau vendeur</title>
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
            <img class="iconn" src="img/conn.png">
        <form id="registration" style="margin: 20px 60px"action="ajoutvendeur2.php" method="post">
        <h2>Inscription Vendeur</h2>
            <div class="barre"></div>
		<input type="hidden" name="mailv" value="' . $mail . '">
            <table>
                <tr>
                    <td>Photo:</td>
                    <td><input type="file" name="photo"></td>
                </tr>
                <tr>
                    <td>Image de fond:</td>
                    <td><input type="file" name="image"></td>
                </tr>

                <tr>
                    <td colspan="2" align="center"><h6 style="color:grey">En cliquant sur "Je minscris !", vous acceptez nos Conditions générales. Découvrez comment nous recueillons, utilisons et partageons vos données en lisant notre Politique d’utilisation des données et comment nous utilisons les cookies et autres technologies similaires en consultant notre Politique d’utilisation des cookies.</h6> <input type="submit" name="button2" value="Je minscris !"></td>
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
		
			case "acheteur":
			echo '<html>          
    <head>
        <title> Bienvenue ! </title>
        <link rel="stylesheet" href="style.css" type="text/css">
        <style>
            .content{
               background-image:linear-gradient(white, grey);
                
            }
        
        </style>
        <meta charset="utf-8">
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
        <img class="iconn" src="img/conn.png">
          <form id="registration" style="margin:-10px 60px" action="ajoutacheteur2.php" method="post">
                <h2>Inscription Acheteur</h2>
            <div class="barre"></div>
			<input type="hidden" name="maila" value="' . $mail . '">
                <table>
                    
                    <tr>
                        <td>Adresse:</td>
                        <td><input type="text" name="adresse" placeholder="37 Quai de Grenelle"></td>
                    </tr>
                    <tr>
                        
                        <td>Type de carte:</td>
                        <td>
                            <input style="width:20%" type="radio" name="card" value="mastercard" ><img src="image1.png"  width="10%">
                    <input style="width:20%" type="radio" name="card" value="visa" ><img src="image2.png"  width="10%"></td>
                       <!-- 
                            <input style="width:20%" type="image" name="mastercard" value="image1" src="image1.png" >
      <input type="radio" name="mastercard" value="image2" id="image2"> <label for="image2"><img src="image2.png"  width="10%"></label><br>!-->
                        
                    </tr>
                    <tr>
                        <td >numero de carte:</td>
                        <td><input type="number" name="numerocarte"></td>
                    </tr>
                    <tr>
                        <td>date expiration:</td>
                        <td><input type="month" name="dateexp" placeholder="avril/2019"></td>
                    </tr>
                    <tr>
                        <td> Security code:</td>
                        <td><input type="number" name="code" placeholder="inscris au dos de la carte"></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"><h6 style="color:grey">En cliquant sur "Je minscris !", vous acceptez nos Conditions générales. Découvrez comment nous recueillons, utilisons et partageons vos données en lisant notre Politique d’utilisation des données et comment nous utilisons les cookies et autres technologies similaires en consultant notre Politique d’utilisation des cookies. </h6> <input type="submit" name="button2" value="Je minscris !"></td>
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
	}
	}	else {
		echo "Database not found";
	}
}//fermer la connexion
mysqli_close($db_handle);
?>