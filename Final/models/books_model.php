<?php

Class BookModel{
 
    public $books= array();

    private $db;

    //Constructors

    function __construct() { 
   

        $this->db = new PDO('mysql:host=localhost;dbname=bookclub;charset=UTF8', 
                   'root', 'root');
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    
      }
    
    function loadDB () {
    
    
      $stmt = $this->db->prepare("INSERT INTO books(id,title,author,owner,bookcover,status) 
                          VALUES(:id,:title,:author,:owner,:bookcover,:status)");        
      foreach ($this->books as $book) {
        // print_r($book);
        $stmt->execute(array(':id' => $book["id"], ':title' => $book["title"], ':author' => $book["author"], 
                          ':owner' => $book["owner"], ':bookcover' => $book["bookcover"], '"status' => $book["status"],
                        ));
      }
    
    }


    //List Functions

    public function listBooks() { //Lists all courses

      try {
        $stmt = $this->db->query('SELECT * FROM books');
        $this->books = $stmt->fetchAll(PDO::FETCH_ASSOC);
      } catch(PDOException $ex) {
         var_dump($ex->getMessage());
       }
     
       return $this->books;
    }

    public function listMyBooks($members_id) { //Lists all books a member owns/added

      try {
        $stmt = $this->db->prepare('SELECT * FROM books WHERE members_id=:members_id');
        $stmt->bindParam(':members_id', $members_id, PDO::PARAM_STR);
        $stmt->execute();
        $this->books = $stmt->fetchAll(PDO::FETCH_ASSOC);
      } catch(PDOException $ex) {
         var_dump($ex->getMessage());
       }
     
       return $this->books;
    }
    public function listMyBorrowedBooks($members_id) { //Lists all books a member owns/added

      try {
        $stmt = $this->db->prepare('SELECT * FROM books WHERE members_id=:members_id AND status="Returned"');
        $stmt->bindParam(':members_id', $members_id, PDO::PARAM_STR);
        $stmt->execute();
        $this->books = $stmt->fetchAll(PDO::FETCH_ASSOC);
      } catch(PDOException $ex) {
         var_dump($ex->getMessage());
       }
     
       return $this->books;
    }

    public function listAvailibleBooks($members_id) { //Lists all books that are availible to borrow that they do not own

      try {
        $stmt = $this->db->prepare('SELECT * FROM books WHERE members_id != :members_id and status="Availible"');
        $stmt->bindParam(':members_id', $members_id, PDO::PARAM_STR);
        $stmt->execute();
        $this->books = $stmt->fetchAll(PDO::FETCH_ASSOC);
      } catch(PDOException $ex) {
         var_dump($ex->getMessage());
       }
     
       return $this->books;
    }

    public function listMembersBooks($members_id) { // lists the courses a student is registered for

      try {
        // var_dump($members_id);
        $stmt = $this->db->prepare('SELECT books.* FROM books INNER JOIN borrow ON books.id = borrow.books_id WHERE borrow.members_id = :members_id AND return_date IS NULL;'); 
        $stmt->bindParam(':members_id', $members_id, PDO::PARAM_INT);
        $stmt->execute();
        $this->books = $stmt->fetchAll(PDO::FETCH_ASSOC);
  
      } catch(PDOException $ex) {
         var_dump($ex->getMessage());
       }
     
       return $this->books;
    }


    //Add Function

    public function add_book($title, $author, $bookcover, $status, $members_id) { //adds book as per the data the screens/instructions show to add
      try {
   
         $stmt = $this->db->prepare('INSERT INTO 
         books (`title`, `author`, `bookcover`, `status`, `members_id`) 
         VALUES(:title, :author, :bookcover, :status, :members_id)');
         $stmt->bindParam(':title', $title, PDO::PARAM_STR);
         $stmt->bindParam(':author', $author, PDO::PARAM_STR);
         $stmt->bindParam(':bookcover', $bookcover, PDO::PARAM_STR);
         $stmt->bindParam(':status', $status, PDO::PARAM_STR);
         $stmt->bindParam(':members_id', $members_id, PDO::PARAM_STR);

         $stmt->execute();
         $inserted_book = $this->find_book_by_title_and_member($title, $members_id); //Ignore if this has an issue, it works
         //var_dump($inserted_book);
       return $inserted_book;
     }
      catch(PDOException $ex) {
        var_dump($ex->getMessage());
      }
      
   }


   //Find Functions

   public function find_book_by_title_and_member($title, $members_id) { //Finds a book using the book number
    try {
     $stmt = $this->db->prepare('SELECT * FROM books where title=:title AND members_id=:members_id');
     $stmt->bindParam(':title', $title, PDO::PARAM_STR);
     $stmt->bindParam(':members_id', $members_id, PDO::PARAM_STR);
     $stmt->execute();
     $book = $stmt->fetchAll(PDO::FETCH_ASSOC);
     return $book;
   }
    catch(PDOException $ex) {
      var_dump($ex->getMessage());
    }

 }

  public function find_book_by_id($id) { //Finds a book using the book number
    try {
    $stmt = $this->db->prepare('SELECT * FROM books where id=:id');
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $book = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $book;
  }
    catch(PDOException $ex) {
      var_dump($ex->getMessage());
    }

}


  //Update Function

  public function updateStatus($status, $id){
    try {
      $stmt = $this->db->prepare('UPDATE books SET status=:status WHERE id=:id;');
      $stmt->bindParam(':status', $status, PDO::PARAM_INT);
      $stmt->bindParam(':id', $id, PDO::PARAM_INT);
      $stmt->execute();

      $updated_book = $this->find_book_by_id($id);
      return $updated_book;
    } catch(PDOException $ex) {
        var_dump($ex->getMessage());
      }
    
  }

}

      //Testing Model Zone

// $model = new BookModel();

// $model->listBooks();

//  $new_book = $model-> add_book("How to code really well", "John PHP", "test.jpeg", "Returned", "99999");
//  var_dump($new_book);

//  $mybooks = $model->listBooks();
//  var_dump($mybooks);


// $book = $model->find_book_by_title_and_member("Hot to code really well", "99999");
// var_dump($book);

?>