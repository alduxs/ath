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
        $target_path = _PATH_DOC_;

        if ($_FILES['archivo']['name'] != "") {
            $Uploads = new iUpload();
            $strImg = $Uploads->renameImage($_FILES['archivo']['name']);

            $handle = new \Verot\Upload\Upload($_FILES['archivo']);

            if ($handle->uploaded) {

                // IMAGEN SLIDE
                $handle->file_new_name_body = $strImg;
                $handle->file_name_body_pre = 'em_';
                $handle->image_resize          = true;
                $handle->image_ratio_crop      = true;
                $handle->jpeg_quality            = 100;
                $handle->image_y               = _IMG_DOC_HEIGHT_;
                $handle->image_x               = _IMG_DOC_WIDTH_;
                $handle->Process(_PATH_DOC_);

                if ($handle->processed) {
                    $imagen = $handle->file_dst_name;
                } else {
                    $imagen = "nd";
                }
                $handle->Clean();
            }
        } else {
            $imagen = "nd";
        }

        $arrData2 = [
            ['value'=> $_POST["titulo"],'tipo'=> 'TH2'],
            ['value'=> $_POST["avance"],'tipo'=> 'TH2'],
            ['value'=> $imagen,'tipo'=> 'AN'],
            ['value'=> $_POST["url"],'tipo'=> 'TH2'],
          ];
          //
          $query = "INSERT INTO email_disenio (ed_titulo,ed_avance,ed_imagen,ed_url) VALUES (?,?,?,?)";
          $intIdRegistro = $objContenido->insertContenido($link, $arrData2, $query);
          //
          for ($i=1; $i < 6; $i++) { 
            $arrData3 = [
                ['value'=> $intIdRegistro,'tipo'=> 'AN'],
                ['value'=> $i,'tipo'=> 'AN'],
                ['value'=> htmlentities($_POST["textos".$i]),'tipo'=> 'TH2']
              ];
              //
              $query = "INSERT INTO email_textos (et_ed_id,et_posicion,et_texto) VALUES (?,?,?)";
              $intIdRegistro1 = $objContenido->insertContenido($link, $arrData3, $query);
          }
          //
        break;

    case 'U':
        //
        $idPost = $_POST["id"];

        $arrData = [['value'=> $idPost,'tipo'=> 'NU']];
        $query = "SELECT * FROM email_disenio WHERE ed_id = ?";
        $rsCont = $objContenido->getOneContenido($link,$arrData,$query);
        $arrCont = $rsCont->fetch(PDO::FETCH_BOTH);

        $target_path = _PATH_DOC_;
        //
        $Uploads = new iUpload();

        if ($_FILES['archivo']['name'] != "") {

            if ($arrCont["ed_imagen"] != "nd") {
                $Uploads->deleteFile($target_path . $arrCont["ed_imagen"]);
            }

            $strImg = $Uploads->renameImage($_FILES['archivo']['name']);
            $handle = new \Verot\Upload\Upload($_FILES['archivo']);

            if ($handle->uploaded) {

                // IMAGEN SLIDE
                $handle->file_new_name_body = $strImg;
                $handle->file_name_body_pre = 'em_';
                $handle->image_resize          = true;
                $handle->image_ratio_crop      = true;
                $handle->jpeg_quality            = 100;
                $handle->image_y               = _IMG_DOC_HEIGHT_;
                $handle->image_x               = _IMG_DOC_WIDTH_;
                $handle->Process(_PATH_DOC_);

                if ($handle->processed) {
                    $imagen = $handle->file_dst_name;
                } else {
                    $imagen = $arrCont["ed_imagen"];
                }
                $handle->Clean();
            }
        } else {
            $imagen = $arrCont["ed_imagen"];
        }

        $arrData2 = [
            ['value'=> $_POST["titulo"],'tipo'=> 'TH2'],
            ['value'=> $_POST["avance"],'tipo'=> 'TH2'],
            ['value'=> $imagen,'tipo'=> 'AN'],
            ['value'=> $_POST["url"],'tipo'=> 'TH2'],
            ['value'=> $idPost,'tipo'=> 'AN']
          ];
        //

        $query = "UPDATE email_disenio SET ed_titulo = ?,ed_avance = ?,ed_imagen = ?, ed_url = ? WHERE ed_id = ?";
        $intIdRegistro = $objContenido->updateContenido($link, $arrData2, $query);
       
        for ($i=1; $i < 6; $i++) { 
            $arrData3 = [
                ['value'=> htmlentities($_POST["textos".$i]),'tipo'=> 'TH2'],
                ['value'=> $idPost,'tipo'=> 'AN']
              ];
              //
              $query = "UPDATE email_textos SET et_texto = ? WHERE et_ed_id = ? AND et_posicion =".$i;
              $intIdRegistro1 = $objContenido->insertContenido($link, $arrData3, $query);
          }


          

        break;


    case 'D':
        //Recibo variables
        $idPost = $_POST["intIdRegistro"];
        $arrData = [['value'=> $idPost,'tipo'=> 'NU']];
        $objContenido = new General();

        $query = "SELECT * FROM email_disenio WHERE ed_id = ?";
        $rsCont = $objContenido->getOneContenido($link,$arrData,$query);
        $arrCont = $rsCont->fetch(PDO::FETCH_BOTH);
        
        // Borramos la Imagen de la obra
        $Uploads = new iUpload();

        $target_path = _PATH_DOC_;
        if ($arrCont["ed_imagen"] != "nd") {
            $Uploads->deleteFile($target_path . $arrCont["ed_imagen"]);
        }

        // Borro el registro de la DB
        $queryd = "DELETE FROM email_disenio WHERE ed_id = ?";
        $rsContd = $objContenido->getOneContenido($link,$arrData,$queryd);
        //
        $queryd = "DELETE FROM email_textos WHERE et_ed_id = ?";
        $rsContd = $objContenido->getOneContenido($link,$arrData,$queryd);
        break;
}
//
header("Location: lstDemail.php?seccion=disenioemail");
