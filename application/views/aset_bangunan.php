<?php 
if($this->session->userdata('akses')==true && $this->session->userdata('level')=='admin'){
echo '<div style="margin: 100px 70px 0 70px;">';}

else{
  echo '<div style="margin: 100px 70px 0 70px;">';
}
?>
<head>
    <title><?= $title ?></title>
</head>
<body>
    <div class="card">
      <h5 class="card-header text-white bg-primary"><i class="fas fa-stream"></i> Form Bangunan</h5>
      <div class="card-body">
        <?php
          if($this->session->userdata('aksi')==true) {
            echo form_open('aset_bangunan/edit_simpan');
            echo form_hidden('no_id',$get_bangunan['id_bangunan']);
            }else{
              echo form_open('aset_bangunan/input_simpan');
            } ?>
		  <div class="form-row">
		    <div class="form-group col-md-6">
		      <?php if($this->session->userdata('aksi')==true) {
              		echo '<input type="text" class="form-control" name="id_bangunan" value="'.$get_bangunan['id_bangunan'].'" placeholder="-" required hidden>';
            	}?>
		    </div>
		    <div class="form-group col-md-12">
		      <label for="inputPassword4">Nama*</label>
		      <?php if($this->session->userdata('aksi')==true) {
              		echo '<fieldset disabled><input type="text" class="form-control" name="nama_bangunan" value="'.$get_bangunan['nama_bangunan'].'" placeholder="-" required></fieldset>';
            	}else{
              		echo '<input type="text" class="form-control" name="nama_bangunan" placeholder="-">'; 
            	}?>
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="exampleFormControlSelect1">Tanah*</label >
		    <select class="form-control" id="exampleFormControlSelect1" name="id_as_tanah">
		      <?php if($this->session->userdata('aksi')==true) {
            echo "<option value='".$get_bangunan['id_tanah']."'>".$get_bangunan['nama_tanah']." *</option>"; }else{ echo "<option value=''>-</option>"; }
                foreach ($as_tanah as $a) {
                      echo '<option value='.$a->id_tanah.'>'.$a->nama_tanah.'</option>';
                    }?>
		    </select>
		  </div>
		  <div class="form-row">
			  <div class="form-group col-md-4">
			    <label for="inputAddress">Harga*</label>
			    <?php if($this->session->userdata('aksi')==true) {
              		echo '<input type="number" class="form-control" name="harga_bangunan" value='.$get_bangunan['harga_bangunan'].' placeholder="-" required>';
            	}else{
              		echo '<input type="number" class="form-control" name="harga_bangunan" placeholder="-">'; 
            	}?>
			  </div>
			  <div class="form-group col-md-4">
			    <label for="inputAddress">Luas*</label>
			    <?php if($this->session->userdata('aksi')==true) {
              		echo '<input type="number" class="form-control" name="luas_bangunan" value='.$get_bangunan['luas_bangunan'].' placeholder="-" required>';
            	}else{
              		echo '<input type="number" class="form-control" name="luas_bangunan" placeholder="-">'; 
            	}?>
			  </div>
			  <div class="form-group col-md-4">
			    <label for="inputAddress">No. IMB*</label>
			    <?php if($this->session->userdata('aksi')==true) {
              		echo '<input type="text" class="form-control" name="no_imb_bangunan" value="'.$get_bangunan['no_imb_bangunan'].'" placeholder="-" required>';
            	}else{
              		echo '<input type="text" class="form-control" name="no_imb_bangunan" placeholder="-">'; 
            	}?>
			  </div>
			</div>
			<div class="form-row">
			  <div class="form-group col-md-6">
			    <label for="exampleFormControlSelect1">Status Terjual*</label >
			    <select class="form-control" id="exampleFormControlSelect1" name="id_terjual">
			      <?php if($this->session->userdata('aksi')==true) {
            	echo "<option value=".$get_bangunan['id_terjual'].">".$get_bangunan['deskripsi_terjual']." *</option>"; }else{ echo "<option value=''>-</option>"; }
                foreach ($st_jual as $a) {
                      echo '<option value='.$a->id_terjual.'>'.$a->deskripsi_terjual.'</option>';
                    }?>
			    </select>
			  </div>
			  <div class="form-group col-md-6">
			    <label for="exampleFormControlSelect1">Status Layer*</label >
			    <select class="form-control" id="exampleFormControlSelect1" name="id_layer">
			      <?php if($this->session->userdata('aksi')==true) {
            	echo "<option value=".$get_bangunan['id_layer'].">".$get_bangunan['deskripsi_layer']." *</option>"; }else{ echo "<option value=''>-</option>"; }
                foreach ($st_layer as $a) {
                      echo '<option value='.$a->id_layer.'>'.$a->deskripsi_layer.'</option>';
                    }?>
			    </select>
			  </div>
		  </div>
      </div>
	  <div class="card-footer text-muted text-center">
	   <button type="submit" class="btn btn-primary">Simpan</button>
	   <button type="reset" class="btn btn-danger">Reset</button>
	  </div>
    </div>
  </div>
</body>

<?php if ($this->session->flashdata('something')==1) {?>
  <script> swal('BERHASIL !','Data berhasil disimpan!','success'); </script>
<?php }elseif($this->session->flashdata('something')==2){?>
  <script> swal('GAGAL !','Nama tidak boleh sama!','warning'); </script>
<?php } ?>