
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>MedicosTest</title>
  </head>
  <body>

    <!-- NavBar -->
    <nav class="navbar navbar-light bg-light">
      <a class="navbar-brand" href="#">
        <img src="<?php echo base_url('assets/img/icomed.jpg')?>" width="30" height="30" alt="">
        MedicosTest
      </a>
    </nav>

<div class="container ">
  <div class="row mt-3">
    <form class="form-inline" method="POST" enctype="multipart/form-data" id="excelSend">
      <button type="button" class="btn btn-outline-success mb-2" id="import">Importar datos</button>
    </form>

  </div>
</div>

<div class="reporte" id="reporte" >
<section>

      <!-- Filtros -->
    <div class="container" >
      <div class="row mt-3">
        <div class="col-md-6">
          <h2><small>Lista de medicos disponibles</small></h2>
        </div>
      </div>
    <div class="row justify-content-around m-4" >
      <form class="form-inline" id="formOpciones" action="<?php echo base_url('reporte/reportes/getBusqueda');?>" method="post">
        <!-- Primer Selec -->
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <div class="form-group">
                <label for="exampleFormControlSelect1">Especialidad</label>
                <select class="form-control" id="especialidad" name="especialidad">               
                <option disabled selected>Seleccione...</option>
                </select>
              </div>
            </div>
          </div>
        </div>
        <!-- Segundo Select -->
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <div class="form-group">
                <label for="exampleFormControlSelect1">Provincia</label>
                <select class="form-control" id="provincia" name="provincia">
                <option disabled selected>Seleccione...</option>
                </select>
              </div>
            </div>
          </div>
        </div>
        <!-- Tercer Select -->
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <div class="form-group">
                <label for="exampleFormControlSelect1">Barrio</label>
                <select class="form-control" id="barrio" name="barrio">
                <option disabled selected>Seleccione...</option>
                </select>
              </div>
          </div>
        </div>
        </div> 

        <div class="col-md-3">
              <div class="form-group">
                <input type="hidden" id="datos" value="<?php echo $info = (isset($cargado)) ? $cargado : null ?>">
      <button type="submit" class="btn btn-outline-primary" id="buscar">Buscar</button>
              </div>
        </div> 
        </form>
      </div>

      </div>
      
</section>

<div class="container">
  <!-- Tabla de medicos -->
    <div class="row justify-content-around">
    <div class="col-12">
      <table class="table table-borderless table-dark medicosCrud" id="DatatableSelect">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Nombre</th>
            <th scope="col">Especialidad</th>
            <th scope="col">Provincia</th>
            <th scope="col">Barrio</th>
            <th scope="col">Direccion</th>
            <th scope="col">Obras Sociales</th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>
    </div>
    </div>
</div>
    </div>
   
<input type="hidden" id="url" value="<?php echo base_url()?>">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="<?php echo base_url('assets/js/medico.js')?>"></script>
    <script src="<?php echo base_url('assets/js/datatables.min.js')?>"></script>
  </body>
</html>