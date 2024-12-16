<?php
require_once 'header.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leaderboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Leaderboard</h1>
    <table>
        <thead>
            <tr>
                <th>Pseudo</th>
                <th>Temps</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $conn = new PDO("mysql:host=localhost;dbname=escape_game", "root", "");
            $stmt = $conn->prepare("SELECT pseudo, time FROM leaderboard ORDER BY time ASC");
            $stmt->execute();
            $results = $stmt->fetchAll();
            foreach ($results as $result) {
                echo "<tr><td>" . htmlspecialchars($result['pseudo']) . "</td><td>" . htmlspecialchars($result['time']) . "</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
