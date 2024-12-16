<?php
session_start();
require_once ('header.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $start_time = date('Y-m-d H:i:s');
    $_SESSION['start_time'] = $start_time;
    header('Location: injection.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>intro</title>
</head>
<body>
    <h2>Tu peux jouer en cliquant sur le bouton suivant, mais attention ! si tu appuie sur jouer, un chronomètre vas se lancer ! bon courrage </h2>
        
    <form method="post">
        <button type="submit">Jouer</button>
    </form>
</body>
</html>

