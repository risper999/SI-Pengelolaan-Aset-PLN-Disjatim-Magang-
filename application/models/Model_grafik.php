<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_grafik extends CI_Model {

	function statistik_proyek(){

		$sql=$this->db->query("
				select
				ifnull((SELECT count(id_pengajuan) FROM (tb_pengajuan) WHERE ((Month(tgl_pengajuan)=1) AND (YEAR(tgl_pengajuan)=2018))),0) AS Januari,
				ifnull((SELECT count(id_pengajuan) FROM (tb_pengajuan) WHERE ((Month(tgl_pengajuan)=2) AND (YEAR(tgl_pengajuan)=2018))),0) AS Februari,
				ifnull((SELECT count(id_pengajuan) FROM (tb_pengajuan) WHERE ((Month(tgl_pengajuan)=3) AND (YEAR(tgl_pengajuan)=2018))),0) AS Maret,
				ifnull((SELECT count(id_pengajuan) FROM (tb_pengajuan) WHERE ((Month(tgl_pengajuan)=4) AND (YEAR(tgl_pengajuan)=2018))),0) AS April,
				ifnull((SELECT count(id_pengajuan) FROM (tb_pengajuan) WHERE ((Month(tgl_pengajuan)=5) AND (YEAR(tgl_pengajuan)=2018))),0) AS Mei,
				ifnull((SELECT count(id_pengajuan) FROM (tb_pengajuan) WHERE ((Month(tgl_pengajuan)=6) AND (YEAR(tgl_pengajuan)=2018))),0) AS Juni,
				ifnull((SELECT count(id_pengajuan) FROM (tb_pengajuan) WHERE ((Month(tgl_pengajuan)=7) AND (YEAR(tgl_pengajuan)=2018))),0) AS Juli,
				ifnull((SELECT count(id_pengajuan) FROM (tb_pengajuan) WHERE ((Month(tgl_pengajuan)=8) AND (YEAR(tgl_pengajuan)=2018))),0) AS Agustus,
				ifnull((SELECT count(id_pengajuan) FROM (tb_pengajuan) WHERE ((Month(tgl_pengajuan)=9) AND (YEAR(tgl_pengajuan)=2018))),0) AS September,
				ifnull((SELECT count(id_pengajuan) FROM (tb_pengajuan) WHERE ((Month(tgl_pengajuan)=11) AND (YEAR(tgl_pengajuan)=2018))),0) AS Oktober,
				ifnull((SELECT count(id_pengajuan) FROM (tb_pengajuan) WHERE ((Month(tgl_pengajuan)=11) AND (YEAR(tgl_pengajuan)=2018))),0) AS November,
				ifnull((SELECT count(id_pengajuan) FROM (tb_pengajuan) WHERE ((Month(tgl_pengajuan)=12) AND (YEAR(tgl_pengajuan)=2018))),0) AS Desember from tb_pengajuan GROUP BY Year(thn_pengajuan)");
		return $sql;
			}

	function statistik_proyek2($id_area,$thn){
		$sql=$this->db->query("
				select
				ifnull((SELECT count(id_pengajuan) FROM (tb_pengajuan) WHERE ((id_area)=".$id_area.") AND ((Month(tgl_pengajuan)=1) AND (YEAR(tgl_pengajuan)=".$thn."))),0) AS Januari,
				ifnull((SELECT count(id_pengajuan) FROM (tb_pengajuan) WHERE ((id_area)=".$id_area.") AND((Month(tgl_pengajuan)=2) AND (YEAR(tgl_pengajuan)=".$thn."))),0) AS Februari,
				ifnull((SELECT count(id_pengajuan) FROM (tb_pengajuan) WHERE ((id_area)=".$id_area.") AND((Month(tgl_pengajuan)=3) AND (YEAR(tgl_pengajuan)=".$thn."))),0) AS Maret,
				ifnull((SELECT count(id_pengajuan) FROM (tb_pengajuan) WHERE ((id_area)=".$id_area.") AND((Month(tgl_pengajuan)=4) AND (YEAR(tgl_pengajuan)=".$thn."))),0) AS April,
				ifnull((SELECT count(id_pengajuan) FROM (tb_pengajuan) WHERE ((id_area)=".$id_area.") AND((Month(tgl_pengajuan)=5) AND (YEAR(tgl_pengajuan)=".$thn."))),0) AS Mei,
				ifnull((SELECT count(id_pengajuan) FROM (tb_pengajuan) WHERE ((id_area)=".$id_area.") AND((Month(tgl_pengajuan)=6) AND (YEAR(tgl_pengajuan)=".$thn."))),0) AS Juni,
				ifnull((SELECT count(id_pengajuan) FROM (tb_pengajuan) WHERE ((id_area)=".$id_area.") AND((Month(tgl_pengajuan)=7) AND (YEAR(tgl_pengajuan)=".$thn."))),0) AS Juli,
				ifnull((SELECT count(id_pengajuan) FROM (tb_pengajuan) WHERE ((id_area)=".$id_area.") AND((Month(tgl_pengajuan)=8) AND (YEAR(tgl_pengajuan)=".$thn."))),0) AS Agustus,
				ifnull((SELECT count(id_pengajuan) FROM (tb_pengajuan) WHERE ((id_area)=".$id_area.") AND((Month(tgl_pengajuan)=9) AND (YEAR(tgl_pengajuan)=".$thn."))),0) AS September,
				ifnull((SELECT count(id_pengajuan) FROM (tb_pengajuan) WHERE ((id_area)=".$id_area.") AND((Month(tgl_pengajuan)=11) AND (YEAR(tgl_pengajuan)=".$thn."))),0) AS Oktober,
				ifnull((SELECT count(id_pengajuan) FROM (tb_pengajuan) WHERE ((id_area)=".$id_area.") AND((Month(tgl_pengajuan)=11) AND (YEAR(tgl_pengajuan)=".$thn."))),0) AS November,
				ifnull((SELECT count(id_pengajuan) FROM (tb_pengajuan) WHERE ((id_area)=".$id_area.") AND((Month(tgl_pengajuan)=12) AND (YEAR(tgl_pengajuan)=".$thn."))),0) AS Desember from tb_pengajuan GROUP BY Year(thn_pengajuan)");
		return $sql;
			}

	function statistik_proyek_total(){
		$sql=$this->db->query("
				select b.nama_area , COUNT(a.id_area)as n from tb_pengajuan as a LEFT JOIN tb_area as b ON (a.id_area = b.id_area) WHERE a.thn_pengajuan=2018 GROUP BY b.nama_area");
		return $sql;
			}

	function statistik_proyek_total_area($id_area){
		$sql=$this->db->query("
				select b.nama_area , COUNT(a.id_area)as n from tb_pengajuan as a LEFT JOIN tb_area as b ON (a.id_area = b.id_area) WHERE a.thn_pengajuan=2018 AND a.id_area='".$id_area."' GROUP BY b.nama_area");
		return $sql;
			}

	function statistik_proyek_disetujui(){
		$sql=$this->db->query("
				select b.nama_area , COUNT(a.id_area)as n from tb_pengajuan as a LEFT JOIN tb_area as b ON (a.id_area = b.id_area) WHERE a.thn_pengajuan=2018 AND (a.status=1 OR a.status=3) GROUP BY b.nama_area");
		return $sql;
	}

	function statistik_proyek_disetujui_area($id_area){
		$sql=$this->db->query("
				select b.nama_area , COUNT(a.id_area)as n from tb_pengajuan as a LEFT JOIN tb_area as b ON (a.id_area = b.id_area) WHERE a.thn_pengajuan=2018 AND (a.status=1 OR a.status=3) AND a.id_area='".$id_area."' GROUP BY b.nama_area");
		return $sql;
	}

	function statistik_proyek_ditolak(){
		$sql=$this->db->query("
				select b.nama_area , COUNT(a.id_area)as n from tb_pengajuan as a LEFT JOIN tb_area as b ON (a.id_area = b.id_area) WHERE a.thn_pengajuan=2018 AND (a.status=2 OR a.status=4) GROUP BY b.nama_area");
		return $sql;
	}

	function statistik_proyek_ditolak_area($id_area){
		$sql=$this->db->query("
				select b.nama_area , COUNT(a.id_area)as n from tb_pengajuan as a LEFT JOIN tb_area as b ON (a.id_area = b.id_area) WHERE a.thn_pengajuan=2018 AND (a.status=2 OR a.status=4) AND a.id_area='".$id_area."' GROUP BY b.nama_area");
		return $sql;
	}

	function statistik_proyek_tunggu(){
		$sql=$this->db->query("
				select b.nama_area , COUNT(a.id_area)as n from tb_pengajuan as a LEFT JOIN tb_area as b ON (a.id_area = b.id_area) WHERE a.thn_pengajuan=2018 AND a.status=0 GROUP BY b.nama_area");
		return $sql;
	}

	function statistik_proyek_tunggu_area($id_area){
		$sql=$this->db->query("
				select b.nama_area , COUNT(a.id_area)as n from tb_pengajuan as a LEFT JOIN tb_area as b ON (a.id_area = b.id_area) WHERE a.thn_pengajuan=2018 AND a.status=0 AND a.id_area='".$id_area."' GROUP BY b.nama_area");
		return $sql;
	}
}

/* End of file Model_grafik.php */
/* Location: ./application/models/Model_grafik.php */