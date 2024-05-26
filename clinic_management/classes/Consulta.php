<?php
require_once 'User.php';

class Consulta
{
  public $medicoCRM;
  public $pacienteEmail;
  public $data;
  public $horario;

  public function __construct($pacienteEmail, $medicoCRM, $data, $horario)
  {
    $this->pacienteEmail = $pacienteEmail;
    $this->medicoCRM = $medicoCRM;
    $this->data = $data;
    $this->horario = $horario;
  }

  public function create()
  {
    try {
      $conn = Database::getConn();
      $stmt = $conn->prepare("INSERT INTO consuta (paciente_email, medico_crm, consulta_data, horario) VALUES (?, ?, ?, ?)");
      $stmt->execute([$this->medicoCRM, $this->pacienteEmail, $this->data, $this->horario]);
    } catch (PDOException $e) {
      die("Error: " . $e->getMessage());
    }
  }

  public function getData()
  {
    return $this->data;
  }

  public function setData($data)
  {
    $this->data = $data;
  }

  public function getHorario()
  {
    return $this->horario;
  }

  public function setHorario($horario)
  {
    $this->horario = $horario;
  }
}