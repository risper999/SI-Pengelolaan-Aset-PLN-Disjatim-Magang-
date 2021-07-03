<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Show_status_provinsi extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('akses')==false or $this->session->userdata("status")==0) {
            redirect('login');
        }elseif($this->session->userdata('akses')==true && $this->session->userdata('level')!='aset'){
			show_404();
		}
	}

	public function index()
	{
		$this->load->view('show_status_provinsi');
	}

}

/* End of file Show_status_provinsi.php */
/* Location: ./application/controllers/Show_status_provinsi.php */