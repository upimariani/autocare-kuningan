<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cPromo extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mTarif');
		$this->load->model('mPromo');
	}

	public function index()
	{
		$data = array(
			'tarif' => $this->mTarif->select(),
			'promo' => $this->mPromo->select()
		);
		$this->load->view('Admin/Layout/head');
		$this->load->view('Admin/Layout/sidebar');
		$this->load->view('Admin/vPromo', $data);
		$this->load->view('Admin/Layout/footer');
	}
	public function create()
	{
		$data = array(
			'id_tarif' => $this->input->post('tarif'),
			'tgl_promo' => date('Y-m-d'),
			'nama_promo' => $this->input->post('nama'),
			'besar' => $this->input->post('besar')
		);
		$this->mPromo->insert($data);
		$this->session->set_flashdata('success', 'Data Promo Berhasil Disimpan!');
		redirect('Admin/cPromo');
	}
	public function update($id)
	{
		$data = array(
			'id_tarif' => $this->input->post('tarif'),
			'tgl_promo' => date('Y-m-d'),
			'nama_promo' => $this->input->post('nama'),
			'besar' => $this->input->post('besar')
		);
		$this->mPromo->update($id, $data);
		$this->session->set_flashdata('success', 'Data Promo Berhasil Diperbaharui!');
		redirect('Admin/cPromo');
	}
	public function delete($id)
	{
		$this->mPromo->delete($id);
		$this->session->set_flashdata('success', 'Data Promo Berhasil Dihapus!');
		redirect('Admin/cPromo');
	}
}

/* End of file cPromo.php */
