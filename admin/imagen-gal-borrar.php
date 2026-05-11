<?php
include_once("../../includes/checkLogin.inc.php");
include_once('../../includes/classnew.inc.php');
include_once('../../includes/conexion.inc.php');
include_once('../../includes/funciones.inc.php');
//
$link = Conectarse();
//
$objContenido = new General();
//
$arrData = [['value'=> $_GET["id_imagen"],'tipo'=> 'NU']];

$target_pathSM = _PATH_GAL_SMALL_IMG_;
$target_pathMD = _PATH_GAL_MED_IMG_;
$target_pathBG = _PATH_GAL_BIG_IMG_;

$Update_row = new General();
$query = "SELECT * FROM elpunto_galeriasximag WHERE gxi_id = ?";
$rsCont = $objContenido->getOneContenido($link,$arrData,$query);
$arrCont = $rsCont->fetch(PDO::FETCH_BOTH);

$BorrarImagen = new iUpload();
$BorrarImagen->deleteFile($target_pathSM.$arrCont["gxi_imagen"]);
$BorrarImagen->deleteFile($target_pathMD.$arrCont["gxi_imagen"]);
$BorrarImagen->deleteFile($target_pathBG.$arrCont["gxi_imagen"]);

$query2 = "DELETE FROM elpunto_galeriasximag WHERE gxi_id = ?";
$intIdRegistro = $objContenido->getOneContenido($link,$arrData,$query2);

?>
