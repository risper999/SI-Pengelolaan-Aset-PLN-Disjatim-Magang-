<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_pengajuan_proyek extends CI_Model {

	function list_pengajuan_join(){
		$this->db->select('a.id_pengajuan,a.id_area,a.id_rayon,a.nama_pengajuan,a.distribusi,a.lokasi_pengajuan,a.thn_pengajuan,a.nilai_pengajuan,a.nilai_persetujuan,a.uraian_pekerjaan,a.data_pendukung,a.status,a.approval_aset_reason,a.alasan_tolak,b.nama_area,c.nama_rayon');
		$this->db->from('tb_pengajuan a');
		$this->db->join('tb_area b','a.id_area = b.id_area', 'left');
		$this->db->join('tb_rayon c','a.id_rayon = c.id_rayon', 'left');
		$this->db->order_by('a.id_pengajuan', 'desc');
		$pengajuan = $this->db->get();
		return $pengajuan;
	}

	function list_pengajuan_join_a($id_area){
		$this->db->select('a.id_pengajuan,a.id_area,a.id_rayon,a.nama_pengajuan,a.distribusi,a.lokasi_pengajuan,a.thn_pengajuan,a.nilai_pengajuan,a.nilai_persetujuan,a.uraian_pekerjaan,a.data_pendukung,a.status,a.approval_aset_reason,a.alasan_tolak,b.nama_area,c.nama_rayon');
		$this->db->from('tb_pengajuan a');
		$this->db->join('tb_area b','a.id_area = b.id_area', 'left');
		$this->db->join('tb_rayon c','a.id_rayon = c.id_rayon', 'left');
		$this->db->where('a.id_area',$id_area);
		$this->db->order_by('a.id_pengajuan', 'desc');
		$pengajuan = $this->db->get();
		return $pengajuan;
	}
}

/* End of file Model_pengajuan_proyek.php */
/* Location: ./application/models/Model_pengajuan_proyek.php */