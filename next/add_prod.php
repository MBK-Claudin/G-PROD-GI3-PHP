<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "g-prod";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Echec de connexion: " . $conn->connect_error);
}else {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nom = $_POST["produit"];
        $quantite = $_POST["quantité"];
        $prix = $_POST["prix"];
        $description = $_POST["description"];
        $statut = $_POST["statut"];

        // recuperation de l'image et 

        $photo_tmp = $_FILES["image"]["tmp_name"];
        $photo_name = $_FILES["image"]["name"];
        $target_directory = 'asset/image/';
        $target_path = $target_directory . basename($photo_name);

        $cleaned_file_name = basename($_FILES["image"]["name"]);
        $target_path = $target_directory . $cleaned_file_name;

        session_start();
        $user = $_SESSION['utilisateur'];
        $userid = $conn->query("SELECT id FROM utilisateurs WHERE username = '$user'");
        $userid = $userid->fetch_assoc();
        $userid = $userid['id'];


        $dateDuJour = date('Y-m-d');

        // Préparer la requête d'insertion
        if (move_uploaded_file($photo_tmp, $target_path)) {
            $sql = "INSERT INTO produits (id_categories, id_utilisateurs, nom_prod, quantite_prod, 
            prix_prod, description_prod, image_prod, statut_prod, created_at) 
            VALUES (1, '$userid', '$nom', '$quantite', '$prix', '$description', '$target_path', '$statut', '$dateDuJour')";
        
            // Exécuter la requête

            if ($conn->query($sql) === TRUE) {
                echo "success";
               /**
                *  header("Location: ../connexion.html");
                *  exit();
                */
            } else {
                echo "Erreur lors de l'insertion des données : " . $conn->error;
            }
        } else {
            echo "Désolé, une erreur s'est produite lors du téléchargement de votre fichier.";
        }
    }
}


?>