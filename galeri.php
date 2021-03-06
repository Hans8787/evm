<?php
session_start();


if ( !isset($_SESSION["user_login"]) ) {
	header('Location: login.php');
	exit;
}

require 'index.php';

// pagination Foto
// konfigurasi
$jumlahDataPerHalamanF = 10;
$jumlahData = count(DB::q("SELECT * FROM galery"));
$jumlahHalamanF = ceil($jumlahData / $jumlahDataPerHalamanF);
$halamanAktifF = ( isset($_GET["halaman"]) ) ? $_GET["halaman"] : 1;
$awalDataF = ( $jumlahDataPerHalamanF * $halamanAktifF ) - $jumlahDataPerHalamanF;

$galeri = DB::q("SELECT * FROM galery LIMIT $awalDataF, $jumlahDataPerHalamanF");

// pagination Video
// konfigurasi
$jumlahDataPerHalamanV = 6;
$jumlahData = count(DB::q("SELECT * FROM video"));
$jumlahHalamanV = ceil($jumlahData / $jumlahDataPerHalamanV);
$halamanAktifV = ( isset($_GET["hal"]) ) ? $_GET["hal"] : 1;
$awalDataV = ( $jumlahDataPerHalamanV * $halamanAktifV ) - $jumlahDataPerHalamanV;

$video = DB::q("SELECT * FROM video LIMIT $awalDataV, $jumlahDataPerHalamanV");



