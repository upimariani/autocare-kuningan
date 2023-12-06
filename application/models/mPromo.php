<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mPromo extends CI_Model
{
	public function select()
	{
		$this->db->select('*');
		$this->db->from('promo');
		$this->db->join('data_tarif', 'promo.id_tarif = data_tarif.id_tarif', 'left');
		return $this->db->get()->result();
	}
	public function insert($data)
	{
		$this->db->insert('promo', $data);
	}

	public function update($id, $data)
	{
		$this->db->where('id_promo', $id);
		$this->db->update('promo', $data);
	}
	public function delete($id)
	{
		$this->db->where('id_promo', $id);
		$this->db->delete('promo');
	}
}

/* End of file mPromo.php */
