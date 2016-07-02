
<?php echo $this->session->flashdata('pesan'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?php echo $judul; ?>
      <small><?php echo $sub_judul; ?></small>
    </h1>

  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
    <div class="box-header">
      <?php echo $this->session->flashdata('pesan2'); ?>  
      <a class="btn bg-yellow" href="<?php echo site_url('adminguru/siswa'); ?>">
        <i class="fa fa-google-wallet"></i> Diterima
      </a>  
      <a class="btn bg-blue" href="<?php echo site_url('adminguru/siswa/belum_diterima'); ?>">
        <i class="fa fa-ils"></i> Belum Diterima
      </a>   
      <a class="btn bg-red" href="<?php echo site_url('adminguru/siswa/ditolak'); ?>">
        <i class="fa fa-columns"></i> Ditolak
      </a>    
    </div><!-- /.box-header -->
      <div class="box-body">
        <table id="datatable" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Foto</th>
              <th>Data Diri</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            foreach ($siswa as $isi) {?>
            <tr>
              <td width="150"><img height="150" src="<?php echo base_url() ?>assets/image/siswa/<?php echo $isi['foto']; ?>" class="img-circle" alt="User Image"></td>
              <td>
              <div class="row">
                <div class="col-md-3 col-sm-3">
                  <b>Username </b>
                </div>
                <div class="col-md-3 col-sm-3">
                  : <?php echo $isi['username']; ?>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3 col-sm-3">
                  <b>Nama </b>
                </div>
                <div class="col-md-3 col-sm-3">
                  : <?php echo $isi['nama']; ?>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3 col-sm-3">
                  <b>Jenis Kelamin </b>
                </div>
                <div class="col-md-3 col-sm-3">
                  : 
                  <?php 
                    if ($isi['jenis_kelamin'] == 'L') {
                      echo "Laki-laki";
                    }else{
                      echo "Perempuan";
                    }
                  ?>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3 col-sm-3">
                  <b>Alamat </b>
                </div>
                <div class="col-md-3 col-sm-3">
                  : <?php echo $isi['alamat']; ?>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3 col-sm-3">
                  <b>No HP </b>
                </div>
                <div class="col-md-3 col-sm-3">
                  : <?php echo $isi['no_hp']; ?>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3 col-sm-3">
                  <b>Email </b>
                </div>
                <div class="col-md-4 col-sm-3">
                  : <a href="mailto:<?php echo $isi['email']; ?>"><?php echo $isi['email']; ?></a>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3 col-sm-3">
                  <b>Status </b>
                </div>
                <div class="col-md-5 col-sm-3">
                  :                   
                  <?php 
                    if ($isi['id_paket']) {?>
                      <span class="text-green"><?php echo $isi['nama_paket']; ?></span>                      
                    <?php
                    }else{?>
                      <span class="text-red">Free User</span>                     
                    <?php
                    }
                  ?>
                </div>
              </div>
              </td>
              <td>
                <a href="<?php echo site_url(); ?>/adminguru/tolaksiswa/belum_diterima/<?php echo $isi['id_kelas_siswa']; ?>" class="btn btn-danger ask-tolak">Tolak</a>
                <a href="<?php echo site_url(); ?>/adminguru/terimasiswa/belum_diterima/<?php echo $isi['id_kelas_siswa']; ?>" class="btn btn-success ask-tolak">Terima</a>
                <span class="btn bg-purple kirim-pesan" id_akun="<?php echo $isi['id_akun']; ?>" username="<?php echo $isi['username']; ?>">Kirim Pesan</span>
<!--                 <a href="detailsiswa/<?php echo $isi['id_akun']; ?>" class="btn bg-purple">Detail</a> -->
                <br>
                <br>
              </td>
            </tr>
            <?php
          }
          ?>

        </tbody>
        <tfoot>
          <tr>
            <th>Foto</th>
            <th>Data Diri</th>
            <th>Aksi</th>
          </tr>
        </tfoot>
      </table>
    </div><!-- /.box-body -->
  </div><!-- /.box -->

</section><!-- /.content -->
</div><!-- /.content-wrapper -->
<div class="modal fade" id="kirim-pesan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">

<div class="modal-dialog">
  <div class="register-box">
    <div class="register-box-body">
      <button type="button" class="close" data-dismiss="modal">×</button>
      <p class="login-box-msg">Kirim Pesan</p>
      <?php echo form_open('adminutama/kirimpesan/siswa'); ?>
      <input class="id_akun" name="id_akun" type="hidden">
      <div class="form-group has-feedback">
        <input readonly="" name="username" type="text" class="form-control username2" placeholder="Username">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input name="judul_pesan" type="text" class="form-control" placeholder="Subject">
        <span class="fa fa-text-width form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <textarea placeholder="Isi Pesan" name="pesan" class="form-control"></textarea>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="btn-group col-md-offset-7">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary"><span class="fa fa-paper-plane"></span> Kirim</button>
      </div>
      <?php echo form_close(); ?>

    </div><!-- /.form-box -->
  </div><!-- /.register-box -->
</div>
</div>