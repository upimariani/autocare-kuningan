<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cTransaksiSelesai extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mReservasi');
	}

	public function index()
	{
		$data = array(
			'transaksi' => $this->mReservasi->select_reservasi()
		);
		$this->load->view('Admin/Layout/head');
		$this->load->view('Admin/Layout/sidebar');
		$this->load->view('Admin/vTransaksiSelesai', $data);
		$this->load->view('Admin/Layout/footer');
	}
	public function detail_service($id)
	{
		$data = array(
			'detail' => $this->mReservasi->detail_transaksi($id)
		);
		$this->load->view('Admin/Layout/head');
		$this->load->view('Admin/Layout/sidebar');
		$this->load->view('Admin/vDetailTransaksi', $data);
		$this->load->view('Admin/Layout/footer');
	}
}

/* End of file cTransaksiSelesai.php */
