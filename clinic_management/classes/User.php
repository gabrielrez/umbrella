<?php
abstract class User
{
  protected $username;
  protected $email;
  protected $password;
  protected $role;

  public function __construct($username, $email, $password, $role)
  {
    $this->username = $username;
    $this->email = $email;
    $this->password = $password;
    $this->role = $role;
  }

  public abstract function cadastrar();

  public abstract function getPermissions();
}
