<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aset_wisma extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('akses')==false or $this->session->userdata("status")==0) {
            redirect('login');
        }elseif($this->session->userdata('akses')==true && $this->session->userdata('level')!='aset'){
			show_404();
		}
		$this->load->model('Model_aset_tanah','MAT');
		$this->load->model('Model_aset_wisma','MAW');  
        $this->load->model('Model_status_terjual','MSJ');
        $this->load->model('Model_status_rumah','MSR');
        $this->load->model('Model_status_kelayakan','MSK');
	}

	public function index()
	{
		$this->session->set_userdata('aksi', false);
		$data['title'] = 'Wisma Content';
		$this->load->view('css');
		$this->load->view('header');
		$data['as_tanah'] = $this->MAT->list_tanah()->result();
		$data['st_jual'] = $this->MSJ->list_st_terjual()->result();
		$data['st_rumah'] = $this->MSR->list_st_rumah()->result();
		$data['st_layak'] = $this->MSK->list_st_kelayakan()->result();
		$this->load->view('aset_wisma',$data);

		$data['as_wisma'] = $this->MAW->list_wisma_join();
		$this->load->view('show_aset_wisma',$data);
		$this->load->view('footer');
	}

	public function input_simpan(){
		$this->session->set_userdata('aksi', false);
		$nama = $this->input->post('nama_wisma');		
		$cek = $this->MAW->list_wisma_nama($nama);
		if(!$cek){
			$this->session->set_flashdata('something',1);
			$data_aset_wisma = array(
			'nama_wisma'=>$nama,
			'id_tanah'=>$this->input->post('id_tanah'),
			'harga_wisma'=>$this->input->post('harga_wisma'),
			'luas_wisma'=>$this->input->post('luas_wisma'),
			'no_imb_wisma'=>$this->input->post('no_imb_wisma'),
			'status_terjual'=>$this->input->post('id_terjual'),
			'status_layak'=>$this->input->post('id_layak'),
			'status_rumah'=>$this->input->post('id_rumah'));
			$this->db->insert('tb_wisma', $data_aset_wisma);
		}else{
			$this->session->set_flashdata('something',2);
		}		
		redirect('aset_wisma');
	}

	public function edit(){
		$this->session->set_userdata('aksi', true);
		$no_id = $this->uri->segment(3);
		$data['title'] = 'Wisma Content';
		$data['as_tanah'] = $this->MAT->list_tanah()->result();
		$data['st_jual'] = $this->MSJ->list_st_terjual()->result();
		$data['st_rumah'] = $this->MSR->list_st_rumah()->result();
		$data['st_layak'] = $this->MSK->list_st_kelayakan()->result();
		$data['get_wisma'] = $this->MAW->get_wisma_join($no_id)->row_array();

		$this->load->view('css');
		$this->load->view('header');
		$this->load->view('aset_wisma',$data);
 
		$data['as_wisma'] = $this->MAW->list_wisma_join();
		$this->load->view('show_aset_wisma',$data);
		$this->load->view('footer');
	}

	public function edit_simpan(){
		$this->session->set_flashdata('something',1);
		$no_id = $this->input->post('id_wisma');
		$data_aset_wisma = array(
			'id_tanah'=>$this->input->post('id_tanah'),
			'harga_wisma'=>$this->input->post('harga_wisma'),
			'luas_wisma'=>$this->input->post('luas_wisma'),
			'no_imb_wisma'=>$this->input->post('no_imb_wisma'),
			'status_terjual'=>$this->input->post('id_terjual'),
			'status_layak'=>$this->input->post('id_layak'),
			'status_rumah'=>$this->input->post('id_rumah'));
		$this->db->where('id_wisma',$no_id);
		$this->db->update('tb_wisma', $data_aset_wisma);
		redirect('aset_wisma'); 		
	}

	public function hapus_wisma(){
		$id = $this->input->post("id");
		$this->MAW->hapus($id);
	}

}

/* End of file Wisma.php */
/* Location: ./application/controllers/Wisma.php */