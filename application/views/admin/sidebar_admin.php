      <style type="text/css">
      .sidebar-ad{
        border: 2px solid #fff;
        width: 30px;
        height: 30px;
      }
      </style>
      <!-- Left side column. contains the sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">

            <div class="pull-left image">
              

              <?php 
                if ($jenis == 'guru') {?>
                  <img src="<?php echo base_url() ?>assets/image/guru/<?php echo $foto; ?>" class="img-circle" alt="User Image">
              <?php
                }elseif ($jenis == 'siswa') {?>
                  <img src="<?php echo base_url() ?>assets/image/siswa/<?php echo $foto; ?>" class="img-circle" alt="User Image">
              <?php
                }else{?>
                <img src="<?php echo base_url() ?>assets/dist/img/<?php echo $foto; ?>" class="img-circle" alt="User Image">
              <?php
                }
               ?>

            </div>
            <div class="pull-left info">
              <p><?php echo $nama; ?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          
          </div>
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">

            <li class="header">MAIN NAVIGATION</li>
            <div class="sidebar-ad">
              
            </div>
            <?php switch ($jenis) {
              case 'guru':
                ?>
                <li><a href="<?php echo site_url('adminguru/dashboard') ?>"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
                <li><a href="<?php echo site_url('adminguru/kelas') ?>"><i class="fa fa-group"></i> <span>Manajemen Kelas</span></a></li>
                <li><a href="<?php echo site_url('adminguru/siswa') ?>"><i class="fa fa-male"></i> <span>Manajemen Siswa</span></a></li>
                <li><a href="<?php echo site_url('adminguru/published') ?>"><i class="fa fa-tasks"></i> <span>Manajemen Tugas</span></a></li>
                <li><a href="<?php echo site_url('adminguru/setting') ?>"><i class="fa fa-gear"></i> <span>Setting</span></a></li>
                <li><a href="<?php echo site_url('adminguru/logout') ?>"><i class="fa fa-power-off"></i> <span>Logout</span></a></li>

                <?php
                break;

              case 'siswa':
                ?>
                <li><a href="<?php echo site_url('adminsiswa/dashboard') ?>"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
                <li class="treeview">
                  <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>Data Kelas</span>
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="<?php echo site_url('adminsiswa/kelas') ?>"><i class="fa fa-circle-o"></i> Kelas Diterima <span class="label label-primary pull-right"><?php echo $kelas_diterima; ?></span></a></li>
                    <li><a href="<?php echo site_url('adminsiswa/kelas_belum_diterima') ?>"><i class="fa fa-circle-o"></i> Kelas Belum Diterima <span class="label label-primary pull-right"><?php echo $kelas_belum_diterima; ?></span></a></li>
                    <li><a href="<?php echo site_url('adminsiswa/kelas_ditolak') ?>"><i class="fa fa-circle-o"></i> Kelas Ditolak <span class="label label-primary pull-right"><?php echo $kelas_ditolak; ?></span></a></li>
                  </ul>
                </li>
                <li class="treeview">
                  <a href="#"><i class="fa fa-book"></i> <span>Data Tugas</span>
                  <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="<?php echo site_url('adminsiswa/tugas') ?>">Tugas Belum Dikerjakan <span class="label label-primary pull-right"><?php echo $soal_belum_dikerjakan; ?></span></a></li>
                    <li><a href="<?php echo site_url('adminsiswa/tugas_sudah_dikerjakan') ?>">Tugas Sudah Dikerjakan <span class="label label-primary pull-right"><?php echo $soal_dikerjakan; ?></span></a></li>
                    <li><a href="<?php echo site_url('adminsiswa/tugas_terlewat') ?>">Tugas Terlewat <span class="label label-primary pull-right"><?php echo $soal_terlewat; ?></span></a></li>
                  </ul>
                </li>
                <li><a href="<?php echo site_url('adminsiswa/nilai') ?>"><i class="fa fa-book"></i> <span>Data Nilai</span></a></li>
                <li><a href="<?php echo site_url('adminsiswa/setting') ?>"><i class="fa fa-gear"></i> <span>Setting</span></a></li>
                <li><a href="<?php echo site_url('adminsiswa/logout') ?>"><i class="fa fa-power-off"></i> <span>Logout</span></a></li>

                <?php
                break;
              
              default:
                ?>
                <li><a href="<?php echo site_url('adminutama/dashboard') ?>"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
                <li><a href="<?php echo site_url('adminutama/guru') ?>"><i class="fa fa-group"></i> <span>Manajemen Guru</span></a></li>
                <li><a href="<?php echo site_url('adminutama/siswa') ?>"><i class="fa fa-male"></i> <span>Manajemen Siswa</span></a></li>
                <li><a href="<?php echo site_url('adminutama/setting') ?>"><i class="fa fa-gear"></i> <span>Setting</span></a></li>
                <li><a href="<?php echo site_url('adminutama/logout') ?>"><i class="fa fa-power-off"></i> <span>Logout</span></a></li>
                <?php
                break;
            } ?>
          </ul>
          <div class="user-panel">
        <?php 
            if ($jenis != 'admin') {
            if ($iklan == "yes") {?>
              <a href=""><img src="<?php echo base_url() ?>assets/image/iklan/210_210.jpg" width="210px" height="210px"></a>
            <?php
            }
            }
         ?>
        
        </div>
        </section>

        <!-- /.sidebar -->
      </aside>

      <!-- =============================================== -->
