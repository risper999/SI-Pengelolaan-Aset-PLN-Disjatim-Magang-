<?php 
if($this->session->userdata('akses')==true && $this->session->userdata('level')=='aset'){
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
      <h5 class="card-header text-white bg-primary"><i class="fas fa-stream"></i> Form Area</h5>
      <div class="card-body">
      	<?php
      		if($this->session->userdata('aksi')==true) {
         		echo form_open('area/edit_simpan');
            	echo form_hidden('no_id',$no_id['no_id']);
            }else{
            	echo form_open('area/input_simpan');
            } ?>
		  <div class="form-row">
		    <div class="form-group col-md-6">
		      <label for="inputEmail4">ID*</label>
		      <?php 
		      	if($this->session->userdata('aksi')==true) {
		       		echo '<fieldset disabled><input type="text" class="form-control" name="id_area" value="'.$no_id['id_area'].'" placeholder="-" required/></fieldset>';	
		       	}else{
		       		echo '<input type="text" class="form-control" name="id_area" placeholder="-" required/>';		 
		       	} ?>
		    </div>
		    <div class="form-group col-md-6">
		      <label for="inputPassword4">Nama*</label>
		      <?php 
		      	if($this->session->userdata('aksi')==true) {
		       		echo '<fieldset disabled><input type="text" class="form-control" name="nama_area" value="'.$no_id['nama_area'].'" placeholder="-" required/></fieldset>';	
		       	}else{
		       		echo '<input type="text" class="form-control" name="nama_area" placeholder="-" required/>';		 
		       	} ?>
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="inputAddress">Alamat*</label>
		    <?php 
		      	if($this->session->userdata("aksi")==true) {
		       		echo '<input type="text" class="form-control" name="alamat" value="'.$no_id['alamat'].'" placeholder="-" required/>';	
		       	}else{
		       		echo '<input type="text" class="form-control" name="alamat" placeholder="-" required/>';		 
		       	} ?>
		  </div>
		
      </div>
	  <div class="card-footer text-muted text-center">
	   <button type="submit" class="btn btn-primary">Simpan</button>
	   <button type="reset" class="btn btn-danger">Reset</button>
	  </div>
    </div>
    <?php echo form_close();?>
     <?php 
    if($this->session->userdata('akses')==true && $this->session->userdata('level')=='aset'){
    echo '</div>';}else{
  echo '</div>';
  }?>
</body>

<?php if ($this->session->flashdata('something')==1) {?>
    <script> swal('BERHASIL !','Data berhasil disimpan!','success'); </script>
<?php }elseif($this->session->flashdata('something')==2){?>
	<script> swal('GAGAL !','ID/Nama tidak boleh sama!','warning'); </script>
<?php } ?>