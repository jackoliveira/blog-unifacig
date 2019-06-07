<?php 

class Auth {
  public function __construct(){
    $this->pdo = new PDO("mysql:host=localhost;dbname=blog_grupo3", "root", "", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
  }

  public function autenticar($login, $senha) {
    $query = "SELECT id, nome, login, senha FROM usuario WHERE login = :login AND senha = :senha;";
    $query = $this->pdo->prepare($query);
    $query->bindValue(':login', $login);
    $query->bindValue(':senha', md5($senha));
    $query->execute();
    $queryResult = $query->fetch();
    
    if($query->rowCount() > 0){
      $_SESSION['id'] = $queryResult['id'];
      $_SESSION['nome'] = $queryResult['nome'];
      $_SESSION['login'] = $queryResult['login'];
      return true;
    } else { return false; }
  }

  public function getNomeUsuario($login) {
    $query = "SELECT login, senha FROM usuario WHERE login = :login AND senha = :senha;";

  }
}
?>