<link rel="stylesheet" href="style.css">
<script src="script.js"></script>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Forteresse Numérique</title>
    
</head>
<body>
    <header>
        <?php require_once 'header.php'; ?>
                <h1>La Forteresse Numérique</h1>
        <h2>BTS SIO 2ème année</h2>
        <h3>Cybersécurité des services informatiques</h3>
    </header>

    <section class="container">
        <img src="DB5B802B-C0BC-42A2-8F4C-0771D4E8DA94.png" alt="Illustration de la Forteresse Numérique" width="300">
        <div class="tile">
        <h2>Résumé</h2>
        <p>Plongez au cœur d'un défi technologique captivant avec <strong>La Forteresse Numérique</strong>, un escape game immersif conçu pour tester vos compétences en cybersécurité. Dans un monde contrôlé par une intelligence artificielle omniprésente, vous devrez faire preuve d'ingéniosité et de réflexion pour surmonter une série d'épreuves et retrouver votre liberté.</p>
        </div>
        <div class="tile">
        <h2>Introduction</h2>
        <p>Bienvenue dans <strong>La Forteresse Numérique</strong>, un projet unique combinant apprentissage et aventure. Imaginez-vous pris au piège dans un environnement informatique complexe, où chaque décision peut faire la différence entre le succès et l'échec. Votre mission sera de déjouer les pièges d'une IA redoutable et de démontrer votre maîtrise des concepts de cybersécurité. Préparez-vous à explorer, analyser et résoudre les mystères qui vous attendent.</p>
</div>
<div class="tile">
        <p><strong>Saurez-vous relever le défi et sortir victorieux ? L'avenir est entre vos mains.</strong></p>
    </section>
    <h1> N'oublie pas le système de login, a partir du moment ou tu appui sur ok tu lance le crono et le plus rapide gagne :</h1>
    <form action="injection.php" method="post">
        <button type="submit" onclick="begin()">Cliquez ici pour commencer</button>
    </form>
</div>
<?php
stop_timer();
function begin() {
    start_timer();

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "escape_game";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO users (username) VALUES ('anonyme')";
    if ($conn->query($sql) === TRUE) {
        $last_id = $conn->insert_id;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();

    $start_time = date('Y-m-d H:i:s');
    $session_sql = "INSERT INTO SessionEnCours (user_id, start_time) VALUES ('$last_id', '$start_time')";

    if ($conn->query($session_sql) === TRUE) {
        $session_id = $conn->insert_id;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
    
}
?>    
    

</body>
</html>
