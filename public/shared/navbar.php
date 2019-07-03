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

    <div id="navbarBasicExample" class="navbar-menu">
      
        <div class="navbar-end">
          <div class="navbar-item">
            <div class="buttons">
              <?php 
                if (isset($_SESSION['login'])) {
                  echo "<a class=\"button is-primary\" href=\"criar_noticia.php\">";
                    echo "<strong>Criar Noticia</strong>";
                  echo "</a>";
                  echo "<form action=\"../config/session_destroy.php\"><button class=\"button is-warning\" type=\"submit\">Log out</button></form>";
                } else {
                  echo "<a class=\"button is-primary\" href=\"login.php\">Log in</a>";
                }
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</nav>

<script>
  document.addEventListener('DOMContentLoaded', () => {
    const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);
    if ($navbarBurgers.length > 0) {
      $navbarBurgers.forEach( el => {
        el.addEventListener('click', () => {
          const target = el.dataset.target;
          const $target = document.getElementById(target);
          el.classList.toggle('is-active');
          $target.classList.toggle('is-active');
        });
      });
    }
  });

</script>