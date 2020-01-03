<?php 
function ValidarLogin($user,$pass)
{
	global $con;
	$consulta="SELECT * FROM usuarios WHERE name_user='".$user."'";
	$query=mysqli_query($con,$consulta);
	if ( $fila = mysqli_fetch_row($query) )
    {
      	session_start();
      	$_SESSION['user'] = $user;
        $_SESSION['tipo_user'] = $fila[6];
        $_SESSION['id'] = $fila[0];
        $pass_hash=$fila[2];

        if (password_verify($pass,$pass_hash)) {
          return true;
        }else{
          return false;
        }
    }else{
    	return mysqli_connect_errno();
    }
            
}
function Onsesion(){
 session_start();
 return isset(  $_SESSION['user']  );
}
function Offsesion()
{
  session_start();
  session_unset();
  session_destroy();
}
?>