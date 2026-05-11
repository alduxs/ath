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
include("../../includes/class.upload.php");
//
$strOperacion = $objContenido->dataCleaner($_POST["strOperacion"],'AN');
//
switch ($strOperacion) {
    case 'I':
        //
        $Uploads = new iUpload;

        $arrData = [
            ['value'=> $_POST["nombre"],'tipo'=> 'AN'],
            ['value'=> $_POST["link"],'tipo'=> 'AN'],
            ['value'=> $_POST["espacio"],'tipo'=> 'NU'],
            ['value'=> 0,'tipo'=> 'NU'],
            ['value'=> $_POST["publicada"],'tipo'=> 'NU']
          ];
          
          $query = "INSERT INTO elpunto_slides (sl_titulo,sl_link,sl_espacio,sl_orden,sl_publicado) VALUES (?,?,?,?,?)";
          $intIdRegistro = $objContenido->insertContenido($link, $arrData, $query);

        //Imagen Rectangular
        if ($_POST["imageNewRect"] != "nd") {

            //Consulta en la Tabla Temporal
            $imagenRect = $_POST["imageNewRect"];
            $arrData = [['value'=> $imagenRect,'tipo'=> 'AN']];

            $query = "SELECT * FROM elpunto_contximag_temp WHERE cxi_imagen = ?";
            $rsCont = $objContenido->getOneContenido($link,$arrData,$query);
            $arrCont = $rsCont->fetch(PDO::FETCH_BOTH);
            $intQtyRecords = $rsCont->rowCount();

            if ($intQtyRecords > 0) {

                //Inserta registro en Tabla definitiva
                $arrData3 = [
                    ['value'=> $intIdRegistro,'tipo'=> 'NU'],
                    ['value'=> $imagenRect,'tipo'=> 'AN'],
                    ['value'=> $arrCont["cxi_tipo"],'tipo'=> 'NU']
                ];

                $query = "INSERT INTO elpunto_contximagenes (contximg_cont_id,contximg_imagen,contximg_tipo) VALUES (?,?,?)";
                $intIdRegistro3 = $objContenido->insertContenido($link, $arrData3, $query);

                //Borra el registro de la Tabla Temporal
                $arrData = [['value'=> $imagenRect,'tipo'=> 'AN']];
                $query = "DELETE FROM elpunto_contximag_temp WHERE cxi_imagen = ?";
                $rsCont = $objContenido->getOneContenido($link,$arrData,$query);

                //Mueve el archivo
                rename("../assets/post-temp/" . $imagenRect . "", "../assets/slides/" . $imagenRect . "");
            }
        }

        //Imagen Rectangular
        if ($_POST["imageNewCuad"] != "nd") {

            //Consulta en la Tabla Temporal
            $imagenCuad = $_POST["imageNewCuad"];
            $arrData = [['value'=> $imagenCuad,'tipo'=> 'AN']];

            $query = "SELECT * FROM elpunto_contximag_temp WHERE cxi_imagen = ?";
            $rsCont = $objContenido->getOneContenido($link,$arrData,$query);
            $arrCont = $rsCont->fetch(PDO::FETCH_BOTH);
            $intQtyRecords = $rsCont->rowCount();

            if ($intQtyRecords > 0) {

                //Inserta registro en Tabla definitiva
                $arrData3 = [
                    ['value'=> $intIdRegistro,'tipo'=> 'NU'],
                    ['value'=> $imagenCuad,'tipo'=> 'AN'],
                    ['value'=> $arrCont["cxi_tipo"],'tipo'=> 'NU']
                ];

                $query = "INSERT INTO elpunto_contximagenes (contximg_cont_id,contximg_imagen,contximg_tipo) VALUES (?,?,?)";
                $intIdRegistro3 = $objContenido->insertContenido($link, $arrData3, $query);

                //Borra el registro de la Tabla Temporal
                $arrData = [['value'=> $imagenCuad,'tipo'=> 'AN']];
                $query = "DELETE FROM elpunto_contximag_temp WHERE cxi_imagen = ?";
                $rsCont = $objContenido->getOneContenido($link,$arrData,$query);


                //Mueve el archivo
                rename("../assets/post-temp/" . $imagenCuad . "", "../assets/slides/" . $imagenCuad . "");
            }
        }

        break;

    case 'U':
        //

        $idPost = $_POST["id"];
        $target_path = _CONST_PATH_IMG_ESPACIOS_;
        $arrData = [['value'=> $idPost,'tipo'=> 'NU']];
        $query = "SELECT * FROM elpunto_slides WHERE sl_id = ?";
        $rsCont = $objContenido->getOneContenido($link,$arrData,$query);
        $arrCont = $rsCont->fetch(PDO::FETCH_BOTH);
        //
        $Uploads = new iUpload();
        //

        $arrData = [
            ['value'=> $_POST["nombre"],'tipo'=> 'AN'],
            ['value'=> $_POST["link"],'tipo'=> 'AN'],
            ['value'=> $_POST["espacio"],'tipo'=> 'NU'],
            ['value'=> $_POST["orden"],'tipo'=> 'NU'],
            ['value'=> $_POST["publicada"],'tipo'=> 'NU'],
            ['value'=> $idPost,'tipo'=> 'NU']
          ];
        //

        $query = "UPDATE elpunto_slides SET sl_titulo = ?,sl_link = ?,sl_espacio = ?,sl_orden = ?,sl_publicado = ? WHERE sl_id = ?";
        $intIdRegistro = $objContenido->updateContenido($link, $arrData, $query);

        //Imagen Rectangular
        if ($_POST["iRectStat"] != 0) {
            if ($_POST["iRectStat"] == 1) {
                
                //Consulta en la Tabla Temporal
                $imagenRect = $_POST["imageNewRect"];
                $arrData = [['value'=> $imagenRect,'tipo'=> 'AN']];

                $query = "SELECT * FROM elpunto_contximag_temp WHERE cxi_imagen = ?";
                $rsCont = $objContenido->getOneContenido($link,$arrData,$query);
                $arrCont = $rsCont->fetch(PDO::FETCH_BOTH);
                $intQtyRecords = $rsCont->rowCount();

                if ($intQtyRecords > 0) {


                    //Inserta registro en Tabla definitiva
                    $arrData3 = [
                        ['value'=> $idPost,'tipo'=> 'NU'],
                        ['value'=> $imagenRect,'tipo'=> 'AN'],
                        ['value'=> $arrCont["cxi_tipo"],'tipo'=> 'NU']
                    ];

                    $query = "INSERT INTO elpunto_contximagenes (contximg_cont_id,contximg_imagen,contximg_tipo) VALUES (?,?,?)";
                    $intIdRegistro3 = $objContenido->insertContenido($link, $arrData3, $query);

                    //Borra el registro de la Tabla Temporal
                    $arrData = [['value'=> $imagenRect,'tipo'=> 'AN']];
                    $query = "DELETE FROM elpunto_contximag_temp WHERE cxi_imagen = ?";
                    $rsCont = $objContenido->getOneContenido($link,$arrData,$query);

                    //Mueve el archivo
                    rename("../assets/post-temp/" . $imagenRect . "", "../assets/slides/" . $imagenRect . "");
                }
            } else if ($_POST["iRectStat"] == 2) {

                $imagenRect = $_POST["imageNewRect"];
                $imagenOldRect = $_POST["imageOldRect"];

                //Consulta en la Tabla Final
                $arrData = [['value'=> $imagenOldRect,'tipo'=> 'AN']];
                $query = "SELECT * FROM elpunto_contximagenes WHERE contximg_imagen = ?";
                $rsCont = $objContenido->getOneContenido($link,$arrData,$query);
                $arrCont = $rsCont->fetch(PDO::FETCH_BOTH);
                $intQtyRecords = $rsCont->rowCount();

                if ($intQtyRecords > 0) {
                    //Borra Archivo de carpeta
                    $target_path = _CONST_PATH_IMG_SLIDES_;
                    $Uploads->deleteFile($target_path . $imagenOldRect); //Borra Archivo

                    //Borra el registro de la Tabla final
                    $arrData = [['value'=> $imagenOldRect,'tipo'=> 'AN']];
                    $query = "DELETE FROM elpunto_contximagenes WHERE contximg_imagen = ?";
                    $rsCont = $objContenido->getOneContenido($link,$arrData,$query);
                }

                $arrData = [['value'=> $imagenRect,'tipo'=> 'AN']];
                $query = "SELECT * FROM elpunto_contximag_temp WHERE cxi_imagen = ?";
                $rsCont = $objContenido->getOneContenido($link,$arrData,$query);
                $arrCont = $rsCont->fetch(PDO::FETCH_BOTH);
                $intQtyRecords = $rsCont->rowCount();

                if ($intQtyRecords > 0) {

        
                    //Inserta registro en Tabla definitiva
                    $arrData3 = [
                        ['value'=> $idPost,'tipo'=> 'NU'],
                        ['value'=> $imagenRect,'tipo'=> 'AN'],
                        ['value'=> $arrCont["cxi_tipo"],'tipo'=> 'NU']
                    ];
    
                    $query = "INSERT INTO elpunto_contximagenes (contximg_cont_id,contximg_imagen,contximg_tipo) VALUES (?,?,?)";
                    $intIdRegistro3 = $objContenido->insertContenido($link, $arrData3, $query);

                    //Borra el registro de la Tabla Temporal
                    $arrData = [['value'=> $imagenRect,'tipo'=> 'AN']];
                    $query = "DELETE FROM elpunto_contximag_temp WHERE cxi_imagen = ?";
                    $rsCont = $objContenido->getOneContenido($link,$arrData,$query);

                    //Mueve el archivo
                    rename("../assets/post-temp/" . $imagenRect . "", "../assets/slides/" . $imagenRect . "");
                }
            }
        };

        if ($_POST["iCuadStat"] != 0) {
            if ($_POST["iCuadStat"] == 1) {
               
                //Consulta en la Tabla Temporal
                $imagenCuad = $_POST["imageNewCuad"];
                $arrData = [['value'=> $imagenCuad,'tipo'=> 'AN']];

                $query = "SELECT * FROM elpunto_contximag_temp WHERE cxi_imagen = ?";
                $rsCont = $objContenido->getOneContenido($link,$arrData,$query);
                $arrCont = $rsCont->fetch(PDO::FETCH_BOTH);
                $intQtyRecords = $rsCont->rowCount();

                if ($intQtyRecords > 0) {

                    //Inserta registro en Tabla definitiva
                    $arrData3 = [
                        ['value'=> $idPost,'tipo'=> 'NU'],
                        ['value'=> $imagenCuad,'tipo'=> 'AN'],
                        ['value'=> $arrCont["cxi_tipo"],'tipo'=> 'NU']
                    ];

                    $query = "INSERT INTO elpunto_contximagenes (contximg_cont_id,contximg_imagen,contximg_tipo) VALUES (?,?,?)";
                    $intIdRegistro3 = $objContenido->insertContenido($link, $arrData3, $query);

                    //Borra el registro de la Tabla Temporal
                    $arrData = [['value'=> $imagenCuad,'tipo'=> 'AN']];
                    $query = "DELETE FROM elpunto_contximag_temp WHERE cxi_imagen = ?";
                    $rsCont = $objContenido->getOneContenido($link,$arrData,$query);

                    //Mueve el archivo
                    rename("../assets/post-temp/" . $imagenCuad . "", "../assets/slides/" . $imagenCuad . "");
                }
            } else if ($_POST["iCuadStat"] == 2) {

                $imagenCuad = $_POST["imageNewCuad"];
                $imagenOldCuad = $_POST["imageOldCuad"];

                //Consulta en la Tabla Final
                $arrData = [['value'=> $imagenOldCuad,'tipo'=> 'AN']];
                $query = "SELECT * FROM elpunto_contximagenes WHERE contximg_imagen = ?";
                $rsCont = $objContenido->getOneContenido($link,$arrData,$query);
                $arrCont = $rsCont->fetch(PDO::FETCH_BOTH);
                $intQtyRecords = $rsCont->rowCount();

                if ($intQtyRecords > 0) {
                    //Borra Archivo de carpeta
                    $target_path = _CONST_PATH_IMG_SLIDES_;
                    $Uploads->deleteFile($target_path . $imagenOldCuad); //Borra Archivo

                    //Borra el registro de la Tabla final
                    $arrData = [['value'=> $imagenOldCuad,'tipo'=> 'AN']];
                    $query = "DELETE FROM elpunto_contximagenes WHERE contximg_imagen = ?";
                    $rsCont = $objContenido->getOneContenido($link,$arrData,$query);
                }

                $arrData = [['value'=> $imagenCuad,'tipo'=> 'AN']];
                $query = "SELECT * FROM elpunto_contximag_temp WHERE cxi_imagen = ?";
                $rsCont = $objContenido->getOneContenido($link,$arrData,$query);
                $arrCont = $rsCont->fetch(PDO::FETCH_BOTH);
                $intQtyRecords = $rsCont->rowCount();

                if ($intQtyRecords > 0) {

                    //Inserta registro en Tabla definitiva
                    $arrData3 = [
                        ['value'=> $idPost,'tipo'=> 'NU'],
                        ['value'=> $imagenCuad,'tipo'=> 'AN'],
                        ['value'=> $arrCont["cxi_tipo"],'tipo'=> 'NU']
                    ];
    
                    $query = "INSERT INTO elpunto_contximagenes (contximg_cont_id,contximg_imagen,contximg_tipo) VALUES (?,?,?)";
                    $intIdRegistro3 = $objContenido->insertContenido($link, $arrData3, $query);

                    //Borra el registro de la Tabla Temporal
                    $arrData = [['value'=> $imagenCuad,'tipo'=> 'AN']];
                    $query = "DELETE FROM elpunto_contximag_temp WHERE cxi_imagen = ?";
                    $rsCont = $objContenido->getOneContenido($link,$arrData,$query);

                    //Mueve el archivo
                    rename("../assets/post-temp/" . $imagenCuad . "", "../assets/slides/" . $imagenCuad . "");
                }
            }
        };


        break;


    case 'D':

        //Recibo variables
        $idPost = $_POST["intIdRegistro"];

        $arrData = [['value'=> $idPost,'tipo'=> 'NU']];
        $query = "SELECT * FROM elpunto_slides WHERE sl_id = ?";
        $rsCont = $objContenido->getOneContenido($link,$arrData,$query);
        $arrCont = $rsCont->fetch(PDO::FETCH_BOTH);

        $arrData2 = [['value'=> $idPost,'tipo'=> 'NU'],['value'=> 3,'tipo'=> 'NU']];
        $queryi = "SELECT * FROM elpunto_contximagenes WHERE contximg_cont_id = ? AND contximg_tipo = ?";
        $rsConti = $objContenido->getOneContenido($link,$arrData2,$queryi);
        $arrConti = $rsConti->fetch(PDO::FETCH_BOTH);
        $intQtyRecordsi = $rsConti->rowCount();

        // Borramos la Imagen de la obra
        $Uploads = new iUpload();

        $target_path = _CONST_PATH_IMG_SLIDES_;

        //
        if($intQtyRecordsi > 0){
            $Uploads->deleteFile($target_path . $arrConti["contximg_imagen"]);
        }
        //
        $queryd = "DELETE FROM elpunto_slides WHERE sl_id = ?";
        $rsContd = $objContenido->getOneContenido($link,$arrData,$queryd);
        //
        $arrData2 = [['value'=> $idPost,'tipo'=> 'NU'],['value'=> 3,'tipo'=> 'NU']];
        $queryci = "DELETE FROM elpunto_contximagenes WHERE contximg_cont_id = ? AND contximg_tipo = ?";
        $rsContci = $objContenido->getOneContenido($link,$arrData2,$queryci);
        //
        break;
}
//
header("Location: lstSlides.php?seccion=slides");
