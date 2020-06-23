$(document).ready(function() {
     $("#FrmCrearProducto").submit(function(event){
          event.preventDefault();

          let validado=0;

          if ($("#Producto").val().length == 0) {

               $("#validacion_producto").text("*");
               $("#validacion_producto2").text("Debe ingresar un producto");
          }else{

               $("#validacion_producto").text("");
               $("#validacion_producto2").text("");
               validado++;
          }
          if ($("#Precio").val() == 0) {

               $("#validacion_precio").text("*");
               $("#validacion_precio2").text("Debe Ingresar el precio");
          }else{
               $("#validacion_precio").text("");
               $("#validacion_precio2").text("");
               validado++;
          }

          if (validado==2)
          {
               
               document.FrmCrearProducto.submit();

               
               Swal.fire({
                    title:'Registro Exitoso',text:'El producto a sido registrado',icon:'success',footer:'<span class="rojo">Agencia de Viajes',
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
     $("#FrmEditarProducto").submit(function(event){
          event.preventDefault();

          let validado=0;

          if ($("#Producto").val().length == 0) {

               $("#validacion_producto").text("*");
               $("#validacion_producto2").text("Debe ingresar un producto");
          }else{

               $("#validacion_producto").text("");
               $("#validacion_producto2").text("");
               validado++;
          }
          if ($("#Precio").val() == 0) {

               $("#validacion_precio").text("*");
               $("#validacion_precio2").text("Debe Ingresar el precio");
          }else{
               $("#validacion_precio").text("");
               $("#validacion_precio2").text("");
               validado++;
          }

          if (validado==2)
          {
               
               document.FrmEditarProducto.submit();

               
               Swal.fire({
                    title:'Registro Exitoso',text:'El producto a sido Modificado',icon:'success',footer:'<span class="rojo">Agencia de Viajes',
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

$(document).ready(function(){

     $(".solo_numeros").on("keyup",function(){
          this.value = this.value.replace(/[^0-9]/g,'');
     });


});