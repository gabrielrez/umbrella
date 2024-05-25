<?php
require_once 'User.php';

class AdminPadrao extends User
{

  public function __construct($username, $email, $password)
  {
    parent::__construct($username, $email, $password, 'adminPadrao');
  }

  public function getPermissions()
  {
    return ['manage_medicos', 'manage_pacientes'];
  }

  public function cadastrar()
  {
    try {
      $conn = Database::getConn();
      $stmt = $conn->prepare("INSERT INTO admin (nome, email, senha) VALUES (?, ?, ?)");
      $stmt->execute([$this->username, $this->email, password_hash($this->password, PASSWORD_BCRYPT)]);
    } catch (PDOException $e) {
      die("Error: " . $e->getMessage());
    }
  }

  public function getAll()
  {
    try {
      $conn = Database::getConn();
      $stmt = $conn->prepare("SELECT * FROM admin");
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      die("Error: " . $e->getMessage());
    }
  }
}
