<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Status_provinsi extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('akses')==false or $this->session->userdata("status")==0){
			redirect('login');
		}elseif($this->session->userdata('akses')==true && $this->session->userdata('level')!='aset'){
			show_404();
		}
		$this->load->model('Model_status_provinsi','MSV');
		$this->load->view('css');
		$this->load->view('header');		
	}

	public function index()
	{
		$this->session->set_userdata('aksi', false);
		$data['title'] = 'Status Provinsi Content';
		$this->load->view('status_provinsi',$data);
		$data['st_provinsi'] = $this->MSV->list_st_provinsi();
		$this->load->view('show_status_provinsi',$data);
		$this->load->view('footer');
	}

	public function input_simpan(){
		$this->session->set_userdata('aksi', false);
		$dsc = $this->input->post('provinsi_nama');
		$cek = $this->MSV->cek_list_provinsi($dsc);
		if(!$cek){
			$this->session->set_flashdata('something',1);
			$data_status_provinsi = array(
				'provinsi_nama'=>$this->input->post('provinsi_nama'));
			$this->db->insert('tb_provinsi', $data_status_provinsi);
		}else{
			$this->session->set_flashdata('something',2);
		} 
		redirect('status_provinsi');
	}

	public function edit(){
		$this->session->set_userdata('aksi', true);
		$data['title'] = 'Status Provinsi Content';
		$no_id = $this->uri->segment(3);
		$data['no_id'] = $this->MSV->get_st_provinsi($no_id)->row_array();
		$this->load->view('status_provinsi',$data);
 
		$data['st_provinsi'] = $this->MSV->list_st_provinsi();
		$this->load->view('show_status_provinsi',$data);
		$this->load->view('footer');
	}

	public function edit_simpan(){
		$no_id = $this->input->post('no_id');
		$dsc = $this->input->post('provinsi_nama');
		$cek = $this->MSV->cek_list_provinsi($dsc);
		if(!$cek){
			$this->session->set_flashdata('something',1);		
			$data_status_provinsi = array(
				'provinsi_nama'=>$dsc);
			$this->db->where('id_provinsi',$no_id);
			$this->db->update('tb_provinsi', $data_status_provinsi);
		}else{
			$this->session->set_flashdata('something',3);
		} 
		redirect('status_provinsi');
	}

	public function hapus_stprovinsi(){
		$id = $this->input->post("id");
		$this->MSV->hapus($id);
	}

}