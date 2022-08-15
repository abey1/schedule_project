<?php
class Batch
{
  // Properties
  public $batch_id;
  public $year;
  public $section;
  public $no_of_students;

  // Constructor
  public function __construct($batch_id, $year, $section, $no_of_students)
  {
    $this->batch_id = $batch_id;
    $this->year = $year;
    $this->section = $section;
    $this->no_of_students = $no_of_students;
  }
}
