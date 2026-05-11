<?php // Fichero con los datos de conexion a la BBDD
function Conectarse()
{
	$db_host="localhost"; // Host al que conectar, habitualmente es el 'localhost'
	$db_nombre="c1361829_ath"; // Nombre de la Base de Datos que se desea utilizar
	$db_user="c1361829_ath"; // Nombre del usuario con permisos para acceder
	$db_pass="lu76GAlila"; // Contraseña de dicho usuario

	//Donweb
	/*$db_host="localhost"; // Host al que conectar, habitualmente es el 'localhost'
	$db_nombre="sitecontentdb_new"; // Nombre de la Base de Datos que se desea utilizar
	$db_user="root"; // Nombre del usuario con permisos para acceder
	$db_pass="CyberMatrix-2022"; // Contraseña de dicho usuario*/
	

	try {
    	$link = new PDO('mysql:host='.$db_host.';dbname='.$db_nombre, $db_user, $db_pass);
    	return $link;
	} catch (PDOException $e) {
		print "Error: " . $e->getMessage() . "<br/>";
		die();
	}
}
?>
