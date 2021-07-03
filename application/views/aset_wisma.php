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
      <h5 class="card-header text-white bg-primary"><i class="fas fa-stream"></i> Form Wisma/Rumah</h5>
      <div class="card-body">
        <?php
      		if($this->session->userdata('aksi')==true) {
         		echo form_open('aset_wisma/edit_simpan');
         		echo form_hidden('id_wisma',$get_wisma['id_wisma']);
            }else{
            	echo form_open('aset_wisma/input_simpan');
            } ?>
		  <div class="form-row">
		    <div class="form-group col-md-6">
		      	<?php if($this->session->userdata('aksi')==true) {
		      		echo '<input type="text" class="form-control" name="id_wisma" value="'.$get_wisma['id_wisma'].'" placeholder="-" required hidden>';
		       	}?>
		    </div>
		    <div class="form-group col-md-12">
		      <label for="inputPassword4">Nama*</label>
		      	<?php if($this->session->userdata('aksi')==true) {
		      		echo '<fieldset disabled><input type="text" class="form-control" name="nama_wisma" value="'.$get_wisma['nama_wisma'].'" placeholder="-" required></fieldset>';
		       	}else{
		       		echo '<input type="text" class="form-control" name="nama_wisma" placeholder="-" required>';
		       	} ?>
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="exampleFormControlSelect1">Tanah*</label >
		    <select class="form-control" id="exampleFormControlSelect1" name="id_tanah">
		      	<?php if($this->session->userdata('aksi')==true) {
            			echo "<option value=".$get_wisma['id_tanah'].">".$get_wisma['nama_tanah']." *</option>"; 
            	}else{  echo "<option value=>-</option>"; }
		       			foreach ($as_tanah as $a) {
                    	echo '<option value='.$a->id_tanah.'>'.$a->nama_tanah.'</option>';
                    }?>
		    </select>
		  </div>
		  <div class="form-row">
			  <div class="form-group col-md-4">
			    <label for="inputAddress">Harga*</label>
			    <?php if($this->session->userdata('aksi')==true) {
		      		echo '<input type="number" class="form-control" name="harga_wisma" value='.$get_wisma['harga_wisma'].' placeholder="-" required>';
		       	}else{
		       		echo '<input type="number" class="form-control" name="harga_wisma" placeholder="-" required>';
		       	} ?>
			  </div>
			  <div class="form-group col-md-4">
			    <label for="inputAddress">Luas*</label>
			    <?php if($this->session->userdata('aksi')==true) {
		      		echo '<input type="number" class="form-control" name="luas_wisma" value="'.$get_wisma['luas_wisma'].'" placeholder="-" required>';
		       	}else{
		       		echo '<input type="number" class="form-control" name="luas_wisma" placeholder="-" required>';
		       	} ?>
			  </div>
			  <div class="form-group col-md-4">
			    <label for="inputAddress">No. IMB*</label>
			    <?php if($this->session->userdata('aksi')==true) {
		      		echo '<input type="text" class="form-control" name="no_imb_wisma" value="'.$get_wisma['no_imb_wisma'].'" placeholder="-" required>';
		       	}else{
		       		echo '<input type="text" class="form-control" name="no_imb_wisma" placeholder="-" required>';
		       	} ?>
			  </div>
			</div>
			<div class="form-row">
			  <div class="form-group col-md-4">
			    <label for="exampleFormControlSelect1">Status Terjual*</label >
			    <select class="form-control" id="exampleFormControlSelect1" name="id_terjual">
			     <?php if($this->session->userdata('aksi')==true) {
            			echo "<option value=".$get_wisma['id_terjual'].">".$get_wisma['deskripsi_terjual']." *</option>"; 
            	}else{  echo "<option value=>-</option>"; }
		       			foreach ($st_jual as $a) {
                    	echo '<option value='.$a->id_terjual.'>'.$a->deskripsi_terjual.'</option>';
                    }?>
			    </select>
			  </div>
			  <div class="form-group col-md-4">
			    <label for="exampleFormControlSelect1">Status Layak*</label >
			    <select class="form-control" id="exampleFormControlSelect1" name="id_layak">
			    <?php if($this->session->userdata('aksi')==true) {
            			echo "<option value=".$get_wisma['id_layak'].">".$get_wisma['deskripsi_layak']." *</option>"; 
            	}else{  echo "<option value=>-</option>"; }
		       			foreach ($st_layak as $a) {
                    	echo '<option value='.$a->id_layak.'>'.$a->deskripsi_layak.'</option>';
                    }?>
			    </select>
			  </div>
			  <div class="form-group col-md-4">
			    <label for="exampleFormControlSelect1">Status Rumah*</label >
			    <select class="form-control" id="exampleFormControlSelect1" name="id_rumah">
			    <?php if($this->session->userdata('aksi')==true) {
            			echo "<option value=".$get_wisma['id_rumah'].">".$get_wisma['deskripsi_rumah']." *</option>"; 
            	}else{  echo "<option value=>-</option>"; }
		       			foreach ($st_rumah as $a) {
                    	echo '<option value='.$a->id_rumah.'>'.$a->deskripsi_rumah.'</option>';
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
    <?php echo form_close();?>
  </div>
</body>

<?php if ($this->session->flashdata('something')==1) {?>
  <script> swal('BERHASIL !','Data berhasil disimpan!','success'); </script>
<?php }elseif($this->session->flashdata('something')==2){?>
  <script> swal('GAGAL !','Nama tidak boleh sama!','warning'); </script>
<?php } ?>