$(document).ready(function() {
     $("#FrmCrearEmpresa").submit(function(event){
          event.preventDefault();

          let validado=0;

          if ($("#Empresa").val().length == 0) {

               $("#validacion_empresa").text("*");
               $("#validacion_empresa2").text("Debe Seleccionar una Empresa");
          }else{

               $("#validacion_empresa").text("");
               $("#validacion_empresa2").text("");
               validado++;
          }
          if ($("#Ciudad").val() == 0) {

               $("#validacion_Ciudad").text("*");
               $("#validacion_Ciudad2").text("Debe Ingresar una Ciudad");
          }else{
               $("#validacion_Ciudad").text("");
               $("#validacion_Ciudad2").text("");
               validado++;
          }

          if ($("#Direccion").val() == 0) {

               $("#validacion_Direccion").text("*");
               $("#validacion_Direccion2").text("Debe Digitar la Direccion");
          }else{
               $("#validacion_Direccion").text("");
               $("#validacion_Direccion2").text("");
               validado++;
          }

          if (validado==3)
          {
               document.FrmCrearEmpresa.submit();
          }
          else{
               alert("Campos pendientes por validar");
               validado = 0;
          }

     });
});

$(document).ready(function() {
     $("#FrmEditarEmpresa").submit(function(event){
          event.preventDefault();

          let validado=0;

          if ($("#Empresa").val().length == 0) {

               $("#validacion_empresa").text("*");
               $("#validacion_empresa2").text("Debe Seleccionar una Empresa");
          }else{

               $("#validacion_empresa").text("");
               $("#validacion_empresa2").text("");
               validado++;
          }
          if ($("#Ciudad").val() == 0) {

               $("#validacion_Ciudad").text("*");
               $("#validacion_Ciudad2").text("Debe Ingresar una Ciudad");
          }else{
               $("#validacion_Ciudad").text("");
               $("#validacion_Ciudad2").text("");
               validado++;
          }

          if ($("#Direccion").val() == 0) {

               $("#validacion_Direccion").text("*");
               $("#validacion_Direccion2").text("Debe Digitar la Direccion");
          }else{
               $("#validacion_Direccion").text("");
               $("#validacion_Direccion2").text("");
               validado++;
          }

          if (validado==3)
          {
               document.FrmEditarEmpresa.submit();
          }
          else{
               alert("Campos pendientes por validar");
               validado = 0;
          }

     });
});

