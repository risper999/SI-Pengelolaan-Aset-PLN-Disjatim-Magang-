<?php 
if($this->session->userdata('akses')==true && $this->session->userdata('level')=='aset'){
echo '<div style="margin: 100px 70px 0 70px;">';}
else if($this->session->userdata('akses')==true && $this->session->userdata('level')=='distribusi'){
  echo '<div style="margin: 100px 70px 0 70px;">';}
else {
  echo '<div style="margin: 30px 70px 0 70px;">';}?>
  <!-- Example DataTables Card-->
  


  <div class="card mb-3">
    <h5 class="card-header text-white bg-primary"><i class="fas fa-table"></i> Data Tabel Pengajuan Proyek</h5>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr style="text-align: center;">
              <th>No</th>
              <th>Nama</th>
              <th>Uraian Pekerjaan</th>
              <th>Distribusi</th>
              <th>Area</th>
              <th>Rayon</th>
              <th>Alamat</th>
              <th>Tahun</th>
              <th>Nilai Pengajuan(Rp)</th>
              <th>Nilai Persetujuan(Rp)</th>
              <th>Data</th>
              <th>Status</th>
              <th>Alasan Disetujui Setengah</th>
              <th>Alasan Ditolak</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $no=1;
              foreach ($pengajuan_proyek as $a) {
                $action="<button type='button' class='btn btn-success btn-sm' data-toggle='tooltip' data-placement='top' title='Pengajuan Selesai'><i class='fas fa-flag'></i></button>";
                
                if($a->status==0){
                  $status="<button type='button' class='btn btn-warning btn-sm text-white'>Tunggu Konfirmasi<br/>Aset</button>";
                  $action="<button type='button' class='btn btn-warning btn-sm text-white' data-toggle='tooltip' data-placement='top' title='Tunggu Konfirmasi'><i class='fas fa-sync-alt'></i></button>";
                  if($this->session->userdata('akses')==true && $this->session->userdata('level')=='aset'){
                    $action="
                      <button type='button' onclick='setujuiaset(".$a->id_pengajuan.")' class='btn btn-success btn-sm' data-toggle='tooltip' data-placement='top' title='Setujui'><i class='fas fa-check-double'></i></button><br/><br/>
                      <button type='button' onclick='setujuisetengah(".$a->id_pengajuan.")' class='btn btn-warning btn-sm' data-toggle='tooltip' data-placement='top' title='Setujui Setengah'><i class='fas fa-check text-white'></i></button><br/><br/>
                      <button type='button' onclick='tolakaset(".$a->id_pengajuan.")' class='btn btn-danger btn-sm' data-toggle='tooltip' data-placement='top' title='Tolak'><i class='fas fa-times'></i></button><br/><br/>
                    ";
                  }
                }elseif($a->status==3){
                  $status="<button type='button' class='btn btn-warning btn-sm text-white'>Tunggu Konfirmasi<br/>Distribusi</button>";
                  $action="<button type='button' class='btn btn-warning btn-sm text-white' data-toggle='tooltip' data-placement='top' title='Tunggu Konfirmasi'><i class='fas fa-sync-alt'></i></button>";
                  if($this->session->userdata('akses')==true && $this->session->userdata('level')=='distribusi'){
                    $action="
                      <button type='button' onclick='setujuidistribusi(".$a->id_pengajuan.")' class='btn btn-success btn-sm'><i class='fas fa-check-double'></i></button><br/><br/>
                      <button type='button' onclick='tolakdistribusi(".$a->id_pengajuan.")' class='btn btn-danger btn-sm'><i class='fas fa-times'></i></button><br/><br/>
                    ";
                  }
                }elseif($a->status==4){
                  $status="<button type='button' class='btn btn-danger btn-sm'>Ditolak Aset</button>";
                }elseif($a->status==1){
                  $status="<button type='button' class='btn btn-success btn-sm'>Disetujui Distribusi</button>";  
                }elseif($a->status==2){
                  $status="<button type='button' class='btn btn-danger btn-sm'>Ditolak Distribusi</button>";
                }

                echo "<tr style='text-align: center;'>
                        <td>$no</td>
                        <td>".$a->nama_pengajuan."</td>
                        <td>".$a->uraian_pekerjaan."</td>
                        <td>".$a->distribusi."</td>
                        <td>".$a->nama_area."</td>
                        <td>".$a->nama_rayon."</td>
                        <td>".$a->lokasi_pengajuan."</td>
                        <td>".$a->thn_pengajuan."</td>
                        <td>Rp".number_format($a->nilai_pengajuan,2,',','.')."</td>
                        <td>Rp".number_format($a->nilai_persetujuan,2,',','.')."</td>
                        <td style='text-align: center;'>
                          <a href='".base_url("assets/uploads/".$a->data_pendukung)."' target='blank'><i class='fa fa-download'></i></a>
                        </td>
                        <td style='text-align: center;'>".$status."</td>
                        <td style='text-align: center;'>".$a->approval_aset_reason."</td>
                        <td style='text-align: center;'>".$a->alasan_tolak."</td>
                        <td style='text-align: center;'>".$action."</td>
                    </tr>";
             $no++;
           }
           ?>
          </tbody>
        </table>

        <!-- modal untuk persetujuan setengah -->
        <div class="modal fade" id="setengah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Persetujuan Proyek</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <?php echo form_open_multipart('pengajuan_proyek/setujuisetengah');?>
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Nilai Persetujuan*</label>
                    <input type="text" class="form-control" name="nilai_persetujuan" placeholder="-" required/>
                  </div>
                  <div class="form-group">
                   <label class="control-label" for="data">Data Pendukung*</label>
                   <input type="file" name="userfile" class="form-control" name="userfile" placeholder="-"/>
                  </div>
                  <div class="form-group">
                    <label for="message-text" class="col-form-label">Keterangan</label>
                    <textarea class="form-control" id="message-text" name="keterangan" placeholder="-"></textarea>
                  </div>
                  <input type="hidden" name="id_persetujuan" id="id_persetujuan">
                  <input type="hidden" value="<?=date("Y-m-d h:i:sa")?>" name="tgl_persetujuan" class="form-control"/>
                  <div class="form-group">
                    <label class="control-label">&nbsp;</label>
                      <span style="color:#f33">Peringatan *</span>
                      <ol start="a" style="padding-left:25px;">
                        <li>* Wajib diisi</li>
                        <li>Size data pendukung tidak boleh melebihi dari 5MB</li>
                        <li>Format data pendukung dalam bentuk (.zip atau .rar)</li>
                        <li>Hilangkan spasi pada nama data pendukung</li>
                      </ol>
                  </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-success">Kirim</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
              </div>
              <?php echo form_close();?>
            </div>
          </div>
        </div>

        <!-- modal untuk penolakan -->
        <div class="modal fade" id="tolak" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Penolakan Proyek</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <?php echo form_open_multipart('pengajuan_proyek/tolakaset');?>
                  <div class="form-group">
                    <label for="message-text" class="col-form-label">Alasan Penolakan</label>
                    <textarea class="form-control" id="message-text" name="alasan_tolak" placeholder="-"></textarea>
                  </div>
                  <input type="hidden" name="id_penolakan" id="id_penolakan">
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-success">Kirim</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
              </div>
              <?php echo form_close();?>
            </div>
          </div>
        </div>
        
        
      </div>
    </div>
  </div>
  </div>
  <script type="text/javascript" charset="utf-8" async defer>
    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    });

    function setujuiaset(id) {
      swal({
        title: "Konfirmasi",
        text: "Yakin data pengajuan ini akan disetujui?",
        type: "warning",
        showCancelButton: true,
        cancelButtonText: "Tidak",
        confirmButtonClass: "btn-success",
        confirmButtonText: "Setujui",
        closeOnConfirm: false
      },
      function(){
        $.ajax({
          url: "<?php echo base_url('pengajuan_proyek/setujuiaset/')?>",
          type: 'POST',
          data: {id:id},
          success:function(){
            swal({
              title : "ok!",
              text : "Data berhasil disetujui",
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

    function setujuisetengah(id){
        $("#id_persetujuan").val(id),
        $("#setengah").modal();
    }

    function tolakaset(id){
      $("#id_penolakan").val(id),
      $("#tolak").modal();
    }

    function setujuidistribusi(id) {
      swal({
        title: "Konfirmasi",
        text: "Yakin data pengajuan ini akan disetujui?",
        type: "warning",
        showCancelButton: true,
        cancelButtonText: "Tidak",
        confirmButtonClass: "btn-success",
        confirmButtonText: "Setujui",
        closeOnConfirm: false
      },
      function(){
        $.ajax({
          url: "<?php echo base_url('pengajuan_proyek/setujuidistribusi/')?>",
          type: 'POST',
          data: {id:id},
          success:function(){
            swal({
              title : "ok!",
              text : "Data berhasil disetujui",
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

    function tolakdistribusi(id) {
      $("#id_penolakan").val(id),
      $("#tolak").modal();
    }    
  </script>

<?php if ($this->session->flashdata('something')==1) {?>
  <script> swal('BERHASIL !','Data berhasil disimpan!','success'); </script>
<?php }elseif($this->session->flashdata('something')==2){?>
  <script> swal('GAGAL !','Pilih file terlebih dahulu!','warning'); </script>
<?php }elseif($this->session->flashdata('something')==3){?>
  <script> swal('GAGAL !','Format data pendukung harus (.rar/.zip)!','warning'); </script>
<?php }elseif($this->session->flashdata('something')==4){?>
  <script> swal('GAGAL !','Data pendukung tidak boleh melebihi 5mb!','warning'); </script>
<?php }elseif($this->session->flashdata('something')==5){?>
  <script> swal('GAGAL !','Error!','warning'); </script>
<?php } ?>