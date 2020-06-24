function AgregarDetalle()
{
    let CodigoProducto = $('#IdProducto').val();//Capturar el ´código del producto seleccionado
    let NombreProducto = $('select[name="IdProducto"] option:selected').text(); // Capturar el código del producto que está seleccionado
    let CantidadProducto = $('#CantidadProducto').val(); //Capturar la Cantidad del producto
    let PrecioProducto = $('#PrecioProducto').val(); //Capturar El precio
    let ValorDetalle = CantidadProducto*PrecioProducto;

    $('#ProductosAgregados').val(parseInt($('#ProductosAgregados').val()) + 1);//Incrementar Productos Agregados
    let ConsecutivoProducto = $('#ProductosAgregados').val();

    let htmlTags = '<tr ="'+ConsecutivoProducto+'">' +
    '<td>' + NombreProducto + '</td>' +
    '<td>' + '<input type="text" id="IdProducto'+ConsecutivoProducto+'" name="IdProducto'+ConsecutivoProducto+'" value="'+CodigoProducto+'">'+'</td>' +
    '<td>' + '<input type="text" id="CantidadProducto'+ConsecutivoProducto+'" name="CantidadProducto'+ConsecutivoProducto+'" value="'+CantidadProducto+'">'+'</td>' +
    '<td>' + '<input type="text" id="PrecioProducto'+ConsecutivoProducto+'" name="PrecioProducto'+ConsecutivoProducto+'" value="'+PrecioProducto+'">'+'</td>' +
    '<td>' + '<input type="text" id="ValorDetalle'+ConsecutivoProducto+'" name="ValorDetalle'+ConsecutivoProducto+'" value="'+ValorDetalle+'">'+'</td>' +
    '<td>' +  '<button type="button" class="borrar" >Eliminar</button>' +'</td>' +
    '</tr>';
   $('#ListaProductos tbody').append(htmlTags);//app agregar al final de la tabla filas
} 

$(function (){
     $(document).on('click','.borrar',function(event){
          event.preventDefault();$(this).closest('tr').remove();
     });
});

$(document).ready(function(){

     $(".solo_numeros").on("keyup",function(){
          this.value = this.value.replace(/[^0-9]/g,'');
     });


});

$(document).ready(function(){
     $("#AgregarProducto").click(function(){

          let validado=0;

          if ($("#IdCliente").val() == 0) {

               $("#validacion_cliente").text("*");
               $("#validacion_cliente2").text("Debe Seleccionar una Empresa");
          }else{

               $("#validacion_cliente").text("");
               $("#validacion_cliente2").text("");
               validado++;
          }
          if ($("#IdProducto").val() == 0) {

               $("#validacion_producto").text("*");
               $("#validacion_producto2").text("Debe Seleccionar un producto");
          }else{
               $("#validacion_producto").text("");
               $("#validacion_producto2").text("");
               validado++;
          }

          if ($("#PrecioProducto").val() == 0) {

               $("#validacion_precio").text("*");
               $("#validacion_precio2").text("Debe Digitar el precio del producto");
          }else{
               $("#validacion_precio").text("");
               $("#validacion_precio2").text("");
               validado++;
          }

          if ($("#CantidadProducto").val() == 0) {
               $("#validacion_cantidad").text("*");
               $("#validacion_cantidad2").text("Debe Digitar la cantidad del producto");
          }else{
               $("#validacion_cantidad").text("");
               $("#validacion_cantidad2").text("");
               validado++;
          }

          if (validado==4)
          {
               AgregarDetalle();
               
          }
          else{
               Swal.fire({
                    title:'Error en la creacion',text:'Campos pendientes por validar',
                    // icon:'error',
                    // footer:'<span class="rojo">Kreemo Solution Systems',
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
     $("#FrmCrearFactura").submit(function(event){
          event.preventDefault();

          let validado = 0;

          if($("#ProductosAgregados").val() == 0)
          {
               alert("Sin productos agregados");
          }
          else
          {
               validado++;
          }

          if(validado == 1)
          {
               document.FrmCrearFactura.submit();
          }
          else
          {
               alert("Debe agregar productos");
          }

     });
});