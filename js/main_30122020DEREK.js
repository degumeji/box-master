$(document).ready(function(){
	$('.saveDevolucion').click(saveDatosDevolucion);
	$('.saveCarritoAbandonado').click(saveDatosCarritoAbandObservacion);
	$('.saveCampana').click(saveDatosCampanaObservacion);
	$('.saveModProducto').click(saveDatosModProducto);
	$('.saveGestionNOW').click(saveDatosGestionNOW);
	
	removeAlert();

	$("#logout").click(function(){
		$.ajax({
		  type: "POST",
		  url: 'controladores/dashboard.controller.php',
		  data: 'accion=logout'
		}).done(function(){
			window.location = "index.html";
		});
	})
})

function removeAlert(){
	window.setTimeout(function() {
	  $(".flash").fadeTo(500, 0).slideUp(500, function(){
	      $(this).remove();
	  });
	}, 5000);
}

function saveDatosDevolucion(){
	var numero_devolucion = $(this).attr('devolucion');
	$.ajax({
	  type: "POST",
	  url: 'controladores/dashboard.controller.php',
	  data: 'accion=devolucion&devolucion='+$('#devolucionSCI_'+numero_devolucion).val()+'&autorizacion='+$('#autorizacion_'+numero_devolucion).val()+'&observaciones='+$('#observaciones_'+numero_devolucion).val()+'&codigo='+numero_devolucion,	  
	  dataType: 'JSON',
	  success: function(data){
	  	if(data.response==200){
	  		$('#notificaciones_container').append('<div class="alert alert-success flash" role="alert"><p>Los datos de la devolucion <b>'+numero_devolucion+'</b> han sido actualizados exitosamente.</p></div>');
	  		removeAlert();
	  	}else{
	  		$('#notificaciones_container').append('<div class="alert alert-danger flash" role="alert"><p>Lo sentimos, los datos no ha podido ser actualizados. Por favor intente nuevamente o comuniquese con el administrador del sito.</p></div>');
	  	}
	  }
	});
}


function saveDatosCarritoAbandObservacion(){ // FERNANDO TORRES 20190813
	var idCarrito = $(this).attr('idCarrito');
	$.ajax({
	  type: "POST",
	  url: 'controladores/dashboard.controller.php',
	  data: 'accion=saveDatosCarritoAbandObservacion&idCarrito='+ idCarrito +'&Observaciones='+$('#observaciones_'+idCarrito).val(),	  
	  dataType: 'JSON',
	  success: function(data){
	  	if(data.response==200){
	  		$('#notificaciones_container').append('<div class="alert alert-success flash" role="alert"><p>Los datos de la observacion  del carrito #<b>'+idCarrito+'</b> han sido actualizados exitosamente.</p></div>');
	  		removeAlert();
	  	}else{
	  		$('#notificaciones_container').append('<div class="alert alert-danger flash" role="alert"><p>Lo sentimos, los datos no ha podido ser actualizados. Por favor intente nuevamente o comuniquese con el administrador del sito.</p></div>');
	  	}
	  }
	});
}

function saveDatosCampanaObservacion(){ // FERNANDO TORRES 20200915
	var IdCampana = $(this).attr('IdCampana');
	$.ajax({
	  type: "POST",
	  url: 'controladores/dashboard.controller.php',
	  data: 'accion=saveDatosCampanaObservacion&Id='+ IdCampana  +'&Observaciones='+$('#observaciones_'+ IdCampana  ).val(),	  
	  dataType: 'JSON',
	  success: function(data){
	  	if(data.response==200){
	  		$('#notificaciones_container').append('<div class="alert alert-success flash" role="alert"><p>Los datos de la observacion  del carrito #<b>'+Id+'</b> han sido actualizados exitosamente.</p></div>');
	  		removeAlert();
	  	}else{
	  		$('#notificaciones_container').append('<div class="alert alert-danger flash" role="alert"><p>Lo sentimos, los datos no ha podido ser actualizados. Por favor intente nuevamente o comuniquese con el administrador del sito.</p></div>');
	  	}
	  }
	});
}


function saveDatosModProducto(){ // FERNANDO TORRES 20200901
	var codigoproducto   = $(this).attr('codigoproducto');
	$.ajax({
	  type: "POST",
	  url: 'controladores/dashboard.controller.php',
	  data: 'accion=saveDatosModProducto&codigoproducto='+ codigoproducto +'&stock='+$('#txtStock').val() +'&stock_ecommerce='+$('#txtStockEcommerce').val()+'&despacho='+$('#txtDespacho').val()+'&empaque='+$('#txtEmpaque').val(),	  
	  dataType: 'JSON',
	  success: function(data){
	  	if(data.response==200){
	  		$('#notificaciones_container').append('<div class="alert alert-success flash" role="alert"><p>Se ha actualizado el producto #<b>'+codigoproducto  +'</b> exitosamente.</p></div>');
			$('#txtCodigo').val('');
			$('#txtStock').val('');
			$('#txtStockEcommerce').val('');
			$('#txtDespacho').val('');
			$('#txtEmpaque').val('');
	  		removeAlert();
	  	}else{
	  		$('#notificaciones_container').append('<div class="alert alert-danger flash" role="alert"><p>Lo sentimos, los datos no han podido ser actualizados. Por favor intente nuevamente o comuniquese con el administrador del sito.</p></div>');
	  	}
	  }
	});
}

function saveDatosGestionNOW(){ // FERNANDO TORRES 
	var idCarrito   = $(this).attr('idCarrito');
	$.ajax({
	  type: "POST",
	  url: 'controladores/dashboard.controller.php',
	  data: 'accion=saveDatosGestionNOW&idCarrito='+ idCarrito +'&idEstado='+ $('#txtEstado').val()+ '&comentario='+$('#txtComentario').val(),	  
	  dataType: 'JSON',
	  success: function(data){
	  	if(data.response==200){
	  		$('#notificaciones_container').append('<div class="alert alert-success flash" role="alert"><p>Se ha actualizado el idcarrito #<b>'+ idCarrito +'</b> exitosamente.</p></div>');
			$('#txtComentario').val('');
	  		removeAlert();
	  	}else{
	  		$('#notificaciones_container').append('<div class="alert alert-danger flash" role="alert"><p>Lo sentimos, los datos no han podido ser actualizados. Por favor intente nuevamente o comuniquese con el administrador del sito.</p></div>');
	  	}
	  }
	});
}