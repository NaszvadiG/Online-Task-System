
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
        <table id="datatable" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Judul Tugas</th>
              <th>Deskripsi</th>
              <th>Mulai</th>
              <th>Selesai</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            foreach ($tugas as $isi) {?>
            <tr>
              <td><?php echo $isi['judul']; ?></td>
              <td><?php echo $isi['deskripsi']; ?></td>
              <td><?php echo nice_date($isi['mulai'], 'd-m-Y H:i:s'); ?></td>
              <td><?php echo nice_date($isi['berhenti'], 'd-m-Y H:i:s'); ?></td>
              <td><a href="<?php echo site_url('adminsiswa/kerjakan_tugas/' . $isi['id_soal'] . ''); ?>" class="badge bg-purple">Kerjakan</a></td>
            </tr>
            <?php
          }
          ?>

        </tbody>
        <tfoot>
          <tr>
            <th>Nama Kelas</th>
            <th>Deskripsi Kelas</th>
            <th>Jumlah Siswa</th>
            <th>Jumlah Soal</th>
            <th>Aksi</th>
          </tr>
        </tfoot>
      </table>
    </div><!-- /.box-body -->
  </div><!-- /.box -->

</section><!-- /.content -->
</div><!-- /.content-wrapper -->

<!-- Modal Tambah Kelas -->
<div class="modal fade" id="tambah-kelas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      
    </div>
    
    <?php echo form_open_multipart('adminsiswa/ikutkelas'); ?>
    <div class="box-body">
      <div class="col-md-6">
        <label for="kelas">Masukkan Kode Kelas</label>
        <input name="kode_kelas" type="text" class="form-control kode-kelas" value="">
      </div>
      <div class="col-md-6">
        <span class="text-red"><b>Pengajuan ikut kelas menunggu konfirmasi dari guru apakah diterima atau tidak.</b></span>
      </div>
    </div><!-- /.box-body -->


    <div class="modal-footer">
      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
      <button type="submit" class="btn bg-purple">Ikut Kelas</button>
    </div>
  </form>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div>
<!-- Modal Kelas End -->