
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
      <button type="submit" class="btn btn-primary mb-2" name="import">Importar datos</button>
      <div class=" mx-sm-5 mb-2">
        <input type="file" name="file" id="file" accept=".xls, .xlsx">
      </div>
    </form>
  </div>
</div>

<div class="reporte">
<section>

      <!-- Filtros -->
    <div class="container" >
      <div class="row mt-3">
        <div class="col-md-6">
          <h2><small>Lista de medicos disponibles</small></h2>
        </div>
      </div>
    <div class="row justify-content-around m-4" >
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <div class="form-group">
                <label for="exampleFormControlSelect1">Especialidad</label>
                <select class="form-control" id="exampleFormControlSelect1">
                  <option disabled selected>Seleccione...</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <div class="form-group">
                <label for="exampleFormControlSelect1">Provincia</label>
                <select class="form-control" id="exampleFormControlSelect1">
                  <option disabled selected>Seleccione...</option>
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <div class="form-group">
                <label for="exampleFormControlSelect1">Barrio</label>
                <select class="form-control" id="exampleFormControlSelect1">
                  <option disabled selected>Seleccione...</option>
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                </select>
              </div>
          </div>
        </div>

</div>
      </div>
      </div>
      <!-- Tabla de medicos -->
</section>

<div class="container">
  <!-- Tabla de medicos -->
    <div class="row justify-content-around">
    <div class="col-12">
      <table class="table table-borderless table-dark" id="DatatableSelect">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Nombre</th>
            <th scope="col">Direccion</th>
            <th scope="col"></th>
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
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="<?php echo base_url('assets/js/DatatableSelect.js')?>"></script>
  </body>
</html>