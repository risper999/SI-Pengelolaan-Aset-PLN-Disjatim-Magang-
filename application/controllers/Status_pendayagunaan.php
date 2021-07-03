<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Status_pendayagunaan extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('akses')==false or $this->session->userdata("status")==0){
			redirect('login');
		}elseif($this->session->userdata('akses')==true && $this->session->userdata('level')!='aset'){
			show_404();
		} 
		$this->load->model('Model_status_pendayagunaan','MSP');		
	}

	public function index()
	{
		$this->session->set_userdata('aksi', false);
		$data['title'] = 'Status Pendayagunaan Content';
		$this->load->view('css');
		$this->load->view('header');
		$this->load->view('status_pendayagunaan',$data);

		$data['st_pendayagunaan'] = $this->MSP->list_st_pendayagunaan()->result();
		$this->load->view('show_status_pendayagunaan',$data);
		$this->load->view('footer');
	}

	public function input_simpan(){
		$this->session->set_userdata('aksi', false);
		$desc_pendayagunaan = $this->input->post('desc_pendayagunaan');
		$cek = $this->MSP->cek_list_pendayagunaan($desc_pendayagunaan);
		if(!$cek){
			$this->session->set_flashdata('something',1);
			$data_status_pendayagunaan = array(
				'deskripsi_pendayagunaan'=>$this->input->post('desc_pendayagunaan'));
			$this->db->insert('tb_status_pendayagunaan', $data_status_pendayagunaan);
		}else{
			$this->session->set_flashdata('something',2);
		}
		redirect('status_pendayagunaan');
	}

	public function edit(){
		$this->session->set_userdata('aksi', true);
		$no_id = $this->uri->segment(3);
		$data['no_id'] = $this->MSP->get_st_pendayagunaan($no_id)->row_array();
		$data['title'] = 'Status pendayagunaan Content';

		$this->load->view('css');
		$this->load->view('header');
		$this->load->view('status_pendayagunaan',$data);
 
		$data['st_pendayagunaan'] = $this->MSP->list_st_pendayagunaan()->result();
		$this->load->view('show_status_pendayagunaan',$data);
		$this->load->view('footer');
	}

	public function edit_simpan(){
		$no_id = $this->input->post('no_id');
		$desc_pendayagunaan = $this->input->post('desc_pendayagunaan');
		$cek = $this->MSP->cek_list_pendayagunaan($desc_pendayagunaan);
		if(!$cek){
			$this->session->set_flashdata('something',1);		
			$data_status_pendayagunaan = array(
				'deskripsi_pendayagunaan'=>$this->input->post('desc_pendayagunaan'));
			$this->db->where('id_pendayagunaan',$no_id);
			$this->db->update('tb_status_pendayagunaan', $data_status_pendayagunaan);
		}else{
			$this->session->set_flashdata('something',3);
		}
		redirect('status_pendayagunaan');
	}

	public function hapus(){
		$no_id = $this->uri->segment(3);
		$this->db->where('id_pendayagunaan',$no_id);
		$this->db->delete('tb_status_pendayagunaan');
		redirect('status_pendayagunaan');
	}

	public function hapus_stpendayagunaan(){
		$id = $this->input->post("id");
		$this->MSP->hapus($id);
	}

}

/* End of file Status_pendayagunaan.php */
/* Location: ./application/controllers/Status_pendayagunaan.php */