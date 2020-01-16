    // Definimos la URL
    var Urlbase = $('#url').val()

$(document).ready(function () {

// Validamos si hay datos cargados
if ($('#datos').val()) {
    listarAll();             
    $('#import').hide()
}

//ejecutamos el importe desde el excela la base de datos
$(document).on('click', '#import', function(event) {
    event.preventDefault();
    importe();
});


//activamos la tabla
dtt();

//funcion de busqueda
submit()


}); //DocReady

function importe() {
     // Ejecutamos la accion y la enviamos al servidor 
            $.ajax({
              type: "POST",
              url: Urlbase+'reporte/reportes/importe',
              dataType: "json",
              success: function (response) {
                // console.log(response)
                if (response == true) {
                 Swal.fire({
                  icon: 'success',
                  title: 'Datos importados a la BD',
                  showConfirmButton: true,
                })
                 //listamos los datos en la tabla
                 listarAll();
                 $('#import').hide()
                }
              }//success
            });//ajax  
}

// configuramos el Datatable
function dtt() {
    var table = $(".medicosCrud").DataTable({
        destroy: true,
        responsive: true,
        searching: false,
        paging: false,
        bInfo: false,
        language: espanol
    });
 }

// Listamos los datos de la tabla via AJAX y sus configuraciones 
function listarAll() {
    var table = $(".medicosCrud").DataTable({
        destroy: true,
        responsive: true,
        searching: false,
        paging: true,
        bInfo: false,
        ajax: {
            url: Urlbase+'reporte/reportes/getAllMedicos',
            type: "jsonp",
            dataSrc: ""
        },
        columns: [
            { data: "id" },
            { data: "nombre" },
            { data: "especialidad" },
            { data: "provincia"},
            { data: "barrio" },
            { data: "direccion" },
            { data: "obrasSociales" }
        ],
        language: espanol,

    });//datatable
    
    combo('getEspecialidades','#especialidad')
    combo('getProvincias','#provincia')
    combo('getBarrios','#barrio')

 }//listarAll

 // Listamos los datos de la tabla via AJAX y sus configuraciones (insertar/editar/eliminar)
 
 //Listamos segun la seleccion
function listarSelect(data) {
    var table = $(".medicosCrud").DataTable({
        destroy: true,
        responsive: true,
        searching: false,
        paging: true,
        bInfo: false,
        data: data,
        columns: [
            { data: "id" },
            { data: "nombre" },
            { data: "especialidad" },
            { data: "provincia"},
            { data: "barrio" },
            { data: "direccion" },
            { data: "obrasSociales" }
        ],
        language: espanol,

    });//datatable
 }//listarSelect

 // Declaramos el idioma del Datatable
 
 //configuramos el idioma
 
 //Configuramos el lenguaje
let espanol = {
    sProcessing: "Procesando...",
    sLengthMenu: "Mostrar _MENU_ resultados",
    sZeroRecords: "No se encontraron resultados",
    sEmptyTable: "Ningún dato disponible en esta tabla",
    sInfo: "Mostrando resultados _START_-_END_ de  _TOTAL_",
    sInfoEmpty: "Mostrando resultados del 0 al 0 de un total de 0 registros",
    sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
    sSearch: "Buscar:",
    sLoadingRecords: "Cargando...",
    oPaginate: {
        sFirst: "Primero",
        sLast: "Último",
        sNext: "Siguiente",
        sPrevious: "Anterior"
    }
 }

 // Funcion de Enviar datos al servidor para insertar o editar datos
 
 //Configuramos la busqueda
function submit(table) {
    $("#formOpciones").submit(function(e) {
      e.preventDefault(); // evitamos que redireccione el formulario

      // Variable del fomr
      var me = $(this);

      // Envio asincrono
      $.ajax({  
          type: "POST",
          url: me.attr("action"),
          data: me.serialize(),
          dataType: "json",  
        //respuesta del envio
        success: function(response) {
          if (response) {
            //Recargamos la tabla
            listarSelect(response)
              //Reseteamos form
            me[0].reset();
          } 

          }  // success
        });  //Ajax   
    });//submit

  }//funcion

  function combo(metodo,input) {
      $.post(Urlbase+'reporte/reportes/'+metodo,
         function(data) {
            $(input).removeAttr('disabled');
            $(input).html(data);

        });
  }