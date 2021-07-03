<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_status_rumah extends CI_Model {

	function list_st_rumah(){ 
		$st_rumah = $this->db->get('tb_status_rumah');
		return $st_rumah;
	}

	function get_st_rumah($no_id){ 
		$list_st_rumah = $this->db->get_where('tb_status_rumah',array('id_rumah'=>$no_id));
		return $list_st_rumah;
	}

	function hapus($id){
		$this->db->where('id_rumah',$id);
		$this->db->delete('tb_status_rumah');
	}

	function cek_list_rumah($des_rumah){
		$this->db->from('tb_status_rumah');
		$this->db->where('deskripsi_rumah',$des_rumah);
		$data = $this->db->get();
		if($data->num_rows()>0){
			return $data;
		}else{
			return false;
		}
	}
}

/* End of file Model_status_rumah.php */
/* Location: ./application/models/Model_status_rumah.php */