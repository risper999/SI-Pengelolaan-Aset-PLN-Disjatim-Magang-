<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Status_kelayakan extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('akses')==false or $this->session->userdata("status")==0){
			redirect('login');
		}elseif($this->session->userdata('akses')==true && $this->session->userdata('level')!='aset'){
			show_404();
		} 
		$this->load->model('Model_status_kelayakan','MSL');	
	}

	public function index()
	{
		$this->session->set_userdata('aksi', false);
		$data['title'] = 'Status Kelayakan Content';
		$this->load->view('css');
		$this->load->view('header');
		$this->load->view('status_kelayakan',$data);

		$data['st_kelayakan'] = $this->MSL->list_st_kelayakan()->result();
		$this->load->view('show_status_kelayakan',$data);
		$this->load->view('footer');
	}

	public function input_simpan(){
		$this->session->set_userdata('aksi', false);
		$des_layak = $this->input->post('desc_layak');
		$cek = $this->MSL->cek_list_kelayakan($des_layak);
		if(!$cek){
			$this->session->set_flashdata('something',1);
			$data_status_kelayakan = array(
				'deskripsi_layak'=>$this->input->post('desc_layak'));
			$this->db->insert('tb_status_layak', $data_status_kelayakan);
		}else{
			$this->session->set_flashdata('something',2);
		}
		redirect('status_kelayakan');
	}

	public function edit(){
		$this->session->set_userdata('aksi', true);
		$no_id = $this->uri->segment(3);
		$data['no_id'] = $this->MSL->get_st_kelayakan($no_id)->row_array();
		$data['title'] = 'Status Kelayakan Content';

		$this->load->view('css');
		$this->load->view('header');
		$this->load->view('status_kelayakan',$data);
 
		$data['st_kelayakan'] = $this->MSL->list_st_kelayakan()->result();
		$this->load->view('show_status_kelayakan',$data);
		$this->load->view('footer');
	}

	public function edit_simpan(){
		$no_id = $this->input->post('no_id');
		$des_layak = $this->input->post('desc_layak');
		$cek = $this->MSL->cek_list_kelayakan($des_layak);
		if(!$cek){
			$this->session->set_flashdata('something',1);
			$data_status_kelayakan = array(
				'deskripsi_layak'=>$this->input->post('desc_layak'));
			$this->db->where('id_layak',$no_id);
			$this->db->update('tb_status_layak', $data_status_kelayakan);
		}else{
			$this->session->set_flashdata('something',3);
		}		
		redirect('status_kelayakan');
	}

	public function hapus_stkelayakan(){
		$id = $this->input->post("id");
		$this->MSL->hapus($id);
	}
}