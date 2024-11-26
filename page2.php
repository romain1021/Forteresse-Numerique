<?php
$valid_code = 'B7R8J2D';

if (isset($_GET['code']) && $_GET['code'] === $valid_code) {
    echo "Bravo ! Vous avez accédé au défi suivant.";
} else {
    echo "Code invalide.";
}
?>