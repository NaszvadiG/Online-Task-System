
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
<!--       <div class="box-header">
        <div class="">
          <a class="btn bg-purple tambah">
            <i class="fa fa-plus"></i> Tambah
          </a>
        </div>
      </div><!-- /.box-header -->
      <div class="box-body">
        <form role="form">
          <div class="col-md-6">
            <img src="<?php echo base_url() ?>assets/image/kelas/<?php echo $kelas['logo']; ?>" class="img-circle center-block gambar" alt="User Image">
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Kode Kelas</label>
              <input disabled="" name="kode_kelas" type="text" class="form-control" placeholder="kode_kelas" value="<?php echo $kelas['kode_kelas']; ?>">
            </div>

            <div class="form-group">
              <label>Guru</label>
              <input disabled="" name="kode_kelas" type="text" class="form-control" placeholder="kode_kelas" value="<?php echo $kelas['nama']; ?>">
            </div>

            <div class="form-group">
              <label>Kelas</label>
              <input disabled="" name="kelas" type="text" class="form-control" placeholder="kelas" value="<?php echo $kelas['kelas']; ?>">
            </div>
            <div class="form-group">
              <label>Deskripsi</label>
              <textarea disabled="" name="deskripsi" class="form-control" rows="3" placeholder="deskripsi"><?php echo $kelas['deskripsi']; ?></textarea>
            </div>
          </div>
        </form>
      </div><!-- /.box-body -->
    </div><!-- /.box -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->
