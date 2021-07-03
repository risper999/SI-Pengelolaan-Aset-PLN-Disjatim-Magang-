<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_status_layer extends CI_Model {
	function list_st_layer(){ 
		$st_layer = $this->db->get('tb_status_layer');
		return $st_layer;
	}

	function get_st_layer($no_id){ 
		$list_st_layer = $this->db->get_where('tb_status_layer',array('id_layer'=>$no_id));
		return $list_st_layer;
	}

	function hapus($id){
		$this->db->where('id_layer',$id);
		$this->db->delete('tb_status_layer');
	}

	function cek_list_layer($des_layer){
		$this->db->from('tb_status_layer');
		$this->db->where('deskripsi_layer',$des_layer);
		$data = $this->db->get();
		if($data->num_rows()>0){
			return $data;
		}else{
			return false;
		}
	}
}

/* End of file Model_status_layer.php */
/* Location: ./application/models/Model_status_layer.php */