<?php
require_once '../config/Database.php';
require_once '../classes/Paciente.php';
require_once '../classes/Medico.php';

session_start();

$paciente = new Paciente(null, null, null, null, null);
$pacientes = $paciente->getAll();

$medico = new Medico(null, null, null, null, null);
$medicos = $medico->getAll();

$adminName = $_SESSION['nome'];
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
  <title>Clinica - Admin</title>
  <link rel="stylesheet" href="/clinic_management/public/styles/admin_padrao/homepage.css">
</head>

<body>
  <header>
    <img src="/clinic_management/public/midia/img/umbrella-logo-footer.svg">
    <nav class="header-menu-admin">
      <a href="#" class="open-modal-btn roboto-regular c01">Agendar Consulta</a>
      <button type="submit" onclick="location.href='logout.php'" class="exit-session-btn poppins-semibold c01">Sair da Conta</button>
    </nav>
  </header>

  <div class="container">
    <h1 class="wellcome-title poppins-semibold c11">Bem vindo, <?php echo htmlspecialchars($adminName); ?></h1>

    <div class="forms">
      <form method="post" action="/clinic_management/auth/register_paciente.php">
        <h2 class="form-title poppins-semibold c11">Cadastrar Paciente</h2>
        <div class="input-container">
          <label class="roboto-regular">Nome do paciente</label>
          <input type="text" class="roboto-regular" name="paciente_name" placeholder="Nome do paciente*" required>
        </div>
        <div class="input-container">
          <label class="roboto-regular">Data de nascimento</label>
          <input type="date" class="roboto-regular" name="paciente_dt" placeholder="Data de nascimento*" required>
        </div>
        <div class="input-container">
          <label class="roboto-regular">Sexo</label>
          <select id="paciente_sexo" name="paciente_sexo">
            <option value="m">Masculino</option>
            <option value="f">Feminino</option>
          </select>
        </div>
        <div class="input-container">
          <label class="roboto-regular">Email</label>
          <input type="email" class="roboto-regular" name="paciente_email" placeholder="Email*" required>
        </div>
        <div class="input-container">
          <label class="roboto-regular">Senha</label>
          <input type="password" class="roboto-regular" name="paciente_senha" placeholder="Senha*" required>
        </div>
        <button type="submit" class="sign-up-btn-modal poppins-semibold c01">Cadastrar</button>
      </form>

      <form method="post" action="/clinic_management/auth/register_medico.php">
        <h2 class="form-title poppins-semibold c11">Cadastrar Médico</h2>
        <div class="input-container">
          <label class="roboto-regular">Nome do médico</label>
          <input type="text" class="roboto-regular" placeholder="Nome do usuário*" required>
        </div>
        <div class="input-container">
          <label class="roboto-regular">Especialidade</label>
          <input type="text" class="roboto-regular" placeholder="Especialidade*" required>
        </div>
        <div class="input-container">
          <label class="roboto-regular">Email</label>
          <input type="email" class="roboto-regular" placeholder="Email*" required>
        </div>
        <div class="input-container">
          <label class="roboto-regular">Senha</label>
          <input type="password" class="roboto-regular" placeholder="Senha*" required>
        </div>
        <button type="submit" class="sign-up-btn-modal poppins-semibold c01">Cadastrar</button>
      </form>
    </div>

    <div>
      <h3 class="poppins-semibold c11">Lista de Usuários</h3>
      <table>
        <thead>
          <tr class="c01 poppins-medium">
            <th class="first">#</th>
            <th>Tipo</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Data Nasc.</th>
            <th>Sexo</th>
            <th class="last">Ações</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($pacientes as $paciente) : ?>
          <tr class="registro roboto-regular">
            <td><?php echo htmlspecialchars($paciente['id']); ?></td>
            <td><?php echo htmlspecialchars($paciente['tipo']); ?></td>
            <td><?php echo htmlspecialchars($paciente['nome']); ?></td>
            <td><?php echo htmlspecialchars($paciente['email']); ?></td>
            <td><?php echo htmlspecialchars($paciente['data_nascimento']); ?></td>
            <td><?php echo htmlspecialchars($paciente['sexo']); ?></td>
            <td>Excluir</td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>

  <div id="modal" class="modal-container">
    <div class="modal-box">
      <h2 class="modal-title poppins-semibold">Agendar Consulta</h2>
      <div class="modal-content">
        <form method="post" action="/clinic_management/auth/register_consulta.php">
          <div class="input-container">
            <label class="roboto-regular">Médico CPF</label>
            <input type="number" class="roboto-regular" placeholder="Medico CPF*" required>
          </div>
          <div class="input-container">
            <label class="roboto-regular">Paciente CPF</label>
            <input type="number" class="roboto-regular" placeholder="Paciente CPF*" required>
          </div>
          <div class="input-container">
            <label class="roboto-regular">Data</label>
            <input type="date" class="roboto-regular" placeholder="Data*" required>
          </div>
          <button type="submit" class="sign-up-btn-modal poppins-semibold c01">Cadastrar</button>
        </form>
      </div>
    </div>
  </div>

  <script type="module" src="../public/scripts/main.js"></script>

</body>

</html>