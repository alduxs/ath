<?php
include_once('includes/classnew.inc.php');
include_once('includes/conexion.inc.php');
include_once('includes/funciones.inc.php');
//
$link = Conectarse();
//
$objContenido = new General();
$arrData = [['value' => 1, 'tipo' => 'NU']];
$query = "SELECT * FROM galeriasgximag WHERE gxi_galeriag_id = ? ORDER BY gxi_orden ASC, gxi_id ASC";
$rsImag = $objContenido->getOneContenido($link, $arrData, $query);
$intQtyRecords = $rsImag->rowCount();
?>
<!doctype html>
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

    <title>Amakela Lodge | Argentina Top Hunts</title>
    <!-- Mete tags -->
    <meta content="Amakela Lodge | Argentina Top Hunts" name="title" />
    <meta name="description" content="Dove and pigeon hunting and big game species available like red stag, axis  deer, water buffalo, black buck, mouflon sheep, four  horned sheep, wild boar.">
    <meta name="keywords" content="hunting,Argentina,experience,programe,dove,pigeon,lodge,small game,big game,fishing,Chischaca,Amakela,charity,program">
    <meta name="author" content="Sara Benedict - Aldo Iñiguez">
    <meta name="revisit-after" content="15 days">
    <meta name="robots" content="index follow">

    <!-- Facebook -->
    <meta property="og:title" content="Amakela Lodge | Argentina Top Hunts">
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
    <link href="assets/css/amakela.css?v=5" rel="stylesheet">

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
    <div class="contenedor-total">
        <!-- Top -->
        <section class="top">
            <div class="container">
                <div class="row">
                    <div class="col-5  col-lg-5">
                        <a href="<?php echo _CONST_DOMINIO_ ?>"><img src="assets/images/logo-small-green.svg" alt="" class="logo-small-gren"></a>
                    </div>
                    <div class="col-2 col-lg-2 movilg">
                        <div class="menu-hamb"><i class="fa-solid fa-bars fa-xl"></i></div>
                    </div>
                    <div class="col-5  col-lg-5 mail-top">
                        <ul>
                            <li class="nomovil"><a href="mailto:info@argentinatophunts.com">info@argentinatophunts.com</a></li>
                            <li class="movil"><a href="mailto:info@argentinatophunts.com"><i class="fa-regular fa-envelope fa-lg"></i></a></li>
                            <li><a href="https://www.facebook.com/argentinatophunts" target="_blank"><i class="fa-brands fa-facebook-f fa-lg"></i></a></li>
                            <li><a href="https://www.instagram.com/argentinatophunts/" target="_blank"><i class="fa-brands fa-instagram fa-lg"></i></a></li>
                        </ul>

                    </div>
                </div>
            </div>
        </section>
        <!-- Fin Top -->

        <div class="menu" id="menu">
            <ul>
                <li><a href="<?php echo _CONST_DOMINIO_ ?>#wwa">WHO WE ARE</a></li>
                <li id="btb-11"><a href="<?php echo _CONST_DOMINIO_ ?>#ol" >OUR LODGES</a></li>

                <li id="nbtb-1" style="padding: 10px 0px 10px 0px;">OUR LODGES
                    <ul style="margin-top: 10px;margin-bottom: 10px;display:none" id="menulodges">
                        <li style="border-bottom: 0px;padding: 5px;"><a href="<?php echo _CONST_DOMINIO_ ?>amakela" style="text-decoration: none;font-size: 0.85rem;color:#384f40">AMAKELA</a></li>
                        <li style="border-bottom: 0px;padding: 5px 5px 0px 5px;"><a href="<?php echo _CONST_DOMINIO_ ?>chischaca" style="text-decoration: none;font-size: 0.85rem;color:#384f40">CHISCHACA</a></li>
                    </ul>
                </li>
                <li><a href="<?php echo _CONST_DOMINIO_ ?>#whwu">WHY HUNT WITH US</a></li>
                <li><a href="<?php echo _CONST_DOMINIO_ ?>#chp">OUR CHARITY PROGRAM</a></li>
            </ul>
        </div>

        <!-- WHO WE ARE -->
        <section class="seccion2">

            <div class="container bloque1">
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <h2>Small game & Big game</h2>
                        <h1>AMAKELA LODGE</h1>

                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 p-0 heigth100">
                        <div class="imagenb"></div>
                    </div>
                    <div class="col-md-6 p-0">

                        <div class="info">


                            <div class="texto">
                                <p>SEASON <span class="small">Mid February through mid November</span></p>
                                <p>TARGET SPECIES <span class="small">Doves, pigeons and big game.</span></p>
                                <p>HUNTING METHOD <span class="small">Stalk or blind</span></p>
                                <p>ACCOMMODATION AND SERVICES<br>
                                    <span class="small">Accommodation: 10 comfortable ensuite rooms, capacity up to 20 people.</span><br>
                                    <span class="small">Pickup trucks transfers according with itinerary.</span><br>
                                    <span class="small">Gourmet experience and beverages during the stay at the lodge.</span><br>
                                    <span class="small">Wi-Fi internet access.</span><br>
                                    <span class="small">Professional guides and field assistants.</span><br>
                                    <span class="small">Gun rental.</span><br>
                                    <span class="small">Skinning and first care of the trophies.</span><br>
                                </p>
                            </div>

                            <div class="redmore">
                                <div class="linea"></div>
                                <div class="link"><a href="http://amakelalodge.com/" target="_blank">go to website</a> </div>
                            </div>


                        </div>
                    </div>

                </div>

            </div>
        </section>
        <!-- FIN WHO WE ARE -->

         <!-- VIDEO -->
         <section class="seccion2video" id="video">
            <video controls loop width="100%" height="auto" id="video3" poster="assets/video/amakela.jpg">
                <source src="assets/video/amakelaok.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </section>

        <!-- VIDEO -->

        <!-- COMENTARIOS -->
         <?php if($intQtyRecords > 0){?>
        <section class="seccion12" style="overflow: hidden;position:relative">
            <div class="container-fluid" style="padding: 0px;">

                <div class="row">
                    <div class="flechaizq-gal" id="fizq">
                        <img src="assets/images/flecha-izq.png" alt="">
                    </div>
                    <div class="col-12">
                        <div class="owl-carousel owl1">
                            <?php while ($arrImagen = $rsImag->fetch(PDO::FETCH_BOTH)) { ?>
                                <div class="item ">
                                    <img src="assets/galerias/small/<?php echo $arrImagen["gxi_imagen"]; ?>" alt="">

                                </div>
                            <?php } ?>
                        </div>
                    </div>

                    <div class="flechader-gal" id="fder">
                        <img src="assets/images/flecha-der.png" alt="">
                    </div>


                </div>



            </div>
        </section>
        <?php } ?>


        <!-- SLIDER -->
        <section class="seccion3">

            <div class="bloque1">
                <h1>LOCATION</h1>
                <div class="mapa1"></div>
                <div class="mapa2"></div>
                <div class="mapa3"></div>
            </div>

            <div class="bloque2">
                <h1>LOCATION</h1>
                <div class="maparep"> <img src="assets/images/amakela/page/mapa-resp.png" alt=""> </div>
            </div>


        </section>
        <!-- FIN SLIDER -->



        <!-- LODGES -->
        <section class="seccion4">

            <div class="container-fluid">
                <div class="row cuadricula-g">

                    <div class="col-md-12 col-lg-6">
                        <div class="row cuadricula-int">
                            <div class="col-md-12 col-lg-12 p-0" style="background-image: url('assets/images/amakela/page/lodge02.jpg');background-repeat:no-repeat;background-size:cover;background-position:center;">
                            </div>
                            <div class="col-md-12 col-lg-12 p-0" style="background-image: url('assets/images/amakela/page/lodge03.jpg');background-repeat:no-repeat;background-size:cover;background-position:center top;">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 col-lg-6 p-0" style="background-image: url('assets/images/amakela/page/lodge04.jpg');background-repeat:no-repeat;background-size:cover;background-position:center bottom;">

                    </div>

                </div>
            </div>


        </section>
        <!-- FIN LODGES -->



        <!-- HUNT INFORMATION -->
        <section class="seccion7">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-4 plato">

                        <div class="plato-g">
                            <div class="plato1" style="background-image: url('assets/images/amakela/page/plato.png');background-repeat:no-repeat;background-position:center;"></div>
                            <div class="plato2" style="background-image: url('assets/images/amakela/page/plato02.png');background-repeat:no-repeat;background-position:center;"></div>
                        </div>


                    </div>

                    <div class="col-md-4">
                        <div class="bloquet">
                            <h1>OUR CHEFS</h1>
                            <p>Our chefs create delicious flavors and varied textures that harbor hidden stories and package traditions on each plate like our Argentinian asados and our famed beef.</p>
                        </div>


                    </div>
                    <div class="col-md-4 chef" style="background-image: url('assets/images/amakela/page/chef2.jpg');background-repeat:no-repeat;background-size:cover;background-position:center top;">

                        <div class="nombre-chef">
                            Guadalupe, Amakela’s chef
                        </div>


                    </div>
                </div>
            </div>




        </section>
        <!-- FIN HUNT INFORMATION -->


        <!-- CONTACTO -->
        <section class="seccion10">

            <div class="container">
                <div class="row mb-5">
                    <div class="col-md-4">

                    </div>

                    <div class="col-md-4">
                        <div class="rates">
                            <div class="fondo">FOR RATES INFORMATION</div>
                        </div>
                        <p class="contact">CONTACT US</p>
                        <p class="mail"><a href="mailto:info@argentinatophunts.com">info@argentinatophunts.com</a></p>


                    </div>

                    <div class="col-md-4">

                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-md-3 col-lg-2 logo-footer">
                        <img src="assets/images/logo-footer.svg" alt="" class="logo-footer-vec">

                    </div>

                    <div class="col-md-2 col-lg-2 link-foot">
                        <div class="redes-footer2">
                            <div class="redes">
                                <a href="https://www.facebook.com/argentinatophunts" target="_blank"><i class="fa-brands fa-facebook-f fa-lg"></i></a>
                                <a href="https://www.instagram.com/argentinatophunts/" target="_blank"><i class="fa-brands fa-instagram fa-2x"></i></a>
                            </div>

                        </div>

                    </div>

                    <div class="col-md-3 col-lg-5">
                        <div class="bordersep"></div>
                    </div>

                    <div class="col-md-3 col-lg-3 link-foot linkfoot2">
                        <a href="www.argentinatophunts.com">www.argentinatophunts.com</a>


                    </div>


                </div>
            </div>


    </div>


    </section>
    <!-- FIN CONTACTO -->

    </div>



    <!-- Bootstrap core JavaScript
  ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="assets/js/bootstrap.js"></script>

    <!-- Easing -->
    <script src="assets/js/jquery.easing.1.3.js"></script>

    <!-- Preloader -->
    <script src="assets/js/animations/jquery.html5Loader.line.js"></script>
    <script src="assets/js/jquery.html5Loader.js"></script>

    <!-- Scrollmagic -->
    <script type="text/javascript" src="assets/js/greensock/TweenMax.min.js"></script>
    <script type="text/javascript" src="assets/js/ScrollMagic.js"></script>
    <script type="text/javascript" src="assets/js/plugins/animation.gsap.js"></script>
    <script type="text/javascript" src="assets/js/plugins/debug.addIndicators.js"></script>

    <!-- ==Owl== -->
    <script src="assets/js/owl.carousel.js"></script>

    <!-- Custom -->
    <script src="assets/js/scripts-amakela.js?v=1"></script>

    <script>
        var pesActiva = 0;
        var itActive = 0;
        $(document).ready(function() {


            <?php if($intQtyRecords > 0){?>
            var owl1 = $(".owl1").owlCarousel({
                /*items: 3,*/
                autoplay: true,
                loop: true,
                nav: false,
                autoplayTimeout: 6000,
                autoplaySpeed: 600,
                dots: false,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1,
                        nav: false
                    },
                    600: {
                        items: 2,
                        nav: false
                    },
                    1000: {
                        items: 3,
                        nav: false,
                    }
                }
            });

            $('#fizq').click(function() {
                owl1.trigger('prev.owl.carousel', [600]);
            })

            $('#fder').click(function() {
                owl1.trigger('next.owl.carousel', [600]);
            })
            <?php }?>


        });
    </script>


</body>

</html>