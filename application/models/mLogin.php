<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mLogin extends CI_Model
{
	//konsumen
	public function register($data)
	{
		$this->db->insert('pelanggan', $data);
	}
	public function login($username, $password)
	{
		$this->db->select('*');
		$this->db->from('pelanggan');
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		return $this->db->get()->row();
	}

	//admin
	public function login_admin($username, $password)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where(array(
			'username' => $username,
			'password' => $password
		));
		return $this->db->get()->row();
	}
}

/* End of file mLogin.php */
