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
$strOperacion = $objContenido->dataCleaner($_POST["strOperacion"], 'AN');
//
switch ($strOperacion) {
    case 'I':
        //
        if ($_POST["posicion"] == "") {
            $_POST["posicion"] = 0;
        }

        $arrData2 = [
            ['value' => $_POST["nombre"], 'tipo' => 'TH2'],
            ['value' => $_POST["textos"], 'tipo' => 'TH2'],
            ['value' => $_POST["posicion"], 'tipo' => 'AN'],
            ['value' => $_POST["publicada"], 'tipo' => 'NU']
        ];
        //
        $query = "INSERT INTO feedback (fd_nombre,fd_texto,fd_posicion,fd_publicado) VALUES (?,?,?,?)";
        $intIdRegistro = $objContenido->insertContenido($link, $arrData2, $query);

        break;

    case 'U':
        //

        $target_path = _CONST_PATH_I_ARCH_;
        
        $Uploads = new Archivo();

        $idPost = $_POST["id"];
        $query = "SELECT * FROM patagonia WHERE id=".$idPost ;
        $rsCont = $objContenido->getAllContenido($link,$query);
        $arrCont = $rsCont->fetch(PDO::FETCH_BOTH);

        if ($_FILES['archivo']['name'] != "") {

            if ($arrCont["pdf"] != "nd") {
                $Uploads->deleteFile($target_path . $arrCont["pdf"]);
            }

            $strArch = $Uploads->renameFile($_FILES['archivo']['name']);
            $strArch = $strArch;
            if (is_uploaded_file($_FILES['archivo']['tmp_name'])) {
                move_uploaded_file($_FILES['archivo']['tmp_name'], $target_path . $strArch);
                $archivo = $strArch;
            }
        } else {
            /* Solo Borra Archivo */
            
            $archivo = $arrCont["pdf"];
            
        }

        $arrData2 = [
            ['value' => $_POST["titulo"], 'tipo' => 'TH2'],
            ['value' => $archivo, 'tipo' => 'TH2'],
            ['value' => $_POST["publicado"], 'tipo' => 'NU'],
            ['value' => $idPost, 'tipo' => 'AN']
        ];
        //

        $query = "UPDATE patagonia SET titulo = ?,pdf = ?,publicado = ? WHERE id = ?";
        $intIdRegistro = $objContenido->updateContenido($link, $arrData2, $query);

        break;


    case 'D':
        //Recibo variables
        $idPost = $_POST["intIdRegistro"];
        $arrData = [['value' => $idPost, 'tipo' => 'NU']];

        //
        $queryd = "DELETE FROM feedback WHERE fd_id = ?";
        $rsContd = $objContenido->getOneContenido($link, $arrData, $queryd);
        break;
}
//
header("Location: lstPatagonia.php?seccion=patagonia");
