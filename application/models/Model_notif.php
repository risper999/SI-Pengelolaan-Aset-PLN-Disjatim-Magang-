<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_notif extends CI_Model {
	
	function getNotif(){
		$id_user = $this->session->userdata('id_user');
		$view = $this->input->post('view');
		if($view !=''){
			if($this->session->userdata('level')=='area'){
				$data_notif = array('dilihat'=>1);

				$this->db->where('kategori',5);
				$this->db->where('id_user',$id_user);
				$this->db->where('status',2);
				$this->db->where('dilihat',0);

				$this->db->or_where('kategori',3);
				$this->db->where('id_user',$id_user);
				$this->db->where('status',1);
				$this->db->where('dilihat',0);

				$this->db->or_where('kategori',4);
				$this->db->where('id_user',$id_user);
				$this->db->where('status',2);
				$this->db->where('dilihat',0);
				$this->db->update('tb_notif', $data_notif);
			}elseif($this->session->userdata('level')=='aset'){
				$data_notif = array('dilihat'=>1);
				$this->db->where('kategori',1);
				$this->db->where('status',0);
				$this->db->where('dilihat',0);
				$this->db->update('tb_notif', $data_notif);
			}elseif($this->session->userdata('level')=='distribusi'){
				$data_notif = array('dilihat'=>1);
				$this->db->where('kategori',2);
				$this->db->where('status',1);
				$this->db->where('dilihat',0);
				$this->db->update('tb_notif', $data_notif);}
		}
		$this->db->select('a.id_proyek,a.status,b.nama_pengajuan,a.kategori,a.dilihat');
		$this->db->from('tb_notif a');
		$this->db->join('tb_pengajuan b','b.id_pengajuan=a.id_proyek','inner');			

		if($this->session->userdata('level')=='area'){

				$this->db->where('a.kategori',5);
				$this->db->where('a.id_user',$id_user);
				$this->db->where('a.status',2);
				$this->db->where('a.dilihat',0);

				$this->db->or_where('a.kategori',3);
				$this->db->where('a.id_user',$id_user);
				$this->db->where('a.status',1);
				$this->db->where('a.dilihat',0);

				$this->db->or_where('a.kategori',4);
				$this->db->where('a.id_user',$id_user);
				$this->db->where('a.status',2);
				$this->db->where('a.dilihat',0);				

		}elseif($this->session->userdata('level')=='aset'){
			$this->db->where('a.kategori',1);
			$this->db->where('a.status',0);
			$this->db->where('a.dilihat',0);
		}elseif($this->session->userdata('level')=='distribusi'){
			$this->db->where('a.kategori',2);
			$this->db->where('a.status',1);
			$this->db->where('a.dilihat',0);
		}
		$result = $this->db->get();
		$output = '';
		if($result->num_rows() > 0){
			foreach($result->result() as $b => $a){
				if($a->status==0){
					$status = 'menunggu konfirmasi';
				}elseif($a->status==1){
					$status = 'disetujui';
				}else{
					$status = 'ditolak';
				}

				$output.='
				 	<center><li><a class="dropdown-item" href="pengajuan_proyek">Pengajuan proyek '.$a->nama_pengajuan.' dalam kondisi '.$status.'</a></li></center>';}
			}else{
			$output.='
					<center><li><a class="dropdown-item" href="#">Tidak Ada Pemberitahuan</a></li></center>';
			}
			
		$this->db->select('a.id_proyek,a.status,b.nama');
		$this->db->from('tb_notif a');
		$this->db->join('tb_user b','b.id_user=a.id_user','inner');		
		
		if($this->session->userdata('level')=='area'){

			$this->db->where('a.kategori',5);
			$this->db->where('a.id_user',$id_user);
			$this->db->where('a.status',2);
			$this->db->where('a.dilihat',0);

			$this->db->or_where('a.kategori',3);
			$this->db->where('a.id_user',$id_user);
			$this->db->where('a.status',1);
			$this->db->where('a.dilihat',0);

			$this->db->or_where('a.kategori',4);
			$this->db->where('a.id_user',$id_user);
			$this->db->where('a.status',2);
			$this->db->where('a.dilihat',0);
		}elseif($this->session->userdata('level')=='aset'){
			$this->db->where('a.kategori',1);
			$this->db->where('a.status',0);
			$this->db->where('a.dilihat',0);
		}elseif($this->session->userdata('level')=='distribusi'){
			$this->db->where('a.kategori',2);
			$this->db->where('a.status',1);
			$this->db->where('a.dilihat',0);
		}
		$result1 = $this->db->get();
		$count =$result1->num_rows();
		$data = array(
			'notification'  => $output,
			'unseen_notification' => $count
		);
		return $data; 
	}
}

/* End of file Model_notif.php */
/* Location: ./application/models/Model_notif.php */