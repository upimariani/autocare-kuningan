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
		$this->load->view('Admin/Layout/head');
		$this->load->view('Admin/Layout/sidebar');
		$this->load->view('Admin/vTransaksi', $data);
		$this->load->view('Admin/Layout/footer');
	}
	public function konfirmasi($id)
	{
		$data = array(
			'stat_reservasi' => '1'
		);
		$this->mReservasi->update_stat($id, $data);
		$this->session->set_flashdata('success', 'Reservasi Service Berhasil Dikonfirmasi!');
		redirect('Admin/cTransaksi');
	}
	public function update_jam($id)
	{
		$data = array(
			'jam_kedatangan' => $this->input->post('jam')
		);
		$this->db->where('id_reservasi', $id);
		$this->db->update('reservasi_service', $data);
		$this->session->set_flashdata('success', 'Jam Kedatangan Berhasil Diperbaharui!');
		redirect('Admin/cTransaksi');
	}
	public function batalkan($id)
	{
		$this->db->where('id_reservasi', $id);
		$this->db->delete('reservasi_service');
		$this->session->set_flashdata('success', 'Jam Kedatangan Berhasil Ditolak!');
		redirect('Admin/cTransaksi');
	}
}

/* End of file cTransaksi.php */
