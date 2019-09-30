numRev = getParametroURL("rev");
numPags = getParametroURL("pags");

yepnope(
	{test : Modernizr.csstransforms,
	 yep: ['js/lib/turn.js'],
	 nope: ['js/lib/turn.html4.min.js'],
	 both: ['js/lib/zoom.min.js', 'js/magazine.js', 'css/magazine.css'],
	 complete: cargarRevista
	}
);

function cargarRevista(){
 	$('#canvas').fadeIn(1000);
 	var flipbook = $('.magazine');
 	// Revisar si el CSS ya esta cargado
	if (flipbook.width()==0 || flipbook.height()==0) {
		setTimeout(cargarRevista, 10);
		return;
	}
	
	// Crear el objeto revista
	flipbook.turn({
			width: 922,
			height: 600,
			duration: 1000,
			acceleration: !isChrome(),
			gradients: true,
			autoCenter: true,
			elevation: 50,
			pages: numPags,
			//Eventos
			when: {
				turning: function(event, page, view) {
					var book = $(this),
					currentPage = book.turn('page'),
					pages = book.turn('pages');
					// Actualizar la URL
					Hash.go('pag/' + page).update();
					disableControls(page);
				},
				turned: function(event, page, view) {
					disableControls(page);
					$(this).turn('center');
					if (page==1) { 
						$(this).turn('peel', 'br');
					}
				},
				missing: function (event, pages) {
					//Se agregan las paginas faltantes
					for (var i = 0; i < pages.length; i++)
						addPage(pages[i], $(this), numRev);
				}
			}
	});

	// Zoom.js
	$('.magazine-viewport').zoom({
		flipbook: $('.magazine'),
		max: function() { 
			return largeMagazineWidth()/$('.magazine').width();
		}, 
		when: {
			swipeLeft: function() {
				$(this).zoom('flipbook').turn('next');
			},
			swipeRight: function() {
				$(this).zoom('flipbook').turn('previous');
			},
			resize: function(event, scale, page, pageElement) {
				if (scale==1)
					loadSmallPage(numRev, page, pageElement);
				else
					loadLargePage(numRev, page, pageElement);
			},
			zoomIn: function () {
				$('.thumbnails').hide();
				$('.made').hide();
				$('.magazine').removeClass('animated').addClass('zoom-in');
				$('.zoom-icon').removeClass('zoom-icon-in').addClass('zoom-icon-out');
				if (!window.escTip && !$.isTouch) {
					escTip = true;
					$('<div />', {'class': 'exit-message'}).
						html('<div>ESC para salir</div>').
							appendTo($('body')).
							delay(2000).
							animate({opacity:0}, 500, function() {
								$(this).remove();
							});
				}
			},
			zoomOut: function () {
				$('.exit-message').hide();
				$('.thumbnails').fadeIn();
				$('.made').fadeIn();
				$('.zoom-icon').removeClass('zoom-icon-out').addClass('zoom-icon-in');
				setTimeout(function(){
					$('.magazine').addClass('animated').removeClass('zoom-in');
					resizeViewport();
				}, 0);
			}
		}
	});

	// Evento zoom
	if ($.isTouch)
		$('.magazine-viewport').bind('zoom.doubleTap', zoomTo);
	else
		$('.magazine-viewport').bind('zoom.tap', zoomTo);

	// Evento tecla presionada
	$(document).keydown(function(e){
		switch (e.keyCode) {
			//Flecha izquierda
			case 37:
				$('.magazine').turn('previous');
				e.preventDefault();
			break;
			//Flecha derecha
			case 39:
				$('.magazine').turn('next');
				e.preventDefault();
			break;
			//Escape
			case 27:
				$('.magazine-viewport').zoom('zoomOut');	
				e.preventDefault();
			break;
		}
	});

	// URIs #/pag/1 
	// Verificar que página se tiene que cargar
	Hash.on('^pag/([0-9]*)$', {
		yep: function(path, parts){
			var page = parts[1];
			console.log(parts);
			if (page!==undefined) {
				if ($('.magazine').turn('is'))
					$('.magazine').turn('page', page);
			}

		},
		nop: function(path){
			if ($('.magazine').turn('is'))
				$('.magazine').turn('page', 1);
		}
	});


	$(window).resize(function() {
		resizeViewport();
	}).bind('orientationchange', function() {
		resizeViewport();
	});

	resizeViewport();

	$('.magazine').addClass('animated');
}