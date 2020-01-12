<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reporte extends MX_Controller {

	public function index()
	{
		$this->load->view('reportes_view');
	}
}
