<?php
    session_start();
?>

<!DOCTYPE html>
<html>

    <head>
        <title>ECE AMAZON</title>
        <link rel="stylesheet" href="style.css" type="text/css">
        <meta charset="UTF-8">
        
        
        <script type="text/javascript">

var tab = ["img/img1.jpg", "img/img2.jpg", "img/img3.jpg","img/img4.jpg"];
var secondes = 5;
var numero = -1;
var aleatoire = false;

function changerImage () {
if (aleatoire) {
var n = numero;
while (n == numero) {
n = Math.floor(Math.random() * tab.length); }
numero = n;
}
else {
numero++;
if (numero >= tab.length) numero =0;
}
document.getElementById('img/img1').src =
tab[numero];
setTimeout("changerImage();", secondes*1000);
}

// -->
</script>

    </head>

    <body>    <!--<div class="header">
        <img src="img/amazon.png" width="20%">
        <h1>ECE AMAZON</h1>
        </div>!-->
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
        <p> <br> </p>
  <!--  <marquee scrollamount="4">!-->
<img src="" id="img/img1" height="400px" width="100%">

<!--</marquee>!-->
    <!--<p><marquee direction="left" onmouseover="this.stop()" onmouseout="this.start()">&nbsp;
</marquee></p>!-->
    <script type="text/javascript">
<!--

changerImage();

// -->
</script>
    
    <p> VOUS POUVEZ NOUS RETROUVER ICI :</p>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2625.3229716140927!2d2.283929350848157!3d48.852051379185184!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e6701b4f58251b%3A0x167f5a60fb94aa76!2sECE+Paris.Lyon!5e0!3m2!1sfr!2sfr!4v1556614508835!5m2!1sfr!2sfr" width="600" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
        
        </div>
        
        
<div class="footer">
       <h5> © 1996-2019, Amazon.com, Inc. ou ses filiales. </h5>
        </div>
    </body>
</html>
