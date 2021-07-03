<head>
    <title><?= $title ?></title>
</head>
<body>
		
<?php 
if($this->session->userdata('akses')==true && $this->session->userdata('level')=='area'){
echo '<div style="margin: 100px 70px 0 70px;">';}

else{
  echo '<div style="margin: 100px 70px 0 70px;">';
}
?>
    <div class="card">
      <h5 class="card-header text-white bg-primary"><i class="fas fa-stream"></i> Form Pengajuan Proyek</h5>
      <div class="card-body">
        <?php echo form_open_multipart('pengajuan_proyek/input_simpan');?>
		  <div class="form-row">
		    <div class="form-group col-md-4">
		      <label >Nama Pengajuan*</label>
		      <input type="text"  class="form-control" name="nama_pengajuan" placeholder="-" required/>
		    </div>
		    <div class="form-group col-md-4">
		      <label for="disabledTextInput">Distribusi*</label>
		      <fieldset disabled><input type="text" id="disabledTextInput" class="form-control" value="Distribusi Jawa Timur" required/></fieldset>
		      <input type="hidden" id="disabledTextInput" class="form-control" name="distribusi" value="Distribusi Jawa Timur" required/>
		    </div>
		    <div class="form-group col-md-4">
		      <label for="disabledTextInput">Tahun Pengajuan*</label>
		      <fieldset disabled><input type="text" value="<?=date("d M Y")?>" class="form-control" placeholder="-"/></fieldset>
		      <input type="hidden" value="<?=date("Y")?>" name="thn_pengajuan" class="form-control"/>
		    </div>
		  </div>

		 
			<div class="form-row">
     <div class="form-group col-md-6">
				  	<label for="inputAddress"> Lokasi Area*</label>
				    <select class="form-control" name="id_area" id="id_area">
				        <?php
	         		  foreach ($area as $a) {
	             	    echo '<option value='.$a->id_area.'>'.$a->id_area.' - '.$a->nama_area.'</option>';
	         		  }
	         		?>
				    </select>
				  </div>
  		 <div class="form-group col-md-6">
				  	<label for="inputAddress"> Lokasi Rayon*</label>
				    <select class="form-control" name="id_rayon" id="id_rayon">
				      <option value="">-</option>
				        <?php
	         		  foreach ($rayon as $a) {
	             	    echo '<option value='.$a->id_rayon.'>'.$a->id_rayon.' - '.$a->nama_rayon.'</option>';
	         		  }
	         		?>
				    </select>
				  </div>
   </div>

		    <div class="form-group">
		      <label for="inputEmail4">Alamat*</label>
		      <input type="text" id="alamat" name="alamat" placeholder="Alamat" class="form-control" required/>
		    </div>
		  	<div class="form-group">
		      <label for="aset">Data Aset*</label> <br>
		      <div class="form-check form-check-inline">
		        <input class="form-check-input" type="radio" name="aset" value="1" id="aset" onclick="aset_rad('1')">
		        <label class="form-check-label">Tanah ,</label>
		      </div>
		      <div class="form-check form-check-inline">
		        <input class="form-check-input" type="radio" name="aset" value="2" id="aset" onclick="aset_rad('2')">
		        <label class="form-check-label">Wisma & Rumah Dinas ,</label>
		      </div>
		      <div class="form-check form-check-inline">
		        <input class="form-check-input" type="radio" name="aset" value="3" id="aset" onclick="aset_rad('3')">
		        <label class="form-check-label">Gudang ,</label>
		      </div>
		      <div class="form-check form-check-inline">
		        <input class="form-check-input" type="radio" name="aset" value="4" id="aset" onclick="aset_rad('4')">
		        <label class="form-check-label">Bangunan & Kantor ,</label>
		      </div>

		      <br>

			    <div id="group_tanah" style="display: block;">
				  <div class="form-group">
				  	<label for="inputAddress"></label>
				    <select class="form-control" name="id_tanah" id="id_tanah">
				      <option value="">-</option>
				        <?php
          		  foreach ($tanah as $a) {
              	    echo '<option value='.$a->id_tanah.'>'.$a->nama_tanah.'</option>';
          		  }
          		?>
				    </select>
				  </div>
				</div>

				<div id="group_wisma" style="display: none;">
				  <div class="form-group">
				  	<label for="inputAddress"></label>
				    <select class="form-control" name="id_wisma" id="id_wisma">
				      <option value="">-</option>
				        <?php
          		  foreach ($wisma as $a) {
              	    echo '<option value='.$a->id_wisma.'>'.$a->nama_wisma.'</option>';
          		  }
          		?>
				  </select>				      
				  </div>
				</div>
				<div id="group_gudang" style="display: none;">
				  <div class="form-group">
				  	<label for="inputAddress"></label>
				    <select class="form-control" name="id_gudang" id="id_gudang">
				      <option value="">-</option>
				        <?php
          		  foreach ($gudang as $a) {
              	    echo '<option value='.$a->id_gudang.'>'.$a->nama_gudang.'</option>';
          		  }
          		?>
				    </select>
				  </div>
				</div>
				<div id="group_bangunan" style="display: none;">
				  <div class="form-group">
				  	<label for="inputAddress"></label>
				    <select class="form-control" name="id_bangunan" id="id_bangunan">
				      <option value="">-</option>
				        <?php
	         		  foreach ($bangunan as $a) {
	             	    echo '<option value='.$a->id_bangunan.'>'.$a->nama_bangunan.'</option>';
	         		  }
	         		?>
				    </select>
				  </div>
				</div>

				<!-- JS user area -->
				<script type="text/javascript">
					function aset_rad(i){
						$("#id_tanah").val($("#id_tanah option:first").val()),
						$("#id_wisma").val($("#id_wisma option:first").val()),
						$("#id_gudang").val($("#id_gudang option:first").val()),
						$("#id_bangunan").val($("#id_bangunan option:first").val());
						$("#group_tanah").css({"display":"none"}),$("#group_wisma").css({"display":"none"}),$("#group_gudang").css({"display":"none"}),$("#group_bangunan").css({"display":"none"});
						if(i=="1"){
							$("#group_tanah").css({"display":"block"});
						}else if(i=="2"){
							$("#group_wisma").css({"display":"block"});
						}else if(i=="3"){
							$("#group_gudang").css({"display":"block"});
						}else if(i=="4"){
							$("#group_bangunan").css({"display":"block"});
						}
					}
				</script>
		    </div>
		  <div class="form-group">
		    <label for="exampleFormControlTextarea1">Uraian Pekerjaan</label>
		    <textarea class="form-control" name="uraian_pekerjaan" id="exampleFormControlTextarea1" rows="3" required/></textarea>
		  </div>
		  <div class="form-row">
		    <div class="form-group col-md-6">
		      <label for="inputEmail4">Nilai Pengajuan*</label>
		      <input type="text" class="form-control" name="nilai_pengajuan" placeholder="-" required/>
      		</div>
			<div class="form-group col-md-6">
	       		<label class="control-label" for="data">Data Pendukung</label>
	       	<input type="file" name="userfile" class="form-control"/>
	      </div>
	      <div class="form-group">
	      	<label class="control-label">&nbsp;</label>
	      		<span style="color:#f33">Peringatan *</span>
	      		<ol start="a" style="padding-left:25px;">
	      			<li>Size data pendukung tidak boleh melebihi dari 5MB</li>
	      			<li>Format data pendukung dalam bentuk (.zip atau .rar)</li>
	      			<li>Hilangkan spasi pada nama data pendukung</li>
	      		</ol>
	      </div>
		  </div>
   </div>
	  <div class="card-footer text-muted text-center">
	   <button type="submit" class="btn btn-primary">Simpan</button>
	   <button type="reset" class="btn btn-danger">Reset</button>
	  </div>
    <?php echo form_close();?>
    </div>
  </div>
  </div>
</body>
<!-- JS user area -->
<script type="text/javascript">
	function lokasi_rad(i){
		$("#id_area").val($("#id_area option:first").val()), $("#id_rayon").val($("#id_area option:first").val()), $("#alamat").val('');
			if(i=="1"){
				$("#group_area").css({"display":"block"}),$("#group_rayon").css({"display":"none"});
			}else if(i=="2"){
				$("#group_area").css({"display":"none"}),$("#group_rayon").css({"display":"block"});
			}
		}
</script>