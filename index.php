<?php
include_once('includes/classnew.inc.php');
include_once('includes/conexion.inc.php');
include_once('includes/funciones.inc.php');
//
$link = Conectarse();
//
$objContenido = new General();
$query = "SELECT * FROM feedback WHERE fd_publicado = 1 ORDER BY fd_posicion ASC";
$rsCont = $objContenido->getAllContenido($link, $query);
$intQtyRecords = $rsCont->rowCount();
//PATAGONIA
$query = "SELECT * FROM patagonia WHERE publicado = 1 ORDER BY id ASC";
$rsContPatagonia = $objContenido->getAllContenido($link, $query);
?>

<html lang="en">

<head>

    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-P5RNGHC');
    </script>
    <!-- End Google Tag Manager -->

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-Z8RRLD5284"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-Z8RRLD5284');
    </script>

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-11201163425"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'AW-11201163425');
    </script>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Argentina Top Hunts</title>
    <!-- Mete tags -->
    <meta content="Argentina Top Hunts" name="title" />
    <meta name="description" content="Dove and pigeon hunting and big game species available like red stag, axis  deer, water buffalo, black buck, mouflon sheep, four  horned sheep, wild boar.">
    <meta name="keywords" content="hunting,Argentina,experience,programe,dove,pigeon,lodge,small game,big game,fishing,Chischaca,Amakela,charity,program">
    <meta name="author" content="Sara Benedict - Aldo Iñiguez">
    <meta name="revisit-after" content="15 days">
    <meta name="robots" content="index follow">

    <!-- Facebook -->
    <meta property="og:title" content="Argentina Top Hunts">
    <meta property="og:type" content="website">
    <meta property="og:url" content="http://argentinatophunts.com">
    <meta property="og:image" content="http://argentinatophunts.com/assets/images/fb.jpg">
    <meta property="og:image:type" content="image/jpg">
    <meta property="og:image:width" content="500">
    <meta property="og:image:height" content="500">
    <meta property="og:description" content="Dove and pigeon hunting and big game species available like red stag, axis  deer, water buffalo, black buck, mouflon sheep, four  horned sheep, wild boar.">
    <!-- fin Facebook -->

    <!-- Favicon -->

    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
    <link rel="manifest" href="site.webmanifest">
    <link rel="mask-icon" href="safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">


    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!-- Font Awsome -->
    <link href="assets/fontawesome/css/all.css" rel="stylesheet">
    <!-- Fonts Custom -->
    <link href="assets/css/fonts.css?v=1" rel="stylesheet">
    <!-- Owl -->
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">

    <!-- Estilos Custom -->
    <link href="assets/css/estilos.css?v=14" rel="stylesheet">

    <meta name="facebook-domain-verification" content="d29tvw8q1bjhrakh88a2iepl063nbz" />

    <!-- Meta Pixel Code -->
    <script>
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '1075701056894279');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=1075701056894279&ev=PageView&noscript=1" /></noscript>
    <!-- End Meta Pixel Code -->


</head>

