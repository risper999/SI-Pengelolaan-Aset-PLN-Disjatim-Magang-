<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_status_kepemilikan extends CI_Model {
	
	function list_st_kepemilikan(){ 
		$st_kepemilikan = $this->db->get('tb_status_kepemilikan');
		return $st_kepemilikan;
	}

	function get_st_kepemilikan($no_id){ 
		$list_st_kepemilikan = $this->db->get_where('tb_status_kepemilikan',array('id_status'=>$no_id));
		return $list_st_kepemilikan;
	}

	function hapus($id){
		$this->db->where('id_status',$id);
		$this->db->delete('tb_status_kepemilikan');
	}

	function cek_list_kepemilikan($des_kepemilikan){
		$this->db->select('*');
		$this->db->from('tb_status_kepemilikan');
		$this->db->where('deskripsi_kepemilikan',$des_kepemilikan);
		$data = $this->db->get();
		if($data->num_rows()>0){
			return $data;
		}else{
			return false;
		}
	}
}