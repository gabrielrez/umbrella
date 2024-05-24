<?php
require_once 'User.php';

class Consulta
{
  public $medico;
  public $paciente;
  public $data;
  public $status;

  public function __construct($medico, $paciente, $data, $status)
  {
    $this->medico = $medico;
    $this->paciente = $paciente;
    $this->data = $data;
    $this->status = $status;
  }

  public function getData()
  {
    return $this->data;
  }

  public function setData($data)
  {
    $this->data = $data;
  }

  public function getStatus()
  {
    return $this->status;
  }

  public function setStatus($status)
  {
    $this->status = $status;
  }
}
