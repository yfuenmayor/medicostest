$(document).ready(function () {
    // Posicion de la columna a filtrar
    var posicion = $('#Posicion').val();
    var posicion2 = $('#Posicion2').val();
    
    // Ocultamos la columna
    $('.Ocultar').hide();
    // Definimos la URL
    var Urlbase = $('#url').val()

$(document).on('click', '#import', function(event) {
    event.preventDefault();
    alert('Importamos')
});




    // Cargamos la tabla
    var table = $('#DataTableSelect').DataTable( {
        initComplete: function () {
            this.api().column(posicion).every( function () {
                var column = this;
                select = $('#Estado')
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d.charAt(0).toUpperCase() + d.slice(1).toLowerCase()+'</option>' )
                } );
            } );
            this.api().column(posicion2).every( function () {
                var column = this;
                // Accion de seleccion de data segun la opcion del Combo
                select = $('#Estado2')
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
                // Se recorren los valores de la columna que funcionara como filtro
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d.charAt(0).toUpperCase() + d.slice(1).toLowerCase()+'</option>' )
                } );

                //Asignamos una opcion por default
                $('#Estado2  option[value="Gestionar"]').prop("selected", true);
                // Asignamos los valores a la tabla segun el dato anterior
                var val = $.fn.dataTable.util.escapeRegex(
                            $('#Estado2').val()
                        );
                column.search( val ? '^'+val+'$' : '', true, false ).draw();

            } );
        },
        language: {
            url: Urlbase+'assets/js/Spanish.lang'
        }, 
    } ); // Datatable
    
}); //DocReady

// var estados = table.column(6).data().unique().sort(); // Datos de una columna en especifico
    
    // Recorremos el array y asignamos los valores al combo
        // estados.each( function (key, value) { 
            // select.append( '<option value="'+key+'">'+key+'</option>' )
        // }); 