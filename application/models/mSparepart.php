<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mSparepart extends CI_Model
{
	public function select()
	{
		$this->db->select('*');
		$this->db->from('data_sparepart');
		return $this->db->get()->result();
	}
	public function insert($data)
	{
		$this->db->insert('data_sparepart', $data);
	}

	public function update($id, $data)
	{
		$this->db->where('id_sparepart', $id);
		$this->db->update('data_sparepart', $data);
	}
	public function delete($id)
	{
		$this->db->where('id_sparepart', $id);
		$this->db->delete('data_sparepart');
	}
}


/* End of file mSparepart.php */
