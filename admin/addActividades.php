<?php
include_once("../../includes/checkLogin.inc.php");
include_once('../../includes/classnew.inc.php');
include_once('../../includes/conexion.inc.php');
include_once('../../includes/funciones.inc.php');
//
$link = Conectarse();
//
$objContenido = new General();
//
?>
<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Control - <?php echo _CONST_TITLE_EP_ ?></title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/plugins/datapicker/datepicker3.css" rel="stylesheet">
    <link href="css/plugins/clockpicker/clockpicker.css" rel="stylesheet">
    <link rel="stylesheet" href="css/dropzone.css" />
    <link rel="stylesheet" href="css/cropper.css" />
    <link href="css/image.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="css/amsify.suggestags.css">
    <link href="css/estilos.css" rel="stylesheet" type="text/css">
</head>

<head>

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
                    <h2>Agregar Actividad</h2>
                    <ol class="breadcrumb">
                        <li><a href="home.php?seccion=inicio">Home</a></li>
                        <li><a href="#">Actividades</a></li>
                        <li class="active"><strong>Agregar Actividad</strong></li>
                    </ol>
                </div>
            </div>

            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-content">
                                <form method="post" action="svActividades.php" enctype="multipart/form-data" name="form1">
                                    <input type="hidden" name="strOperacion" value="I" />
                                    <input type="hidden" name="idusuario" value="<?php echo $_SESSION["id"]; ?>">


                                    <!-- Título -->
                                    <div class="form-group col-xs-12">
                                        <label for="nombre">Título</label>
                                        <input type="text" name="nombre" id="nombre" class="form-control">
                                    </div>
                                    <div class="hr-line-dashed col-xs-12"></div>

                                    <!-- Disertante -->
                                    <div class="form-group col-xs-12">
                                        <label for="disertante">Disertante</label>
                                        <input type="text" name="disertante" id="disertante" class="form-control">
                                    </div>
                                    <div class="hr-line-dashed col-xs-12"></div>

                                    <!-- Imagen -->
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h4>Imagen Principal (Relación 1:1 - Tamaño mínimo: 800 px de ancho)</h4>
                                            <div class="image_area tamanio_imag_actividades">
                                                <label for="upload_image">
                                                    <img src="img/imagen-actividad.png" id="uploaded_image" class="img-responsive" />
                                                    <div class="overlay">
                                                        <div class="text">Cambiar Imagen</div>
                                                    </div>
                                                    <input type="file" name="image" class="image" id="upload_image" style="display:none" />
                                                    <input type="hidden" name="imageNewRect" id="imageNewRect" value="nd">
                                                    <input type="hidden" name="tipo" id="tipo" value="2">
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="hr-line-dashed col-xs-12"></div>

                                    <!-- Notas relacionadas -->
                                    <div class="form-group col-xs-12">
                                        <label for="espacio">Espacio</label>
                                        <select name="espacio" class="select2_demo_3 form-control" id="espacio">

                                            <option value="0"></option>
                                            <?php
                                            $queryPost = "SELECT * FROM elpunto_espacios";
                                            $rsPost = $objContenido->getAllContenido($link,$queryPost);
                                            ?>
                                            <?php while ($arrPost = $rsPost->fetch(PDO::FETCH_BOTH)) { ?>
                                                <option value="<?php echo $arrPost["esp_id"] ?>"><?php echo $arrPost["esp_nombre"] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="hr-line-dashed col-xs-12"></div>


                                    <!-- Info -->
                                    <div class="form-group col-xs-12">
                                        <label for="info">Info</label>
                                        <textarea name="info" rows="10" id="info"></textarea>
                                    </div>
                                    <div class="hr-line-dashed col-xs-12"></div>

                                    <div class="form-group col-xs-6" id="data_1">
                                        <label>Fecha</label>
                                        <div class="input-group date">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" value="" name="fecha" id="fecha">
                                        </div>
                                    </div>

                                    <div class="form-group col-xs-6">
                                        <label>Hora</label>
                                        <div class="input-group clockpicker" data-autoclose="true">
                                            <input type="text" class="form-control" name="hora" id="hora">
                                            <span class="input-group-addon">
                                                <span class="fa fa-clock-o"></span>
                                            </span>
                                        </div>
                                    </div>
                                    <!-- Mostrar Fecha -->
                                    <div class="form-group col-xs-12">
                                        <label for="mfecha">Mostrar Fecha</label>
                                        <p><label class="checkbox-inline i-checks"> <input type="radio" value="1" name="mfecha" checked> Si </label><label class="checkbox-inline i-checks"> <input name="mfecha" type="radio" value="0" > No </label></p>
                                    </div>
                                    <div class="hr-line-dashed col-xs-12"></div>

                                    <div class="form-group col-xs-12">
                                        <label for="hash">URL</label>
                                        <input type="text" name="hash" id="hash" class="form-control">
                                    </div>
                                    <div class="hr-line-dashed col-xs-12"></div>

                                    <!-- Home -->
                                    <div class="form-group col-xs-12">
                                        <label for="home">Home</label>
                                        <p><label class="checkbox-inline i-checks"> <input type="radio" value="1" name="home"> Si </label><label class="checkbox-inline i-checks"> <input name="home" type="radio" value="0" checked> No </label></p>
                                    </div>
                                    <div class="hr-line-dashed col-xs-12"></div>

                                    <!-- Publicada -->
                                    <div class="form-group col-xs-12">
                                        <label for="publicada">Publicada</label>
                                        <p><label class="checkbox-inline i-checks"> <input type="radio" value="1" name="publicada" checked> <i></i> Si </label><label class="checkbox-inline i-checks"> <input name="publicada" type="radio" value="0"> <i></i> No </label></p>
                                    </div>
                                    <div class="hr-line-dashed col-xs-12"></div>

                                    <div class="form-group text-center">
                                        <input name="agregar" type="submit" class="btn btn-primary" id="agregar" value="Enviar">
                                    </div>

                                </form>


                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer">
                <div>&copy; 2014 - <?php echo date("Y") ?></div>
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

    <!-- Tinymce -->
    <script type="text/javascript" src="js/tinymce/tinymce.min.js"></script>

    <!-- Data picker -->
    <script src="js/plugins/datapicker/bootstrap-datepicker.js"></script>
    <!-- Clock picker -->
    <script src="js/plugins/clockpicker/clockpicker.js"></script>

    <script src="js/dropzone.js"></script>
    <script src="js/cropper.js"></script>

    <!-- iCheck -->
    <script src="js/plugins/iCheck/icheck.min.js"></script>

    <!--tag sugest -->
    <!--<script src="js/jquery.amsify.suggestags.js"></script>-->

    <script src="js/custom.js?v=30"></script>
    <script>
        $(document).ready(function() {
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });

            var d = new Date();
            var day = d.getDate();

            const month = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

            var m = new Date();
            var name = month[m.getMonth()];

            var y = new Date();
            var year = y.getFullYear();

            var stardaten = day + "/" + name + "/" + year;


            $('#data_1 .input-group.date').datepicker({
                format: "dd/mm/yyyy",
                autoclose: true,
                startDate: stardaten + " 00:00 AM",
                todayBtn: "linked",
                todayHighlight: true
            });

            $("#nombre").blur(function() {
                var string = $("#nombre").val();
                string = string.toLowerCase();
                string = string.trim();
                //
                var stringfind = ["á", "é", "í", "ó", "ú", "Á", "É", "Í", "Ó", "Ú","ä", "ë", "ï", "ö", "ü", "Ä", "Ë", "Ï", "Ö", "Ü", "¿", "?", "¡", "!", "º", "ª", "#", "$", "%", "&", "/", "(", ")", "[", "]", "{", "}", ",", ".", ":", ";", "-", "_", "*"];
                var stringreplace = ["a", "e", "i", "o", "u", "A", "E", "I", "O", "U","a", "e", "i", "o", "u", "A", "E", "I", "O", "U", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""]; 
                for (let index = 0; index < stringfind.length; index++) {
                    string = string.replaceAll(stringfind[index], stringreplace[index]);
                }
                //
                var stringArray = string.split(" ");
                var stringfinal = "";
                for (let index = 0; index < stringArray.length; index++) {
                    if (index == 0) {
                        stringfinal += stringArray[index];
                    } else {
                        stringfinal += "-" + stringArray[index];
                    }
                }
                //
                $("#hash").val(stringfinal);
            });
        });

        tinymce.init({
            selector: "textarea",
            theme: "modern",
            plugins: [
                'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
                'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
                'save table contextmenu directionality emoticons template paste textcolor'
            ],
            toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons',
            image_advtab: true,
            relative_urls: false,

            style_formats: [

                {
                    title: 'Imagen Derecha',
                    selector: 'p',
                    classes: 'imgpost'
                }
            ],

        });

        $('.clockpicker').clockpicker();
    </script>


    <!-- *********************************** MODALS *********************************-->

    <!-- Modal imagen grande -->
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Crop Image Before Upload</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="img-container">
                        <div class="row">
                            <div class="col-md-12">
                                <img src="" id="sample_image" />
                            </div>
                            <div class="col-md-4">
                                <div class="preview"></div>
                                <div class="input-group" style="width: 80%;margin-bottom:10px;">
                                    <div class="input-group-addon">Ancho</div>
                                    <input type="text" class="form-control" id="ancho" placeholder="0">
                                    <div class="input-group-addon">px</div>
                                </div>
                                <div class="input-group" style="width: 80%;">
                                    <div class="input-group-addon">Alto</div>
                                    <input type="text" class="form-control" id="alto" placeholder="0">
                                    <div class="input-group-addon">px</div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="crop" class="btn btn-primary">Crop</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <!-- *********************************** FIN MODALS *********************************-->
</body>

</html>