?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>GenMaung | Galeri</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="assets/dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header fixed">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>G</b>Mg</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Gen</b>Maung</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="assets/dist/img/hans.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?= $_SESSION["nama"]; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="assets/dist/img/hans.jpg" class="img-circle" alt="User Image">

                <p>
                  <?= $_SESSION["nama"]; ?> - Web Developer
                  <small>OSIS MPK`18</small>
                </p>
              </li>
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="justify-content-center">
                  <a href="logout.php" class="btn btn-default btn-flat">Logout</a>
                </div>
              </li>
            </ul>
          </li>
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="assets/dist/img/hans.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?= $_SESSION["nama"]; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Cari...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
    		<li class="header">MAIN NAVIGATION</li>
    		<li>
          <a href="../widgets.html">
            <i class="fa fa-home"></i> <span> Beranda</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-list-alt"></i> <span>Event</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="admin.php"><i class="fa fa-circle-o"></i> Tambah Event</a></li>
            <li><a href="daftar_event.php"><i class="fa fa-circle-o"></i> Daftar Event</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-book"></i>
            <span>Info Sekolah</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="info.php"><i class="fa fa-circle-o"></i> Lihat Info</a></li>
            <li><a href="edit.php"><i class="fa fa-circle-o"></i> Edit Info</a></li>
          </ul>
        </li>
        <li class="treeview active">
          <a href="#">
            <i class="fa fa-picture-o"></i>
            <span>Galeri</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="galeri.php"><i class="fa fa-circle-o"></i> Lihat Galeri</a></li>
            <li><a href="upload.php"><i class="fa fa-circle-o"></i> Upload Foto & Video</a></li>
          </ul>
        </li>
        
        <li>
          <a href="assets/pages/calendar.php">
            <i class="fa fa-calendar"></i> <span>Kalender</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-red">3</small>
              <small class="label pull-right bg-blue">17</small>
            </span>
          </a>
        </li>
        <li>
          <a href="assets/pages/mailbox/mailbox.php">
            <i class="fa fa-envelope"></i> <span>Ideabox</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-yellow">12</small>
              <small class="label pull-right bg-green">16</small>
              <small class="label pull-right bg-red">5</small>
            </span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="min-height: 910px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Lihat Galery
        <small>..</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Beranda</a></li>
        <li><a href="#">Galeri</a></li>
        <li class="active">Lihat Galeri</li>
      </ol>
    </section>
    <?php if( isset($_GET["act"]) && $_GET["act"] == 'es' ) {
      echo '<div class="callout callout-success" style="margin: 5px 15px;"> 
              <h4>Upload Success</h4>
            </div>';
    } ?>

    <!-- Main content -->
    <section class="content" style="min-height: 900px">

      <!-- Galeri Foto -->
      <div class="box box-danger">
        <div class="box-header with-border">
          <h3 class="box-title">Galeri Foto</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding">
          <div class="row">
          <?php $i = 1; ?>
          <?php foreach ( $galeri as $gal ) : ?>
            <div style="margin: 14px;" class="col-lg-2">
              <img src="<?= $gal["file"]; ?>" alt="User Image" style="width: 200px; margin-bottom: 3px; border-radius: 4px; box-shadow: 1px 1px 2px 1px;">
              <a class="users-list-name" href="?id=<?= $gal["id"]; ?>"><?= $gal["capt"]; ?></a>
            </div>
          <?php $i++; ?>
          <?php endforeach; ?>
          </div>
          <!-- /.users-list -->

          <!-- Navigasi Pagination Foto -->
          <div class="col-sm-12">
            <div class="dataTables_paginate paging_simple_numbers pull-right" id="example2_paginate">
              <ul class="pagination">
                <!-- Tombol Previous -->
                <?php if( $halamanAktifF > 1 ) : ?>
                  <li class="paginate_button previous" id="example2_previous">
                    <a href="?halaman=<?= $halamanAktifF - 1; ?>" aria-controls="example2" data-dt-idx="0" tabindex="0">Sebelumnya</a>
                  </li>
                <?php else : ?>
                  <li class="paginate_button previous disabled" id="example2_previous">
                    <a href="#" aria-controls="example2" data-dt-idx="0" tabindex="0">Sebelumnya</a>
                  </li>
                <?php endif; ?>
                
                <!-- Halaman -->
                <?php for( $i = 1; $i <= $jumlahHalamanF; $i++ ) : ?>
                  <?php if( $i == $halamanAktifF ) : ?>
                    <li class="paginate_button active">
                      <a href="?halaman=<?= $i; ?>" aria-controls="example2" data-dt-idx="1" tabindex="0"><?= $i; ?></a>
                    </li>
                  <?php else : ?>
                    <li class="paginate_button">
                      <a href="?halaman=<?= $i; ?>" aria-controls="example2" data-dt-idx="1" tabindex="0"><?= $i; ?></a>
                    </li>
                  <?php endif; ?>
                <?php endfor; ?>

                <!-- Tombol Next -->
                <?php if( $halamanAktifF < $jumlahHalamanF ) : ?>
                  <li class="paginate_button next" id="example2_next">
                    <a href="?halaman=<?= $halamanAktifF + 1; ?>" aria-controls="example2" data-dt-idx="7" tabindex="0">Selanjutnya</a>
                  </li>
                <?php else : ?>
                  <li class="paginate_button next disabled" id="example2_next">
                    <a href="#" aria-controls="example2" data-dt-idx="7" tabindex="0">Selanjutnya</a>
                  </li>
                <?php endif; ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <!-- /.box-body -->

      <!-- Galeri Video -->
      <div class="box box-danger">
        <div class="box-header with-border">
          <h3 class="box-title">Galeri Video</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding">
          <div class="row">
          <?php $i = 1; ?>
          <?php foreach ( $video as $gal ) : ?>
            <div style="margin: 0 56px 2px 23px; padding-bottom: 3px;" class="col-lg-3">
              <video width="320" height="240" controls style="box-shadow: 1px 1px 1px 1px;">
                <source src="<?= $gal["video"]; ?>" type="video/mp4">
              </video>
              <a class="users-list-name" href=""><?= $gal["judul"]; ?></a>
            </div>
          <?php $i++; ?>
          <?php endforeach; ?>
          </div>
          <!-- /.users-list -->

          <!-- Navigasi Pagination Video -->
          <div class="col-sm-12">
            <div class="dataTables_paginate paging_simple_numbers pull-right" id="example2_paginate">
              <ul class="pagination">
                <!-- Tombol Previous -->
                <?php if( $halamanAktifV > 1 ) : ?>
                  <li class="paginate_button previous" id="example2_previous">
                    <a href="?hal=<?= $halamanAktifV - 1; ?>" aria-controls="example2" data-dt-idx="0" tabindex="0">Sebelumnya</a>
                  </li>
                <?php else : ?>
                  <li class="paginate_button previous disabled" id="example2_previous">
                    <a href="#" aria-controls="example2" data-dt-idx="0" tabindex="0">Sebelumnya</a>
                  </li>
                <?php endif; ?>
                
                <!-- Halaman -->
                <?php for( $i = 1; $i <= $jumlahHalamanV; $i++ ) : ?>
                  <?php if( $i == $halamanAktifV ) : ?>
                    <li class="paginate_button active">
                      <a href="?hal=<?= $i; ?>" aria-controls="example2" data-dt-idx="1" tabindex="0"><?= $i; ?></a>
                    </li>
                  <?php else : ?>
                    <li class="paginate_button">
                      <a href="?hal=<?= $i; ?>" aria-controls="example2" data-dt-idx="1" tabindex="0"><?= $i; ?></a>
                    </li>
                  <?php endif; ?>
                <?php endfor; ?>

                <!-- Tombol Next -->
                <?php if( $halamanAktifV < $jumlahHalamanV ) : ?>
                  <li class="paginate_button next" id="example2_next">
                    <a href="?hal=<?= $halamanAktifV + 1; ?>" aria-controls="example2" data-dt-idx="7" tabindex="0">Selanjutnya</a>
                  </li>
                <?php else : ?>
                  <li class="paginate_button next disabled" id="example2_next">
                    <a href="#" aria-controls="example2" data-dt-idx="7" tabindex="0">Selanjutnya</a>
                  </li>
                <?php endif; ?>
              </ul>
            </div>
          </div>

        </div>
        <!-- /.box-body -->
      </div>

    </section>
	<!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <strong class="text-center">Copyright &copy; 2019 <a href="https://web.facebook.com/farhan.almoza">Farhan Almoza</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-user"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Profile Settings</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Change Avatar</h4>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-phone bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Your WA Number</h4>

                <p>Phone +62 896-2213-5384</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Your Mail Address</h4>

                <p>oyisamfarhan@gmial.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-laptop bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Teknik Komputer & Jaringan</h4>

                <p>SMK Negeri 1 Jamblang</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->
      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="assets/bower_components/jquery/dist/jquery.min.js"></script>
<script src="assets/js/jquery-3.3.1.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="assets/dist/js/demo.js"></script>
<!-- ckeditor -->
<script src="assets/ckeditor/ckeditor.js"></script>
<!-- adapter jquery ckeditor -->
<script src="assets/ckeditor/adapters/jquery.js"></script>
<!-- date-range-picker -->
<script src="assets/bower_components/moment/min/moment.min.js"></script>
<script src="assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script>
</script>
</body>
</html>