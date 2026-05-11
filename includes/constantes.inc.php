<?php
// CONSTANTES
define('_CONST_PAGINADO_', "20");

$host = $_SERVER["HTTP_HOST"];

if ($host == "localhost" || $host == "192.168.100.210") :
	$urlweb = "http://" . $host . "/ath/";
	$urladmin = "http://" . $host . "/ath/admin/";
else :
	$urlweb = "https://" . $host . "/";
	$urladmin = "https://" . $host . "/admin/";
endif;

define('_CONST_DOMINIO_', $urlweb);
define('_CONST_BACKEND_', $urladmin);

define('_CONST_TITLE_', "Argentina Top Hunts");
define('_CONST_CONTACT_', "contacto@2ocho.com.ar");

//EMAIL
define('_PATH_DOC_', "../assets/imgmail/");
define('_IMG_DOC_WIDTH_', "640");
define('_IMG_DOC_HEIGHT_', "427");

//IMAGENES GALERIAS GRANDES
define('_CONST_PATH_IMAGEN_BIG_', "../assets/galerias/big/");
define('_CONST_IMAGEN_BIG_WIDTH_', "1000");

//IMAGENES GALERIAS CHICAS
define('_CONST_PATH_IMAGEN_SMALL_', "../assets/galerias/small/");
define('_CONST_IMAGEN_SMALL_WIDTH_', "692");
define('_CONST_IMAGEN_SMALL_HEIGHT_', "419");

//ARCHIVOS
define ('_CONST_PATH_I_ARCH_', "../assets/files/");
