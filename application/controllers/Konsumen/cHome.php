<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cHome extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mHome');
		$this->load->model('mSparepart');
	}

	public function index()
	{
		$data = array(
			'sparepart' => $this->mSparepart->select(),
			'ulasan' => $this->mHome->ulasan()
		);
		$this->load->view('Konsumen/Layout/head');
		$this->load->view('Konsumen/Layout/nav');
		$this->load->view('Konsumen/vHome', $data);
		$this->load->view('Konsumen/Layout/footer');
	}
	public function reservasi()
	{
		$data = array(
			'id_pelanggan' => $this->session->userdata('id_konsumen'),
			'date' => date('Y-m-d'),
			'plat_kendaraan' => $this->input->post('plat'),
			'model_kendaraan' => $this->input->post('model'),
			'brand_kendaraan' => $this->input->post('brand'),
			'tahun_kendaraan' => $this->input->post('tahun'),
			'jam_kedatangan' => $this->input->post('jam'),
			'jenis_service' => $this->input->post('jenis'),
			'stat_reservasi' => '0',
			'total_pembayaran' => '0'
		);
		$this->mHome->reservasi($data);
		$this->session->set_flashdata('success', 'Anda Berhasil Reservasi Service');
		redirect('Konsumen/cHome');
	}
}

/* End of file cHome.php */
