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
  <?php include '../config/database.php' ?>
  <?php include '../config/session.php' ?>
  <?php include '../config/auth.php' ?>
  <?php include 'shared/navbar.php' ?>

  <?php
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $_SESSION['login'] = $_POST['login'];
        $_SESSION['senha'] = $_POST['senha'];
        $_SESSION['logged'] = true;
        $auth = new Auth();
        if($auth->autenticar($_SESSION['login'], $_SESSION['senha'])) {
          header( 'location: criar_noticia.php');
        } else {
          header( 'location: index.php');
        };
    } else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        // TODO: Create a session logic
    } else {
      // 
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
        <?php } else if ($_SERVER['REQUEST_METHOD'] == 'POST') {}
        ?>
        
      </div>
    </div>
  </div>
  <?php include 'shared/footer.php' ?>

</body>
</html>