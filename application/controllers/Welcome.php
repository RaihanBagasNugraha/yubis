<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
	{
		parent::__construct();
		$this->load->model('product_model');
		$this->load->model('user_model');
		$this->load->model('pesanan_model');
	}

	public function index()
	{
		if($this->session->has_userdata('userId')) {
		    $this->dashboard();
		} else {
			redirect(site_url("login?status=login"));
		}
	}

	public function dashboard()
	{
		if($this->session->has_userdata('userId')) {
			$this->load->view('header');
			$this->load->view('dashboard');
			$this->load->view('footer');
		} else {
			redirect(site_url("login?status=login"));
		}
		
	}

	public function kategori()
	{
		if($this->session->has_userdata('userId')) {
			$this->load->view('header');
			$this->load->view('product_category');
			$this->load->view('footer');
		} else {
			redirect(site_url("login?status=login"));
		}
	}

	public function kecamatan()
	{
		if($this->session->has_userdata('userId')) {
			$this->load->view('header');
			$this->load->view('kecamatan');
			$this->load->view('footer');
		} else {
			redirect(site_url("login?status=login"));
		}
	}

	public function pelanggan()
	{
		if($this->session->has_userdata('userId')) {
			$kec = $this->input->get('kecamatan');
			if($kec != ''){
				$data['pengguna'] = $this->product_model->get_pelanggan_kecamatan($kec);
			}else{
				$data['pengguna'] = $this->product_model->get_pelanggan_all();
			}
			
			$this->load->view('header');
			$this->load->view('pelanggan',$data);
			$this->load->view('footer');
		} else {
			redirect(site_url("login?status=login"));
		}
		
	}

	public function tanggal_libur()
	{
		if($this->session->has_userdata('userId')) {
			$this->load->view('header');
			$this->load->view('tanggal_libur');
			$this->load->view('footer');
		} else {
			redirect(site_url("login?status=login"));
		}
		
	}

	public function produk()
	{
		if($this->session->has_userdata('userId')) {
			$produk = $this->input->get('produk');
			if($produk != ''){
				$data['produk'] = $this->product_model->get_kategori_produk($produk);
			}else{
				$data['produk'] = $this->product_model->get_produk_all();
			}
			

			$this->load->view('header');
			$this->load->view('produk',$data);
			$this->load->view('footer');
		} else {
			redirect(site_url("login?status=login"));
		}
	}

	public function operator()
	{
		if($this->session->has_userdata('userId')) {
			if($this->session->userdata('userId') == '1'){
				$this->load->view('header');
				$this->load->view('operator');
				$this->load->view('footer');
			}else{
				echo "<script>javascript:history.back();</script>";
			}
		
		} else {
			redirect(site_url("login?status=login"));
		}
	}

	public function rekap_belanja()
	{
		if($this->session->has_userdata('userId')) {
			$this->load->view('header');
			$this->load->view('rekap_belanja');
			$this->load->view('footer');
		} else {
			redirect(site_url("login?status=login"));
		}
	}

}
