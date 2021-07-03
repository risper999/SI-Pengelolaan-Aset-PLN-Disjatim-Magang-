<!DOCTYPE html>
<html><head>
  <title><?= $title_page; ?></title>
</head><body>
  <style type="text/css">
    table
    {
      border-collapse: collapse;
    }
    tr>th
    {
      background-color:#B5EAEA;
    }
  </style>
  <div>
    <p ><b style="font-size: 16px; "><?= $title_page; ?> PT. PLN (PERSERO) KANTOR DISTRIBUSI JAWA TIMUR</b><br>Jalan Embong Trengguli No.19-21, Embong Kaliasin, Genteng, Kota Surabaya, Jawa Timur 60271 <br>No Telp (031) 5340651</p>
    <hr>
    <p style="font-size: 10px; ">Print Date : <?php $tgl=date('l, d/m/Y  H:i'); echo $tgl;?></p>
  </div>
  <table border="1" >
   <tr style='text-align: center;  font-size: 12px;'>
    <th>No</th>
    <th>Unit</th>             
    <th>Nama Aset</th>
    <th>Luas</th>                       
    <th>Nama Pekerjaan</th>
    <th>Biaya Pengajuan</th>
    <th>Tanggal Pengajuan</th>
    <th>Status</th>
    <th>Biaya Persetujuan(Rp)</th>
    <th>Alasan Disetujui Setengah</th>
    <th>Alasan Ditolak</th>
  </tr>
  <?php
  $no=1;

  foreach ($data_pengajuan as $a){?>
   <tr style='text-align: center; font-size: 12px;'>
     <td><?php echo $no; ?></td>
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
    <td>Rp<?php echo number_format($a->nilai_pengajuan,2,',','.');?></td>
    <td><?php echo (date("d M Y", strtotime($a->tgl_pengajuan))); ?></td>
    <td><?php if($a->status==0){?>
      <p style="color: grey;">Tunggu</p><br><?php echo (date("d M Y", strtotime($a->approval_aset_date)))?></td>
    <?php }elseif($a->status==1){ ?>
      <p style="color: green;">Disetujui Distribusi</p><br><?php echo (date("d M Y", strtotime($a->approval_aset_date)))?></td>
    <?php }elseif($a->status==2){ ?>
      <p style="color: red;">Ditolak Distribusi</p><br><?php echo (date("d M Y", strtotime($a->approval_aset_date))) ?></td>
    <?php }elseif($a->status==3){ ?>
      <p style="color: green;">Disetujui Aset</p><br><?php echo (date("d M Y", strtotime($a->approval_aset_date)))?></td>
    <?php }elseif($a->status==4){ ?>
      <p style="color: red;">Ditolak Aset</p><br><?php echo (date("d M Y", strtotime($a->approval_aset_date)))?></td>
    <?php } ?>
    <td>Rp<?php echo number_format($a->nilai_persetujuan,2,',','.');?></td>
    <td><?php echo $a->approval_aset_reason; ?></td>
    <td><?php echo $a->alasan_tolak; ?></td>
  </tr>

  <?php $no++;
}?>
</table>

</body></html>