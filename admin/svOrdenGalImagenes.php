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
		$orden = $_POST["orden"];
		$arrayId = explode(',',$orden);
		$contador = 1;
		$pos = 1;
		$largo=count($arrayId);
		$succes=0;

		$data = "";

		if ($largo!=1) {
			while($contador<=$largo){

				$arrData2 = [['value'=> $pos,'tipo'=> 'NU'],['value'=> $arrayId[$contador-1],'tipo'=> 'NU']];
				  
				$query = "UPDATE elpunto_galeriasximag SET gxi_posicion = ? WHERE gxi_id = ?";
				$intIdRegistro = $objContenido->updateContenido($link, $arrData2, $query);

				if ($intIdRegistro){
					$succes++;
					if($contador == 1){
						$data .= $contador;
					} else {
						$data .= ",".$contador;
					}

				} else {
					$succes--;;
				}
				$contador++;
				$pos++;
			}
			echo $data;

		} else {
			echo("<span class='griss10'>No se ha modificado el orden.</span>");
		}
    //
