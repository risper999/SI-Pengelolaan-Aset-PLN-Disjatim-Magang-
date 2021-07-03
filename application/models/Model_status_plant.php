<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_status_plant extends CI_Model {

	function list_st_plant(){ 
		$st_plant = $this->db->get('tb_plant');
		return $st_plant;
	}

	function get_st_plant($no_id){ 
		$list_st_plant = $this->db->get_where('tb_plant',array('id_plant'=>$no_id));
		return $list_st_plant;
	}

	function hapus($id){
		$this->db->where('id_plant',$id);
		$this->db->delete('tb_plant');
	}

	function cek_list_plant($des_plant){
		$this->db->from('tb_plant');
		$this->db->where('nama_plant',$des_plant);
		$data = $this->db->get();
		if($data->num_rows()>0){
			return $data;
		}else{
			return false;
		}
	}
}