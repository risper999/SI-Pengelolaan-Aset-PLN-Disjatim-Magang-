<html><head>
    <title><?= $title ?></title>
</head><body>
  <div class="" style="margin: 100px 70px 20px 70px;">
    <div class="card">
      <h5 class="card-header text-white bg-primary"><i class="fas fa-stream"></i> Rekap Proyek</h5>
      <div class="card-body">

        <p>
          <button class="btn btn-danger" type="button" onclick="tanggalre()">Berdasarkan Tanggal</button>&nbsp;&nbsp;&nbsp;
          <?php if($this->session->userdata('level') !='area'){?>
          <button class="btn btn-danger" type="button" onclick="areare()">Berdasarkan Area</button><?php } ?>&nbsp;&nbsp;&nbsp;
          <button class="btn btn-danger" type="button" onclick="statusre()">Berdasarkan Status</button>
        </p>

        <div id="tanggalre" style="display:none">
          <div class="card card-body">
              <?php  echo form_open('rekap/cek'); ?>
                <div class="form-row">
                  <div class="form-group col-md-3">
                    <input type="text" name="datefilter" id="reportrange" class="form-control" required/>
                  </div>&nbsp;
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Tampilkan</button> &nbsp;
                  </div>
                  <div class="form-group">
                    <?php if($this->session->userdata('pdf')==true){?>                    
                     <a href="<?=base_url("cetak/pdf/")?>" class="btn btn-success"><i class="fas fa-download"></i> Cetak PDf</a> <?php } ?>
                  </div>
                </div>
              </form>
          </div>
        </div>
        
        <div id="areare" style="display:none">
          <div class="card card-body">
              <?php  echo form_open('rekap/cek1'); ?>
                <div class="form-row">
                  <div class="form-group col-md-3">
                    <input type="text" name="datefilter1" id="reportrange1" class="form-control" required/>
                  </div>&nbsp;
                  <div class="form-group col-md-3">
                    <select class="form-control" name="id_area" id="id_area">
                        <option value='-'>-</option>
                        <?php
                        foreach ($area as $a) {
                            echo '<option value='.$a->id_area.'>'.$a->id_area.' - '.$a->nama_area.'</option>'; }?>
                    </select>
                  </div>&nbsp;
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Tampilkan</button> &nbsp;
                  </div>
                  <div class="form-group">
                    <?php if($this->session->userdata('pdf1')==true){?>
                     <a href="<?=base_url("cetak/pdf1/")?>" class="btn btn-success"><i class="fas fa-download"></i> Cetak PDf</a> <?php } ?>
                  </div>
                </div>
              </form>
          </div>
        </div>

        <div id="statusre" style="display:none">
          <div class="card card-body">
              <?php  echo form_open('rekap/cek2'); ?>
                <div class="form-row">
                  <div class="form-group col-md-3">
                    <input type="text" name="datefilter2" id="reportrange2" class="form-control" required/>
                  </div>&nbsp;
                  <div class="form-group col-md-3">
                    <select class="form-control" name="status" id="status">
                      <option value='1'>Disetuji Distribusi</option>
                      <option value='2'>Ditolak Distribusi</option>
                      <option value='3'>Disetuji Aset</option>
                      <option value='4'>Ditolak Aset</option>
                    </select>
                  </div>&nbsp;
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Tampilkan</button> &nbsp;
                  </div>
                  <div class="form-group">
                    <?php if($this->session->userdata('pdf2')==true){?>
                     <a href="<?=base_url("cetak/pdf2/")?>" class="btn btn-success" id="cekpdf2"><i class="fas fa-download"></i> Cetak PDf</a> <?php 
                    }?>
                  </div>
                </div>
              </form>
          </div>
        </div>

      <br><div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
                <tr style='text-align: center;'>
                  <th>No</th>
                  <th>Unit</th>             
                  <th>Nama Aset</th>
                  <th>Luas</th>                       
                  <th>Nama Pekerjaan</th>
                  <th>Biaya Pengajuan(Rp)</th>
                  <th>Tanggal Pengajuan</th>
                  <th>Status</th>                  
                  <th>Biaya Persetujuan(Rp)</th>
                  <th>Alasan Disetujui Setengah</th>
                  <th>Alasan Ditolak</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $no=1;
                  foreach ($get_pengajuan as $a) {?>
                      <tr style='text-align: center;'>
                        <td> <?php echo $no ?></td>                     
                        <td><?php echo $a->nama_area;?><br><?php echo $a->nama_rayon;?></td>
                        <?php if($a->id_tanah!=='0'){ ?>
                            <td><?php echo $a->nama_tanah; ?></td>
                            <td><?php echo $a->luas_tanah; ?></td>
                        <?php }elseif($a->id_wisma!=='0'){?>
                            <td><?php echo $a->nama_wisma; ?></td>
                            <td><?php echo $a->luas_wisma; ?></td>
                        <?php }elseif($a->id_gudang!=='0'){?>
                            <td><?php echo $a->nama_gudang; ?></td>
                            <td><?php echo $a->luas_gudang; ?></td>
                        <?php }elseif($a->id_bangunan!=='0'){ ?>
                            <td><?php echo $a->nama_bangunan; ?></td>
                            <td><?php echo $a->luas_bangunan; ?></td>
                           <?php }else{ ?>
                            <td></td>
                            <td></td>
                           <?php } ?>
                        <td><?php echo $a->nama_pengajuan; ?></td>
                        <td>Rp<?php echo number_format($a->nilai_pengajuan,2,',','.')?></td>
                        <td><?php echo (date("d M Y", strtotime($a->tgl_pengajuan))) ?></td>    
                        <td><?php if($a->status==0){?>
                          <button class="btn btn-warning btn-sm">Tunggu</button><br><?php echo (date("d M Y", strtotime($a->approval_aset_date)))?></td>
                        <?php }elseif($a->status==1){ ?>
                          <button onclick="activedata(<?php echo $a->status; ?>)" class="btn btn-success btn-sm">Disetujui Distribusi</button><br><?php echo (date("d M Y", strtotime($a->approval_aset_date)))?></td>
                        <?php }elseif($a->status==2){ ?>
                          <button onclick="activedata(<?php echo $a->status; ?>)" class="btn btn-danger btn-sm">Ditolak Distribusi</button><br><?php echo (date("d M Y", strtotime($a->approval_aset_date))) ?></td>
                        <?php }elseif($a->status==3){ ?>
                          <button onclick="activedata(<?php echo $a->status; ?>)" class="btn btn-success btn-sm">Disetujui Aset</button><br><?php echo (date("d M Y", strtotime($a->approval_aset_date)))?></td>
                        <?php }elseif($a->status==4){ ?>
                          <button onclick="activedata(<?php echo $a->status; ?>)" class="btn btn-danger btn-sm">Ditolak Aset</button><br><?php echo (date("d M Y", strtotime($a->approval_aset_date)))?></td>
                        <?php } ?>                        
                        <td>Rp<?php echo number_format($a->nilai_persetujuan,2,',','.')?></td>
                        <td><?php echo $a->approval_aset_reason; ?></td>
                        <td><?php echo $a->alasan_tolak; ?></td>
                      </tr>                       
                  <?php $no++;}?>
              </tbody>
            </table>
          </div>
    </div>
  </div></div></div></div></body></html>

          

