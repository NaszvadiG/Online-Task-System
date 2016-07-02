
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
          <a class="btn bg-purple tambah">
            <i class="fa fa-plus"></i> Tambah
          </a>
<!--           <a href="<?php echo site_url('adminguru/export_kelas'); ?>" class="btn bg-green">
  <i class="fa fa-print"></i> Eksport Excel
</a> -->
      </div><!-- /.box-header -->
      <div class="box-body">
        <table id="datatable_kelas" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Kode Kelas</th>
              <th>Nama Kelas</th>
              <th>Deskripsi Kelas</th>
              <th>Jumlah Siswa</th>
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
                $jumlah_siswa = $this->model->GetKelasSiswa("where id_kelas = ". $isi['id_kelas'] ."")->num_rows();
               ?>
              <td><?php echo $jumlah_siswa; ?></td>
              <?php 
                $jumlah_soal = $this->model->GetKelasSoal("where id_kelas = ". $isi['id_kelas'] ."")->num_rows();
               ?>
              <td><?php echo "$jumlah_soal"; ?></td>
              <td><a href="detailkelas/<?php echo $isi['id_kelas']; ?>/diterima" class="badge bg-purple">Detail</a> <a href="hapuskelas/<?php echo $isi['id_kelas']; ?>" class="badge bg-red ask">Hapus</a></td>
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
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title">Tambah Kelas</h4>
    </div>
    
    <?php echo form_open_multipart('adminguru/insertkelas'); ?>
      <div class="box-body">
        <div class="col-md-6">
          <div class="form-group">
            <label for="kelas">Kelas</label>
            <input name="kelas" type="text" class="form-control" placeholder="Masukkan nama kelas">
          </div>
          <!-- textarea -->
          <div class="form-group">
            <label>Deskripsi Kelas</label>
            <textarea name="deskripsi" class="form-control" rows="3" placeholder="Masukkan deskripsi kelas"></textarea>
          </div>
          <div class="form-group">
            <label for="logo-kelas">Logo Kelas</label>
            <input name="logo" type="file" class="file-loading gambar2" name="logo">
            <p class="help-block">Masukkan logo/gambar kelas</p>
          </div>
        </div>
        <div class="col-md-6">
<!--           <div class="form-group">
  <label for="kelas">Masukkan Siswa</label>
  <select class="form-control i_username" multiple="multiple" data-placeholder="Masukkan username siswa" style="width: 100%;">
    <?php foreach ($siswa as $isi) {?>
    <option value="<?php echo $isi['id_akun']; ?>"><?php echo $isi['username']; ?></option>
    <?php
  } ?>
</select>
        </div> -->

        <!-- <p class="text-purple">atau sebarkan</p> -->
        <div class="form-group">
          <label for="kelas">Kode Kelas</label>
          <div class="input-group">
            <input name="kode_kelas" type="text" class="form-control kode-kelas" readonly="" value="<?php echo $kode_kelas; ?>">
            <div class="input-group-btn">
              <button type="button" class="btn bg-purple">Copy</button>
            </div><!-- /btn-group -->
          </div><!-- /input-group -->
                          
<!--           <a class="btn btn-block btn-social btn-facebook">
            <i class="fa fa-facebook"></i> Share di Facebook
          </a></p> -->
          <p class="help-block">Sebarkan kode kelas ke siswa anda ketika anda tidak tahu username mereka
        </div>
      </div>
    </div><!-- /.box-body -->
  

  <div class="modal-footer">
    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
    <button type="submit" class="btn bg-purple">Tambah Kelas</button>
  </div>
  </form>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div>
<!-- Modal Kelas End -->