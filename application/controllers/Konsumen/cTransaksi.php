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
	public function bayar($id)
	{
		$config['upload_path']          = './asset/pembayaran';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 500000;

		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('gambar')) {

			$data = array(
				'transaksi' => $this->mTransaksiPelanggan->transaksi()
			);
			$this->load->view('Konsumen/Layout/head');
			$this->load->view('Konsumen/Layout/nav');
			$this->load->view('Konsumen/vTransaksiPelanggan', $data);
			$this->load->view('Konsumen/Layout/footer');
		} else {
			$upload_data = $this->upload->data();
			$data = array(
				'bukti_pembayaran' => $upload_data['file_name']
			);
			$this->mTransaksiPelanggan->bayar($id, $data);
			$this->session->set_flashdata('success', 'Anda berhasil melakukan pembayaran!!!');
			redirect('Konsumen/cTransaksi');
		}
	}
	public function sesuai($id)
	{
		$data = array(
			'service_sesuai' => '1'
		);
		$this->db->where('id_reservasi', $id);
		$this->db->update('reservasi_service', $data);
		$this->session->set_flashdata('success', 'Terimakasi Telah Mempercayakan Kepada Kami!');
		redirect('Konsumen/cTransaksi');
	}
	public function tidak_sesuai($id)
	{
		$data = array(
			'service_sesuai' => '2'
		);
		$this->db->where('id_reservasi', $id);
		$this->db->update('reservasi_service', $data);
		$this->session->set_flashdata('success', 'Terimakasi Telah Memberikan Saran! Kami akan perbaiki kedepannya!');
		redirect('Konsumen/cTransaksi');
	}
}

/* End of file cTransaksi.php */
