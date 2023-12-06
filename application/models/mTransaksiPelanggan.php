<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mTransaksiPelanggan extends CI_Model
{
	public function transaksi()
	{
		$this->db->select('*');
		$this->db->from('reservasi_service');
		$this->db->join('pelanggan', 'reservasi_service.id_pelanggan = pelanggan.id_pelanggan', 'left');
		$this->db->where('pelanggan.id_pelanggan', $this->session->userdata('id_konsumen'));
		return $this->db->get()->result();
	}
}

/* End of file mTransaksiPelanggan.php */
