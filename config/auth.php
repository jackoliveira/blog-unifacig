<?php 


class Auth {
  public function __construct(){
    $this->pdo = new PDO("mysql:host=localhost;dbname=blog_grupo3", "root", "", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
  }

  public function autenticar($login, $senha) {
    $query = "SELECT login, senha FROM usuario WHERE login = :login AND senha = :senha;";
    $query = $this->pdo->prepare($query);
    $query->bindValue(':login', $login);
    $query->bindValue(':senha', md5($senha));
    $query->execute();
    
    if($query->rowCount() > 0){
      return true;
    } else { return false; }
  }
}
?>