const getEnvironment = () => {
  const host = window.location.hostname;

  if (host === 'localhost' || host === '127.0.0.1' || host === '192.168.100.106') {
    return 'http://'+host+'/ath';
  } else {
    return 'https://'+host;
  }
};

const ENV = getEnvironment();

$(document).ready(function () {
  $(".menu-hamb").click(function () {
    var opacity = $("#menu").css("opacity");

    if (opacity == 0) {
      $("#menu").animate(
        {
          top: "55px",
        },
        400,
        "easeOutExpo",
        function () {
          $("#menu").animate(
            {
              opacity: "1",
            },
            400,
            "easeOutExpo"
          );
        }
      );
    } else {
      $("#menu").animate(
        {
          opacity: "0",
        },
        400,
        "easeOutExpo",
        function () {
          $("#menu").animate(
            {
              top: "-280px",
            },
            400,
            "easeOutExpo"
          );
        }
      );
    }
  });
  $("#nbtb-1").click(function () {
    $("#menulodges").slideToggle();
  });

  resizeImage();
});

/* Preloader */
var cadena = "";
$.html5Loader({
  filesToLoad: ENV + "/files.json",
  //filesToLoad: "http://localhost/ath/files.json",
  //filesToLoad:'http://192.168.100.210/ath/files.json',
  onComplete: function () {
    $("#html5Loader").fadeOut("slow");
    $("#modalg").delay(10000).fadeIn("slow");
  },
  onUpdate: function (percentage) {
    cadena = percentage + "%";
    valor = percentage / 100;
    //$(".fill").css("width",cadena)
    //$(".texto-carga").html(cadena);
    //console.log(percentage );
    $(".logo-carga2").css("opacity", valor);
  },
});

/* Fin preloader */

$(window).on("resize", function () {
  resizeImage();
});

