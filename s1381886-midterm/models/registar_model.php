<?php

class RegistrationModel{
 
    public $registration= array();

    private $db;

    public $course;

    function __construct() {
   

        $this->db = new PDO('mysql:host=localhost;dbname=studentregisrations;charset=UTF8', 
                   'root', 'root');
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    
      }
    
    function loadDB () {
    
    
      $stmt = $this->db->prepare("INSERT INTO students(first_name,last_name,email,address,city, state, major, class_level) 
                          VALUES(:first_name,:last_name,:email,:address,:city, :state, :major, :class_level)"); //fix to registration db
      
    
                          
      foreach ($this->registration as $registration) {
        // print_r($registration);
        $stmt->execute(array(':first_name' => $registration["first_name"], ':last_name' => $registration["last_name"], ':email' => $registration["email"], 
                          ':address' => $registration["address"], ':city' => $registration["city"], 
                          ':state' => $registration["state"], ':major' => $registration["major"], ':class_level' => $registration["class_level"]
                        ));
      }
    
    }

    public function add_registration($student_id, $course_id) { //adds a new registration to a course for a student
        try {
   
         $stmt = $this->db->prepare('INSERT INTO 
         registrations (`students_id`, `courses_id`) 
         VALUES(:students_id, :courses_id)');
         $stmt->bindParam(':students_id', $student_id, PDO::PARAM_INT);
         $stmt->bindParam(':courses_id', $course_id, PDO::PARAM_INT);
         $stmt->execute();
                       
         $inserted_registration = $this->find_registrar_by_course($course_id);
         return $inserted_registration;
       }
        catch(PDOException $ex) {
          var_dump($ex->getMessage());
        }
   }

  public function listStudentsCourses($student_id) { // lists the courses a student is registered for

    try {
      // var_dump($student_id);
      $stmt = $this->db->prepare('SELECT c.id as courses_id, c.course_number, c.course_description 
                                FROM registrations r JOIN courses c ON r.courses_id = c.id WHERE r.students_id = :id');
      $stmt->bindParam(':id', $student_id, PDO::PARAM_INT);
      $stmt->execute();
      $this->registration = $stmt->fetchAll(PDO::FETCH_ASSOC);

    } catch(PDOException $ex) {
       var_dump($ex->getMessage());
     }
   
     return $this->registration;
  }
  
  
  public function listOtherCourses($student_id) { //lists the courses a student is not registred for

    try {
      // var_dump($student_id);
      $stmt = $this->db->prepare('SELECT c.* FROM registrations r RIGHT JOIN courses c ON r.courses_id = c.id AND r.students_id = :id WHERE r.courses_id IS NULL;');
      $stmt->bindParam(':id', $student_id, PDO::PARAM_INT);
      $stmt->execute();
      $this->registration = $stmt->fetchAll(PDO::FETCH_ASSOC);

    } catch(PDOException $ex) {
       var_dump($ex->getMessage());
     }
   
     return $this->registration;
  }

  public function find_registrar_by_course($number) { //finds a registration for a course
    try {
     $stmt = $this->db->prepare('SELECT * FROM registrations where courses_id=:courses_id');
     $stmt->bindParam(':courses_id', $number, PDO::PARAM_INT);
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

// $model = new RegistrationModel();

// // $my_classes = $model->listStudentsCourses("23451");

// // var_dump($my_classes);

// $newregis = $model->add_registration(34512, 2);

// var_dump($newregis);


?>