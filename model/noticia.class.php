<?php

class Noticia {

  public $id;
  public $titulo;
  public $texto;
  public $autor;
  public $publicado_em;
  public $status;
  public $foto;

  public function __construct(){
    $this->pdo = new PDO("mysql:host=localhost;dbname=blog_grupo3", "root", "", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
  }

  public function listar(){
    $query = "SELECT noticia.id noticia_id, noticia.titulo noticia_titulo, noticia.texto noticia_texto,
    noticia.status noticia_status, usuario.nome usuario_nome, foto.nome foto_nome, foto.caminho foto_caminho
    FROM noticia INNER JOIN usuario ON usuario.id = noticia.usuario_id
                 INNER JOIN foto ON foto.noticia_id = noticia.id
    WHERE noticia.status = 'publicado'
    ORDER BY noticia.publicado_em DESC LIMIT 10";
    $query = $this->pdo->query($query);
    
    if($query->rowCount() > 0){
      return $query->fetchAll();
    } else {
      return array();
    }
  }

  public function consultar($id) {
    $query = "SELECT noticia.id noticia_id, noticia.titulo noticia_titulo, noticia.texto noticia_texto, noticia.publicado_em noticia_publicado_em, noticia.status noticia_status,
                     usuario.nome usuario_nome, usuario.descricao usuario_descricao, usuario.imagem usuario_imagem, foto.nome foto_nome, foto.caminho foto_caminho,
                     comentario.autor comentario_autor, comentario.conteudo comentario_conteudo, comentario.publicado_em comentario_publicado_em
    FROM noticia LEFT JOIN usuario ON usuario.id = noticia.usuario_id 
                 LEFT JOIN foto ON foto.noticia_id = noticia.id
                 LEFT JOIN comentario ON comentario.noticia_id = noticia.id
                 WHERE noticia.id = :id";
    
    $query = $this->pdo->prepare($query);
    $query->bindValue(':id', $id);
    $query->execute();
    
    if($query->rowCount() > 0){
      return $query->fetch();
    } else { return array(); }
  }

  public function criar($autor, $titulo, $texto, $publicado_em, $status) {
    $query = "INSERT INTO noticia ( usuario_id, titulo, texto, publicado_em, status )
      VALUES ( :autor, :titulo, :texto, :publicado_em, :status )";

    $query = $this->pdo->prepare($query);
    $query->bindValue(':autor', $autor);
    $query->bindValue(':titulo', $titulo);
    $query->bindValue(':texto', $texto);
    $query->bindValue(':publicado_em', $publicado_em);
    $query->bindValue(':status', $status);
    if($query->execute()) {
      return $this->pdo->lastInsertId();
    } else {
      return false;
    }
  }

  public function editar($noticia_id, $autor, $titulo, $texto, $publicado_em, $status) {
    $query = "UPDATE noticia SET noticia.usuario_id = :autor, noticia.titulo = :titulo, noticia.texto = :texto, noticia.publicado_em = :publicado_em, noticia.status = :status WHERE noticia.id = :noticia_id";
    $query = $this->pdo->prepare($query);
    $query->bindValue(':autor', $autor);
    $query->bindValue(':titulo', $titulo);
    $query->bindValue(':texto', $texto);
    $query->bindValue(':noticia_id', intval($noticia_id));
    $query->bindValue(':publicado_em', $publicado_em);
    $query->bindValue(':status', $status);
    $query->execute() or die(print_r($query->errorInfo(), true));
    //if($query->execute()) {
    //  return 1;
    //} else {
    //  return 999;
    //}
  }
}

?>
