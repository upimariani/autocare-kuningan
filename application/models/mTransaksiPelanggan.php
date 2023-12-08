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
	public function bayar($id, $data)
	{
		$this->db->where('id_reservasi', $id);
		$this->db->update('reservasi_service', $data);
	}
}

/* End of file mTransaksiPelanggan.php */