function resizeImage() {
  var anchopantalla = $(window).width();
  var altopantalla = $(window).height();
  var proporcion = anchopantalla/altopantalla;


  /* 
  * ALTO VENTANA VIDEO
  */
 $(".videocont").width(anchopantalla).height(altopantalla);
 if(proporcion >= 1.77){
    var altovideo = anchopantalla/1.77;
    var dif = (altopantalla-altovideo)/2;

    $("#videovid").width(anchopantalla).height(altovideo);
    $(".videohome").width(anchopantalla).height(altovideo).css("left",0).css("top",dif);
 }else {
    var anchovideo = altopantalla*1.77;
    var dif = (anchopantalla-anchovideo)/2;

    $("#videovid").width(anchovideo).height(altopantalla);
    $(".videohome").width(anchovideo).height(altopantalla).css("left",dif).css("top",0);
 }

   /* 
  * ALTO VENTANA VIDEO BOSQUE
  */
   var altovideobosque = anchopantalla/1.77;
   $("#video").height(altovideobosque).width(anchopantalla);
   $("#video3").height(altovideobosque).width(anchopantalla);


  var controller = new ScrollMagic.Controller({
    globalSceneOptions: {
      triggerHook: "onCenter",
    },
  });

  var tween1 = TweenMax.fromTo("#top2", 0.5, { top: -200 }, { top: 0 });

  var controllergen = new ScrollMagic.Controller({
    globalSceneOptions: {
      triggerHook: "onEnter",
    },
  });

  new ScrollMagic.Scene({ triggerElement: ".seccion2", duration: 200 })
    .setTween(tween1)
    // .addIndicators()
    .addTo(controller)
    .on("enter", function (e) {
      $("#menu").css("opacity","0").css( "top","-280px");
    });

  /* ANIMACION WHO WE ARE*/

  var anchoheigth100 = $(".heigth100").width();

  var altoRef = $(".heigth100").width();
  var altoRef2 = $("#anim1").outerHeight();
  var propheigth100 = altoRef / altoRef2;
  $(".imagenb").width(anchoheigth100).height(altoRef2);

  /*if(propheigth100>1.3){
    $(".imagenb").addClass("imagenbh");
  } else {
    $(".imagenb").addClass("imagenbv");
  }*/

  if (altoRef >= altoRef2) {
    $(".imagenb").addClass("imagenbh");
  } else {
    $(".imagenb").addClass("imagenbv");
  }

  var scene = new ScrollMagic.Scene({
    triggerElement: ".imagenb",
    duration: 200,
  })
    .addTo(controller)
    //.addIndicators() // add indicators (requires plugin)
    .on("enter", function (e) {
      if (propheigth100 > 1.3) {
        $(".imagenb").addClass("imagenb-anim-h");
      } else {
        $(".imagenb").addClass("imagenb-anim-v");
      }
    });

  /* ANIMACION CHISCHACA AMAKELA*/

  var altolodge = $(".imagenchic").height();
  var ancholodge = $(".imagenchic").width();
  var proporcionactual = ancholodge / altolodge;
  var estadoprop = 0; // 0: NODEFINIDO 1:HORIZONTAL 2:VERTICAL

  //ASIGNACION DE ESTILO
  if (proporcionactual >= 0.92) {
    $(".imagenchic").addClass("imagenchic-ph");
    $(".imagenamakela").addClass("imagenamakela-ph");
    estadoprop = 1;
  } else {
    $(".imagenchic").addClass("imagenchic-pv");
    $(".imagenamakela").addClass("imagenamakela-pv");
    estadoprop = 2;
  }

  var scene2 = new ScrollMagic.Scene({
    triggerElement: ".seccion4",
    duration: 700,
  })
    .addTo(controller)
    //.addIndicators() // add indicators (requires plugin)
    .on("enter", function (e) {
      if (estadoprop == 1) {
        $(".imagenchic").addClass("imagenchic-ph-anim");
        $(".imagenamakela").addClass("imagenamakela-ph-anim");
      } else if (estadoprop == 2) {
        $(".imagenchic").addClass("imagenchic-pv-anim");
        $(".imagenamakela").addClass("imagenamakela-pv-anim");
      }
    });

  /* ANIMACION CHISCHACA */

  var altoImagenChis = $("#infochis").outerHeight();
  var altoImagenAma = $("#infoamak").outerHeight();
  $(".lodge-chis").height(altoImagenChis);
  $(".lodge-amak").height(altoImagenAma);

  var altochis = $(".lodge-chis").height();
  var anchochis = $(".lodge-chis").width();
  var proporcionactualchis = anchochis / altochis;
  var estadopropchis = 0; // 0: NODEFINIDO 1:HORIZONTAL 2:VERTICAL

  //ASIGNACION DE ESTILO
  if (proporcionactualchis >= 1.5) {
    $(".lodge-chis").addClass("lodge-chis-ph");
    $(".lodge-amak").addClass("lodge-amak-ph");
    estadopropchis = 1;
  } else {
    $(".lodge-chis").addClass("lodge-chis-pv");
    $(".lodge-amak").addClass("lodge-amak-pv");
    estadopropchis = 2;
  }

  var scene3 = new ScrollMagic.Scene({
    triggerElement: ".lodge-chis",
    duration: 200,
  })
    .addTo(controller)
    //.addIndicators() // add indicators (requires plugin)
    .on("enter", function (e) {
      if (estadopropchis == 1) {
        $(".lodge-chis").addClass("lodge-chis-ph-anim");
      } else if (estadopropchis == 2) {
        $(".lodge-chis").addClass("lodge-chis-pv-anim");
      }
    });

  /* 3 imageens chischaca */
  if (anchopantalla < 768) {
    var alto3chischaca = anchopantalla / 1.59;
  } else {
    var alto3chischaca = anchopantalla / 3 / 1.59;
  }

  $(".imagen-dec").height(alto3chischaca);

  var scene4 = new ScrollMagic.Scene({
    triggerElement: ".anim3",
    duration: 200,
  })
    .addTo(controller)
    //.addIndicators() // add indicators (requires plugin)
    .on("enter", function (e) {
      $(".imagen-dec").addClass("imagen-dec-anim");
    });

  /* ANIMACION AMAKELA */

  $(".imagen-dec2").height(alto3chischaca);

  var scene5 = new ScrollMagic.Scene({
    triggerElement: ".lodge-amak",
    duration: 200,
  })
    .addTo(controller)
    //.addIndicators() // add indicators (requires plugin)
    .on("enter", function (e) {
      if (estadopropchis == 1) {
        $(".lodge-amak").addClass("lodge-amak-ph-anim");
      } else if (estadopropchis == 2) {
        $(".lodge-amak").addClass("lodge-amak-pv-anim");
      }
    });

  var scene6 = new ScrollMagic.Scene({
    triggerElement: ".anim5",
    duration: 200,
  })
    .addTo(controller)
    //.addIndicators() // add indicators (requires plugin)
    .on("enter", function (e) {
      $(".imagen-dec2").addClass("imagen-dec2-anim");
    });

  /* ANIMACION WHY */

  var altowhwu = $(".seccion6").height();
  var anchowhwu = $(".seccion6").width();
  var proporcionactualwhwu = anchowhwu / (altowhwu + 240);
  var estadopwhwu = 0; // 0: NODEFINIDO 1:HORIZONTAL 2:VERTICAL

  //ASIGNACION DE ESTILO
  if (proporcionactualwhwu >= 1.85) {
    $(".seccion6").addClass("seccion6-ph");
    estadopwhwu = 1;
  } else {
    $(".seccion6").addClass("seccion6-pv");
    estadopwhwu = 2;
  }

  var scene7 = new ScrollMagic.Scene({
    triggerElement: ".seccion6",
    duration: 200,
  })
    .addTo(controller)
    //.addIndicators() // add indicators (requires plugin)
    .on("enter", function (e) {
      if (estadopwhwu == 1) {
        $(".seccion6").addClass("seccion6-ph-anim");
      } else if (estadopwhwu == 2) {
        $(".seccion6").addClass("seccion6-pv-anim");
      }
    });

  /* 3 imageens chischaca */
  if (anchopantalla < 768) {
    var alto3adorno = anchopantalla / 0.78;
  } else {
    var alto3adorno = anchopantalla / 3 / 0.78;
  }

  $(".imagen-dec3").height(alto3adorno);

  var scene8 = new ScrollMagic.Scene({
    triggerElement: ".seccion9",
    duration: 200,
  })
    .addTo(controller)
    //.addIndicators() // add indicators (requires plugin)
    .on("enter", function (e) {
      $(".imagen-dec3").addClass("imagen-dec3-anim");
    });

  var scene9 = new ScrollMagic.Scene({
    triggerElement: ".halfbloque2",
    duration: 700,
  })
    .addTo(controllergen)
    //.addIndicators() // add indicators (requires plugin)
    .on("enter", function (e) {
      $(".halfbloque2").addClass("halfbloque2-bk");
    });
}

