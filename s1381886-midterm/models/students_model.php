<?php

class StudentsModel {
  public $students = array();
  private $db;

  function __construct() { //connect to the database
   

    $this->db = new PDO('mysql:host=localhost;dbname=studentregisrations;charset=UTF8', 
               'root', 'root');
    $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

  }

 
function loadDB () { 


  $stmt = $this->db->prepare("INSERT INTO students(id,first_name,last_name,classOf) 
                      VALUES(:id,:first_name,:last_name,:classOf)");
  

                      
  foreach ($this->students as $student) {
    // print_r($student);
    $stmt->execute(array(':id' => $student["id"], ':first_name' => $student["first_name"], ':last_name' => $student["last_name"], ':classOf' => $student["classOf"]));
  }

}


public function listStudents () { //lists students

  try {
    $stmt = $this->db->query('SELECT * FROM students');
    $this->students = $stmt->fetchAll(PDO::FETCH_ASSOC);
  } catch(PDOException $ex) {
     var_dump($ex->getMessage());
   }
 
   return $this->students;
}
    
 public function find_student_by_id($id) { //finds student for finding data
	 try {
	  $stmt = $this->db->prepare('SELECT * FROM students where id=:id');
	  $stmt->bindParam(':id', $id, PDO::PARAM_INT);
	  $stmt->execute();
	  $student = $stmt->fetchAll(PDO::FETCH_ASSOC);
	  return $student;
	}
	 catch(PDOException $ex) {
	   var_dump($ex->getMessage());
	 }
}

public function add_student($student_id, $first_name, $last_name, $classOf) { //add student to database
	 try {

      $stmt = $this->db->prepare('INSERT INTO 
	  students (`id`, `first_name`, `last_name`, `classOf`) 
	  VALUES(:id, :first_name, :last_name, :classOf)');
	  $stmt->bindParam(':id', $student_id, PDO::PARAM_INT);
	  $stmt->bindParam(':first_name', $first_name, PDO::PARAM_STR);
	  $stmt->bindParam(':last_name', $last_name, PDO::PARAM_STR);
	  $stmt->bindParam(':classOf', $classOf, PDO::PARAM_INT);
	  
	  $stmt->execute();
	//   $student_id = $this->db->lastInsertId();
	  $inserted_student = $this->find_student_by_id($student_id);
	  return $inserted_student;
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
