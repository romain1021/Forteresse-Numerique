<?php
$originalPassword = "TuYEstPresque";
$key = "google";
$iv = substr("initvector123456", 0, 16);
$encryptedPassword = openssl_encrypt($originalPassword, "AES-256-CBC", $key, 0, $iv);

$decryptedPassword = null; 
$message = ""; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userInput = $_POST['password'] ?? '';

    $decryptedPassword = openssl_decrypt($encryptedPassword, "AES-256-CBC", $key, 0, $iv);

    if ($key === $userInput) {
        $message =$originalPassword;
    } else {
        $message = "Échec. Le mot de passe est incorrect.";
    }
}
?>
<!-- biggest search engin in the world -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Défi de Décryptage</title>
</head>
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
<body>
    <h1>Défi de Décryptage</h1>
    <p>Votre mission : Décryptez la chaîne chiffrée pour trouver le mot de passe et ouvrir la porte.</p>

    <h2>Chaîne chiffrée :</h2>
    <p><strong><?= htmlspecialchars($encryptedPassword) ?></strong></p>

    <h2>Indice :</h2>

    <form method="POST" action="">
        <label for="password">Entrez le mot de passe décrypté :</label><br>
        <input type="text" id="password" name="password" required>
        <button type="submit">Vérifier</button>
    </form>

    <?php if (!empty($message)) : ?>
        <p><strong><?= htmlspecialchars($message) ?></strong></p>
    <?php endif; ?>
</body>
</html>