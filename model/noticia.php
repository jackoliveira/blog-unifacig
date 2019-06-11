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
    $query = "SELECT noticia.id, noticia.titulo, noticia.texto, noticia.foto, usuario.nome
    FROM noticia INNER JOIN usuario ON noticia.usuario_id = usuario.id
    ORDER BY noticia.publicado_em DESC LIMIT 10";
    $query = $this->pdo->query($query);
    
    if($query->rowCount() > 0){
      return $query->fetchAll();
    } else {
      return array();
    }
  }

  public function consultar($id){
    $query = "SELECT noticia.titulo, noticia.texto, noticia.foto, usuario.nome, noticia.publicado_em
    FROM noticia RIGHT JOIN usuario ON noticia.usuario_id = usuario.id WHERE noticia.id = :id";
    $query = $this->pdo->prepare($query);
    $query->bindValue(':id', $id);
    $query->execute();
    
    if($query->rowCount() > 0){
      return $query->fetch();
    } else { return array(); }
  }

  public function criar($autor, $titulo, $texto, $foto, $publicado_em, $status) {
    $query = "INSERT INTO noticia ( usuario_id, titulo, texto, foto, publicado_em, status)
      VALUES ( :autor, :titulo, :texto, :foto, :publicado_em, :status)";
      
    $query = $this->pdo->prepare($query);
    $query->bindValue(':autor', $autor);
    $query->bindValue(':titulo', $titulo);
    $query->bindValue(':texto', $texto);
    $query->bindValue(':foto', $foto);
    $query->bindValue(':publicado_em', $publicado_em);
    $query->bindValue(':status', $status);
    if($query->execute()) {
      return true;
    } else {
      return false;
    }
  }
}

?>