document.addEventListener('DOMContentLoaded', function() {
    const questionContainer = document.getElementById('question-container');
    const submitButton = document.getElementById('submit-answer');
    const scoreDisplay = document.getElementById('score-display');
    const scoreSpan = document.getElementById('score');

    let questionsData = [];

    // 抓取题目并显示在页面上
    fetch('http://192.168.1.109:3000/questions')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok ' + response.statusText);
            }
            return response.json();
        })
        .then(data => {
            questionsData = data;
            const questionsHTML = data.map(question => `
                <div class="question" data-id="${question.id}">
                    <p>${question.question_text}</p>
                    <label><input type="radio" name="q${question.id}" value="A"> ${question.option_a}</label>
                    <label><input type="radio" name="q${question.id}" value="B"> ${question.option_b}</label>
                    <label><input type="radio" name="q${question.id}" value="C"> ${question.option_c}</label>
                    <label><input type="radio" name="q${question.id}" value="D"> ${question.option_d}</label>
                </div>
            `).join('');
            questionContainer.innerHTML = questionsHTML;
        })
        .catch(error => {
            console.error('There has been a problem with your fetch operation:', error);
            questionContainer.innerHTML = '<p>Failed to load questions. Please try again later.</p>';
        });

    // 处理答案提交和分数计算
    submitButton.addEventListener('click', function(event) {
        event.preventDefault();
        let score = 0;
        const questions = document.querySelectorAll('.question');
        questions.forEach(question => {
            const id = question.getAttribute('data-id');
            const selectedAnswer = document.querySelector(`input[name="q${id}"]:checked`);
            if (selectedAnswer) { 
                const answer = selectedAnswer.value;
                const correctAnswer = questionsData.find(q => q.id == id).correct_answer;
                if (answer == correctAnswer) {
                    score++;
                }
            }
        });

        scoreSpan.textContent = score;
        scoreDisplay.style.display = 'block';

        // 传送分数到后端
        const userId = 1;  // 根据实际情况设置用户 ID
        fetch('http://localhost:3000/submit-score', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ user_id: userId, score }) // 修正 body 参数名
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok ' + response.statusText);
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                console.log('Score saved successfully.');
            } else {
                console.error('Failed to save score:', data.error);
            }
        })
        .catch(error => {
            console.error('There has been a problem with your fetch operation:', error);
        });
    });
});
