
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
          <a class="btn bg-purple kirim-pesan">
            <i class="fa fa-plus"></i> Kirim Pesan
          </a>
          <a class="btn bg-green" href="<?php echo site_url('adminguru/pesan'); ?>">
            <i class="fa fa-modx"></i> Semua Pesan
          </a>
          <a class="btn bg-yellow" href="<?php echo site_url('adminguru/terbaca'); ?>">
            <i class="fa fa-google-wallet"></i> Sudah dibaca
          </a>  
          <a class="btn bg-blue" href="<?php echo site_url('adminguru/belum_terbaca'); ?>">
            <i class="fa fa-ils"></i> Belum Dibaca
          </a>
      </div><!-- /.box-header -->
      <div class="box-body">
        <table id="datatable" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Judul Pesan</th>
              <th>Dari</th>
              <th>Waktu</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            foreach ($pesan as $isi) {?>
            <tr>
              <td><?php echo $isi['judul_pesan']; ?></td>
              <td><?php echo $isi['username']; ?></td>
              <td><?php echo $isi['waktu_pesan']; ?></td>
              <td><a href="baca_pesan/<?php echo $isi['id_pesan']; ?>" class="badge bg-purple">Baca</a><a href="hapus_pesan/<?php echo $isi['id_pesan']; ?>" class="badge bg-red ask">Hapus</a></td>
            </tr>
            <?php
          }
          ?>

        </tbody>
        <tfoot>
          <tr>
              <th>Judul Pesan</th>
              <th>Dari</th>
              <th>Waktu</th>
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