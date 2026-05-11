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
$query = "SELECT * FROM email_envio";
$rsCont = $objContenido->getAllContenido($link,$query);
//
if (isset($_GET["intPage"])) {
	$intPage = $_GET["intPage"];
} else {
	$intPage="";
}
//
if ($intPage == "") {
	$arrData2[0] = ['value'=> 0,'tipo'=> 'NU'];
	$intPage = 1;
} else {
	$arrData2[0] = ['value'=> (($_GET["intPage"] - 1) * _CONST_PAGINADO_),'tipo'=> 'NU']; ;
	$intPage = $objContenido->dataCleaner($_GET["intPage"],'NU');
}
$arrData2[1] = ['value'=> _CONST_PAGINADO_,'tipo'=> 'NU'];
//ALMACENO EL TOTAL DE REGISTROS
$intQtyRecords = $rsCont->rowCount();
//CALCULO EL TOTAL DE PAGINAS
$intQtyPages = ceil($intQtyRecords / _CONST_PAGINADO_);
//
//HAGO NUEVAMENTE LA CONSULTA PERO YA CON EL LIMIT SETEADO
$query = "SELECT * FROM email_envio ORDER BY ee_fecha DESC, ee_ed_id DESC, ee_subject ASC LIMIT ?,?";
$rsCont = $objContenido->getOneContenido($link,$arrData2,$query);
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Panel de Control - <?php echo _CONST_TITLE_ ?></title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="font-awesome/css/font-awesome.css" rel="stylesheet">
	<link href="css/animate.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link href="css/estilos.css" rel="stylesheet" type="text/css">
</head>


<body>

	<div id="wrapper">
		<nav class="navbar-default navbar-static-side" role="navigation">
			<div class="sidebar-collapse">
				<ul class="nav metismenu" id="side-menu">
					<?php include_once('includes/columnaTop.inc.php'); ?>
					<?php include_once('includes/columnaLeft.inc.php'); ?>
				</ul>
			</div>
		</nav>
		<div id="page-wrapper" class="gray-bg">
			<div class="row border-bottom">
				<nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
					<div class="navbar-header">
						<a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
					</div>
					<ul class="nav navbar-top-links navbar-right">
						<li><a href="logout.php"><i class="fa fa-sign-out"></i> Log out</a></li>
					</ul>
				</nav>
			</div>
			<div class="row wrapper border-bottom white-bg page-heading">
				<div class="col-sm-12">
					<h2>Listar Envios de Email</h2>
					<ol class="breadcrumb">
						<li><a href="home.php?seccion=inicio">Home</a></li>
						<li><a href="#">Envios de Email</a></li>
						<li class="active"><strong>Listar Envios de Email</strong></li>
					</ol>
				</div>
			</div>
			<div class="wrapper wrapper-content animated fadeInRight">
				<div class="row">
					<div class="col-lg-12">
						<div class="ibox float-e-margins">
							<div class="ibox-content">
								<form name="frm" method="post" action="svEnvemail.php">
									<input type="hidden" name="intIdRegistro" value="" />
									<input type="hidden" name="strDb" value="" />
									<input type="hidden" name="Archivo" value="" />
									<input type="hidden" name="intPage" value="" />
									<input type="hidden" name="strOperacion" value="D" />
									<table class="table table-striped">
										<thead>
											<tr>
												<th>Subject</th>
                                                <th>Nombre Destinatario</th>
                                                <th>E-mail Destinatario</th>
                                                <th>Fecha de envio</th>
                                                <th>Estado</th>
											</tr>
										</thead>
										<tbody>
											<?php $intCounter = 0; ?>
											<?php while ($arrContenido = $rsCont->fetch(PDO::FETCH_BOTH)) { ?>
												<tr>
													

													<td><?php echo $arrContenido["ee_subject"]; ?></td>
                                                    <td><?php echo $arrContenido["ee_name_dest"]; ?></td>
                                                    <td><?php echo $arrContenido["ee_email_dest"]; ?></td>
                                                    <td><?php echo invertFecha($arrContenido["ee_fecha"]); ?></td>
                                                    <td><?php if ($arrContenido["ee_estado"] == 0) { ?><a href="#" class="btn btn-default btn-circle"><i class="fa fa-check"></i></a><?php } else { ?><a href="#" class="btn btn-info btn-circle"><i class="fa fa-check"></i></a><?php } ?></td>
													
													
												</tr>
												<?php $intCounter++; ?>
											<?php } ?>
										</tbody>
									</table>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- Paginación -->
				<div class="row">
					<div class="col-lg-12 paginador">
						<?php echo printPaginado("lstEnvemail.php", $intQtyPages, $intPage, "envioemail");?>
					</div>
				</div>
			</div>
			<div class="footer">
				<div>&copy; 2014 - <?php echo date ("Y") ?></div>
			</div>
		</div>
	</div>

	<!-- Mainly scripts -->
	<script src="js/jquery-3.3.1.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
	<script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

	<!-- Custom and plugin javascript -->
	<script src="js/inspinia.js"></script>
	<script src="js/plugins/pace/pace.min.js"></script>
	<script type="text/javascript">
	function delRegistro(pIdRegistro,pDsArchivo,strDb,intPage){
		if (!window.confirm("Esta seguro que desea borrar este registro?")){
			return;
		}
		else{
			document.frm.intIdRegistro.value = pIdRegistro;
			document.frm.strDb.value = strDb;
			document.frm.Archivo.value = pDsArchivo;
			document.frm.intPage.value = intPage;
			document.frm.submit();
		}
	}
	</script>
</body>
</html>
