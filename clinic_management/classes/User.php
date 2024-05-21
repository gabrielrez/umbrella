<?php
abstract class User
{
  protected $id;
  protected $username;
  protected $password;
  protected $role;

  public function __construct($id, $username, $password, $role)
  {
    $this->id = $id;
    $this->username = $username;
    $this->password = $password;
    $this->role = $role;
  }

  public abstract function getPermissions();
}