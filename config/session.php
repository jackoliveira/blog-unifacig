<?php

if (isset($_SESSION['login']) == true) {
} else { header('location: login.php'); }

?>