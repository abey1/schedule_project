<?php

require_once('exam.php');

class Slot
{

  // Properties
  public $date;
  public $start_time;
  public $end_time;
  public $total_hr;
  public $occupied;
  public $con;
  public $rooms;
  public $modified_rooms_array;
  public $rooms_index;

  function __construct($date, $start_time, $end_time, $con)
  {
    $this->date = new DateTime($date->format('Y-m-d') . ' ' . $start_time . ':00:00');
    $this->start_time = $start_time;
    $this->end_time = $end_time;
    $this->con = $con;
    $this->total_hr = $end_time - $start_time;
    $this->getExamRooms();
    $this->occupied = false;
    $this->modified_rooms_array = range(0, sizeof($this->rooms) - 1, 1);
    $this->rooms_index = -1;
  }


  private function getExamRooms()
  {
    $query_select_classroom = "SELECT * FROM `classroom` WHERE 1";
    $result1 = mysqli_query($this->con, $query_select_classroom);
    $classrooms = array();
    while ($row = mysqli_fetch_assoc($result1)) {
      $classroom = new Classroom($row['room_id'], $row['capacity']);
      array_push($classrooms, $classroom);
    }
    $this->rooms = $classrooms;
  }

  // check if the exam and slot has compatible time
  function hasEnoughTime($exam)
  {
    return $exam->exam_hour <= $this->total_hr;
  }

  // check if slot has room for exam
  function hasRoom()
  {
    $temp_has_room = false;
    foreach ($this->rooms as $room) {
      if (!$room->isEmpty()) {
        $temp_has_room = true;
        break;
      }
    }
    return true;
  }

  // removes exam from slot
  public function removeExam($exam)
  {
    for ($i = 0; $i < sizeof($this->rooms); $i++) {
      if ($exam->exam_id == $this->rooms[$i]->exam->exam_id) {
        break;
      }
    }
    return $this->rooms[$i]->removeExam();
  }

  // adds exam to slot
  public function addExam($exam, $examiner_1_id, $examiner_2_id)
  {
    echo 'in slot ' . $exam;
    //search empty room
    for ($i = 0; $i < sizeof($this->rooms); $i++) {
      if ($this->rooms[$i]->isEmpty()) {
        if ($this->rooms[$i]->addExam($exam, $examiner_1_id, $examiner_2_id)) {
          $this->updateOccupied();
          return true;
        }
      }
    }
    return false;
  }

  // updates occupied status();
  private function updateOccupied()
  {
    $temp_occupied = false;
    for ($i = 0; $i < sizeof($this->rooms); $i++) {
      if (!$this->rooms[$i]->isEmpty()) {
        break;
      }
    }
    if ($i == sizeof($this->rooms)) {
      $temp_occupied = true;
    }
    $this->occupied = $temp_occupied;
  }

  // check if some examiner is examining this exam at this time
  public function hasExam($someExaminerId)
  {
    for ($i = 0; $i < sizeof($this->rooms); $i++) {
      if ($this->rooms[$i]->hasExam($someExaminerId)) {
        return true;
      }
    }
    return false;
  }

  function __toString()
  {
    $s = $this->date->format('D, d M Y H:i:s') . '<br>';
    for ($i = 0; $i < sizeof($this->rooms); $i++) {
      $s .= $this->rooms[$i];
    }
    return $s;
  }
}
