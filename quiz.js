var lives = 5; // Starting 
var score = 0;

function fetchQuestion(userData) {
    console.log("hello");
    const apiUrl = "quiz_api.php";
    fetch(apiUrl, {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(userData),
    })
      .then((response) => response.json())
      .then((data) => {
        displayQuestion(data); // Function to display the question
      })
      .catch((error) => {
        console.error("Error fetching question:", error);
      });
  }

// Update the lives display
function updateLivesDisplay() {
    document.getElementById('lives').textContent = lives;
}

function displayQuestion(questionData) {
    // Update question text
    document.getElementById('question-text').textContent = questionData.question;

    // Options array
    const options = [questionData.option1, questionData.option2, questionData.option3, questionData.option4];

    // Update button text and add event listeners
    options.forEach((option, index) => {
        const optionButton = document.getElementById('option' + (index + 1));
        optionButton.textContent = option;
        optionButton.onclick = function() {
            checkAnswer(questionData.id, index + 1); // Check answer when button is clicked
        };
    });

    // Reset and start the timer
    resetAndStartTimer(questionData.id);
}

// // Function to display the question
// function displayQuestion(questionData) {
//     const container = document.getElementById('question-container');
//     container.innerHTML = ''; // Clear previous question

//     // Create question element
//     const questionEl = document.createElement('h2');
//     questionEl.textContent = questionData.question;
//     container.appendChild(questionEl);

//     // Options array
//     const options = [questionData.option1, questionData.option2, questionData.option3, questionData.option4];

//     // Create and append options as buttons
//     options.forEach((option, index) => {
//         const optionButton = document.createElement('button');
//         optionButton.textContent = option;
//         optionButton.classList.add('option-button');
//         optionButton.addEventListener('click', function() {
//             checkAnswer(questionData.id, index + 1); // Check answer when button is clicked
//         });
//         container.appendChild(optionButton);
//     });

//     // Reset and start the timer
//     resetAndStartTimer(questionData.id);
// }

// Function to check the answer
function checkAnswer(questionId, userOption) {
    const apiUrl = 'answer_api.php'; // Update with the correct API endpoint
    const userData = {
        username: sessionStorage.getItem('username'),
        allBooks: sessionStorage.getItem('allBooks'),
        newTestament: sessionStorage.getItem('newTestament'),
        oldTestament: sessionStorage.getItem('oldTestament'),
        books: JSON.parse(sessionStorage.getItem('books')),
        questionId: questionId,
        option: userOption
    };

    fetch(apiUrl, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(userData)
    })
    .then(response => response.json())
    .then(data => {
        score += data.score;
        alert(data.isCorrect ? `Correct! You have ${score} points` : `Incorrect. You have ${score} points. The correct answer is ${data.answer}`);
        if (!data.isCorrect) {
            lives--;
            updateLivesDisplay();
        }
        fetchNextQuestion();
    })
    .catch(error => {
        console.error('Error:', error);
    });
}

// Function to fetch the next question
function fetchNextQuestion() {
    if (lives > 0) {
        const userData = {
            username: sessionStorage.getItem('username'),
            allBooks: sessionStorage.getItem('allBooks'),
            newTestament: sessionStorage.getItem('newTestament'),
            oldTestament: sessionStorage.getItem('oldTestament'),
            books: JSON.parse(sessionStorage.getItem('books'))
        };
        fetchQuestion(userData);
    } else {
        alert("Game over!");
        window.location.href = "/teenage_trivia/leaderboard.php"
        // Additional logic for game over
    }
}

// Timer function to fetch a new question after time runs out
function resetAndStartTimer(questionId) {
    console.log(lives)
    const timerEl = document.createElement("div");
    timerEl.id = "timer";
    document.getElementById("question-container").appendChild(timerEl);
    clearInterval(window.questionTimer);
    let timeLeft = 10; // 10 seconds for each question
    window.questionTimer = setInterval(() => {
        if (timeLeft <= 0) {
            clearInterval(window.questionTimer);
            lives--;
            updateLivesDisplay();
            if (lives > 0) {
                fetchNextQuestion();
            } else {
                alert("Game over!");
                window.location.href = "/teenage_trivia/leaderboard.php"
                // Additional logic for game over
            }
        } else {
            document.getElementById('timer').textContent = `Time remaining: ${timeLeft} seconds`;
            timeLeft--;
        }
    }, 1000);
}

window.onload = function() {
    updateLivesDisplay(); // Initialize lives display
    fetchNextQuestion(); // Start the quiz
}
