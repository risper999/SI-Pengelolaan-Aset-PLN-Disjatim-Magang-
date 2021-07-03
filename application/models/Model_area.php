<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_area extends CI_Model {
	
	function list_area(){ 
		$this->db->order_by('tb_area.no_id','desc');
		$area = $this->db->get('tb_area');		
		return $area;
	}

	function list_area_dd(){ 
		$this->db->select('no_id,id_area,nama_area');
		$this->db->from('tb_area');
		$area = $this->db->get();
		return $area->result();
	}

	function get_area($no_id){ 
		$area = $this->db->get_where('tb_area',array('no_id'=>$no_id));
		return $area;
	}

	function get_area_join($id_user){ 
		$this->db->join('tb_area', 'tb_area.id_area = tb_user.id_area','left')->select("tb_area.*, tb_area.id_area, tb_area.nama_area");
		$this->db->order_by('tb_user.id_user', 'desc');
		$rayon = $this->db->get_where('tb_user',array('tb_user.id_user'=>$id_user));
		return $rayon;		
	}

	function delArea($id){
		$this->db->where('no_id',$id);
		$this->db->delete('tb_area');
	}

	function cek_area($nama_area,$id_area){
		$this->db->from('tb_area');
		$this->db->where('nama_area',$nama_area);
		$this->db->or_where('id_area',$id_area);
		$this->db->limit(1);
		$query= $this->db->get();
		if($query->num_rows()==1){
			return $query->result();
		}else{
			return false;
		}	
	}
}