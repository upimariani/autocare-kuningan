<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cSparepart extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mSparepart');
	}

	public function index()
	{
		$data = array(
			'sparepart' => $this->mSparepart->select()
		);
		$this->load->view('Admin/Layout/head');
		$this->load->view('Admin/Layout/sidebar');
		$this->load->view('Admin/vSparepart', $data);
		$this->load->view('Admin/Layout/footer');
	}
	public function create()
	{
		$config['upload_path']          = './asset/foto-sparepart';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 500000;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('gambar')) {
			$data = array(
				'error' => $this->upload->display_errors(),
				'sparepart' => $this->mSparepart->select()
			);

			$this->load->view('Admin/Layout/head');
			$this->load->view('Admin/Layout/sidebar');
			$this->load->view('Admin/vSparepart', $data);
			$this->load->view('Admin/Layout/footer');
		} else {
			$upload_data = $this->upload->data();
			$data = array(
				'nama_sparepart' => $this->input->post('nama'),
				'kategori' => $this->input->post('kategori'),
				'satuan' => $this->input->post('satuan'),
				'harga' => $this->input->post('harga'),
				'stok' => $this->input->post('stok'),
				'gambar' => $upload_data['file_name']
			);
			$this->mSparepart->insert($data);
			$this->session->set_flashdata('success', 'Data Sparepart Berhasil Ditambahkan!');
			redirect('Admin/cSparepart');
		}
	}
	public function update($id)
	{
		$config['upload_path']          = './asset/foto-sparepart';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 500000;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('gambar')) {
			$data = array(
				'error' => $this->upload->display_errors(),
				'sparepart' => $this->mSparepart->select()
			);

			$this->load->view('Admin/Layout/head');
			$this->load->view('Admin/Layout/sidebar');
			$this->load->view('Admin/vSparepart', $data);
			$this->load->view('Admin/Layout/footer');
		} else {
			$upload_data =  $this->upload->data();
			$data = array(
				'nama_sparepart' => $this->input->post('nama'),
				'kategori' => $this->input->post('kategori'),
				'satuan' => $this->input->post('satuan'),
				'harga' => $this->input->post('harga'),
				'stok' => $this->input->post('stok'),
				'gambar' => $upload_data['file_name']
			);
			$this->mSparepart->update($id, $data);
			$this->session->set_flashdata('success', 'Data Sparepart Berhasil Diperbaharui !!!');
			redirect('Admin/cSparepart');
		} //tanpa ganti gambar
		$data = array(
			'nama_sparepart' => $this->input->post('nama'),
			'kategori' => $this->input->post('kategori'),
			'satuan' => $this->input->post('satuan'),
			'harga' => $this->input->post('harga'),
			'stok' => $this->input->post('stok')
		);
		$this->mSparepart->update($id, $data);
		$this->session->set_flashdata('success', 'Data Sparepart Berhasil Diperbaharui !!!');
		redirect('Admin/cSparepart');
	}
	public function delete($id)
	{
		$this->mSparepart->delete($id);
		$this->session->set_flashdata('success', 'Data Sparepart Berhasil Dihapus !!!');
		redirect('Admin/cSparepart');
	}
}

/* End of file cSparepart.php */
