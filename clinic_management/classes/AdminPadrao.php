<?php
require_once 'User.php';

class AdminPadrao extends User
{

  public function __construct($id, $username, $password)
  {
    parent::__construct($id, $username, $password, 'adminPadrao');
  }

  public function getPermissions()
  {
    return ['manage_medicos', 'manage_pacientes'];
  }

  public function addMedico($username, $password)
  {
    $conn = Database::getConn();
    $stmt = $conn->prepare("INSERT INTO users (username, password, role) VALUES (?, ?, 'medico')");
    $stmt->execute([$username, password_hash($password, PASSWORD_BCRYPT)]);
  }

  public function removeMedico($id)
  {
    $conn = Database::getConn();
    $stmt = $conn->prepare("DELETE FROM users WHERE id = ? AND role = 'medico'");
    $stmt->execute([$id]);
  }

  public function addPaciente($username, $password)
  {
    $conn = Database::getConn();
    $stmt = $conn->prepare("INSERT INTO users (username, password, role) VALUES (?, ?, 'paciente')");
    $stmt->execute([$username, password_hash($password, PASSWORD_BCRYPT)]);
  }

  public function removePaciente($id)
  {
    $conn = Database::getConn();
    $stmt = $conn->prepare("DELETE FROM users WHERE id = ? AND role = 'paciente'");
    $stmt->execute([$id]);
  }
}