<?php
/**
 * Archivo de declaracion de constante para el uso del sistemas al igual que las constantes
 * de conexion a la base de datos
 */
	// url global del sistema
	define('_BASE_URL_', 'http://' . $_SERVER['HTTP_HOST'] . '/ca-local_final/');

	// constantes de conexion a la base de datos
	define('SERVER','localhost'); 
	define('USER','root');  // usuario de base de datos
	define('PASS',''); // contraseña de base de datos
	define('DATABASE','ca_local'); // nombre de la base de datos
?>