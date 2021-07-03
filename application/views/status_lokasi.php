<head>
    <title><?= $title ?></title>
</head>
<body>
  <div class="" style="margin: 100px 70px 0 70px;">
    <div class="card">
      <h5 class="card-header text-white bg-primary"><i class="fas fa-stream"></i> Form Lokasi</h5>
      <div class="card-body">
         <?php
          if($this->session->userdata('aksi')==true) {
            echo form_open('status_lokasi/edit_simpan');
              echo form_hidden('get_lokasi',$get_lokasi['id_lokasi']);
            }else{
              echo form_open('status_lokasi/input_simpan');
            } ?>
		  <div class="form-row">
		    <div class="form-group col-md-6">
		      <label for="inputPassword4">Nama*</label>
		      <?php if($this->session->userdata('aksi')==true) {
              echo '<fieldset disabled><input type="text" class="form-control" name="nama_lokasi" value="'.$get_lokasi['nama_lokasi'].'" placeholder="-" required/></fieldset>'; 
            }else{
              echo '<input type="text" class="form-control" name="nama_lokasi" placeholder="-" required/>';    
            } ?>
		    </div>
		    <div class="form-group col-md-6">
		      <label for="exampleFormControlSelect1">Plant*</label >
		      <select class="form-control" id="exampleFormControlSelect1" name="id_plant">
		         <?php if($this->session->userdata('aksi')==true) {
            			echo "<option value=".$get_lokasi['id_plant'].">".$get_lokasi['nama_plant']." *</option>"; 
            	}else{  echo "<option value=>-</option>"; }
		       			foreach ($st_plant as $a) {
                    	echo '<option value='.$a->id_plant.'>'.$a->nama_plant.'</option>';
                    }?>
		      </select>
			</div>
		  </div>
		  <div class="form-row">
		    <div class="form-group col-md-6">
		      <label for="inputPassword4">Alamat*</label>
		      <?php if($this->session->userdata('aksi')==true) {
              echo '<input type="text" class="form-control" name="alamat" value="'.$get_lokasi['alamat'].'" placeholder="-" required/>'; 
            }else{
              echo '<input type="text" class="form-control" name="alamat" placeholder="-" required/>';    
            } ?>
		    </div>
		    <div class="form-group col-md-6">
		      <label for="inputPassword4">Kode Pos*</label>
		      <?php if($this->session->userdata('aksi')==true) {
              echo '<input type="text" class="form-control" name="kode_pos" value="'.$get_lokasi['kode_pos'].'" placeholder="-" required/>'; 
            }else{
              echo '<input type="text" class="form-control" name="kode_pos" placeholder="-" required/>';    
            } ?>
		    </div>
		  </div>
		  <div class="form-row">
		    <div class="form-group col-md-4">
		      <label for="inputPassword4">Kecamatan*</label>
		      <?php if($this->session->userdata('aksi')==true) {
              echo '<input type="text" class="form-control" name="kecamatan" value="'.$get_lokasi['kecamatan'].'" placeholder="-" required/>'; 
            }else{
              echo '<input type="text" class="form-control" name="kecamatan" placeholder="-" required/>';    
            } ?>
		    </div>
		    <div class="form-group col-md-4">
		      <label for="inputPassword4">Kabupaten*</label>
		      <?php if($this->session->userdata('aksi')==true) {
              echo '<input type="text" class="form-control" name="kabupaten" value="'.$get_lokasi['kabupaten'].'" placeholder="-" required/>'; 
            }else{
              echo '<input type="text" class="form-control" name="kabupaten" placeholder="-" required/>';    
            } ?>
		    </div>
		    <div class="form-group col-md-4">
		      <label for="inputPassword4">Provinsi*</label>
		      <select class="form-control" id="exampleFormControlSelect1" name="id_provinsi">
		        <?php if($this->session->userdata('aksi')==true) {
            			echo "<option value=".$get_lokasi['id_provinsi'].">".$get_lokasi['provinsi_nama']." *</option>"; 
            	}else{  echo "<option value=>-</option>"; }
		       			foreach ($st_provinsi as $a) {
                    	echo '<option value='.$a->id_provinsi.'>'.$a->provinsi_nama.'</option>';
                    }?>
		      </select>
		    </div>
		  </div>
		  <div class="form-row">
		    <div class="form-group col-md-6">
		      <label for="inputPassword4">Latitude*</label>
		      <?php if($this->session->userdata('aksi')==true) {
              echo '<input type="text" class="form-control" name="lat" value="'.$get_lokasi['lat'].'" placeholder="-" required/>'; 
            }else{
              echo '<input type="text" class="form-control" name="lat" placeholder="-" required/>';    
            } ?>
		    </div>
		    <div class="form-group col-md-6">
		      <label for="inputPassword4">Longitude*</label>
		      <?php if($this->session->userdata('aksi')==true) {
              echo '<input type="text" class="form-control" name="lng" value="'.$get_lokasi['lng'].'" placeholder="-" required/>'; 
            }else{
              echo '<input type="text" class="form-control" name="lng" placeholder="-" required/>';    
            } ?>
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