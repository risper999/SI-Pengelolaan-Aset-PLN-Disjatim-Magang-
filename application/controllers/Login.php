<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller 
{

	function __construct(){
		parent::__construct();
		$this->load->model('Model_login');
		$this->load->view('css');
	}

	public function index()
	{
		$data['title'] = 'Login Content';
		$this->load->view('login',$data);
	}

	public function var_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$ceklogin = $this->Model_login->cek_user($username,md5($password));
		
		if($ceklogin){
			foreach ($ceklogin as $row) {			
				$this->session->set_userdata('username', $row->username);
				$this->session->set_userdata('nama', $row->nama);
				$this->session->set_userdata('level', $row->jabatan);
				$this->session->set_userdata('area', $row->id_area);
				$this->session->set_userdata('no_id_area', $row->no_id);
				$this->session->set_userdata('id_user', $row->id_user);
				$this->session->set_userdata('status', $row->status);
				$this->session->set_userdata('akses',true);
				$level = $this->session->userdata('level');
				$status = $this->session->userdata('status');
				if(($level=='admin')or($level=='aset')or($level=='distribusi')or($level=='area')){
					if($status==1){
						redirect('dashboard') ;	
					}else{
						$data['pesan']="<script> swal('LOGIN GAGAL !','Website sedang diperbaiki','warning'); </script>";
						$data['title'] = 'Login Content';
						$this->load->view('login',$data);						
					}					
				}
			}
		}
		else{
				$data['pesan']="<script> swal('LOGIN GAGAL !','Akun belum terdaftar','error', {button:'coba lagi'}); </script>";
				$data['title'] = 'Login Content';
				$this->load->view('login',$data);
			}
		}

	public function logout(){
		$this->session->sess_destroy();
		redirect('login');
	}
}