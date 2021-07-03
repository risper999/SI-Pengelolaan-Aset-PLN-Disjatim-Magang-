<head>
    <title><?= $title ?></title>
</head>
<body>
  <div class="" style="margin: 100px 70px 0 70px;">
    <div class="card">
      <h5 class="card-header text-white bg-primary"><i class="fas fa-stream"></i> Form Status Layer</h5>
      <div class="card-body">
        <?php
          if($this->session->userdata('aksi')==true) {
            echo form_open('status_layer/edit_simpan');
              echo form_hidden('no_id',$no_id['id_layer']);
            }else{
              echo form_open('status_layer/input_simpan');
            } ?>
        <div class="form-group">
          <label for="inputPassword4">Deskripsi*</label>
          <?php if($this->session->userdata('aksi')==true) {
              echo '<input type="text" class="form-control" name="desc_layer" value="'.$no_id['deskripsi_layer'].'" placeholder="-" required/>'; 
            }else{
              echo '<input type="text" class="form-control" name="desc_layer" placeholder="-" required/>';    
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

<script type="text/javascript">
  $(document).ready(function(){
    function load_unseen_notification(view=''){
      $.ajax({
        url: "<?php echo base_url()?>/status_layer",
        method: 'POST',
        data: {view:view},
        success:function(data){
          $()
        }
      })
    }
  })
</script>