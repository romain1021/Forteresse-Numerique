<?php
$servername = "localhost";
$username = "root"; 
$password = "";
$dbname = "escape_game";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT code FROM users WHERE username='$username' AND password='$password'";
    echo $sql;
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "Coffre ouvert ! Code : " . $row['code'];
    } else {
        echo "Accès refusé.";
    }
}

$conn->close();
?>