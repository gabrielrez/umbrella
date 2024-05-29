<?php
require_once 'User.php';

class Medico extends User
{

  public $especialidade;
  public $CRM;

  public function __construct($username, $email, $especialidade, $CRM, $password)
  {
    parent::__construct($username, $email, $password, 'Médico');
    $this->especialidade = $especialidade;
    $this->CRM = $CRM;
  }

  public function getPermissions()
  {
    return ['view_pacientes', 'view_agendamentos'];
  }

  public function cadastrar()
  {
    try {
      $conn = Database::getHefestos();
      $medico = ['nome' => $this->username, 'email' => $this->email, 'especialidade' => $this->especialidade, 'crm' => $this->CRM, 'senha' => password_hash($this->password, PASSWORD_BCRYPT), 'tipo' => 'Médico'];
      $conn->tabela('medico')->insert($medico);
    } catch (PDOException $e) {
      die("Error: " . $e->getMessage());
    }
  }

  public function delete($id)
  {
    try {
      $conn = Database::getHefestos();
      $conn->tabela('medico')->delete(['id' => $id]);
    } catch (PDOException $e) {
      die("Error: " . $e->getMessage());
    }
  }

  public function getAll()
  {
    try {
      $conn = Database::getHefestos();
      return $conn->tabela('medico')->buscarTodos();
    } catch (PDOException $e) {
      die("Error: " . $e->getMessage());
    }
  }

  public function getConsultas($CRM)
  {
    try {
      $conn = Database::getHefestos();
      return $conn->tabela('consulta')->where($CRM)->buscarTodos();
    } catch (PDOException $e) {
      die("Error: " . $e->getMessage());
    }
  }
}