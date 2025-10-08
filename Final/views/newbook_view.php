<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Book - Bookclub</title>
    <script type="text/javascript" src="../scripts/newbook.js"></script>
</head>
<body>
    <header>
        <div class="name">
            <p align="right"><a href="logout.php">Logout</a></>
            <h1>BookClub</h1>
        </div>
        <nav>
            <a href="library.php">Library</a>
            <a href="mybooks.php">My Books</a>
        </nav>
    </header>

    <main>
        <div class="new-book-form">
            <fieldset >
            <h2>New Book</h2>
            <form method="post" enctype='multipart/form-data' action="newbook.php?action=add" onSubmit="return validateBook(this)">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" placeholder="Enter book title" required><br>

                <label for="author">Author</label>
                <input type="text" id="author" name="author" placeholder="Enter author's name" required><br>

                <label for="upload">Upload File (jpeg/png)</label>
                <input type="file" id="bookcover" name="bookcover" accept="image/png, image/jpeg"><br>

                <button type="submit">Add Book</button>
            </form>
        </fieldset>
        </div>
    </main>
</body>
</html>