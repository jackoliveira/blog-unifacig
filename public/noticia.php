<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.css" />
  <link rel="stylesheet" href="css/style.css" />
  <title>Visualizando notícia</title>
</head>
<body>
  <?php include '../config/session_start.php' ?>
  <?php include '../model/noticia.class.php' ?>
  <?php include 'shared/navbar.php' ?>
  <?php
      $noticia = new Noticia();
      $noticia = $noticia->consultar(base64_decode($_GET['id']));
  ?>
  <div class="container">
    <div class="columns is-desktop">
      <div class="column is-three-fifths is-offset-one-fifth is-column-mobile">
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
            <img src="<?php echo $noticia['foto_caminho']; ?>" alt="test">
          </figure>
          <p>
            <?php echo $noticia['noticia_texto']; ?>
          </p>
        </section>
        <hr>
        <?php if ($noticia['comentario_conteudo'] && $noticia['comentario_autor']) { ?>
          <?php if(true) { ?>
          <article class="message is-dark">
            <div class="message-body">
              <strong><?php echo $noticia['comentario_autor']; ?></strong>
              <br>
              <?php echo $noticia['comentario_conteudo']; ?>
            </div>
          </article>
          <?php } ?>
        <?php } else { echo "Zero comments here."; }  ?>
      </div>
    </div>
  </div>
  <?php include 'shared/footer.php' ?>

</body>
</html>