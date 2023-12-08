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
			'chat' => $this->mChatting->chatting_pelanggan()
		);
		$this->load->view('Admin/Layout/head');
		$this->load->view('Admin/Layout/sidebar');
		$this->load->view('Admin/vChatting', $data);
		$this->load->view('Admin/Layout/footer');
	}
	public function view_chatting($id_pelanggan)
	{
		$status = array(
			'status' => '2'
		);
		$this->db->where('id_pelanggan', $id_pelanggan);
		$this->db->update('chatting', $status);


		$data = array(
			'id_pelanggan' => $id_pelanggan,
			'chatting' => $this->mChatting->view_chatting($id_pelanggan)
		);
		$this->load->view('Admin/Layout/head');
		$this->load->view('Admin/Layout/sidebar');
		$this->load->view('Admin/vViewChatting', $data);
		$this->load->view('Admin/Layout/footer');
	}
	public function balasan($id_pelanggan)
	{
		$data = array(
			'id_pelanggan' => $id_pelanggan,
			'id_user' => '1',
			'jawaban' => $this->input->post('jawaban'),
			'status' => '2'
		);
		$this->db->insert('chatting', $data);
		$this->session->set_flashdata('success', 'Pesan Berhasil Dikirim');
		redirect('Admin/cChatting/view_chatting/' . $id_pelanggan);
	}
}

/* End of file cChatting.php */
