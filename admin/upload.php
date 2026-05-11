<?php
include_once('../../includes/classnew.inc.php');
include_once('../../includes/conexion.inc.php');
include_once('../../includes/funciones.inc.php');
//
$link = Conectarse();
//
$objContenido = new General();
//
if(isset($_POST['image']))
{
	$data = $_POST['image'];
	$nombreOriginal = $_POST['nombre'];
	$tipo = $_POST['tipo'];
	$imagenActual = $_POST['imgActual'];

	if($tipo == 1){
		$prefix = "esp_";
	} else if($tipo == 2){
		$prefix = "act_";
	} else if($tipo == 3){
		$prefix = "sl_";
	} else if($tipo == 4){
		$prefix = "slsmall_";
	}

	// Procesa el nombre
	$porciones = explode(".", $nombreOriginal);
	$largo = count($porciones);

	$nombreFinal = "";

	if($largo > 2){
		for ($i=0; $i < ($largo-1); $i++) { 
			$nombreFinal .= $porciones[$i];
		}
	} else {
		$nombreFinal .= $nombreFinal.$porciones[0];
	}
	$Uploads = new iUpload;
	$strImg = $Uploads->renameImageBlob($nombreFinal);
	//Fin proceso Nombre

	//Proceso de cragdo de Imagen
	$image_array_1 = explode(";", $data);
	$image_array_2 = explode(",", $image_array_1[1]);
	$data = base64_decode($image_array_2[1]);
	$image_name = '../assets/post-temp/' .$prefix. $strImg . '.jpg';
	file_put_contents($image_name, $data);
	//Fin del proceso de carga de imágenes

	//Proceso de borrado y carga
	
	if($imagenActual == "nd"){
	// Caso 1: Es la primera imagen que se carga.
	// 1 - Se guarda un registro en la tabla temporal
		$imagen = $prefix.$strImg.".jpg";


		//Inserta el registro

		$arrData2 = [
            ['value'=> $imagen,'tipo'=> 'AN'],
            ['value'=> $tipo,'tipo'=> 'NU'],
          ];
          $query = "INSERT INTO elpunto_contximag_temp (cxi_imagen,cxi_tipo) VALUES (?,?)";
          $intIdRegistro = $objContenido->insertContenido($link, $arrData2, $query);


	} else {
	// Caso 2: Ya se cargaron otras imagenes.
	// 1 - Se consulta si exiten en la tabla temporal

		$arrData = [['value'=> $imagenActual,'tipo'=> 'AN']];

		$query = "SELECT * FROM elpunto_contximag_temp WHERE cxi_imagen = ?";
		$rsCont = $objContenido->getOneContenido($link,$arrData,$query);
		$intQtyRecords = $rsCont->rowCount();
		if($intQtyRecords > 0){
		// Si existe:
		// 1 - Borrar imagen de la carpeta temporal
		// 2 - Borrar registro de tabla temporal
		// 3 - Se guarda un registro en la tabla temporal

			//Borrar Imagen
			$target_path = "../assets/post-temp/".$imagenActual;
			$Uploads->deleteFile($target_path);

			//Borrar registro
			$arrData = [['value'=> $imagenActual,'tipo'=> 'AN']];
			$query = "DELETE FROM elpunto_contximag_temp WHERE cxi_imagen = ?";
			$rsCont = $objContenido->getOneContenido($link,$arrData,$query);
			//Inserta el registro
			$imagen = $prefix.$strImg.".jpg";

			$arrData[0] = '';
			$arrData[1] = $imagen;
			$arrData[2] = $tipo;

			$arrData2 = [
				['value'=> $imagen,'tipo'=> 'AN'],
				['value'=> $tipo,'tipo'=> 'NU'],
			  ];
			  $query = "INSERT INTO elpunto_contximag_temp (cxi_imagen,cxi_tipo) VALUES (?,?)";
			  $intIdRegistro = $objContenido->insertContenido($link, $arrData2, $query);

		}
	}

	//Carga Base de datos temporal

	echo $image_name;
}

?>