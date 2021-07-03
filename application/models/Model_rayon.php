<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_rayon extends CI_Model {

	function list_join(){ 
		$this->db->join('tb_area', 'tb_area.no_id = tb_rayon.no_id_area','left')->select("tb_rayon.*, tb_area.id_area, tb_area.nama_area");
		$this->db->order_by('tb_rayon.no_id', 'desc');
		$rayon = $this->db->get('tb_rayon');
		return $rayon;
	}

	function cek_list_rayon($id_rayon,$nama_rayon){
		$this->db->select('*');
		$this->db->from('tb_rayon');
		$this->db->where('id_rayon',$id_rayon);
		$this->db->or_where('nama_rayon',$nama_rayon);
		$rayon = $this->db->get();
		if($rayon->num_rows()>0){
			return $rayon;
		}else{
			return false;
		}
	}


	function get_rayon_join($no_id){ 
		$this->db->join('tb_area', 'tb_area.no_id = tb_rayon.no_id_area','left')->select("tb_rayon.*, tb_area.id_area, tb_area.nama_area");
		$this->db->order_by('tb_rayon.no_id', 'desc');
		$rayon = $this->db->get_where('tb_rayon',array('tb_rayon.no_id'=>$no_id));
		return $rayon;		
	}

	function get_rayon_join_special($id_area){ 
		$this->db->join('tb_area', 'tb_area.no_id = tb_rayon.no_id_area','left')->select("tb_rayon.*, tb_area.id_area, tb_area.nama_area");
		$this->db->order_by('tb_rayon.no_id', 'desc');
		$rayon = $this->db->get_where('tb_rayon',array('tb_rayon.no_id_area'=>$id_area));
		return $rayon;		
	}

	function delRayon($id){
		$this->db->where('id_rayon',$id);
		$this->db->delete('tb_rayon');
	}
}