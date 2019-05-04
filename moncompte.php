<?php
// On démarre la session (ceci est indispensable dans toutes les pages de notre section membre)
session_start ();

?>

<!DOCTYPE html>
<html>
    <head>
		<title> Bienvenue ! </title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="style.css" type="text/css">
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

                <li><a href="ventesflash.html">Ventes Flash</a></li>
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
<?php

// On récupère nos variables de session
if (isset($_SESSION['mail']) && isset($_SESSION['mdp'])) {

	// On teste pour voir si nos variables ont bien été enregistrées
	echo '<html>';
	echo '<head>';
	echo '<title> Page membre</title>';
	echo '</head>';

	echo '<body>';
    echo '<h4> Bienvenue ' .$_SESSION['nom'] . '</h4> <br>';
	echo 'Votre login est '.$_SESSION['mail'].' et votre mot de passe est '.$_SESSION['mdp'].'.';

if ($_SESSION['categorie'] == 'vendeur')
{
	echo 'Voici votre photo' . $_SESSION['photo'];
}

else if ($_SESSION['categorie']== 'acheteur')
{
	echo 'Vos informaions sont : <br> Votre adresse : ' .$_SESSION['adresse']. '<br> Votre numero de carte : ' .$_SESSION['numerocarte'].'<br> Type de carte : '. $_SESSION['card']. '<br> Date expiration : ' .$_SESSION['dateexp']. '<br> Code : ' .$_SESSION['code'];
}

	echo '<br />';

	// On affiche un lien pour fermer notre session
	echo '<a href="deco.php">Déconnection</a>';
}
else {
	echo 'Les variables ne sont pas déclarées.';
}
?>

</div>