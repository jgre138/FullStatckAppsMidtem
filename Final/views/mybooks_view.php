<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Books - Bookclub</title>
</head>
<body>
  <header>
    <div class="name">
      <p align="right"><a href="logout.php">Logout</a></p>
      <h1>BookClub</h1>
    </div>
    <nav>
      <a href="library.php">Library</a>
      <a href="mybooks.php">My Books</a>
    </nav>
  </header>
  <main>
    <div class="actions">
      <a href="newbook.php">Add New Book</a>
      <a href="borrowbook.php">Borrow a Book</a>
      <a href="returnbook.php">Return a Book</a>
      <a href="updatestatus.php">Update Book Availiblity</a>
    </div>
    
    <div class="ownedbooks">
    <table border="1" align="left" style="margin-left: 0;">
      <thead>
        <tr><th colspan="5">Owned Books</th></tr>
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
 
        foreach ($mybooks_list as $book) { 
          echo '<tr><td><img src=../uploads/' . $book['bookcover']    . ' width="200"></td><td>' . $book['title'] . '</td>';
          echo '<td>' . $book['author'] . '</td><td>' . $book['members_id'] . '</td><td>' . $book['status'] . '</td></tr>';
        }

?>
      </tbody>
    </table>
  </div>
  <div class="borrowedbooks">
    <table border="1" align="right" style="margin-right: 100;">
    <thead>
        <tr><th colspan="5">Borrowed Books</th></tr>
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
 
        foreach ($borrowed_books as $book) { 
          echo '<tr><td><img src=../uploads/' . $book['bookcover']    . ' width="200"></td><td>' . $book['title'] . '</td>';
          echo '<td>' . $book['author'] . '</td><td>' . $book['members_id'] . '</td><td>' . $book['status'] . '</td></tr>';
        }
        
?>
      </tbody>
    </table>
  </div>
  </main>
</body>
</html>