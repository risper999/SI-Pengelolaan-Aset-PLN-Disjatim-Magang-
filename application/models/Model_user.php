<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_user extends CI_Model{
	function cek_user($user,$pass){
		$this->db->select('username,password,jabatan');
		$this->db->from('tb_user');
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

	function list_user(){
		$user = $this->db->get('tb_user');
		return $user;
	}

	function get_user($id_user){ 
		$user = $this->db->get_where('tb_user',array('id_user'=>$id_user));
		return $user;
	}

	function cek_list_user($username){
		$this->db->select('*');
		$this->db->from('tb_user');
		$this->db->where('username',$username);
		$userdb = $this->db->get();
		if($userdb->num_rows()>0){
			return $userdb;
		}else{
			return false;
		}
	}

	function delUser($id){
		$this->db->where('id_user',$id);
		$this->db->delete('tb_user');
	}
}