<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_status_tanah extends CI_Model {

	function list_st_tanah(){ 
		$list_st_tanah = $this->db->get('tb_status_tanah');
		return $list_st_tanah;
	}

	function get_st_tanah($no_id){ 
		$list_st_tanah = $this->db->get_where('tb_status_tanah',array('id_status_tanah'=>$no_id));
		return $list_st_tanah;
	}

	function hapus($id){
		$this->db->where('id_status_tanah',$id);
		$this->db->delete('tb_status_tanah');
	}

	function cek_list_tanah($des_tanah){
		$this->db->from('tb_status_tanah');
		$this->db->where('desc_status_tanah',$des_tanah);
		$data = $this->db->get();
		if($data->num_rows()>0){
			return $data;
		}else{
			return false;
		}
	}
}

/* End of file Model_show_status_tanah.php */
/* Location: ./application/models/Model_show_status_tanah.php */