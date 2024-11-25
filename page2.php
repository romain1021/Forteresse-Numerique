<?php
// Code valide pour passer au prochain niveau
$valid_code = 'B7R8J2D';

// Vérifie si le code est fourni dans l'URL
if (isset($_GET['code']) && $_GET['code'] === $valid_code) {
    echo "Bravo ! Vous avez accédé au défi suivant.";
} else {
    echo "Code invalide.";
}
?>