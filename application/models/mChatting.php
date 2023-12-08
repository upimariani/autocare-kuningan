<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mChatting extends CI_Model
{
	//chatting pelanggan
	public function chatting()
	{
		$this->db->select('*');
		$this->db->from('chatting');
		$this->db->join('pelanggan', 'chatting.id_pelanggan = pelanggan.id_pelanggan', 'left');
		$this->db->where('chatting.id_pelanggan', $this->session->userdata('id_konsumen'));
		return $this->db->get()->result();
	}

	//chatting admin
	public function chatting_pelanggan()
	{
		$this->db->select('*');
		$this->db->from('chatting');
		$this->db->join('pelanggan', 'chatting.id_pelanggan = pelanggan.id_pelanggan', 'left');
		$this->db->group_by('chatting.id_pelanggan');
		return $this->db->get()->result();
	}
	public function view_chatting($id_pelanggan)
	{
		$this->db->select('*');
		$this->db->from('chatting');
		$this->db->join('pelanggan', 'chatting.id_pelanggan = pelanggan.id_pelanggan', 'left');
		$this->db->where('chatting.id_pelanggan', $id_pelanggan);
		return $this->db->get()->result();
	}
}

/* End of file mChatting.php */
