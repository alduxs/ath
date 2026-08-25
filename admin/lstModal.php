<?php
include_once("../includes/checkLogin.inc.php");
include_once('../includes/classnew.inc.php');
include_once('../includes/conexion.inc.php');
include_once('../includes/funciones.inc.php');

$link = Conectarse();
$objContenido = new General();
$query = "SELECT * FROM modal WHERE modal_id = 1";
$rsCont = $objContenido->getAllContenido($link, $query);
$arrCont = $rsCont->fetch(PDO::FETCH_ASSOC);
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
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary" href="#"><i class="fa fa-bars"></i></a>
                </div>
                <ul class="nav navbar-top-links navbar-right"><li><a href="logout.php"><i class="fa fa-sign-out"></i> Log out</a></li></ul>
            </nav>
        </div>
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-sm-12">
                <h2>Imágenes del modal</h2>
                <ol class="breadcrumb"><li><a href="home.php?seccion=inicio">Home</a></li><li><a href="#">Modal</a></li><li class="active"><strong>Imágenes</strong></li></ol>
            </div>
        </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row"><div class="col-lg-12"><div class="ibox float-e-margins"><div class="ibox-content">
                <?php if ($arrCont) { ?>
                <table class="table table-striped">
                    <thead><tr><th>Imagen escritorio</th><th>Imagen móvil</th><th>Acción</th></tr></thead>
                    <tbody><tr>
                        <td><?php if ($arrCont['modal_image'] != 'nd') { ?><img src="../assets/images/<?php echo htmlspecialchars($arrCont['modal_image'], ENT_QUOTES, 'UTF-8'); ?>" style="max-width:300px;max-height:220px" alt="Modal escritorio"><?php } else { ?>-<?php } ?></td>
                        <td><?php if ($arrCont['modal_image_rp'] != 'nd') { ?><img src="../assets/images/<?php echo htmlspecialchars($arrCont['modal_image_rp'], ENT_QUOTES, 'UTF-8'); ?>" style="max-width:300px;max-height:220px" alt="Modal móvil"><?php } else { ?>-<?php } ?></td>
                        <td><a href="updModal.php?seccion=modal&id=<?php echo (int) $arrCont['modal_id']; ?>" class="btn btn-primary btn-bitbucket" title="Editar"><i class="fa fa-pencil"></i></a></td>
                    </tr></tbody>
                </table>
                <?php } else { ?><p>No existe el registro del modal.</p><?php } ?>
            </div></div></div></div>
        </div>
        <div class="footer"><div>&copy; 2014 - <?php echo date("Y") ?></div></div>
    </div>
</div>
<script src="js/jquery-3.3.1.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="js/inspinia.js"></script>
<script src="js/plugins/pace/pace.min.js"></script>
</body>
</html>
