<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Book Log - Bookclub</title>
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
    <div class="bookdata">
    <table border="1" align="center">
        <thead>
          <tr>
            <th colspan="2">Book Data</th>
          </tr>
          <tr>
              <th>Book Cover</th>
              <th>Title</th>
          </tr>
        </thead>
        <tbody>
<?php        

            foreach($book_data as $data){
            echo '<tr><td><img src=../uploads/' . $data['bookcover']    . ' width="200"></td><td>' . $data['title']. '</td></tr>';
           }

?>
        </tbody>
    </table>
           <br>
    </div>
    <div class="booklog">
    <table border="1" align="center">
      <thead>
        <tr>
          <th colspan="3">Borrows/Returns Log</th>
        </tr>
        <tr>
          <th>Member</th>
          <th>Borrow Date/Time</th>
          <th>Return Date/Time</th>
        </tr>
      </thead>
      <tbody>
<?php
 
        foreach ($book_log as $book) { 
          echo '<tr><td>' . $book['members_id'] . '</td><td>' . $book['borrow_date'] . '</td>';
          echo '<td>' . $book['return_date'] . '</td></tr>';
        }
        
?>
      </tbody>
    </table>
  </div>
  </main>
</body>
</html>