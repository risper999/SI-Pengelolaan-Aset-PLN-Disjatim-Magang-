<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aset_bangunan extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('akses')==false or $this->session->userdata("status")==0) {
            redirect('login');
        }elseif($this->session->userdata('akses')==true && $this->session->userdata('level')!='aset'){
			show_404();
		}
		$this->load->model('Model_aset_tanah','MAT');
		$this->load->model('Model_status_terjual','MSJ');
		$this->load->model('Model_status_layer','MSL');
		$this->load->model('Model_aset_bangunan','MAB');
	}

	public function index()
	{
		$this->session->set_userdata('aksi', false);
		$data['title'] = 'Bangunan Content';
		$this->load->view('css');
		$this->load->view('header');
		$data['as_tanah'] = $this->MAT->list_tanah()->result();
		$data['st_jual'] = $this->MSJ->list_st_terjual()->result();
		$data['st_layer'] = $this->MSL->list_st_layer()->result();
		$this->load->view('aset_bangunan',$data);

		$data['as_bangunan'] = $this->MAB->list_as_bangunan_join();
		$this->load->view('show_aset_bangunan',$data);
		$this->load->view('footer');
	}

	public function input_simpan(){
		$this->session->set_userdata('aksi', false);
		$nama_bangunan = $this->input->post('nama_bangunan');
		$cek = $this->MAB->cek_nama_bangunan($nama_bangunan);
		if(!$cek){
			$this->session->set_flashdata('something',1);
			$data_aset_bangunan= array(
				'id_bangunan'=>$this->input->post('id_bangunan'),
				'nama_bangunan'=>$nama_bangunan,
				'id_tanah'=>$this->input->post('id_as_tanah'),
				'harga_bangunan'=>$this->input->post('harga_bangunan'),
				'luas_bangunan'=>$this->input->post('luas_bangunan'),
				'no_imb_bangunan'=>$this->input->post('no_imb_bangunan'),
				'status_terjual'=>$this->input->post('id_terjual'),
				'status_layer'=>$this->input->post('id_layer'));
			$this->db->insert('tb_bangunan', $data_aset_bangunan);
		}else{
			$this->session->set_flashdata('something',2);
		}
		redirect('aset_bangunan');
	}

	public function edit(){
		$this->session->set_userdata('aksi', true);
		$no_id = $this->uri->segment(3);
		$data['title'] = 'Bangunan Content';
		$data['as_tanah'] = $this->MAT->list_tanah()->result();
		$data['st_jual'] = $this->MSJ->list_st_terjual()->result();
		$data['st_layer'] = $this->MSL->list_st_layer()->result();
		$data['get_bangunan'] = $this->MAB->get_as_bangunan_join($no_id)->row_array();

		$this->load->view('css');
		$this->load->view('header');
		$this->load->view('aset_bangunan',$data);
 
		$data['as_bangunan'] = $this->MAB->list_as_bangunan_join();
		$this->load->view('show_aset_bangunan',$data);
		$this->load->view('footer');
	}

	public function edit_simpan(){
		$this->session->set_flashdata('something',1);
		$no_id = $this->input->post('no_id');
		$data_aset_bangunan= array(
			'id_tanah'=>$this->input->post('id_as_tanah'),
			'harga_bangunan'=>$this->input->post('harga_bangunan'),
			'luas_bangunan'=>$this->input->post('luas_bangunan'),
			'no_imb_bangunan'=>$this->input->post('no_imb_bangunan'),
			'status_terjual'=>$this->input->post('id_terjual'),
			'status_layer'=>$this->input->post('id_layer'));
		$this->db->where('tb_bangunan.id_bangunan',$no_id);
		$this->db->update('tb_bangunan', $data_aset_bangunan);		
		redirect('aset_bangunan');
	}

	public function hapus_bangunan(){
		$id = $this->input->post("id");
		$this->MAB->hapus($id);
	}

}

/* End of file Bangunan.php */
/* Location: ./application/controllers/Bangunan.php */