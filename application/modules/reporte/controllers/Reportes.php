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
		$this->load->view('reportes_view');
	}
}
