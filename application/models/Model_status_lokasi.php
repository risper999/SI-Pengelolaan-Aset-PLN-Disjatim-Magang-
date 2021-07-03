<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_status_lokasi extends CI_Model {
	
	function list_st_lokasi(){ 
		$lokasi = $this->db->get('tb_lokasi');
		return $lokasi;
	}

	function list_st_lokasi_join(){
		$this->db->select('*');
		$this->db->from('tb_lokasi a');
		$this->db->join('tb_plant b','a.id_plant = b.id_plant');
		$this->db->join('tb_provinsi c','a.id_provinsi = c.id_provinsi'); 
		$lokasi = $this->db->get();
		return $lokasi;
	}

	function cek_list_lokasi($nama){
		$this->db->from('tb_lokasi');
		$this->db->where('nama_lokasi',$nama);
		$data = $this->db->get();
		if($data->num_rows()>0){
			return $data;
		}else{
			return false;
		}
	}

	function get_st_lokasi_join($id_lokasi){
		$this->db->select('*');
		$this->db->from('tb_lokasi a');
		$this->db->join('tb_plant b','a.id_plant = b.id_plant');
		$this->db->join('tb_provinsi c','a.id_provinsi = c.id_provinsi');
		$this->db->where('a.id_lokasi',$id_lokasi); 
		$lokasi = $this->db->get();
		return $lokasi;
	}

	function get_st_lokasi($id_lokasi){ 
		$lokasi = $this->db->get_where('tb_lokasi',array('tb_lokasi.id_lokasi'=>$id_lokasi));
		return $lokasi;
	}

	function hapus($id){
		$this->db->where('id_lokasi',$id);
		$this->db->delete('tb_lokasi');
	}

	

}

/* End of file Model_status_lokasi.php */
/* Location: ./application/models/Model_status_lokasi.php */