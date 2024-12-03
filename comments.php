<?php
$aideImage='aide2.png';
  require_once 'aide.php';

$code = "pizza";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de Commentaires - Vulnérable</title>
</head>

<body>
<div class="tile">
    <h1>Page de Commentaires - Vulnérable</h1>
    <form method="POST" action="">
        <label for="comment">Votre commentaire :</label><br>
        <textarea id="comment" name="comment" rows="4" cols="50"></textarea><br><br>
        <button type="submit">Soumettre</button>
    </form>

    <h2>Commentaires :</h2>
    <div id="comments-section">
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['comment'])) {
            $comment = $_POST['comment'];
            echo "<script>var code = '$code';</script>";

            echo "<p>$comment</p>";
        }
        ?>
    </div>
</div>
</body>
</html>

<!-- <script>alert(code);</script> -->