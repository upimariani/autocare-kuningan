<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cLogin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mLogin');
	}

	public function index()
	{
		$this->load->view('Konsumen/Layout/head');
		$this->load->view('Konsumen/Layout/nav');
		$this->load->view('Konsumen/vLogin');
		$this->load->view('Konsumen/Layout/footer');
	}
	public function add_login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$data = $this->mLogin->login($username, $password);
		if ($data) {
			$id_konsumen = $data->id_pelanggan;
			$nama = $data->nama_pelanggan;
			$array = array(
				'id_konsumen' => $id_konsumen,
				'nama' => $nama
			);

			$this->session->set_userdata($array);

			redirect('Konsumen/cHome');
		} else {
			$this->session->set_flashdata('error', 'Username dan Password Anda Salah!');
			redirect('Konsumen/cLogin');
		}
	}
	public function registrasi()
	{
		$this->load->view('Konsumen/Layout/head');
		$this->load->view('Konsumen/Layout/nav');
		$this->load->view('Konsumen/vRegistrasi');
		$this->load->view('Konsumen/Layout/footer');
	}
	public function add_registrasi()
	{
		$data = array(
			'nama_pelanggan' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'no_hp' => $this->input->post('no_hp'),
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password')
		);
		$this->mLogin->register($data);
		$this->session->set_flashdata('success', 'Anda Berhasil Registrasi! Silahkan Melakukan Login!');
		redirect('Konsumen/cLogin');
	}
	public function logout()
	{
		$this->session->unset_userdata('id_konsumen');
		$this->session->unset_userdata('nama');
		$this->session->set_flashdata('success', 'Anda Berhasil Logout!');
		redirect('Konsumen/cLogin');
	}
}

/* End of file cLogin.php */
