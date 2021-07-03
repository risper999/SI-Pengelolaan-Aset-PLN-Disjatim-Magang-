<head>
    <title><?= $title ?></title>
</head>
<?php 
if($this->session->userdata('akses')==true && $this->session->userdata('level')=='admin'){
echo '<div style="margin: 100px 70px 0 70px;">';}

else{
  echo '<div style="margin: 100px 70px 0 70px;">';
}
?>
    <div class="card">
      <h5 class="card-header text-white bg-primary"><i class="fas fa-stream"></i> Form Tanah</h5>
      <div class="card-body">
         <?php
      		if($this->session->userdata('aksi')==true) {
         		echo form_open('aset_tanah/edit_simpan');
         		echo form_hidden('id_tanah',$no_id['id_tanah']);
            }else{
            	echo form_open('aset_tanah/input_simpan');
            } ?>
		  <div class="form-row">
		    <div class="form-group col-md-12">
		       <?php if($this->session->userdata('aksi')==true) {
		      		echo '<input type="text" class="form-control" name="id_tanah" value="'.$no_id['id_tanah'].'" placeholder="-" required hidden>';
		       	}?>
		    </div>
		    <div class="form-group col-md-12">
		      <label for="inputPassword4">Nama*</label>
		      	<?php if($this->session->userdata('aksi')==true) {
		      		echo '<fieldset disabled><input type="text" class="form-control" name="nama_tanah" value="'.$no_id['nama_tanah'].'" placeholder="-" required></fieldset>';
		       	}else{
		       		echo '<input type="text" class="form-control" name="nama_tanah" placeholder="-" required>';
		       	} ?>
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="exampleFormControlSelect1">Lokasi*</label >
		    <select class="form-control" id="exampleFormControlSelect1" name="status_lokasi" required>
		    <?php if($this->session->userdata('aksi')==true){
		    	echo "<option value='".$no_id['status_lokasi']."'>".$no_id['nama_lokasi']." *</option>"; } else{ echo "<option value=''>-</option>";}
		    	foreach ($st_lokasi as $a) {
                    	echo '<option value='.$a->id_lokasi.'>'.$a->nama_lokasi.'</option>';
                    }
		       	?>
		    </select>
		  </div>
		  <div class="form-row">
		    <div class="form-group col-md-4">
		      <label for="inputEmail4">Alamat*</label>
		      <?php if($this->session->userdata('aksi')==true) {
		      		echo '<input type="text" class="form-control" name="alamat_tanah" value="'.$no_id['alamat_tanah'].'" placeholder="-" required>';
		       	}else{
		       		echo '<input type="text" class="form-control" name="alamat_tanah" placeholder="-" required>';
		       	} ?>
		    </div>
		    <div class="form-group col-md-4">
		      <label for="inputPassword4">Harga*</label>
		      <?php if($this->session->userdata('aksi')==true) {
		      		echo '<input type="number" class="form-control" name="harga_tanah" value='.$no_id['harga_tanah'].' placeholder="-" required>';
		       	}else{
		       		echo '<input type="number" class="form-control" name="harga_tanah" placeholder="-" required>';
		       	} ?>
		    </div>
		    <div class="form-group col-md-4">
		      <label for="inputAddress">Luas*</label>
		      <?php if($this->session->userdata('aksi')==true) {
		      		echo '<input type="text" class="form-control" name="luas_tanah" value="'.$no_id['luas_tanah'].'" placeholder="-" required>';
		       	}else{
		       		echo '<input type="text" class="form-control" name="luas_tanah" placeholder="-" required>';
		       	} ?>
		    </div>
		  </div>
		  <div class="form-row">
		    <div class="form-group col-md-6">
		      <label for="inputEmail4"> Latitude*</label>
		      <?php if($this->session->userdata('aksi')==true) {
		      		echo '<input type="text" class="form-control" name="latitude" value="'.$no_id['latitude'].'" placeholder="-" required>';
		       	}else{
		       		echo '<input type="text" class="form-control" name="latitude" placeholder="-" required>';
		       	} ?>
		    </div>
		    <div class="form-group col-md-6">
		      <label for="inputPassword4">Longitude*</label>
		      <?php if($this->session->userdata('aksi')==true) {
		      		echo '<input type="text" class="form-control" name="longitude" value="'.$no_id['longitude'].'" placeholder="-" required>';
		       	}else{
		       		echo '<input type="text" class="form-control" name="longitude" placeholder="-" required>';
		       	} ?>
		    </div>
		  </div>
		  <div class="form-row">
		    <div class="form-group col-md-3">
		      <label for="inputEmail4">No. PBB*</label>
		      <?php if($this->session->userdata('aksi')==true) {
		      		echo '<input type="text" class="form-control" name="no_pbb" value="'.$no_id['no_pbb'].'" placeholder="-" required>';
		       	}else{
		       		echo '<input type="text" class="form-control" name="no_pbb" placeholder="-" required>';
		       	} ?>
		    </div>
		    <div class="form-group col-md-3">
		      <label for="inputPassword4">Biaya PBB*</label>
		      <?php if($this->session->userdata('aksi')==true) {
		      		echo '<input type="number" class="form-control" name="biaya_pbb" value="'.$no_id['biaya_pbb'].'" placeholder="-" required>';
		       	}else{
		       		echo '<input type="number" class="form-control" name="biaya_pbb" placeholder="-" required>';
		       	} ?>
		    </div>
		    <div class="form-group col-md-3">
		      <label for="inputEmail4">No. BPHTB*</label>
		      <?php if($this->session->userdata('aksi')==true) {
		      		echo '<input type="text" class="form-control" name="no_bphtb" value="'.$no_id['no_bphtb'].'" placeholder="-" required>';
		       	}else{
		       		echo '<input type="text" class="form-control" name="no_bphtb" placeholder="-" required>';
		       	} ?>
		    </div>
		    <div class="form-group col-md-3">
		      <label for="inputPassword4">Biaya BPHTB*</label>
		      <?php if($this->session->userdata('aksi')==true) {
		      		echo '<input type="number" class="form-control" name="biaya_bphtb" value="'.$no_id['biaya_bphtb'].'" placeholder="-" required>';
		       	}else{
		       		echo '<input type="number" class="form-control" name="biaya_bphtb" placeholder="-" required>';
		       	} ?>
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="inputAddress">No. Sertifikat*</label>
		    <?php if($this->session->userdata('aksi')==true) {
		      		echo '<input type="text" class="form-control" name="no_sertifikat" value="'.$no_id['no_sertifikat'].'" placeholder="-" required>';
		       	}else{
		       		echo '<input type="text" class="form-control" name="no_sertifikat" placeholder="-" required>';
		       	} ?>
		  </div>
		  <div class="form-row">
		    <div class="form-group col-md-6">
		      <label for="inputEmail4">Tanggal Berlaku*</label>
		      <?php if($this->session->userdata('aksi')==true) {
		      		echo '<input type="date" class="form-control" name="tgl_berlaku_sertifikat" value="'.$no_id['tgl_berlaku_sertifikat'].'" placeholder="-" required>';
		       	}else{
		       		echo '<input type="date" class="form-control" name="tgl_berlaku_sertifikat" placeholder="-" required>';
		       	} ?>
		    </div>
		    <div class="form-group col-md-6">
		      <label for="inputPassword4">Tanggal Berakhir*</label>
		      <?php if($this->session->userdata('aksi')==true) {
		      		echo '<input type="date" class="form-control" name="tgl_berakhir_sertifikat" value="'.$no_id['tgl_berakhir_sertifikat'].'" placeholder="-" required>';
		       	}else{
		       		echo '<input type="date" class="form-control" name="tgl_berakhir_sertifikat" placeholder="-" required>';
		       	} ?> 
		    </div>
		    <div class="form-group col-md-6">
		      <label for="exampleFormControlSelect1">Status Pendayagunaan*</label >
		      <select class="form-control" id="exampleFormControlSelect1" name="status_pendayagunaan" required>
  		      <?php if($this->session->userdata('aksi')==true) { 
  		      	echo "<option value='".$no_id['id_pendayagunaan']."'>".$no_id['deskripsi_pendayagunaan']." *</option>"; } else{ echo "<option value=''>-</option>";}
		       			foreach ($st_dayaguna as $a) {
                    	echo '<option value='.$a->id_pendayagunaan.'>'.$a->deskripsi_pendayagunaan.'</option>';
                    }
		       	?>
		      </select>
		    </div>
		    <div class="form-group col-md-6">
		      <label for="inputPassword4">Status Kepemilikan*</label>
		      <select class="form-control" id="exampleFormControlSelect1" name="status_kepemilikan" required>
		      <?php if($this->session->userdata('aksi')==true) {
		        echo "<option value='".$no_id['status_kepemilikan']."'>".$no_id['deskripsi_kepemilikan']." *</option>"; } else{ echo "<option value=''>-</option>";}
		       			foreach ($st_milik as $a) {
                    	echo '<option value='.$a->id_status.'>'.$a->deskripsi_kepemilikan.'</option>';
                    }
		       	?>
		      </select>
		    </div>
		    <div class="form-group col-md-6">
		      <label for="inputEmail4">Status Tanah*</label>
		      <select class="form-control" id="exampleFormControlSelect1" name="status_tanah" required>
		      <?php if($this->session->userdata('aksi')==true) {
				  echo "<option value='".$no_id['status_tanah']."'>".$no_id['desc_status_tanah']." *</option>"; 
				  }else{
				  	echo "<option value=''>-</option>";}
		       			foreach ($st_tanah as $a) {
                    	echo '<option value='.$a->id_status_tanah.'>'.$a->desc_status_tanah.'</option>';
                    }
		       	?>
		      </select>
		    </div>
		    <div class="form-group col-md-6">
		      <label for="inputPassword4">Status Terjual*</label>
		      <select class="form-control" id="exampleFormControlSelect1" name="status_terjual" required>
		      <?php if($this->session->userdata('aksi')==true) {
			  echo "<option value='".$no_id['status_terjual']."'>".$no_id['deskripsi_terjual']." *</option>"; 
			  }else{
			  	echo "<option value=''>-</option>";}
		       			foreach ($st_jual as $a) {
                    	echo '<option value='.$a->id_terjual.'>'.$a->deskripsi_terjual.'</option>';
                    }
		       	?>
		      </select>
		  </div>
      </div>
	  <div class="card-footer text-muted text-center">
	    <button type="submit" class="btn btn-primary">Simpan</button>
	    <button type="reset" class="btn btn-danger">Reset</button><?php echo form_close();?>
	  </div>	  
    </div>
    <?php if($this->session->userdata('aksi')==false) { ?>
		<div class="card-body">
	    <?php echo form_open_multipart('aset_tanah/import_exel');?>
	      	 <div class="form-row">
			  	<div class="form-group col-md-12">
			  		<label> Memasukkan data dengan file Excel</label>
			  		<div class="form-control">
			  			<label >Download template file Excel tanah</label>		  		
			    		<a href="assets/uploads/aset_tanah.csv"><i target='blank' class='fa fa-download'></i></a> 
			    	</div>
			    </div>    
			    <div class="form-group col-md-6">
			    	<div class="form-control">
			    		<input type="file" name="excelFile"/>
			    	</div>
				</div>
				<div class="form-group col-md-6">
			    		<input type="submit" name="btnImport" class="btn btn-primary" value="Import File Excel"/>
				</div>    
			</div>
			<?php echo form_close();?>
		</div><?php } ?>
  </div>  	
  </div>

<?php if ($this->session->flashdata('something')==1) {?>
	<script> swal('BERHASIL !','Data berhasil disimpan!','success'); </script>
<?php }elseif($this->session->flashdata('something')==2){?>
	<script> swal('GAGAL !','Nama tidak boleh sama!','warning'); </script>
<?php }elseif($this->session->flashdata('something')==3){?>
	<script> swal('IMPORT GAGAL !','Kamu harus memilih file (.csv)!','warning'); </script>
<?php }elseif($this->session->flashdata('something')==4){?>
	<script> swal('IMPORT GAGAL !','Pilih file terlebih dahulu!','warning'); </script>
<?php } ?>



  