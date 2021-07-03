<?php 
if($this->session->userdata('akses')==true && $this->session->userdata('level')=='admin'){
echo '<div style="margin: 100px 70px 0 70px;">';}

else{
  echo '<div style="margin: 100px 70px 0 70px;">';
}
?>
<head>
    <title><?= $title ?></title>
</head>
<body>
    <div class="card">
      <h5 class="card-header text-white bg-primary"><i class="fas fa-stream"></i> Form User</h5>
      <div class="card-body">
        <?php
      		if($this->session->userdata('aksi')==true) {
         		echo form_open('user/edit_simpan');
            	echo form_hidden('id_user',$id_user['id_user']);
            	echo form_hidden('id_area',$id_area['id_area']);
            }else{
            	echo form_open('user/input_simpan');            	
            } ?>
		  <div class="form-row">
		    <div class="form-group col-md-6">
		      <label>Nama*</label>
		      <?php 
		      	if($this->session->userdata('aksi')==true) {
		      		echo '<input type="text" class="form-control" name="nama" value="'.$id_user['nama'].'" placeholder="-" required>';
		       	}else{
		       		echo '<input type="text" class="form-control" name="nama" placeholder="-" required>';
		       	} ?>
		    </div>
		    <div class="form-group col-md-6">
		      <label>Email*</label>
		      <?php if($this->session->userdata('aksi')==true) {
		      		echo '<input type="email" class="form-control" name="email" value="'.$id_user['email'].'" placeholder="-" required>';
		       	}else{
		       		echo '<input type="email" class="form-control" name="email" placeholder="-" required>';
		       	} ?>
		    </div>
		  </div>
		  <div class="form-group">
		    <label>Alamat*</label>
		    <?php if($this->session->userdata('aksi')==true) {
		      		echo '<input type="text" class="form-control" name="alamat" value="'.$id_user['alamat'].'" placeholder="-" required>';
		       	}else{
		       		echo '<input type="text" class="form-control" name="alamat" placeholder="-" required>';
		       	} ?>
		  </div>
		  <div class="form-row">
		    <div class="form-group col-md-6">
		      <label>No HP*</label>
		      <?php if($this->session->userdata('aksi')==true) {
		      		echo '<input type="text" class="form-control" name="nohp" value="'.$id_user['nohp'].'" placeholder="-" required>';
		       	}else{
		       		echo '<input type="text" class="form-control" name="nohp" placeholder="-" required>';
		       	} ?>
		    </div>
		    <div class="form-group col-md-6">
			    <label>Jenis Kelamin*</label >
			    <select class="form-control" name="jenkel" required>
			    	<?php if($this->session->userdata('aksi')==true) {
			      		if($id_user['jenkel'] =='Laki-Laki'){
			      			echo "
			      			<option value='Laki-Laki'selected>Laki-Laki</option>
                    	 	<option value='Perempuan'>Perempuan</option>";
			      		}else{
			      			echo "
			      			<option value='Laki-Laki'>Laki-Laki</option>
                    	 	<option value='Perempuan'selected>Perempuan</option>";
			      		}
		       		}else{ 
		       			echo 
		       			"<option value=''>-</option>
		       			 <option value='Laki-Laki'>Laki-Laki</option>
                    	 <option value='Perempuan'>Perempuan</option>";
                    }?>
			    </select>
			  </div>
		  </div>
		  <div class="form-row">
		    <div class="form-group col-md-6">
		      <label>Username*</label>
		      	<?php if($this->session->userdata('aksi')==true) {
		      		echo '<fieldset disabled><input type="text" id="disabledTextInput" class="form-control" name="username" value="'.$id_user['username'].'" placeholder="-" required></fieldset>';
		       	}else{
		       		echo '<input type="text" class="form-control" name="username" placeholder="-" required>';
		       	}?>
		    </div>
		    <div class="form-group col-md-6">
		      <label>Password*</label>
		       <?php if($this->session->userdata('aksi')==true) {
		      		echo '<input type="password" class="form-control" name="password" placeholder="Masukan password baru" required/>';
		       	}else{
		       		echo '<input type="password" class="form-control" name="password" placeholder="-" required/>';
		       	}?>
		    </div>
		  </div>

		  <fieldset class="form-group">
		      <label>Level*</label>
		      <div class="col-md-12">
		        <?php if($this->session->userdata('aksi')==true){?>
		        	<div class="form-check">
		          	<input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="area" <?php if($id_user['jabatan']== "area"){echo 'checked';}?> >
		          	<label class="form-check-label" for="gridRadios1">
		            User Area
		          	</label>
		        	</div>
		        	<div class="form-check">
		          	<input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="distribusi" <?php if($id_user['jabatan']== "distribusi"){echo 'checked';}?>>
		          	<label class="form-check-label" for="gridRadios2">
		            User Kantor Distribusi
		          	</label>
		        	</div>
		        	<div class="form-check">
		          	<input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="aset" <?php if($id_user['jabatan']== "aset"){echo 'checked';}?>>
		          	<label class="form-check-label" for="gridRadios3">
		            Pengelola Aset Kantor Distribusi
		          	</label>
		        	</div>
		  <?php }else{
		        	echo'
		        	<div class="form-check">
		          	<input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="area">
		          	<label class="form-check-label" for="gridRadios1">
		            User Area
		          	</label>
		        	</div>
		        	<div class="form-check">
		          	<input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="distribusi">
		          	<label class="form-check-label" for="gridRadios2">
		            User Kantor Distribusi
		          	</label>
		        	</div>
		        	<div class="form-check">
		          	<input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="aset">
		          	<label class="form-check-label" for="gridRadios3">
		            Pengelola Aset Kantor Distribusi
		          	</label>
		        	</div>
		        	';
		        }?>
		    </div> <br>
		        <!-- output user area -->
			    <div id="area_input_form" style="display:none">
				  <div class="form-group">				    
				      <?php 
				      if($this->session->userdata('aksi')==true) {
			      			if(!$id_user['id_area'] == ''){ ?>
			      			<script type="text/javascript">
			      				$("#area_input_form").show();
			      			</script><?php
			      			}			      		
			      		echo "<label>Area*  (Wajib pilih area untuk Level User Area) (Area yang dipilih sebelumnya : -".$id_area['nama_area']." )</label >
				    	<select name='id_area' class='form-control' id='input_pilih_area'>
		       			<option value=''>Pilih Area</option>";
		       			foreach ($area as $a) {
                    	echo '<option value='.$a->id_area.'>'.$a->nama_area.'</option>';}
		       			}else{ 
		       			echo "
		       			<label>Area*  (Wajib pilih area untuk Level User Area)</label >
				    	<select name='id_area' class='form-control' id='input_pilih_area'>
		       			<option value=''>Pilih Area</option>";
		       			foreach ($area as $a) {
                    	echo '<option value='.$a->id_area.'>'.$a->nama_area.'</option>';
                    	}}?>
				    </select>
				  </div>
				</div>
				<!-- JS user area -->
				<script type="text/javascript">
				$(function(){
					$(":radio.form-check-input").click(function(){
						$("#area_input_form").hide();
						if($(this).val() =="area" ){
							$("#area_input_form").show();
							$("#input_pilih_area").required();
						}else{
							$("").show();
						}
					});
				});
				</script>
		  </fieldset>
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

<?php if ($this->session->flashdata('something')==1) {?>
    <script> swal('BERHASIL !','Data berhasil disimpan!','success'); </script>
<?php }elseif($this->session->flashdata('something')==2){?>
	<script> swal('GAGAL !','Username tidak boleh sama!','warning'); </script>
<?php } ?>