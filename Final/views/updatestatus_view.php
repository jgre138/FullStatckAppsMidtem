<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Book - Bookclub</title>
  <script type="text/javascript" src="../scripts/updatestatus.js"></script>
</head>
<body>
  <header>
    <div class="name">
      <p align="right"><a href="logout.php">Logout</a></p>
      <h1>BookClub</h1>
    </div>
    <nav>
      <ul>
        <li><a href="library.php">Library</a></li>
        <li><a href="mybooks.php">My Books</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <div class="form-container">
<?php

    foreach($members as $member){
      echo '<p>Name: ' . $member['first_name'] .' ' . $member['last_name'] . '</p>';
    }

    echo '<p>ID: ' . $logged_in_id . '</p>';


?>

      <form method="post" action="updatestatus.php?action=update" onSubmit="return validateUpdate(this)">
        <label for="book">Which Book?</label>
        <select name="books_id" id="books_id" placeholder="Select a Book to Borrow">
        <option value="" disabled selected>Select a book</option>
<?php
    
          foreach ($books_list as $books){
            echo '<option value="' . $books['id'] . '">' . $books['id'] . ': '. $books['title'] . '</option>';
          }


?>
        </select>
        <button type="submit">Make Book Availible</button>
      </form>
    </div>
  </main>
</body>
</html>