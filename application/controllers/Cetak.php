<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . "third_party/dompdf/autoload.inc.php";
use Dompdf\Dompdf;

class Cetak extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('akses')==false or $this->session->userdata("status")==0){
			redirect('login');
		}
		$this->load->model('Model_rekap','MR');
		$this->load->model('Model_user','MU');
		$this->load->model('Model_area','MA');
	}

	public function exe(){
		$pdf = new Dompdf();
		$paper_size = 'A4';
		$orientation = 'landscape';	
		
		$html = $this->output->get_output();
		$pdf->setPaper($paper_size, $orientation);
		$pdf->loadHtml($html);
		$pdf->render();
		$pdf->stream("laporan pengajuan", $arrayName = ['Attachment' => 0, ]);
	}

	public function pdf(){
		$data['title_page'] = 'REKAP PENGAJUAN PROYEK';

		$this->session->set_userdata('pdf', false);
		$tgl = $this->session->userdata('tgl');
		$level = $this->session->userdata('level');

		if($level=='area'){
			$area = $this->session->userdata('area');
			$data['data_pengajuan'] = $this->MR->get_pengajuan_join2($tgl,$area)->result();
		}else{
			$data['data_pengajuan'] = $this->MR->get_pengajuan_join1($tgl)->result();
		}

		$this->load->view('cetak',$data);

		$this->exe();
	}	

	public function pdf1(){
		$data['title_page'] = 'REKAP PENGAJUAN PROYEK';

		$this->session->set_userdata('pdf1', false);

		$date_area = $this->session->userdata('tgl_area');
		$id_area = $this->session->userdata('pdf_id_area');

		$level = $this->session->userdata('level');

		$data['data_pengajuan'] = $this->MR->get_pengajuan_join2($date_area,$id_area)->result();


		$this->load->view('cetak',$data);
		
		$this->exe();

	}

	public function pdf2(){
		$data['title_page'] = 'REKAP PENGAJUAN PROYEK';

		$this->session->set_userdata('pdf2', false);

		$date_status = $this->session->userdata('tgl_status');
		$status = $this->session->userdata('pdf_status');
		$level = $this->session->userdata('level');

		if($level=='area'){
			$area = $this->session->userdata('area');
			$data['data_pengajuan'] = $this->MR->get_pengajuan_join4($date_status,$status,$area)->result();
		}else{
			$data['data_pengajuan'] = $this->MR->get_pengajuan_join3($date_status,$status)->result();
		}

		$this->load->view('cetak',$data);
		
		$this->exe();
	}

}

/* End of file Cetak.php */
/* Location: ./application/controllers/Cetak.php */