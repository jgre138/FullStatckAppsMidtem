<?php

class BorrowModel{
 
    public $borrow= array();

    private $db;


    //Constructors

    function __construct() {
   

        $this->db = new PDO('mysql:host=localhost;dbname=bookclub;charset=UTF8', 
                   'root', 'root');
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    
      }
    

    function loadDB () { //Fix the insert staement
    
    
      $stmt = $this->db->prepare("INSERT INTO borrow(id,members_id,books_id) VALUES(:id,:members_id,:books_id)"); //fix to borrow db
      
    
                          
      foreach ($this->borrow as $borrow) {
        // print_r($borrow);
        $stmt->execute(array(':id' => $borrow["id"], ':members_id' => $borrow["members_id"], ':books_id' => $borrow["books_id"]));
      }
    
    }

    // Add Function

    public function add_borrow($members_id, $books_id, $borrow_date) { //adds a new borrow to a course for a student
        try {
   
         $stmt = $this->db->prepare('INSERT INTO 
         borrow (`members_id`, `books_id`, `borrow_date`) 
         VALUES(:members_id, :books_id, :borrow_date)');
         $stmt->bindParam(':members_id', $members_id, PDO::PARAM_INT);
         $stmt->bindParam(':books_id', $books_id, PDO::PARAM_INT);
         $stmt->bindParam(':borrow_date', $borrow_date, PDO::PARAM_STR);
         $stmt->execute();
                       
         $inserted_borrow = $this->find_borrow_by_book($books_id);
         return $inserted_borrow;
       }
        catch(PDOException $ex) {
          var_dump($ex->getMessage());
        }
   }


   public function add_return($members_id, $books_id, $return_date) { //adds a new borrow to a course for a student
    try {

     $stmt = $this->db->prepare('UPDATE borrow SET return_date=:return_date WHERE members_id=:members_id AND books_id=:books_id;');
     $stmt->bindParam(':return_date', $return_date, PDO::PARAM_STR);
     $stmt->bindParam(':members_id', $members_id, PDO::PARAM_INT);
     $stmt->bindParam(':books_id', $books_id, PDO::PARAM_INT);
     $stmt->execute();
                   
     $updated_borrow = $this->find_borrow_by_book($books_id);
     return $updated_borrow;
   }
    catch(PDOException $ex) {
      var_dump($ex->getMessage());
    }
}

  // List Functions

  public function listMembersBooks($members_id) { // lists the courses a student is registered for

    try {
      // var_dump($members_id);
      $stmt = $this->db->prepare('SELECT books.* FROM books INNER JOIN borrow ON books.id = borrow.books_id WHERE borrow.members_id = :members_id AND return_date IS NULL;'); 
      $stmt->bindParam(':members_id', $members_id, PDO::PARAM_INT);
      $stmt->execute();
      $this->borrow = $stmt->fetchAll(PDO::FETCH_ASSOC);

    } catch(PDOException $ex) {
       var_dump($ex->getMessage());
     }
   
     return $this->borrow;
  }
  
  
  public function listBorrowsLog($number) { //fix the statemnt to look better in the code
    try {
    $stmt = $this->db->prepare('SELECT * FROM borrow WHERE books_id=:books_id ORDER BY borrow_date ASC');
    $stmt->bindParam(':books_id', $number, PDO::PARAM_INT);
    $stmt->execute();
    $course = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $course;
  }
    catch(PDOException $ex) {
      var_dump($ex->getMessage());
    }
  }

  //Find Functions

  public function find_borrow_by_book($number) { //finds a borrow for a book
    try {
     $stmt = $this->db->prepare('SELECT * FROM borrow where books_id=:books_id');
     $stmt->bindParam(':books_id', $number, PDO::PARAM_INT);
     $stmt->execute();
     $course = $stmt->fetchAll(PDO::FETCH_ASSOC);
     return $course;
   }
    catch(PDOException $ex) {
      var_dump($ex->getMessage());
    }
 }


}

      //Testing Model Zone

// $model = new BorrowModel();

// $my_books = $model->listMembersBooks("99999");

// var_dump($my_classes);

// $newborrow = $model->add_borrow("34512", "2", "2024-10-12-17-30-30");

// var_dump($newborrow);


?>