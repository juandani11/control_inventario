/*=============================================
 CARGAR LA TABLA DINÁMICA DE PRODUCTOS
 =============================================*/

// $.ajax({

// 	url: "ajax/datatable-ventas.ajax.php",
// 	success:function(respuesta){

 //		console.log("respuesta", respuesta);

 	//}
//});

$('.tablaVentas').DataTable( {
    "ajax": "ajax/datatable-ventas.ajax.php",
    "deferRender": true,
    "retrieve": true,
    "processing": true,
    "language": {

        "sProcessing":     "Procesando...",
        "sLengthMenu":     "Mostrar _MENU_ registros",
        "sZeroRecords":    "No se encontraron resultados",
        "sEmptyTable":     "Ningún dato disponible en esta tabla",
        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":    "",
        "sSearch":         "Buscar:",
        "sUrl":            "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst":    "Primero",
            "sLast":     "Último",
            "sNext":     "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }

    }

} );

/*=============================================
 AGREGANDO PRODUCTOS A LA VENTA DESDE LA TABLA
 =============================================*/

$(document).on("click", ".agregarProducto", function(){

    var idProducto = $(this).attr("idProducto");

    console.log("idProducto", idProducto);

    $(this).removeClass("btn-primary agregarProducto");

    $(this).addClass("btn-default");

    var datos = new FormData();
    datos.append("idProducto", idProducto);

    $.ajax({

        url: "ajax/productos.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {

            var descripcion = respuesta["descripcion"];
            var stock = respuesta["stock"];
            var precio = respuesta["precio_venta"];

            /*=============================================
             EVITAR AGREGAR PRODUTO CUANDO EL STOCK ESTÁ EN CERO
             =============================================*/
            if(stock == 0){

                Swal.fire({
                    title: "No hay stock disponible",
                    icon: "error",
                    confirmButtonText: "¡Cerrar!"
                });

                $("button[idProducto='"+idProducto+"']").addClass("btn-primary agregarProducto");

                return;

            }

            $(".nuevoProducto").append(
            '<div class="row" style="padding:5px 15px">'+
            '<div class="col-8" style="padding-right:0px">'+
            '<div class="input-group mb-3">'+
            '<div class="input-group-prepend">'+
            '<button type="button" class="btn btn-danger quitarProducto" idProducto="'+idProducto+'">Action</button>'+
            '</div>'+
            '<!-- /btn-group -->'+
            '<input type="text" class="form-control agregarProducto" name="agregarProducto" value="'+descripcion+'" required readonly>'+
            '</div>'+

            '</div>'+

            '<!-- Cantidad del producto -->'+

            '<div class="col-2">'+

            '<div class="input-group mb-3">'+
            '<input type="number" class="form-control nuevaCantidadProducto" name="nuevaCantidadProducto" min="1" value="1" stock="'+stock+'" required>'+

            '</div>'+

            '</div>'+

            '<!-- Precio del producto -->'+

            '<div class="col-2" style="padding-left:0px">'+

            '<div class="input-group">'+

            '<input type="text" class="form-control nuevoPrecioProducto" name="nuevoPrecioProducto" value="'+precio+'" readonly required>'+
            '<div class="input-group-append">'+
            '<div class="input-group-text"><i class="fas fa-dollar-sign"></i></div>'+
            '</div>'+

            '</div>'+
            '</div>'+
            '</div>')
        }
    })

});

/*=============================================
 CUANDO CARGUE LA TABLA CADA VEZ QUE NAVEGUE EN ELLA
 =============================================*/
$(document).on("draw.dt", function(){

    if(localStorage.getItem("quitarProducto") != null){

        var listaIdProductos = JSON.parse(localStorage.getItem("quitarProducto"));

        for(var i = 0; i < listaIdProductos.length; i++){

            $(".recuperarBoton[idProducto='"+listaIdProductos[i]["idProducto"]+"']").removeClass('btn-default');
            $(".recuperarBoton[idProducto='"+listaIdProductos[i]["idProducto"]+"']").addClass('btn-primary agregarProducto');

        }


    }


});

