document.addEventListener("DOMContentLoaded", function () {
    const quizForm = document.getElementById("quiz-form");
    const questionContainer = document.getElementById("question-container");
    const submitButton = document.getElementById("submit-answer");
    const scoreDisplay = document.getElementById("score-display");
    const scoreSpan = document.getElementById("score");

    
    
    let questions = [];
    let score = 0;

    function loadQuestions() {
        fetch('show_questions.php')
            .then(response => response.json())
            .then(data => {
                questions = data.sort(() => 0.5 - Math.random()).slice(0, 5);
                displayQuestions();
            })
            .catch(error => console.error('Error:', error));
    }

    function displayQuestions() {
        questions.forEach((question, index) => {
            const questionHTML = `
                <div class="question-block" data-question-index="${index}">
                    <h3>${question.question_text}</h3>
                    <label><input type="radio" name="answer${index}" value="A" required>${question.option_a}</label><br>
                    <label><input type="radio" name="answer${index}" value="B" required>${question.option_b}</label><br>
                    <label><input type="radio" name="answer${index}" value="C" required>${question.option_c}</label><br>
                    <label><input type="radio" name="answer${index}" value="D" required>${question.option_d}</label>
                </div>
            `;
            questionContainer.innerHTML += questionHTML;
        });
    }

    function recordScore(studentId, username) {
        
        fetch('record_score.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ score: score, student_id: studentId, username: username })
        })
            .then(response => response.json())
            .then(data => {
                if (!data.success) {
                    alert('記錄分數失敗：' + data.message);
                }
            })
            .catch(error => console.error('Error:', error));
    }

    submitButton.addEventListener('click', function (event) {
        event.preventDefault();
        let allAnswered = true;
        score = 0;

        questions.forEach((question, index) => {
            const selectedAnswer = quizForm.querySelector(`input[name="answer${index}"]:checked`);
            if (!selectedAnswer) {
                allAnswered = false;
            } else if (selectedAnswer.value === question.correct_answer) {
                score++;
            }
        });

        if (allAnswered) {
            scoreDisplay.style.display = 'block';
            scoreSpan.textContent = score;

            // 從 session 中獲取學生 ID 和用戶名
            fetch('get_session.php')
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        const studentId = data.student_id;
                        const username = data.username;
                        recordScore(studentId, username);
                    } else {
                        alert('無法獲取學生信息。');
                    }
                })
                .catch(error => console.error('Error:', error));
        } else {
            alert('請回答所有問題後再提交。');
        }
    });

    loadQuestions();
});
