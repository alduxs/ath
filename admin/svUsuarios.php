<?php
include_once("../includes/checkLogin.inc.php");
include_once('../includes/classnew.inc.php');
include_once('../includes/conexion.inc.php');
include_once('../includes/funciones.inc.php');
//
$link = Conectarse();
//
$objContenido = new General();
//
$strOperacion = $objContenido->dataCleaner($_POST["strOperacion"],'AN');
//
switch ($strOperacion) {
  case 'I':
    

    $arrData = [
      ['value'=> $_POST["strNombre"],'tipo'=> 'AN'],
      ['value'=> $_POST["strUsuario"],'tipo'=> 'AN'],
      ['value'=> md5($_POST["strPassword"]),'tipo'=> 'AN'],
      ['value'=> 1,'tipo'=> 'NU']
    ];
    //

    $query = "INSERT INTO login (nombre,usuario,contrasenia,tipo) VALUES (?,?,?,?)";
    $intIdRegistro = $objContenido->insertContenido($link, $arrData, $query);

    break;

  case 'U':
    //
    $idPost = $_POST["id"];

    $arrData = [
      ['value'=> $_POST["strNombre"],'tipo'=> 'AN'],
      ['value'=> $_POST["strUsuario"],'tipo'=> 'AN'],
      ['value'=> md5($_POST["strPassword"]),'tipo'=> 'AN'],
      ['value'=> 1,'tipo'=> 'NU'],
      ['value'=> $idPost,'tipo'=> 'NU'],
    ];


    $query = "UPDATE login SET nombre = ?,usuario = ?,contrasenia = ?,tipo = ? WHERE id = ?";
    $intIdRegistro = $objContenido->updateContenido($link, $arrData, $query);
    break;

  case 'D':
    //Recibo variables
    $idPost = $_POST["intIdRegistro"];
    $arrData = [['value'=> $idPost,'tipo'=> 'NU']];
    //
    $queryd = "DELETE FROM login WHERE id = ?";
    $rsContd = $objContenido->getOneContenido($link,$arrData,$queryd);
    //
    break;
}
//
header("Location: lstUsuarios.php?seccion=usuarios&intPageId=$intPageId");
