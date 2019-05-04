<!DOCTYPEhtml>
<html>
    <head>  
        <link rel="stylesheet" href="style.css" type="text/css">
        <meta charset="utf-8">
        <style>
            .content{
                background-image: url(img/lala.png);
                background-size: 100% 100%;
                
            }
            #registration{
                opacity: 0.85;
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
                <li><a href="vendre.php">Vendre</a></li>
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
        <div id="registration">
<h2>Create an Account</h2>
            <div class="barre"></div>
<form id="RegisterUserForm" action="" method="post">
<fieldset>

<label for="email">Email</label> <input class="text" id="email" type="email" name="email" value="" /><br> <br>
<label for="password">Password</label> <input class="text" id="password" type="password" name="password" /><br> <br>
 
<input  id="acceptTerms" type="checkbox" name="acceptTerms" />
 <label style="margin-left:-180px" for="acceptTerms"> I agree to the <a>Terms and Conditions</a> and <a>Privacy Policy</a> </label> <br> <br>
 
<button id="registerNew" type="submit">Se connecter</button></fieldset>
</form>
        <a href="ajoututilisateur.php">Pas encore inscrit ?</a>
            </div>
            </div>
        <div class="footer">
            <h5> © 1996-2019, Amazon.com, Inc. ou ses filiales. </h5>
        </div>
    </body>
</html>