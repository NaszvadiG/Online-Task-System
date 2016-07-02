
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
        <a class="btn btn-success tambah">
          <i class="fa fa-plus"></i> Ikut Kelas
        </a> 
      </div><!-- /.box-header -->
      <div class="box-body">
        <table id="datatable" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Kode Kelas</th>
              <th>Nama Kelas</th>
              <th>Deskripsi Kelas</th>
              <th>Jumlah Soal</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            foreach ($kelas as $isi) {?>
            <tr>
              <td><?php echo $isi['kode_kelas']; ?></td>
              <td><?php echo $isi['kelas']; ?></td>
              <td><?php echo $isi['deskripsi']; ?></td>
              <?php 
              $jumlah_soal = $this->model->GetKelasSoal("where id_kelas = ". $isi['id_kelas'] ."")->num_rows();
              ?>
              <td><?php echo "$jumlah_soal"; ?></td>
              <td><a href="detailkelas/<?php echo $isi['id_kelas']; ?>" class="badge bg-purple">Detail</a><a href="hapuskelas/<?php echo $isi['id_kelas']; ?>" class="badge bg-red ask">Keluar</a></td>
            </tr>
            <?php
          }
          ?>

        </tbody>
        <tfoot>
          <tr>
            <th>Kode Kelas</th>
            <th>Nama Kelas</th>
            <th>Deskripsi Kelas</th>
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
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title">Ikut Kelas</h4>
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