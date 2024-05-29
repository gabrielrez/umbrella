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
      $conn = Database::getHefestos();
      $admin = ['nome' => $this->username, 'email' => $this->email, 'senha' => password_hash($this->password, PASSWORD_BCRYPT), 'tipo' => 'Paciente'];
      $conn->tabela('admin')->insert($admin);
    } catch (PDOException $e) {
      die("Error: " . $e->getMessage());
    }
  }

  public function delete($id)
  {
    try {
      $conn = Database::getHefestos();
      $conn->tabela('admin')->delete(['id' => $id]);
    } catch (PDOException $e) {
      die("Error: " . $e->getMessage());
    }
  }

  public function getAll()
  {
    try {
      $conn = Database::getHefestos();
      return $conn->tabela('admin')->buscarTodos();
    } catch (PDOException $e) {
      die("Error: " . $e->getMessage());
    }
  }
}