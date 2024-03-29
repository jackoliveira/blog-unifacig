<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" integrity="sha256-UzFD2WYH2U1dQpKDjjZK72VtPeWP50NoJjd26rnAdUI=" crossorigin="anonymous" />
  <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">  
  <link rel="stylesheet" href="css/style.css" />
  <title>Criação de Notícias</title>
</head>
<body>
  <?php include '../config/locale.php' ?>
  <?php include '../config/session_start.php' ?>
  <?php include '../config/session.php' ?>
  <?php include '../model/noticia.class.php' ?>
  <?php include '../model/foto.class.php' ?>
  <?php include 'shared/navbar.php' ?>
  <?php
      $noticia = new Noticia();
      $foto = new Foto();
  ?>
  <div class="container">
    <div class="columns is-desktop">
      <div class="column is-three-fifths is-offset-one-fifth is-column-mobile">
        <?php if ($_SERVER['REQUEST_METHOD'] == 'GET') { ?>
        <h1 class="title">Criação da Notícia</h1>
        <form action="criar_noticia.php" method="post" enctype="multipart/form-data">
          <div class="field">
            <label class="label" for="titulo">Titulo</label>
            <div class="control">
              <input class="input" type="text" placeholder="Titulo" name="titulo" required>
            </div>
            
          </div>
          <div class="field" >
            <label class="label" for="texto">Texto</label>
            <div class="control">
              <input type="hidden" class="input" name="texto" id="texto">
              <div id="editor" onkeyup="quillHandler()"></div>
            </div>
          </div>
          <div class="columns">
            <div class="column">
              <div class="field">
                <label class="label">Autor</label>
                <div class="control">
                  <input class="input" type="text" value="<?php echo $_SESSION['nome']; ?>" disabled>
                </div>
              </div>
            </div>
            <div class="column">
              <div class="field">
                <label class="label" for="publicado_em" >Publicado em</label>
                <div class="control">
                  <input class="input" type="datetime-local" name="publicado_em" required>
                </div>
              </div>
            </div>
          </div>
          <div class="columns">
            <div class="column">
              <div class="field">
                <label class="label" for="foto">Foto</label>
                <div class="control">
                  <input type="file" name="foto"><br>
                  <small>Se nenhuma foto for selecionada, <br>nós colocaremos uma padrão.</small>
                </div>
              </div>
            </div>
            <div class="column">
              <div class="field">
                <label class="label" for="status">Status</label>
                <div class="control">
                  <span>Publicado</span>
                <input type="checkbox" name="status" value="publicado" checked>
                </div>
              </div>
            </div>
          </div>
          <button class="button is-primary" type="submit">Enviar</button>
        </form>
        <?php } else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          try {
            if(!isset($_POST['status'])) { $_POST['status'] = false; }
            $noticiaId = $noticia->criar($_SESSION['id'], $_POST['titulo'],
                            $_POST['texto'], $_POST['publicado_em'],
                            $_POST['status']);
            if($_FILES['foto']['error'] == 0) {
              $foto->criar($noticiaId, $_FILES['foto']);
            } else {
              $foto->criarDefault($noticiaId);
            }
            echo "<article class=\"message is-success is-small\"><div class=\"message-body\">Notícia criada com sucesso!</div></article>";
          } catch (Exception $e) { die("error"); }
        }
        ?>
      </div>
    </div>
  </div>
  <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
  <script>
  var quill = new Quill('#editor', {
    modules: {
      toolbar: [
        ['bold', 'italic', 'underline', 'strike'],
        ['link', 'blockquote', 'code-block', 'image'],
        [{ 'header': 1 }, { 'header': 2 }],
        [{ 'list': 'ordered'}, { 'list': 'bullet' }],
        [{ 'script': 'sub'}, { 'script': 'super' }],
        [{ 'indent': '-1'}, { 'indent': '+1' }],
        [{ 'direction': 'rtl' }],
        [{ 'size': ['small', false, 'large', 'huge'] }],
        [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
        [{ 'color': [] }, { 'background': [] }],
        [{ 'align': [] }],
        ['clean']
      ]
    },
    placeholder: 'Corpo da notícia...',
    theme: 'snow'
  });
  function quillHandler() {
    let texto = document.querySelector('input[name=texto]').value = quill.root.innerHTML;
  };
  </script>

  <?php include 'shared/footer.php' ?>
</body>
</html>