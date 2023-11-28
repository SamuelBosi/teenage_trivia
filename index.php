<!DOCTYPE html>
<html>
<head>
    <title>Bible Quiz</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            padding-top: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        #books-list {
            display: none; /* Initially hidden */
            margin-top: 10px;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); /* Adjust minmax as needed */
            gap: 10px; /* Spacing between grid items */
        }
        #books-list label {
            display: flex;
            align-items: center;
        }
        #books-list input[type="checkbox"] {
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Bible Quiz</h2>
        <form id="selectionForm">
            <div class="form-group">
                <label for="email">Username:</label>
                <input type="text" id="email" name="email" class="form-control" required>
            </div>

            <div class="form-group">
                <input type="radio" class="form-check-input" id="custom" name="type" value="Custom">
                <label class="form-check-label" for="custom">Custom</label>
                <div id="books-list">
                    <!-- Old Testament Books -->
                    <label><input type="checkbox" name="books" value="GENESIS"> Genesis</label>
                    <label><input type="checkbox" name="books" value="EXODUS"> Exodus</label>
                    <label><input type="checkbox" name="books" value="LEVITICUS"> Leviticus</label>
                    <label><input type="checkbox" name="books" value="NUMBERS"> Numbers</label>
                    <label><input type="checkbox" name="books" value="DEUTERONOMY"> Deuteronomy</label>
                    <label><input type="checkbox" name="books" value="JOSHUA"> Joshua</label>
                    <label><input type="checkbox" name="books" value="JUDGES"> Judges</label>
                    <label><input type="checkbox" name="books" value="RUTH"> Ruth</label>
                    <label><input type="checkbox" name="books" value="1SAMUEL"> 1 Samuel</label>
                    <label><input type="checkbox" name="books" value="2SAMUEL"> 2 Samuel</label>
                    <label><input type="checkbox" name="books" value="1KINGS"> 1 Kings</label>
                    <label><input type="checkbox" name="books" value="2KINGS"> 2 Kings</label>
                    <label><input type="checkbox" name="books" value="1CHRONICLES"> 1 Chronicles</label>
                    <label><input type="checkbox" name="books" value="2CHRONICLES"> 2 Chronicles</label>
                    <label><input type="checkbox" name="books" value="EZRA"> Ezra</label>
                    <label><input type="checkbox" name="books" value="NEHEMIAH"> Nehemiah</label>
                    <label><input type="checkbox" name="books" value="ESTHER"> Esther</label>
                    <label><input type="checkbox" name="books" value="JOB"> Job</label>
                    <label><input type="checkbox" name="books" value="PSALMS"> Psalms</label>
                    <label><input type="checkbox" name="books" value="PROVERBS"> Proverbs</label>
                    <label><input type="checkbox" name="books" value="ECCLESIASTES"> Ecclesiastes</label>
                    <label><input type="checkbox" name="books" value="SONG OF SOLOMON"> Song of Solomon</label>
                    <label><input type="checkbox" name="books" value="ISAIAH"> Isaiah</label>
                    <label><input type="checkbox" name="books" value="JEREMIAH"> Jeremiah</label>
                    <label><input type="checkbox" name="books" value="LAMENTATIONS"> Lamentations</label>
                    <label><input type="checkbox" name="books" value="EZEKIEL"> Ezekiel</label>
                    <label><input type="checkbox" name="books" value="DANIEL"> Daniel</label>
                    <label><input type="checkbox" name="books" value="HOSEA"> Hosea</label>
                    <label><input type="checkbox" name="books" value="JOEL"> Joel</label>
                    <label><input type="checkbox" name="books" value="AMOS"> Amos</label>
                    <label><input type="checkbox" name="books" value="OBADIAH"> Obadiah</label>
                    <label><input type="checkbox" name="books" value="JONAH"> Jonah</label>
                    <label><input type="checkbox" name="books" value="MICAH"> Micah</label>
                    <label><input type="checkbox" name="books" value="NAHUM"> Nahum</label>
                    <label><input type="checkbox" name="books" value="HABAKKUK"> Habakkuk</label>
                    <label><input type="checkbox" name="books" value="ZEPHANIAH"> Zephaniah</label>
                    <label><input type="checkbox" name="books" value="HAGGAI"> Haggai</label>
                    <label><input type="checkbox" name="books" value="ZECHARIAH"> Zechariah</label>
                    <label><input type="checkbox" name="books" value="MALACHI"> Malachi</label>

                    <!-- New Testament Books -->
                    <label><input type="checkbox" name="books" value="MATTHEW"> Matthew</label>
                    <label><input type="checkbox" name="books" value="MARK"> Mark</label>
                    <label><input type="checkbox" name="books" value="LUKE"> Luke</label>
                    <label><input type="checkbox" name="books" value="JOHN"> John</label>
                    <label><input type="checkbox" name="books" value="ACTS"> Acts</label>
                    <label><input type="checkbox" name="books" value="ROMANS"> Romans</label>
                    <label><input type="checkbox" name="books" value="1CORINTHIANS"> 1 Corinthians</label>
                    <label><input type="checkbox" name="books" value="2CORINTHIANS"> 2 Corinthians</label>
                    <label><input type="checkbox" name="books" value="GALATIANS"> Galatians</label>
                    <label><input type="checkbox" name="books" value="EPHESIANS"> Ephesians</label>
                    <label><input type="checkbox" name="books" value="PHILIPPIANS"> Philippians</label>
                    <label><input type="checkbox" name="books" value="COLOSSIANS"> Colossians</label>
                    <label><input type="checkbox" name="books" value="1THESSALONIANS"> 1 Thessalonians</label>
                    <label><input type="checkbox" name="books" value="2THESSALONIANS"> 2 Thessalonians</label>
                    <label><input type="checkbox" name="books" value="1TIMOTHY"> 1 Timothy</label>
                    <label><input type="checkbox" name="books" value="2TIMOTHY"> 2 Timothy</label>
                    <label><input type="checkbox" name="books" value="TITUS"> Titus</label>
                    <label><input type="checkbox" name="books" value="PHILEMON"> Philemon</label>
                    <label><input type="checkbox" name="books" value="HEBREWS"> Hebrews</label>
                    <label><input type="checkbox" name="books" value="JAMES"> James</label>
                    <label><input type="checkbox" name="books" value="1PETER"> 1 Peter</label>
                    <label><input type="checkbox" name="books" value="2PETER"> 2 Peter</label>
                    <label><input type="checkbox" name="books" value="1JOHN"> 1 John</label>
                    <label><input type="checkbox" name="books" value="2JOHN"> 2 John</label>
                    <label><input type="checkbox" name="books" value="3JOHN"> 3 John</label>
                    <label><input type="checkbox" name="books" value="JUDE"> Jude</label>
                    <label><input type="checkbox" name="books" value="REVELATION"> Revelation</label>
                </div>

            </div>

            <!-- Other radio options -->
            <div class="form-check">
                <input type="radio" class="form-check-input" id="oldTestament" name="type" value="Old Testament">
                <label class="form-check-label" for="oldTestament">Old Testament </label>
            </div>

            <div class="form-check">
                <input type="radio" class="form-check-input" id="newTestament" name="type" value="New Testament">
                <label class="form-check-label" for="newTestament">New Testament</label>
            </div>

            <div class="form-check">
                <input type="radio" class="form-check-input" id="allBooks" name="type" value="All Books">
                <label class="form-check-label" for="allBooks">All Books</label>
            </div>

            <button type="submit" class="btn btn-primary">Start Quiz</button>
        </form>
    </div>

   <script>
    document.getElementById('custom').addEventListener('change', function(e) {
            document.getElementById('books-list').style.display = e.target.checked ? 'grid' : 'none';
        });

        // Hide book list and uncheck 'Custom' when other options are selected
        document.querySelectorAll('input[name="type"]:not(#custom)').forEach(function(elem) {
            elem.addEventListener('change', function() {
                document.getElementById('books-list').style.display = 'none';
                document.getElementById('custom').checked = false;
            });
        });

   </script>
    <script src="index.js"></script>
</body>
</html>
