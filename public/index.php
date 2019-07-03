<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" integrity="sha256-UzFD2WYH2U1dQpKDjjZK72VtPeWP50NoJjd26rnAdUI=" crossorigin="anonymous" />
  <link rel="stylesheet" href="css/style.css" />
  <title>Index Notícias</title>
</head>
<body>
  <?php include '../config/locale.php' ?>
  <?php include '../config/session_start.php' ?>
  <?php include '../model/noticia.class.php' ?>
  <?php include 'shared/navbar.php' ?>
  
    <div class="container" id="noticias">
      <h3 class="title has-text-primary is-size-4">Últimas notícias</h3>
        <?php
          $noticia = new Noticia();
          $noticias = $noticia->listar();
          $counter = 1;
          foreach ($noticias as $item) {
            if ($counter == 1) { echo "<div class='tile is-ancestor'>"; }
              echo "<div class='tile is-parent'>";
                echo "<article class='tile is-child notification noticia' style='background-image: url(\"".$item['foto_caminho']."\");'>";
                  echo "<div>";
                  echo "<p class='title'><a href='noticia.php?id=", base64_encode($item['noticia_id']) ,"'>".substr($item['noticia_titulo'], 0, 30)."</a></p>";
                  echo "<p class='subtitle'>".substr($item['noticia_texto'], 0, 50)."</p>";
                  echo "<p class='subtitle'>".$item['usuario_nome']."</p>";
                  echo "</div>";
                echo "</article>";
              echo "</div>";
            if ($counter % 3 == 0) { echo "</div>"; $counter = 1;} else { $counter++; }
          }

            ?>
          </div>
      </div>
    </div>
    <button class="button is-danger" onclick="window.scroll({ top: 0, left: 0, behavior: 'smooth' }); alert('TOPO');"><span class="icon">
  <i class="fas fa-home"></i>
</span></button>
  <?php include 'shared/footer.php' ?>

</body>
</html>