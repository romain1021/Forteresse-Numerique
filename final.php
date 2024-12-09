<link rel="stylesheet" href="style.css">
<body>
    <h1>Bienvenue dans le code source !</h1>
    <h2>Tu vas enfin pouvoir réparer l'IA. Pour cela, tu devras corriger son code afin de sécuriser l'accès à son admin.</h2>
    <h1>Quiz : Renforcer la Sécurité</h1>

    <div class="tile">
        <h2>Question 1 : Comment protéger le formulaire contre l’injection SQL ?</h2>
        <form id="quiz1">
        <img src="1.png" alt="aide3" class='zoom'>

            <label><input type="radio" name="answer1" value="1"> Utiliser `htmlspecialchars` pour échapper les caractères spéciaux.</label>
            <label><input type="radio" name="answer1" value="2"> Utiliser des requêtes préparées avec des instructions paramétrées.</label>
            <label><input type="radio" name="answer1" value="3"> Remplacer les caractères spéciaux avec une fonction personnalisée.</label>
        </form>
    </div>

    <div class="tile">
        <h2>Question 2 : Comment protéger la page de commentaires contre les attaques XSS ?</h2>
        <form id="quiz2">
        <img src="2.png" alt="aide3" class='zoom'>

            <label><input type="radio" name="answer2" value="1"> Utiliser `addslashes` pour échapper les guillemets simples et doubles.</label>
            <label><input type="radio" name="answer2" value="2"> Appliquer un filtrage des balises HTML avec `strip_tags`.</label>
            <label><input type="radio" name="answer2" value="3"> Échapper les caractères spéciaux avec `htmlspecialchars`.</label>
        </form>
    </div>

    <div class="tile">
        <h2>Question 3 : Comment renforcer la sécurité de ce système de chiffrement ?</h2>
        <form id="quiz3">
            <img src="3.png" alt="aide3" class='zoom'>
            <label><input type="radio" name="answer3" value="1"> Utiliser une clé de chiffrement aléatoire générée à chaque requête.</label>
            <label><input type="radio" name="answer3" value="2"> Générer dynamiquement un IV aléatoire unique et le stocker avec le texte chiffré.</label>
            <label><input type="radio" name="answer3" value="3"> Utiliser une fonction de hachage comme `md5` pour sécuriser la clé.</label>
        </form>
    </div>

    <button type="button" onclick="checkAnswer()">Valider</button>
    <p class="result" id="result"></p>

    <?php
    $nbPoints = 0;

    if (isset($_POST['answer1']) && $_POST['answer1'] == 2) {
        $nbPoints++;
    }
    if (isset($_POST['answer2']) && $_POST['answer2'] == 3) {
        $nbPoints++;
    }
    if (isset($_POST['answer3']) && $_POST['answer3'] == 2) {
        $nbPoints++;
    }

    if ($nbPoints == 3) {
        header("Location: completed.php");
        exit;
    } else {
        $messages = array();
        if (isset($_POST['answer1']) && $_POST['answer1'] != 2) {
            $messages[] = "Question 1 : la réponse est incorrecte.";
        }
        if (isset($_POST['answer2']) && $_POST['answer2'] != 3) {
            $messages[] = "Question 2 : la réponse est incorrecte.";
        }
        if (isset($_POST['answer3']) && $_POST['answer3'] != 2) {
            $messages[] = "Question 3 : la réponse est incorrecte.";
        }
        echo "<p class='result'>Vous avez " . $nbPoints . " points sur 3. Erreurs :<br>" . implode("<br>", $messages) . "</p>";
    }
    ?>
</body>
</html>