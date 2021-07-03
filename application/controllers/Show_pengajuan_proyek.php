<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Show_pengajuan_proyek extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('akses')==false){
			redirect('login');
		}elseif($this->session->userdata('akses')==true && $this->session->userdata('level')=='area'){
			show_404();
		}    
	}

	public function index()
	{
		$this->load->view('show_pengajuan_proyek');
		$this->load->view('css');
	}

}

/* End of file Show_pengajuan_proyek.php */
/* Location: ./application/controllers/Show_pengajuan_proyek.php */