var lives = 5;

// Function to fetch a question
function fetchQuestion(userData) {
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

// Function to display the question
// Function to display the question
function displayQuestion(questionData) {
  const container = document.getElementById("question-container");
  container.innerHTML = ""; // Clear previous question

  // Create question element
  const questionEl = document.createElement("h2");
  questionEl.textContent = questionData.question;
  container.appendChild(questionEl);

  // Options array
  const options = [
    questionData.option1,
    questionData.option2,
    questionData.option3,
    questionData.option4,
  ];

  // Create and append options
  options.forEach((option, index) => {
    const optionLabel = document.createElement("label");
    const optionInput = document.createElement("button");
    optionInput.appendChild(document.createTextNode(option));
    optionInput.type = "radio";
    optionInput.name = "option";
    optionInput.value = index + 1; // Assuming option values are 1-indexed
    optionInput.classList.add("option-input");

    optionLabel.appendChild(optionInput);
    optionLabel.appendChild(document.createTextNode(option));
    container.appendChild(optionLabel);
  });

  const idEl = document.createElement("h2");
  idEl.textContent = questionData.id;
  idEl.style.display = "none";
  container.appendChild(idEl);

  // Timer and Fetch New Question
  startTimerAndFetchNewQuestion();
}

// Timer function to fetch a new question after 15 seconds
function startTimerAndFetchNewQuestion() {
  const timerEl = document.createElement("div");
  timerEl.id = "timer";
  document.getElementById("question-container").appendChild(timerEl);

  let timeLeft = 10; // 15 seconds for each question
  const interval = setInterval(() => {
    if (timeLeft <= 0) {
      clearInterval(interval);
      // Fetch a new question
      const userData = {
        username: sessionStorage.getItem("username"),
        allBooks: sessionStorage.getItem("allBooks"),
        newTestament: sessionStorage.getItem("newTestament"),
        oldTestament: sessionStorage.getItem("oldTestament"),
        books: JSON.parse(sessionStorage.getItem("books") || "[]"),
      };
      fetchQuestion(fetchQuestion(userData)); // You'll need to define how to get user data
    } else {
      document.getElementById(
        "timer"
      ).textContent = `Time remaining: ${timeLeft} seconds`;
      timeLeft--;
    }
  }, 1000);
}

// Retrieve user selections from sessionStorage and fetch a question
window.onload = function () {
  const userData = {
    username: sessionStorage.getItem("username"),
    allBooks: sessionStorage.getItem("allBooks"),
    newTestament: sessionStorage.getItem("newTestament"),
    oldTestament: sessionStorage.getItem("oldTestament"),
    books: JSON.parse(sessionStorage.getItem("books") || "[]"),
  };

  fetchQuestion(userData);
};