<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P5RNGHC" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <div id="html5Loader">
        <div class="loader">

            <div class="cargador">
                <div class="logo-carga1">

                </div>
                <div class="logo-carga2">

                </div>
                <div class="texto-carga">
                    LOADING...
                </div>

            </div>
        </div>
    </div>

    <!-- Modal para tomar datos de-email -->
    <div class="modal-g" style="display: none;" id="modalg">
        <div class="fondo-modal-black">
            <div class="modal-p">
                <div class="row">
                    <div id="cont1">
                        <div class="col-md-12 col-lg-7">
                            <h1>Tailor-made big game, dove,<br>and pigeon hunting experiences!</h1>
                            <p class="p1">Also, exclusive free range red stag<br>hunting in Patagonia awaits. </p>
                            <p class="p2">Get in touch for detailed info,<br>rates and available spots.</p>
                        </div>
                        <div class="col-md-12 col-lg-8">
                            <div class="row">
                                <div class="col-md-12">
                                    <form method="post" action="" enctype="multipart/form-data" id="commentForm" name="commentForm">
                                        <div class="row">
                                            <div class="col-8 col-sm-9" style="padding-right: 2px;">
                                                <label for="emailm"></label>
                                                <input type="text" placeholder="Enter your email" id="emailm" name="emailm">
                                            </div>
                                            <div class="col-3 col-sm-3" style="padding-left: 2px;">
                                                <button id="btemail" type="submit">submit</button>
                                            </div>
                                        </div>


                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="cont2" style="display: none;">
                        <p class="p2">We´ll be in touch!</p>
                    </div>

                    <div id="cont3" style="display: none;">
                        <p class="p2">Su e-mail no pudo ser enviado. Inténtelo mas tarde.</p>
                    </div>

                    <div id="cont4" style="display: none;">
                        <p class="p2">Su e-mail ya está registrado.</p>
                    </div>
                </div>
                <div class="exit" id="exit"></div>

            </div>
        </div>

    </div>




    <div class="contenedor-total">


        <!-- Top -->
        <section class="top" id="top">
            <div class="container">
                <div class="row">
                    <div class="col-5 col-sm-4 col-md-6 ">
                        <div class="logo">
                            <a href="<?php echo _CONST_DOMINIO_ ?>"><img src="assets/images/logo-blanco.svg" alt=""></a>
                        </div>

                        <div class="logo-reponsive">
                            <a href="<?php echo _CONST_DOMINIO_ ?>"><img src="assets/images/logo-small-white.svg" alt=""></a>
                        </div>

                    </div>

                    <div class="col-2 col-sm-4 movilg">
                        <div class="menu-hamb"><i class="fa-solid fa-bars fa-xl"></i></div>
                    </div>

                    <div class="col-5 col-sm-4 col-md-6 mail-top">
                        <div class="redes">
                            <a href="https://www.facebook.com/argentinatophunts" target="_blank"><i class="fa-brands fa-facebook-f fa-lg"></i></a>
                            <a href="https://www.instagram.com/argentinatophunts/" target="_blank"><i class="fa-brands fa-instagram fa-lg"></i></a>
                        </div>
                        <div class="email">
                            <a href="mailto:info@argentinatophunts.com">info@argentinatophunts.com</a>
                        </div>

                    </div>
                    <div class="col-5 col-sm-4 col-md-6 mail-top-resp">
                        <a href="mailto:info@argentinatophunts.com"><i class="fa-regular fa-envelope fa-lg"></i></a>
                        <a href="https://www.facebook.com/argentinatophunts" target="_blank"><i class="fa-brands fa-facebook-f fa-lg"></i></a>
                        <a href="https://www.instagram.com/argentinatophunts/" target="_blank"><i class="fa-brands fa-instagram fa-lg"></i></a>
                    </div>
                </div>
            </div>
        </section>
        <!-- Fi Top -->

        <!-- Top2 -->
        <section class="top2" id="top2">
            <div class="container">
                <div class="row">
                    <div class="col-5">

                        <div class="logo">
                            <a href="<?php echo _CONST_DOMINIO_ ?>"><img src="assets/images/logo-small-green.svg" alt=""></a>
                        </div>
                    </div>
                    <div class="col-2  movilg">
                        <div class="menu-hamb"><i class="fa-solid fa-bars fa-xl"></i></div>
                    </div>
                    <div class="col-5 mail-top">
                        <ul>
                            <li class="mm nomovil"><a href="mailto:info@argentinatophunts.com">info@argentinatophunts.com</a></li>
                            <li class="movil"><a href="mailto:info@argentinatophunts.com"><i class="fa-regular fa-envelope fa-lg"></i></a></li>
                            <li><a href="https://www.facebook.com/argentinatophunts" target="_blank"><i class="fa-brands fa-facebook-f fa-lg"></i></a></li>
                            <li><a href="https://www.instagram.com/argentinatophunts/" target="_blank"><i class="fa-brands fa-instagram fa-lg"></i></a></li>
                        </ul>

                    </div>
                </div>
            </div>
        </section>
        <!-- Fin Top -->
        <!-- Responsive -->
        <div class="menu" id="menu">
            <ul>
                <li id="btb-0">WHO WE ARE</li>
                <li id="btb-1">OUR LODGES</li>
                <li id="nbtb-1" style="padding: 10px 0px 10px 0px;">OUR LODGES
                    <ul style="margin-top: 10px;margin-bottom: 10px;display:none" id="menulodges">
                        <li style="border-bottom: 0px;padding: 5px;"><a href="<?php echo _CONST_DOMINIO_ ?>amakela" style="text-decoration: none;font-size: 0.85rem;color:#384f40">AMAKELA</a></li>
                        <li style="border-bottom: 0px;padding: 5px 5px 0px 5px;"><a href="<?php echo _CONST_DOMINIO_ ?>chischaca" style="text-decoration: none;font-size: 0.85rem;color:#384f40">CHISCHACA</a></li>
                    </ul>
                </li>
                <li id="btb-4">PATAGONIA</li>
                <li id="btb-2">WHY HUNT WITH US</li>
                <li id="btb-3">OUR CHARITY PROGRAM</li>
            </ul>
        </div>

        <!-- Seccion 1 -->
        <section class="seccion1">


            <div class="videocont">
                <div class="videohome">
                    <video autoplay muted playsinline loop poster="assets/video/home.jpg" id="videovid">
                        <source src="assets/video/home.mp4" type="video/mp4">
                    </video>
                </div>
            </div>





            <div class="menu-full">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <ul>
                                <li id="bt-0">WHO WE ARE</li><li id="bt-1">OUR LODGES</li><li id="bt-4">PATAGONIA</li><li id="bt-2">WHY HUNT WITH US</li><li id="bt-3">OUR CHARITY PROGRAM</li>
                            </ul>
                        </div>
                    </div>
                </div>

        </section>
        <!-- Fin Seccion 1 -->

        <!-- WHO WE ARE -->
        <section class="seccion2" id="wwa">

            <div class="container bloque1">
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <h1>WHO WE ARE</h1>
                        <p class="text-center pb-3">ARGENTINA TOP HUNTS is the result of my cultivated love for hunting, the many years of experience developing my career in the hunting world and the professionalism of the team I work with.</p>
                        <p class="text-center">We own and operate Chischaca Lodge -big game- and Amakela Lodge -small and big game-. Both lodges are situated in the backcountry, allowing for a new way of traveling, with the best hunting conditions, away from the city and in-depth contact with nature.</p>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 p-0 heigth100">
                        <div class="imagenb"></div>
                    </div>
                    <div class="col-lg-6 p-0">
                        <div class="bloque2 " id="anim1">

                            <h2>OUR STORY</h2>
                            <p>"I proudly come from a family of hunters. A passion I inherited from my father, that has become part of me and which I continue to live with the same excitement since my first hunting trips with my father and brothers.</p>
                            <p>All this is added to the know-how of over 20 years of experience leading teams in different hunting areas of Argentina in order to provide the best for hunters.</p>
                            <p>In Argentina Top Hunts we are known for being the best hosts and for building friendships with our hunters, we always hope they are able to come back and that the following season finds us together again.</p>
                            <p>Come, hunt with us".</p>
                            <p><strong>Federico C. Clausen</strong>, CEO & Owner </p>


                        </div>
                    </div>

                </div>

            </div>
        </section>
        <!-- FIN WHO WE ARE -->
        <!-- VIDEO -->
        <section class="seccion2video" id="video">
            <video controls width="100%" height="auto" id="video3" poster="assets/video/bosque.jpg">
                <source src="assets/video/video3.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </section>

        <!-- VIDEO -->

        <!-- SLIDER -->
        <section class="seccion3">

            <div class="bloque1">
                <div class="owl-carousel owl2">

                    <div class="item slider1" style="background-image: url('assets/slides/slide01.jpg');">

                    </div>

                    <div class="item slider2" style="background-image: url('assets/slides/slide02.jpg');">

                    </div>

                    <div class="item slider3" style="background-image: url('assets/slides/slide03.jpg');">

                    </div>

                </div>

            </div>

            <div class="bloque2">
                <p style="margin-top: auto">Our hospitality experience distinguishes us by creating an atmosphere in which guests<br>feel at home whilst enjoying the experience of being in a unique and well-cared-for place.</p>

                <div class="navegador-slide">
                    <div class="linea"></div>
                    <div class="linea2"></div>
                    <!--<ul>
            <li>
              <div class="bts nn-item nn-item-activo" id="b-0"></div>
            </li>
            <li>
              <div class="bts nn-item" id="b-1"></div>
            </li>
            <li>
              <div class="bts nn-item" id="b-2"></div>
            </li>

          </ul>-->
                </div>
            </div>


        </section>
        <!-- FIN SLIDER -->

        <!-- LODGES -->
        <section class="seccion4" id="ol">

            <div class="container-fluid">
                <div class="row l1">

                    <div class="col-md-6 l2 p-0">
                        <div class="imagenchic">
                            <div class="texto">
                                <h2>Big game</h2>
                                <h1>chischaca lodge</h1>
                                <div class="redmore2">
                                    <div class="link"><a href="<?php echo _CONST_DOMINIO_ ?>chischaca">read more</a> </div>
                                </div>
                            </div>

                            <div class="lineas">

                            </div>

                        </div>
                    </div>

                    <div class="col-md-6 l2 p-0">
                        <div class="imagenamakela">
                            <div class="texto">
                                <h2>small game & Big game</h2>
                                <h1>amakela lodge</h1>
                                <div class="redmore2">
                                    <div class="link"><a href="<?php echo _CONST_DOMINIO_ ?>amakela">read more</a> </div>

                                </div>
                            </div>

                            <div class="lineas">

                            </div>

                        </div>
                    </div>

                </div>
            </div>


        </section>
        <!-- FIN LODGES -->

        <!-- PATAGONIA  -->
        <section class="seccion14" id="pat">

            <div class="bloque1">
                <div class="owl-carousel owl3">

                    <div class="item slider1" style="background-image: url('assets/slides/foto-fondo-01.jpg');">

                    </div>

                    <div class="item slider2" style="background-image: url('assets/slides/foto-fondo-02.jpg');">

                    </div>

                </div>

            </div>




            <div class="container" style="position: relative;z-index:200;">

                <div class="row">
                    <div class="col-12">
                        <p class="cintillo">PILOLIL LODGE</p>
                        <h1>Your ultimate free-range red stag<br>hunting experience in PATAGONIA.</h1>
                    </div>

                    <div class="col-12 col-md-6 col-lg-5 offset-lg-1 separacioncolumna">
                        <p class="texto txt-bold">At PILOLIL Lodge, across 24,700 acres of pure Patagonian landscape, you’ll discover natural habitats where powerful free-range red stags roam freely in the hunting season from mid-March to mid-April.</p>
                    </div>

                    <div class="col-12 col-md-6 col-lg-5">
                        <p class="texto txt-bold separacionparrafo">Open spots for the 2026 and 2027 Seasons</p>
                        <p class="texto separacionparrafo">You can also enjoy world-class fly fishing and outdoor adventures like horseback riding and trekking. Every experience is fully tailor-made.</p>
                        <p class="texto-contacto"> <a href="mailto:info@argentinatophunts.com">Contact us anytime for more information!</a></p>

                        <div class="redmore">
                            <div class="linea"></div>
                            <div class="link"><a href="#" id="readpatagonia">read more</a> </div>
                        </div>

                        <ul class="ulpdfpatagonia">
                            <?php while ($arrContenidoPatagonia = $rsContPatagonia->fetch(PDO::FETCH_BOTH)) { ?>
                                <li><a href="assets/files/<?php echo $arrContenidoPatagonia["pdf"] ?>" target="_blank"><?php echo $arrContenidoPatagonia["titulo"] ?></a> </li>
                            <?php } ?>
                        </ul>

                    </div>

                </div>
            </div>

        </section>

        <!-- FIN PATAGONIA -->

        <!-- CHISCHACA -->
        <section class="seccion5 background-chischaca ">
            <div class="contenedor-ciervo">



                <div class="container-fluid anim2">
                    <div class="row">

                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-lg-6 p-0">
                                    <div class="lodge-chis">
                                    </div>
                                </div>

                                <div class="col-lg-6 p-0 ">
                                    <div class="info" id="infochis">
                                        <div class="titulo">
                                            <h2>A memorable BIG GAME experience</h2>
                                            <h1 class="h1linea">CHISCHACA LODGE</h1>
                                            <p class="frasedebajo">World-class red stag hunting</p>
                                        </div>

                                        <div class="texto">
                                            <p>Big game</p>
                                            <p>SEASON <span class="small">March through July</span></p>
                                            <p>TARGET SPECIES <span class="small">Red stag, fallow deer, axis deer, water buffalo, black buck, mouflon sheep, four horned sheep, wild boar</span></p>
                                            <p>HUNTING METHOD <span class="small">Stalk or blind</span></p>
                                        </div>

                                        <div class="redmore">
                                            <div class="linea"></div>
                                            <div class="link"><a href="<?php echo _CONST_DOMINIO_ ?>chischaca">read more</a> </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 anim3">
                            <div class="row">
                                <div class="col-md-4 p-0">
                                    <div class="imagen-dec" style="background-image: url('assets/images/chischaca/imagen02.jpg');" id="imgdec1">

                                    </div>
                                </div>

                                <div class="col-md-4 p-0">
                                    <div class="imagen-dec" style="background-image: url('assets/images/chischaca/imagen03.jpg');" id="imgdec2">

                                    </div>
                                </div>

                                <div class="col-md-4 p-0">
                                    <div class="imagen-dec" style="background-image: url('assets/images/chischaca/imagen04.jpg');" id="imgdec3">

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
        </section>
        <!-- FIN CHISCHACA -->

        <!-- AMAKELA -->
        <section class="seccion5 fondo-left-amakela">
            <div class="animales">

                <div class="container-fluid anim4">
                    <div class="row">

                        <div class="col-md-12">

                            <div class="row">

                                <div class="col-lg-6 p-0 ">
                                    <div class="info infomod" id="infoamak">
                                        <div class="titulo2">
                                            <h2>A memorable HUNTING experience</h2>
                                            <h1 class="h1linea">AMAKELA LODGE</h1>
                                            <p class="frasedebajo">Outstanding pigeon hunting and high-volume dove hunting</p>
                                        </div>

                                        <div class="texto">


                                            <p>Small game & Big game</p>
                                            <p>SEASON <span class="small">Mid February through mid November</span></p>
                                            <p>TARGET SPECIES <span class="small">Doves, pigeons and big game</span></p>
                                            <p>HUNTING METHOD <span class="small">Stalk or blind</span></p>
                                        </div>

                                        <div class="redmore">
                                            <div class="linea"></div>
                                            <div class="link"><a href="<?php echo _CONST_DOMINIO_ ?>amakela">read more</a> </div>

                                        </div>

                                    </div>

                                </div>

                                <div class="col-lg-6 p-0">
                                    <div class="lodge-amak">

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 anim5">
                            <div class="row">
                                <div class="col-md-4 p-0">
                                    <div class="imagen-dec2" style="background-image: url('assets/images/amakela/imag02.jpg');">

                                    </div>
                                </div>

                                <div class="col-md-4 p-0">
                                    <div class="imagen-dec2" style="background-image: url('assets/images/amakela/imag03.jpg');">

                                    </div>
                                </div>

                                <div class="col-md-4 p-0">
                                    <div class="imagen-dec2" style="background-image: url('assets/images/amakela/imag04.jpg');">

                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>

                </div>
        </section>
        <!-- FIN AMAKELA -->

        <!-- HUNT WHIT US -->
        <section class="seccion6" id="whwu">

            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-6 offset-md-3 col-lg-6 offset-lg-3">
                        <h1>WHY HUNT WITH US</h1>
                        <p>We are passionate about and fully committed to accompanying you in a unique hunting experience. We relish every day of hunting with the hunters, we want you to take the best trophy you can get, we want you to beat your hunting records.</p>
                        <!--<p>We are known for being the best hosts and making friends with our hunters, we always hope they are able to come back and that the next season finds us</p>-->
                    </div>

                </div>
            </div>

        </section>
        <!-- FIN WHIT US -->

        <!-- COMENTARIOS -->
        <section class="seccion12">
            <div class="container">

                <div class="row">
                    <div class="col-2 flechaizq" id="fizq">
                        <img src="assets/images/flecha-izq.png" alt="">
                    </div>

                    <div class="col-8">

                        <div class="row">

                            <div class="col-12">
                                <h1>WHAT OUR HUNTERS THINK ABOUT US</h1>
                            </div>
                            <div class="col-12 comillas">
                                <img src="assets/images/comillas.png" alt="" class="img-fluid">
                            </div>


                            <div class="col-12">
                                <?php
                                $contador = ceil($intQtyRecords / 2);
                                $contadorInicial = ceil($intQtyRecords / 2);
                                ?>

                                <div class="owl-carousel owl1">
                                    <?php while ($arrContenido = $rsCont->fetch(PDO::FETCH_BOTH)) { ?>
                                        <div class="item ">
                                            <div class="comentario">
                                                <?php echo $arrContenido["fd_texto"] ?>
                                            </div>
                                            <div class="nombre">
                                                <?php echo $arrContenido["fd_nombre"] ?>
                                            </div>
                                        </div>
                                    <?php } ?>

                                </div>

                            </div>


                        </div>

                    </div>


                    <div class="col-2 flechader" id="fder">
                        <img src="assets/images/flecha-der.png" alt="">
                    </div>


                </div>



            </div>
        </section>

        <!-- FIN COMENTARIOS -->

        <!-- MAIN SPONSORS -->
        <section class="seccion13">

            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>MAIN <span class="orange">SPONSORS</span></h1>
                    </div>

                    <div class="col-12 ">
                        <div class="row">
                            <div class="col-6 offset-0 col-sm-2 offset-sm-1 logo-sponsor">
                                <img src="assets/images/01-logo-sci.png" alt="SCI - First for hunters" class="img-fluid">
                            </div>

                            <div class="col-6 col-sm-2 logo-sponsor">
                                <img src="assets/images/02-logo-texas.png" alt="SCI - First for hunters" class="img-fluid">
                            </div>

                            <div class="col-6 col-sm-2 logo-sponsor">
                                <img src="assets/images/03-talley.png" alt="SCI - First for hunters" class="img-fluid">
                            </div>

                            <div class="col-6 col-sm-2 logo-sponsor">
                                <img src="assets/images/04-swarosky.png" alt="SCI - First for hunters" class="img-fluid">
                            </div>

                            <div class="col-6 col-sm-2 logo-sponsor">
                                <img src="assets/images/05-fotografo.png" alt="SCI - First for hunters" class="img-fluid">
                            </div>



                        </div>
                    </div>

                </div>

            </div>
        </section>
        <!-- FIN MAIN SPONSORS -->

        <!-- HUNT INFORMATION -->
        <section class="seccion7">
            <div class="bloque">
                <div class="container">
                    <div class="row">

                        <div class="col-md-12">
                            <h1>HUNTING INFORMATION</h1>
                        </div>

                        <div class="col-md-8">

                            <div class="bloque2">
                                <h2>Can I bring my own gun?</h2>
                                <p>Yes, you can. If this is your first time travelling to Argentina, no prior formalities are required.</p>
                                <p>However, if you have previously travelled to Argentina with your own firearms, you must visit an Argentine consulate in the USA -New York, Chicago, Atlanta, Houston, Los Angeles, Miami- to request a temporary permit for them before your trip.</p>
                            </div>

                            <!--<div class="bloque2">
                                <h2>What type of guns do you have for rent?</h2>
                                <p>We have fine guns in different calibers:</p>
                                <p>-<strong>Chischaca</strong>: 30-06, 300 WM and 375 H&H, all with Swarovski scopes.</p>
                                <p>-<strong>Amakela</strong>: 30-06, 300 WM and 375 H&H, with prime scopes and shootguns caliber 12, 20, 28 Beretta and Benelli brands.</p>
                            </div>-->

                            <div class="bloque2">
                                <h2>Is it possible to bow hunt?</h2>
                                <p>Yes, there is a lot of cover appropriate for a close stalking and blinds prepared for bow.</p>
                            </div>

                            <div class="rates">
                                <h3>FOR RATES AND INFORMATION</h3>
                                <h4>CONTACT US</h4>
                                <a href="mailto:info@argentinatophunts.com">info@argentinatophunts.com</a>

                            </div>


                        </div>
                    </div>
                </div>
            </div>


        </section>
        <!-- FIN HUNT INFORMATION -->


        <!-- CHARITI PROGRAM -->
        <section class="seccion8" id="chp">

            <div class="container">
                <div class="contendor">
                    <h1>CHARITY PROGRAM</h1>
                    <div class="row ">
                        <div class="col-md-6">

                            <div class="bloque">
                                <p>ATH offers big game hunting packages to be actioned at a fundraiser.</p>
                            </div>

                            <div class="bloque-orange">
                                <p>THE DONATION PACKAGE INCLUDES</p>
                                <p>5-days 2x1 guided BIG GAME HUNTING EXPERIENCE in Argentina for 2 o 4 hunters for open dates between March and August 2026, 2027 and 2028</p>

                            </div>

                        </div>

                        <div class="col-md-6">



                            <div class="bloque">
                                <p>This is a 100% donation. Once a donation is sold at a fundraiser we will take care of the whole process, contacting the bidder and planning the trip.</p>
                            </div>

                            <div class="bloque">
                                <p><strong>If you’re a charity or nonprofit looking for silent auction ideas or you want more information about the program please contact us! info@argentinatophunts.com</astrong>
                                </p>
                            </div>


                            <div class="bloque">
                                <div class="clic1">
                                    <p>For further information please <a href="<?php echo _CONST_DOMINIO_ ?>charity-program">CLICK HERE</a> </p>
                                </div>

                                <div class="clic2">
                                    <p>For further information please </p>
                                    <p style="margin-top: 20px;"><a href="<?php echo _CONST_DOMINIO_ ?>charity-program">CLICK HERE</a></p>
                                </div>

                            </div>

                        </div>

                    </div>



                    <!--<div class="ram">
          <img src="assets/images/ram.png" alt="">
        </div>-->

                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="pie">
                            <h3>Terms & Conditions</h3>
                            <p>This Argentina big game hunting trip is valid for two (2) or four (4) hunters for the 2026, 2027 and 2028 season. A minimum of two hunters is required. Each hunter must harvest a minimum of two animals including one (1) red stag or one (1) water buffalo. Trophy fees are not included. Additional trophy animals may be taken per the current trophy fee price list. Non-hunting observers may be added per price sheet. Non-hunters are welcome but may not take the place of hunters in this donation package. Additional hunters may be added per the current price list. Each hunter will be required to submit a $2,000 deposit to reserve their hunting dates. The deposit goes 100% towards their trophy fee bill at the end of the hunt. The credit is non-refundable. The donation is transferable to a friend or family member. Dates must be selected within 45 days of winning the auction. Trip might be rescheduled within the dates detailed in the donation. The purchaser of this auction agrees to the terms & conditions of ATH.</p>

                        </div>

                    </div>
                </div>

            </div>


        </section>
        <!-- FIN CHARITI PROGRAM -->

        <!-- IMAGENES-->
        <section class="seccion9">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4 p-0">
                        <div class="imagen-dec3" style="background-image: url('assets/images/foto1-sep.jpg');" id="imgdec3"></div>
                    </div>

                    <div class="col-md-4 p-0">
                        <div class="imagen-dec3" style="background-image: url('assets/images/foto2-sep.jpg');" id="imgdec3"></div>
                    </div>

                    <div class="col-md-4 p-0">
                        <div class="imagen-dec3" style="background-image: url('assets/images/foto3-sep.jpg');" id="imgdec3"></div>
                    </div>
                </div>
            </div>

        </section>
        <!-- FIN IMAGENES -->


        <!-- CONTACTO -->
        <section class="seccion10">
            <div class="halfbloque1">
                <div class="container-fluid">

                    <div class="col-lg-10 offset-lg-2 col-xl-7 offset-xl-5">
                        <h1>CONTACT</h1>
                        <h2>CONCIERGE SERVICES</h2>
                        <p>We make tailored packages for each hunting group.</p>
                        <p>We can organize all the services you desire from your arrival until your departure from the country. These services include:</p>
                        <ul>
                            <li>Domestic flights roundtrip to the lodges</li>
                            <li>Ground transfers roundtrip the airports</li>
                            <li>Hotels in Buenos Aires, restaurant reservations, private guide tours, shopping tours, tango shows</li>
                            <li>3/4 day trip anywhere in Argentina</li>
                        </ul>
                        <p><strong>If you have any questions or want to get in touch with us, don’t hesitate to contact us!</strong></p>
                        <div class="logo-footer">
                            <img src="assets/images/logo-footer.svg" alt="" class="logo-footer-vec">
                        </div>
                        <div class="bloque-contacto border-contacto">
                            <div class="info">
                                <p class="nombre">Federico C. Clausen</p>
                                <p class="cargo">CEO & Founder</p>
                                <a href="mailto:federico@argentinatophunts.com">federico@argentinatophunts.com</a>
                            </div>
                        </div>

                        <div class="bloque-contacto ">
                            <div class="info">
                                <p class="nombre">Cecilia Clausen</p>
                                <p class="cargo">Sales Department & Concierge Services</p>
                                <a href="mailto:info@argentinatophunts.com">info@argentinatophunts.com</a>
                            </div>
                        </div>

                        <div class="redes-footer">

                            <div class="redes2">
                                <a href="https://www.facebook.com/argentinatophunts" target="_blank"><i class="fa-brands fa-facebook-f fa-2x"></i></a>
                                <a href="https://www.instagram.com/argentinatophunts/" target="_blank"><i class="fa-brands fa-instagram fa-2x"></i></a>
                            </div>

                            <a href="http://www.argentinatophunts.com">www.argentinatophunts.com</a>
                            <div class="redes">
                                <a href="https://www.facebook.com/argentinatophunts" target="_blank"><i class="fa-brands fa-facebook-f fa-2x"></i></a>
                                <a href="https://www.instagram.com/argentinatophunts/" target="_blank"><i class="fa-brands fa-instagram fa-2x"></i></a>
                            </div>
                        </div>

                    </div>
                </div>

            </div>


            <div class="halfbloque2">

            </div>

        </section>
        <!-- FIN CONTACTO -->

        <!-- CONTACTO -->
        <!--
        <section class="seccion11">
            <div class="container">
                <div class="row">


                    <div class="col-md-6 col-lg-6 text-start">
                        <img src="assets/images/logo-fot.jpg" alt="">
                    </div>
                </div>
            </div>
        </section>
                                    -->

    </div>




    <!-- Bootstrap core JavaScript
  ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="assets/js/bootstrap.js"></script>

    <!-- ==ScrollTo== -->
    <script src="assets/js/jquery.scrollTo.js"></script>

    <!-- ==Owl== -->
    <script src="assets/js/owl.carousel.js"></script>

    <!-- Preloader -->
    <script src="assets/js/animations/jquery.html5Loader.line.js"></script>
    <script src="assets/js/jquery.html5Loader.js"></script>

    <!-- Easing -->
    <script src="assets/js/jquery.easing.1.3.js"></script>

    <!-- Scrollmagic -->
    <script type="text/javascript" src="assets/js/greensock/TweenMax.min.js"></script>
    <script type="text/javascript" src="assets/js/ScrollMagic.js"></script>
    <script type="text/javascript" src="assets/js/plugins/animation.gsap.js"></script>
    <script type="text/javascript" src="assets/js/plugins/debug.addIndicators.js"></script>

    <!-- ==Validate== -->
    <script src="assets/js/jquery.validate.js"></script>

    <!-- Custom -->
    <script src="assets/js/scripts.js?v=20"></script>

    <script>
        var pesActiva = 0;
        var itActive = 0;
        $(document).ready(function() {

            /* z-index novedad inical */
            $("#img-bl-hom-1").css("z-index", "200");

            var owl = $(".owl2").owlCarousel({
                items: 1,
                autoplay: true,
                loop: true,
                nav: false,
                autoplayTimeout: 6000,
                animateOut: 'fadeOut',
                animateIn: 'fadeIn',
                dots: false,
            });

            var owl1 = $(".owl1").owlCarousel({
                items: 1,
                autoplay: true,
                loop: true,
                nav: false,
                autoplayTimeout: 12000,
                autoplaySpeed: 600,
                dots: false,
            });

            $('#fizq').click(function() {
                owl1.trigger('prev.owl.carousel', [600]);
            })

            $('#fder').click(function() {
                owl1.trigger('next.owl.carousel', [600]);
            })
            // Go to the previous item


            var owl3 = $(".owl3").owlCarousel({
                items: 1,
                autoplay: true,
                loop: true,
                nav: false,
                autoplayTimeout: 6000,
                animateOut: 'fadeOut',
                animateIn: 'fadeIn',
                dots: false,
            });


            $('#exit').click(function() {
                $("#modalg").hide();
            })


            let redMorePatagonia = document.getElementById("readpatagonia");

            redMorePatagonia.addEventListener("click", function(e) {
                e.preventDefault();
                let ulPdfPatagonia = document.querySelector(".ulpdfpatagonia");
                /*
                if (ulPdfPatagonia.style.display === "inline-block") {
                    ulPdfPatagonia.style.display = "none";
                } else {
                    ulPdfPatagonia.style.display = "inline-block";
                }*/
                ulPdfPatagonia.classList.toggle("ulpdfpatagoniashow");
            });


        });

        $("#commentForm").validate({
            rules: {
                emailm: {
                    required: true,
                    email: true
                }
            },
            messages: {

                emailm: {
                    required: " Campo Obligatorio",
                    email: " Ingrese una dirección válida"
                }
            },
            submitHandler: function(form) {

                var formData = new FormData($("#commentForm")[0]);

                $.ajax({
                    url: 'envio.php',
                    type: 'POST',
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        if (data == "enviado") {

                            $("#emailm").val("");
                            $("#cont1").hide();
                            $("#cont2").show();
                            $("#cont3").hide();
                            $("#cont4").hide();

                        } else if (data == "noenviado") {
                            $("#emailm").val("");
                            $("#cont1").hide();
                            $("#cont2").hide();
                            $("#cont3").show();
                            $("#cont4").hide();
                        } else if (data == "repetido") {
                            $("#emailm").val("");
                            $("#cont1").hide();
                            $("#cont2").hide();
                            $("#cont3").hide();
                            $("#cont4").show();
                        }
                    }
                });
            }

        });
    </script>


</body>

</html>