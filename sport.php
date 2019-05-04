<?php
    session_start();
?>

<!DOCTYPE html>
<html>

    <head>
        <title>ECE AMAZON</title>
        <link rel="stylesheet" href="style.css" type="text/css">
        <meta charset="UTF-8">

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

<!DOCTYPE html>
<?php

$id = isset($_POST["ids1"])? $_POST["ids1"] : 0;


//identifier votre BDD
    $database = "projetweb";
    //connectez-vous dans votre BDD
    //Rappel: votre serveur = localhost et votre login = root et votre password = <rien>
    $db_handle = mysqli_connect('localhost', 'root', '');
    $db_found = mysqli_select_db($db_handle, $database);
        
        if ($db_found) {

            $sql = "SELECT * FROM items
            INNER JOIN sports
            ON items.id = sports.id";

            $result = mysqli_query($db_handle, $sql);

            if (mysqli_num_rows($result) != 0) {

            $sql = "SELECT * FROM items
            INNER JOIN sports
            ON items.id = sports.id
            WHERE sports.id = '$id'";


            $result = mysqli_query($db_handle, $sql);

    
        while ($data = mysqli_fetch_assoc($result)) {
                    
                    echo '<h3>' . $data['nom'] .'</h3> </a><br>';
                    
                    echo "id: " . $data['id'] . "<br>";
                    echo "photo: " . $data['photo'] . "<br>";
                    echo "description: " . $data['description'] . "<br>";
                    echo "video: " . $data['video'] . "<br>";
                    echo "prix: " . $data['prix'] . "<br>";
                    echo "quantite: " . $data['quantite'] . "<br>";

                    echo "<br>";
					
					echo '
                    <form action="ajoutpanier.php" method="post">
                    <input type="hidden" name="idp" value="' . $data['id'] . '">
                    
                    <table>
                    <tr>
                    <td>Quantite à acheter:</td>
                    <td><input type="number" name="quantitep"></td>
                    </tr>
                    <tr>
                    <td>Mail:</td>
                    <td><input type="text" name="mailp"></td>
                    </tr>
                    <tr>
                    <td colspan="2" align="center"><input type="submit" name="buttonp" value="Ajouter au panier"></td>
                    </tr>
                    </table>
                    </form>';
                    
                    echo "<br>";
                }
            }

        
    }


?>
    
    <p> VOUS POUVEZ NOUS RETROUVER ICI :</p>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2625.3229716140927!2d2.283929350848157!3d48.852051379185184!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e6701b4f58251b%3A0x167f5a60fb94aa76!2sECE+Paris.Lyon!5e0!3m2!1sfr!2sfr!4v1556614508835!5m2!1sfr!2sfr" width="600" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
        
 </div>
        
        
<div class="footer">
       <h5> © 1996-2019, Amazon.com, Inc. ou ses filiales. </h5>
        </div>
    </body>
</html>