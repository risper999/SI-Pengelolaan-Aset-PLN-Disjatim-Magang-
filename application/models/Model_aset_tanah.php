<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_aset_tanah extends CI_Model {

	function list_tanah(){ 
		$tanah = $this->db->get('tb_tanah');
		return $tanah;
	}

	function list_tanah_join_view(){ //menggunakan milik kha
		$tanah = $this->db->get('view_tanah');
		return $tanah;
	}

	function get_tanah_join_view($no_id){  //menggunakan milik kha
		$tanah = $this->db->get('view_tanah');
		$this->db->where('id_tanah',$no_id);
		return $tanah;
	}

	function list_tanah_join(){ 
		$this->db->select('*');
		$this->db->from('tb_tanah a');
		$this->db->join('tb_status_pendayagunaan b','a.status_pendayagunaan = b.id_pendayagunaan','inner');
		$this->db->join('tb_status_kepemilikan c','a.status_kepemilikan = c.id_status','inner');
		$this->db->join('tb_status_tanah d','a.status_tanah = d.id_status_tanah','inner');
		$this->db->join('tb_status_terjual e','a.status_terjual = e.id_terjual','inner');
		$this->db->join('tb_lokasi f','a.status_lokasi = f.id_lokasi','inner');
		$this->db->order_by('a.id_tanah','asc');
		$query = $this->db->get();
		if($query->num_rows() != 0){
		return $query;
		}else{
			return false;
		}
	}

	function cek_nama_tanah($nama_tanah){
		$this->db->select('nama_tanah');
		$this->db->from('tb_tanah');
		$this->db->where('nama_tanah',$nama_tanah);
		$this->db->limit(1);
		$query= $this->db->get();
		if($query->num_rows()==1){
			return $query->result();
		}else{
			return false;
		}	
	}

	function get_tanah_join($no_id){ 
		$this->db->select('*');
		$this->db->from('tb_tanah a');
		$this->db->join('tb_status_pendayagunaan b','a.status_pendayagunaan = b.id_pendayagunaan','left');
		$this->db->join('tb_status_kepemilikan c','a.status_kepemilikan = c.id_status','inner');
		$this->db->join('tb_status_tanah d','a.status_tanah = d.id_status_tanah','inner');
		$this->db->join('tb_status_terjual e','a.status_terjual = e.id_terjual','inner');
		$this->db->join('tb_lokasi f','a.status_lokasi = f.id_lokasi','inner');
		$this->db->where('a.id_tanah',$no_id);
		$this->db->order_by('a.id_tanah','asc');
		$query = $this->db->get();
		if($query->num_rows() != 0){
			return $query;
		}else{
			return false;
		}
	}

	function del_tanah($id){
		$this->db->where('id_tanah',$id);
		$this->db->delete('tb_tanah');
	}
}