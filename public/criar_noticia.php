<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.css" />
  <link rel="stylesheet" href="css/style.css" />
  <title>Criação de Notícias</title>
</head>
<body>
  <?php include '../config/session_start.php' ?>
  <?php include '../config/session.php' ?>
  <?php include '../model/noticia.php' ?>
  <?php include 'shared/navbar.php' ?>
  <?php
      $noticia = new Noticia();
  ?>
  <div class="container">
    <div class="columns is-desktop">
      <div class="column is-three-fifths is-offset-one-fifth is-column-mobile">
        <?php if ($_SERVER['REQUEST_METHOD'] == 'GET') { ?>
        <h1 class="title">Criação da Notícia</h1>
        <form action="criar_noticia.php" method="post">
          <label for="titulo">Título</label>
          <input class="input" type="text" name="titulo">
          <label for="texto">Texto</label>
          <textarea class="textarea" type="text" name="texto" rows="2"></textarea>
          <label for="autor">Autor</label>
          <!-- TODO: Current user as Autor -->
          <input class="input" type="text" name="autor" placeholder="current user">
          <label for="publicado_em">Publicado em</label>
          <input class="input" type="date" name="publicado_em">
          <label for="status">Status</label>
          <input type="checkbox" name="status" value="true" checked>
          <br>
          <!-- TODO: Upload of Photos -->
          <label for="foto">Foto</label>
          <input class="input" type="text" name="foto"><br>
          <br>
          <button class="button is-primary" type="submit">Enviar</button>

        </form>
        <?php } else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          if($noticia->criar(
            $_POST['autor'], $_POST['titulo'],
            $_POST['texto'], $_POST['foto'],
            $_POST['publicado_em'], $_POST['status'])
            ) { echo "<h1>Noticia Criada com sucesso</h1>"; }
            else { echo "<h1>Ocorreram erros na criacao da Noticia.</h1>"; }
          }
        ?>
      </div>
    </div>
  </div>
  <?php include 'shared/footer.php' ?>

</body>
</html>