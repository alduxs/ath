<?PHP
include_once("../../includes/checkLogin.inc.php");
include_once('../../includes/classnew.inc.php');
include_once('../../includes/conexion.inc.php');
include_once('../../includes/funciones.inc.php');
//
$link = Conectarse();
//
$objContenido = new General();
//
$strOperacion = $objContenido->dataCleaner($_POST["strOperacion"],'AN');
//
if (isset($_POST["intPage"])) {
  $intPage = $_POST["intPage"];
} else {
  $intPage = 1;
}
//
include("../../includes/class.upload.php");
//
date_default_timezone_set('America/Los_Angeles');
//
switch ($strOperacion) {
  case 'I':
    //
    $Uploads = new iUpload();
    $arrData2 = [
      ['value'=> $_POST["titulo"],'tipo'=> 'AN'],
      ['value'=> $_POST["publicado"],'tipo'=> 'NU']
    ];

    //
    $query = "INSERT INTO elpunto_galerias (gal_nombre,gal_publicada) VALUES (?,?)";
    $intIdRegistro = $objContenido->insertContenido($link, $arrData2, $query);


    //Cambiar id de galeriasximagenes
    $id_galeria = $_POST["id_galeria"];

    $arrData = [
      ['value'=> $id_galeria,'tipo'=> 'NU']
    ];

    $queryg = "SELECT * FROM elpunto_galeriasximag WHERE gxi_id_gal_temp = ?";
    $rsContg = $objContenido->getOneContenido($link,$arrData,$queryg);

    $intQtyRecords = $rsContg->rowCount();
    if ($intQtyRecords > 0) {
      $arrData2 = [
        ['value'=> $intIdRegistro,'tipo'=> 'NU'],
        ['value'=> $id_galeria,'tipo'=> 'NU']
      ];
      $queryu = "UPDATE elpunto_galeriasximag SET gxi_id_gal = ? WHERE gxi_id_gal_temp = ?";
      $intIdRegistrou = $objContenido->updateContenido($link,$arrData2,$queryu);
    }

    break;

    case 'U':
      // BUSCO LOS DATOS DEL CONTENIDO A MODIFICAR
      $idPost = $_POST["id"];
      
      $Uploads = new iUpload();
  
      $arrData3 = [
        ['value'=> $_POST["titulo"],'tipo'=> 'AN'],
        ['value'=> $_POST["publicado"],'tipo'=> 'NU'],
        ['value'=> $idPost,'tipo'=> 'NU']
      ];
      //
      $query = "UPDATE elpunto_galerias SET  gal_nombre = ?,gal_publicada = ? WHERE gal_id = ?";
      $intIdRegistro = $objContenido->updateContenido($link, $arrData3, $query);
  
      //Cambiar id de galeriasximagenes
      $id_galeria = $_POST["id_galeria"];
      //
      $arrData = [
        ['value'=> $id_galeria,'tipo'=> 'NU']
      ];
  
      $queryg = "SELECT * FROM elpunto_galeriasximag WHERE gxi_id_gal = ?";
      $rsContg = $objContenido->getOneContenido($link,$arrData,$queryg);
      $intQtyRecords = $rsContg->rowCount();
  
      if ($intQtyRecords > 0) {
        $arrData2 = [
          ['value'=> $idPost,'tipo'=> 'NU'],
          ['value'=> $id_galeria,'tipo'=> 'NU']
        ];

        $queryu = "UPDATE elpunto_galeriasximag SET gxi_id_gal = ? WHERE gxi_id_gal = ?";
        $intIdRegistrou = $objContenido->getOneContenido($link,$arrData2,$queryu);
      }
  
      break;

  case 'D':

    //Recibo variables

    $idPost = $_POST["intIdRegistro"];

    $target_pathSM = _PATH_GAL_SMALL_IMG_;
    $target_pathMD = _PATH_GAL_MED_IMG_;
    $target_pathBG = _PATH_GAL_BIG_IMG_;
    $BorrarImagen = new iUpload();
    
    //Cambiar id de galeriasximagenes
    $arrData = [['value'=> $idPost,'tipo'=> 'NU']];
    $query = "SELECT * FROM elpunto_galeriasximag WHERE gxi_id_gal = ?";
    $rsContg = $objContenido->getOneContenido($link,$arrData,$query);
    $intQtyRecords = $rsContg->rowCount();
    
    if ($intQtyRecords > 0) {
      while ($arrContenido = $rsContg->fetch(PDO::FETCH_BOTH)) {

        $BorrarImagen->deleteFile($target_pathSM . $arrContenido["gxi_imagen"]);
        $BorrarImagen->deleteFile($target_pathMD . $arrContenido["gxi_imagen"]);
        $BorrarImagen->deleteFile($target_pathBG . $arrContenido["gxi_imagen"]);

        $arrData = [['value'=> $arrContenido["gxi_id"],'tipo'=> 'NU']];

        $query2 = "DELETE FROM elpunto_galeriasximag WHERE gxi_id = ?";
        $intIdRegistro = $objContenido->getOneContenido($link, $arrData, $query2);
      }
    }

    //Borra Galería
    $arrData = [['value'=> $idPost,'tipo'=> 'NU']];

    $query2 = "DELETE FROM elpunto_galerias WHERE gal_id = ?";
    $intIdRegistro = $objContenido->getOneContenido($link, $arrData, $query2);

    break;
}
//
header("Location: lstGalerias.php?seccion=galerias&intPage=$intPage");
