<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
		<title> Bienvenue ! </title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="style.css" type="text/css">
        <style>
            .content{
               background-image:linear-gradient(white, gray);
                
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
                <li><a href="ajoutitem.php">Vendre</a></li>

                <!-- changement de page si util connecté -->
                <?php
                if (isset($_SESSION['mail']) && isset($_SESSION['mdp'])) {
                ?>

                <li><a href="moncompte.php">Votre Compte</a></li>

                <?php
                } else { ?>

                    <li><a href="ajoututilisateur.php">Votre Compte</a></li>

                 <?php } 
                 ?>            

                <li><a href="admin.php">Admin</a></li>
                <a href="panier.php" style="float:right"><img src="img/panier.png" width="20px" > Panier </a>
            </ul>
        </div>
        <div class="content">
            <img class="iconn" src="img/conn.png">
            <form id="registration" style="margin:0px 3%"action="ajoutut.php" method="post">
                 <h2>Inscription</h2>
            <div class="barre"></div>
                <table>
                    <tr>
                        <td>Mail:</td>
                        <td><input type="email" name="mail" placeholder="ex : manolo.hina@edu.ece.fr"></td>
                    </tr>
                    <tr>
                        <td>Pseudo:</td>
                        <td><input type="text" name="pseudo" placeholder="manolo1234"></td>
                    </tr>
                    <tr>
                        <td>Nom:</td>
                        <td><input type="text" name="nom"></td>
                    </tr>
                    <tr>
                        <td>Prenom:</td>
                        <td><input type="text" name="prenom"></td>
                    </tr>
                    <tr>
                        <td>Mot de Passe:</td>
                        <td><input type="password" name="mdp"></td>
                    </tr>
					
					<tr>
						<td>categorie d'utilisateur:</td>
						<td>
							<input style="width:10%" type="radio" id="vendeur" name="categorie" value="vendeur">
							<label for="vendeur">Vendeur</label>
							<input style="width:10%" type="radio" id="acheteur" name="categorie" value="acheteur">
                            <label for="acheteur">Acheteur</label>

						</td>
					</tr>
                   
                    <tr> 
                        <td colspan="2" align="center"><h6 style="color:grey">En cliquant sur "Je m'inscris !", vous acceptez nos Conditions générales. Découvrez comment nous recueillons, utilisons et partageons vos données en lisant notre Politique d’utilisation des données et comment nous utilisons les cookies et autres technologies similaires en consultant notre Politique d’utilisation des cookies.</h6> <input type="submit" name="button2" value="Je m'inscris !"></td>
                        
                    </tr>
                </table>
            </form>
        </div>
        <div class="footer">
            <h5> © 1996-2019, Amazon.com, Inc. ou ses filiales. </h5>
        </div>
    </body>
</html>