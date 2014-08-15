$(function() {
/* =============================================================================
   HomeSlider
   ========================================================================== */	
	$('#loading').fadeOut('slow', function(){
			$('#loading').remove();
			var effects = new Array('scroll', 'crossfade', 'uncover');
			var random_number = Math.floor(Math.random()*3);
			$("#slider_home").carouFredSel({
				widith: 718,
				height: 257,
				scroll: {
					items: 1,
					fx: 'uncover',
					duration: 4000,
					pauseOnHover: true
				},
				pagination: {
						container: '#pag',
						anchorBuilder: function(nr) {
							return '<a href="#" class="pag-'+nr+'"><span>'+nr+'</span></a>'
						}
					},
			}); 
		});
	$("#clavePromotor").change(function(){
			var clavePromotor = $("#clavePromotor").val();
			$("#oficina").empty();
			$.ajax({
				url: "/admin_user/listaOficinas",
				type: "POST",
				data: {
					clavePromotor: clavePromotor
				},
				success:function(results) {
					$("#oficina").append(results);
				}
			});
		});
	$( ".fecha" ).datepicker();
	$.datepicker.regional['es'] = {
		closeText: 'Cerrar',
		prevText: '&#x3c;Ant',
		nextText: 'Sig&#x3e;',
		currentText: 'Hoy',
		monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
		'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
		monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
		'Jul','Ago','Sep','Oct','Nov','Dic'],
		dayNames: ['Domingo','Lunes','Martes','Mi&eacute;rcoles','Jueves','Viernes','S&aacute;bado'],
		dayNamesShort: ['Dom','Lun','Mar','Mi&eacute;','Juv','Vie','S&aacute;b'],
		dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','S&aacute;'],
		weekHeader: 'Sm',
		dateFormat: 'dd/mm/yy',
		firstDay: 1,
		isRTL: false,
		showMonthAfterYear: false,
		yearSuffix: ''};
	$.datepicker.setDefaults($.datepicker.regional['es']);
	$("#contacto_form").validate({
		rules: {
			nombre: "required",
			email: {
				required: true,
				email: true,
			},
			asunto: "required",
			mensaje: "required"
		},
		messages: {
			nombre: "Campo Obligatorio",
			email: {
				required: "Campo Obligatorio",
				email: "El campo correo electrónico debe contener una direccion válida"
			},
			asunto: "Campo Obligatorio",
			mensaje: "Campo Obligatorio"
		}
	});

	$("#archivo_form").validate({
		rules: {
			excel: "required",
			password: {
				required: true
			}
		},
		messages: {
			excel: "Selecciona un archivo",
			password: {
				required: "Campo Obligatorio"				
			}
		}
	});

	$("#canghe_form").validate({
		rules: {
			passActual: "required",
			passNuevo1: "required",
			passNuevo2: {
				required: true,
				equalTo: "#passNuevo1"
			}
		},
		messages: {
			passActual: "Campo Obligatorio",
			passNuevo1: "Campo Obligatorio",
			passNuevo2: {
				required: "Campo Obligatorio",
				equalTo: "Contraseña no coincide"
			}

		}
	});

	$("#promot_form").validate({
		rules: {
			usuario: "required",
			rsocial: "required",
			comercio: "required",
			nombre: "required",
			paterno: "required",
			materno: "required",
			email: {
				required: true,
				email: true,
			},
			domicilio: "required",
			no_int: "required",
			no_ext: "required",
			colonia: "required",
			cp: "required",
			delegacion: "required",
			telefono1: {
				required: true,
				number: true
			},
			ext1: {
				required: true,
				number: true
			},
			atencionDe: "required",
			atencionA: "required",
			estatus: "required",
			logo: "required"
		},
		messages: {
			usuario: "Campo Obligatorio",
			rsocial: "Campo Obligatorio",
			comercio: "Campo Obligatorio",
			nombre: "Campo Obligatorio",
			paterno: "Campo Obligatorio",
			materno: "Campo Obligatorio",
			email: {
				required: "Campo Obligatorio",
				email: "El campo correo electrónico debe contener una direccion válida"
			}, 
			domicilio: "Campo Obligatorio",
			no_int: "Campo Obligatorio",
			no_ext: "Campo Obligatorio",
			colonia: "Campo Obligatorio",
			cp: "Campo Obligatorio",
			delegacion: "Campo Obligatorio",
			telefono1: {
				required: "Campo Obligatorio",
				number: "El campo debe contener números"
			},
			ext1: {
				required: "Campo Obligatorio",
				number: "El campo debe contener números"
			},
			atencionDe: "Campo Obligatorio",
			atencionA: "Campo Obligatorio",
			estatus: "Campo Obligatorio",
			logo: "Campo Obligatorio",
		}
	});

	$("#desa_form").validate({
		rules: {
			clavePromotor: "required",
			usuario: "required",
			rsocial: "required",
			comercio: "required",
			nombre: "required",
			paterno: "required",
			materno: "required",
			email: {
				required: true,
				email: true,
			},
			telefono1: {
				required: true,
				number: true
			},
			ext1: {
				required: true,
				number: true
			},
			telefono2: {
				required: true,
				number: true
			},
			ext2: {
				required: true,
				number: true
			},
			estatus: "required",
			oficina: "required"
		},
		messages: {
			clavePromotor: "Campo Obligatorio",
			usuario: "Campo Obligatorio",
			rsocial: "Campo Obligatorio",
			comercio: "Campo Obligatorio",
			nombre: "Campo Obligatorio",
			paterno: "Campo Obligatorio",
			materno: "Campo Obligatorio",
			email: {
				required: "Campo Obligatorio",
				email: "El campo correo electrónico debe contener una direccion válida"
			},
			telefono1: {
				required: "Campo Obligatorio",
				number: "El campo debe contener números"
			},
			ext1: {
				required: "Campo Obligatorio",
				number: "El campo debe contener números"
			},
			telefono2: {
				required: "Campo Obligatorio",
				number: "El campo debe contener números"
			},
			ext2: {
				required: "Campo Obligatorio",
				number: "El campo debe contener números"
			},
			estatus: "Campo Obligatorio",
			oficina: "Campo Obligatorio"
		}
	});
	
	$("#agent_form").validate({
		rules: {
			clavePromotor: "required",
			usuario: "required",
			nAgente: "required",
			nombre: "required",
			paterno: "required",
			materno: "required",
			telefono1: {
				required: true,
				number: true
			},
			ext1: {
				required: true,
				number: true
			},
			email: {
				required: true,
				email: true,
			},
			estatus: "required",
			oficina: "required"
		},
		messages: {
			clavePromotor: "Campo Obligatorio",
			usuario: "Campo Obligatorio",
			nAgente: "Campo Obligatorio",
			nombre: "Campo Obligatorio",
			paterno: "Campo Obligatorio",
			materno: "Campo Obligatorio",
			telefono1: {
				required: "Campo Obligatorio",
				number: "El campo debe contener números"
			},
			ext1: {
				required: "Campo Obligatorio",
				number: "El campo debe contener números"
			},
			email: {
				required: "Campo Obligatorio",
				email: "El campo correo electrónico debe contener una direccion válida"
			},
			estatus: "Campo Obligatorio",
			oficina: "Campo Obligatorio"
		}
	});
	$("#addres_form").validate({
		rules: {
			clavePromotor: "required",
			calle: "required",
			numExt: "required",
			colonia: "required",
			cp: "required",
			estado: "required",
			municipio: "required",
			telefono1: {
				required: true,
				number: true
			},
			ext1: {
				required: true,
				number: true
			},
			telefono2: {
				required: true,
				number: true
			},
			ext2: "required"
		},
		messages: {
			lavePromotor: "Campo Obligatorio",
			calle: "Campo Obligatorio",
			numExt: "Campo Obligatorio",
			colonia: "Campo Obligatorio",
			cp: "Campo Obligatorio",
			estado: "Campo Obligatorio",
			municipio: "Campo Obligatorio",
			telefono1: {
				required: "Campo Obligatorio",
				number: "El campo debe contener números"
			},
			ext1: {
				required: "Campo Obligatorio",
				number: "El campo debe contener números"
			},
			telefono2: {
				required: "Campo Obligatorio",
				number: "El campo debe contener números"
			},
			ext2: "Campo Obligatorio"
		}
	});
	$("#abono_form").validate({
		rules: {
			valor: {
				required: true,
				digits: true
			},
			tipo: "required"
		},
		messages: {
			valor: {
				required: "Campo Obligatorio",
				digits: "El campo debe contener números"
			},
			tipo: "Campo Obligatorio"
		}
	});

	$("#datos_form").validate({
		rules: {
			email: {
				required: true,
				email: true,
			},
			estatus: "required",
			oficina: "required"
		},
		messages: {
			email: {
				required: "Campo Obligatorio",
				email: "El campo correo electrónico debe contener una direccion válida"
			},
			estatus: "Campo Obligatorio",
			oficina: "Campo Obligatorio"
		}
	});

});