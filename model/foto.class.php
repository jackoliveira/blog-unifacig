<?php

class Foto {

  public $id;
  public $noticia_id;
  public $nome;
  public $caminho;

  public function __construct(){
    $this->pdo = new PDO("mysql:host=localhost;dbname=blog_grupo3", "root", "", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
  }

  public function criarDefault($noticia_id) {
    $query = "INSERT INTO foto (noticia_id, nome, caminho) VALUES (:noticia_id, :nome, :caminho)";
    $query = $this->pdo->prepare($query);
    $query->bindValue(':noticia_id', $noticia_id);
    $query->bindValue(':nome', "DEFAULT_PHOTO");
    $query->bindValue(':caminho', "images/default_photo.jpg");
    if($query->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function criar($noticia_id, $foto) {
    $query = "INSERT INTO foto (noticia_id, nome, caminho) VALUES (:noticia_id, :nome, :caminho)";
    $fileExt = "." . pathinfo($foto['name'], PATHINFO_EXTENSION);
    $fileName = md5(basename($foto['name']) . time()) . $fileExt;
    $uploadDir = "/opt/lampp/htdocs/blog-unifacig/public/images/uploaded/";
    $fullPath = $uploadDir . $fileName;
    $path = "images/uploaded/" . $fileName;

    move_uploaded_file($foto['tmp_name'], $fullPath);

    $query = $this->pdo->prepare($query);
    $query->bindValue(':noticia_id', $noticia_id);
    $query->bindValue(':nome', $fileName);
    $query->bindValue(':caminho', $path);
    if($query->execute()) {
      return true;
    } else {
      return false;
    }
  }
}

?>