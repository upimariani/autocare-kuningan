<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mHome extends CI_Model
{
	public function reservasi($data)
	{
		$this->db->insert('reservasi_service', $data);
	}
	public function ulasan()
	{
		$this->db->select('*');
		$this->db->from('ulasan');
		$this->db->join('reservasi_service', 'ulasan.id_reservasi = reservasi_service.id_reservasi', 'left');
		$this->db->join('pelanggan', 'pelanggan.id_pelanggan = reservasi_service.id_pelanggan', 'left');
		return $this->db->get()->result();
	}
}

/* End of file mHome.php */
