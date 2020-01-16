
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reportes_model extends CI_Model {

	public function __construct() {
	    parent::__construct();
	    $this->table = 'medicos';
	} 

	public function setMedicos($data)
	{
		$this->db->insert_batch($this->table, $data);
		return True;
	}

	public function getMedicos()
	{
		$query=$this->db->get($this->table);
    	return $query->result();
	}

	public function getEspecialidades()
	{
		$this->db->select('especialidad');
		$this->db->from($this->table);
		$this->db->group_by('especialidad');
		$query=$this->db->get();
    	return $query->result();
	}

	public function getProvincias()
	{
		$this->db->select('provincia');
		$this->db->from($this->table);
		$this->db->group_by('provincia');
		$query=$this->db->get();
    	return $query->result();
	}

	public function getBarrios()
	{
		$this->db->select('barrio');
		$this->db->from($this->table);
		$this->db->group_by('barrio');
		$query=$this->db->get();
    	return $query->result();
	}

	public function getBusqueda($data)
	{
				 $this->db->where($data);
		$query = $this->db->get($this->table);
    	return $query->result();
	}

}

/* End of file Reportes_model.php */
/* Location: ./application/modules/reporte/models/Reportes_model.php */