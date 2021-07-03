<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grafik extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('akses')==false or $this->session->userdata("status")==0){
			redirect('login');
		}
		$this->load->model('Model_grafik','MG');
		$this->load->model('Model_area','MA');
		$this->load->view('css');
		$this->load->view('header');	
	}

	public function index()
	{
		$data['title'] = 'Grafik Content';
		$tahun = date("Y");
		$this->session->set_userdata('tahun_grafik', $tahun);

		if($this->session->userdata('level')!='area') {
			$data['Situbondo'] = $this->MG->statistik_proyek2("'STB'",''.$tahun.'')->result_array();
			foreach($data['Situbondo'][0] as $row){
				$data['STB'][]=(float)$row;
			}
			$data['Sidoarjo'] = $this->MG->statistik_proyek2("'SDA'",''.$tahun.'')->result_array();
			foreach($data['Sidoarjo'][0] as $row){
				$data['SDA'][]=(float)$row;
			}
			$data['SurabayaU'] = $this->MG->statistik_proyek2("'SBU'",''.$tahun.'')->result_array();
			foreach($data['SurabayaU'][0] as $row){
				$data['SBU'][]=(float)$row;
			}
			$data['SurabayaS'] = $this->MG->statistik_proyek2("'SBS'",''.$tahun.'')->result_array();
			foreach($data['SurabayaS'][0] as $row){
				$data['SBS'][]=(float)$row;
			}
			$data['SurabayaB'] = $this->MG->statistik_proyek2("'SBB'",''.$tahun.'')->result_array();
			foreach($data['SurabayaB'][0] as $row){
				$data['SBB'][]=(float)$row;
			}
			$data['Pasuruan'] = $this->MG->statistik_proyek2("'PSR'",''.$tahun.'')->result_array();
			foreach($data['Pasuruan'][0] as $row){
				$data['PSR'][]=(float)$row;
			}
			$data['Ponorogo'] = $this->MG->statistik_proyek2("'PNG'",''.$tahun.'')->result_array();
			foreach($data['Ponorogo'][0] as $row){
				$data['PNG'][]=(float)$row;
			}
			$data['Pamekasan'] = $this->MG->statistik_proyek2("'PKS'",''.$tahun.'')->result_array();
			foreach($data['Pamekasan'][0] as $row){
				$data['PKS'][]=(float)$row;
			}
			$data['Malang'] = $this->MG->statistik_proyek2("'MLG'",''.$tahun.'')->result_array();
			foreach($data['Malang'][0] as $row){
				$data['MLG'][]=(float)$row;
			}
			$data['Mojokerto'] = $this->MG->statistik_proyek2("'MJK'",''.$tahun.'')->result_array();
			foreach($data['Mojokerto'][0] as $row){
				$data['MJK'][]=(float)$row;
			}
			$data['Madiun'] = $this->MG->statistik_proyek2("'MDN'",''.$tahun.'')->result_array();
			foreach($data['Madiun'][0] as $row){
				$data['MDN'][]=(float)$row;
			}
			$data['Kediri'] = $this->MG->statistik_proyek2("'KDR'",''.$tahun.'')->result_array();
			foreach($data['Kediri'][0] as $row){
				$data['KDR'][]=(float)$row;
			}
			$data['Jember'] = $this->MG->statistik_proyek2("'JBR'",''.$tahun.'')->result_array();
			foreach($data['Jember'][0] as $row){
				$data['JBR'][]=(float)$row;
			}
			$data['Gresik'] = $this->MG->statistik_proyek2("'GRK'",''.$tahun.'')->result_array();
			foreach($data['Gresik'][0] as $row){
				$data['GRK'][]=(float)$row;
			}
			$data['Banyuwangi'] = $this->MG->statistik_proyek2("'BWG'",''.$tahun.'')->result_array();
			foreach($data['Banyuwangi'][0] as $row){
				$data['BWG'][]=(float)$row;
			}
			$data['AreaPengaturDistribusi'] = $this->MG->statistik_proyek2("'APD'",''.$tahun.'')->result_array();
			foreach($data['AreaPengaturDistribusi'][0] as $row){
				$data['APD'][]=(float)$row;
			}
		}else{
			$no_id = $this->session->userdata('no_id_area');
			$Area = $this->MA->get_area($no_id)->row_array();
			$id_Area = $Area['id_area'];
			$data['nama_area'] = $Area['nama_area'];

			$data['Area'] = $this->MG->statistik_proyek2("'".$id_Area."'",''.$tahun.'')->result_array();
			foreach($data['Area'][0] as $row){
				$data['id_Area'][]=(float)$row;
			}
		}
		$this->load->view('grafik',$data);
		$this->load->view('footer');
	}


	public function cek_tahun()
	{
		$data['title'] = 'Grafik Content';
		
		$tahun = $this->input->post('tahun');
		$this->session->set_userdata('tahun_grafik', $tahun);

		if($this->session->userdata('level')!='area') {
			$data['Situbondo'] = $this->MG->statistik_proyek2("'STB'",''.$tahun.'')->result_array();
			foreach($data['Situbondo'][0] as $row){
				$data['STB'][]=(float)$row;
			}
			$data['Sidoarjo'] = $this->MG->statistik_proyek2("'SDA'",''.$tahun.'')->result_array();
			foreach($data['Sidoarjo'][0] as $row){
				$data['SDA'][]=(float)$row;
			}
			$data['SurabayaU'] = $this->MG->statistik_proyek2("'SBU'",''.$tahun.'')->result_array();
			foreach($data['SurabayaU'][0] as $row){
				$data['SBU'][]=(float)$row;
			}
			$data['SurabayaS'] = $this->MG->statistik_proyek2("'SBS'",''.$tahun.'')->result_array();
			foreach($data['SurabayaS'][0] as $row){
				$data['SBS'][]=(float)$row;
			}
			$data['SurabayaB'] = $this->MG->statistik_proyek2("'SBB'",''.$tahun.'')->result_array();
			foreach($data['SurabayaB'][0] as $row){
				$data['SBB'][]=(float)$row;
			}
			$data['Pasuruan'] = $this->MG->statistik_proyek2("'PSR'",''.$tahun.'')->result_array();
			foreach($data['Pasuruan'][0] as $row){
				$data['PSR'][]=(float)$row;
			}
			$data['Ponorogo'] = $this->MG->statistik_proyek2("'PNG'",''.$tahun.'')->result_array();
			foreach($data['Ponorogo'][0] as $row){
				$data['PNG'][]=(float)$row;
			}
			$data['Pamekasan'] = $this->MG->statistik_proyek2("'PKS'",''.$tahun.'')->result_array();
			foreach($data['Pamekasan'][0] as $row){
				$data['PKS'][]=(float)$row;
			}
			$data['Malang'] = $this->MG->statistik_proyek2("'MLG'",''.$tahun.'')->result_array();
			foreach($data['Malang'][0] as $row){
				$data['MLG'][]=(float)$row;
			}
			$data['Mojokerto'] = $this->MG->statistik_proyek2("'MJK'",''.$tahun.'')->result_array();
			foreach($data['Mojokerto'][0] as $row){
				$data['MJK'][]=(float)$row;
			}
			$data['Madiun'] = $this->MG->statistik_proyek2("'MDN'",''.$tahun.'')->result_array();
			foreach($data['Madiun'][0] as $row){
				$data['MDN'][]=(float)$row;
			}
			$data['Kediri'] = $this->MG->statistik_proyek2("'KDR'",''.$tahun.'')->result_array();
			foreach($data['Kediri'][0] as $row){
				$data['KDR'][]=(float)$row;
			}
			$data['Jember'] = $this->MG->statistik_proyek2("'JBR'",''.$tahun.'')->result_array();
			foreach($data['Jember'][0] as $row){
				$data['JBR'][]=(float)$row;
			}
			$data['Gresik'] = $this->MG->statistik_proyek2("'GRK'",''.$tahun.'')->result_array();
			foreach($data['Gresik'][0] as $row){
				$data['GRK'][]=(float)$row;
			}
			$data['Banyuwangi'] = $this->MG->statistik_proyek2("'BWG'",''.$tahun.'')->result_array();
			foreach($data['Banyuwangi'][0] as $row){
				$data['BWG'][]=(float)$row;
			}
			$data['AreaPengaturDistribusi'] = $this->MG->statistik_proyek2("'APD'",''.$tahun.'')->result_array();
			foreach($data['AreaPengaturDistribusi'][0] as $row){
				$data['APD'][]=(float)$row;
			}
		}else{
			$no_id = $this->session->userdata('no_id_area');
			$Area = $this->MA->get_area($no_id)->row_array();
			$id_Area = $Area['id_area'];
			$data['nama_area'] = $Area['nama_area'];

			$data['Area'] = $this->MG->statistik_proyek2("'".$id_Area."'",''.$tahun.'')->result_array();
			foreach($data['Area'][0] as $row){
				$data['id_Area'][]=(float)$row;
			}
		}
		$this->load->view('grafik',$data);
		$this->load->view('footer');
	}
}