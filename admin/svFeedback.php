<?PHP
include_once("../includes/checkLogin.inc.php");
include_once('../includes/classnew.inc.php');
include_once('../includes/conexion.inc.php');
include_once('../includes/funciones.inc.php');
//
$link = Conectarse();
//
include("includes/class.upload.php");
//
$objContenido = new General();
//
$strOperacion = $objContenido->dataCleaner($_POST["strOperacion"],'AN');
//
switch ($strOperacion) {
    case 'I':
        //
        if($_POST["posicion"]==""){
          $_POST["posicion"] = 0;
        }

        $arrData2 = [
            ['value'=> $_POST["nombre"],'tipo'=> 'TH2'],
            ['value'=> $_POST["textos"],'tipo'=> 'TH2'],
            ['value'=> $_POST["posicion"],'tipo'=> 'AN'],
            ['value'=> $_POST["publicada"],'tipo'=> 'NU']
          ];
          //
          $query = "INSERT INTO feedback (fd_nombre,fd_texto,fd_posicion,fd_publicado) VALUES (?,?,?,?)";
          $intIdRegistro = $objContenido->insertContenido($link, $arrData2, $query);
          
        break;

    case 'U':
        //
        $idPost = $_POST["id"];

        if($_POST["posicion"]==""){
          $_POST["posicion"] = 0;
        }

        $arrData2 = [
            ['value'=> $_POST["nombre"],'tipo'=> 'TH2'],
            ['value'=> $_POST["textos"],'tipo'=> 'TH2'],
            ['value'=> $_POST["posicion"],'tipo'=> 'AN'],
            ['value'=> $_POST["publicada"],'tipo'=> 'NU'],
            ['value'=> $idPost,'tipo'=> 'AN']
          ];
        //

        $query = "UPDATE feedback SET fd_nombre = ?,fd_texto = ?,fd_posicion = ?,fd_publicado = ? WHERE fd_id = ?";
        $intIdRegistro = $objContenido->updateContenido($link, $arrData2, $query);
      

        break;


    case 'D':
        //Recibo variables
        $idPost = $_POST["intIdRegistro"];
        $arrData = [['value'=> $idPost,'tipo'=> 'NU']];
       
        //
        $queryd = "DELETE FROM feedback WHERE fd_id = ?";
        $rsContd = $objContenido->getOneContenido($link,$arrData,$queryd);
        break;
}
//
header("Location: lstFeedback.php?seccion=feedback");
