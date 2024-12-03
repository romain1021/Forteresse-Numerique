<link rel="stylesheet" href="style.css">
<body>
    <h1>Bienvenue dans le code source !</h1>
    <h2>Tu vas enfin pouvoir réparer l'IA. Pour cela, tu devras corriger son code afin de sécuriser l'accès à son admin.</h2>
    <h1>Quiz : Renforcer la Sécurité</h1>

    <div class="tile">
        <h2>Question 1 : Comment protéger le formulaire contre l’injection SQL ?</h2>
        <form id="quiz1">
            <label><input type="radio" name="answer1" value="1"> Utiliser `htmlspecialchars` pour échapper les caractères spéciaux.</label>
            <label><input type="radio" name="answer1" value="2"> Utiliser des requêtes préparées avec des instructions paramétrées.</label>
            <label><input type="radio" name="answer1" value="3"> Remplacer les caractères spéciaux avec une fonction personnalisée.</label>
        </form>
    </div>

    <div class="tile">
        <h2>Question 2 : Comment protéger la page de commentaires contre les attaques XSS ?</h2>
        <form id="quiz2">
            <label><input type="radio" name="answer2" value="1"> Utiliser `addslashes` pour échapper les guillemets simples et doubles.</label>
            <label><input type="radio" name="answer2" value="2"> Appliquer un filtrage des balises HTML avec `strip_tags`.</label>
            <label><input type="radio" name="answer2" value="3"> Échapper les caractères spéciaux avec `htmlspecialchars`.</label>
        </form>
    </div>

    <div class="tile">
        <h2>Question 3 : Comment renforcer la sécurité de ce système de chiffrement ?</h2>
        <form id="quiz3">
            <label><input type="radio" name="answer3" value="1"> Utiliser une clé de chiffrement aléatoire générée à chaque requête.</label>
            <label><input type="radio" name="answer3" value="2"> Générer dynamiquement un IV aléatoire unique et le stocker avec le texte chiffré.</label>
            <label><input type="radio" name="answer3" value="3"> Utiliser une fonction de hachage comme `md5` pour sécuriser la clé.</label>
        </form>
    </div>

    <button type="button" onclick="checkAnswer()">Valider</button>
    <p class="result" id="result"></p>

    <script>
        function checkAnswer() {
            // Récupérer les réponses des utilisateurs
            const answer1 = document.querySelector('input[name="answer1"]:checked')?.value;
            const answer2 = document.querySelector('input[name="answer2"]:checked')?.value;
            const answer3 = document.querySelector('input[name="answer3"]:checked')?.value;

            // Définir les réponses correctes
            const correctAnswers = ['2', '3', '2'];

            // Vérifier si toutes les réponses sont correctes
            let allCorrect = true;

            if (answer1 !== correctAnswers[0]) {
                allCorrect = false;
            }
            if (answer2 !== correctAnswers[1]) {
                allCorrect = false;
            }
            if (answer3 !== correctAnswers[2]) {
                allCorrect = false;
            }

            // Afficher le message en fonction des résultats
            const resultElement = document.getElementById("result");
            if (allCorrect) {
                window.location.href = "completed.php";
            } else {
                resultElement.style.color = "red";
                resultElement.innerHTML = "Mauvaise réponse. Essayez encore.";
            }
        }
    </script>
</body>
</html>