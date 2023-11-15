<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "g-prod";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else {
    echo "Connected successfully";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["username"];
        $pass = $_POST["password"];
        
        $sql = "SELECT * FROM utilisateurs WHERE username = '$name'";
        $user = $conn->query($sql);
      
        if ($user->num_rows > 0) {
            $row = $user->fetch_assoc();
            $hashedPassword = $row["userpass"];

            session_start();
            $_SESSION['utilisateur'] = $row["username"];
            
            if(password_verify($pass, $hashedPassword)){
                header("Location: produit.php");
                exit();
            }else{
                echo "mot de passe incorrect";
            }
        } else {
            echo "Aucunutilisateur trouver : " . $conn->error;
        }
    }
}

?>