//-------------------------------------------------------------------------------------

// Function Scroll-----------------------------------------------------
jQuery(function ($) {
  /**
   * Demo binding and preparation, no need to read this part
   */
  //borrowed from jQuery easing plugin
  //http://gsgd.co.uk/sandbox/jquery.easing.php

  $.easing.elasout = function (x, t, b, c, d) {
    return c * ((t = t / d - 1) * t * t * t * t + 1) + b;
  };

  $("#bt-0,#btb-0").click(function () {
    $.scrollTo(document.getElementById("wwa"), 1000, { easing: "elasout" });
  });

  $("#bt-1,#btb-1").click(function () {
    $.scrollTo(document.getElementById("ol"), 500, { easing: "elasout" });
  });

  $("#bt-2,#btb-2").click(function () {
    $.scrollTo(document.getElementById("whwu"), 1000, { easing: "elasout" });
  });

  $("#bt-3,#btb-3").click(function () {
    $.scrollTo(document.getElementById("chp"), 1000, { easing: "elasout" });
  });

  $("#bt-4,#btb-4").click(function () {
    $.scrollTo(document.getElementById("pat"), 1000, { easing: "elasout" });
  });

  $("#bup, #bup2").click(function () {
    $.scrollTo(document.getElementById("top"), 1000, { easing: "elasout" });
  });
});
