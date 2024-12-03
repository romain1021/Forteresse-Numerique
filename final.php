
<!DOCTYPE html>
<html lang="fr">
<head>
    <link rel="stylesheet" href="style.css">
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz de Sécurité - Défi 4</title>

</head>
<body>
<h1>Bienvenue dans le code source !</h1>
<h2>tu vas enfin pouvoir reparer l'IA, pour cela tu vas devoir reparer son code affin de securiser l'acceès a son admin</h2>
    <h1>Quiz : Renforcer la Sécurité</h1>

    <div class="tile">
        <h2>Question 1 : Quelle est la meilleure façon de sécuriser le chiffrement ?</h2>
        <form id="quiz1">
            <label><input type="radio" name="answer" value="1"> Utiliser une clé aléatoire générée à chaque requête.</label>
            <label><input type="radio" name="answer" value="2"> Générer un IV unique et l'associer avec le texte chiffré.</label>
            <label><input type="radio" name="answer" value="3"> Utiliser une fonction de hachage comme `md5` pour protéger la clé.</label>
            <button type="button" onclick="checkAnswer(1, 2)">Valider</button>
            <p class="result" id="result1"></p>
        </form>
    </div>

    <div class="tile">
        <h2>Question 2 : Pourquoi l’utilisation d’un IV statique est-elle une mauvaise pratique ?</h2>
        <form id="quiz2">
            <label><input type="radio" name="answer" value="1"> Cela rend chaque texte chiffré unique.</label>
            <label><input type="radio" name="answer" value="2"> Cela facilite les attaques par analyse de motifs.</label>
            <label><input type="radio" name="answer" value="3"> Cela empêche le texte d’être déchiffré correctement.</label>
            <button type="button" onclick="checkAnswer(2, 2)">Valider</button>
            <p class="result" id="result2"></p>
        </form>
    </div>

    <div class="tile">
        <h2>Question 3 : Quelle fonction utiliser pour transformer les caractères spéciaux ?</h2>
        <form id="quiz3">
            <label><input type="radio" name="answer" value="1"> `addslashes`</label>
            <label><input type="radio" name="answer" value="2"> `strip_tags`</label>
            <label><input type="radio" name="answer" value="3"> `htmlspecialchars`</label>
            <button type="button" onclick="checkAnswer(3, 3)">Valider</button>
            <p class="result" id="result3"></p>
        </form>
    </div>

    <script>
        function checkAnswer(quizId, correctAnswer) {
            const form = document.getElementById(`quiz${quizId}`);
            const result = document.getElementById(`result${quizId}`);
            const answer = form.querySelector('input[name="answer"]:checked');

            if (!answer) {
                result.textContent = "Veuillez sélectionner une réponse.";
                result.style.color = "#ff0000";
                return;
            }

            if (parseInt(answer.value) === correctAnswer) {
                result.textContent = "Bonne réponse !";
                result.style.color = "#00ff00";
            } else {
                result.textContent = "Mauvaise réponse. Essayez encore.";
                result.style.color = "#ff0000";
            }
        }
    </script>
</body>
</html>