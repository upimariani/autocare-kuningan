<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cTransaksi extends CI_Controller
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
		$this->load->view('Mekanik/Layout/head');
		$this->load->view('Mekanik/Layout/sidebar');
		$this->load->view('Mekanik/vTransaksi', $data);
		$this->load->view('Mekanik/Layout/footer');
	}
	public function estimasi_waktu($id)
	{
		$data = array(
			'estimasi_service' => $this->input->post('waktu')
		);
		$this->db->where('id_reservasi', $id);
		$this->db->update('reservasi_service', $data);

		$this->session->set_flashdata('success', 'Data estimasi berhasil ditambahkan!');
		redirect('Mekanik/cTransaksi');
	}
	public function detail_service($id)
	{
		$data = array(
			'detail' => $this->mReservasi->detail_transaksi($id)
		);
		$this->load->view('Mekanik/Layout/head');
		$this->load->view('Mekanik/Layout/sidebar');
		$this->load->view('Mekanik/vDetailTransaksi', $data);
		$this->load->view('Mekanik/Layout/footer');
	}
	public function selesai($id)
	{
		$data = array(
			'stat_reservasi' => '4'
		);
		$this->mReservasi->update_stat($id, $data);
		$this->session->set_flashdata('success', 'Service Telah Selesai!');
		redirect('Mekanik/cTransaksi');
	}
}

/* End of file cTransaksi.php */
