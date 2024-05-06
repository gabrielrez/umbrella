<?php

require_once 'Paciente.php';
require_once 'Medico.php';
require_once 'Admin.php';

class Consulta
{
  private $id;
  private $pacienteId;
  private $medicoId;
  private $data;
  private $status;

  public function __construct($id, $pacienteId, $medicoId, $data, $status)
  {
    $this->id = $id;
    $this->pacienteId = $pacienteId;
    $this->medicoId = $medicoId;
    $this->data = $this->setData($data);
    $this->status = $this->setStatus($status);
  }

  public function getId()
  {
    return $this->id;
  }

  public function getPaciente()
  {
    $paciente = $this->pacienteId;
    return $paciente->nome;
  }

  public function getMedico()
  {
    $medico = $this->medicoId;
    return $medico->nome;
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
