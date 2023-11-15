<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "g-prod";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Récupérer les utilisateurs depuis la base de données
$sql = "SELECT * FROM produits";
$result = $conn->query($sql);
//$data = $result->fetch_assoc();

// Fermer la connexion à la base de données
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <title>Liste des Utilisateurs</title>
</head>
<body>

<div class="container mt-5">
<h1>G-PROD</h1>
        <a href="add_prod.html" class="btn btn-primary">Ajouter un produit</a>
        <br><br>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Liste des produits
                </div>
                <div class="card-body">
                    <!-- Tableau pour afficher les utilisateurs -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th>nom</th>
                                <th>description</th>
                                <th>quantite</th>
                                <th>prix</th>
                                <th>Image</th>
                                <!-- Ajoute d'autres colonnes en fonction de ta base de données -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Afficher les utilisateurs dans le tableau
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row["nom_prod"] . "</td>";
                                echo "<td>" . $row["description_prod"] . "</td>";
                                echo "<td>" . $row["quantite_prod"] . "</td>";
                                echo "<td>" . $row["prix_prod"] . "</td>";
                                echo "<td><img src='" . $row["image_prod"] . "' alt='Image' style= 'display: inline; margin: auto; width: 100px'></td>";
                                // Remplace "image_url" par le nom de la colonne contenant les liens vers les images
                                // Ajoute d'autres cellules en fonction de ta base de données
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                    <!-- Fin du tableau -->
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
