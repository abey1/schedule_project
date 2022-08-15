<!-- input 
list of periods
  period: course_code, teacher_id, batch
list of class rooms
  class room: room_id, capacity
list of examiners/teachers
  examiner/teacher: teacher_id, name
-->

<!-- sample data -->

<?php

include("../connection.php");
require_once("./objects/schedule.php");
require_once("./objects/classroom.php");
require_once("./objects/examiner.php");

// 1. step one
// get all exams from database

$query_select_exam = "SELECT `exam`.*, `period`.course_code, `period`.teacher_id, `batch`.*
FROM `exam` 
	LEFT JOIN `period` ON `exam`.`period_id` = `period`.`period_id` 
	LEFT JOIN `batch` ON `period`.`batch_id` = `batch`.`batch_id`";

$result2 = mysqli_query($con, $query_select_exam);
$exams = array();
while ($row = mysqli_fetch_assoc($result2)) {
  $exam = new Exam($row['exam_id'], $row['period_id'], $row['exam_hour'], $row['course_code'], $row['teacher_id'], $row['batch_id'], $row['year'], $row['section'], $row['no_of_students']);
  array_push($exams, $exam);
}

// 2. step two
// get all examiners

$query_select_examiner = "SELECT * FROM `examiner` WHERE 1";
$result3 = mysqli_query($con, $query_select_examiner);
$examiners = array();
while ($row = mysqli_fetch_assoc($result3)) {
  $examiner = new Examiner($row['teacher_id'], $row['name']);
  array_push($examiners, $examiner);
}

// for ($i = 0; $i < sizeof($examiners); $i++) {
//   echo $examiners[$i];
// }


// $period = new Period();
$start_date = new DateTime('2022-8-8');
$end_date = new DateTime('2022-8-23');

$schedule = new Schedule($start_date, $end_date, $con, $examiners);
if ($schedule->addExam($exams[0], $examiners[0], $examiners[1])) {
  echo 'true';
} else {
  echo 'false';
}
echo $schedule;

?>