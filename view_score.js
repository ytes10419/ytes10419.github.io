document.addEventListener("DOMContentLoaded", function () {
    function loadScores() {
        fetch('get_scores.php')
            .then(response => response.json())
            .then(data => {
                const scoresTable = document.getElementById("scores-table").getElementsByTagName("tbody")[0];
                scoresTable.innerHTML = '';
                data.forEach(score => {
                    const row = scoresTable.insertRow();
                    row.insertCell(0).innerText = score.student_id;
                    row.insertCell(1).innerText = score.score;
                });
            })
            .catch(error => console.error('Error:', error));
    }

    loadScores();
});
