<?php
class Classroom
{
  // Properties
  public $room_id;
  public $capacity;
  public $exam;
  public $examiner_1_id;
  public $examiner_2_id;
  public $occupied;

  function __construct($room_id, $capacity)
  {
    $this->room_id = $room_id;
    $this->capacity = $capacity;
    $this->exam = null;
    $this->examiner_1_id = null;
    $this->examiner_2_id = null;
    $this->occupied = false;
  }

  // add exam
  function addExam($exam, $examiner_1_id, $examiner_2_id)
  {
    echo 'in classroom ' . $exam;
    if ($this->hasEnoughRoom($exam)) {
      $this->exam = $exam;
      $this->examiner_1_id = $examiner_1_id;
      $this->examiner_2_id = $examiner_2_id;
      $this->occupied = true;
      return true;
    } else {
      return false;
    }
  }

  // constraints
  //1. class capacity must be greater than no of students
  function hasEnoughRoom($exam)
  {
    return $exam->no_of_students <= $this->capacity;
  }

  // constraints

  public function isEmpty()
  {
    return !$this->occupied;
  }

  // remove exam
  function removeExam()
  {
    $temp_exam = $this->exam;
    $this->exam_id = null;
    $this->examiner_1_id = null;
    $this->examiner_2_id = null;
    $this->occupied = false;
    return $temp_exam;
  }

  public function hasExam($someExaminerId)
  {
    if ($this->examiner_1_id == $someExaminerId || $this->examiner_2_id == $someExaminerId) {
      return true;
    } else {
      return false;
    }
  }

  function __toString()
  {
    return 'room_id = ' . $this->room_id . ' ' .
      'exam = ' . $this->exam . ' ' .
      'examiner_1_id = ' . $this->examiner_1_id . ' ' .
      'examiner_2_id = ' . $this->examiner_2_id .
      'capacity = ' . $this->capacity . '<br>';
  }
}
