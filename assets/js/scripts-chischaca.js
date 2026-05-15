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
	$('.menu-hamb').click(function() {

		var opacity = $('#menu').css("opacity");

		if (opacity == 0) {
			$('#menu').animate({
				top: '55px'
			}, 400, "easeOutExpo", function() {
				$('#menu').animate({
					opacity: '1',
				}, 400, "easeOutExpo");
			});
		} else {

			$('#menu').animate({
				opacity: '0'
			}, 400, "easeOutExpo", function() {
				$('#menu').animate({
					top: '-180px'
				}, 400, "easeOutExpo");
			});


		}

	})

	$("#nbtb-1").click(function () {
		$("#menulodges").slideToggle();
	  });
  
	resizeImage();
  });

  /* Preloader */
var cadena = "";
$.html5Loader({
  //filesToLoad: "https://argentinatophunts.com/files-ch.json",
  //filesToLoad:'http://localhost/ath-bck/files-ch.json',
  //filesToLoad:'http://192.168.100.16/ath-bck/files-ch.json',
  filesToLoad: ENV + "/files-ch.json",
  onComplete: function () {
    $("#html5Loader").fadeOut("slow");
  },
  onUpdate: function (percentage) {
    cadena = percentage + "%";
	valor = percentage/100;
    
	$(".logo-carga2").css("opacity",valor)
  },
});

/* Fin preloader */

$(window).on("resize", function () {
  resizeImage();
});

function resizeImage() {
    var control = 0;

  /* Plato*/
  var controllergen = new ScrollMagic.Controller();


  var scene = new ScrollMagic.Scene({triggerElement: ".seccion7", duration: 1200})
	.addTo(controllergen)
	//.addIndicators() // add indicators (requires plugin)
	.on("enter", function (e) {

        var elem = $(".plato2");

        if(control == 0){

            $({deg: 60}).animate({deg: 0}, {
                duration: 2500,
                step: function(now){
                    elem.css({
                        transform: "rotate(" + now + "deg)"
                    });
                }
            });

            elem.animate({
                opacity: '1',
            },2500,"easeOutExpo");

            $(".plato1").animate({
                opacity: '1',
            },5000,"easeOutExpo");

            $(".chef").animate({
                right: '0px',
                opacity: '1'
            },5000,"easeOutExpo");

            control = 1;
        }

	})


    var scene8 = new ScrollMagic.Scene({triggerElement: ".seccion3", duration: 200})
	.addTo(controllergen)
	//.addIndicators() // add indicators (requires plugin)
	.on("enter", function (e) {

		$(".mapa1").animate({
			opacity: '1',
		},3000,"easeOutExpo");

		$(".mapa2").delay(700).animate({
			opacity: '1',
		},3000,"easeOutExpo");

		$(".mapa3").delay(1400).animate({
			opacity: '1',
		},3000,"easeOutExpo");
		
	})
}


	// Function Scroll-----------------------------------------------------
jQuery(function( $ ){
	/**
	 * Demo binding and preparation, no need to read this part
	 */
	//borrowed from jQuery easing plugin
	//http://gsgd.co.uk/sandbox/jquery.easing.php

	$.easing.elasout = function (x, t, b, c, d) {
		return c*((t=t/d-1)*t*t*t*t + 1) + b;
	};

	
});
 