<?php 
session_start();
if(isset($_SESSION['login']))
{
	echo '<script>window.location = "views/pages/accueil"</script>';
}
else  echo '<script>window.location = "views/pages/login"</script>';
?>