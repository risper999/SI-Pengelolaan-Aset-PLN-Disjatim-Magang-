<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Status_tanah extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('akses')==false or $this->session->userdata("status")==0){
			redirect('login');
		}elseif($this->session->userdata('akses')==true && $this->session->userdata('level')!='aset'){
			show_404();
		} 
		$this->load->model('Model_status_tanah','MST');	
	}

	public function index()
	{
		$this->session->set_userdata('aksi', false);
		$data['title'] = 'Status Tanah Content';
		$this->load->view('css');
		$this->load->view('header');
		$this->load->view('status_tanah',$data);
		$data['st_tanah'] = $this->MST->list_st_tanah()->result();
		$this->load->view('show_status_tanah',$data);
		$this->load->view('footer');
	}

	public function input_simpan(){
		$this->session->set_userdata('aksi', false);
		$dst = $this->input->post('dst');
		$cek = $this->MST->cek_list_tanah($dst);
		if(!$cek){
			$this->session->set_flashdata('something',1);
			$data_status_tanah = array(
				'desc_status_tanah'=>$dst);
			$this->db->insert('tb_status_tanah', $data_status_tanah);
		}else{
			$this->session->set_flashdata('something',2);
		}	
		redirect('status_tanah');
	}

	public function edit(){
		$this->session->set_userdata('aksi', true);
		$no_id = $this->uri->segment(3);
		$data['no_id'] = $this->MST->get_st_tanah($no_id)->row_array();
		$data['title'] = 'Status Tanah Content';

		$this->load->view('css');
		$this->load->view('header');
		$this->load->view('status_tanah',$data);
 
		$data['st_tanah'] = $this->MST->list_st_tanah()->result();
		$this->load->view('show_status_tanah',$data);
		$this->load->view('footer');
	}

	public function edit_simpan(){
		$no_id = $this->input->post('no_id');
		$dst = $this->input->post('dst');
		$cek = $this->MST->cek_list_tanah($dst);
		if(!$cek){
			$this->session->set_flashdata('something',1);		
			$data_status_tanah = array(
				'desc_status_tanah'=>$dst);
			$this->db->where('id_status_tanah',$no_id);
			$this->db->update('tb_status_tanah', $data_status_tanah);
		}else{
			$this->session->set_flashdata('something',3);
		}
		redirect('status_tanah');
	}

	public function hapus_sttanah(){
		$id = $this->input->post("id");
		$this->MST->hapus($id);
	}
}

/* End of file Status_tanah.php */
/* Location: ./application/controllers/Status_tanah.php */