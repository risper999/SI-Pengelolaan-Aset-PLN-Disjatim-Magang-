<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_status_pendayagunaan extends CI_Model {

	function list_st_pendayagunaan(){ 
		$st_pendayagunaan = $this->db->get('tb_status_pendayagunaan');
		return $st_pendayagunaan;
	}

	function get_st_pendayagunaan($no_id){ 
		$list_st_pendayagunaan = $this->db->get_where('tb_status_pendayagunaan',array('id_pendayagunaan'=>$no_id));
		return $list_st_pendayagunaan;
	}

	function hapus($id){
		$this->db->where('id_pendayagunaan',$id);
		$this->db->delete('tb_status_pendayagunaan');
	}

	function cek_list_pendayagunaan($des_pendayagunaan){
		$this->db->from('tb_status_pendayagunaan');
		$this->db->where('deskripsi_pendayagunaan',$des_pendayagunaan);
		$data = $this->db->get();
		if($data->num_rows()>0){
			return $data;
		}else{
			return false;
		}
	}

}

/* End of file Modal_pendayagunaan.php */
/* Location: ./application/models/Modal_pendayagunaan.php */