<?PHP

include_once('../includes/classnew.inc.php');
include_once('../includes/conexion.inc.php');
include_once('../includes/funciones.inc.php');

$link = Conectarse();
//
		$orden = $_POST["orden"];
		$arrayId = explode(',',$orden);
		$contador = 1;
		$pos = 1;
		$largo=count($arrayId);
		$succes=0;

		$objContenido = new General();
		$data = "";

		if ($largo!=1) {
			while($contador<=$largo){

				
				$arrData[0] = ['value'=> $pos,'tipo'=> 'AN'];
				$arrData[1] = ['value'=> $arrayId[$contador-1],'tipo'=> 'AN'];

				$query = "UPDATE galeriasgximag SET gxi_orden = ? WHERE gxi_id = ?";
				$intIdRegistro = $objContenido->updateContenido($link,$arrData,$query);



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


?>
