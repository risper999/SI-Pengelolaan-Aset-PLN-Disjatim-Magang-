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
      <h5 class="card-header text-white bg-primary"><i class="fas fa-stream"></i> Form Gudang</h5>
      <div class="card-body">
        <?php
          if($this->session->userdata('aksi')==true) {
            echo form_open('aset_gudang/edit_simpan');
            echo form_hidden('no_id',$get_gudang['id_gudang']);
            }else{
              echo form_open('aset_gudang/input_simpan');
            } ?>
		  <div class="form-row">
		    <div class="form-group col-md-6">
		      <?php if($this->session->userdata('aksi')==true) {
              echo '<input type="text" class="form-control" name="id_gudang" value="'.$get_gudang['id_gudang'].'" placeholder="-" required hidden>';
            }?>
		    </div>
		    <div class="form-group col-md-12">
		      <label for="inputPassword4">Nama*</label>
		      <?php if($this->session->userdata('aksi')==true) {
              echo '<fieldset disabled><input type="text" class="form-control" name="nama_gudang" value="'.$get_gudang['nama_gudang'].'" placeholder="-" required></fieldset>';
            }else{
              echo '<input type="text" class="form-control" name="nama_gudang" placeholder="-">'; 
            } ?>
		    </div>
		  </div>
		  <div class="form-group">
        <label for="exampleFormControlSelect1">Tanah*</label >
        <select class="form-control" id="exampleFormControlSelect1" name="id_as_tanah">
        <?php if($this->session->userdata('aksi')==true) {
            echo "<option value=".$get_gudang['id_as_tanah'].">".$get_gudang['nama_tanah']." *</option>"; }else{ echo "<option value=>-</option>"; }
                foreach ($as_tanah as $a) {
                      echo '<option value='.$a->id_tanah.'>'.$a->nama_tanah.'</option>';
                    }
            ?>
        </select>
      </div>
		  <div class="form-row">
			  <div class="form-group col-md-3">
			    <label for="inputAddress">Harga*</label>
			    <?php if($this->session->userdata('aksi')==true) {
              echo '<input type="number" class="form-control" name="harga_gudang" value='.$get_gudang['harga_gudang'].' placeholder="-" required>';
            }else{
              echo '<input type="number" class="form-control" name="harga_gudang" placeholder="-" required>';
            } ?>
			  </div>
			  <div class="form-group col-md-3">
			    <label for="inputAddress">Luas*</label>
			     <?php if($this->session->userdata('aksi')==true) {
              echo '<input type="number" class="form-control" name="luas_gudang" value="'.$get_gudang['luas_gudang'].'" placeholder="-" required>';
            }else{
              echo '<input type="number" class="form-control" name="luas_gudang" placeholder="-" required>';
            } ?>
			  </div>
			  <div class="form-group col-md-3">
			    <label for="inputAddress">No. IMB*</label>
			    <?php if($this->session->userdata('aksi')==true) {
              echo '<input type="text" class="form-control" name="no_imb_gudang" value="'.$get_gudang['no_imb_gudang'].'" placeholder="-" required>';
            }else{
              echo '<input type="text" class="form-control" name="no_imb_gudang" placeholder="-" required>';
            } ?>
			  </div>
			  <div class="form-group col-md-3">
          <label for="exampleFormControlSelect1">Status terjual*</label><br>
          <select class="form-control" id="exampleFormControlSelect1" name="status_terjual">
            <?php if($this->session->userdata('aksi')==true) {
            echo "<option value=".$get_gudang['id_terjual'].">".$get_gudang['deskripsi_terjual']." *</option>"; }else{ echo "<option value=>-</option>"; }
                foreach ($st_jual as $a) {
                      echo '<option value='.$a->id_terjual.'>'.$a->deskripsi_terjual.'</option>';
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