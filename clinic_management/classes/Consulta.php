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
      $stmt = $conn->prepare("INSERT INTO consulta (paciente_email, medico_crm, data_consulta, horario_consulta) VALUES (?, ?, ?, ?)");
      $stmt->execute([$this->pacienteEmail, $this->medicoCRM, $this->data, $this->horario]);
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
