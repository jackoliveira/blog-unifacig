<nav class="navbar" role="navigation" aria-label="main navigation">
  <div class="container">
    <div class="navbar-brand">
      <a class="navbar-item" href="index.php">
        <img src="images/adsystems.png">
      </a>

      <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
      </a>
    </div>

    <div class="navbar-menu">
      <div class="navbar-end">
        <div class="navbar-item">
          <div class="buttons">
            <a class="button is-primary" href="criar_noticia.php">
              <strong>Criar Noticia</strong>
            </a>
          </div>
        </div>
        <div class="navbar-item">
          <div class="buttons">
              <strong><?php
                if (isset($_SESSION['login']) == true) {
                  echo "<form action=\"../config/session_destroy.php\"><button class=\"button is-light\" type=\"submit\">Log out</button></form>";
                } else {
                  echo "<a class=\"button is-light\" href=\"login.php\">Log in</a>";
                }
              ?>
              </strong>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

</nav>