<?php

require_once('day.php');

class Schedule
{

  public $start_day;
  public $end_day;
  public $days = array();
  public $examiners;
  public $con;

  function __construct($start_day, $end_day, $con, $examiners)
  {
    $this->start_day = $start_day;
    $this->end_day = $end_day;
    $this->con = $con;
    $temp_date = new DateTime($start_day->format('Y-m-d'));
    for ($i = 0; $i < ($this->end_day->format('j') - $this->start_day->format('j')); $i++) {
      $temp_date->add(new DateInterval('P1D'));
      $this->days[$i] = new Day(new DateTime($temp_date->format('Y-m-d')), $temp_date->format('D'), $this->con);
    }
    $this->examiners = $examiners;
  }

  public function addExam($exam, $examiner_1_id, $examiner_2_id)
  {

    for ($i = 0; $i < sizeof($this->days); $i++) {
      if ($this->days[$i]->hasRoom()) {
        $this->days[$i]->addExam($exam, $examiner_1_id, $examiner_2_id);
        return true;
      }
    }
  }

  function __toString()
  {
    $s = 'start day' . $this->start_day->format('D, d M Y') . '<br>' .
      'end day' . $this->end_day->format('D, d M Y') . '<br>';
    for ($j = 0; $j < sizeof($this->days); $j++) {
      $s .= $this->days[$j];
    }
    return $s;
  }
}
