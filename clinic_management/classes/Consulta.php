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
      $conn = Database::getHefestos();
      $consulta = ['paciente_email' => $this->pacienteEmail, 'medico_crm' => $this->medicoCRM, 'data_consulta' => $this->data, 'horario_consulta' => $this->horario];
      $conn->tabela('consulta')->insert($consulta);
    } catch (PDOException $e) {
      die("Error: " . $e->getMessage());
    }
  }

  public function delete($id)
  {
    try {
      $conn = Database::getHefestos();
      $conn->tabela('consulta')->delete(['id' => $id]);
    } catch (PDOException $e) {
      die("Error: " . $e->getMessage());
    }
  }

  public function getAll()
  {
    try {
      $conn = Database::getHefestos();
      return $conn->tabela('consulta')->buscarTodos();
    } catch (PDOException $e) {
      die("Error: " . $e->getMessage());
    }
  }
}