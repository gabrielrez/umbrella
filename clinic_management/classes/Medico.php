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
      $conn = Database::getConn();
      $stmt = $conn->prepare("INSERT INTO medico (nome, email, especialidade, crm, senha, tipo) VALUES (?, ?, ?, ?, ?, ?)");
      $stmt->execute([$this->username, $this->email, $this->especialidade, $this->CRM, password_hash($this->password, PASSWORD_BCRYPT), 'Médico']);
    } catch (PDOException $e) {
      die("Error: " . $e->getMessage());
    }
  }

  public function delete($id)
  {
    try {
      $conn = Database::getConn();
      $stmt = $conn->prepare("DELETE FROM medico WHERE id = ?");
      $stmt->execute([$id]);
    } catch (PDOException $e) {
      die("Error: " . $e->getMessage());
    }
  }

  public function getAll()
  {
    try {
      $conn = Database::getConn();
      $stmt = $conn->prepare("SELECT * FROM medico");
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      die("Error: " . $e->getMessage());
    }
  }
}