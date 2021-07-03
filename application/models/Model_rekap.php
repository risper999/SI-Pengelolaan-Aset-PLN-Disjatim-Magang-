<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_rekap extends CI_Model {

	function list_pengajuan_join1(){
		$this->db->select('
			a.distribusi,a.alasan_tolak,a.id_area,a.nama_pengajuan,a.nilai_pengajuan,a.tgl_pengajuan,a.nilai_persetujuan,a.approval_aset_date,a.approval_aset_reason,a.status,d.luas_tanah,e.luas_wisma,f.luas_gudang,g.luas_bangunan,a.id_rayon,b.nama_area,c.nama_rayon,a.id_tanah,a.id_bangunan,a.id_wisma,a.id_gudang,b.nama_area,c.nama_rayon,d.nama_tanah,e.nama_wisma,f.nama_gudang,g.nama_bangunan');
		$this->db->from('tb_pengajuan a');
		$this->db->join('tb_area b','a.id_area = b.id_area', 'left');
		$this->db->join('tb_rayon c','a.id_rayon = c.id_rayon', 'left');

		$this->db->join('tb_tanah d','a.id_tanah = d.id_tanah', 'left');
		$this->db->join('tb_gudang f','a.id_gudang = f.id_gudang', 'left');
		$this->db->join('tb_wisma e','a.id_wisma = e.id_wisma', 'left');
		$this->db->join('tb_bangunan g','a.id_bangunan = g.id_bangunan', 'left');

		$this->db->order_by('a.id_pengajuan','desc');
		$query = $this->db->get();
		return $query;
	}

	function list_pengajuan_join2($id_area){
		$this->db->select('
			a.distribusi,a.alasan_tolak,a.id_area,a.nama_pengajuan,a.nilai_pengajuan,a.tgl_pengajuan,a.nilai_persetujuan,a.approval_aset_date,a.approval_aset_reason,a.status,d.luas_tanah,e.luas_wisma,f.luas_gudang,g.luas_bangunan,a.id_rayon,b.nama_area,c.nama_rayon,a.id_tanah,a.id_bangunan,a.id_wisma,a.id_gudang,b.nama_area,c.nama_rayon,d.nama_tanah,e.nama_wisma,f.nama_gudang,g.nama_bangunan');
		$this->db->from('tb_pengajuan a');
		$this->db->join('tb_area b','a.id_area = b.id_area', 'left');
		$this->db->join('tb_rayon c','a.id_rayon = c.id_rayon', 'left');

		$this->db->join('tb_tanah d','a.id_tanah = d.id_tanah', 'left');
		$this->db->join('tb_gudang f','a.id_gudang = f.id_gudang', 'left');
		$this->db->join('tb_wisma e','a.id_wisma = e.id_wisma', 'left');
		$this->db->join('tb_bangunan g','a.id_bangunan = g.id_bangunan', 'left');

		$this->db->where("a.id_area",$id_area);
		$this->db->order_by('a.id_pengajuan','desc');
		$query = $this->db->get();
		return $query;
	}

	function get_pengajuan_join1($tgl){
		$this->db->select('
			a.distribusi,a.alasan_tolak,a.id_area,a.nama_pengajuan,a.nilai_pengajuan,a.tgl_pengajuan,a.nilai_persetujuan,a.approval_aset_date,a.approval_aset_date,a.approval_aset_reason,a.status,d.luas_tanah,e.luas_wisma,f.luas_gudang,g.luas_bangunan,a.id_rayon,b.nama_area,c.nama_rayon,a.id_tanah,a.id_bangunan,a.id_wisma,a.id_gudang,b.nama_area,c.nama_rayon,d.nama_tanah,e.nama_wisma,f.nama_gudang,g.nama_bangunan');
		$this->db->from('tb_pengajuan a');
		$this->db->join('tb_area b','a.id_area = b.id_area', 'left');
		$this->db->join('tb_rayon c','a.id_rayon = c.id_rayon', 'left');

		$this->db->join('tb_tanah d','a.id_tanah = d.id_tanah', 'left');
		$this->db->join('tb_gudang f','a.id_gudang = f.id_gudang', 'left');
		$this->db->join('tb_wisma e','a.id_wisma = e.id_wisma', 'left');
		$this->db->join('tb_bangunan g','a.id_bangunan = g.id_bangunan', 'left');

		$this->db->where("a.tgl_pengajuan BETWEEN '".$tgl."'");
		$this->db->order_by('a.id_pengajuan','desc');
		$query = $this->db->get();
		return $query;
	}


	function get_pengajuan_join2($tgl,$id_area){
		$this->db->select('
			a.distribusi,a.alasan_tolak,a.id_area,a.nama_pengajuan,a.nilai_pengajuan,a.tgl_pengajuan,a.nilai_persetujuan,a.approval_aset_date,a.approval_aset_reason,a.status,d.luas_tanah,e.luas_wisma,f.luas_gudang,g.luas_bangunan,a.id_rayon,b.nama_area,c.nama_rayon,a.id_tanah,a.id_bangunan,a.id_wisma,a.id_gudang,b.nama_area,c.nama_rayon,d.nama_tanah,e.nama_wisma,f.nama_gudang,g.nama_bangunan');
		$this->db->from('tb_pengajuan a');
		$this->db->join('tb_area b','a.id_area = b.id_area', 'left');
		$this->db->join('tb_rayon c','a.id_rayon = c.id_rayon', 'left');

		$this->db->join('tb_tanah d','a.id_tanah = d.id_tanah', 'left');
		$this->db->join('tb_gudang f','a.id_gudang = f.id_gudang', 'left');
		$this->db->join('tb_wisma e','a.id_wisma = e.id_wisma', 'left');
		$this->db->join('tb_bangunan g','a.id_bangunan = g.id_bangunan', 'left');

		$this->db->where("a.tgl_pengajuan BETWEEN '".$tgl."'");
		$this->db->where("a.id_area",$id_area);
		$this->db->order_by('a.id_pengajuan','desc');
		$query = $this->db->get();
		return $query;
	}

	function get_pengajuan_join3($tgl,$status){
		$this->db->select('
			a.distribusi,a.alasan_tolak,a.id_area,a.nama_pengajuan,a.nilai_pengajuan,a.tgl_pengajuan,a.nilai_persetujuan,a.approval_aset_date,a.approval_aset_reason,a.status,d.luas_tanah,e.luas_wisma,f.luas_gudang,g.luas_bangunan,a.id_rayon,b.nama_area,c.nama_rayon,a.id_tanah,a.id_bangunan,a.id_wisma,a.id_gudang,b.nama_area,c.nama_rayon,d.nama_tanah,e.nama_wisma,f.nama_gudang,g.nama_bangunan');
		$this->db->from('tb_pengajuan a');
		$this->db->join('tb_area b','a.id_area = b.id_area', 'left');
		$this->db->join('tb_rayon c','a.id_rayon = c.id_rayon', 'left');

		$this->db->join('tb_tanah d','a.id_tanah = d.id_tanah', 'left');
		$this->db->join('tb_gudang f','a.id_gudang = f.id_gudang', 'left');
		$this->db->join('tb_wisma e','a.id_wisma = e.id_wisma', 'left');
		$this->db->join('tb_bangunan g','a.id_bangunan = g.id_bangunan', 'left');

		$this->db->where("a.tgl_pengajuan BETWEEN '".$tgl."'");
		$this->db->where("a.status",$status);
		$this->db->order_by('a.id_pengajuan','desc');
		$query = $this->db->get();
		return $query;
	}

	function get_pengajuan_join4($tgl,$status,$id_area){
		$this->db->select('
			a.distribusi,a.alasan_tolak,a.id_area,a.nama_pengajuan,a.nilai_pengajuan,a.tgl_pengajuan,a.nilai_persetujuan,a.approval_aset_date,a.approval_aset_reason,a.status,d.luas_tanah,e.luas_wisma,f.luas_gudang,g.luas_bangunan,a.id_rayon,b.nama_area,c.nama_rayon,a.id_tanah,a.id_bangunan,a.id_wisma,a.id_gudang,b.nama_area,c.nama_rayon,d.nama_tanah,e.nama_wisma,f.nama_gudang,g.nama_bangunan');
		$this->db->from('tb_pengajuan a');
		$this->db->join('tb_area b','a.id_area = b.id_area', 'left');
		$this->db->join('tb_rayon c','a.id_rayon = c.id_rayon', 'left');

		$this->db->join('tb_tanah d','a.id_tanah = d.id_tanah', 'left');
		$this->db->join('tb_gudang f','a.id_gudang = f.id_gudang', 'left');
		$this->db->join('tb_wisma e','a.id_wisma = e.id_wisma', 'left');
		$this->db->join('tb_bangunan g','a.id_bangunan = g.id_bangunan', 'left');

		$this->db->where("a.tgl_pengajuan BETWEEN '".$tgl."'");
		$this->db->where("a.status",$status);
		$this->db->where("a.id_area",$id_area);
		$this->db->order_by('a.id_pengajuan','desc');
		$query = $this->db->get();
		return $query;
	}
}