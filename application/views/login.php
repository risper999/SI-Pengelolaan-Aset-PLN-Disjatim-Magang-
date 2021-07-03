<!DOCTYPE html>
<html lang="en">
<head>
    <title><?= $title ?></title>
</head>
<body class="text-center" style="background-image: url('<?php echo base_url();?>/assets/images/bg.jpg'); background-repeat:no-repeat; background-position: left top; background-attachment: fixed; background-position: center; background-size: cover;">
<div class="container" style="max-width: 25rem; margin-top: 110px;">
  <?php if(isset($pesan)){echo $pesan;}?>
          <?php echo form_close();?>
   <div class="card card-login mx-auto mt-5">
      <div class="card-body">
      
      <center><img src="<?=base_url()?>assets/images/pln.png" id="icon" alt="User Icon" style="width: 40%;"/></center><br>
          <?php echo form_open('login/var_login');  ?>
          <form>
            <div class="form-group">
                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                  <div class="input-group-text"><i class="fas fa-user"></i></div>
                </div>
                <input type="text" class="form-control" id="inlineFormInputGroup" name="username" placeholder="Username" required/>
                </div>
            </div>
            <div class="form-group">
              <div class="input-group mb-2">
                  <div class="input-group-prepend">
                  <div class="input-group-text"><i class="fas fa-key"></i></div>
                </div>
                <input type="password" class="form-control" id="inlineFormInputGroup" name="password" placeholder="Password" required/>
                </div>
            </div><br>
            <button type="submit" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#exampleModalCenter">Login</button>
          </form>
            
      </div>
    </div>
  </div>
</body>
</html>

<!-- <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      username atau password anda tidak sesuai
    </div>
  </div>
</div> -->