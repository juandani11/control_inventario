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
                '<div class="col-7" style="padding-right:0px">'+
                    '<div class="input-group mb-3">'+
                        '<div class="input-group-prepend">'+
                            '<button type="button" class="btn btn-danger quitarProducto" idProducto="'+idProducto+'">X</button>'+
                        '</div>'+
                        '<input type="text" class="form-control nuevaDescripcionProducto" idProducto="'+idProducto+'" name="agregarProducto" value="'+descripcion+'" required readonly>'+
                    '</div>'+

                '</div>'+

                '<!-- Cantidad del producto -->'+

                '<div class="col-2">'+

                    '<div class="input-group mb-3">'+
                        '<input type="number" class="form-control nuevaCantidadProducto" name="nuevaCantidadProducto" min="1" value="1" nuevoStock="'+Number(stock-1)+'" stock="'+stock+'" required>'+

                    '</div>'+

                '</div>'+

                '<!-- Precio del producto -->'+

                '<div class="col-3 ingresoPrecio" style="padding-left:0px">'+

                    '<div class="input-group">'+

                        '<input type="text" class="form-control nuevoPrecioProducto" precioReal="'+precio+'" name="nuevoPrecioProducto" value="'+precio+'" readonly required>'+
                        '<div class="input-group-append">'+
                            '<div class="input-group-text"><i class="fas fa-dollar-sign"></i></div>'+
                        '</div>'+

                    '</div>'+
                '</div>'+
            '</div>')

            //SUMAR TOTA DE PRECIOS

            sumarTotalPrecios();

            //IMPUESTO

            agregarImpuesto();

            //AGRUPAR PRODUCTOS EN JSON

            listarProductos();

            // PONER FORMATO AL PRECIO DE LOS PRODUCTOS

            $(".nuevoPrecioProducto").number(true, 2);

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

    if($(".nuevoProducto").children().length == 0){

        $("#nuevoTotalVenta").val(0);
        $("#totalVenta").val(0);
        $("#nuevoTotalVenta").attr("total",0);
        $("#nuevoImpuestoVenta").val(0);

    }else {

        //SUMAR TOTA DE PRECIOS

        sumarTotalPrecios();

        //IMPUESTO

        agregarImpuesto();


        //AGRUPAR PRODUCTOS EN JSON

        listarProductos();

    }


});

/*=============================================
 AGREGANDO PRODUCTOS DESDE EL BOTÓN PARA DISPOSITIVOS
 =============================================*/

var numProducto = 0;

$(".btnAgregarProducto").click(function(){

    numProducto ++;

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

                        '<select class="form-control nuevaDescripcionProducto agregarProducto" idProducto="'+idProducto+'" id="producto'+numProducto+'" idProducto name="nuevaDescripcionProducto" required>' +

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

                            '<input type="text" class="form-control nuevoPrecioProducto" precioReal="" name="nuevoPrecioProducto" readonly required>'+

                            '<div class="input-group-append">'+

                                 '<div class="input-group-text"><i class="fas fa-dollar-sign"></i></div>'+

                            '</div>'+

                        '</div>'+

                    '</div>'+

                '</div>');

            // AGREGAR LOS PRODUCTOS AL SELECT

            respuesta.forEach(funcionForEach);

            function funcionForEach(item, index){

                if(item.stock != 0){

                    $("#producto"+numProducto).append(

                        '<option idProducto="'+item.id+'" value="'+item.descripcion+'">'+item.descripcion+'</option>'
                    )

                }

            }

            //SUMAR TOTA DE PRECIOS

            sumarTotalPrecios();

            //IMPUESTO

            agregarImpuesto();


            //AGRUPAR PRODUCTOS EN JSON

            listarProductos();

            // PONER FORMATO AL PRECIO DE LOS PRODUCTOS

            $(".nuevoPrecioProducto").number(true, 2);
        }

    })

});

/*=============================================
 SELECCIONAR PRODUCTO
 =============================================*/

$(".formularioVenta").on("change", "select.nuevaDescripcionProducto", function(){

    var nombreProducto = $(this).val();

    var nuevoPrecioProducto = $(this).parent().parent().parent().parent().children(".ingresoPrecio").children(".nuevoPrecioProducto");

    var nuevaCantidadProducto = $(this).parent().parent().parent().parent().children(".ingresoCantidad").children(".nuevaCantidadProducto");

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

            $(nuevaDescripcionProducto).attr("idProducto", respuesta["id"]);
            $(nuevaCantidadProducto).attr("stock", respuesta["stock"]);
            $(nuevaCantidadProducto).attr("nuevoStock", Number(respuesta["stock"])-1);
            $(nuevoPrecioProducto).val(respuesta["precio_venta"]);
            $(nuevoPrecioProducto).attr("precioReal", respuesta["precio_venta"]);


            // AGRUPAR PRODUCTOS EN FORMATO JSON

            listarProductos()

        }
    })
});

