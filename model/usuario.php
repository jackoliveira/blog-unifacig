<?php

class Usuario {

  public $id;
  public $nome;
  public $sobrenome;
  public $sexo;
  public $login;
  public $senha;
  public $status;

  public function __construct(){
    $this->pdo = new PDO("mysql:host=localhost;dbname=blog_grupo3", "root", "", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
  }

  public function set_senha($senha){
    $this->senha = md5($senha)
  }

  public function listar(){
    $query = "SELECT * FROM usuario;";
    $query = $this->pdo-> query($query);
    
    if($query->rowCount() > 0){
      return $query -> fetchAll();
    } else {
      return array();
    }
  }

}
?>