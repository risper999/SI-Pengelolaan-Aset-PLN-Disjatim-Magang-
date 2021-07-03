<?php 
if($this->session->userdata('akses')==true && $this->session->userdata('level')=='aset'){
echo '<div style="margin: 50px 70px 0 70px;">';}
else{
  echo '<div style="margin: 100px 70px 0 70px;">';
}
?>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <h5 class="card-header text-white bg-primary"><i class="fas fa-table"></i> Data Tabel User</h5>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr style="text-align: center;">
                  <th >No</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Alamat</th>
                  <th>Telp</th>
                  <th>JK</th>
                  <th>Username</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $no=1;
                  foreach ($user as $a) {?>
                    <tr style="text-align: center;">
                      <td><?php echo $no; ?></td>
                      <td><?php echo $a->nama; ?></td>
                      <td><?php echo $a->email; ?></td>
                      <td><?php echo $a->alamat; ?></td>
                      <td>+62- <?php echo $a->nohp; ?></td>
                      <td><?php echo $a->jenkel; ?></td>
                      <td><?php echo $a->username; ?></td>
                      <td><?php if($a->status == 1){?>
                          <button onclick="deactivedata(<?php echo $a->id_user; ?>)" class="btn btn-primary btn-sm">Aktif</button></td>
                        <?php }else{ ?>
                          <button onclick="activedata(<?php echo $a->id_user; ?>)" class="btn btn-danger btn-sm">Non-Aktif</button></td>
                        <?php } ?>
                      <td><?php echo "".anchor('user/edit/'.$a->id_user,'<button type="button" class="btn btn-primary btn-sm"><i class="fas fa-pen"></i></button>')."" ?> 
                      <button onclick="deletedata(<?php echo "'$a->id_user'"; ?>)" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button></td>
                    </tr>
                    <?php $no++;
                    } ?>   
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
      text: "Yakin data user ini akan dihapus?",
      type: "warning",
      showCancelButton: true,
      confirmButtonText: "Iya, Hapus!",
      closeOnConfirm: false
    },
    function(){
      $.ajax({
        url: "<?php echo base_url('user/hapusUser/')?>",
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

  function activedata(id) {
    swal({
      title: "Konfirmasi",
      text: "Yakin user ini akan diaktifkan?",
      type: "warning",
      showCancelButton: true,
      confirmButtonText: "Iya, Aktifkan!",
      closeOnConfirm: false
    },
    function(){
      $.ajax({
        url: "<?php echo base_url('user/active/')?>",
        type: 'POST',
        data: {id:id},
        success:function(){
          swal({
            title : "ok!",
            text : "Data berhasil diubah",
            type : "success"},
            function(){
              location.reload();
            });
        },
        error:function(){
          swal('Data gagal diubah','error');
        }
      });
    });
  }

  function deactivedata(id) {
    swal({
      title: "Konfirmasi",
      text: "Yakin user ini akan dinon-aktifkan?",
      type: "warning",
      showCancelButton: true,
      confirmButtonText: "Iya, Non-Aktifkan!",
      closeOnConfirm: false
    },
    function(){
      $.ajax({
        url: "<?php echo base_url('user/deactive/')?>",
        type: 'POST',
        data: {id:id},
        success:function(){
          swal({
            title : "ok!",
            text : "Data berhasil diubah",
            type : "success"},
            function(){
              location.reload();
            });
        },
        error:function(){
          swal('Data gagal diubah','error');
        }
      });
    });
  }
</script>