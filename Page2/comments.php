<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $comment = trim($_POST['comment']);

    if (!empty($comment)) {
        file_put_contents('comments.txt', $comment . PHP_EOL, FILE_APPEND);
    }

    header('Location: comments.php');
    exit;
}

$comments = [];
if (file_exists('comments.txt')) {
    $comments = file('comments.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escape Game - Défi 2</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #121212;
            color: #ffffff;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 100vh;
            margin: 0;
        }
        .container {
            width: 80%;
            max-width: 600px;
            background: #1e1e1e;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
        }
        textarea, button {
            width: 100%;
            margin: 10px 0;
            padding: 10px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
        }
        button {
            background-color: #007BFF;
            color: white;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .comments {
            margin-top: 20px;
        }
        .comment {
            background: #2e2e2e;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Défi 2 : Le mur de protection</h1>
        <p>Ajoutez un commentaire pour tenter de contourner la sécurité.</p>
        <form action="comments.php" method="POST">
            <textarea name="comment" placeholder="Votre commentaire" required></textarea>
            <button type="submit">Envoyer</button>
        </form>

        <div class="comments">
            <h2>Commentaires :</h2>
            <?php
                foreach ($comments as $c) {
                    echo "<div class='comment'>$c</div>";
                }
            ?>
        </div>
    </div>
</body>
</html>