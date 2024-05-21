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
  <link rel="stylesheet" href="../public/styles/admin_master/admin_master.css">
</head>

<body>
  <header class="mx-auto container p-5 mt-4 md:flex items-center justify-between hidden bg-white/60 backdrop-blur-md rounded-lg">
    <img src="/clinic_management/public/midia/img/umbrella-logo.svg">
  </header>

  <div class="container mx-auto mt-10">
    <button id="openModal" class="bg-cBase1 text-white py-3 px-6 rounded-lg mb-6">Cadastrar Usuário</button>

    <!-- Modal -->
    <div id="myModal" class="modal hidden fixed z-10 inset-0 overflow-y-auto">
      <div class="flex items-center justify-center min-h-screen">
        <div class="modal-content bg-white rounded-lg p-8">
          <span class="close absolute top-0 right-0 p-4 cursor-pointer">&times;</span>
          <h2 class="text-2xl font-semibold mb-4">Cadastro de Usuário</h2>
          <form>
            <div class="mb-4">
              <label class="block text-sm font-medium text-gray-700">Nome</label>
              <input type="text" class="form-input mt-1 block w-full" placeholder="Nome*" required>
            </div>
            <div class="mb-4">
              <label class="block text-sm font-medium text-gray-700">Email</label>
              <input type="email" class="form-input mt-1 block w-full" placeholder="Email*" required>
            </div>
            <div class="mb-4">
              <label class="block text-sm font-medium text-gray-700">Senha</label>
              <input type="password" class="form-input mt-1 block w-full" placeholder="Senha*" required>
            </div>
            <div class="flex justify-end">
              <button type="submit" class="bg-purple-700 text-white py-2 px-4 rounded-lg">Cadastrar</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Tabela de Usuários -->
    <div class="bg-white/60 backdrop-blur-md rounded-lg p-6">
      <h2 class="text-2xl font-semibold mb-4">Lista de Usuários</h2>
      <table class="table-auto w-full">
        <thead>
          <tr>
            <th class="px-4 py-2">#</th>
            <th class="px-4 py-2">Nome</th>
            <th class="px-4 py-2">Email</th>
            <th class="px-4 py-2">Ações</th>
          </tr>
        </thead>
        <tbody>
          <!--
          <tr><td>1</td><td>Usuário 1</td><td>usuario1@example.com</td><td>Excluir</td></tr>
        -->
        </tbody>
      </table>
    </div>
  </div>

</body>

</html>