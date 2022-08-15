<?php
class Examiner
{
  // Properties
  public $teacher_id;
  public $name;
  //total number of exams assigned
  public $no_of_exams;

  function __construct($teacher_id, $name)
  {
    $this->teacher_id = $teacher_id;
    $this->name = $name;
    $this->no_of_exams = 0;
  }

  function __toString()
  {
    return $this->name . '<br>';
  }
}
