<?php
require '../config/Database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['user_name']) && isset($_POST['user_password'])) {
    $email = $_POST['user_email'];
    $password = $_POST['user_password'];

    try {
      $conn = Database::getConn();
      $stmt = $conn->prepare("SELECT * FROM tabelas de usuarios do banco WHERE email = ?");
      $stmt->execute([$email]);
      $user = $stmt->fetch();

      if ($user && password_verify($password, $user['senha'])) {
        header("Location: pagina_de_destino.php");
        exit();
      } else {
        echo  "<script>alert('Erro ao logar, credenciais erradas.');</script>";
      }
    } catch (PDOException $e) {
      echo "Erro: " . $e->getMessage();
    }
  } else {
    echo  "<script>alert('Preencha todos os campos.');</script>";
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Umbrella-Login</title>
  <link rel="stylesheet" href="/clinic_management/public/styles/autentication/cadastro.css">
</head>

<body class="">
  <header id="home" class="header-bg">
    <div class="header">
      <a href="/clinic_management/views/landingPageView.php"><img class="header-logo" src="/clinic_management/public/midia//img/umbrella-logo.svg"></a>
    </div>
  </header>

  <section>
    <h1 class="sign-in-title poppins-medium c11">Entre na sua conta</h1>
    <form method="post">
      <div class="input-container">
        <label class="roboto-regular">Email</label>
        <input type="email" class="roboto-regular" name="user_email" placeholder="Email*" required>
      </div>
      <div class="input-container">
        <label class="roboto-regular">Senha</label>
        <input type="password" class="roboto-regular" name="user_password" placeholder="Senha*" required>
      </div>
      <button type="submit" class="sign-in-btn poppins-semibold c01">Entrar</button>
    </form>
  </section>
</body>

</html>