
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
            <img src="<?php echo base_url() ?>assets/image/siswa/<?php echo $isi['foto']; ?>" class="img-circle center-block gambar" alt="User Image">
            <div class="col-md-6 col-md-offset-3">
            <?php if ($isi['id_paket'] != NULL) {
            ?>
            <div class="box box-success box-solid">
              <div class="box-header with-border">
                <h3 class="box-title">User Status</h3><!-- /.box-tools -->
              </div><!-- /.box-header -->
              <div class="box-body">
                <div class="col-md-3">
                  <i class="fa fa-dollar fa-4x text-success"></i>
                </div>
                <div class="col-md-6">
                 <p class="text-success" style="font-size: 22px;"><b>Paid Member</b></p>
                </div>
              </div><!-- /.box-body -->
            </div><!-- /.box -->
            <?php
            }else{
            ?>
            <div class="box box-danger box-solid">
              <div class="box-header with-border">
                <h3 class="box-title">User Status</h3><!-- /.box-tools -->
              </div><!-- /.box-header -->
              <div class="box-body">
                <div class="col-md-4">
                  <i class="fa fa-ban fa-4x text-danger"></i>
                </div>
                <div class="col-md-6">
                 <p class="text-danger" style="font-size: 22px;"><b>Free Member</b></p>
                </div>
              </div><!-- /.box-body -->
            </div><!-- /.box -->
            <div class="text-center">
              <a href="<?php echo site_url(); ?>/adminutama/activatedGuru/<?php echo $isi['id_akun']; ?>/2" class="btn btn-success btn-lg">Activate</a>
            </div>
            <?php
            } ?>

            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Username</label>
              <input disabled="" name="username" type="text" class="form-control" placeholder="Username" value="<?php echo $isi['username']; ?>">
            </div>

            <div class="form-group">
              <label>Nama</label>
              <input disabled="" name="nama" type="text" class="form-control" placeholder="Nama" value="<?php echo $isi['nama']; ?>">
            </div>
            <div class="form-group">
              <label>Jenis Kelamin</label>
              <?php if ($isi['jenis_kelamin'] == 'L') {
                $jenis_kelamin = 'Laki-laki';
              }else{
                $jenis_kelamin = 'Perempuan';
              } ?>
              <input disabled="" name="jenis_kelamin" type="text" class="form-control" placeholder="Jenis Kelamin" value="<?php echo $jenis_kelamin; ?>">
            </div>
            <div class="form-group">
              <label>Alamat</label>
              <textarea disabled="" name="alamat" class="form-control" rows="3" placeholder="Alamat"><?php echo $isi['alamat']; ?></textarea>
            </div>
            <div class="form-group">
              <label>No HP</label>
              <input disabled="" name="no_hp" type="number" class="form-control" placeholder="No HP" value="<?php echo $isi['no_hp']; ?>">
            </div>
            <div class="form-group">
              <label>Email</label>
              <input disabled="" name="email" type="email" class="form-control" placeholder="Email" value="<?php echo $isi['email']; ?>">
            </div>
          </div>
        </form>
          <table id="datatable" class="table table-bordered table-striped">
            <thead>
              <tr>
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
                <td><?php echo $isi['kelas']; ?></td>
                <td><?php echo $isi['deskripsi']; ?></td>
                <?php 
                  $jumlah_siswa = $this->model->GetKelasSiswa("where id_kelas = " . $isi['id_kelas'] ."")->num_rows();
                 ?>
                <td><?php echo $jumlah_siswa; ?></td>
                <?php 
                  $jumlah_soal = $this->model->GetKelasSoal("where id_kelas = " . $isi['id_kelas'] ."")->num_rows();
                 ?>
                <td><?php echo $jumlah_soal; ?></td>
                <td><a href="" class="badge bg-blue">Detail</a><a href="" class="badge bg-red">Keluar</a></td>
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