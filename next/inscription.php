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
}else {
    echo "Connected successfully";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["username"];
        $pass = $_POST["password"];

        $passHash = password_hash($pass, PASSWORD_BCRYPT);
        
        // Préparer la requête d'insertion
        $sql = "INSERT INTO utilisateurs (username, userpass) VALUES ('$name', '$passHash')";
    
        // Exécuter la requête

        if ($conn->query($sql) === TRUE) {
            header("Location: connexion.html");
            exit();
        } else {
            echo "Erreur lors de l'insertion des données : " . $conn->error;
        }
    }
}
?>