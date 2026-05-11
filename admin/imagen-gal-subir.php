<?php
include_once('../../includes/classnew.inc.php');
include_once('../../includes/conexion.inc.php');
include_once('../../includes/funciones.inc.php');
include("../../includes/class.upload.php");
//
$link = Conectarse();
//
$objContenido = new General();
//
$id_galeria = $_GET["id_galeria"];
//
$Uploads = new iUpload();
//
$status = "";
//
$handle = new \Verot\Upload\Upload($_FILES['uploadfile']);
$strImg = $Uploads->renameImage($_FILES['uploadfile']['name']);

$target_pathSM = _PATH_GAL_SMALL_IMG_;
$target_pathMD = _PATH_GAL_MED_IMG_;
$target_pathBG = _PATH_GAL_BIG_IMG_;

if (isset($_GET["id_post"])) {
	$id_post = $_GET["id_post"];
} else {
	$id_post = 0;
}
$posicion = 0;

// SI SELECCIONO UNA IMAGEN HAGO EL UPLOAD

if ($handle->uploaded) {

		// IMAGEN CHICA
		$handle->file_new_name_body = $strImg;
		$handle->file_name_body_pre = 'gimg_';
		$handle->image_resize            = true;
		$handle->image_ratio_crop        = true;
		$handle->image_x                 = _IMG_GAL_SMALL_WIDTH_;
		$handle->image_y                 = _IMG_GAL_SMALL_HEIGHT_;
		$handle->Process($target_pathSM);

		// IMAGEN MEDIANA
		$handle->file_new_name_body = $strImg;
		$handle->file_name_body_pre = 'gimg_';
		$handle->image_resize            = true;
		$handle->image_ratio_crop        = true;
		$handle->image_x                 = _IMG_GAL_MED_WIDTH_;
		$handle->image_y                 = _IMG_GAL_MED_HEIGHT_;
		$handle->Process($target_pathMD);

		// IMAGEN GRANDE
		$handle->file_new_name_body = $strImg;
		$handle->file_name_body_pre = 'gimg_';
		$handle->image_resize            = true;
		$handle->image_ratio_y           = true;
		$handle->image_x                 =_IMG_GAL_BIG_WIDTH_;
		$handle->Process($target_pathBG);

	if ($handle->processed) {
		$imagen = $handle->file_dst_name;
	
		$arrData4 = [
			['value'=> $id_galeria,'tipo'=> 'NU'],
			['value'=> $id_post,'tipo'=> 'NU'],
			['value'=> $imagen,'tipo'=> 'AN'],
			['value'=> $posicion,'tipo'=> 'NU']
		];

		$query = "INSERT INTO elpunto_galeriasximag (gxi_id_gal_temp, gxi_id_gal, gxi_imagen, gxi_posicion) VALUES (?,?,?,?)";
		$intIdRegistro = $objContenido->insertContenido($link,$arrData4,$query);
		echo $imagen . ":" . $intIdRegistro;
	} else {
		echo '  Error: ' . $handle->error . '';
	}
	$handle->Clean();
}
//