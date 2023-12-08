<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cChatting extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mChatting');
	}


	public function index()
	{
		$data = array(
			'chatting' => $this->mChatting->chatting()
		);
		$this->load->view('Konsumen/Layout/head');
		$this->load->view('Konsumen/Layout/nav');
		$this->load->view('Konsumen/vChatting', $data);
		$this->load->view('Konsumen/Layout/footer');
	}
	public function pertanyaan()
	{
		$data = array(
			'id_pelanggan' => $this->session->userdata('id_konsumen'),
			'id_user' => '1',
			'pertanyaan' => $this->input->post('pertanyaan'),
			'status' => '1'
		);
		$this->db->insert('chatting', $data);
		$this->session->set_flashdata('success', 'Pesan Berhasil Dikirim');
		redirect('Konsumen/cChatting');
	}
}

/* End of file cChatting.php */
