<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_login extends CI_Model {

	function cek_user($user,$pass){
		$this->db->select('id_user,username,nama,password,jabatan,a.id_area,no_id,a.status');
		$this->db->from('tb_user a');
		$this->db->join('tb_area b','b.id_area=a.id_area','left');
		$this->db->where('username',$user);
		$this->db->where('password',$pass);
		$this->db->limit(1);

		$query= $this->db->get();

		if($query->num_rows()==1){
			return $query->result();
		}else{
			return false;
		}	
	}
}