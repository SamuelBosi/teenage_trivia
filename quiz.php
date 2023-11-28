<!DOCTYPE html>
<html>
<head>
    <title>Test your Knowledge of the Scriptures!!! </title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        label {
            display: block;
        }
        input {
            margin-right: 20px;
        }
    </style>
</head>
<body>
    
        <nav class="navbar navbar-expand-lg bg-body-tertiary mb-5">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Memory Pills</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 justify-content-end">
                    <li id="lives-container">
                        Lives:<span id="lives">5</span>
                    </li>
                </ul>
                </div>
            </div>
        </nav>

        <div class="container">
        <div id="question-container">
            <div class="question card">
                <h2 id="question-text" class="card-body"></h2>
            </div>
            
            <div class="options">
                <div class="row mt-5">
                    <div class="col-md-6 col-12">
                        <button id="option1" class="option-button btn btn-primary w-100 p-5 fs-1">Option 1</button>
                    </div>
                    <div class="col-md-6 col-12">
                        <button id="option2" class="option-button btn btn-primary w-100 p-5 fs-1">Option 2</button>
                    </div>
                    
                </div>

                <div class="row mt-5">
                    <div class="col-md-6 col-12">
                        <button id="option3" class="option-button btn btn-primary w-100 p-5 fs-1">Option 3</button>
                    </div>
                    <div class="col-md-6 col-12">
                        <button id="option4" class="option-button btn btn-primary w-100 p-5 fs-1">Option 4</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" id="correct">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Correct</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            ...
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
        </div>
        </div>
    </div>

    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" id="incorrect">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">InCorrect</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>

    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" id="game-over">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Game Over</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>

   

    <script src="quiz.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
