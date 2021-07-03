<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_aset_bangunan extends CI_Model {
	
	function list_bangunan(){
		$bangunan = $this->db->get('tb_bangunan');
		return $bangunan;
	}


	function list_as_bangunan_join(){ 
		$this->db->select('*');
		$this->db->from('tb_bangunan a');
		$this->db->join('tb_tanah b','a.id_tanah = b.id_tanah','inner');
		$this->db->join('tb_status_terjual c','a.status_terjual = c.id_terjual','inner');
		$this->db->join('tb_status_layer d','a.status_layer = d.id_layer','inner');
		$this->db->order_by('a.id_bangunan','asc');
		$query = $this->db->get();
		if($query->num_rows() != 0){
		return $query;
		}else{
			return false;
		}
	}

	function get_as_bangunan_join($id_bangunan){ 
		$this->db->select('*');
		$this->db->from('tb_bangunan a');
		$this->db->where('a.id_bangunan',$id_bangunan);
		$this->db->join('tb_tanah b','a.id_tanah = b.id_tanah','inner');
		$this->db->join('tb_status_terjual c','a.status_terjual = c.id_terjual','inner');
		$this->db->join('tb_status_layer d','a.status_layer = d.id_layer','inner');
		$this->db->order_by('a.id_bangunan','asc');
		$query = $this->db->get();
		if($query->num_rows() != 0){
		return $query;
		}else{
			return false;
		}
	}

	function cek_nama_bangunan($nama_bangunan){
		$this->db->from('tb_bangunan');
		$this->db->where('nama_bangunan',$nama_bangunan);
		$this->db->limit(1);
		$query= $this->db->get();
		if($query->num_rows()==1){
			return $query->result();
		}else{
			return false;
		}	
	}

	function hapus($id){
		$this->db->where('id_bangunan',$id);
		$this->db->delete('tb_bangunan');
	}
}

/* End of file Model_aset_bangunan.php */
/* Location: ./application/models/Model_aset_bangunan.php */