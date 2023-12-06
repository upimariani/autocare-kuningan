<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cDashboard extends CI_Controller
{

	public function index()
	{
		$this->load->view('Mekanik/Layout/head');
		$this->load->view('Mekanik/Layout/sidebar');
		$this->load->view('Mekanik/vDashboard');
		$this->load->view('Mekanik/Layout/footer');
	}
}

/* End of file cDashboard.php */
