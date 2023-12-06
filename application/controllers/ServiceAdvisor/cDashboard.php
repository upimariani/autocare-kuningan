<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cDashboard extends CI_Controller
{

	public function index()
	{
		$this->load->view('ServiceAdvisor/Layout/head');
		$this->load->view('ServiceAdvisor/Layout/sidebar');
		$this->load->view('ServiceAdvisor/vDashboard');
		$this->load->view('ServiceAdvisor/Layout/footer');
	}
}

/* End of file cDashboard.php */
