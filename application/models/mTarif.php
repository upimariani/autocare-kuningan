<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mTarif extends CI_Model
{
	public function select()
	{
		$this->db->select('*');
		$this->db->from('data_tarif');
		return $this->db->get()->result();
	}
	public function insert($data)
	{
		$this->db->insert('data_tarif', $data);
	}

	public function update($id, $data)
	{
		$this->db->where('id_tarif', $id);
		$this->db->update('data_tarif', $data);
	}
	public function delete($id)
	{
		$this->db->where('id_tarif', $id);
		$this->db->delete('data_tarif');
	}


	//promo tarif
	public function tarif_promo()
	{
		$this->db->select('*, data_tarif.id_tarif');
		$this->db->from('data_tarif');
		$this->db->join('promo', 'data_tarif.id_tarif = promo.id_tarif', 'left');
		return $this->db->get()->result();
	}
}

/* End of file mTarif.php */
