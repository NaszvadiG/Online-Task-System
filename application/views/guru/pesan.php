
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
          <a class="btn bg-yellow" href="<?php echo site_url('adminguru/inbox'); ?>">
            <i class="fa fa-google-wallet"></i> Inbox
          </a>  
          <a class="btn bg-blue" href="<?php echo site_url('adminguru/outbox'); ?>">
            <i class="fa fa-ils"></i> Outbox
          </a>
      </div><!-- /.box-header -->
      <div class="box-body">
        <table id="datatable_pesan" class="table table-bordered table-striped">
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
              <td>
                <a href="baca_pesan/<?php echo $isi['id_pesan']; ?>" class="badge bg-purple">Baca</a>
                <a href="hapus_pesan/<?php echo $jenis2 .'/'. $isi['id_pesan']; ?>" class="badge bg-red ask">Hapus</a>
                <?php 
                  if ($jenis2 == 'inbox') {
                    if ($isi['status'] == 'terbaca') {?>
                     <div class="badge bg-blue">Sudah Dibaca</div>
                  <?php
                    }else{?>
                    <div class="badge bg-yellow">Belum Dibaca</div>
                  <?php
                    }
                  }
                 ?>
              </td>
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
      <?php echo form_open('adminguru/kirimpesan'); ?>
      <div class="form-group">
          <select class="form-control" data-placeholder="Pilih Tujuan" name="id_akun">
            <option value="1">Admin</option>
            <?php foreach ($subject as $isi) {?>
            <option value="<?php echo $isi['id_akun']; ?>"><?php echo $isi['username']; ?></option>
            <?php
          } ?>
        </select>
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