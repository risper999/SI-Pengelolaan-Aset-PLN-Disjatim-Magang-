<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_status_terjual extends CI_Model {
	
	function list_st_terjual(){ 
		$st_terjual = $this->db->get('tb_status_terjual');
		return $st_terjual;
	}

	function get_st_terjual($no_id){ 
		$list_st_terjual = $this->db->get_where('tb_status_terjual',array('id_terjual'=>$no_id));
		return $list_st_terjual;
	}

	function hapus($id){
		$this->db->where('id_terjual',$id);
		$this->db->delete('tb_status_terjual');
	}

	function cek_list_terjual($des_terjual){
		$this->db->from('tb_status_terjual');
		$this->db->where('deskripsi_terjual',$des_terjual);
		$data = $this->db->get();
		if($data->num_rows()>0){
			return $data;
		}else{
			return false;
		}
	}
}

/* End of file Model_status_terjual.php */
/* Location: ./application/models/Model_status_terjual.php */