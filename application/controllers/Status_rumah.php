<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Status_rumah extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('akses')==false or $this->session->userdata("status")==0){
			redirect('login');
		}elseif($this->session->userdata('akses')==true && $this->session->userdata('level')!='aset'){
			show_404();
		} 
		$this->load->model('Model_status_rumah','MSR');		
	}

	public function index()
	{
		$this->session->set_userdata('aksi', false);
		$data['title'] = 'Status Rumah Content';
		$this->load->view('css');
		$this->load->view('header');
		$this->load->view('status_rumah',$data);
		$data['st_rumah'] = $this->MSR->list_st_rumah()->result();
		$this->load->view('show_status_rumah',$data);
		$this->load->view('footer');
	}

	public function input_simpan(){
		$this->session->set_userdata('aksi', false);
		$des_rumah = $this->input->post('desc_rumah');
		$cek = $this->MSR->cek_list_rumah($des_rumah);
		if(!$cek){
			$this->session->set_flashdata('something',1);
			$data_status_rumah= array(
				'deskripsi_rumah'=>$this->input->post('desc_rumah'));
			$this->db->insert('tb_status_rumah', $data_status_rumah);
		}else{
			$this->session->set_flashdata('something',2);
		}
		redirect('status_rumah');
	}

	public function edit(){
		$this->session->set_userdata('aksi', true);
		$no_id = $this->uri->segment(3);
		$data['no_id'] = $this->MSR->get_st_rumah($no_id)->row_array();
		$data['title'] = 'Status Rumah Content';

		$this->load->view('css');
		$this->load->view('header');
		$this->load->view('status_rumah',$data);
 
		$data['st_rumah'] = $this->MSR->list_st_rumah()->result();
		$this->load->view('show_status_rumah',$data);
		$this->load->view('footer');
	}

	public function edit_simpan(){
		$no_id = $this->input->post('no_id');
		$des_rumah = $this->input->post('desc_rumah');
		$cek = $this->MSR->cek_list_rumah($des_rumah);
		if(!$cek){
			$this->session->set_flashdata('something',1);
			$data_status_rumah= array(
				'id_rumah'=>$this->input->post('id_rumah'),
				'deskripsi_rumah'=>$this->input->post('desc_rumah'));
			$this->db->where('id_rumah',$no_id);
			$this->db->update('tb_status_rumah', $data_status_rumah);
		}else{
			$this->session->set_flashdata('something',3);
		}
		redirect('status_rumah');
	}

	public function hapus_strumah(){
		$id = $this->input->post("id");
		$this->MSR->hapus($id);
	}

}

/* End of file Status_rumah.php */
/* Location: ./application/controllers/Status_rumah.php */