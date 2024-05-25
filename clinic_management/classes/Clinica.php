<?php
require_once 'User.php';

class Clinica extends User
{

  public $cnpj;

  public function __construct($username, $email, $cnpj, $password)
  {
    parent::__construct($username, $email, $password, 'adminMaster');
    $this->cnpj = $cnpj;
  }

  public function getPermissions()
  {
    return ['manage_admins'];
  }

  public function getNomeClinica($clinicId)
  {
    $conn = Database::getConn();
    $stmt = $conn->prepare("SELECT nome FROM clinic WHERE id = ?");
    $stmt->execute([$clinicId]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['nome'];
  }

  public function cadastrar()
  {
    try {
      $conn = Database::getConn();
      $stmt = $conn->prepare("INSERT INTO clinic (nome, email, cnpj, senha) VALUES (?, ?, ?, ?)");
      $stmt->execute([$this->username, $this->email, $this->cnpj, password_hash($this->password, PASSWORD_BCRYPT)]);
    } catch (PDOException $e) {
      die("Error: " . $e->getMessage());
    }
  }

  public function getAll()
  {
    //getAll
  }
}
