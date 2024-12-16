<?php
if (!isset($_SESSION['start_time'])) {
    $_SESSION['start_time'] = date('Y-m-d H:i:s');
}
$start_time = strtotime($_SESSION['start_time']);
$current_time = time();
$elapsed_time = $current_time - $start_time;
$minutes = floor($elapsed_time / 60);
$seconds = $elapsed_time % 60;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Site</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
        }
        header {
            background: linear-gradient(135deg, #007bff, #00c6ff);
            color: white;
            padding: 20px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .logo {
            font-size: 24px;
            font-weight: bold;
        }
        nav ul {
            list-style: none;
            display: flex;
        }
        nav ul li {
            margin-left: 20px;
        }
        nav ul li a {
            color: white;
            text-decoration: none;
            font-size: 18px;
            transition: color 0.3s ease;
        }
        nav ul li a:hover {
            color: #ffe600;
        }
        .timer {
            font-size: 20px;
            font-weight: bold;
            background: rgba(255, 255, 255, 0.2);
            padding: 5px 15px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
<header>
    <div class="logo">Mon Site</div>
    <nav>
        <ul>
            <li><a href="#">Accueil</a></li>
            <li><a href="#">À propos</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </nav>
    <div class="timer" id="timer-header"><?php echo sprintf('%d:%02d', $minutes, $seconds); ?></div>
</header>

<script>
    let elapsedSeconds = <?php echo $elapsed_time; ?>;

    function updateHeaderTimer() {
        elapsedSeconds++;
        const minutes = Math.floor(elapsedSeconds / 60);
        const seconds = elapsedSeconds % 60;
        document.getElementById("timer-header").textContent = `${minutes}:${seconds.toString().padStart(2, '0')}`;
    }

    setInterval(updateHeaderTimer, 1000);
</script>
</body>
</html>