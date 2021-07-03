<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aset_tanah extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('akses')==false or $this->session->userdata("status")==0) {
            redirect('login');
        }elseif($this->session->userdata('akses')==true && $this->session->userdata('level')!='aset'){
			show_404();
		}
        $this->load->model('Model_aset_tanah','MAT');
        $this->load->model('Model_status_lokasi','MSL');
        $this->load->model('Model_status_pendayagunaan','MSP');
        $this->load->model('Model_status_kepemilikan','MSK');
        $this->load->model('Model_status_tanah','MST');
        $this->load->model('Model_status_terjual','MSJ');
        $this->load->view('css');
		$this->load->view('header');
	}

	public function index(){
		$this->session->set_userdata('aksi', false);		
		$data['st_lokasi'] = $this->MSL->list_st_lokasi()->result();
		$data['st_dayaguna'] = $this->MSP->list_st_pendayagunaan()->result();
		$data['st_milik'] = $this->MSK->list_st_kepemilikan()->result();
		$data['st_tanah'] = $this->MST->list_st_tanah()->result();
		$data['st_jual'] = $this->MSJ->list_st_terjual()->result();
		$data['title'] = 'Tanah Content';	
		$this->load->view('aset_tanah',$data);

		$data['data'] = $this->MAT->list_tanah_join()->result();
		$data['no_id'] = '';
		$this->load->view('show_aset_tanah',$data);
		$this->load->view('footer');
	}

	public function input_simpan(){

		$this->session->set_userdata('aksi', false);
		$nama_tanah = $this->input->post('nama_tanah');
		$cek = $this->MAT->cek_nama_tanah($nama_tanah);
			if(!$cek){
				$this->session->set_flashdata('something',1);
				$data_aset_tanah = array(
					'nama_tanah'=>$nama_tanah,
					'status_lokasi'=>$this->input->post('status_lokasi'),
					'alamat_tanah'=>$this->input->post('alamat_tanah'),
					'harga_tanah'=>$this->input->post('harga_tanah'),
					'luas_tanah'=>$this->input->post('luas_tanah'),
					'latitude'=>$this->input->post('latitude'),
					'longitude'=>$this->input->post('longitude'),
					'no_pbb'=>$this->input->post('no_pbb'),
					'biaya_pbb'=>$this->input->post('biaya_pbb'),
					'no_bphtb'=>$this->input->post('no_bphtb'),
					'biaya_bphtb'=>$this->input->post('biaya_bphtb'),
					'no_sertifikat'=>$this->input->post('no_sertifikat'),
					'tgl_berlaku_sertifikat'=>$this->input->post('tgl_berlaku_sertifikat'),
					'tgl_berakhir_sertifikat'=>$this->input->post('tgl_berakhir_sertifikat'),
					'status_pendayagunaan'=>$this->input->post('status_pendayagunaan'),
					'status_kepemilikan'=>$this->input->post('status_kepemilikan'),
					'status_tanah'=>$this->input->post('status_tanah'),
					'status_terjual'=>$this->input->post('status_terjual'));
				$this->db->insert('tb_tanah', $data_aset_tanah);
			}else{
				$this->session->set_flashdata('something',2);
			}
		redirect('aset_tanah');
	}

	public function edit(){
		$this->session->set_userdata('aksi', true);
		$no_id = $this->uri->segment(3);		
		$data['st_lokasi'] = $this->MSL->list_st_lokasi()->result();
		$data['st_dayaguna'] = $this->MSP->list_st_pendayagunaan()->result();
		$data['st_milik'] = $this->MSK->list_st_kepemilikan()->result();
		$data['st_tanah'] = $this->MST->list_st_tanah()->result();
		$data['st_jual'] = $this->MSJ->list_st_terjual()->result();
		$data['no_id'] = $this->MAT->get_tanah_join($no_id)->row_array();
		$data['title'] = 'Tanah Content';
		$this->load->view('aset_tanah',$data);
 
		$data['data'] = $this->MAT->list_tanah_join()->result();
		$this->load->view('show_aset_tanah',$data);
		$this->load->view('footer');
	}

	public function edit_simpan(){
		$no_id = $this->input->post('id_tanah');
		$this->session->set_flashdata('something',1);
		$data_aset_tanah = array(
			'status_lokasi'=>$this->input->post('status_lokasi'),
			'alamat_tanah'=>$this->input->post('alamat_tanah'),
			'harga_tanah'=>$this->input->post('harga_tanah'),
			'luas_tanah'=>$this->input->post('luas_tanah'),
			'latitude'=>$this->input->post('latitude'),
			'longitude'=>$this->input->post('longitude'),
			'no_pbb'=>$this->input->post('no_pbb'),
			'biaya_pbb'=>$this->input->post('biaya_pbb'),
			'no_bphtb'=>$this->input->post('no_bphtb'),
			'biaya_bphtb'=>$this->input->post('biaya_bphtb'),
			'no_sertifikat'=>$this->input->post('no_sertifikat'),
			'tgl_berlaku_sertifikat'=>$this->input->post('tgl_berlaku_sertifikat'),
			'tgl_berakhir_sertifikat'=>$this->input->post('tgl_berakhir_sertifikat'),
			'status_pendayagunaan'=>$this->input->post('status_pendayagunaan'),
			'status_kepemilikan'=>$this->input->post('status_kepemilikan'),
			'status_tanah'=>$this->input->post('status_tanah'),
			'status_terjual'=>$this->input->post('status_terjual'));
		$this->db->where('id_tanah',$no_id);
		$this->db->update('tb_tanah', $data_aset_tanah);
		redirect('aset_tanah');
	}

	public function hapus_tanah(){
		$id = $this->input->post('id');
		$this->MAT->del_tanah($id);
	}

	public function import_exel(){
		if(!empty($_FILES["excelFile"]["tmp_name"])){
			$fileName =explode(".",$_FILES["excelFile"]["name"]);
			if($fileName[1]=="csv"){
				$file = $_FILES["excelFile"]["tmp_name"];
				$openFile=fopen($file,"r");
				$no=0;
				while ($dataFile = fgetcsv($openFile,3000,",")){
					$no++;
					$status_lokasi = $dataFile[0];
					$nama_tanah = $dataFile[1];
					$alamat_tanah = $dataFile[2];
					$harga_tanah = $dataFile[3];
					$luas_tanah = $dataFile[4];
					$latitude = $dataFile[5];
					$longitude = $dataFile[6];
					$no_pbb = $dataFile[7];
					$biaya_pbb = $dataFile[8];
					$no_bphtb = $dataFile[9];
					$biaya_bphtb = $dataFile[10];
					$no_sertifikat = $dataFile[11];
					$tgl_berlaku_sertifikat = $dataFile[12];
					$tgl_berlaku_sertifikat_n = date("Y-m-d", strtotime($tgl_berlaku_sertifikat));
					$tgl_berakhir_sertifikat = $dataFile[13];
					$tgl_berakhir_sertifikat_n = date("Y-m-d", strtotime($tgl_berakhir_sertifikat));
					$status_pendayagunaan = $dataFile[14];
					$status_kepemilikan = $dataFile[15];
					$status_tanah = $dataFile[16];
					$status_terjual = $dataFile[17];
					if($no != 1){
						$data_aset_tanah = array(
						'status_lokasi'=>$status_lokasi,
						'nama_tanah'=>$nama_tanah,						
						'alamat_tanah'=>$alamat_tanah,
						'harga_tanah'=>$harga_tanah,
						'luas_tanah'=>$luas_tanah,
						'latitude'=>$latitude,
						'longitude'=>$longitude,
						'no_pbb'=>$no_pbb,
						'biaya_pbb'=>$biaya_pbb,
						'no_bphtb'=>$no_bphtb,
						'biaya_bphtb'=>$biaya_bphtb,
						'no_sertifikat'=>$no_sertifikat,
						'tgl_berlaku_sertifikat'=> $tgl_berlaku_sertifikat_n ,
						'tgl_berakhir_sertifikat'=> $tgl_berakhir_sertifikat_n ,
						'status_pendayagunaan'=>$status_pendayagunaan,
						'status_kepemilikan'=>$status_kepemilikan,
						'status_tanah'=>$status_tanah,
						'status_terjual'=>$status_terjual);

						$cek = $this->MAT->cek_nama_tanah($nama_tanah);
						if(!$cek){
							$this->db->insert('tb_tanah', $data_aset_tanah);
							$this->session->set_flashdata('something',1);

						}else{
							$this->session->set_flashdata('something',2);
						}
					}
				}				
			}else{
				$this->session->set_flashdata('something',3);
			}			
		}else{
			$this->session->set_flashdata('something',4);
		}
		redirect('aset_tanah');
	}
}