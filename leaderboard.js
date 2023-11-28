document.addEventListener('DOMContentLoaded', function() {
    fetch('leaderboard_api.php')
    .then(response => response.json())
    .then(data => {
        const leaderboardBody = document.getElementById('leaderboard-body');
        data.forEach((item, index) => {
            const row = `<tr>
                            <td>${index + 1}</td>
                            <td>${item.email}</td>
                            <td>${item.score}</td>
                         </tr>`;
            leaderboardBody.innerHTML += row;
        });
    })
    .catch(error => console.error('Error:', error));
});
