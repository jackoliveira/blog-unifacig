<?php 

session_start();
 
$expiraDepois = 30;

if(isset($_SESSION['last_action'])){
	$segundosInativo = time() - $_SESSION['last_action'];
	$expiraDepoisSegundos = $expiraDepois * 60;
	if($segundosInativo >= $expiraDepoisSegundos){
			session_unset();
			session_destroy();
	}
}
$_SESSION['last_action'] = time();
?>