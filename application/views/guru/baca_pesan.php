
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
      </div><!-- /.box-header -->
      <div class="box-body">
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
            <input class="form-control baca-pesan" type="text" readonly="" value="<?php echo $pesan['judul_pesan']; ?>"></input>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
            <textarea class="form-control baca-pesan" name="" id="" cols="30" rows="10" readonly=""><?php echo $pesan['pesan']; ?></textarea>
            </div>
          </div>
        </div>
        <div class="pull-right">
          <a href="<?php echo site_url('adminguru/inbox'); ?>" class="btn bg-blue balas-pesan">Kembali</a>
          <button id_pesan="<?php echo $pesan['id_pesan']; ?>" username3="<?php echo $pesan['username']; ?>" class="btn btn-success balas-pesan">Balas</button>
        </div>
    </div><!-- /.box-body -->
    

    
  </div><!-- /.box -->

</section><!-- /.content -->
</div><!-- /.content-wrapper -->

<!-- BALAS PESAN MODAL -->
<div class="modal fade" id="balas-pesan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">
<div class="modal-dialog">
  <div class="register-box">
    <div class="register-box-body">
      <button type="button" class="close" data-dismiss="modal">×</button>
      <p class="login-box-msg">Balas Pesan</p>
      <?php echo form_open('adminguru/kirimpesan'); ?>
      <input class="id_akun" name="id_akun" type="hidden" value="<?php echo $pesan['id_akun']; ?>">
      <div class="form-group has-feedback">
        <input readonly="" name="username" type="text" class="form-control username3" placeholder="Username">
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