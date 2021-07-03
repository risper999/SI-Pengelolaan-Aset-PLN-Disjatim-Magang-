<head>
    <title><?= $title ?></title>
</head>
<body>
  <div class="container" style="margin-top: 90px; margin-bottom: 20px;">
    <div class="media">
      <img class="align-self-start mr-3" src="<?=base_url()?>/assets/images/pln1.png" style="width: 60px; margin-top: 10px;">
      <div class="media-body">
        <h1 class="mt-0 text-white">PT. PLN (PERSERO) KANTOR DISTRIBUSI JAWA TIMUR</h1>
        <p class="text-white">Jalan Embong Trengguli No.19-21, Embong Kaliasin, Genteng, Kota SBY, Jawa Timur 60271 <br>No Telp (031) 5340651</p>
      </div>
    </div><br>
    
    <div class="card">
      <h5 class="card-header text-white bg-primary"><i class="far fa-check-square"></i> Jumlah Pengajuan</h5>
      <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="tbl1" width="100%" cellspacing="0">
              <thead>
                <tr style="text-align: center;">
                  <th>No</th> 
                  <th>Area</th>                
                  <th>Jumlah</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no=1;
                  foreach ($total as $a) { ?>
                  <tr>
                    <td style='text-align: center;'><?php echo $no; ?></td>
                    <td><?php echo $a->nama_area; ?></td>
                    <td><?php echo $a->n; ?></td>
                  </tr>
                <?php $no++; } ?>
              </tbody>
            </table>
          </div>
      </div>
    </div><br><br>

    <div class="card">
      <h5 class="card-header text-white bg-primary"><i class="far fa-check-square"></i> Disetuji</h5>
      <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="tbl2" width="100%" cellspacing="0">
              <thead>
                <tr style="text-align: center;">
                  <th>No</th> 
                  <th>Area</th>                
                  <th>Jumlah</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no=1;
                  foreach ($disetujui as $a) { ?>
                  <tr>
                    <td style='text-align: center;'><?php echo $no; ?></td>
                    <td><?php echo $a->nama_area; ?></td>
                    <td><?php echo $a->n; ?></td>
                  </tr>
                <?php $no++; } ?>
              </tbody>
            </table>
          </div>
      </div>
    </div><br><br>

    <div class="card">
      <h5 class="card-header text-white bg-primary"><i class="far fa-check-square"></i> Ditolak</h5>
      <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="tbl3" width="100%" cellspacing="0">
              <thead>
                <tr style="text-align: center;">
                  <th>No</th> 
                  <th>Area</th>                
                  <th>Jumlah</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no=1;
                  foreach ($ditolak as $a) { ?>
                  <tr>
                    <td style='text-align: center;'><?php echo $no; ?></td>
                    <td><?php echo $a->nama_area; ?></td>
                    <td><?php echo $a->n; ?></td>
                  </tr>
                <?php $no++; } ?>
              </tbody>
            </table>
          </div>
      </div>
    </div><br><br>

    <div class="card">
      <h5 class="card-header text-white bg-primary"><i class="far fa-check-square"></i> Tunggu</h5>
      <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="tbl4" width="100%" cellspacing="0">
              <thead>
                <tr style="text-align: center;">
                  <th>No</th> 
                  <th>Area</th>                
                  <th>Jumlah</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no=1;
                  foreach ($tunggu as $a) { ?>
                  <tr>
                    <td style='text-align: center;'><?php echo $no; ?></td>
                    <td><?php echo $a->nama_area; ?></td>
                    <td><?php echo $a->n; ?></td>
                  </tr>
                <?php $no++; } ?>
              </tbody>
            </table>
          </div>
      </div>
    </div>
  </div>
</body>

<script type="text/javascript">
  $(function(){
    $('#tbl1').DataTable();
  });
  $(function(){
    $('#tbl2').DataTable();
  });
  $(function(){
    $('#tbl3').DataTable();
  });
  $(function(){
    $('#tbl4').DataTable();
  });
</script>