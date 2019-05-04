<?php
    session_start();
?>

<!DOCTYPE html>
<?php

$id = isset($_POST["idl1"])? $_POST["idl1"] : 0;

//identifier votre BDD
	$database = "projetweb";
	//connectez-vous dans votre BDD
	//Rappel: votre serveur = localhost et votre login = root et votre password = <rien>
	$db_handle = mysqli_connect('localhost', 'root', '');
	$db_found = mysqli_select_db($db_handle, $database);
		
		if ($db_found) {

			$sql = "SELECT * FROM items
            INNER JOIN livres
            ON items.id = livres.id";

            $result = mysqli_query($db_handle, $sql);

            if (mysqli_num_rows($result) != 0) {

            $sql = "SELECT * FROM items
            INNER JOIN livres
            ON items.id = livres.id
            WHERE items.id = '$id'";


            $result = mysqli_query($db_handle, $sql);

    
    	while ($data = mysqli_fetch_assoc($result)) {
                    
                    echo '<h3>' . $data['nom'] .'</h3> </a><br>';
                    
                    echo "id: " . $data['id'] . "<br>";
                    echo "photo: " . $data['photo'] . "<br>";
                    echo "description: " . $data['description'] . "<br>";
                    echo "video: " . $data['video'] . "<br>";
                    echo "prix: " . $data['prix'] . "<br>";
                    echo "quantite: " . $data['quantite'] . "<br>";
                    echo "titre " . $data['titre'] . "<br>";
                    echo "auteur: " . $data['auteur'] . "<br>";
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