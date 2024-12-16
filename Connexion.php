<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "escape_game";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $pseudo = $_POST['pseudo'];
        $email = $_POST['email'];

        $stmt = $conn->prepare("INSERT INTO joueur (pseudo, email) VALUES (:pseudo, :email)");
        $stmt->bindParam(':pseudo', $pseudo);
        $stmt->bindParam(':email', $email);

        if ($stmt->execute()) {
            session_start();
            $_SESSION['pseudo'] = $pseudo;
            header('Location: intro.php');
            exit();
        } else {
            echo "Erreur lors de l'ajout du joueur.";
        }
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
?>

<form method="POST" action="">
    <label for="pseudo">Pseudo :</label>
    <input type="text" id="pseudo" name="pseudo" required><br><br>
    <label for="email">Email :</label>
    <input type="email" id="email" name="email" required><br><br>
    <button type="submit">Ajouter Joueur</button>
</form>
