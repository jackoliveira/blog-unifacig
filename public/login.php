<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.css" />
  <link rel="stylesheet" href="css/style.css" />
  <title>Login</title>
</head>
<body>
  <?php include '../config/session_start.php' ?>
  <?php include '../config/auth.php' ?>
  <?php include 'shared/navbar.php' ?>

  <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $auth = new Auth();
        if($auth->autenticar($_POST['login'], $_POST['senha'])) {
          header('location: criar_noticia.php');
          $_SESSION['login'] = $_POST['login'];
        } else {
          header('location: index.php');
        };
    }
  ?>
  <div class="container">
    <div class="columns is-desktop">
      <div class="column is-three-fifths is-offset-one-fifth is-column-mobile">
        <?php if ($_SERVER['REQUEST_METHOD'] == 'GET') { ?>
        <h1 class="title">Login</h1>
        <form action="login.php" method="post">
          <label for="login">Login</label>
          <input class="input" type="text" name="login">
          <label for="senha">Senha</label>
          <input class="input" type="password" name="senha">
          <br>
          <button class="button is-primary" type="submit">Enviar</button>
        </form>
        <?php } ?>
        
      </div>
    </div>
  </div>
  <?php include 'shared/footer.php' ?>

</body>
</html>