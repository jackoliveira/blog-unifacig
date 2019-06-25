<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.css" />
  <link rel="stylesheet" href="css/style.css" />
  <title>Index Notícias</title>
  <style>
    .noticia {
      background-repeat: no-repeat;
      background-size: cover;
      background-position: center;
    }
    .title {
      color: white !important;
    }
    .title a {
      text-decoration: none !important;;
    }
    .subtitle {
      color: white !important;
    }
    
  </style>
</head>
<body>
  <?php include '../config/session_start.php' ?>
  <?php include '../model/noticia.class.php' ?>
  <?php include 'shared/navbar.php' ?>
  
    <div class="container" id="noticias">
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
              if ($counter % 4 == 0) { echo "</div>"; $counter = 1;} else { $counter++; }
          }

            ?>
          </div>
      </div>
    </div>
  <?php include 'shared/footer.php' ?>

</body>
</html>