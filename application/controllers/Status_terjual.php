<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Status_terjual extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('akses')==false or $this->session->userdata("status")==0){
			redirect('login');
		}elseif($this->session->userdata('akses')==true && $this->session->userdata('level')!='aset'){
			show_404();
		} 
		$this->load->model('Model_status_terjual','MSJ');		
	}

	public function index()
	{
		$this->session->set_userdata('aksi', false);
		$data['title'] = 'Status Terjual Content';
		$this->load->view('css');
		$this->load->view('header');
		$this->load->view('status_terjual',$data);
		$data['st_terjual'] = $this->MSJ->list_st_terjual()->result();
		$this->load->view('show_status_terjual',$data);
		$this->load->view('footer');
	}

	public function input_simpan(){
		$this->session->set_userdata('aksi', false);
		$dsc = $this->input->post('desc_terjual');
		$cek = $this->MSJ->cek_list_terjual($dsc);
		if(!$cek){
			$this->session->set_flashdata('something',1);
			$data_status_terjual= array(
				'deskripsi_terjual'=>$dsc);
			$this->db->insert('tb_status_terjual', $data_status_terjual);
		}else{
			$this->session->set_flashdata('something',2);
		} 
		redirect('status_terjual');
	}

	public function edit(){
		$this->session->set_userdata('aksi', true);
		$no_id = $this->uri->segment(3);
		$data['no_id'] = $this->MSJ->get_st_terjual($no_id)->row_array();
		$data['title'] = 'Status Terjual Content';

		$this->load->view('css');
		$this->load->view('header');
		$this->load->view('status_terjual',$data);
 
		$data['st_terjual'] = $this->MSJ->list_st_terjual()->result();
		$this->load->view('show_status_terjual',$data);
		$this->load->view('footer');
	}

	public function edit_simpan(){
		$no_id = $this->input->post('no_id');
		$dsc = $this->input->post('desc_terjual');
		$cek = $this->MSJ->cek_list_terjual($dsc);
		if(!$cek){
			$this->session->set_flashdata('something',1);
			$data_status_terjual= array(
				'deskripsi_terjual'=>$dsc);
			$this->db->where('id_terjual',$no_id);
			$this->db->update('tb_status_terjual', $data_status_terjual);
		}else{
			$this->session->set_flashdata('something',3);
		} 
		redirect('status_terjual');
	}

	public function hapus_stterjual(){
		$id = $this->input->post("id");
		$this->MSJ->hapus($id);
	}

}