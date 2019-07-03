<?php

class Comentario {

  public $id;
  public $noticia_id;
  public $autor;
  public $conteudo;
  public $publicado_em;

  public function __construct(){
    $this->pdo = new PDO("mysql:host=localhost;dbname=blog_grupo3", "root", "", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
  }

  public function listar($noticia_id){
    $query = "SELECT comentario.id comentario_id, comentario.noticia_id comentario_noticia_id,
    comentario.autor comentario_autor, comentario.conteudo comentario_conteudo, 
    comentario.publicado_em comentario_publicado_em
    FROM comentario WHERE comentario.noticia_id = :noticia_id
    ORDER BY comentario.publicado_em DESC";

    $query = $this->pdo->prepare($query);
    $query->bindValue(':noticia_id', $noticia_id);                                                    
    $query->execute();
    
    if($query->rowCount() > 0){
      return $query->fetchAll();
    } else {
      return array();
    }
  }

  public function criar($noticia_id, $autor, $conteudo) {
    $query = "INSERT INTO comentario ( noticia_id, autor, conteudo, publicado_em )
      VALUES ( :noticia_id, :autor, :conteudo, :publicado_em )";
    $query = $this->pdo->prepare($query);
    $query->bindValue(':noticia_id', $noticia_id);
    $query->bindValue(':autor', $autor);
    $query->bindValue(':conteudo', $conteudo);
    $query->bindValue(':publicado_em', date('d-m-Y H:i:s'));
    
    if($query->execute()) {
      return true;
    } else {
      return false;
    }
  }

}

?>