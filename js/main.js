$(document).ready(function () {
  //$(".logIn").click(logIn);
  $(".logout").click(logOut);
  $(".ingresar").click(ingresar);
  $(".eliminar").click(eliminar);
  $(".modificar").click(modificar);
  $(".updatePregunta").click(updatePregunta);
  $("#txtBuscar").keyup(buscarTabla);
  $(".nuevo").click(nuevo);

  //removeAlert();
  //verificarSession();

  $("#txtValor").keydown(function (event) {

    if (event.shiftKey == true) {
        event.preventDefault();
    }

    if ((event.keyCode >= 48 && event.keyCode <= 57) || 
        (event.keyCode >= 96 && event.keyCode <= 105) || 
        event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 37 ||
        event.keyCode == 39 || event.keyCode == 46 || event.keyCode == 190 ||
        event.keyCode == 110) {

    } else {
        event.preventDefault();
    }

    if($(this).val().indexOf('.') !== -1 && event.keyCode == 190)
        event.preventDefault(); 
    //if a decimal has been added, disable the "."-button

  });

  //consultarTipoPregunta();
});

function removeAlert() {
  window.setTimeout(function () {
    $(".flash")
      .fadeTo(500, 0)
      .slideUp(500, function () {
        $(this).remove();
      });
  }, 5000);
}
function logOut() {
  $.ajax({
    type: "GET",
    url: "controllers/dashboard.controller.php",
    data: "accion=logout",
    dataType: "JSON",
    success: function (data) {
      if (data.response == 200) {
        window.location = "index.html";
      }
    },
  });

  return true;
}
function verificarSession(){
	//if (!isset($_SESSION)) {
		Swal.fire({
			icon: 'error',
			customClass: 'swal-wide',
			title: 'Error!',            
			confirmButtonText: 'OK',
			html: 'Ha caducado su sesión.',
			footer: '',
			showCloseButton: false
		})
		.then(function (result) {
			if (result.value) {
				window.location = 'index.html';
			}
		});
	//}
}
function nuevo(){
  $("#txtPregunta").val("");
  $("#txtRespuesta1").val("");
  $("#txtRespuesta2").val("");
  $("#txtRespuesta3").val("");
  $("#txtRespuesta4").val("");
  $("#cbxRespuestaCorrecta").val("");
  $("#txtValor").val("");
  $("#txtEstado").val("1");

  return true;
}
function ingresar(){
  let txtPregunta           = $("#txtPregunta").val().trim();
  let txtRespuesta1         = $("#txtRespuesta1").val().trim();
  let txtRespuesta2         = $("#txtRespuesta2").val().trim();
  let txtRespuesta3         = $("#txtRespuesta3").val().trim();
  let txtRespuesta4         = $("#txtRespuesta4").val().trim();
  let cbxRespuestaCorrecta  = $("#cbxRespuestaCorrecta").val();
  let cbxTipoPregunta       = $("#cbxTipoPregunta").val();
  let txtValor              = $("#txtValor").val().trim();
  let txtEstado             = $("#txtEstado").val().trim();

  if(txtPregunta == ""){
    Swal.fire({
        title: '<br>Ingrese una pregunta !!',
        confirmButtonText: 'OK',
    });
    return false;
  }

  if(txtRespuesta1 == ""){
    Swal.fire({
        title: '<br>Ingrese una respuesta1 !!',
        confirmButtonText: 'OK',
    });
    return false;
  }

  if(txtRespuesta2 == ""){
    Swal.fire({
        title: '<br>Ingrese una respuesta2 !!',
        confirmButtonText: 'OK',
    });
    return false;
  }

  if(txtRespuesta3 == ""){
    Swal.fire({
        title: '<br>Ingrese una respuesta3 !!',
        confirmButtonText: 'OK',
    });
    return false;
  }

  if(txtRespuesta4 == ""){
    Swal.fire({
        title: '<br>Ingrese una respuesta4 !!',
        confirmButtonText: 'OK',
    });
    return false;
  }

  if(cbxRespuestaCorrecta == ""){
    Swal.fire({
        title: '<br>Seleccione una respuesta correcta !!',
        confirmButtonText: 'OK',
    });
    return false;
  }

  if(cbxTipoPregunta == ""){
    Swal.fire({
        title: '<br>Seleccione un tipo de pregunta !!',
        confirmButtonText: 'OK',
    });
    return false;
  }

  if(txtValor == ""){
    Swal.fire({
        title: '<br>Ingrese una valor !!',
        confirmButtonText: 'OK',
    });
    return false;
  }

  if(txtEstado == ""){
    Swal.fire({
        title: '<br>Ingrese una estado !!',
        confirmButtonText: 'OK',
    });
    return false;
  }

  $.ajax({
    type: "POST",
    url: 'controllers/dashboard.controller.php',
    data: 'accion=insertPregunta&pregunta=' + txtPregunta
                              +'&respuesta1=' + txtRespuesta1
                              +'&respuesta2=' + txtRespuesta2
                              +'&respuesta3=' + txtRespuesta3
                              +'&respuesta4=' + txtRespuesta4
                              +'&correcta='   + cbxRespuestaCorrecta
                              +'&valor='      + txtValor
                              +'&tipo='       + cbxTipoPregunta
                              +'&estado='     + txtEstado,
    dataType: 'JSON',
    success: function(data){
      if(data.response==200){	  		
        Swal.fire({
          icon: 'success',
          customClass: 'swal-wide',
          title: "Procesado!",            
          confirmButtonText: 'OK',
          html: "Se registró exitosamente.",
          footer: '',
          showCloseButton: false,
          allowOutsideClick: false
        })
        .then(function (result) {
          if (result.value) {
            window.location = "banco_preguntas.php";
          }
        });
  
      }else{							
        Swal.fire({
          icon: 'error',
          customClass: 'swal-wide',
          title: "Error!",            
          confirmButtonText: 'OK',
          html: "Lo sentimos, no se envió correctamete. Por favor intente nuevamente o comuniquese con el administrador del sito.",
          footer: '',
          showCloseButton: false
        })		
                        
      }
    }
  });

  return true;
}
function modificar(){
  let id = $(this).attr('linea');
  window.location = "modificar_preguntas.php?id=" + id;

  return true;
}
function updatePregunta(){
  let txtId                 = $("#txtId").val().trim();
  let txtPregunta           = $("#txtPregunta").val().trim();
  let txtRespuesta1         = $("#txtRespuesta1").val().trim();
  let txtRespuesta2         = $("#txtRespuesta2").val().trim();
  let txtRespuesta3         = $("#txtRespuesta3").val().trim();
  let txtRespuesta4         = $("#txtRespuesta4").val().trim();
  let cbxRespuestaCorrecta  = $("#cbxRespuestaCorrecta").val();
  let cbxTipoPregunta       = $("#cbxTipoPregunta").val();
  let txtValor              = $("#txtValor").val().trim();
  let txtEstado             = $("#txtEstado").val().trim();

  if(txtId == ""){
    Swal.fire({
        title: '<br>Ingrese un Id !!',
        confirmButtonText: 'OK',
    });
    return false;
  }

  if(txtPregunta == ""){
    Swal.fire({
        title: '<br>Ingrese una pregunta !!',
        confirmButtonText: 'OK',
    });
    return false;
  }

  if(txtRespuesta1 == ""){
    Swal.fire({
        title: '<br>Ingrese una respuesta1 !!',
        confirmButtonText: 'OK',
    });
    return false;
  }

  if(txtRespuesta2 == ""){
    Swal.fire({
        title: '<br>Ingrese una respuesta2 !!',
        confirmButtonText: 'OK',
    });
    return false;
  }

  if(txtRespuesta3 == ""){
    Swal.fire({
        title: '<br>Ingrese una respuesta3 !!',
        confirmButtonText: 'OK',
    });
    return false;
  }

  if(txtRespuesta4 == ""){
    Swal.fire({
        title: '<br>Ingrese una respuesta4 !!',
        confirmButtonText: 'OK',
    });
    return false;
  }

  if(cbxRespuestaCorrecta == ""){
    Swal.fire({
        title: '<br>Seleccione una respuesta correcta !!',
        confirmButtonText: 'OK',
    });
    return false;
  }

  if(cbxTipoPregunta == ""){
    Swal.fire({
        title: '<br>Seleccione un tipo de pregunta !!',
        confirmButtonText: 'OK',
    });
    return false;
  }

  if(txtValor == ""){
    Swal.fire({
        title: '<br>Ingrese una valor !!',
        confirmButtonText: 'OK',
    });
    return false;
  }

  if(txtEstado == ""){
    Swal.fire({
        title: '<br>Ingrese una estado !!',
        confirmButtonText: 'OK',
    });
    return false;
  }

  $.ajax({
    type: "POST",
    url: 'controllers/dashboard.controller.php',
    data: 'accion=updatePregunta&id=' + txtId
                              +'&pregunta=' + txtPregunta
                              +'&respuesta1=' + txtRespuesta1
                              +'&respuesta2=' + txtRespuesta2
                              +'&respuesta3=' + txtRespuesta3
                              +'&respuesta4=' + txtRespuesta4
                              +'&correcta='   + cbxRespuestaCorrecta
                              +'&valor='      + txtValor
                              +'&tipo='       + cbxTipoPregunta
                              +'&estado='     + txtEstado,
    dataType: 'JSON',
    success: function(data){
      if(data.response==200){	  		
        Swal.fire({
          icon: 'success',
          customClass: 'swal-wide',
          title: "Procesado!",            
          confirmButtonText: 'OK',
          html: "Se registró exitosamente.",
          footer: '',
          showCloseButton: false,
          allowOutsideClick: false
        })
        .then(function (result) {
          if (result.value) {
            window.location = "consultar_preguntas.php";
          }
        });
  
      }else{							
        Swal.fire({
          icon: 'error',
          customClass: 'swal-wide',
          title: "Error!",            
          confirmButtonText: 'OK',
          html: "Lo sentimos, no se envió correctamete. Por favor intente nuevamente o comuniquese con el administrador del sito.",
          footer: '',
          showCloseButton: false
        })		
                        
      }
    }
  });

  return true;
}
function eliminar(){
  let txtId = $(this).attr('linea');

  if(txtId == ""){
    Swal.fire({
        title: '<br>Ingrese un Id !!',
        confirmButtonText: 'OK',
    });
    return false;
  }

  $.ajax({
    type: "POST",
    url: 'controllers/dashboard.controller.php',
    data: 'accion=deletePregunta&id=' + txtId,
    dataType: 'JSON',
    success: function(data){
      if(data.response==200){	  		
        Swal.fire({
          icon: 'success',
          customClass: 'swal-wide',
          title: "Procesado!",            
          confirmButtonText: 'OK',
          html: "Se eliminó exitosamente.",
          footer: '',
          showCloseButton: false
        })
        .then(function (result) {
          if (result.value) {
            window.location = "consultar_preguntas.php";
          }
        });
  
      }else{							
        Swal.fire({
          icon: 'error',
          customClass: 'swal-wide',
          title: "Error!",            
          confirmButtonText: 'OK',
          html: "Lo sentimos, no se envió correctamete. Por favor intente nuevamente o comuniquese con el administrador del sito.",
          footer: '',
          showCloseButton: false
        })		
                        
      }
    }
  });

  return true;
}
function buscarTabla() {
  var value = $(this).val().toLowerCase();

  $("#tabla tbody tr").filter(function() {
    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
  });

  return true;
}
function consultarTipoPregunta(){
  $.ajax({
    type: "GET",
    url: "controllers/dashboard.controller.php",
    data: "accion=consultarTipoPregunta",
    dataType: "JSON",
    success: function (data) {
      if (data.response == 200) {
        let arr = data.mensaje;
        let tipo = $("#hddTipoPregunta").val();
        
        for (let i = 0; i < arr.length; i++) {
          if(tipo == arr[i].id){
            $('#cbxTipoPregunta').append('<option value="'+arr[i].id+'" selected>'+arr[i].descripcion+'</option>');
          }else{
            $('#cbxTipoPregunta').append('<option value="'+arr[i].id+'">'+arr[i].descripcion+'</option>');
          }
        }
      }
    },
  });

  return true;
}

