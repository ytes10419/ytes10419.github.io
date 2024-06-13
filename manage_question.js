document.addEventListener("DOMContentLoaded", function () {
    const questionForm = document.getElementById("question-form");
    const questionIdInput = document.getElementById("question-id");
    const questionTextInput = document.getElementById("question-text");
    const optionAInput = document.getElementById("option-a");
    const optionBInput = document.getElementById("option-b");
    const optionCInput = document.getElementById("option-c");
    const optionDInput = document.getElementById("option-d");
    const correctAnswerInput = document.getElementById("correct-answer");
    const saveButton = document.getElementById("save-question");

    let editing = false;

    function loadQuestions() {
        fetch('get_questions.php')
            .then(response => response.json())
            .then(data => {
                const questionsTable = document.getElementById("questions-table").getElementsByTagName("tbody")[0];
                questionsTable.innerHTML = '';
                data.forEach(question => {
                    const row = questionsTable.insertRow();
                    row.insertCell(0).innerText = question.id;
                    row.insertCell(1).innerText = question.question_text;
                    row.insertCell(2).innerText = question.option_a;
                    row.insertCell(3).innerText = question.option_b;
                    row.insertCell(4).innerText = question.option_c;
                    row.insertCell(5).innerText = question.option_d;
                    row.insertCell(6).innerText = question.correct_answer;
                    const actionsCell = row.insertCell(7);
                    const editButton = document.createElement('button');
                    editButton.innerText = '編輯';
                    editButton.onclick = function () {
                        editing = true;
                        questionIdInput.value = question.id;
                        questionTextInput.value = question.question_text;
                        optionAInput.value = question.option_a;
                        optionBInput.value = question.option_b;
                        optionCInput.value = question.option_c;
                        optionDInput.value = question.option_d;
                        correctAnswerInput.value = question.correct_answer;
                        saveButton.innerText = '更新';
                    };
                    actionsCell.appendChild(editButton);
                    const deleteButton = document.createElement('button');
                    deleteButton.innerText = '刪除';
                    deleteButton.onclick = function () {
                        deleteQuestion(question.id);
                    };
                    actionsCell.appendChild(deleteButton);
                });
            })
            .catch(error => console.error('Error:', error));
    }

    function saveQuestion() {
        const questionData = {
            question_text: questionTextInput.value,
            option_a: optionAInput.value,
            option_b: optionBInput.value,
            option_c: optionCInput.value,
            option_d: optionDInput.value,
            correct_answer: correctAnswerInput.value
        };

        let url = 'add_question.php';
        if (editing) {
            questionData.id = questionIdInput.value;
            url = 'update_question.php';
        }

        fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(questionData)
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    loadQuestions();
                    questionForm.reset();
                    saveButton.innerText = '保存';
                    editing = false;
                } else {
                    alert('操作失敗：' + data.message);
                }
            })
            .catch(error => console.error('Error:', error));
    }

    function deleteQuestion(id) {
        fetch('delete_question.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ id: id })
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    loadQuestions();
                } else {
                    alert('刪除失敗：' + data.message);
                }
            })
            .catch(error => console.error('Error:', error));
    }

    saveButton.addEventListener('click', function (event) {
        event.preventDefault();
        saveQuestion();
    });

    loadQuestions();
});
