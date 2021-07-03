<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Status_lokasi extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('akses')==false or $this->session->userdata("status")==0){
			redirect('login');
		}elseif($this->session->userdata('akses')==true && $this->session->userdata('level')!='aset'){
			show_404();
		}
		$this->load->model('Model_status_plant','MSN');
		$this->load->model('Model_status_provinsi','MSP');
		$this->load->model('Model_status_lokasi','MSL');	
		$this->load->view('css');
		$this->load->view('header');		
	}

	public function index()
	{
		$this->session->set_userdata('aksi', false);
		$data['title'] = 'Status Lokasi Content';
		$data['st_plant']=$this->MSN->list_st_plant()->result();
		$data['st_provinsi']=$this->MSP->list_st_provinsi()->result();
		$this->load->view('status_lokasi',$data);
		$data['st_lokasi']=$this->MSL->list_st_lokasi_join();
		$this->load->view('show_status_lokasi',$data);
		$this->load->view('footer');
	}

	public function input_simpan(){
		$this->session->set_userdata('aksi', false);
		$dsc = $this->input->post('nama_lokasi');
		$cek = $this->MSL->cek_list_lokasi($dsc);
		if(!$cek){
			$this->session->set_flashdata('something',1);
			$data_status_lokasi = array(
				'nama_lokasi'=>$dsc,
				'id_plant'=>$this->input->post('id_plant'),
				'alamat'=>$this->input->post('alamat'),
				'kode_pos'=>$this->input->post('kode_pos'),
				'kecamatan'=>$this->input->post('kecamatan'),
				'kabupaten'=>$this->input->post('kabupaten'),
				'id_provinsi'=>$this->input->post('id_provinsi'),
				'lat'=>$this->input->post('lat'),
				'lng'=>$this->input->post('lng'));
			$this->db->insert('tb_lokasi', $data_status_lokasi);
		}else{
			$this->session->set_flashdata('something',2);
		}
		redirect('status_lokasi');
	}

	public function edit(){
		$this->session->set_userdata('aksi', true);
		$data['title'] = 'Status Lokasi Content';
		$data['st_plant']=$this->MSN->list_st_plant()->result();
		$data['st_provinsi']=$this->MSP->list_st_provinsi()->result();
		$no_id = $this->uri->segment(3);
		
		$data['get_lokasi'] = $this->MSL->get_st_lokasi_join($no_id)->row_array();
		$this->load->view('status_lokasi',$data);
 
		$data['st_lokasi']=$this->MSL->list_st_lokasi_join();
		$this->load->view('show_status_lokasi',$data);
		$this->load->view('footer');
	}

	public function edit_simpan(){
		$no_id = $this->input->post('get_lokasi');
		$this->session->set_flashdata('something',1);		
		$data_status_lokasi = array(
			'id_plant'=>$this->input->post('id_plant'),
			'alamat'=>$this->input->post('alamat'),
			'kode_pos'=>$this->input->post('kode_pos'),
			'kecamatan'=>$this->input->post('kecamatan'),
			'kabupaten'=>$this->input->post('kabupaten'),
			'id_provinsi'=>$this->input->post('id_provinsi'),
			'lat'=>$this->input->post('lat'),
			'lng'=>$this->input->post('lng'));
		$this->db->where('id_lokasi',$no_id);
		$this->db->update('tb_lokasi', $data_status_lokasi);
		redirect('status_lokasi');
	}

	public function hapus_stlokasi(){
		$id = $this->input->post("id");
		$this->MSL->hapus($id);
	}
}

/* End of file Status_lokasi.php */
/* Location: ./application/controllers/Status_lokasi.php */