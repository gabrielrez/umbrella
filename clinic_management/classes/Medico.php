<?php
require_once 'User.php';

class Medico extends User
{

  public function __construct($id, $username, $password)
  {
    parent::__construct($id, $username, $password, 'medico');
  }

  public function getPermissions()
  {
    return ['view_pacientes', 'view_agendamentos'];
  }

  public function cadastrar()
  {
    //cadastrar
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


  // public function viewPacientes()
  // {
  //   $conn = Database::getConn();
  //   $stmt = $conn->query("SELECT * FROM users WHERE role = 'paciente'");
  //   return $stmt->fetchAll(PDO::FETCH_ASSOC);
  // }

  // public function viewAgendamentos()
  // {
  //   $conn = Database::getConn();
  //   $stmt = $conn->query("SELECT * FROM agendamentos WHERE medico_id = {$this->id}");
  //   return $stmt->fetchAll(PDO::FETCH_ASSOC);
  // }
}
