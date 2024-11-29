<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Escape Game Numérique</title>
  <style>
    body {
      background-color: #121212;
      color: #fff;
      font-family: Arial, sans-serif;
      text-align: center;
      padding: 20px;
    }
    form {
      margin-top: 50px;
    }
    input {
      padding: 10px;
      margin: 5px;
      border-radius: 5px;
      border: 1px solid #333;
      background-color: #222;
      color: #fff;
    }
    button {
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      background-color: #00aaff;
      color: #fff;
      cursor: pointer;
    }
  </style>
</head>
<body>

<?php
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
        }
    }
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage();
}

if (isset($_GET['code']) && $_GET['code'] == '213311321') {
    header('Location: page2/comments.php');
    exit;
}
?>

<form action="injection.php" method="post">
    <label for="username">Nom d'utilisateur :</label>
    <input type="text" id="username" name="username" required><br><br>
    <label for="password">Mot de passe :</label>
    <input type="password" id="password" name="password" required><br><br>
    <button type="submit">Connexion</button>
</form>

</body>
</html>