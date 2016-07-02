
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
          <a href="<?php echo site_url('adminguru/downloadExcel'); ?>" class="btn bg-green">
            <i class="fa fa-print"></i> Eksport Excel
          </a>
      </div><!-- /.box-header -->
      <div class="box-body">
        <table id="datatable_kelas" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Nama Siswa</th>
              <th>Benar</th>
              <th>Salah</th>
              <th>Nilai</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            foreach ($nilai as $isi) {?>
            <tr>
              <td><?php echo $isi['nama']; ?></td>
              <td><?php echo $isi['benar']; ?></td>
              <td><?php echo $isi['salah']; ?></td>
              <td><?php echo $isi['nilai']; ?></td>
            </tr>
            <?php
          }
          ?>

        </tbody>
        <tfoot>
          <tr>
            <th>Nama Siswa</th>
            <th>Benar</th>
            <th>Salah</th>
            <th>Nilai</th>
            <th>Aksi</th>
          </tr>
        </tfoot>
      </table>
    </div><!-- /.box-body -->
  </div><!-- /.box -->

</section><!-- /.content -->
</div><!-- /.content-wrapper -->