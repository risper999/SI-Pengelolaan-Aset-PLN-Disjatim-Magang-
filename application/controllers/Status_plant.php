<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Status_plant extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('akses')==false or $this->session->userdata("status")==0){
			redirect('login');
		}elseif($this->session->userdata('akses')==true && $this->session->userdata('level')!='aset'){
			show_404();
		}
		$this->load->model('Model_status_plant','MSN');	
		$this->load->view('css');
		$this->load->view('header');			
	}

	public function index()
	{
		$this->session->set_userdata('aksi', false);
		$data['title'] = 'Status Plant Content';
		$this->load->view('status_plant',$data);
		$data['st_plant'] = $this->MSN->list_st_plant();
		$this->load->view('show_status_plant',$data);
		$this->load->view('footer');
	}

	public function input_simpan(){
		$this->session->set_userdata('aksi', false);
		$dsc = $this->input->post('nama_plant');
		$cek = $this->MSN->cek_list_plant($dsc);
		if(!$cek){
			$this->session->set_flashdata('something',1);		
			$data_status_plant = array('nama_plant'=>$dsc);
			$this->db->insert('tb_plant', $data_status_plant);
		}else{
			$this->session->set_flashdata('something',2);
		}
		redirect('status_plant');
	}

	public function edit(){
		$this->session->set_userdata('aksi', true);
		$data['title'] = 'Status Plant Content';
		$no_id = $this->uri->segment(3);
		
		$data['no_id'] = $this->MSN->get_st_plant($no_id)->row_array();
		$this->load->view('status_plant',$data);
 
		$data['st_plant'] = $this->MSN->list_st_plant();
		$this->load->view('show_status_plant',$data);
		$this->load->view('footer');
	}

	public function edit_simpan(){
		$no_id = $this->input->post('no_id');
		$dsc = $this->input->post('nama_plant');
		$cek = $this->MSN->cek_list_plant($dsc);
		if(!$cek){
			$this->session->set_flashdata('something',1);			
			$data_status_plant = array('nama_plant'=>$dsc);
			$this->db->where('id_plant',$no_id);
			$this->db->update('tb_plant', $data_status_plant);
		}else{
			$this->session->set_flashdata('something',3);
		}
		redirect('status_plant');
	}

	public function hapus_stplant(){
		$id = $this->input->post("id");
		$this->MSN->hapus($id);
	}
}