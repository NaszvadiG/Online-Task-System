<?php 

 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?=$tipe;?> | Admin Page</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/bootstrap/css/bootstrap.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/ionicons/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datatables/dataTables.bootstrap.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datepicker/datepicker3.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/select2/select2.min.css"><!-- JConfirmation -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/jConfirmAction-master/jconfirmaction.css">
    <!-- FileInput -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/fileinput/css/fileinput.min.css">
    <!-- ColorPicker -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/colorpicker/bootstrap-colorpicker.min.css">
    <!-- DateTimePicker -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/bootstrap-datetimepicker-master/build/css/bootstrap-datetimepicker.css">
    <!-- Prettify -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/prettify/prettify.css">
    <!-- ImagePicker -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/image-picker/image-picker/image-picker.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/mycss.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datatables/buttons.dataTables.min.css">
    
    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url() ?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition skin-purple-light sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
      <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo base_url() ?>assets/index2.html" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>A</b>DM</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b><?=$tipe?></b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              <li class="dropdown messages-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-envelope-o"></i>
                  <span class="label label-success"><?php echo "$jumlah_pesan"; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">Kamu mendapat <?php echo "$jumlah_pesan"; ?> pesan</li>
                  <li>
                    <ul class="menu">
                    <?php foreach ($isi_pesan as $isi) {?>
                    <li>
                      <?php 
                        if ($jenis == 'guru') {?>
                          <a href="<?php echo site_url('adminguru/baca_pesan/' . $isi['id_pesan'] . '') ?>">
                      <?php
                        }elseif ($jenis == 'siswa') {?>
                          <a href="<?php echo site_url('adminsiswa/baca_pesan/' . $isi['id_pesan'] . '') ?>">
                      <?php
                        }else{?>
                        <a href="<?php echo site_url('adminutama/baca_pesan/' . $isi['id_pesan'] . '') ?>">
                      <?php
                        }
                       ?>
                        <div class="pull-left">
                          <?php 
                            if ($isi['jenis'] == 'guru') {?>
                              <img src="<?php echo base_url() ?>assets/image/guru/<?php echo $isi['foto']; ?>" class="img-circle" alt="User Image">
                          <?php
                            }elseif ($isi['jenis'] == 'siswa') {?>
                              <img src="<?php echo base_url() ?>assets/image/siswa/<?php echo $isi['foto']; ?>" class="img-circle" alt="User Image">
                          <?php
                            }else{?>
                            <img src="<?php echo base_url() ?>assets/dist/img/<?php echo $isi['foto']; ?>" class="img-circle" alt="User Image">
                          <?php
                            }
                           ?>
                        </div>
                        <h4>
                          <?php echo $isi['username']; ?>
                          <small><button class="btn btn-success">Baca</button></small>
                        </h4>
                        <p><?php echo $isi['pesan']; ?></p>
                      </a>
                    </li>
                    <?php
                    } ?>

                    </ul>
                  </li>
                  <?php 
                    if ($jenis == 'guru') {?>
                      <li class="footer"><a href="<?php echo site_url('adminguru/inbox') ?>">Lihat semua pesan</a></li>
                  <?php
                    }elseif ($jenis == 'siswa') {?>
                      <li class="footer"><a href="<?php echo site_url('adminsiswa/inbox') ?>">Lihat semua pesan</a></li>
                  <?php
                    }else{?>
                    <li class="footer"><a href="<?php echo site_url('adminutama/inbox') ?>">Lihat semua pesan</a></li>
                  <?php
                    }
                   ?>
                  
                </ul>
              </li>
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <?php 
                    if ($jenis == 'guru') {?>
                      <img src="<?php echo base_url() ?>assets/image/guru/<?php echo $foto; ?>" class="user-image" alt="User Image">
                  <?php
                    }elseif ($jenis == 'siswa') {?>
                      <img src="<?php echo base_url() ?>assets/image/siswa/<?php echo $foto; ?>" class="user-image" alt="User Image">
                  <?php
                    }else{?>
                    <img src="<?php echo base_url() ?>assets/dist/img/<?php echo $foto; ?>" class="user-image" alt="User Image">
                  <?php
                    }
                   ?>
                  <span class="hidden-xs"><?php echo $nama; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                  <?php 
                    if ($jenis == 'guru') {?>
                      <img src="<?php echo base_url() ?>assets/image/guru/<?php echo $foto; ?>" class="user-image" alt="User Image">
                  <?php
                    }elseif ($jenis == 'siswa') {?>
                      <img src="<?php echo base_url() ?>assets/image/siswa/<?php echo $foto; ?>" class="user-image" alt="User Image">
                  <?php
                    }else{?>
                    <img src="<?php echo base_url() ?>assets/dist/img/<?php echo $foto; ?>" class="user-image" alt="User Image">
                  <?php
                    }
                   ?>
                    <p>
                      <?php echo $nama; ?>
                      <small>Member since <?php echo date('M Y', $tgl_gabung); ?></small>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-right">
                      <a href="<?php echo site_url('admin/logout') ?>" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>

      <!-- =============================================== -->