/*=============================================
 QUITAR PRODUCTOS DE LA VENTA Y RECUPERAR BOTÓN
 =============================================*/
var idQuitarProducto = [];

localStorage.removeItem("quitarProducto");

$(document).on("click", ".quitarProducto", function() {

    $(this).parent().parent().parent().parent().remove();

    var idProducto = $(this).attr("idProducto");

    if(localStorage.getItem("quitarProducto") == null){

        idQuitarProducto = [];

    }else{

        idQuitarProducto.concat(localStorage.getItem("quitarProducto"))

    }

    idQuitarProducto.push({"idProducto":idProducto});

    localStorage.setItem("quitarProducto", JSON.stringify(idQuitarProducto));

    $(".recuperarBoton[idProducto='"+idProducto+"']").removeClass('btn-default');

    $(".recuperarBoton[idProducto='"+idProducto+"']").addClass('btn-primary agregarProducto');

});

/*=============================================
 AGREGANDO PRODUCTOS DESDE EL BOTÓN PARA DISPOSITIVOS
 =============================================*/


$(".btnAgregarProducto").click(function(){
    var datos = new FormData();
    datos.append("traerProductos", "ok");

    $.ajax({

        url: "ajax/productos.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {


            $(".nuevoProducto").append(

                '<div class="row" style="padding:5px 15px">'+

                   '<div class="col-8" style="padding-right:0px">'+

                     '<div class="input-group mb-3">'+

                        '<div class="input-group-prepend">'+

                            '<button type="button" class="btn btn-danger quitarProducto" idProducto>Action</button>'+

                        '</div>'+

                        '<select class="form-control nuevaDescripcionProducto" idProducto name="nuevaDescripcionProducto" required>' +

                            '<option>Seleccine el producto</option>'+

                        '</select>'+

                     '</div>'+

                   '</div>'+

                    '<!-- Cantidad del producto -->'+

                    '<div class="col-2 ingresoCantidad">'+

                    '<div class="input-group mb-3">'+

                    '<input type="number" class="form-control nuevaCantidadProducto" name="nuevaCantidadProducto" min="1" value="1" stock required>'+

                    '</div>'+

                    '</div>'+

                    '<!-- Precio del producto -->'+

                    '<div class="col-2 ingresoPrecio" style="padding-left:0px">'+

                        '<div class="input-group">'+

                            '<input type="text" class="form-control nuevoPrecioProducto" name="nuevoPrecioProducto" value="" readonly required>'+

                            '<div class="input-group-append">'+

                                 '<div class="input-group-text"><i class="fas fa-dollar-sign"></i></div>'+

                            '</div>'+

                        '</div>'+

                    '</div>'+

                '</div>');

            // AGREGAR LOS PRODUCTOS AL SELECT

            respuesta.forEach(funcionForEach);

            function funcionForEach(item, index){



                    $(".nuevaDescripcionProducto").append(

                        '<option idProducto="'+item.id+'" value="'+item.descripcion+'">'+item.descripcion+'</option>'
                    )



            }
        }
    })

});

/*=============================================
 SELECCIONAR PRODUCTO
 =============================================*/

$(".formularioVenta").on("change", "select.nuevaDescripcionProducto", function(){

    var nombreProducto = $(this).val();

    var nuevoPrecioProducto = $(this).parent().parent().parent().children(".ingresoPrecio").children().children(".nuevoPrecioProducto").children();

    console.log("nuevoPrecioProducto",nuevoPrecioProducto);
    var datos = new FormData();
    datos.append("nombreProducto", nombreProducto);


    $.ajax({

        url: "ajax/productos.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {

            $(".nuevaCantidadProducto").attr("stock", respuesta["stock"]);
            $(".nuevoPrecioProducto").val(respuesta["precio_venta"]);
        }
    })
});