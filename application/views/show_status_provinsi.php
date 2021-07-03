<!-- show table -->
<div class="" style="margin: 50px 70px 0 70px;">
  <!-- Example DataTables Card-->
  <div class="card mb-3">
    <h5 class="card-header text-white bg-primary"><i class="fas fa-table"></i> Data Tabel Status Provinsi</h5>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr style="text-align: center;">
              <th>No</th>
              <th>Deskripsi</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
                  $no=1;
                  foreach ($st_provinsi->result() as $a) { ?>
                    <tr style='text-align: center;'>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $a->provinsi_nama; ?></td>
                      <td><?php echo "".anchor('status_provinsi/edit/'.$a->id_provinsi,'<button type="button" class="btn btn-primary btn-sm"><i class="fas fa-pen"></i></button>')."";?>
                        <button onclick="deletedata(<?php echo "'$a->id_provinsi'"; ?>)" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button></td>
                    </tr>
            <?php $no++; } ?>
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
      text: "Yakin data provinsi ini akan dihapus?",
      type: "warning",
      showCancelButton: true,
      confirmButtonText: "Iya, Hapus!",
      closeOnConfirm: false
    },
    function(){
      $.ajax({
        url: "<?php echo base_url('status_provinsi/hapus_stprovinsi/')?>",
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