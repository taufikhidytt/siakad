<div class="login-box">
  <div class="login-logo">
    Sign In<b> SiAkad</b>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Silahkan Sign In</p>
    <?php 
        $errors = session()->getFlashdata('ss');
        if(!empty($errors)){
    ?>
        <div class="alert alert-danger" role="alert">
            <ul>
                <?php foreach($errors as $key => $value){?>
                    <li><?= esc($value)?></li>
                <?php }?>
            </ul>
        </div>
        <?php }?>

        <?php 
        if(session()->getFlashdata('gagal')){
          echo '<div class="alert alert-warning" role="alert">';
          echo session()->getFlashdata('gagal');
          echo '</div>';
        }
        
        ?>

        <?php 
        if (session()->getFlashdata('logout')) {
          echo '<div class="alert alert-success" role="alert">';
          echo session()->getFlashdata('logout');
          echo '</div>';
        }
        ?>

    <?= form_open('auth/cek_login')?>
      <div class="form-group has-feedback">
        <input name="username" id="username" type="username" class="form-control" placeholder="Username">
        <span class="fa fa-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <select name="level" id="level" class="form-control">
            <option value="">--Level--</option>
            <option value="1">Admin</option>
            <option value="2">Mahasiswa</option>
            <option value="3">Dosen</option>
        </select>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" id="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary">
            <i class="fa fa-sign-in"></i> Sign In
          </button>
        </div>
        <div class="col-xs-8">
          <a href="<?= base_url()?>" class="btn btn-warning btn-sm pull-right">
            <i class="fa fa-reply-all"></i> Back
          </a>
        </div>
        <!-- /.col -->
      </div>
    <?php form_close()?>
          
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->