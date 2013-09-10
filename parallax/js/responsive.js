$(function() {
	var document_height = document.documentElement.clientHeight;
	$('#footer').click(function(e) {
	alert("Body height: "+$("body").height()+" document height: "+document_height+" windows height: "+$(window).height()+" scrolltop:"+$(window).scrollTop())
	});
	$(window).scroll(function() {
		
		// scroll para footer 
		if($(window).scrollTop() > 0){
			if ($('#footer').hasClass('active')){
				$('#footer').animate({"bottom": "-=50px"}, "slow");
				$('#footer').removeClass("active")
			}
		}else{
			if (!$('#footer').hasClass('active')){
				$('#footer').animate({"bottom": "+=50px"}, "fast");
				$('#footer').addClass("active")
			}
		}
		
		if($("body").height() == ($(window).height() + $(window).scrollTop())){
			if (!$('#footer').hasClass('active')){
				$('#footer').animate({"bottom": "+=50px"}, "fast");
				$('#footer').addClass("active")
			}else{
				if ($('#footer').hasClass('active')){
					$('#footer').animate({"bottom": "-=50px"}, "slow");
					$('#footer').removeClass("active")
				}
			}
		}
		
		// scroll para menu inicio
		if($(window).scrollTop() < (document_height-48)){
			if (!$('.elem-home').hasClass('active')){
				$('.menu .elem').removeClass("active")
				$('.elem-home').addClass("active")
			}
		}
		
		if($(window).scrollTop() >= (document_height-48) && $(window).scrollTop() < ((document_height*2)-48)){
			if (!$('.elem-mult').hasClass('active')){
				$('.menu .elem').removeClass("active")
				$('.elem-mult').addClass("active")
			}
		}
		
		if($(window).scrollTop() >= ((document_height*2)-48) && $(window).scrollTop() < ((document_height*3)-48)){
			if (!$('.elem-op').hasClass('active')){
				$('.menu .elem').removeClass("active")
				$('.elem-op').addClass("active")
			}
		}
		
		if($(window).scrollTop() >= ((document_height*3)-48) && $(window).scrollTop() < ((document_height*4)-48)){
			if (!$('.elem-ec').hasClass('active')){
				$('.menu .elem').removeClass("active")
				$('.elem-ec').addClass("active")
			}
		}
		
		if($(window).scrollTop() >= ((document_height*4)-48) && $(window).scrollTop() < ((document_height*5)-48)){
			if (!$('.elem-app').hasClass('active')){
				$('.menu .elem').removeClass("active")
				$('.elem-app').addClass("active")
			}
		}
		
		if($(window).scrollTop() >= ((document_height*5)-48)){
			if (!$('.elem-store').hasClass('active')){
				$('.menu .elem').removeClass("active")
				$('.elem-store').addClass("active")
			}
		}
		
	});
	
	//animación redes sociales
	$("#redes ul").mouseenter(function(e){
		$(this).stop(true, true).animate({"paddingLeft": "-=47px"}, "fast");
	}).mouseleave(function(e){
		$(this).stop(true, true).animate({"paddingLeft": "+=47px"}, "fast");
	});
	
	//animación flechas scroll
	$(".scroll-wrap").mouseenter(function(){
		$(this).stop(true, true).animate({"right": "0px"}, "fast");
	}).mouseleave(function(e){
		$(this).stop(true, true).animate({"right": "-226px"}, "fast");
	});
	
	//animacion menu
	$('#header .menu a').click(function(e) {
		
		//prevenir en comportamiento predeterminado del enlace
		e.preventDefault();
		//obtenemos el id del elemento en el que debemos posicionarnos
		var strAncla=$(this).attr('href');
		
		//utilizamos body y html, ya que dependiendo del navegador uno u otro no funciona
		$('body,html').stop(true,true).animate({
			//realizamos la animacion hacia el ancla
			scrollTop: $(strAncla).offset().top
		},1000)	/*.promise().done(function(){
			if(strAncla == '#home' || strAncla == '#tiendas'){
				if (!$('#footer').hasClass('active')){
					$('#footer').stop(true, true).animate({"bottom": "+=50px"}, "slow");
					$('#footer').addClass("active")
				}
			}else{
				if ($('#footer').hasClass('active')){
					$('#footer').stop(true, true).animate({"bottom": "-=50px"}, "fast");
					$('#footer').removeClass("active")
				}
			}	
				
		})*/;
		
	});
	
	//animación flechas scroll
	var position = 0;
	$('.arrow-down').click(function(e) {		
		//prevenir en comportamiento predeterminado del enlace
		//e.preventDefault();

		//utilizamos body y html, ya que dependiendo del navegador uno u otro no funciona
		$('body,html')/*.stop(true,true)*/.animate({
			//realizamos la animacion hacia el ancla
			scrollTop: '+='+document_height
			
		},1000);
	});
	
	$('.arrow-up').click(function(e) {		
		//prevenir en comportamiento predeterminado del enlace
		//e.preventDefault();

		//utilizamos body y html, ya que dependiendo del navegador uno u otro no funciona
		$('body,html')/*.stop(true,true)*/.animate({
			//realizamos la animacion hacia el ancla
			scrollTop: '-='+document_height
			
		},1000);
	});
	
});