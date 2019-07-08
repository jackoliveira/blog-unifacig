<?php

class Curtida {

  public $id;
  public $noticia_id;
  public $curtidas;

  public function __construct(){
    $this->pdo = new PDO("mysql:host=localhost;dbname=blog_grupo3", "root", "", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
  }

  public function consultar($noticia_id) {
    $query = "SELECT noticia.id noticia_id, curtida.noticia_id curtida_noticia_id, curtida.id curtida_id, curtida.quantidade curtida_quantidade
    FROM curtida LEFT JOIN noticia ON noticia.id = curtida.noticia_id
                 WHERE noticia.id = :id";
    
    $query = $this->pdo->prepare($query);
    $query->bindValue(':id', $noticia_id);                                                
    $query->execute();
    
    if($query->rowCount() == 1){
      return $query->fetch();
    } else { return array(); }
  }

  public function adicionar($noticia_id) {
    $query = "UPDATE curtida SET curtida.quantidade = curtida.quantidade + 1 WHERE curtida.noticia_id = :noticia_id";
    $query = $this->pdo->prepare($query);
    $query->bindValue(':noticia_id', $noticia_id);
    
    if($query->execute()) {
      return true;
    } else {
      return false;
    }
  }

}

?>