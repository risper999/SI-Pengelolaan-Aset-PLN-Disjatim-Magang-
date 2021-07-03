<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// require_once APPPATH . "third_party/dompdf/autoload.inc.php";
// use Dompdf\Dompdf;

class Rekap extends CI_Controller {

	public $level;

	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('akses')==false or $this->session->userdata("status")==0){
			redirect('login');
		}
		$this->load->view('css');
		$this->load->view('header');
		$this->load->model('Model_rekap','MR');
		$this->load->model('Model_user','MU');
		$this->load->model('Model_area','MA');		
	}

	public function index()
	{
		$this->session->set_userdata('pdf', false);
		$this->session->set_userdata('pdf1', false);
		$this->session->set_userdata('pdf2', false);

		$data['title'] = 'Rekap Content';		
		$level = $this->session->userdata('level');
		if($level=='area'){
			$no_id_area = $this->session->userdata('no_id_area');
			$area = $this->session->userdata('area');
			$data['get_pengajuan'] = $this->MR->list_pengajuan_join2($area)->result();
			$data['area'] = $this->MA->get_area($no_id_area)->result();
		}else{
			$data['get_pengajuan'] = $this->MR->list_pengajuan_join1()->result();
			$data['area'] = $this->MA->list_area()->result();
		}
		$this->load->view('rekap',$data);		
		$this->load->view('footer');
	}

	public function cek(){
		$data['title'] = 'Rekap Content';		

		$date = $this->input->post("datefilter");

		$this->session->set_userdata('pdf', true);
		$this->session->set_userdata('tgl',$date);	

		$level = $this->session->userdata('level');
		if($level=='area'){
			$area = $this->session->userdata('area');
			$data['get_pengajuan'] = $this->MR->get_pengajuan_join2($date,$area)->result();
		}else{
			$data['get_pengajuan'] = $this->MR->get_pengajuan_join1($date)->result();
			$data['area'] = $this->MA->list_area()->result();
		}
		
		$this->load->view('rekap',$data);
		$this->load->view('footer');
	}

	public function cek1(){
		$data['title'] = 'Rekap Content';

		$date_area = $this->input->post("datefilter1");
		$id_area = $this->input->post("id_area");		

		$this->session->set_userdata('pdf1', true);
		$this->session->set_userdata('tgl_area',$date_area);
		$this->session->set_userdata('pdf_id_area',$id_area);		

		$data['get_pengajuan'] = $this->MR->get_pengajuan_join2($date_area,$id_area)->result();
		$data['area'] = $this->MA->list_area()->result();
				
		$this->load->view('rekap',$data);
		$this->load->view('footer');
	}

	public function cek2(){
		$data['title'] = 'Rekap Content';		

		$no_id_area = $this->session->userdata('no_id_area');
		$date_status = $this->input->post("datefilter2");		
		$status = $this->input->post("status");

		$this->session->set_userdata('pdf2', true);
		$this->session->set_userdata('tgl_status',$date_status);
		$this->session->set_userdata('pdf_status',$status);

		$level = $this->session->userdata('level');
		if($level=='area'){
			$area = $this->session->userdata('area');
			$data['get_pengajuan'] = $this->MR->get_pengajuan_join4($date_status,$status,$area)->result();
			$data['area'] = $this->MA->get_area($no_id_area)->result();
		}else{
			$data['get_pengajuan'] = $this->MR->get_pengajuan_join3($date_status,$status)->result();
			$data['area'] = $this->MA->list_area()->result();
		}		
		$this->load->view('rekap',$data);
		$this->load->view('footer');
	}

}