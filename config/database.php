<?php

  define("SETTINGS", "mysql:host=localhost;dbname=blog_grupo3");
  define("USERNAME", "root");
  define("PASSWORD", "root");

  // Load database setting in sessions
  $_SESSION["db_settings"] = SETTINGS;
  $_SESSION["db_username"] = USERNAME;
  $_SESSION["db_password"] = PASSWORD;

?>