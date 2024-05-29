<?php
require_once 'User.php';

class Paciente extends User
{

  public $age;
  public $sexo;

  public function __construct($username, $email, $age, $sexo, $password)
  {
    parent::__construct($username, $email, $password, 'paciente');
    $this->age = $age;
    $this->sexo = $sexo;
  }

  public function getPermissions()
  {
    return ['view_historico', 'view_agendamentos'];
  }

  public function cadastrar()
  {
    try {
      $conn = Database::getHefestos();
      $paciente = ['nome' => $this->username, 'email' => $this->email, 'data_nascimento' => $this->age, 'sexo' => $this->sexo, 'senha' => password_hash($this->password, PASSWORD_BCRYPT), 'tipo' => 'Paciente'];
      $conn->tabela('paciente')->insert($paciente);

    } catch (PDOException $e) {
      die("Error: " . $e->getMessage());
    }
  }

  public function delete($id)
  {
    try {
      $conn = Database::getHefestos();
      $conn->tabela('paciente')->delete(['id' => $id]);
    } catch (PDOException $e) {
      die("Error: " . $e->getMessage());
    }
  }

  public function getAll()
  {
    try {
      $conn = Database::getConn();
      $stmt = $conn->prepare("SELECT * FROM paciente");
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      die("Error: " . $e->getMessage());
    }
  }
}