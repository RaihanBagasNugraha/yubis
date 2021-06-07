<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller { 

    public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}

    public function index()
	{
		$this->load->view('login');
	}

    public function periksa_akses()
	{
		$email = $this->input->post('email');
	    $password = $this->input->post('password');

		// echo $email;
		$user = $this->user_model->cek_login($email, $password);
		if($user) {
			$newData = array(
				'userId' => $user->ID,
                'email' => $user->email,
				'nama' => $user->nama,
				'status' => $user->status
			 );
			 $this->session->set_userdata($newData);

             if($user->status == '1'){
                redirect(site_url("dashboard"));
             }elseif($user->status == '2'){
                redirect(site_url("dashboard"));
             }
			
		}else {
	        redirect(site_url("login?status=gagal"));
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
	    redirect(site_url('login'));
	}

    public function login()
	{
		$this->load->view('login');
	}

    public function register()
	{
		$this->load->view('register');
	}

    function periksa_daftar()
    {
        $nama = ucwords(strtolower($this->security->xss_clean($this->input->post('nama'))));
		$email = strtolower($this->security->xss_clean($this->input->post('email')));
		$password = $this->input->post('password');
        $status = $this->security->xss_clean($this->input->post('status'));

        $userInfo = array(
			'email' => $email,
			'pass' => getHashedPassword($password),
            'nama' => $nama,
			'status' => $status,
		);

        // cek email
		$cek_email = $this->user_model->cek_email($email);
        if($cek_email)
		{
			$this->session->set_flashdata('error', 'Email Anda telah terdaftar!');
		}
		else
		{
            $result = $this->user_model->addNewUser($userInfo);

			if ($result > 0) {
				$this->session->set_flashdata('success', 'Berhasil Mendaftar');
			} else {
				$this->session->set_flashdata('error', 'Gagal Mendaftar!');
			}
        }

        // redirect(site_url('register'));
		redirect(site_url('operator'));
    }

	function delete_op()
	{
		$id = $this->input->post('id');
		$this->user_model->delete_user_admin($id);
		redirect(site_url('operator'));
        
	}

	function edit_user()
	{
		// $data = $this->input->post();
		// echo "<pre>";
        // print_r ($data);

		$nama = ucwords(strtolower($this->security->xss_clean($this->input->post('nama'))));
		$email = strtolower($this->security->xss_clean($this->input->post('email')));
		$password = $this->input->post('password');
        $status = $this->security->xss_clean($this->input->post('status'));
		$id = $this->input->post('id');

		$cek_user = $this->user_model->get_user_admin($id);

		if($password != ''){
			$userInfo = array(
				'email' => $email,
				'pass' => getHashedPassword($password),
				'nama' => $nama,
				'status' => $status,
			);
		}else{
			$userInfo = array(
				'email' => $email,
				'nama' => $nama,
				'status' => $status,
			);
		}
        

        // cek email
		if($cek_user->email != $email){
			$cek_email = $this->user_model->cek_email($email);
		}else{
			$cek_email = '';
		}
		
        if($cek_email)
		{
			$this->session->set_flashdata('error', 'Email telah terdaftar!');
		}
		else
		{
            $this->user_model->editUser($userInfo,$id);
			$this->session->set_flashdata('success', 'Berhasil Ubah Data');
			// if ($result > 0) {
			// 	$this->session->set_flashdata('success', 'Berhasil Mendaftar');
			// } else {
			// 	$this->session->set_flashdata('error', 'Gagal Mendaftar!');
			// }
        }

		redirect(site_url('operator'));


	}

}