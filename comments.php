<?php
$code = "pizza";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de Commentaires - Vulnérable</title>
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
</body>
</html>

<!-- <script>alert(code);</script> -->