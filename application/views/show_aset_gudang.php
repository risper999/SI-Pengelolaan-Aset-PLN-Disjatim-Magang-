<?php 
if($this->session->userdata('akses')==true && $this->session->userdata('level')=='area'){
echo '<div style="margin: 100px 70px 0 70px;">';}
else{
  echo '<div style="margin: 50px 70px 0 70px;">';
}
?>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <h5 class="card-header text-white bg-primary"><i class="fas fa-table"></i> Data Tabel Gudang</h5>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr style="text-align: center;">
                  <th>No</th>                  
                  <th>Nama</th>
                  <th>Tanah</th>
                  <th>Harga</th>
                  <th>Luas</th>
                  <th>No. IMB</th>
                  <th>St. Terjual</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $no=1;
                  foreach ($as_gudang->result() as $v => $a) { ?>
                          <tr style="text-align: center;">
                          <td><?php echo $no; ?></td>
                          <td><?php echo $a->nama_gudang; ?></td>
                          <td><?php echo $a->nama_tanah; ?></td>
                          <td>Rp<?php echo number_format($a->harga_gudang,2,',','.'); ?></td>
                          <td><?php echo $a->luas_gudang; ?></td>
                          <td><?php echo $a->no_imb_gudang; ?></td>
                          <td><?php echo $a->deskripsi_terjual; ?></td>
                          <td><?php echo "".anchor('aset_gudang/edit/'.$a->id_gudang,'<button type="button" class="btn btn-primary btn-sm"><i class="fas fa-pen"></i></button>')."";?> 
                            <button onclick="deletedata(<?php echo "'$a->id_gudang'"; ?>)" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button></td>
                        </tr>
                        <?php $no++;}?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript">
  function deletedata(id) {
    swal({
      title: "Konfirmasi",
      text: "Yakin data gudang ini akan dihapus?",
      type: "warning",
      showCancelButton: true,
      confirmButtonText: "Iya, Hapus!",
      closeOnConfirm: false
    },
    function(){
      $.ajax({
        url: "<?php echo base_url('aset_gudang/hapus_gudang/')?>",
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