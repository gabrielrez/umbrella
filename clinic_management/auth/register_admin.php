<?php
require_once '../config/Database.php';
require_once '../classes/AdminPadrao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $adminName = filter_input(INPUT_POST, 'user_name');
  $adminEmail = filter_input(INPUT_POST, 'user_email');
  $adminPassword = $_POST['user_senha'];

  if ($adminName && $adminEmail && $adminPassword) {
    $admin = new AdminPadrao($adminName, $adminEmail, $adminPassword);
    $admin->cadastrar();
  } else {
    die("Error: All fields are required.");
  }
}
