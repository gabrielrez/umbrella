<?php
require_once '../config/Database.php';
require_once '../classes/Paciente.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $pacienteName = filter_input(INPUT_POST, 'paciente_name');
  $pacienteEmail = filter_input(INPUT_POST, 'paciente_email');
  $pacienteDt = filter_input(INPUT_POST, 'paciente_dt');
  $pacienteSexo = filter_input(INPUT_POST, 'paciente_sexo');
  $pacientePassword = $_POST['paciente_senha'];

  if ($pacienteName && $pacienteEmail && $pacienteDt && $pacienteSexo && $pacientePassword) {
    $paciente = new Paciente($pacienteName, $pacienteEmail, $pacienteDt, $pacienteSexo, $pacientePassword);
    $paciente->cadastrar();
    header('Location: /clinic_management/views/adminView.php?adminName=' . urlencode($adminName));
  } else {
    die("Error: All fields are required.");
  }
}