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
          <h2>Agregar Espacio</h2>
          <ol class="breadcrumb">
            <li><a href="home.php?seccion=inicio">Home</a></li>
            <li><a href="#">Espacios</a></li>
            <li class="active"><strong>Agregar Espacio</strong></li>
          </ol>
        </div>
      </div>



      <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
          <div class="col-lg-12">
            <div class="ibox float-e-margins">
              <div class="ibox-content">
                <form method="post" action="svEspacios.php" enctype="multipart/form-data" name="form1">
                  <input type="hidden" name="strOperacion" value="I" />
                  <input type="hidden" name="idusuario" value="<?php echo $_SESSION["id"]; ?>">


                  <!-- Título -->
                  <div class="form-group col-xs-12">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control">
                  </div>
                  <div class="hr-line-dashed col-xs-12"></div>

                  <!-- Imagen -->
                  <div class="row">
                    <div class="col-md-8">
                      <h4>Imagen Principal (Tamaño mínimo: 1900 x 806 px)</h4>
                      <div class="image_area tamanio_imag_espacio">
                        <label for="upload_image">
                          <img src="img/imagen-espacio.png" id="uploaded_image" class="img-responsive" />
                          <div class="overlay">
                            <div class="text">Cambiar Imagen</div>
                          </div>
                          <input type="file" name="image" class="image" id="upload_image" style="display:none" />
                          <input type="hidden" name="imageNewRect" id="imageNewRect" value="nd">
                          <input type="hidden" name="tipo" id="tipo" value="1">
                        </label>
                      </div>
                    </div>
                  </div>

                  <div class="hr-line-dashed col-xs-12"></div>

                  <!-- Ícono -->
                  <div class="form-group col-xs-12">
                    <label for="icono">Ícono (55 x 55px)</label>
                    <input type="file" name="icono" id="icono" class="form-control form-file">
                  </div>
                  <div class="hr-line-dashed col-xs-12"></div>

                  <!-- Nombre texto gris -->
                  <div class="form-group col-xs-12">
                    <label for="nespaciogris">Nombre espacio gris</label>
                    <input type="file" name="nespaciogris" id="nespaciogris" class="form-control form-file">
                  </div>
                  <div class="hr-line-dashed col-xs-12"></div>

                  <!-- Nombre texto blanco -->
                  <div class="form-group col-xs-12">
                    <label for="nespacioblanco">Nombre espacio blanco</label>
                    <input type="file" name="nespacioblanco" id="nespacioblanco" class="form-control form-file">
                  </div>
                  <div class="hr-line-dashed col-xs-12"></div>

                  <!-- Nombre texto beige -->
                  <div class="form-group col-xs-12">
                    <label for="nespaciobeige">Nombre espacio beige</label>
                    <input type="file" name="nespaciobeige" id="nespaciobeige" class="form-control form-file">
                  </div>
                  <div class="hr-line-dashed col-xs-12"></div>

                  <!-- Plano -->
                  <div class="form-group col-xs-12">
                    <label for="plano">Plano</label>
                    <input type="file" name="plano" id="plano" class="form-control form-file">
                  </div>
                  <div class="hr-line-dashed col-xs-12"></div>

                  <!-- Avance -->
                  <div class="form-group col-xs-12">
                    <label for="avance">Avance</label>
                    <textarea name="avance" rows="6" id="avance"></textarea>
                  </div>
                  <div class="hr-line-dashed col-xs-12"></div>

                  <!-- Texto 1 -->
                  <div class="form-group col-xs-12">
                    <label for="texto1">Texto 1</label>
                    <textarea name="texto1" rows="6" id="texto1"></textarea>
                  </div>
                  <div class="hr-line-dashed col-xs-12"></div>

                  <!-- Texto 2 -->
                  <div class="form-group col-xs-12">
                    <label for="texto2">Texto 2</label>
                    <textarea name="texto2" rows="6" id="texto2"></textarea>
                  </div>
                  <div class="hr-line-dashed col-xs-12"></div>


                  <!-- Capacidad -->
                  <div class="form-group col-xs-12">
                    <label for="capacidad">Capacidad</label>
                    <input type="text" name="capacidad" id="capacidad" class="form-control">
                  </div>
                  <div class="hr-line-dashed col-xs-12"></div>

                  <!-- Notas relacionadas -->
                  <div class="form-group col-xs-12">
                    <label for="galeria">Galería Asociada</label>
                    <select name="galeria" class="select2_demo_3 form-control" id="galeria">

                      <option value="0"></option>
                      <?php
                      $queryPost = "SELECT * FROM elpunto_galerias";
                      $rsPost = $objContenido->getAllContenido($link, $queryPost);
                      ?>
                      <?php while ($arrPost = $rsPost->fetch(PDO::FETCH_BOTH)) { ?>
                        <option value="<?php echo $arrPost["gal_id"] ?>"><?php echo $arrPost["gal_nombre"] ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="hr-line-dashed col-xs-12"></div>

                  <div class="form-group col-xs-12">
                    <label for="hash">URL</label>
                    <input type="text" name="hash" id="hash" class="form-control">
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

  <script src="js/dropzone.js"></script>
  <script src="js/cropper.js"></script>

  <!-- iCheck -->
  <script src="js/plugins/iCheck/icheck.min.js"></script>

  <!--tag sugest -->
  <script src="js/jquery.amsify.suggestags.js"></script>

  <script src="js/custom.js?v=30"></script>
  <script>
    $(document).ready(function() {
      $('.i-checks').iCheck({
        checkboxClass: 'icheckbox_square-green',
        radioClass: 'iradio_square-green',
      });

      $('#data_1 .input-group.date').datepicker({
        format: "dd/mm/yyyy",
        autoclose: true
      });

      $("#nombre").blur(function() {
        var string = $("#nombre").val();
        string = string.toLowerCase();
        string = string.trim();
        //
        var stringfind = ["á", "é", "í", "ó", "ú", "Á", "É", "Í", "Ó", "Ú", "ä", "ë", "ï", "ö", "ü", "Ä", "Ë", "Ï", "Ö", "Ü", "¿", "?", "¡", "!", "º", "ª", "#", "$", "%", "&", "/", "(", ")", "[", "]", "{", "}", ",", ".", ":", ";", "-", "_", "*"];
        var stringreplace = ["a", "e", "i", "o", "u", "A", "E", "I", "O", "U", "a", "e", "i", "o", "u", "A", "E", "I", "O", "U", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ""];
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