<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" integrity="sha256-UzFD2WYH2U1dQpKDjjZK72VtPeWP50NoJjd26rnAdUI=" crossorigin="anonymous" />
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <title>Visualizando notícia</title>
</head>
<body>
  <?php include '../config/locale.php' ?>
  <?php include '../config/session_start.php' ?>
  <?php include '../model/noticia.class.php' ?>
  <?php include '../model/comentario.class.php' ?>
  <?php include '../model/curtida.class.php' ?>
  <?php include 'shared/navbar.php' ?>
  <?php
      $noticia = new Noticia();
      $noticia = $noticia->consultar(base64_decode($_GET['id']));
      $comentarios = new Comentario();
      $comentarios = $comentarios->listar($noticia['noticia_id']);
      $curtida = new Curtida();
      $curtida = $curtida->consultar($noticia['noticia_id']);
  ?>
  <div class="container">
    <div class="columns is-desktop">
      <div class="column is-three-fifths is-offset-one-fifth is-column-mobile">
      <?php 
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && ($_POST['autor'] && $_POST['comentario'])) {
          $comentario = new Comentario();
          try {
            $comentario->criar($noticia['noticia_id'], $_POST['autor'], $_POST['comentario']);
            header("Location: noticia.php?id=.".$_GET['id']);
          } catch (Exception $e) { die($e); }
        }
      ?>
        <main>
          <h1 class="title is-2 has-text-weight-normal" id="news-title">
            <?php echo $noticia['noticia_titulo']; ?>
          </h1>
          <article class="media">
            <figure class="media-left">
              <p class="image is-64x64">
                <img class="is-rounded" src="https://bulma.io/images/placeholders/128x128.png">
              </p>
            </figure>
            <div class="media-content">
              <div class="content">
                <p>
                  <?php echo $noticia['usuario_nome']; ?> 
                  <a class="tag is-black">Link para autor</a>
                  <br>
                  <small>Descrição do autor</small>
                </p>
              </div>
            </div>
          </article>
        </main>
        <section id="text">
          <figure class="image">
            <img src="<?php echo $noticia['foto_caminho']; ?>" alt="foto principal">
          </figure>
          <p>
            <?php echo $noticia['noticia_texto']; ?>
          </p>
        </section>
        <div class="likes">
          <span class="icon">
            <a href="#"><i class="far fa-thumbs-up"></i></a>
          </span>
          <span class="likes-text">
            <?php echo $curtida['curtida_quantidade']; ?>
            likes
          </span>
        </div>
        <hr>
        <form action="noticia.php?id=<?php echo $_GET['id']; ?>" method="POST">
          <div class="field">
            <label class="label">Autor</label>
            <div class="control">
              <input class="input" type="text" name="autor">
            </div>
          </div>
          <div class="field">
            <label class="label">Comentario</label>
            <div class="control">
              <textarea class="textarea" placeholder="Lorem Ipsum..." name="comentario"></textarea>
            </div>
          </div>
          <input class="button is-link" type="submit" value="Submit">
        </form>
        <?php if (count($comentarios) > 0) {
          echo "<p id='comments-title'><strong>Comentarios:</strong></p>";
          foreach($comentarios as $comentario) {
        ?>
          <div class="comment-box">
            <div class="comment-header">
              <span><?php echo $comentario['comentario_autor']; ?></span>
            </div>
            <div class="comment-body">
              <?php echo $comentario['comentario_conteudo']; ?>
            </div>
          </div>
        <?php } ?>
        <?php } else { echo "Nenhum comentário ainda."; } ?>
        <hr>
      </div>
    </div>
  </div>
  <?php include 'shared/footer.php' ?>

</body>
</html>