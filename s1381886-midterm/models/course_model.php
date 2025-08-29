<?php

Class CourseModel{
 
    public $course= array();

    private $db;
    public $semester;

    function __construct() {
   

        $this->db = new PDO('mysql:host=localhost;dbname=studentregisrations;charset=UTF8', 
                   'root', 'root');
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    
      }
    
    function loadDB () {
    
    
      $stmt = $this->db->prepare("INSERT INTO courses(id, course_number, course_description, semester, year) 
                          VALUES(:id,:course_number,:course_description,:semester,:year)");        
      foreach ($this->course as $course) {
        // print_r($course);
        $stmt->execute(array(':id' => $course["id"], ':course_number' => $course["course_number"], ':course_description' => $course["course_description"], 
                          ':semester' => $course["semester"], ':year' => $course["year"], 
                        ));
      }
    
    }

    public function listCourses() { //Lists all courses

      try {
        $stmt = $this->db->query('SELECT id, course_number, course_description FROM courses');
        $this->course = $stmt->fetchAll(PDO::FETCH_ASSOC);
      } catch(PDOException $ex) {
         var_dump($ex->getMessage());
       }
     
       return $this->course;
    }



    public function addFullCourse($course_number, $course_description, $semester, $year) { //adds a full course with the semester and year parameters
      try {
   
         $stmt = $this->db->prepare('INSERT INTO 
         courses (`course_number`, `course_description`, `semester`, `year`) 
         VALUES(:course_number, :course_description, :semester, :year)');
         $stmt->bindParam(':course_number', $course_number, PDO::PARAM_INT);
         $stmt->bindParam(':course_description', $course_description, PDO::PARAM_STR);
         $stmt->bindParam(':semester', $semester, PDO::PARAM_STR);
         $stmt->bindParam(':year', $year, PDO::PARAM_INT);
       
         $stmt->execute();
         $inserted_course = $this->find_course_by_number($course_number);
       return $inserted_course;
     }
      catch(PDOException $ex) {
        var_dump($ex->getMessage());
      }
      
   }
    public function addCourse($course_number, $course_description) { //adds course as per the data the screens/instructions show to add
      try {
   
         $stmt = $this->db->prepare('INSERT INTO 
         courses (`course_number`, `course_description`) 
         VALUES(:course_number, :course_description)');
         $stmt->bindParam(':course_number', $course_number, PDO::PARAM_INT);
         $stmt->bindParam(':course_description', $course_description, PDO::PARAM_STR);
       
         $stmt->execute();
         $inserted_course = $this->find_course_by_number($course_number);
       return $inserted_course;
     }
      catch(PDOException $ex) {
        var_dump($ex->getMessage());
      }
      
   }

   public function find_course_by_number($number) { //Finds a course using the course number
    try {
     $stmt = $this->db->prepare('SELECT * FROM courses where course_number=:course_number');
     $stmt->bindParam(':course_number', $number, PDO::PARAM_INT);
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

// $model = new CourseModel();

// $model->listCourses();

//  $new_course = $model-> addFullCourse("CS 357", "Full-Stack Applications", "Fall", "2024");
//  var_dump($new_course);

//  $newer_course = $model->addCourse("MA 130", "Applied Discrete Mathmatics");

//  $myCourses = $model->listCourses();
//  var_dump($myCourses);

//  var_dump($course_list);

// $mysemester = $model-> listSemesters();
// var_dump($mysemester);

?>