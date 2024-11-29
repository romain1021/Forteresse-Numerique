<?php
if (isset($_GET['code'])) {
    // Récupération du code en tant que chaîne
    $code = strval($_GET['code']);

    // Redirection en fonction de la valeur de $code
    switch ($code) {
        case '1':
            header("Location: injection.php");
            exit();
        case 'B7R8J2D5':
            header("Location: comments.php");
            exit();
        case 'pizza':
            header("Location: decryptage.php");
            exit();
        case 'TuYEstPresque':
            header("final.php");
            exit();
        
        default:
            echo "Code invalide.";
            exit();
    }
} else {
    // Rediriger par défaut vers 'injection.php' si le paramètre 'code' est absent
    header("Location: intro.php");
    exit();
}
?>