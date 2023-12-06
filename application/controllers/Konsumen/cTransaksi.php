<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cTransaksi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mTransaksiPelanggan');
	}

	public function index()
	{
		$data = array(
			'transaksi' => $this->mTransaksiPelanggan->transaksi()
		);
		$this->load->view('Konsumen/Layout/head');
		$this->load->view('Konsumen/Layout/nav');
		$this->load->view('Konsumen/vTransaksiPelanggan', $data);
		$this->load->view('Konsumen/Layout/footer');
	}
	public function ulasan($id)
	{
		$data = array(
			'id_reservasi' => $id,
			'rating' => $this->input->post('rating'),
			'testimoni' => $this->input->post('ulasan')
		);
		$this->db->insert('ulasan', $data);
		$this->session->set_flashdata('success', 'Ulasan Berhasil Dikirim!');
		redirect('Konsumen/cTransaksi');
	}
}

/* End of file cTransaksi.php */
