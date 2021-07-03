<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_status_provinsi extends CI_Model {

	function list_st_provinsi(){ 
		$st_provinsi = $this->db->get('tb_provinsi');
		return $st_provinsi;
	}

	function get_st_provinsi($no_id){ 
		$list_st_provinsi = $this->db->get_where('tb_provinsi',array('id_provinsi'=>$no_id));
		return $list_st_provinsi;
	}

	function hapus($id){
		$this->db->where('id_provinsi',$id);
		$this->db->delete('tb_provinsi');
	}

	function cek_list_provinsi($des_provinsi){
		$this->db->from('tb_provinsi');
		$this->db->where('provinsi_nama',$des_provinsi);
		$data = $this->db->get();
		if($data->num_rows()>0){
			return $data;
		}else{
			return false;
		}
	}
}