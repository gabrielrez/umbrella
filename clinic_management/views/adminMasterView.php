<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
  <link rel="icon" href="img/umbrella.svg">
  <title>Home Page</title>
  <link rel="stylesheet" href="/clinic_management/public/styles/admin_master/admin_master.css">
</head>

<body>
  <header>
    <img src="/clinic_management/public/midia/img/umbrella-logo-footer.svg">
    <a class="nav-btn poppins-semibold c01" href="../../index.php">Sair da Conta</a>
  </header>

  <div class="container">
    <button class="create-btn poppins-semibold c01">Cadastrar Usuário</button>

    <!-- Modal -->
    <div class="modal-container">
      <div class="modal-box">
        <h2 class="modal-title poppins-semibold">Cadastro de Usuário</h2>
        <div class="modal-content">
          <form method="post">
            <div class="input-container">
              <label class="roboto-regular">Nome da clínica</label>
              <input type="text" class="roboto-regular" placeholder="Nome da clínica*" required>
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
      </div>
    </div>
    <!-- Modal -->

    <div class="bg-white/60 backdrop-blur-md rounded-lg p-6">
      <h2 class="poppins-semibold c11">Lista de Usuários</h2>
      <table class="">
        <thead>
          <tr class="c01 poppins-medium">
            <th class="first">#</th>
            <th>Nome</th>
            <th>Tipo</th>
            <th class="last">Ações</th>
          </tr>
        </thead>
        <tbody>

          <tr class="registro roboto-regular">
            <td>1</td>
            <td>Usuário 1</td>
            <td>Paciente</td>
            <td>Excluir</td>
          </tr>

          <tr class="registro roboto-regular">
            <td>2</td>
            <td>Usuário 2</td>
            <td>Medico</td>
            <td>Excluir</td>
          </tr>

          <tr class="registro roboto-regular">
            <td>3</td>
            <td>Usuário 3</td>
            <td>Medico</td>
            <td>Excluir</td>
          </tr>

          <tr class="registro roboto-regular">
            <td>4</td>
            <td>Usuário 4</td>
            <td>Paciente</td>
            <td>Excluir</td>
          </tr>

        </tbody>
      </table>
    </div>
  </div>

  <script src="../public/scripts/modal.js"></script>

</body>

</html>