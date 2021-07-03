<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aset_gudang extends CI_Controller {

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
		$this->load->model('Model_aset_gudang','MAG');
	}

	public function index()
	{
		$this->session->set_userdata('aksi', false);
		$data['title'] = 'Gudang Content';
		$this->load->view('css');
		$this->load->view('header');
		$data['as_tanah'] = $this->MAT->list_tanah()->result();
		$data['st_jual'] = $this->MSJ->list_st_terjual()->result();
		$this->load->view('aset_gudang',$data);

		$data['as_gudang'] = $this->MAG->list_gudang_join();
		$this->load->view('show_aset_gudang',$data);
		$this->load->view('footer');
	}

	public function input_simpan(){
		$this->session->set_userdata('aksi', false);
		$nama_gudang = $this->input->post('nama_gudang');
		$cek = $this->MAG->cek_nama_gudang($nama_gudang);
		if(!$cek){
			$this->session->set_flashdata('something',1);
			$data_aset_gudang = array(
				'nama_gudang'=>$nama_gudang,
				'id_as_tanah'=>$this->input->post('id_as_tanah'),
				'harga_gudang'=>$this->input->post('harga_gudang'),
				'luas_gudang'=>$this->input->post('luas_gudang'),
				'no_imb_gudang'=>$this->input->post('no_imb_gudang'),
				'status_terjual_gd'=>$this->input->post('status_terjual'));
			$this->db->insert('tb_gudang', $data_aset_gudang);
		}else{
			$this->session->set_flashdata('something',2);
		}
		redirect('aset_gudang');
	}

	public function edit(){
		$this->session->set_userdata('aksi', true);
		$no_id = $this->uri->segment(3);
		$data['title'] = 'Gudang Content';
		$data['as_tanah'] = $this->MAT->list_tanah()->result();
		$data['st_jual'] = $this->MSJ->list_st_terjual()->result();
		$data['get_gudang'] = $this->MAG->get_gudang_join($no_id)->row_array();

		$this->load->view('css');
		$this->load->view('header');
		$this->load->view('aset_gudang',$data);
 
		$data['as_gudang'] = $this->MAG->list_gudang_join();
		$this->load->view('show_aset_gudang',$data);
		$this->load->view('footer');
	}

	public function edit_simpan(){
		$no_id = $this->input->post('no_id');
		$this->session->set_flashdata('something',1);
		$data_aset_gudang = array(
			'id_as_tanah'=>$this->input->post('id_as_tanah'),
			'harga_gudang'=>$this->input->post('harga_gudang'),
			'luas_gudang'=>$this->input->post('luas_gudang'),
			'no_imb_gudang'=>$this->input->post('no_imb_gudang'),
			'status_terjual_gd'=>$this->input->post('status_terjual'));
		$this->db->where('id_gudang',$no_id);
		$this->db->update('tb_gudang', $data_aset_gudang);		
		redirect('aset_gudang');
	}

	public function hapus_gudang(){
		$id = $this->input->post("id");
		$this->MAG->hapus($id);
	}

}

/* End of file Gudang.php */
/* Location: ./application/controllers/Gudang.php */