document.getElementById('selectionForm').addEventListener('submit', function(e) {
    e.preventDefault();

    // Retrieve user inputs
    const username = document.getElementById('email').value;

    // Determine which type of selection is made (Custom, Old Testament, New Testament, or All Books)
    const selectionType = document.querySelector('input[name="type"]:checked').value;

    let books = [];
    if (selectionType === 'Custom') {
        // Get selected books if Custom is selected
        books = Array.from(document.querySelectorAll('#books-list input[type="checkbox"]:checked')).map(cb => cb.value);

        // Check if no books are selected in Custom mode
        if (books.length === 0) {
            alert("Please select at least one book.");
            return; // Prevent form submission
        }
    }

    let oldTestament = document.getElementById('oldTestament').checked;
    if(oldTestament === true){
        oldTestament = "trues";
    }else{
        oldTestament = "falses";
    }

    let newTestament = document.getElementById('newTestament').checked;
    if(newTestament === true){
        newTestament = "trues";
    }else{
        newTestament = "falses";
    }

    let allBooks = document.getElementById('allBooks').checked;

    if(allBooks === true){
        allBooks = "trues";
    }else{
        allBooks = "falses";
    }
    // Store user selections in sessionStorage
    sessionStorage.setItem('username', username);
    sessionStorage.setItem('books', JSON.stringify(books));
    sessionStorage.setItem('oldTestament', oldTestament);
    sessionStorage.setItem('newTestament', newTestament);
    sessionStorage.setItem('allBooks', allBooks);

    // Redirect to the quiz page
    window.location.href = 'quiz.php';
});




