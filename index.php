<?php 
session_start();
if(isset($_SESSION['login']))
{
	echo '<script>window.location = "views/pages/accueil.php"</script>';
}
else  echo '<script>window.location = "views/pages/login.php"</script>';
?>