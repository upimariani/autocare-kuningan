<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cTransaksi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mReservasi');
		$this->load->model('mSparepart');
		$this->load->model('mTarif');
	}

	public function index()
	{
		$data = array(
			'transaksi' => $this->mReservasi->select_reservasi()
		);
		$this->load->view('ServiceAdvisor/Layout/head');
		$this->load->view('ServiceAdvisor/Layout/sidebar');
		$this->load->view('ServiceAdvisor/vTransaksi', $data);
		$this->load->view('ServiceAdvisor/Layout/footer');
	}
	public function add_sparepart($id)
	{
		$data = array(
			'id_reservasi' => $id,
			'transaksi' => $this->mReservasi->select_reservasi(),
			'sparepart' => $this->mSparepart->select(),
			'tarif' => $this->mTarif->tarif_promo()
		);
		$this->load->view('ServiceAdvisor/Layout/head');
		$this->load->view('ServiceAdvisor/Layout/sidebar');
		$this->load->view('ServiceAdvisor/vAddSparepart', $data);
		$this->load->view('ServiceAdvisor/Layout/footer');
	}

	//cart
	public function add_to_cart($id)
	{
		$data = array(
			'id' => $this->input->post('sparepart'),
			'name' => $this->input->post('nama'),
			'price' => $this->input->post('harga'),
			'qty' => $this->input->post('qty'),
			'stok' => $this->input->post('stok')
		);
		$this->cart->insert($data);
		$this->session->set_flashdata('success', 'Sparepart berhasil masuk keranjang!');
		redirect('ServiceAdvisor/cTransaksi/add_sparepart/' . $id);
	}
	public function delete($rowid, $id)
	{
		$this->cart->remove($rowid);
		redirect('ServiceAdvisor/cTransaksi/add_sparepart/' . $id);
	}
	public function selesai($id)
	{
		$tarif = $this->input->post('tarif');
		$pembayaran = $this->input->post('pembayaran');

		//data reservasi
		foreach ($this->cart->contents() as $key => $value) {
			$data = array(
				'id_reservasi' => $id,
				'id_sparepart' => $value['id'],
				'qty' => $value['qty']
			);
			$this->db->insert('data_reservasi', $data);

			//mengurangi stok sparepart
			$stok_update = $value['stok'] - $value['qty'];
			$stok = array(
				'stok' => $stok_update
			);
			$this->db->where('id_sparepart', $value['id']);
			$this->db->update('data_sparepart', $stok);
		}

		//data reservasi service
		$reservasi = array(
			'id_tarif' => $tarif,
			'total_pembayaran' => $pembayaran
		);
		$this->db->where('id_reservasi', $id);
		$this->db->update('reservasi_service', $reservasi);

		//update status reservasi
		$status = array(
			'stat_reservasi' => '2'
		);
		$this->db->where('id_reservasi', $id);
		$this->db->update('reservasi_service', $status);
		$this->session->set_flashdata('success', 'Reservasi Sparepart Berhasil masuk ke merkanik!');
		redirect('ServiceAdvisor/cTransaksi');
	}
}

/* End of file cTransaksi.php */
