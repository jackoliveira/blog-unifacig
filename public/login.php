<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" integrity="sha256-UzFD2WYH2U1dQpKDjjZK72VtPeWP50NoJjd26rnAdUI=" crossorigin="anonymous" />
  <link rel="stylesheet" href="css/style.css" />
  <title>Login</title>
</head>
<body>
  <?php include '../config/locale.php' ?>
  <?php include '../config/session_start.php' ?>
  <?php include '../config/auth.php' ?>
  <?php include 'shared/navbar.php' ?>

  <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $auth = new Auth();
        if($auth->autenticar($_POST['login'], $_POST['senha'])) {
          header('location: criar_noticia.php');
        } else {
          $_SESSION['alert'] = "<article class=\"message is-danger is-small\"><div class=\"message-body\">Usuário ou senha incorretos.</div></article>";
          header('location: login.php');
        };
    }
  ?>
  <div class="container">
    <div class="columns is-desktop">
      <div class="column is-one-third is-offset-one-third">
        <?php if ($_SERVER['REQUEST_METHOD'] == 'GET') { ?>
        <h1 class="title has-text-centered">Login</h1>
        <?php if (isset($_SESSION['alert'])) { echo $_SESSION['alert']; unset($_SESSION['alert']); } ?>
        <form action="login.php" method="post">
          <div class="field">
            <label class="label" for="login">Login</label>
            <div class="control">
              <input class="input" type="text" name="login" required>
            </div>
          </div>
          <div class="field">
            <label class="label" for="senha">Senha</label>
            <div class="control">
              <input class="input" type="password" name="senha" required>
            </div>
          </div>
          <button class="button is-primary" type="submit">Enviar</button>
        </form>
        <?php } ?>
        
      </div>
    </div>
  </div>
  <?php include 'shared/footer.php' ?>

</body>
</html>