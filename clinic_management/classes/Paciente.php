<?php
require_once 'User.php';

class Paciente extends User
{

  public function __construct($id, $username, $password)
  {
    parent::__construct($id, $username, $password, 'paciente');
  }

  public function getPermissions()
  {
    return ['view_historico', 'view_agendamentos'];
  }

  public function viewHistorico()
  {
    $conn = Database::getConn();
    $stmt = $conn->query("SELECT * FROM historico WHERE paciente_id = {$this->id}");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function viewAgendamentos()
  {
    $conn = Database::getConn();
    $stmt = $conn->query("SELECT * FROM agendamentos WHERE paciente_id = {$this->id}");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}