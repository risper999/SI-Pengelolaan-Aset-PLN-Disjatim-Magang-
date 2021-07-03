<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_aset_wisma extends CI_Model {

	function list_wisma(){
		$wisma = $this->db->get('tb_wisma');
		return $wisma;
	}

	function list_wisma_nama($nama_wisma){
		$this->db->where('nama_wisma',$nama_wisma);
		$wisma = $this->db->get('tb_wisma');
		if($wisma->num_rows() > 0){
			return $wisma;
		}else{
			return false;
		}
	}

	function list_wisma_join(){ 
		$this->db->select('*');
		$this->db->from('tb_wisma a');
		$this->db->join('tb_tanah b','a.id_tanah = b.id_tanah','inner');
		$this->db->join('tb_status_terjual c','a.status_terjual = c.id_terjual','inner');
		$this->db->join('tb_status_layak d','a.status_layak = d.id_layak','inner');
		$this->db->join('tb_status_rumah e','a.status_rumah = e.id_rumah','inner');
		$this->db->order_by('a.id_wisma','asc');
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
	}

	function get_wisma_join($no_id){ 
		$this->db->select('*');
		$this->db->from('tb_wisma a');
		$this->db->join('tb_tanah b','a.id_tanah = b.id_tanah','inner');
		$this->db->join('tb_status_terjual c','a.status_terjual = c.id_terjual','inner');
		$this->db->join('tb_status_layak d','a.status_layak = d.id_layak','inner');
		$this->db->join('tb_status_rumah e','a.status_rumah = e.id_rumah','inner');
		$this->db->order_by('a.id_wisma','asc');
		$this->db->where('a.id_wisma',$no_id);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query;
		}else{
			return false;
		}
	}

	function hapus($id){
		$this->db->where('id_wisma',$id);
		$this->db->delete('tb_wisma');
	}
}

/* End of file Model_aset_wisma.php */
/* Location: ./application/models/Model_aset_wisma.php */