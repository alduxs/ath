<?php
include_once("../includes/checkLogin.inc.php");
include_once('../includes/classnew.inc.php');
include_once('../includes/conexion.inc.php');
include_once('../includes/funciones.inc.php');
include('includes/class.upload.php');

$link = Conectarse();
$objContenido = new General();
$id = $objContenido->dataCleaner($_POST['id'], 'NU');
$arrData = [['value' => $id, 'tipo' => 'NU']];
$query = "SELECT * FROM modal WHERE modal_id = ?";
$rsCont = $objContenido->getOneContenido($link, $arrData, $query);
$arrCont = $rsCont->fetch(PDO::FETCH_ASSOC);

if (!$arrCont || $_POST['strOperacion'] !== 'U') {
    header('Location: lstModal.php?seccion=modal');
    exit;
}

$targetPath = '../assets/images/';
$uploads = new iUpload();
$images = [
    'modal_image' => $arrCont['modal_image'],
    'modal_image_rp' => $arrCont['modal_image_rp']
];

foreach ($images as $field => $currentImage) {
    if (!isset($_FILES[$field]) || $_FILES[$field]['error'] === UPLOAD_ERR_NO_FILE) {
        continue;
    }
    if ($_FILES[$field]['error'] !== UPLOAD_ERR_OK) {
        continue;
    }

    $handle = new \Verot\Upload\Upload($_FILES[$field]);
    if (!$handle->uploaded) {
        continue;
    }

    $newImageBody = $uploads->renameImage($_FILES[$field]['name']);
    $handle->file_new_name_body = $newImageBody;
    $handle->image_resize = false;
    $handle->Process($targetPath);

    if ($handle->processed) {
        $images[$field] = $handle->file_dst_name;
        if ($currentImage !== 'nd' && is_file($targetPath . $currentImage)) {
            $uploads->deleteFile($targetPath . $currentImage);
        }
    }
    $handle->Clean();
}

$arrData = [
    ['value' => $images['modal_image'], 'tipo' => 'AN'],
    ['value' => $images['modal_image_rp'], 'tipo' => 'AN'],
    ['value' => $id, 'tipo' => 'NU']
];
$query = "UPDATE modal SET modal_image = ?, modal_image_rp = ? WHERE modal_id = ?";
$objContenido->updateContenido($link, $arrData, $query);

header('Location: lstModal.php?seccion=modal');