/*=============================================
 MODIFICAR LA CANTIDAD
 =============================================*/

$(".formularioVenta").on("change", "input.nuevaCantidadProducto", function(){
    var precio = $(this).parent().parent().parent().children(".ingresoPrecio").children().children(".nuevoPrecioProducto");

    var precioFinal = $(this).val() * precio.attr("precioReal");

    precio.val(precioFinal);

    var nuevoStock = Number($(this).attr("stock")) - $(this).val();

    $(this).attr("nuevoStock", nuevoStock);

    if(Number($(this).val()) > Number($(this).attr("stock"))){

        /*=============================================
         SI LA CANTIDAD ES SUPERIOR AL STOCK REGRESAR VALORES INICIALES
         =============================================*/

        $(this).val(1);

        var precioFinal = $(this).val() * precio.attr("precioReal");

        precio.val(precioFinal);

        sumarTotalPrecios();

        //SUMAR TOTA DE PRECIOS

        agregarImpuesto();

        Swal.fire({
            title: "La cantidad supera el Stock",
            text: "¡Sólo hay "+$(this).attr("stock")+" unidades!",
            icon: "error",
            confirmButtonText: "¡Cerrar!"
        });

    }

    //SUMAR TOTA DE PRECIOS

    sumarTotalPrecios();

    //SUMAR TOTA DE PRECIOS

    agregarImpuesto();

    //AGRUPAR PRODUCTOS EN JSON

    listarProductos();

});

/*=============================================
 SUMAR TODOS LOS PRECIOS
 =============================================*/

function sumarTotalPrecios() {

    var precioItem = $(".nuevoPrecioProducto");
    var arraySumaPrecio = [];

    for (var i = 0; i < precioItem.length; i++) {

        arraySumaPrecio.push(Number($(precioItem[i]).val()));

    }

    function sumaArrayPrecios(total, numero){

        return total + numero;

    }

    var sumaTotalPrecio = arraySumaPrecio.reduce(sumaArrayPrecios);

    $("#nuevoTotalVenta").val(sumaTotalPrecio);
    $("#totalVenta").val(sumaTotalPrecio);
    $("#nuevoTotalVenta").attr("total",sumaTotalPrecio);
}

/*=============================================
 FUNCIÓN AGREGAR IMPUESTO
 =============================================*/

function agregarImpuesto(){

    var impuesto = $("#nuevoImpuestoVenta").val();
    var precioTotal = $("#nuevoTotalVenta").attr("total");

    var precioImpuesto = Number(precioTotal * impuesto/100);

    var totalConImpuesto = Number(precioImpuesto) + Number(precioTotal);

    $("#nuevoTotalVenta").val(totalConImpuesto);

    $("#totalVenta").val(totalConImpuesto);

    $("#nuevoPrecioImpuesto").val(precioImpuesto);

    $("#nuevoPrecioNeto").val(precioTotal);

}

/*=============================================
 CUANDO CAMBIA EL IMPUESTO
 =============================================*/

$("#nuevoImpuestoVenta").change(function(){

    agregarImpuesto();

});

/*=============================================
 FORMATO AL PRECIO FINAL
 =============================================*/

$("#nuevoTotalVenta").number(true, 2);

/*=============================================
 SELECCIONAR MÉTODO DE PAGO
 =============================================*/

$("#nuevoMetodoPago").change(function() {

    var metodo = $(this).val();

    if (metodo == "Efectivo") {

        $(this).parent().parent().removeClass("col-6");

        $(this).parent().parent().addClass("col-4");

        $(this).parent().parent().parent().children(".cajasMetodoPago").addClass("row");

        $(this).parent().parent().parent().children(".cajasMetodoPago").html(
            '<div class="col-6">'+
                '<div class="input-group">'+
                    '<input type="text" class="form-control" id="nuevoValorEfectivo" placeholder="0000" required>'+
                    '<div class="input-group-append">'+
                        '<div class="input-group-text"><i class="fas fa-dollar-sign"></i></div>'+
                    '</div>'+
                '</div>'+
            '</div>'+
            '<div class="col-6" id="capturarCambioEfectivo">'+
                '<div class="input-group">'+
                    '<input type="text" class="form-control" id="nuevoCambioEfectivo" placeholder="0000" readonly required>'+
                    '<div class="input-group-append">'+
                        '<div class="input-group-text"><i class="fas fa-dollar-sign"></i></div>'+
                    '</div>'+
                '</div>'+
            '</div>'
        );

        // Agregar formato al precio

        $('#nuevoValorEfectivo').number( true, 2);
        $('#nuevoCambioEfectivo').number( true, 2);

        // Listar Metodo en la entrad

        listarMetodos();

    }else {

        $(this).parent().parent().removeClass('col-xs-4');

        $(this).parent().parent().addClass('col-xs-6');

        $(this).parent().parent().parent().children('.cajasMetodoPago').html(
            '<div class="col-12">' +
                '<div class="input-group">' +
                    '<input type="text" class="form-control" id="nuevoCodigoTransaccion" placeholder="Código transacción" required>' +
                    '<div class="input-group-append">' +
                        '<div class="input-group-text"><i class="fas fa-lock"></i></div>' +
                    '</div>' +
                '</div>' +
            '</div>'
        )
    }
});

