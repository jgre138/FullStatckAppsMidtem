<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Return Book - Bookclub</title>
  <script type="text/javascript" src="../scripts/returnbook.js"></script>
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
      <fieldset>
<?php

    foreach($members as $member){
      echo '<p>Name: ' . $member['first_name'] .' ' . $member['last_name'] . '</p>';
    }

    echo '<p>ID: ' . $logged_in_id . '</p>';


?>

      <form method="post" action="returnbook.php?action=update" onSubmit="return validateReturn(this)">
        <label for="book">Which Book?</label>
        <select name="books_id" id="books_id" placeholder="Select a Book to Borrow">
        <option value="" disabled selected>Select a book</option>
<?php
    
          foreach ($borrowed_list as $books){
            echo '<option value="' . $books['id'] . '">' . $books['id'] . ': '. $books['title'] . '</option>';
          }


?>
        </select>
        <button type="submit">Return Book</button>
      </form>
    </fieldset>
    </div>
  </main>
</body>
</html>