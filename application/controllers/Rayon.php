<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rayon extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('akses')==false or $this->session->userdata("status")==0) {
            redirect('login');
        }
        $this->load->model('Model_rayon','MR');
        $this->load->model('Model_area','MA');
	}

	public function index()
	{
		$this->session->set_userdata('aksi', false);
		$this->load->view('css');
		$this->load->view('header');
		$data['title'] = 'Rayon Content';
		$data['list'] = $this->MA->list_area()->result();

		if($this->session->userdata('akses')==true && $this->session->userdata('level')=='aset'){
			$this->load->view('rayon',$data);}

		$data['no_id'] = '';
		if($this->session->userdata('akses')==true && $this->session->userdata('level')=='area'){
				$no_id_area = $this->session->userdata('no_id_area');
				$data['rayon'] = $this->MR->get_rayon_join_special($no_id_area)->result();		
				$this->load->view('show_rayon',$data);
			}else{
				$data['rayon'] = $this->MR->list_join()->result();
				$this->load->view('show_rayon',$data);
			}		
		$this->load->view('footer');
	}

	public function input_simpan(){
		$this->session->set_userdata('aksi', false);
		$id_rayon = $this->input->post('id_rayon');
		$nama_rayon = $this->input->post('nama_rayon');
		$cek = $this->MR->cek_list_rayon($id_rayon,$nama_rayon);
		if(!$cek){
			$this->session->set_flashdata('something',1);
			$data_rayon = array(
			'no_id_area'=>$this->input->post('no_id_area'),
			'id_rayon'=>$id_rayon,
			'nama_rayon'=>$nama_rayon,
			'alamat'=>$this->input->post('alamat'));
			$this->db->insert('tb_rayon', $data_rayon);
		}else{
			$this->session->set_flashdata('something',2);
		}		
		redirect('rayon');
	}

	public function edit(){
		$this->session->set_userdata('aksi', true);
		$no_id = $this->uri->segment(3);
		$data['no_id'] = $this->MR->get_rayon_join($no_id)->row_array();
		$data['list'] = $this->MA->list_area()->result();
		$data['title'] = 'Rayon Content';

		$this->load->view('css');
		$this->load->view('header');
		$this->load->view('rayon',$data);
 
		$data['rayon'] = $this->MR->list_join()->result();
		$this->load->view('show_rayon',$data);
		$this->load->view('footer');
	}

	public function edit_simpan(){
		$no_id = $this->input->post('no_id');
		$this->session->set_flashdata('something',1);
		$data_rayon = array(
			'no_id_area'=>$this->input->post('no_id_area'),
			'alamat'=>$this->input->post('alamat'));
		$this->db->where('no_id',$no_id);
		$this->db->update('tb_rayon', $data_rayon);	
		redirect('rayon');
	}

	public function hapusRayon(){
		$id = $this->input->post("id");
		$this->MR->delRayon($id);
	}
}