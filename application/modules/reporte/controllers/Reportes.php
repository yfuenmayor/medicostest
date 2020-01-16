<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reportes extends MX_Controller {

public function __construct()
{
	parent::__construct();
	$this->load->model('Reportes_model');
	$this->load->library('excel');
}
	public function index()
	{
		//Validamos si hay datos cargados
		$datos = count($this->Reportes_model->getMedicos());

		if ($datos > 0) { 
			$data['cargado'] = 'si';
			$this->load->view('reportes_view',$data);
		}else{
			$this->load->view('reportes_view');
		}
		//mostramos la vista
	}

	public function importe()
	{
		//directorio del archivo a importar
		$path = 'assets/medicos.xlsx';

		//Obtener los datos del archivo atraves de la libreria
		$object = PHPExcel_IOFactory::load($path);

	   foreach($object->getWorksheetIterator() as $worksheet)
	   {
	    $highestRow = $worksheet->getHighestRow();
	    $highestColumn = $worksheet->getHighestColumn();
	    for($row=2; $row<=$highestRow; $row++)
	    {
	     $nombre = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
	     $especialidad = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
	     $provincia = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
	     $barrio = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
	     $direccion = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
	     $obras = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
	     $data[] = array(
	      'nombre'  => $nombre,
	      'especialidad'   => $especialidad,
	      'obrasSociales'   => $obras,
	      'provincia'    => $provincia,
	      'barrio'  => $barrio,
	      'direccion'   => $direccion
	     );
	    }//for
	   }//foreach

	   $result = $this->Reportes_model->setMedicos($data);
	
		echo $result;

	}// importe

	public function getAllMedicos()
	{
		$result = $this->Reportes_model->getMedicos();
		echo json_encode($result);
	}

	public function getBusqueda()
	{
		($this->input->post('especialidad')) ? $data['especialidad'] = $this->input->post('especialidad') : null ;
		($this->input->post('provincia')) ? $data['provincia'] = $this->input->post('provincia') : null ;
		($this->input->post('barrio')) ? $data['barrio'] = $this->input->post('barrio') : null ;
		
		$result = (isset($data)) ? $this->Reportes_model->getBusqueda($data) : $this->Reportes_model->getMedicos() ;
		
		echo json_encode($result);

	}

	public function getEspecialidades()
	{
		$especialidades = $this->Reportes_model->getEspecialidades();
		# Recorremos el array y establecemos los valores del select
                echo '<option disabled selected>Seleccione...</option>'; 
          foreach($especialidades as $esp){
                echo '<option value="'.  $esp->especialidad .'">'.  $esp->especialidad .'</option>';
          }//Foreach
	}

	public function getProvincias()
	{
		$provincias = $this->Reportes_model->getProvincias();
		# Recorremos el array y establecemos los valores del select
                echo '<option disabled selected>Seleccione...</option>'; 
          foreach($provincias as $pro){
                echo '<option value="'.  $pro->provincia .'">'.  $pro->provincia .'</option>';
          }//Foreach
	}

	public function getBarrios()
	{
		$barrios = $this->Reportes_model->getBarrios();
		# Recorremos el array y establecemos los valores del select
                echo '<option disabled selected>Seleccione...</option>'; 
          foreach($barrios as $bar){
                echo '<option value="'.  $bar->barrio .'">'.  $bar->barrio .'</option>';
          }//Foreach
	}
}
