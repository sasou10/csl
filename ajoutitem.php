<?php
    session_start();
?>

<!DOCTYPEhtml>
<html>
    <head>  
        <link rel="stylesheet" href="style.css" type="text/css">
        <meta charset="utf-8">
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
           <img style="margin: 60px 60px" src="img/cat.png" width="500px">
        <form id="registration" style="margin: 10px 60px" action="ajoutitem2.php" method="post">
            <h2>Ajout Item</h2>
            <div class="barre"></div>
            <table>
<br>
                <tr>
                    <td>Nom:</td>
                    <td><input type="text" name="nom"></td>
                </tr>
                <tr>
                    <td>Photo (au format jpg) :</td>
                    <td><input type="file" name="photo"></td>
                </tr>
                <tr>
                    <td>Description:</td>
                    <td><input type="text" name="description"></td>
                </tr>
                <tr>
                    <td>video:</td>
                    <td><input type="file" name="video"></td>
                </tr>
                <tr>
                    <td>prix:</td>
                    <td><input type="number" name="prix"></td>
                </tr>

                <tr>
                    <td>quantite:</td>
                    <td><input type="number" name="quantite"></td>
                </tr>

                <tr><td>Catégorie:</td> 
                    <td>
					<select name="categorie">
                        <option value="choix">Sélectionner la catégorie de votre item:</option>    
                        <option value="livre">Livre</option>
                        <option value="vetement">Vetement</option>
                        <option value="musique">Musique</option>
                        <option value="sport">Sport</option>
                    </select>
                    </td>
                </tr>

                <tr>
                    <td colspan="2" align="center"><input type="submit" name="button2" value="Poursuivre"></td>
                </tr>
            </table>
        </form>
        </div>
        <div class="footer">
            <h5> © 1996-2019, Amazon.com, Inc. ou ses filiales. </h5>
        </div>
    </body>
</html>