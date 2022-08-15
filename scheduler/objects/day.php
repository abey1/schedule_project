<?php

require_once('slot.php');

class Day
{
  // Properties
  public $date;
  public $day_name;
  public $slot1;
  public $slot2;
  public $slot3;
  public $slots; // holds occupied slots order to return exams if any conflict happens
  public $slot_index;
  public $con;

  function __construct($date, $day_name, $con)
  {
    $this->date = $date;
    $this->con = $con;
    $this->day_name = $day_name;
    $this->slot1 = new Slot($date, 2, 4, $this->con);
    $this->slot2 = new Slot($date, 4, 6, $this->con);
    $this->slot3 = new Slot($date, 8, 11, $this->con);
    $this->slots = array(0, 0, 0);
    $this->slot_index = -1;
  }

  function getDate()
  {
    return $this->date;
  }
  function setDate($date)
  {
    $this->date = $date;
  }
  function getDayName()
  {
    return $this->day_name;
  }
  function setDayName($day_name)
  {
    $this->day_name = $day_name;
  }

  //remove exam
  function removeExam($exam)
  {
    if ($this->slots[$this->slot_index] == 1) {
      $temp_exam = $this->slot1->removeExam($exam);
      $this->slot_index--;
      return $temp_exam;
    } else if ($this->slots[$this->slot_index] == 2) {
      $temp_exam = $this->slot2->removeExam($exam);
      return $temp_exam;
    } else if ($this->slots[$this->slot_index] == 3) {
      $temp_exam = $this->slot3->removeExam($exam);
      return $temp_exam;
    }
  }

  // check if any of the slots are free to add exam
  function hasSlot()
  {
    if ($this->slot1->occupied == false) {
      return true;
    } else if ($this->slot2->occupied == false) {
      return true;
    } else if ($this->slot3->occupied == false) {
      return true;
    } else {
      return false;
    }
  }

  // add exam in this day
  function addExam($exam, $examiner_1_id, $examiner_2_id)
  {
    echo 'in day exam = ' . $this->date->format('Y:m:d') . $exam;
    echo 'examiner_1_id = ' . $examiner_1_id;
    echo 'examiner_2_id = ' . $examiner_2_id;

    if ($this->slot1->hasEnoughTime($exam)) {
      echo 'has enough time';
      $this->slot1->addExam($exam, $examiner_1_id, $examiner_2_id);
      $this->slots[++$this->slot_index] = 1;
      return true;
    } else if ($this->slot2->hasEnoughTime($exam)) {
      $this->slot2->addExam($exam, $examiner_1_id, $examiner_2_id);
      $this->slots[++$this->slot_index] = 2;
      return true;
    } else if ($this->slot3->hasEnoughTime($exam)) {
      $this->slot3->addExam($exam, $examiner_1_id, $examiner_2_id);
      $this->slots[++$this->slot_index] = 3;
      return true;
    } else {
      return false;
    }
  }

  // check if examiner has exam on this day
  function hasExam($someExaminerId)
  {
    if ($this->slot1->hasExam($someExaminerId) || $this->slot2->hasExam($someExaminerId) || $this->slot3->hasExam($someExaminerId)) {
      return true;
    } else {
      return false;
    }
  }

  public function hasRoom()
  {
    if ($this->slot1->hasRoom() || $this->slot2->hasRoom() || $this->slot3->hasRoom()) {
      return true;
    } else {
      return false;
    }
  }

  function __toString()
  {
    return $this->date->format('D, d M Y') . '<br>' .
      'slot1: ' . '<br>' . $this->slot1 . '<br>' .
      'slot2: ' . '<br>' . $this->slot2 . '<br>' .
      'slot3: ' . '<br>' . $this->slot3 . '<br>';
  }
}
