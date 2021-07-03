<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan_proyek extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		if($this->session->userdata('akses')==false) {
            redirect('login');
        }
    	$this->load->model('Model_area','MA');
    	$this->load->model('Model_rayon','MR');
    	$this->load->model('Model_aset_tanah','MAT');
    	$this->load->model('Model_aset_wisma','MAW');
    	$this->load->model('Model_aset_gudang','MAG');
    	$this->load->model('Model_aset_bangunan','MAB');
		$this->load->model('Model_pengajuan_proyek','MPP');
		$this->load->model('Model_notif','MN');
	}

	public function index()
	{
		$no_id_area = $this->session->userdata('no_id_area');
		$id_area = $this->session->userdata('area');

		$this->session->set_userdata('aksi', false);
		$data['title'] = 'Pengajuan Proyek Content';
		$this->load->view('css');
		$this->load->view('header');
		$data['area'] = $this->MA->get_area($no_id_area)->result();
		$data['rayon'] = $this->MR->get_rayon_join_special($no_id_area)->result();
		$data['tanah'] = $this->MAT->list_tanah()->result();
		$data['wisma'] = $this->MAW->list_wisma()->result();
		$data['gudang'] = $this->MAG->list_gudang()->result();
		$data['bangunan'] = $this->MAB->list_bangunan()->result();
		$data['no_id'] = '';

		if($this->session->userdata('akses')==true && $this->session->userdata('level')=='area'){
			$this->load->view('pengajuan_proyek',$data);
			$data['pengajuan_proyek'] = $this->MPP->list_pengajuan_join_a($id_area)->result();
		}else{
			$data['pengajuan_proyek'] = $this->MPP->list_pengajuan_join()->result();
		}			

		$this->load->view('show_pengajuan_proyek',$data);
		$this->load->view('footer');
	}

	function input_simpan(){
		$this->session->set_userdata('aksi', false);
		$id_user = $this->session->userdata('id_user');
		if(!empty($_FILES["userfile"]["tmp_name"])){
			$fileName =explode(".",$_FILES["userfile"]["name"]);
			$filesize = $_FILES['userfile']['size'];
			if($fileName[1]=="zip" or $fileName[1]=="rar"){
				if($filesize <= 5000000){
					$name = $_FILES['userfile']["name"];
					$config['upload_path'] = 'assets/uploads/';
					$config['upload_path'] = APPPATH."../assets/uploads/";
					$config['max_size']    = 5000000; //5MB
					$config['allowed_types'] = 'zip|rar';

					$this->load->library('upload', $config);
					if($this->upload->do_upload()){
						$data_pengajuan_proyek = array(
						'nama_pengajuan'=>$this->input->post('nama_pengajuan'),
						'distribusi'=>$this->input->post('distribusi'),
						'thn_pengajuan'=>$this->input->post('thn_pengajuan'),
						'id_area'=>$this->input->post('id_area'),
						'id_rayon'=>$this->input->post('id_rayon'),
						'lokasi_pengajuan'=>$this->input->post('alamat'),
						'id_tanah'=>$this->input->post('id_tanah'),
						'id_wisma'=>$this->input->post('id_wisma'),
						'id_bangunan'=>$this->input->post('id_bangunan'),
						'id_gudang'=>$this->input->post('id_gudang'),
						'nilai_pengajuan'=>$this->input->post('nilai_pengajuan'),
						'uraian_pekerjaan'=>$this->input->post('uraian_pekerjaan'),
						'request_id'=>$this->session->userdata('id_user'),
						'kategori'=>1,
						'data_pendukung'=>$name);
						$this->db->insert('tb_pengajuan', $data_pengajuan_proyek);
						$id_proyek = $this->db->insert_id();

						$data_notif = array(
							'id_user'=>$id_user,
							'id_proyek'=>$id_proyek,
							'kategori'=>1,
							'status'=>0,
							'dilihat'=>0,
							'last_update'=>date('Y-m-d H:i:s')
						);
						$this->db->insert('tb_notif', $data_notif);
						$this->session->set_flashdata('something',1);
					}else{
						$this->session->set_flashdata('something',5);
					}					
				}else{
					$this->session->set_flashdata('something',4);
				}				
			}else{
				$this->session->set_flashdata('something',3);
			}			
		}else{
			$this->session->set_flashdata('something',2);
		}
		redirect('Pengajuan_proyek');
	}

	public function setujuiaset(){
		$id = $this->input->post("id");
		$id_user = $this->session->userdata('id_user');

		$data_pengajuan_proyek = array(
			'status'=>3);
		$this->db->where('id_pengajuan',$id);
		$this->db->update('tb_pengajuan', $data_pengajuan_proyek);

		$data_notif = array(
			'kategori'=>2,
			'status'=>1,
			'dilihat'=>0,
			'last_update'=>date('Y-m-d H:i:s')
		);
		$this->db->where('id_proyek',$id);
		$this->db->update('tb_notif', $data_notif);
	}

	public function setujuisetengah(){
		$this->session->set_userdata('aksi', false);
		$id_user = $this->session->userdata('id_user');

		if(!empty($_FILES["userfile"]["tmp_name"])){
			$fileName =explode(".",$_FILES["userfile"]["name"]);
			$filesize = $_FILES['userfile']['size'];
			if($fileName[1]=="zip" or $fileName[1]=="rar"){
				if($filesize <= 5000000){
					$name = $_FILES['userfile']["name"];
					$config['upload_path'] = 'assets/uploads/';
					$config['upload_path'] = APPPATH."../assets/uploads/";
					$config['max_size']    = 5000000; //5MB
					$config['allowed_types'] = 'zip|rar';

					$this->load->library('upload', $config);
					if($this->upload->do_upload()){
						$data_persetujuan_proyek = array(
						'approval_aset_id'=>$id_user,
						'nilai_persetujuan'=>$this->input->post('nilai_persetujuan'),
						'data_pendukung'=>$name,
						'approval_aset_reason'=>$this->input->post('keterangan'),
						'status'=>3,
						'approval_aset_date'=>$this->input->post('tgl_persetujuan'),
						'persetujuan_setengah'=>1,
						);
						$this->db->where('id_pengajuan',$this->input->post('id_persetujuan'));
						$this->db->update('tb_pengajuan', $data_persetujuan_proyek);

						$data_notif = array(
							'kategori'=>2,
							'status'=>1,
							'dilihat'=>0,
							'last_update'=>date('Y-m-d H:i:s')
						);
						$this->db->where('id_proyek',$this->input->post('id_persetujuan'));
						$this->db->update('tb_notif', $data_notif);
						$this->session->set_flashdata('something',1);
					}else{
						$this->session->set_flashdata('something',5);
					}					
				}else{
					$this->session->set_flashdata('something',4);
				}				
			}else{
				$this->session->set_flashdata('something',3);
			}			
		}else{
			$this->session->set_flashdata('something',2);
		}

		redirect('Pengajuan_proyek');
	}

	public function tolakaset(){
		$id = $this->input->post("id_penolakan");
		$id_user = $this->session->userdata('id_user');
		$data_penolakan_proyek = array(
			'alasan_tolak'=>$this->input->post('alasan_tolak'),
			'status'=>4);
		$this->db->where('id_pengajuan',$id);
		$this->db->update('tb_pengajuan', $data_penolakan_proyek);

		$data_notif = array(
			'kategori'=>5,
			'status'=>2,
			'dilihat'=>0,
			'last_update'=>date('Y-m-d H:i:s')
		);
		$this->db->where('id_proyek',$id);
		$this->db->update('tb_notif', $data_notif);		

		redirect('Pengajuan_proyek');
	}

	public function setujuidistribusi(){
		$id_user = $this->session->userdata('id_user');
		$tgl = date("Y-m-d h:i:sa");
		$id = $this->input->post("id");
		$data_pengajuan_proyek = array(
			'status'=>1,
			'approval_id'=>$id_user,
			'approval_aset_date'=>$tgl
	);
		$this->db->where('id_pengajuan',$id);
		$this->db->update('tb_pengajuan', $data_pengajuan_proyek);

		$data_notif = array(
			'kategori'=>3,
			'status'=>1,
			'dilihat'=>0,
			'last_update'=>date('Y-m-d H:i:s')
		);
		$this->db->where('id_proyek',$id);
		$this->db->update('tb_notif', $data_notif);		
	}

	public function tolakdistribusi(){
		$id = $this->input->post("id");
		$id_user = $this->session->userdata('id_user');
		$data_penolakan_proyek = array(
			'alasan_tolak'=>$this->input->post('alasan_tolak'),
			'status'=>2);
		$this->db->where('id_pengajuan',$id);
		$this->db->update('tb_pengajuan', $data_penolakan_proyek);

		$data_notif = array(
			'kategori'=>4,
			'status'=>2,
			'dilihat'=>0,
			'last_update'=>date('Y-m-d H:i:s')
		);
		$this->db->where('id_proyek',$id);
		$this->db->update('tb_notif', $data_notif);		

		redirect('Pengajuan_proyek');
	}

	public function view(){
		$data['json'] = $this->MN->getNotif();
		echo json_encode($data['json']);
	}
}