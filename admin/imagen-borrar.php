<?php
include_once('../includes/conexion.inc.php');
include_once('../includes/funciones.inc.php');
include_once('../includes/classnew.inc.php');
include("includes/class.upload.php");

$link = Conectarse();

$objContenido = new General();

$id_imagen = $_GET["id_imagen"];

$target_pathSM = _CONST_PATH_IMAGEN_SMALL_;
$target_pathBG = _CONST_PATH_IMAGEN_BIG_;

$arrData = [['value'=> $id_imagen,'tipo'=> 'NU']];
$query = "SELECT * FROM galeriasgximag WHERE gxi_id = ?";
$rsImag = $objContenido->getOneContenido($link,$arrData,$query);
$arrCont = $rsImag->fetch(PDO::FETCH_BOTH);


$BorrarImagen = new iUpload();
$BorrarImagen->deleteFile($target_pathSM.$arrCont["gxi_imagen"]);
$BorrarImagen->deleteFile($target_pathBG.$arrCont["gxi_imagen"]);


$query2 = "DELETE FROM galeriasgximag WHERE gxi_id = ?";
$rsContd = $objContenido->getOneContenido($link,$arrData,$query2);


?>