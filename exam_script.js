
document.addEventListener("DOMContentLoaded", function() {
    const questionContainer = document.getElementById("question-container");
    const submitButton = document.getElementById("submitanswer");
    const scoreContainer = document.getElementById("score-container");
    const historyContainer = document.getElementById("history-container");
        let currentQuestion = null;
    function loadQuestion() {
        fetch('show_question.php')
            .then(response => response.json())
            .then(data => {
                console.log(data);  // 用於調試，檢查數據
                if (data.end) {
                    questionContainer.innerHTML = `<h2>測驗結束！您的分數是：${data.score}</h2>`;
                    submitButton.style.display = 'none';
                } else {
                    currentQuestion = data;
                    questionContainer.innerHTML = `
                        <h3>${data.question_text}</h3>
                        <label><input type="radio" name="answer" value="A"> ${data.option_a}</label><br>
                        <label><input type="radio" name="answer" value="B"> ${data.option_b}</label><br>
                        <label><input type="radio" name="answer" value="C"> ${data.option_c}</label><br>
                        <label><input type="radio" name="answer" value="D"> ${data.option_d}</label><br>
                    `;
                }
            })
            .catch(error => console.error('Error:', error));
    }
    
    function submitAnswer() {
        const selectedAnswer = document.querySelector('input[name="answer"]:checked');
        if (!selectedAnswer) {
            alert('請選擇一個答案');
            return;
        }

        const answerData = {
            question_id: currentQuestion.id,
            selected_answer: selectedAnswer.value
        };

        fetch('submit_answer.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(answerData)
        })
            .then(response => response.json())
            .then(() => {
                loadQuestion();
            })
            .catch(error => console.error('Error:', error));
    }
    function loadHistory() {
        fetch('fetch_scores.php')
            .then(response => response.json())
            .then(data => {
                historyContainer.innerHTML = '<h3>歷史測驗分數：</h3>';
                data.scores.forEach(score => {
                    historyContainer.innerHTML += `<p>${score}</p>`;
                });
            })
            .catch(error => console.error('Error:', error));
    }
   
        submitButton.addEventListener('click', function(event){
            event.preventDefault();
            submitAnswer();
        });

        
    
    
    loadQuestion();
})


