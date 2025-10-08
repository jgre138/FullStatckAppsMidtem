<?php
class CredentialsModel {
  public $credentials = array();
  private $db;

  //Constructor

  function __construct() {
   

    $this->db = new PDO('mysql:host=localhost;dbname=bookclub;charset=UTF8', 
               'root', 'root');
    $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

  }


  //List Function

  public function listCredentials () { //Not used, but good for debugging

    try {
        $stmt = $this->db->query('SELECT * FROM credentials ORDER BY id');
        $this->credentials = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $ex) {
        var_dump($ex->getMessage());
    }

    return $this->credentials;
  }
  
  // Verify Function (Different from the login.js, Makes sure there is a login and the pasword and email match)

  public function verify_login($email, $password) { //checks login to make sure its correct
    try {
      $stmt = $this->db->prepare('SELECT * FROM credentials where email =:email AND password=CONCAT("*", UPPER(SHA1(UNHEX(SHA1(:password))))) ');
      $stmt->bindParam(':email', $email, PDO::PARAM_STR);
      $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (($user) and sizeof($user)>0) {
          return $user[0];
        } else {
          return null;
        }
     } catch(PDOException $ex) {
       var_dump($ex->getMessage());
      }
  
  }

  //Find Function

  public function find_member_by_id($id) { //finding a member using id to find login
    try {
     $stmt = $this->db->prepare('SELECT * FROM credentials where members_id=:members_id');
     $stmt->bindParam(':members_id', $id, PDO::PARAM_INT);
     $stmt->execute();
     $member = $stmt->fetchAll(PDO::FETCH_ASSOC);
     return $member;
   }
    catch(PDOException $ex) {
      var_dump($ex->getMessage());
    }
 }

  //Add Function

  public function add_login($email, $password, $members_id) { //adding login info
    try {
 
     // CONCAT('*', UPPER(SHA1(UNHEX(SHA1('mypass')))))    Password Encription
 
     $stmt = $this->db->prepare('INSERT INTO 
     credentials (`email`, `password`, `members_id`) 
     VALUES(:email, CONCAT("*", UPPER(SHA1(UNHEX(SHA1(:password))))), :members_id)');
     $stmt->bindParam(':email', $email, PDO::PARAM_STR);
     $stmt->bindParam(':password', $password, PDO::PARAM_STR);
     $stmt->bindParam(':members_id', $members_id, PDO::PARAM_INT);
     
     $stmt->execute();
     $inserted_member = $this->find_member_by_id($members_id);
     return $inserted_member;
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

//  $new_login = $credentials_model->add_login ("janeCode@gmail.com", "Janecode", "55555" );
//  var_dump($new_login);

//  $findMember = $credentials_model->find_member_by_id("55555");
//  var_dump($findMember);

?>