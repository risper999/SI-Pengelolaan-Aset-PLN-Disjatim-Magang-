 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_aset_gudang extends CI_Model {

	function list_gudang(){ 
		$gudang = $this->db->get('tb_gudang');
		return $gudang;
	}

	function list_gudang_join(){ 
		$this->db->select('*');
		$this->db->from('tb_gudang a');
		$this->db->join('tb_tanah b','a.id_as_tanah = b.id_tanah','inner');
		$this->db->join('tb_status_terjual c','a.status_terjual_gd = c.id_terjual','inner');
		$this->db->order_by('a.id_gudang','asc');
		$query = $this->db->get();
		if($query->num_rows() != 0){
		return $query;
		}else{
			return false;
		}
	}

	function cek_nama_gudang($nama_gudang){
		$this->db->select('nama_gudang');
		$this->db->from('tb_gudang');
		$this->db->where('nama_gudang',$nama_gudang);
		$this->db->limit(1);
		$query= $this->db->get();
		if($query->num_rows()==1){
			return $query->result();
		}else{
			return false;
		}	
	}

	function get_gudang_join($no_id){ 
		$this->db->select('*');
		$this->db->from('tb_gudang a');
		$this->db->join('tb_tanah b','a.id_as_tanah = b.id_tanah','inner');
		$this->db->join('tb_status_terjual c','a.status_terjual_gd = c.id_terjual','inner');
		$this->db->where('a.id_gudang',$no_id);
		$this->db->order_by('a.id_gudang','asc');
		$query = $this->db->get();
		if($query->num_rows() != 0){
			return $query;
		}else{
			return false;
		}
	}

	function hapus($id){
		$this->db->where('id_gudang',$id);
		$this->db->delete('tb_gudang');
	}
	
}

/* End of file Model_aset_gudang.php */
/* Location: ./application/models/Model_aset_gudang.php */