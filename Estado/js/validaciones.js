$(document).ready(function() {
     $("#FrmCrearEstado").submit(function(event){
          event.preventDefault();

          let validado=0;

          if ($("#Estado").val().length == 0) {

               $("#validacion_estado").text("*");
               $("#validacion_estado2").text("Debe Seleccionar una Empresa");
          }else{

               $("#validacion_estado").text("");
               $("#validacion_estado2").text("");
               validado++;
          }
          if (validado==1)
          {
               document.FrmCrearEstado.submit();
               Swal.fire({
                    title:'Registro Exitoso',text:'La reserva a sido registrada',icon:'success',footer:'<span class="rojo">Agencia de Viajes',
                    //width: '50%',
                    padding:'1rem',
                    //background:'#000',
                    backdrop:true,
                    //toast: true,
                    position:'center',
               });
          }
          else{
               Swal.fire({
                    title:'Error en la creacion',text:'Campos pendientes por validar',icon:'error',footer:'<span class="rojo">Kreemo Solution Systems',
                    //width: '50%',
                    padding:'1rem',
                    //background:'#000',
                    backdrop:true,
                    //toast: true,
                    position:'center',
               });
               //alert("Campos pendientes por validar");
               validado = 0;
          }

     });
});

$(document).ready(function() {
     $("#FrmEditarEstado").submit(function(event){
          event.preventDefault();

          let validado=0;

          if ($("#Estado").val().length == 0) {

               $("#validacion_estado").text("*");
               $("#validacion_estado2").text("Debe Seleccionar una Empresa");
          }else{

               $("#validacion_estado").text("");
               $("#validacion_estado2").text("");
               validado++;
          }
          if (validado==1)
          {
               document.FrmEditarEstado.submit();
               Swal.fire({
                    title:'Registro Exitoso',text:'La reserva a sido registrada',icon:'success',footer:'<span class="rojo">Agencia de Viajes',
                    //width: '50%',
                    padding:'1rem',
                    //background:'#000',
                    backdrop:true,
                    //toast: true,
                    position:'center',
               });
          }
          else{
               Swal.fire({
                    title:'Error en la creacion',text:'Campos pendientes por validar',icon:'error',footer:'<span class="rojo">Kreemo Solution Systems',
                    //width: '50%',
                    padding:'1rem',
                    //background:'#000',
                    backdrop:true,
                    //toast: true,
                    position:'center',
               });
               //alert("Campos pendientes por validar");
               validado = 0;
          }

     });
});
