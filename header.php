<?php
session_start();

// Fonction pour démarrer le chronomètre
function start_timer() {
    $_SESSION['start_time'] = microtime(true);  // Réinitialise l'heure de départ
}

// Fonction pour arrêter le chronomètre
function stop_timer() {
    if (isset($_SESSION['start_time'])) {
        unset($_SESSION['start_time']);  // Arrête le chronomètre en réinitialisant l'heure de départ
    }
}

// Fonction pour afficher le chronomètre via JavaScript
function display_timer() {
    echo "<script>
            function updateTimer() {
                var start_time = " . ($_SESSION['start_time'] !== null ? $_SESSION['start_time'] : 'null') . ";
                var timerElement = document.getElementById('timer');
                if (start_time !== null) {
                    var current_time = (new Date()).getTime() / 1000;
                    var elapsed_time = current_time - start_time;
                    var minutes = Math.floor(elapsed_time / 60);
                    var seconds = Math.floor(elapsed_time % 60);
                    timerElement.textContent = 'Chronomètre : ' + String(minutes).padStart(2, '0') + ':' + String(seconds).padStart(2, '0');
                } else {
                    timerElement.textContent = 'Chronomètre : 00:00';
                }
            }
            setInterval(updateTimer, 1000);
          </script>";
}

?>

<div id="timer" style="position: fixed; top: 10px; left: 10px; font-size: 20px; background: rgba(0, 0, 0, 0.5); color: white; padding: 5px; border-radius: 5px;">Chronomètre : 00:00</div>

<?php
display_timer();
