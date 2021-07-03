<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Area extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('akses')==false or $this->session->userdata("status")==0){
			redirect('login');
		}elseif($this->session->userdata('akses')==true && $this->session->userdata('level')=='area'){
			show_404();
		}
		$this->load->model('Model_area','MA');
		$this->load->view('css');
		$this->load->view('header');
	}

	public function index()
	{
		$this->session->set_userdata('aksi', false);
		$data['title'] = 'Area Content';
		
		if($this->session->userdata('akses')==true && $this->session->userdata('level')=='aset'){
			$this->load->view('area',$data);
		}
		$data['area'] = $this->MA->list_area()->result();
		$data['no_id'] = '';

		$this->load->view('show_area',$data);
		$this->load->view('footer');
	}

	public function input_simpan(){
		$this->session->set_userdata('aksi', false);
		
		$nama_area =$this->input->post('nama_area');
		$id_area =$this->input->post('id_area');	

		$cek = $this->MA->cek_area($nama_area,$id_area);
		if(!$cek){
			$this->session->set_flashdata('something',1);
			$data_area = array(
			'id_area'=>$this->input->post('id_area'),
			'nama_area'=>$this->input->post('nama_area'),
			'alamat'=>$this->input->post('alamat'));
			$this->db->insert('tb_area', $data_area);	
		}else{
			$this->session->set_flashdata('something',2);		
		}
		redirect(base_url("area"));		
	}

	public function edit(){
		$this->session->set_userdata('aksi', true);
		$no_id = $this->uri->segment(3);
		$data['no_id'] = $this->MA->get_area($no_id)->row_array();
		$data['title'] = 'Area Content';
		$this->load->view('area',$data);
 
		$data['area'] = $this->MA->list_area()->result();
		$this->load->view('show_area',$data);
		$this->load->view('footer');
	}

	public function edit_simpan(){
		$no_id = $this->input->post('no_id');
		$this->session->set_flashdata('something',1);
		$data_area = array(
			'alamat'=>$this->input->post('alamat'));
		$this->db->where('no_id',$no_id);
		$this->db->update('tb_area', $data_area);	
		redirect(base_url("area"));	
	}

	public function hapusArea(){
		$id = $this->input->post("id");
		$this->MA->delArea($id);
	}
}