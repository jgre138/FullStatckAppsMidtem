<?php

class MembersModel {
  public $members = array();
  private $db;

  function __construct() { //connect to the database
   

    $this->db = new PDO('mysql:host=localhost;dbname=bookclub;charset=UTF8', 
               'root', 'root');
    $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

  }

 
function loadDB () { 


  $stmt = $this->db->prepare("INSERT INTO members(id,first_name,last_name,address,city,state,zipcode,phonenumber) 
                      VALUES(:id,:first_name,:last_name,:address,:city,:state,:zipcode,:phonenumber)");
  

                      
  foreach ($this->members as $member) {
    // print_r($member);
    $stmt->execute(array(':id' => $member["id"], ':first_name' => $member["first_name"], ':last_name' => $member["last_name"], ':address' => $member["address"], ':city' => $member["city"], ':state' => $member["state"], ':zipcode' => $member["zipcode"], ':phonenumber' => $member["phonenumber"],));
  }

}


public function listMembers () { //lists the members of the bookclub

  try {
    $stmt = $this->db->query('SELECT * FROM members');
    $this->members = $stmt->fetchAll(PDO::FETCH_ASSOC);
  } catch(PDOException $ex) {
     var_dump($ex->getMessage());
   }
 
   return $this->members;
}
    
 public function find_member_by_id($id) { //finds a member for finding data
	 try {
	  $stmt = $this->db->prepare('SELECT * FROM members where id=:id');
	  $stmt->bindParam(':id', $id, PDO::PARAM_INT);
	  $stmt->execute();
	  $member = $stmt->fetchAll(PDO::FETCH_ASSOC);
	  return $member;
	}
	 catch(PDOException $ex) {
	   var_dump($ex->getMessage());
	 }
}

public function find_member_by_phonenumber($number) { //finds a member for finding data
	try {
	 $stmt = $this->db->prepare('SELECT * FROM members where phonenumber=:number');
	 $stmt->bindParam(':number', $number, PDO::PARAM_INT);
	 $stmt->execute();
	 $member = $stmt->fetchAll(PDO::FETCH_ASSOC);
	 return $member;
   }
	catch(PDOException $ex) {
	  var_dump($ex->getMessage());
	}
}

public function add_member($members_id, $first_name, $last_name, $address, $phonenumber) { //add member to database
	 try {

      $stmt = $this->db->prepare('INSERT INTO 
	  members (`id`, `first_name`, `last_name`, `address`, `phonenumber`) 
	  VALUES(:id, :first_name, :last_name, :address, :phonenumber)');
	  $stmt->bindParam(':id', $members_id, PDO::PARAM_INT);
	  $stmt->bindParam(':first_name', $first_name, PDO::PARAM_STR);
	  $stmt->bindParam(':last_name', $last_name, PDO::PARAM_STR);
	  $stmt->bindParam(':address', $address, PDO::PARAM_STR);
	  $stmt->bindParam(':phonenumber', $phonenumber, PDO::PARAM_STR);
	  
	  $stmt->execute();
	//   $member_id = $this->db->lastInsertId();
	  $inserted_member = $this->find_member_by_id($members_id); //temp solution??
	  return $inserted_member;
	}
	 catch(PDOException $ex) {
	   var_dump($ex->getMessage());
	 }
}

}

      //Testing Model Zone

//  $model = new StudentsModel();

//  $model->listStudents();
 
//   $myStudents = $model->listStudents();
//  var_dump($myStudents);
                      
//  $findStudent = $model->find_student_by_id(12345);
//  var_dump($findStudent);

//  $new_student = $model->add_student ("54321", "Jane", "Code", "2026" );
//  var_dump($new_student);

?>
