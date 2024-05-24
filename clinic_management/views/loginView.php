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
        <label class="roboto-regular">Nome</label>
        <input type="text" class="roboto-regular" name="user_name" placeholder="Nome*" required>
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