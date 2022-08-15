<?php
include("../connection.php");

// function generateRandomString($length = 10)
// {
//   $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
//   $charactersLength = strlen($characters);
//   $randomString = '';
//   for ($i = 0; $i < $length; $i++) {
//     $randomString .= $characters[rand(0, $charactersLength - 1)];
//   }
//   return $randomString;
// }

// examiner creator
// for ($i = 0; $i < 10; $i++) {
//   $name = generateRandomString(5);
//   $query = "INSERT INTO `examiner`(`name`) VALUES ('$name')";
//   $con->query($query);
// }

// class room creator
// for ($i = 0; $i < 10; $i++) {
//   $sample_capacity = array(35, 40, 45, 50, 55, 60);
//   $capacity = array_rand($sample_capacity, 1);
//   $query = "INSERT INTO `classroom`(`capacity`) VALUES ('$sample_capacity[$capacity]')";
//   $con->query($query);
// }

// batch generator
// $sample_year = array(1, 2, 3, 4, 5);
// $sample_section = array('A', 'B');
// $sample_no_of_students = range(30, 60, 1);
// for ($i = 0; $i < 20; $i++) {
//   $year = array_rand($sample_year, 1);
//   $section = array_rand($sample_section, 1);
//   $nos = array_rand($sample_no_of_students, 1);
//   $query = "INSERT INTO `batch`(`year`, `section`, `no_of_students`) VALUES ('$sample_year[$year]','$sample_section[$section]','$sample_no_of_students[$nos]')";
//   $con->query($query);
// }

// course creator
// for ($i = 0; $i < 10; $i++) {
//   $name = generateRandomString(5);
//   $query = "INSERT INTO `_course`(`course_name`) VALUES ('$name')";
//   $con->query($query);
// }


// period creator 
//      select all courses

// get course codes
// $query_select_course = "SELECT `course_code` FROM `_course` WHERE 1";
// $result1 = mysqli_query($con, $query_select_course);
// $course_codes = array();
// while ($row = mysqli_fetch_assoc($result1)) {
//   array_push($course_codes, $row['course_code']);
// }

// get teacher ids

// $query_select_teacher = "SELECT `teacher_id` FROM `examiner` WHERE 1";
// $result2 = mysqli_query($con, $query_select_teacher);
// $teacher_ids = array();
// while ($row = mysqli_fetch_assoc($result2)) {
//   array_push($teacher_ids, $row['teacher_id']);
// }

// get batch ids 

// $query_select_batch = "SELECT `batch_id` FROM `batch` WHERE 1";
// $result3 = mysqli_query($con, $query_select_batch);
// $batch_ids = array();
// while ($row = mysqli_fetch_assoc($result3)) {
//   array_push($batch_ids, $row['batch_id']);
// }


// for ($i = 0; $i < 100; $i++) {
//   $t_id = array_rand($teacher_ids, 1);
//   $c_code = array_rand($course_codes, 1);
//   $b_id = array_rand($batch_ids, 1);

//   $query = "INSERT INTO `period`(`course_code`, `teacher_id`, `batch_id`) VALUES ('$course_codes[$c_code]','$teacher_ids[$t_id]','$batch_ids[$b_id]')";
//   try {
//     $con->query($query);
//   } catch (Exception $e) {
//     echo $e->getMessage();
//   }
// }


// exam creator


$query_select_period = "SELECT `period_id` FROM `period` WHERE 1";
$result4 = mysqli_query($con, $query_select_period);
$period_ids = array();
while ($row = mysqli_fetch_assoc($result4)) {
  array_push($period_ids, $row['period_id']);
}

for ($i = 0; $i < sizeof($period_ids); $i++) {
  $sample_exam_hours = array(2, 3, 1.5, 2.5, 2.75, 2.25);
  $e_hr = array_rand($sample_exam_hours, 1);
  $query = "INSERT INTO `exam`(`period_id`, `exam_hour`) VALUES ('$period_ids[$i]','$sample_exam_hours[$e_hr]')";
  try {
    $con->query($query);
  } catch (Exception $e) {
    echo "error";
  }
}
