<?php

require '../config/Database.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $clinicName = $_POST['clinic_name'];
  $clinicCNPJ = $_POST['clinic_cnpj'];
  $clinicEmail = $_POST['clinic_email'];
  $clinicPassword = $_POST['clinic_password'];

  try {
    $conn = Database::getConn();
    $stmt = $conn->prepare("SELECT COUNT(*) FROM clinics WHERE cnpj = ? OR email = ?");
    $stmt->execute([$clinicCNPJ, $clinicEmail]);
    $clinicExists = $stmt->fetchColumn();

    if ($clinicExists) {
      echo  "<script>alert('Erro ao cadastrar, clínica já cadastrada.');</script>";
    } else {
      $stmt = $conn->prepare("INSERT INTO clinics (nome, cnpj, email, senha) VALUES (?, ?, ?, ?)");
      $hashedPassword = password_hash($clinicPassword, PASSWORD_BCRYPT);
      $stmt->execute([$clinicName, $clinicCNPJ, $clinicEmail, $hashedPassword]);
      $clinicId = $conn->lastInsertId();

      $_SESSION['clinic_id'] = $clinicId;
      $_SESSION['clinic_name'] = $clinicName;
      header('Location: adminMasterView.php');
      exit;
    }
  } catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Umbrella-Cadastro</title>
  <link rel="stylesheet" href="/clinic_management/public/styles/autentication/cadastro.css">
</head>

<body>
  <header id="home" class="header-bg">
    <div class="header">
      <a href="/clinic_management/views/landingPageView.php"><img class="header-logo" src="/clinic_management/public/midia//img/umbrella-logo.svg"></a>
    </div>
  </header>

  <section>
    <h1 class="sign-up-title poppins-medium c11">Cadastre sua <span class="detail poppins-semibold">clínica</class>
    </h1>
    <form method="post">
      <div class="input-container">
        <label class="roboto-regular">Nome da clínica</label>
        <input type="text" class="roboto-regular" name="clinic_name" placeholder="Nome da clínica*" required>
      </div>
      <div class="input-container">
        <label class="roboto-regular">CNPJ</label>
        <input type="number" class="roboto-regular" name="clinic_cnpj" placeholder="CNPJ*" required>
      </div>
      <div class="input-container">
        <label class="roboto-regular">Email</label>
        <input type="email" class="roboto-regular" name="clinic_email" placeholder="Email*" required>
      </div>
      <div class="input-container">
        <label class="roboto-regular">Senha</label>
        <input type="password" class="roboto-regular" name="clinic_password" placeholder="Senha*" required>
      </div>
      <button type="submit" class="sign-up-btn poppins-semibold c01">Cadastrar</button>
    </form>
  </section>
</body>

</html>