$(function() {
/* =============================================================================
   HomeSlider
   ========================================================================== */	
	$("#home_slider").bxSlider({
		auto: true,
		pager: false
	});

/* =============================================================================
   Accordion Script
   ========================================================================== 
	$.Accordion.defaults = {
		//Indice para apertura por defecto. -1 todos estan cerrados
		open: -1,
		//Si retorna true solo un elemto se abre
		//Una ves que se abre un elemento
		// ce cierra el primero 
		oneOpenedItem: false,
		//Velocidad de la animacion en apertura y cierre
		speed: 600,
		//flexivilidad en la animacion en apertura y cierre
		easing: 'easeInOutExpo',
		//Velocidd en la animacion del Scroll
		scrollSpeed: 900,
		////flexivilidad en la animacion del Scroll
	},
	_init: function( options ) {
		this.options = $.extend( true, {}, $.Accordion.defaults, options );
		//Validamos las opciones
		this._validate();
		//El elemento actual esta abierto?
		this.current = this.options.open;
		//Ocultamos el contenido
		this.$items.find('div.st-content').hide();
		//Salvamos la altura del elemento original
		this._saveDimValues();
		//Si queremos un elemento abierto por defecto
		if( this.current != -1 )
			this._toggleItem( this.$item.eq( this.current ) );
		//Iniciamos los Eventos
		this._initEvents();
	},
	_toggleItem: function( $item ) {
		var $content = $item.find('div.st-content');
		( $item.hasClass( 'st-open' ) )
			?( this.current = -1, $content.stop( true, true ).fadeOut( this.options.speed ), $item.removeClass('st-open').stop().animate({
				height: $item.data(originalHeight)
			}, this.options.speed, this.options.easing ) )
			:( this.current = $item.index(), $content.stop(true, true).fadeIn( this.options.speed ), $item.addClass('st-open').stop().animate({
				height: $item.data('originalHeight') + $content.outerHeight( true )
			}, this.options.speed, this.options.easing), this._scroll( this ) )
	},
	_initEvents: function() {
		var instance = this;
		//Abrir/Cerrar
		this.$items.find('a:frist').bind('click.accordion', function( event ){
			var $item = $(this).parent();
			//Abriendo y cerrando los items que regresen true en oneOpenedItem
			if( instance.options,oneOpenedItem && instance._isOpened() && instance.current!== $item.index() ) {
				instance._toggleItem( instance.$items.eq( instance.current ) );
			}
			//Abriendo y cerrando item
			instance._toggleItem( $item );
			return false;
		});
		$(window).bind('smartresize.accordion', function( event ) {
			//Restablecer valores originales de los items
			instance._saveDimValues();
			//Restablecer la altura del contenido de cualquier artículo que se abrió
			instance.$el.find('li.st-open').each(function() {
				var $this = $(this);
				$this.css('height', $this.data( 'originalHeight' ) + $this.find('div.st-content').outerHeight( true ));
			});
			//Scroll en este momento
			if( instance._isOpened() )
				instance._scroll();
		});
	} */
});