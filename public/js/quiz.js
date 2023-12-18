function initializeQuiz(quizData) {
    // quizData est une variable globale définie dans le fichier HTML
    // qui contient les données du quiz (questionId, submitUrl, etc.)
    let timeLeft = 10;
    let score = 0;
    let questionsAnswered = 0;
    const maxScore = 3;
    const timerElement = document.getElementById("timer");
    const scoreElement = document.getElementById("score");
    const endMessageElement = document.getElementById("end-message");
    let countdown;

    // Vérification de la présence des éléments HTML
    if (!timerElement || !scoreElement || !endMessageElement) {
        console.error("Un element HTML manque.");
        return;
    }

    scoreElement.innerText = `Score: ${score}`;

    const answerForm = document.getElementById("answer-form");
    if (!answerForm) {
        console.error("Answer form not found.");
        return;
    }

    // Gestion de la soumission du formulaire
    answerForm.addEventListener("submit", function (event) {
        event.preventDefault();
        submitAnswer();
    });


    const submitAnswer = () => {
        const answer = document.getElementById("answer").value || "TIMEOUT";
        // Envoi de la réponse au serveur
        axios
            .post(quizData.submitUrl, {
                answer: answer,
                question_id: quizData.questionId,
            })
            .then((response) => {
                const data = response.data;
                questionsAnswered += 1;

                //validation de la réponse
                if (data.correct) {
                    score += 1;
                    scoreElement.innerText = `Score: ${score}`;
                } else {
                    timerElement.innerHTML =
                        '<span class="text-danger">Mauvaise réponse !</span>';
                }
                if (questionsAnswered >= 10) {
                    endGame();
                } else if (data.nextQuestion) {
                    updateQuestion(data.nextQuestion);
                }
            })
            .catch((error) => {
                console.error("Error:", error);
            });
    };

    // recuperation de la question suivante
    const updateQuestion = (question) => {
        if (question) {
            document.getElementById("question").textContent =
                question.statement;
            document.getElementById("answer").value = "";

            // maj de l'ID de la question
            quizData.questionId = question.id;

            // Le timer met parfois quelques centaines de millisecondes a ce mettre a jour en frontend
            // backend, le timer semble a jour
            resetTimer();

            const questionImage = document.getElementById("question-image");
            if (question.image) {
                // les images sont stockées dans le dossier public/images
                // les noms de fichiers sont stockés dans la base de données
                questionImage.src = "/images/" + question.image;
                questionImage.style.display = "block";
            } else {
                questionImage.style.display = "none";
            }
        } else {
            endGame();
        }
    };

    const endGame = () => {
        clearInterval(countdown);
        window.location.href = '/quiz/end'; //affichage de l'ecran de fin
    };

    // Gestion du timer
    // repris d'exemples sur internet
    const startCountdown = () => {
        clearInterval(countdown);
        countdown = setInterval(() => {
            if (timeLeft <= 0) {
                clearInterval(countdown);
                timerElement.innerHTML =
                    '<span class="text-danger">Temps écoulé !</span>';
                submitAnswer();
            } else {
                timerElement.innerHTML = `Temps restant: <strong>${timeLeft} secondes</strong>`;
            }
            timeLeft -= 1;
        }, 1000);
    };

    const resetTimer = () => {
        timeLeft = 10;
        startCountdown(); // relance le timer
    };

    startCountdown();
}
