
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
        <a class="btn bg-purple" href="<?php echo site_url('adminguru/buat_tugas'); ?>">
          <i class="fa fa-plus"></i> Buat Tugas
        </a>    
<!--         <a class="btn bg-yellow" href="<?php echo site_url('adminguru/tugas'); ?>">
  <i class="fa fa-google-wallet"></i> All
</a>   -->
        <a class="btn bg-blue" href="<?php echo site_url('adminguru/published'); ?>">
          <i class="fa fa-ils"></i> Published
        </a>   
        <a class="btn bg-red" href="<?php echo site_url('adminguru/unpublished'); ?>">
          <i class="fa fa-columns"></i> Un-Published
        </a>    
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
              <td>
                <!-- <a href="" class="badge bg-yellow">Edit</a> -->
                <a href="<?php echo site_url("adminguru/publish_tugas/" . $isi['id_soal'] . ""); ?>" class="badge bg-blue">Publish</a>
                <br>
                <!-- <a href="" class="badge bg-purple">Detail</a> -->
                <a href="<?php echo site_url('adminguru/hapus_tugas_un/' . $isi['id_soal'] . ''); ?>" class="badge bg-red ask">Hapus</a>
              </td>
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