<script type="text/javascript">
    $(function() {
        var start = moment().subtract(2, 'years');
        var end = moment();

        function cb(start, end) {
            $('#reportrange span').html(start.format('YYYY, MMMM D') + ' and ' + end.format('YYYY, MMMM D'));
        }

        $('#reportrange').daterangepicker({
            locale :{
              format: 'YYYY-MM-DD'
            },
            startDate: start,
            endDate: end,
            ranges: {
               'Today': [moment(), moment()],
               'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
               'Last 7 Days': [moment().subtract(6, 'days'), moment()],
               'Last 30 Days': [moment().subtract(29, 'days'), moment()],
               'This Month': [moment().startOf('month'), moment().endOf('month')],
               'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            }
        }, cb);
        cb(start, end);
    });

    $(function() {

        var start = moment().subtract(2, 'years');
        var end = moment();

        function cb(start, end) {
            $('#reportrange1 span').html(start.format('YYYY, MMMM D') + ' and ' + end.format('YYYY, MMMM D'));
        }

        $('#reportrange1').daterangepicker({
            locale :{
              format: 'YYYY-MM-DD'
            },
            startDate: start,
            endDate: end,
            ranges: {
               'Today': [moment(), moment()],
               'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
               'Last 7 Days': [moment().subtract(6, 'days'), moment()],
               'Last 30 Days': [moment().subtract(29, 'days'), moment()],
               'This Month': [moment().startOf('month'), moment().endOf('month')],
               'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            }
        }, cb);
        cb(start, end);
    });

    $(function() {

        var start = moment().subtract(2, 'years');
        var end = moment();

        function cb(start, end) {
            $('#reportrange2 span').html(start.format('YYYY, MMMM D') + ' and ' + end.format('YYYY, MMMM D'));
        }

        $('#reportrange2').daterangepicker({
            locale :{
              format: 'YYYY-MM-DD'
            },
            startDate: start,
            endDate: end,
            ranges: {
               'Today': [moment(), moment()],
               'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
               'Last 7 Days': [moment().subtract(6, 'days'), moment()],
               'Last 30 Days': [moment().subtract(29, 'days'), moment()],
               'This Month': [moment().startOf('month'), moment().endOf('month')],
               'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            }
        }, cb);
        cb(start, end);
    });

    function tanggalre(){
      $("#tanggalre").delay(100).fadeIn(100);
      $("#areare").fadeOut(100);
      $("#statusre").fadeOut(100);
    }

    function areare(){
      $("#areare").delay(100).fadeIn(100);
      $("#tanggalre").fadeOut(100);
      $("#statusre").fadeOut(100);
    }

    function statusre(){
      $("#statusre").delay(100).fadeIn(100);
      $("#tanggalre").fadeOut(100);
      $("#areare").fadeOut(100);
    }

    function pdf(){
      $("#cekpdf").show();
    }

    function pdf1(){
      $("#cekpdf1").show();
    }

    function pdf2(){
      $("#cekpdf2").show();
    }
</script>