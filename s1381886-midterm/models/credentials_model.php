<?php
class CredentialsModel {
  public $credentials = array();
  private $db;

  function __construct() {
   

    $this->db = new PDO('mysql:host=localhost;dbname=studentregisrations;charset=UTF8', 
               'root', 'root');
    $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

  }


  public function listCredentials () { //Not used, but good for debugging

    try {
        $stmt = $this->db->query('SELECT * FROM credentials ORDER BY id');
        $this->credentials = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $ex) {
        var_dump($ex->getMessage());
    }

    return $this->credentials;
  }
  
  public function verify_login($email, $password) { //checks login to make sure its correct
    try {
      $stmt = $this->db->prepare('SELECT * FROM credentials where email =:email AND password=CONCAT("*", UPPER(SHA1(UNHEX(SHA1(:password))))) ');
      $stmt->bindParam(':email', $email, PDO::PARAM_STR);
      $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (sizeof($user) == 0){
          return false;
        }
        else{
          return true;
      }
     } catch(PDOException $ex) {
       var_dump($ex->getMessage());
      }
  
  }

  public function find_student_by_id($id) { //finding a student using id to find login
    try {
     $stmt = $this->db->prepare('SELECT * FROM credentials where students_id=:students_id');
     $stmt->bindParam(':students_id', $id, PDO::PARAM_INT);
     $stmt->execute();
     $student = $stmt->fetchAll(PDO::FETCH_ASSOC);
     return $student;
   }
    catch(PDOException $ex) {
      var_dump($ex->getMessage());
    }
 }

  public function add_login($email, $password, $students_id) { //adding login info
    try {
 
     // CONCAT('*', UPPER(SHA1(UNHEX(SHA1('mypass')))))    Password Encription
 
     $stmt = $this->db->prepare('INSERT INTO 
     credentials (`email`, `password`, `students_id`) 
     VALUES(:email, CONCAT("*", UPPER(SHA1(UNHEX(SHA1(:password))))), :students_id)');
     $stmt->bindParam(':email', $email, PDO::PARAM_STR);
     $stmt->bindParam(':password', $password, PDO::PARAM_STR);
     $stmt->bindParam(':students_id', $students_id, PDO::PARAM_INT);
     
     $stmt->execute();
     $inserted_student = $this->find_student_by_id($students_id);
     return $inserted_student;
   }
    catch(PDOException $ex) {
      var_dump($ex->getMessage());
    }
 }

}

      //Testing Model Zone

// $credentials_model = new CredentialsModel();

// $cd = $credentials_model->listCredentials();
// var_dump($cd);

//  $verify_login = $credentials_model->verify_login("johnCode@gmail.com", "Jcode");
//  var_dump($verify_login);

//  $findStudent = $credentials_model->find_student_by_id(12345);
//  var_dump($findStudent);

//  $new_login = $credentials_model->add_login ("janeCode@gmail.com", "Janecode", "54321" );
//  var_dump($new_login);


//Notes of added student passwords (ones added through forms)//////////////////// (Use these for login if you would like to :) )
  //apollo - Objection
  // klavier = GuiltyLove

?>