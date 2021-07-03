<head>
    <title><?= $title ?></title>
</head>
<body>
  <div class="" style="margin: 100px 70px 0 70px;">
    <div class="card">
      <h5 class="card-header text-white bg-primary"><i class="fas fa-stream"></i> Grafik Proyek</h5>
      <div class="card-body">
        <?php  echo form_open('grafik/cek_tahun'); ?>
		    <div class="form-row">
		      <div class="form-group col-md-3">
                    <select class="form-control" name="tahun" id="tahun">             
                      <option value=<?php echo date("Y");?>><?php echo date("Y");?></option>
                      <?php $thn_min= date("Y")-6;
                      $thn_max=$thn_min + 5;
                      for($thn_min;$thn_min<=$thn_max;$thn_min++){?>
                        <option value=<?php echo $thn_min;?>><?php echo $thn_min;?></option>
                      <?php } ?>                      
                      <?php $thn_min= date("Y")+1;
                      $thn_max=$thn_min + 5;
                      for($thn_min;$thn_min<=$thn_max;$thn_min++){?>
                        <option value=<?php echo $thn_min;?>><?php echo $thn_min;?></option>
                      <?php } ?>
                    </select>
                  </div>&nbsp;
          <div class="form-group">
  	        <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Tampilkan</button> &nbsp;
          </div>
        </div>
      </form>
      <center>Tahun : <?php echo $this->session->userdata('tahun_grafik'); ?></center>
      <div class="card mb-3">
          <div class="card-body">
          <canvas id="myAreaChart" width="100%" height="30"></canvas>
          <div id="jumlah_data" style="height: 400px"></div>
        </div>
      </div>
    </div>
    </div>
  </div>
  <br>
<?php 
if($this->session->userdata('level')!='area') {?>
    <script type="text/javascript">
        Highcharts.chart('jumlah_data', {
            chart: {
                type: 'line'
            },
            title: {
                text: 'Pengajuan Proyek Per Bulan'
            },
            subtitle: {
                text: 'Source: Distribusi Jawa Timur'
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
            },
            yAxis: {
                title: {
                    text: 'Jumlah Pengajuan'
                }
            },
            plotOptions: {
                line: {
                    dataLabels: {
                        enabled: true
                    },
                    enableMouseTracking: true
                }
            },
            series: [{
                name: 'Situbondo',
                data: <?php echo json_encode($STB); ?>
            },{
                name: 'Sidoarjo',
                data: <?php echo json_encode($SDA); ?>
            },{
                name: 'Surabaya Selatan',
                data: <?php echo json_encode($SBU); ?>
            },{
                name: 'Surabaya Utara',
                data: <?php echo json_encode($SBS); ?>
            },{
                name: 'Surabaya Barat',
                data: <?php echo json_encode($SBB); ?>
            },{
                name: 'Pasuruan',
                data: <?php echo json_encode($PSR); ?>
            },{
                name: 'Ponorogo',
                data: <?php echo json_encode($PNG); ?>
            },{
                name: 'Pamekasan',
                data: <?php echo json_encode($PKS); ?>
            },{
                name: 'Malang',
                data: <?php echo json_encode($MLG); ?>
            },{
                name: 'Mojokerto',
                data: <?php echo json_encode($MJK); ?>
            },{
                name: 'Madiun',
                data: <?php echo json_encode($MDN); ?>
            },{
                name: 'Kediri',
                data: <?php echo json_encode($KDR); ?>
            },{
                name: 'Jember',
                data: <?php echo json_encode($JBR); ?>
            },{
                name: 'Gresik',
                data: <?php echo json_encode($GRK); ?>
            },{
                name: 'Banyuwangi',
                data: <?php echo json_encode($BWG); ?>
            },{
                name: 'Area Pengatur Distribusi',
                data: <?php echo json_encode($APD); ?>
            }]
        });
    </script> 
<?php }else{ 
    $area = $nama_area; ?>
    <script type="text/javascript">
        Highcharts.chart('jumlah_data', {
            chart: {
                type: 'line'
            },
            title: {
                text: 'Pengajuan Proyek Per Bulan'
            },
            subtitle: {
                text: 'Source: Distribusi Jawa Timur'
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
            },
            yAxis: {
                title: {
                    text: 'Jumlah Pengajuan'
                }
            },
            plotOptions: {
                line: {
                    dataLabels: {
                        enabled: true
                    },
                    enableMouseTracking: true
                }
            },
            series: [{
                name: <?php echo json_encode($area); ?>,
                data: <?php echo json_encode($id_Area); ?>
            }]
        });
    </script>
    <?php } ?>
  </body>
</html>

