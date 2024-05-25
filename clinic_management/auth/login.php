<?php
require_once '../config/Database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $userType = $_POST['user_type'];
  $email = $_POST['user_email'];
  $password = $_POST['user_password'];

  $validUserTypes = ['clinica', 'admin', 'medico', 'paciente'];
  if (!in_array($userType, $validUserTypes)) {
    die('Tipo de usuário inválido.');
  } else {
    $tableMap = [
      'clinica' => 'clinic',
      'admin' => 'admin',
      'medico' => 'medico',
      'paciente' => 'paciente'
    ];

    $tableName = $tableMap[$userType];

    try {
      $conn = Database::getConn();
      $stmt = $conn->prepare("SELECT * FROM $tableName WHERE email = ?");
      $stmt->execute([$email]);
      $user = $stmt->fetch();

      if ($user && password_verify($password, $user['senha'])) {
        switch ($userType) {
          case 'clinica':
            $clinicName = $user['nome'];
            header('Location: /clinic_management/views/adminMasterView.php?clinicName=' . urlencode($clinicName));
            exit();
          case 'admin':
            $adminName = $user['nome'];
            header('Location: /clinic_management/views/adminView.php?adminName=' . urlencode($adminName));
            exit();
          case 'medico':
            $medicoName = $user['nome'];
            header('Location: /clinic_management/views/medicoView.php');
            exit();
          case 'paciente':
            $pacienteName = $user['nome'];
            header('Location: /clinic_management/views/pacienteView.php');
            exit();
        }
      } else {
        $error = "Credenciais inválidas. Por favor, tente novamente.";
      }
    } catch (Exception $e) {
      die("Ocorreu um erro no servidor: " . $e->getMessage());
    }
  }
}
