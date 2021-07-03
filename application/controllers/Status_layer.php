<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Status_layer extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('akses')==false or $this->session->userdata("status")==0){
			redirect('login');
		}elseif($this->session->userdata('akses')==true && $this->session->userdata('level')!='aset'){
			show_404();
		} 
		$this->load->model('Model_status_layer','MSY');		
	}

	public function index()
	{
		$this->session->set_userdata('aksi', false);
		$data['title'] = 'Status Layer Content';
		$this->load->view('css');
		$this->load->view('header');
		$this->load->view('status_layer',$data);
		$data['st_layer'] = $this->MSY->list_st_layer()->result();
		$this->load->view('show_status_layer',$data);
		$this->load->view('footer');
	}

	public function input_simpan(){
		$this->session->set_userdata('aksi', false);

		$des_layer = $this->input->post('desc_layer');
		$cek = $this->MSY->cek_list_layer($des_layer);
		if(!$cek){
			$this->session->set_flashdata('something',1);
			$data_status_layer = array(
				'deskripsi_layer'=>$this->input->post('desc_layer'));
			$this->db->insert('tb_status_layer', $data_status_layer);
		}else{
			$this->session->set_flashdata('something',2);
		}
		redirect('status_layer');
	}

	public function edit(){
		$this->session->set_userdata('aksi', true);
		$no_id = $this->uri->segment(3);
		$data['no_id'] = $this->MSY->get_st_layer($no_id)->row_array();
		$data['title'] = 'Status Layer Content';

		$this->load->view('css');
		$this->load->view('header');
		$this->load->view('status_layer',$data);
 
		$data['st_layer'] = $this->MSY->list_st_layer()->result();
		$this->load->view('show_status_layer',$data);
		$this->load->view('footer');
	}

	public function edit_simpan(){
		$no_id = $this->input->post('no_id');		
		$des_layer = $this->input->post('desc_layer');
		$cek = $this->MSY->cek_list_layer($des_layer);
		if(!$cek){
			$this->session->set_flashdata('something',1);
			$data_status_layer = array(
			'deskripsi_layer'=>$this->input->post('desc_layer'));
			$this->db->where('id_layer',$no_id);
			$this->db->update('tb_status_layer', $data_status_layer);
		}else{
			$this->session->set_flashdata('something',3);
		}
		redirect('status_layer');
	}

	public function hapus_stlayer(){
		$id = $this->input->post("id");
		$this->MSY->hapus($id);
	}
}

/* End of file Status_layer.php */
/* Location: ./application/controllers/Status_layer.php */