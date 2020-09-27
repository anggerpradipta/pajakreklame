<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if($this->form_validation->run() == false)
		{
			$this->load->view('template/auth_header');
			$this->load->view('pages/login');
			$this->load->view('template/auth_footer');
		}
		else
		{
			$this->_login();
		}

	}

	private function _login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		if ($username) {

			$admin = $this->db->get_where('admin', ['username' => $username])->row_array();
			
			if ($admin) 
			{
				# Berhasil
				if (md5($password) == $admin['password']) 
				{
					$data = [
						'username' => $admin['username'],
						'nama' => $admin['nama'],
						'email' => $admin['email'],
						'nip' => $admin['nip'],
						'role' => 'ADMIN'
					];
					$this->session->set_userdata($data);
					redirect('Core_actor','refresh');
				} 
				else 
				{
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Login, password salah!</div>');
					redirect('auth');
				}
				
			} 
			else 
			{				
			
				$pimpinan = $this->db->get_where('pimpinan', ['username' => $username])->row_array();
				
				if ($pimpinan) 
				{
					# Berhasil
					if (md5($password) == $pimpinan['password']) 
					{
						$data = [
							'username' => $pimpinan['username'],
							'nama' => $pimpinan['nama'],
							'email' => $pimpinan['email'],
							'nip' => $pimpinan['nip'],
							'role' => 'PIMPINAN'
						];
						$this->session->set_userdata($data);
						redirect('Core_actor','refresh');
					} 
					else 
					{
						$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Login, password salah!</div>');
						redirect('auth');
					}
					
				} 
				else 
				{
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Login, silahkan cek kembali username dan password Anda!</div>');
					redirect('auth');
				}
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Login, silahkan cek kembali username dan password Anda!</div>');
			redirect('auth');

		}
		
		
	}

	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('nama');
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Logout, Sesi dihentikan...</div>');
		redirect('auth');
	}

}

/* End of file auth.php */
/* Location: ./application/controllers/auth.php */