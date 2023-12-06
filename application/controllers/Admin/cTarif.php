<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cTarif extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mTarif');
	}

	public function index()
	{
		$data = array(
			'tarif' => $this->mTarif->select()
		);
		$this->load->view('Admin/Layout/head');
		$this->load->view('Admin/Layout/sidebar');
		$this->load->view('Admin/vTarif', $data);
		$this->load->view('Admin/Layout/footer');
	}
	public function create()
	{
		$data = array(
			'nama_service' => $this->input->post('nama'),
			'harga' => $this->input->post('harga')
		);
		$this->mTarif->insert($data);
		$this->session->set_flashdata('success', 'Data Tarif Berhasil Disimpan!');
		redirect('Admin/cTarif');
	}
	public function update($id)
	{
		$data = array(
			'nama_service' => $this->input->post('nama'),
			'harga' => $this->input->post('harga')
		);
		$this->mTarif->update($id, $data);
		$this->session->set_flashdata('success', 'Data Tarif Berhasil Diperbaharui!');
		redirect('Admin/cTarif');
	}
	public function delete($id)
	{
		$this->mTarif->delete($id);
		$this->session->set_flashdata('success', 'Data Tarif Berhasil Dihapus!');
		redirect('Admin/cTarif');
	}
}

/* End of file cTarif.php */
