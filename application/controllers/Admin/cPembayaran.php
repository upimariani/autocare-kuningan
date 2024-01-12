<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cPembayaran extends CI_Controller
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
		$this->load->view('Admin/vPembayaran', $data);
		$this->load->view('Admin/Layout/footer');
	}
	public function konfirmasi($id)
	{
		$data = array(
			'stat_reservasi' => '3'
		);
		$this->mReservasi->update_stat($id, $data);
		$this->session->set_flashdata('success', 'Reservasi Service Berhasil Dikonfirmasi!');
		redirect('Admin/cPembayaran');
	}
}

/* End of file cPembayaran.php */
