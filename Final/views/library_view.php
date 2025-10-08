<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library - Bookclub</title>
    <link rel='stylesheet' href='../styles/library.css'>
</head>
<body>
    <header>
        <div class="name">
            <h1>BookClub</h1>
        </div>
        <nav>
            <a href="library.php">Library</a>
            <a href="mybooks.php">My Books</a>
            <a href="logout.php">Logout</a>
        </nav>
    </header>
    <main>
        <h1><a href="newbook.php">Add New Book</a></h1>
        <table>
            <thead>
                <tr>
                    <th>Cover</th>
                    <th>Name / Title</th>
                    <th>Author</th>
                    <th>Owner</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
<?php
 
                foreach ($books_list as $book) { 
                $id = $book['id'];
                echo '<tr><td><img src=../uploads/' . $book['bookcover']    . ' width="200"></td><td>' . $book['title'] . '</td>';
                echo '<td>' . $book['author'] . '</td><td>' . $book['members_id'] . '</td>';
                echo '<td><a href="booklog.php?id='. $id . '">' . $book['status'] . '</a></td></tr>';
                }

?>
            </tbody>
        </table>
    </main>
</body>
</html>