/*=============================================
 CAMBIO EN EFECTIVO
 =============================================*/
$(".formularioVenta").on("change", "input#nuevoValorEfectivo", function(){

    var efectivo = $(this).val();

    var cambio =  Number(efectivo) - Number($('#nuevoTotalVenta').val());

    var nuevoCambioEfectivo = $(this).parent().parent().parent().children('#capturarCambioEfectivo').children().children('#nuevoCambioEfectivo');

    nuevoCambioEfectivo.val(cambio);

});


/*=============================================
 CAMBIO TRANSACCIÓN
 =============================================*/
$(".formularioVenta").on("change", "input#nuevoCodigoTransaccion", function(){

    // Listar método en la entrada
    listarMetodos()


});


/*=============================================
 LISTAR TODOS LOS PRODUCTOS
 =============================================*/

function listarProductos(){

    var listaProductos = [];

    var descripcion = $(".nuevaDescripcionProducto");

    var cantidad = $(".nuevaCantidadProducto");

    var precio = $(".nuevoPrecioProducto");

    for(var i = 0; i < descripcion.length; i++){

        listaProductos.push({ "id" : $(descripcion[i]).attr("idProducto"),
            "descripcion" : $(descripcion[i]).val(),
            "cantidad" : $(cantidad[i]).val(),
            "stock" : $(cantidad[i]).attr("nuevoStock"),
            "precio" : $(precio[i]).attr("precioReal"),
            "total" : $(precio[i]).val()})

    }


    $("#listaProductos").val(JSON.stringify(listaProductos));

}


/*=============================================
 LISTAR MÉTODO DE PAGO
 =============================================*/

function listarMetodos(){

    var listaMetodos = "";

    if($("#nuevoMetodoPago").val() == "Efectivo"){

        $("#listaMetodoPago").val("Efectivo");

    }else{

        $("#listaMetodoPago").val($("#nuevoMetodoPago").val()+"-"+$("#nuevoCodigoTransaccion").val());

    }

}


/*=============================================
 BOTON EDITAR VENTA
 =============================================*/
$(".tablas").on("click", ".btnEditarVenta", function(){

    var idVenta = $(this).attr("idVenta");

    window.location = "index.php?ruta=editar-venta&idVenta="+idVenta;


})

/*=============================================
 FUNCIÓN PARA DESACTIVAR LOS BOTONES AGREGAR CUANDO EL PRODUCTO YA HABÍA SIDO SELECCIONADO EN LA CARPETA
 =============================================*/

function quitarAgregarProducto(){

    //Capturamos todos los id de productos que fueron elegidos en la venta
    var idProductos = $(".quitarProducto");

    //Capturamos todos los botones de agregar que aparecen en la tabla
    var botonesTabla = $(".tablaVentas tbody button.agregarProducto");

    //Recorremos en un ciclo para obtener los diferentes idProductos que fueron agregados a la venta
    for(var i = 0; i < idProductos.length; i++){

        //Capturamos los Id de los productos agregados a la venta
        var boton = $(idProductos[i]).attr("idProducto");

        //Hacemos un recorrido por la tabla que aparece para desactivar los botones de agregar
        for(var j = 0; j < botonesTabla.length; j ++){

            if($(botonesTabla[j]).attr("idProducto") == boton){

                $(botonesTabla[j]).removeClass("btn-primary agregarProducto");
                $(botonesTabla[j]).addClass("btn-default");

            }
        }

    }

}

/*=============================================
 CADA VEZ QUE CARGUE LA TABLA CUANDO NAVEGAMOS EN ELLA EJECUTAR LA FUNCIÓN:
 =============================================*/

$('.tablaVentas').on( 'draw.dt', function(){

    quitarAgregarProducto();

});

/*=============================================
 BORRAR VENTA
 =============================================*/
$(".tablas").on("click", ".btnEliminarVenta", function(){

    var idVenta = $(this).attr("idVenta");

    Swal.fire({
        title: '¿Está seguro de borrar la venta?',
        text: "¡Si no lo está puede cancelar la accíón!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar venta!'
    }).then(function(result){
        if (result.value) {

            window.location = "index.php?ruta=ventas&idVenta="+idVenta;
        }

    })

});