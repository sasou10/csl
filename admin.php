<?php
    session_start();
?>

<!DOCTYPE html>
<html>

    <head>
        <title> Administrateur </title>
        <link rel="stylesheet" href="style.css" type="text/css">
        <meta charset="UTF-8">

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

<div class="content" align="center">
        
        <h1> Bienvenue dans votre espace Administrateur <br></h1>

        <h3>  Veuillez vous connecter <br> <br> </h3>

<form action="admin2.php" method="post">
	<table>
		<tr>
			<td> Mail :</td>
			<td><input type="email" name="mail"></td>
		</tr>
		<tr>
			<td> Mot de passe :</td>
			<td><input type="text" name="mdp"></td>
		</tr>
		<tr>
			<td colspan="2" align="center"><input type="submit" name="button" value="Valider"></td>
		</tr>
	</table>
</form>



    
    <p> <br> VOUS POUVEZ NOUS RETROUVER ICI :</p>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2625.3229716140927!2d2.283929350848157!3d48.852051379185184!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e6701b4f58251b%3A0x167f5a60fb94aa76!2sECE+Paris.Lyon!5e0!3m2!1sfr!2sfr!4v1556614508835!5m2!1sfr!2sfr" width="600" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
        
        </div>
        
        
<div class="footer">
       <h5> © 1996-2019, Amazon.com, Inc. ou ses filiales. </h5>
        </div>
    </body>
</html>