<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Status_kepemilikan extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('akses')==false or $this->session->userdata("status")==0){
			redirect('login');
		}elseif($this->session->userdata('akses')==true && $this->session->userdata('level')!='aset'){
			show_404();
		} 
		$this->load->model('Model_status_kepemilikan','MSK');	
	}

	public function index()
	{
		$this->session->set_userdata('aksi', false);
		$data['title'] = 'Status Kepemilikan Content';
		$this->load->view('css');
		$this->load->view('header');
		$this->load->view('status_kepemilikan',$data);

		$data['st_kepemilikan'] = $this->MSK->list_st_kepemilikan()->result();
		$this->load->view('show_status_kepemilikan',$data);
		$this->load->view('footer');
	}

	public function input_simpan(){
		$this->session->set_userdata('aksi', false);
		$des_kepemilikan = $this->input->post('desc_st_kepemilikan');
		$cek = $this->MSK->cek_list_kepemilikan($des_kepemilikan);
		if(!$cek){
			$this->session->set_flashdata('something',1);
			$data_status_kepemilikan = array(
			'deskripsi_kepemilikan'=>$des_kepemilikan);
			$this->db->insert('tb_status_kepemilikan', $data_status_kepemilikan);
		}else{
			$this->session->set_flashdata('something',2);
		}		
		redirect('status_kepemilikan');
	}

	public function edit(){
		$this->session->set_userdata('aksi', true);
		$no_id = $this->uri->segment(3);
		$data['no_id'] = $this->MSK->get_st_kepemilikan($no_id)->row_array();
		$data['title'] = 'Status Kepemilikan Content';

		$this->load->view('css');
		$this->load->view('header');
		$this->load->view('status_kepemilikan',$data);
 
		$data['st_kepemilikan'] = $this->MSK->list_st_kepemilikan()->result();
		$this->load->view('show_status_kepemilikan',$data);
		$this->load->view('footer');
	}

	public function edit_simpan(){
		$no_id = $this->input->post('no_id');
		$des_kepemilikan = $this->input->post('desc_st_kepemilikan');
		$cek = $this->MSK->cek_list_kepemilikan($des_kepemilikan);
		if(!$cek){
			$this->session->set_flashdata('something',1);
			$data_status_kepemilikan = array(
			'id_status'=>$this->input->post('id_status'),
			'deskripsi_kepemilikan'=>$des_kepemilikan);
			$this->db->where('id_status',$no_id);
			$this->db->update('tb_status_kepemilikan', $data_status_kepemilikan);
		}else{
			$this->session->set_flashdata('something',3);
		}		
		redirect('status_kepemilikan');
	}

	public function hapus_stkepemilikan(){
		$id = $this->input->post("id");
		$this->MSK->hapus($id);
	}
}