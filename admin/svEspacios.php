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
        $target_path = _CONST_PATH_IMG_ESPACIOS_;

        //ICONO
        if ($_FILES['icono']['name'] != "") {
            $Uploads = new iUpload();
            $strImg = $Uploads->renameImage($_FILES['icono']['name']);

            $handle = new \Verot\Upload\Upload($_FILES['icono']);

            if ($handle->uploaded) {

                // IMAGEN SLIDE
                $handle->file_new_name_body = $strImg;
                $handle->file_name_body_pre = 'ico_';
                $handle->image_resize          = true;
                $handle->image_ratio_crop      = true;
                $handle->jpeg_quality            = 100;
                $handle->image_y               = _CONST_IMG_ESP_ICONO_UNICO_;
                $handle->image_x               = _CONST_IMG_ESP_ICONO_UNICO_;
                $handle->Process(_CONST_PATH_IMG_ESPACIOS_);
                $handle->image_resize          = true;

                if ($handle->processed) {
                    $icono = $handle->file_dst_name;
                } else {
                    $icono = "nd";
                }
                $handle->Clean();
            }
        } else {
            $icono = "nd";
        }

        if ($_FILES['nespaciogris']['name'] != "") {
            $Uploads = new iUpload();
            $strImg = $Uploads->renameImage($_FILES['nespaciogris']['name']);

            $handle = new \Verot\Upload\Upload($_FILES['nespaciogris']);

            if ($handle->uploaded) {

                // IMAGEN SLIDE
                $handle->file_new_name_body = $strImg;
                $handle->file_name_body_pre = 'espgris_';
                $handle->jpeg_quality            = 100;
                $handle->image_resize          = true;
                $handle->image_ratio_x         = true;
                $handle->image_y               = _CONST_IMG_ESP_NOMBRE_UNICO_;
                $handle->Process(_CONST_PATH_IMG_ESPACIOS_);

                if ($handle->processed) {
                    $espgris = $handle->file_dst_name;
                } else {
                    $espgris = "nd";
                }
                $handle->Clean();
            }
        } else {
            $espgris = "nd";
        }

        if ($_FILES['nespacioblanco']['name'] != "") {
            $Uploads = new iUpload();
            $strImg = $Uploads->renameImage($_FILES['nespacioblanco']['name']);

            $handle = new \Verot\Upload\Upload($_FILES['nespacioblanco']);

            if ($handle->uploaded) {

                // IMAGEN SLIDE
                $handle->file_new_name_body = $strImg;
                $handle->file_name_body_pre = 'espblanco_';
                $handle->jpeg_quality            = 100;
                $handle->image_resize          = true;
                $handle->image_ratio_x         = true;
                $handle->image_y               = _CONST_IMG_ESP_NOMBRE_UNICO_;
                $handle->Process(_CONST_PATH_IMG_ESPACIOS_);

                if ($handle->processed) {
                    $espblanco = $handle->file_dst_name;
                } else {
                    $espblanco = "nd";
                }
                $handle->Clean();
            }
        } else {
            $espblanco = "nd";
        }

        if ($_FILES['nespaciobeige']['name'] != "") {
            $Uploads = new iUpload();
            $strImg = $Uploads->renameImage($_FILES['nespaciobeige']['name']);

            $handle = new \Verot\Upload\Upload($_FILES['nespaciobeige']);

            if ($handle->uploaded) {

                // IMAGEN SLIDE
                $handle->file_new_name_body = $strImg;
                $handle->file_name_body_pre = 'espbeige_';
                $handle->jpeg_quality            = 100;
                $handle->image_resize          = true;
                $handle->image_ratio_x         = true;
                $handle->image_y               = _CONST_IMG_ESP_NOMBRE_UNICO_;
                $handle->Process(_CONST_PATH_IMG_ESPACIOS_);

                if ($handle->processed) {
                    $espbeige = $handle->file_dst_name;
                } else {
                    $espbeige = "nd";
                }
                $handle->Clean();
            }
        } else {
            $espbeige = "nd";
        }

        if ($_FILES['plano']['name'] != "") {
            $Uploads = new iUpload();
            $strImg = $Uploads->renameImage($_FILES['plano']['name']);

            $handle = new \Verot\Upload\Upload($_FILES['plano']);

            if ($handle->uploaded) {

                // IMAGEN SLIDE
                $handle->file_new_name_body = $strImg;
                $handle->file_name_body_pre = 'plano_';
                $handle->jpeg_quality            = 100;
                $handle->image_resize          = true;
                $handle->image_ratio_y         = true;
                $handle->image_x               = _CONST_IMG_ESP_PLANO_;
                $handle->Process(_CONST_PATH_IMG_ESPACIOS_);

                if ($handle->processed) {
                    $plano = $handle->file_dst_name;
                } else {
                    $plano = "nd";
                }
                $handle->Clean();
            }
        } else {
            $plano = "nd";
        }

        $arrData = [
            ['value'=> $_POST["nombre"],'tipo'=> 'AN'],
            ['value'=> $icono,'tipo'=> 'AN'],
            ['value'=> $espgris,'tipo'=> 'AN'],
            ['value'=> $espblanco,'tipo'=> 'AN'],
            ['value'=> $espbeige,'tipo'=> 'AN'],
            ['value'=> $plano,'tipo'=> 'AN'],
            ['value'=> $_POST["avance"],'tipo'=> 'TH'],
            ['value'=> $_POST["texto1"],'tipo'=> 'TH'],
            ['value'=> $_POST["texto2"],'tipo'=> 'TH'],
            ['value'=> $_POST["capacidad"],'tipo'=> 'TH'],
            ['value'=> $_POST["galeria"],'tipo'=> 'NU'],
            ['value'=> $_POST["hash"],'tipo'=> 'TH']
          ];
          
          $query = "INSERT INTO elpunto_espacios (esp_nombre,esp_icono,esp_nombre_texto1,esp_nombre_texto2,esp_nombre_texto3,esp_plano,esp_avance,esp_texto_1,esp_texto_2,esp_capacidad,esp_galeria,esp_hash) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
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
                rename("../assets/post-temp/" . $imagenRect . "", "../assets/espacios/slides/" . $imagenRect . "");
            }
        }


        break;

    case 'U':
        //
        $idPost = $_POST["id"];
        $target_path = _CONST_PATH_IMG_ESPACIOS_;
        $arrData = [['value'=> $idPost,'tipo'=> 'NU']];
        $query = "SELECT * FROM elpunto_espacios WHERE esp_id = ?";
        $rsCont = $objContenido->getOneContenido($link,$arrData,$query);
        $arrCont = $rsCont->fetch(PDO::FETCH_BOTH);
        //
        $Uploads = new iUpload();

        //ICONO
        if ($_FILES['icono']['name'] != "") {
            if ($arrCont["esp_icono"] != "nd") {
                $Uploads->deleteFile($target_path . $arrCont["esp_icono"]);
            }
            $strImg = $Uploads->renameImage($_FILES['icono']['name']);

            $handle = new \Verot\Upload\Upload($_FILES['icono']);

            if ($handle->uploaded) {

                // IMAGEN SLIDE
                $handle->file_new_name_body = $strImg;
                $handle->file_name_body_pre = 'ico_';
                $handle->image_resize          = true;
                $handle->image_ratio_crop      = true;
                $handle->jpeg_quality            = 100;
                $handle->image_y               = _CONST_IMG_ESP_ICONO_UNICO_;
                $handle->image_x               = _CONST_IMG_ESP_ICONO_UNICO_;
                $handle->Process(_CONST_PATH_IMG_ESPACIOS_);
                $handle->image_resize          = true;

                if ($handle->processed) {
                    $icono = $handle->file_dst_name;
                } else {
                    $icono = "nd";
                }
                $handle->Clean();
            }
        } else {
            $icono = $arrCont["esp_icono"];
        }

        if ($_FILES['nespaciogris']['name'] != "") {
            if ($arrCont["esp_nombre_texto1"] != "nd") {
                $Uploads->deleteFile($target_path . $arrCont["esp_nombre_texto1"]);
            }
            $strImg = $Uploads->renameImage($_FILES['nespaciogris']['name']);

            $handle = new \Verot\Upload\Upload($_FILES['nespaciogris']);

            if ($handle->uploaded) {

                // IMAGEN SLIDE
                $handle->file_new_name_body = $strImg;
                $handle->file_name_body_pre = 'espgris_';
                $handle->jpeg_quality            = 100;
                $handle->image_resize          = true;
                $handle->image_ratio_x         = true;
                $handle->image_y               = _CONST_IMG_ESP_NOMBRE_UNICO_;
                $handle->Process(_CONST_PATH_IMG_ESPACIOS_);

                if ($handle->processed) {
                    $espgris = $handle->file_dst_name;
                } else {
                    $espgris = "nd";
                }
                $handle->Clean();
            }
        } else {
            $espgris = $arrCont["esp_nombre_texto1"];
        }

        if ($_FILES['nespacioblanco']['name'] != "") {
            if ($arrCont["esp_nombre_texto2"] != "nd") {
                $Uploads->deleteFile($target_path . $arrCont["esp_nombre_texto2"]);
            }
            $strImg = $Uploads->renameImage($_FILES['nespacioblanco']['name']);

            $handle = new \Verot\Upload\Upload($_FILES['nespacioblanco']);

            if ($handle->uploaded) {

                // IMAGEN SLIDE
                $handle->file_new_name_body = $strImg;
                $handle->file_name_body_pre = 'espblanco_';
                $handle->jpeg_quality            = 100;
                $handle->image_resize          = true;
                $handle->image_ratio_x         = true;
                $handle->image_y               = _CONST_IMG_ESP_NOMBRE_UNICO_;
                $handle->Process(_CONST_PATH_IMG_ESPACIOS_);

                if ($handle->processed) {
                    $espblanco = $handle->file_dst_name;
                } else {
                    $espblanco = "nd";
                }
                $handle->Clean();
            }
        } else {
            $espblanco = $arrCont["esp_nombre_texto2"];
        }

        if ($_FILES['nespaciobeige']['name'] != "") {
            if ($arrCont["esp_nombre_texto3"] != "nd") {
                $Uploads->deleteFile($target_path . $arrCont["esp_nombre_texto3"]);
            }
            $strImg = $Uploads->renameImage($_FILES['nespaciobeige']['name']);

            $handle = new \Verot\Upload\Upload($_FILES['nespaciobeige']);

            if ($handle->uploaded) {

                // IMAGEN SLIDE
                $handle->file_new_name_body = $strImg;
                $handle->file_name_body_pre = 'espbeige_';
                $handle->jpeg_quality            = 100;
                $handle->image_resize          = true;
                $handle->image_ratio_x         = true;
                $handle->image_y               = _CONST_IMG_ESP_NOMBRE_UNICO_;
                $handle->Process(_CONST_PATH_IMG_ESPACIOS_);

                if ($handle->processed) {
                    $espbeige = $handle->file_dst_name;
                } else {
                    $espbeige = "nd";
                }
                $handle->Clean();
            }
        } else {
            $espbeige = $arrCont["esp_nombre_texto3"];
        }

        if ($_FILES['plano']['name'] != "") {
            if ($arrCont["esp_plano"] != "nd") {
                $Uploads->deleteFile($target_path . $arrCont["esp_plano"]);
            }
            $strImg = $Uploads->renameImage($_FILES['plano']['name']);

            $handle = new \Verot\Upload\Upload($_FILES['plano']);

            if ($handle->uploaded) {

                // IMAGEN SLIDE
                $handle->file_new_name_body = $strImg;
                $handle->file_name_body_pre = 'plano_';
                $handle->jpeg_quality            = 100;
                $handle->image_resize          = true;
                $handle->image_ratio_y         = true;
                $handle->image_x               = _CONST_IMG_ESP_PLANO_;
                $handle->Process(_CONST_PATH_IMG_ESPACIOS_);

                if ($handle->processed) {
                    $plano = $handle->file_dst_name;
                } else {
                    $plano = "nd";
                }
                $handle->Clean();
            }
        } else {
            $plano = $arrCont["esp_plano"];
        }

        $arrData = [
            ['value'=> $_POST["nombre"],'tipo'=> 'AN'],
            ['value'=> $icono,'tipo'=> 'AN'],
            ['value'=> $espgris,'tipo'=> 'AN'],
            ['value'=> $espblanco,'tipo'=> 'AN'],
            ['value'=> $espbeige,'tipo'=> 'AN'],
            ['value'=> $plano,'tipo'=> 'AN'],
            ['value'=> $_POST["avance"],'tipo'=> 'TH'],
            ['value'=> $_POST["texto1"],'tipo'=> 'TH'],
            ['value'=> $_POST["texto2"],'tipo'=> 'TH'],
            ['value'=> $_POST["capacidad"],'tipo'=> 'TH'],
            ['value'=> $_POST["galeria"],'tipo'=> 'NU'],
            ['value'=> $_POST["hash"],'tipo'=> 'TH'],
            ['value'=> $idPost,'tipo'=> 'NU']
          ];
        //

        $query = "UPDATE elpunto_espacios SET esp_nombre = ?,esp_icono = ?,esp_nombre_texto1 = ?,esp_nombre_texto2 = ?,esp_nombre_texto3 = ?,esp_plano = ?,esp_avance = ?,esp_texto_1 = ?,esp_texto_2 = ?,esp_capacidad = ?,esp_galeria = ?,esp_hash = ? WHERE esp_id = ?";
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
                    rename("../assets/post-temp/" . $imagenRect . "", "../assets/espacios/slides/" . $imagenRect . "");
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
                    $target_path = _CONST_PATH_IMG_ESPACIOS_SLIDES_;
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
                    rename("../assets/post-temp/" . $imagenRect . "", "../assets/espacios/slides/" . $imagenRect . "");
                }
            }
        };


        break;


    case 'D':
        //Recibo variables
        $idPost = $_POST["intIdRegistro"];

        $arrData = [['value'=> $idPost,'tipo'=> 'NU']];
        $query = "SELECT * FROM elpunto_espacios WHERE esp_id = ?";
        $rsCont = $objContenido->getOneContenido($link,$arrData,$query);
        $arrCont = $rsCont->fetch(PDO::FETCH_BOTH);

        $arrData = [['value'=> $idPost,'tipo'=> 'NU']];
        $queryi = "SELECT * FROM elpunto_contximagenes WHERE contximg_cont_id = ?";
        $rsConti = $objContenido->getOneContenido($link,$arrData,$queryi);
        $arrConti = $rsConti->fetch(PDO::FETCH_BOTH);
        $intQtyRecordsi = $rsConti->rowCount();

        // Borramos la Imagen de la obra
        $Uploads = new iUpload();

        $target_path = _CONST_PATH_IMG_ESPACIOS_;
        $target_path2 = _CONST_PATH_IMG_ESPACIOS_SLIDES_;

        if ($arrCont["esp_icono"] != "nd") {
            $Uploads->deleteFile($target_path . $arrCont["esp_icono"]);
        }
        if ($arrCont["esp_nombre_texto1"] != "nd") {
            $Uploads->deleteFile($target_path . $arrCont["esp_nombre_texto1"]);
        }
        if ($arrCont["esp_nombre_texto2"] != "nd") {
            $Uploads->deleteFile($target_path . $arrCont["esp_nombre_texto2"]);
        }
        if ($arrCont["esp_nombre_texto3"] != "nd") {
            $Uploads->deleteFile($target_path . $arrCont["esp_nombre_texto3"]);
        }
        if ($arrCont["esp_plano"] != "nd") {
            $Uploads->deleteFile($target_path . $arrCont["esp_plano"]);
        }
        //
        if($intQtyRecordsi > 0){
            $Uploads->deleteFile($target_path2 . $arrConti["contximg_imagen"]);
        }
  
        //
        $queryd = "DELETE FROM elpunto_espacios WHERE esp_id = ?";
        $rsContd = $objContenido->getOneContenido($link,$arrData,$queryd);
        //
        $arrData2 = [['value'=> $idPost,'tipo'=> 'NU']];
        $queryci = "DELETE FROM elpunto_contximagenes WHERE contximg_cont_id =?";
        $rsContci = $objContenido->getOneContenido($link,$arrData2,$queryci);
        //
        break;
}
//
header("Location: lstEspacios.php?seccion=espacios");
