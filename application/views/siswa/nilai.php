
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
              <th>Waktu Mengerjakan</th>
              <th>Salah</th>
              <th>Benar</th>
              <th>Nilai</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            foreach ($nilai as $isi) {?>
            <tr>
              <td><?php echo $isi['judul']; ?></td>
              <td><?php echo $isi['judul']; ?></td>
              <td><?php echo $isi['salah']; ?></td>
              <td><?php echo $isi['benar']; ?></td>
              <td><?php echo $isi['nilai']; ?></td>
            </tr>
            <?php
          }
          ?>

        </tbody>
        <tfoot>
          <tr>
              <th>Judul Tugas</th>
              <th>Waktu Mengerjakan</th>
              <th>Salah</th>
              <th>Benar</th>
              <th>Nilai</th>
          </tr>
        </tfoot>
      </table>
    </div><!-- /.box-body -->
  </div><!-- /.box -->

</section><!-- /.content -->
</div><!-- /.content-wrapper -->