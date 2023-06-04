<!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
          <?php if(session()->get('level') == 1){?>
            <li><a href="<?= base_url('admin')?>">Home</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Master <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Fakultas</a></li>
                <li><a href="#">Program Studi</a></li>
                <li><a href="#">Dosen</a></li>
                <li><a href="#">Mahasiswa</a></li>
              </ul>
            </li>
            <li><a href="#">About</a></li>
            <?php }?>
          </ul>
        </div>
        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
          <?php if(session()->get('username') == ""){?>
            <li>
            <a href="<?= base_url('auth')?>">
              <i class="fa fa-sign-in"></i> Sign-in
            </a>
            </li>
          <?php }else{?>
            <!-- User Account Menu -->
            <li class="dropdown user user-menu">
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!-- The user image in the navbar-->
                <img src="<?= base_url('foto/'. session()->get('foto'))?>" class="user-image" alt="User Image">
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs"><?= session()->get('nama_user')?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- The user image in the menu -->
                <li class="user-header">
                  <img src="<?= base_url('foto/'. session()->get('foto'))?>" class="img-circle" alt="User Image">

                  <p>
                    <?= session()->get('nama_user')?>
                    <small><?php if(session()->get('level') == 1){
                      echo "Admin";
                    }elseif (session()->get('level') == 2) {
                      echo "Mahasiswa";
                    }elseif (session()->get('level') == 3) {
                      echo "Dosen";
                    }
                      ?></small>
                  </p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="#" class="btn btn-primary btn-flat">
                      <i class="fa fa-user"></i> Profile
                    </a>
                  </div>
                  <div class="pull-right">
                    <a href="<?= base_url('auth/logout')?>" class="btn btn-danger btn-flat">
                      <i class="fa fa-sign-in"></i> Sign out
                    </a>
                  </div>
                </li>
              </ul>
            </li>
            <?php }?>
          </ul>
        </div>
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>

  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header)
      <section class="content-header">
        <h1>
          Top Navigation
          <small>Example 2.0</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Layout</a></li>
          <li class="active">Top Navigation</li>
        </ol>
      </section> -->

      <section class="content">