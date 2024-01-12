<?php

defined('BASEPATH') or exit('No direct script access allowed');

class mReservasi extends CI_Model
{
	public function select_reservasi()
	{
		$data['konfirmasi_admin'] = $this->db->query("SELECT * FROM `reservasi_service` JOIN pelanggan ON pelanggan.id_pelanggan=reservasi_service.id_pelanggan WHERE stat_reservasi='0'")->result();
		$data['service_advisor'] = $this->db->query("SELECT * FROM `reservasi_service` JOIN pelanggan ON pelanggan.id_pelanggan=reservasi_service.id_pelanggan WHERE stat_reservasi='1'")->result();
		$data['pembayaran'] = $this->db->query("SELECT * FROM `reservasi_service` JOIN pelanggan ON pelanggan.id_pelanggan=reservasi_service.id_pelanggan WHERE stat_reservasi='2'")->result();
		$data['mekanik'] = $this->db->query("SELECT * FROM `reservasi_service` JOIN pelanggan ON pelanggan.id_pelanggan=reservasi_service.id_pelanggan WHERE stat_reservasi='3'")->result();
		$data['selesai'] = $this->db->query("SELECT * FROM `reservasi_service` JOIN pelanggan ON pelanggan.id_pelanggan=reservasi_service.id_pelanggan WHERE stat_reservasi='4'")->result();
		return $data;
	}
	public function update_stat($id, $data)
	{
		$this->db->where('id_reservasi', $id);
		$this->db->update('reservasi_service', $data);
	}
	public function detail_transaksi($id)
	{
		$data['transaksi'] = $this->db->query("SELECT * FROM `reservasi_service` JOIN pelanggan ON pelanggan.id_pelanggan=reservasi_service.id_pelanggan JOIN data_tarif ON data_tarif.id_tarif=reservasi_service.id_tarif WHERE reservasi_service.id_reservasi='" . $id . "'")->row();
		$data['sparepart'] = $this->db->query("SELECT * FROM `reservasi_service` JOIN data_reservasi ON data_reservasi.id_reservasi=reservasi_service.id_reservasi JOIN data_sparepart ON data_sparepart.id_sparepart=data_reservasi.id_sparepart WHERE reservasi_service.id_reservasi='" . $id . "'")->result();
		return $data;
	}
}

/* End of file mReservasi.php */
