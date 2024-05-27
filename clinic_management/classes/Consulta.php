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

  public function delete($id)
  {
    try {
      $conn = Database::getConn();
      $stmt = $conn->prepare("DELETE FROM consulta WHERE id = ?");
      $stmt->execute([$id]);
    } catch (PDOException $e) {
      die("Error: " . $e->getMessage());
    }
  }

  public function getAll()
  {
    try {
      $conn = Database::getConn();
      $stmt = $conn->prepare("SELECT * FROM consulta");
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      die("Error: " . $e->getMessage());
    }
  }
}
