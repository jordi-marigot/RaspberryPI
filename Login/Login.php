<?php
	session_start();
	$_SESSION['username'] = $_POST['username'];
	$_SESSION['pass'] = $_POST['pass'];
	$_SESSION['srv'] = "mysql_db";
		//Funcions de sessio
	$bd = mysqli_connect(	$_SESSION['srv'],	$_SESSION['username'],$_SESSION['pass']);

  // validar conecció
  if (mysqli_connect_errno()){
    header('Location: ../index.php');
    echo "Error de Login";
    }
	else {
    header ('Location: val.php');
		}
?>
