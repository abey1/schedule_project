<?php

class Exam
{
  public $exam_id;
  public $period_id;
  public $exam_hour;
  public $course_code;
  public $teacher_id;
  public $batch_id;
  public $year;
  public $section;
  public $no_of_students;


  function __construct($exam_id, $period_id, $exam_hour, $course_code, $teacher_id, $batch_id, $year, $section, $no_of_students)
  {
    $this->exam_id = $exam_id;
    $this->period_id = $period_id;
    $this->exam_hour = $exam_hour;
    $this->course_code = $course_code;
    $this->teacher_id = $teacher_id;
    $this->batch_id = $batch_id;
    $this->year = $year;
    $this->section = $section;
    $this->no_of_students = $no_of_students;
  }

  function __toString()
  {
    return "Exam ID: " . $this->exam_id . " Period ID: " . $this->period_id . " Exam Hour: " . $this->exam_hour . " Course Code: " . $this->course_code . " Teacher ID: " . $this->teacher_id . " Batch ID: " . $this->batch_id . " Year: " . $this->year . " Section: " . $this->section . " No of Students: " . $this->no_of_students . '<br>';
  }
}
