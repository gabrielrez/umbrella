<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Umbrella - Cadastro</title>
  <link rel="stylesheet" href="/clinic_management/public/styles/autentication/cadastro.css">
</head>

<body class="">
  <header id="home" class="header-bg">
    <div class="header">
      <img class="header-logo" src="/clinic_management/public/midia//img/umbrella-logo.svg">
    </div>
  </header>

  <section>
    <h1 class="sign-up-title poppins-medium c11">Cadastre sua <span class="detail poppins-semibold">clínica</class>
    </h1>
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
        <label class="roboto-regular">CNPJ</label>
        <input type="number" class="roboto-regular" placeholder="CNPJ*" required>
      </div>
      <div class="input-container">
        <label class="roboto-regular">Senha</label>
        <input type="password" class="roboto-regular" placeholder="Senha*" required>
      </div>
      <button type="submit" class="sign-up-btn poppins-semibold c01">Cadastrar</button>
    </form>
  </section>
</body>

</html>