// $(document).ready(function() {
//      $("#FrmInicioSeccion").submit(function(event){
//           event.preventDefault();

//           let validado = 0;

//           if($("#Nombre").val().length == 0 )
//           {
//                $("#validacion_nombre").text("*");
//                $("#validacion_nombre2").text("Debe ingresar el Usuario");
//           }else
//           {
//                $("#validacion_nombre").text("");
//                $("#validacion_nombre2").text("");
//                validado++;
//           }

//           if($("#Clave").val().length == 0 )
//           {
//                $("#validacion_clave").text("*");
//                $("#validacion_clave2").text("Debe ingresar la Clave");
//           }else
//           {
//                $("#validacion_clave").text("");
//                $("#validacion_clave2").text("");
//                validado++;
//           }

//           if (validado == 2) {

               
//                document.FrmInicioSeccion.submit();
//           }
//           else {
//                alert("Campos pendientes por validar");
//           }

//      });
// });


$(document).ready(function(){
     $("#Acceder").click(function(){

          let validado = 0;

                    if($("#Nombre").val().length == 0 )
                    {
                         $("#validacion_nombre").text("*");
                         $("#validacion_nombre2").text("Debe ingresar el Usuario");
                    }else
                    {
                         $("#validacion_nombre").text("");
                         $("#validacion_nombre2").text("");
                         validado++;
                    }

                    if($("#Clave").val().length == 0 )
                    {
                         $("#validacion_clave").text("*");
                         $("#validacion_clave2").text("Debe ingresar la Clave");
                    }else
                    {
                         $("#validacion_clave").text("");
                         $("#validacion_clave2").text("");
                         validado++;
                    }

                    if (validado == 2) {
                         
                    

                    }
                    else {
                         alert("Campos pendientes por validar");
                    }



     });
});