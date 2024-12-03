<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="style.css">

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Escape Game Numérique</title>
  
</head>
<body>

<?php
$aideImage='aide.png';
  require_once 'aide.php';
try {
    $db = new PDO('mysql:host=localhost;dbname=escape_game', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $result = $db->query($query);
        $user = $result->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            echo "Connexion réussie ! Vous avez obtenu le code : B7R8J2D5";
        } else {
            echo "Nom d'utilisateur ou mot de passe incorrect.";
        }}
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage();
}

if (isset($_GET['code']) && $_GET['code'] == '213311321') {
    header('Location: page2/comments.php');
    exit;
}
?>
<h1>Connexion a IAsuper power</h1>
 <div class="tile">
<form action="injection.php" method="post">
    <label for="username">Nom d'utilisateur :</label>
    <input type="text" id="username" name="username" required><br><br>
    <label for="password">Mot de passe :</label>
    <input type="password" id="password" name="password" required><br><br>
    <button type="submit">Connexion</button>
</form>
</div>

</body>
</html>

