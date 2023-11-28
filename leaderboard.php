<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leaderboard</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .leaderboard-container {
            max-width: 600px;
            margin: 0 auto;
            padding-top: 50px;
        }
        .leaderboard-heading {
            text-align: center;
            margin-bottom: 20px;
        }
        .leaderboard-table {
            width: 100%;
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="container leaderboard-container">
        <h1 class="leaderboard-heading">Leaderboard</h1>
        <table class="table leaderboard-table">
            <thead>
                <tr>
                    <th>Rank</th>
                    <th>Email</th>
                    <th>Score</th>
                </tr>
            </thead>
            <tbody id="leaderboard-body">
                <!-- Leaderboard rows will be populated here -->
            </tbody>
        </table>
    </div>

    <div>
        Do you know you can play again <a href="/teenage_trivia/index.php"> Click here </a>
    </div>

    <script src="leaderboard.js"></script>
</body>
</html>
