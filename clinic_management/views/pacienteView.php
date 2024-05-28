<?php
require_once '../config/Database.php';
require_once '../classes/Paciente.php';
require_once '../classes/Medico.php';

session_start();

$medico = new Medico(null, null, null, null, null);
$medicos = $medico->getAll();

$paciente = new Paciente(null, null, null, null, null);
$pacientes = $paciente->getAll();

// $pacienteName = $_SESSION['nome'];
$pacienteName = 'Nome';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
  <link rel="icon" href="img/umbrella.svg">
  <title>Clinica - Paciente</title>
  <link rel="stylesheet" href="/clinic_management/public/styles/admin_padrao/homepage.css">
</head>

<body>
  <header>
    <img src="/clinic_management/public/midia/img/umbrella-logo-footer.svg">
    <nav class="header-menu-admin">
      <a href="#" class="roboto-regular c01">Meu Perfil</a>
      <button type="submit" onclick="location.href='logout.php'" class="exit-session-btn poppins-semibold c01">Sair da Conta</button>
    </nav>
  </header>

  <div class="container">
    <h1 class="wellcome-title poppins-semibold c11">Bem vindo, <?php echo htmlspecialchars($pacienteName); ?></h1>

    <table class="active">
      <thead>
        <tr class="c01 poppins-medium">
          <th class="first">#</th>
          <th>Data da Consulta</th>
          <th>Horário</th>
          <th class="last">Paciente</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($pacientes as $paciente) : ?>
          <tr class="registro roboto-regular">
            <td><?php echo htmlspecialchars($paciente['id']); ?></td>
            <td><?php echo htmlspecialchars($paciente['nome']); ?></td>
            <td><?php echo htmlspecialchars($paciente['email']); ?></td>
            <td><?php echo htmlspecialchars($paciente['data_nascimento']); ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

  </div>

  <script type="module" src="../public/scripts/main.js"></script>

</body>

</html>