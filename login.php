<?php
require_once("config.php");

    $db = new PDO('mysql:host='.$config['db_host'].';dbname='.$config['dbname'], $config['db_user'], $config['db_pass']);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_POST['username']) && isset($_POST['password'])) {
        $sth = $db->prepare("SELECT * FROM users WHERE username = :username AND password = :password");
        $sth->execute(['username' => $_POST['username'], 'password' => $_POST['password']]);
        $user = $sth->fetch(PDO::FETCH_ASSOC);
        if ($user && password_verify($_POST['password'], $user['password'])) {
            echo "Connexion réussie! Vous avez obtenu le code: " . htmlspecialchars($user['code']) . ".";
        } else {
            echo "Nom d'utilisateur ou mot de passe incorrect.";
        }
    }

?>

<!-- HTML Form -->
<form action="login.php" method="post">
    <label for="username">Nom d'utilisateur :</label>
    <input type="text" id="username" name="username" required><br><br>
    <label for="password">Mot de passe :</label>
    <input type="password" id="password" name="password" required><br><br>
    <input type="submit" value="Connexion">
</form>
