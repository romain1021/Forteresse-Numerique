<?php
$aideImage='aide3.jpg';
  require_once 'aide.php';

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
<link rel="stylesheet" href="style.css">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Défi de Décryptage</title>
</head>

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