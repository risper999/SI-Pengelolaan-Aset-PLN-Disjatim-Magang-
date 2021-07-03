<?php 
if($this->session->userdata('akses')==true && $this->session->userdata('level')=='area'){
echo '<div style="margin: 100px 70px 0 70px;">';}
else{
  echo '<div style="margin: 50px 70px 0 70px;">';
}
?>
      <div class="card mb-3">
        <h5 class="card-header text-white bg-primary"><i class="fas fa-table"></i> Data Tabel Tanah</h5>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr style="text-align: center;">
                  <th>No</th>
                  <th>Nama</th>
                  <th>Alamat</th>
                  <th>Harga</th>
                  <th>Luas</th>
                  <th>Koordinat</th>
                  <th>No. PBB</th>
                  <th>Biaya PBB</th>
                  <th>No. BPHTB</th>
                  <th>Biaya BPHTB</th>
                  <th>Sertifikat</th>
                  <th>Tgl Berlaku</th>
                  <th>Tgl Berakhir</th>
                  <th>Pendayagunaan</th>
                  <th>Kepemilikan</th>
                  <th>St. Tanah</th>
                  <th>St. Terjual</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $no=1;
                  foreach ($data as $a) { ?>
                          <tr  style="text-align: center;">
                          <td><?php echo $no; ?></td>
                          <td><?php echo $a->nama_tanah; ?></td>
                          <td><?php echo $a->alamat_tanah; ?></td>
                          <td >Rp<?php echo number_format($a->harga_tanah,2,',','.'); ?></td>
                          <td><?php echo $a->luas_tanah; ?></td>
                          <td><?php echo $a->latitude.','.$a->longitude; ?></td>
                          <td><?php echo $a->no_pbb; ?></td>
                          <td>Rp<?php echo number_format($a->biaya_pbb,2,',','.'); ?></td>
                          <td><?php echo $a->no_bphtb; ?></td>
                          <td>Rp<?php echo number_format($a->biaya_bphtb,2,',','.'); ?></td>
                          <td><?php echo $a->no_sertifikat; ?></td>
                          <td><?php echo $a->tgl_berlaku_sertifikat; ?></td>
                          <td><?php echo $a->tgl_berakhir_sertifikat; ?></td>
                          <td><?php echo $a->deskripsi_pendayagunaan; ?></td>
                          <td><?php echo $a->deskripsi_kepemilikan; ?></td>
                          <td><?php echo $a->desc_status_tanah; ?></td>
                          <td><?php echo $a->deskripsi_terjual; ?></td>
                          <td><?php echo "".anchor('aset_tanah/edit/'.$a->id_tanah,'<button type="button" class="btn btn-primary btn-sm"><i class="fas fa-pen"></i></button>').""; ?>
                        <button onclick="deletedata(<?php echo "'$a->id_tanah'"; ?>)" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button></td>
                        </tr> <?php $no++; } ?>
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
      text: "Yakin data tanah ini akan dihapus?",
      type: "warning",
      showCancelButton: true,
      confirmButtonText: "Iya, Hapus!",
      closeOnConfirm: false
    },
    function(){
      $.ajax({
        url: "<?php echo base_url('aset_tanah/hapus_tanah/')?>",
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