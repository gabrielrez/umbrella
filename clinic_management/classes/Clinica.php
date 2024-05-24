<?php
require_once 'User.php';

class Clinica extends User
{

  public function __construct($id, $username, $password)
  {
    parent::__construct($id, $username, $password, 'adminMaster');
  }

  public function getPermissions()
  {
    return ['manage_admins'];
  }

  public function addAdminPadrao($username, $password)
  {
    $conn = Database::getConn();
    $stmt = $conn->prepare("INSERT INTO users (username, password, role) VALUES (?, ?, 'adminPadrao')");
    $stmt->execute([$username, password_hash($password, PASSWORD_BCRYPT)]);
  }

  public function removeAdminPadrao($id)
  {
    $conn = Database::getConn();
    $stmt = $conn->prepare("DELETE FROM users WHERE id = ? AND role = 'adminPadrao'");
    $stmt->execute([$id]);
  }
}
