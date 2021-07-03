<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if($this->session->userdata("akses")==false or $this->session->userdata("status")==0) {
            redirect('login');
        }
        $this->load->model('Model_grafik','MG');
        
	}

	public function index()
	{
		$data['title'] = 'Dashboard';
		$this->load->view('css');
		$this->load->view('header');
		if($this->session->userdata('level')=='area'){
			$id_area = $this->session->userdata('area');
			$data['total'] = $this->MG->statistik_proyek_total_area($id_area)->result();
			$data['disetujui'] = $this->MG->statistik_proyek_disetujui_area($id_area)->result();
			$data['ditolak'] = $this->MG->statistik_proyek_ditolak_area($id_area)->result();
			$data['tunggu'] = $this->MG->statistik_proyek_tunggu_area($id_area)->result();
		}else{
			$data['total'] = $this->MG->statistik_proyek_total()->result();
			$data['disetujui'] = $this->MG->statistik_proyek_disetujui()->result();
			$data['ditolak'] = $this->MG->statistik_proyek_ditolak()->result();
			$data['tunggu'] = $this->MG->statistik_proyek_tunggu()->result();
		}			
		$this->load->view('dashboard',$data);
		$this->load->view('footer');
	}
}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */