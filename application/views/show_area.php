<?php 
if($this->session->userdata('akses')==true && $this->session->userdata('level')=='aset'){
echo '<div style="margin: 50px 70px 0 70px;">';}
else{
  echo '<div style="margin: 100px 70px 0 70px;">';
}
?>
  <!-- Example DataTables Card-->
  <div class="card mb-3">
    <h5 class="card-header text-white bg-primary"><i class="fas fa-table"></i> Data Tabel Area</h5>
    <div class="card-body ">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
                <tr style="text-align: center;">
                  <th>No</th>
                  <th>ID</th>
                  <th>Nama</th>
                  <th>Alamat</th>
                  <?php if($this->session->userdata('akses')==true && $this->session->userdata('level')=='aset'){ echo '<th>Action</th>';}  ?>
                </tr>
              </thead>
              <tbody>
                <?php
                  $no=1;
                  foreach ($area as $a) {
                    if($this->session->userdata('akses')==true && $this->session->userdata('level')=='aset'){?>
                      <tr  style='text-align: center;'>
                        <td> <?php echo $no ?></td>
                        <td><?php echo $a->id_area; ?></td>
                        <td ><?php echo $a->nama_area; ?></td>
                        <td><?php echo $a->alamat; ?></td>
                        <td><?php echo 
                         "".anchor('area/edit/'.$a->no_id,'<button type="button" class="btn btn-primary btn-sm"><i class="fas fa-pen"></i></button>')."";?>
                         <button onclick="deletedata(<?php echo "'$a->no_id;'"; ?>)" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button></td>
                      </tr>                       
                  <?php }else{ ?>
                      <tr>
                        <td> <?php echo $no ?></td>
                        <td><?php echo $a->id_area; ?></td>
                        <td><?php echo $a->nama_area; ?></td>
                        <td><?php echo $a->alamat; ?></td>
                      </tr>                         
                   <?php }$no++;}?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  function deletedata(id) {
    swal({
      title: "Konfirmasi",
      text: "Yakin data area ini akan dihapus?",
      type: "warning",
      showCancelButton: true,
      confirmButtonText: "Iya, Hapus!",
      closeOnConfirm: false
    },
    function(){
      $.ajax({
        url: "<?php echo base_url('area/hapusArea/')?>",
        type: 'POST',
        data: {id:id},
        success:function(){
          swal({
            title : "ok!",
            text : "Data berhasil dihapus",
            type : "success"},
            function(){
              location.reload();
            });
        },
        error:function(){
          swal('Data gagal dihapus','error');
        }
      });
    });
  }
</script>