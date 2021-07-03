<head>
    <title><?= $title ?></title>
</head>
<body>
  <div class="" style="margin: 100px 70px 0 70px;">
    <div class="card">
      <h5 class="card-header text-white bg-primary"><i class="fas fa-stream"></i> Form Status Terjual</h5>
      <div class="card-body">
        <?php
          if($this->session->userdata('aksi')==true) {
            echo form_open('status_terjual/edit_simpan');
              echo form_hidden('no_id',$no_id['id_terjual']);
            }else{
              echo form_open('status_terjual/input_simpan');
            } ?>
		    <div class="form-group">
		      <label for="inputPassword4">Deskripsi*</label>
		      <?php if($this->session->userdata('aksi')==true) {
              echo '<input type="text" class="form-control" name="desc_terjual" value="'.$no_id['deskripsi_terjual'].'" placeholder="-" required/>'; 
            }else{
              echo '<input type="text" class="form-control" name="desc_terjual" placeholder="-" required/>';    
            } ?>
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
  <script> swal('GAGAL !','Deskripsi tidak boleh sama!','warning'); </script>
<?php }elseif($this->session->flashdata('something')==3){?>
  <script> swal('GAGAL !','Tidak ada perubahan!','warning'); </script>
<?php } ?>