<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_status_kelayakan extends CI_Model {
	function list_st_kelayakan(){ 
		$st_kelayakan = $this->db->get('tb_status_layak');
		return $st_kelayakan;
	}

	function get_st_kelayakan($no_id){ 
		$list_st_kelayakan = $this->db->get_where('tb_status_layak',array('id_layak'=>$no_id));
		return $list_st_kelayakan;
	}

	function hapus($id){
		$this->db->where('id_layak',$id);
		$this->db->delete('tb_status_layak');
	}

	function cek_list_kelayakan($des_layak){
		$this->db->from('tb_status_layak');
		$this->db->where('deskripsi_layak',$des_layak);
		$data = $this->db->get();
		if($data->num_rows()>0){
			return $data;
		}else{
			return false;
		}
	}
}