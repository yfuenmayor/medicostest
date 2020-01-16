**************
Prueba Medicos 
**************

Prueba para comprobar las habilidades de programacion para ingreso a la empresa, esta prueba fue realizada en php 7.3 utilizando como framework del mismo CodeIgniter 3 bajo el patrom HMVC (Este no necesita instalacion, solo copiar el repositorio en el servidor de php), usando como servidor xampp y phpmyadmin para gestionar la base de datos.

Es una aplicacion sencilla que no se desarrollo con todas sus validaciones ya que es para probar la logica de programacion de la persona, los archivos que pueden revisar estan en los siguientes directorios:

.-application/modules/reporte : en esta carpeta se encuentra el controlador, la vista y el modelo que se uso para su funcionamiento con php.

.-application/assets/js/datatables : se encuentra el js de la configuracion del DataTable que se uso para el reporte

.-application/assets/js/medico : en este archivo se encuentra la configuracion de los funcionamientos realizados con JavaScript para los reportes y la busqueda.

.-application/assets/medicos.xlsx : es el archivo con la data tomada de la pagina solicitada por la empresa (https://www.doctoraliar.com), se tomo una muestra de 20 medicos de diferentes especialidades y lugares

.-application/libraries : se encuentra la libreria que se uso para la importacion de los datos mediante el archivo xlsx


**************
Requerimientos
**************

Deberás:

Recorrer con una expresión regular de todos los médicos y guardar en una tabla ID de médico, obras sociales y dirección.

Pasar la direccion por una api de google, validar el domicilio y guardar latitud y longitud

Crear un reporte de consulta con filtro por especialidad, provincia y barrio

--No te preocupes por la estética, sino por el código--

***************
Nota Importante
***************

Si bien unos de los requerimientos que piden es validar las direcciones con una API REST de google, el mismo no lo pude realizar no por falta de conocimiento sino que para poder usar las API de google hay que registrar un metodod de pago a traves de tarjeta de credito y no poseo alguna ! 

Explico el funcionamiento de este requerimiento:

Se penso tomar los datos de la direccion cuando se hace el importe del Excel y estos pasarlos a la API REST de google llamada Geocoding por la url:

https://maps.googleapis.com/maps/api/geocode/json?address=*-Direccion-*,+CA&key=YOUR_API_KEY

esto nos devolveria un json con la direccion completa de ser correcta, se tomaria la latitud y longitud de la misma y se almacenaria en una variable para luego insertarla con los datos. De ser incorrecta esas variables irian con un valor nulo para no afectar la insercion de los mismos.


***************
Funcionamiento:
***************

Segun los requerimientos la app se programo para leer los datos de un archivo Excel e ingresar los mismos a la base de datos. Esta importacion de hace con los datos del archivo medicos.xlsx que se encuentra en el directorio: medicostest/assets/medicos.xlsx.

Luego de leer el archivo y cargar los datos en la base de datos se mostrara una tabla con un listado de todos los medicos disponibles (siendo este un reporte general). Para obtener un reporte mas detallado se utilizaran los combos de opciones que se muestran arriba de la tabla pulsando luego el boton buscar.+

Para volver al listado general solo se tendra que pulsar el boton sin seleccionar ninguna opcion

***
Run
***

- Clonar el repositorio en la carpeta de htdocs o la del servidor de apache

- Crear la base de datos en el gestor con el nombre de medicos
	Nota: la configuracion de la base de datos de encuentra en el directotio siguiente:
		application/config/database.php

- Ejecutar el scrip que se encuentra en el directotio y asi crear la tabla para la importacion:
	application/assets/DB/medicos.sql

- Iniciar la app con la url: http://localhost/medicostest/

- Al iniciar solo se muestra el reporte sindatos y los combos de seleccion vacios, se tiene que pulsar el boton que esta en la parte superior izquierda para importar los datos del Excel a la base de datos.

- Luego de cargados podra visualizar el reporte general y poder buscar por los filtros requeridos.

