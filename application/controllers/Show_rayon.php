<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Show_rayon extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('akses')==false or $this->session->userdata("status")==0) {
            redirect('login');
        }
	}

	public function index()
	{
		$this->load->view('show_rayon');
	}

}