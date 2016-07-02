
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
      </div>
      <div class="box-body">          
        <!-- Custom Tabs -->
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">

            <li class="<?php echo $class = ($tab == 'biodata') ? "active" : NULL ; ?>"><a href="#biodata" data-toggle="tab">Biodata</a></li>

            <li class="<?php echo $class = ($tab == 'paket') ? "active" : NULL ; ?>"><a href="#Paket" data-toggle="tab">Paket</a></li>

            <li class="<?php echo $class = ($tab == 'administrasi') ? "active" : NULL ; ?>"><a href="#Administrasi" data-toggle="tab">Administrasi</a></li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane <?php echo $class = ($tab == 'biodata') ? "active" : NULL ; ?>" id="biodata">
              <!-- form start -->
              <?php echo form_open_multipart('adminguru/insertbiodata', 'class="form-horizontal"'); ?>
              <div class="box-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="col-sm-2 ">Username</label>
                      <div class="col-sm-10">
                        <input required="" maxlength="20" value="<?php echo $biodata['username']; ?>" name="username" type="text" class="form-control" placeholder="Username">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 ">Nama</label>
                      <div class="col-sm-10">
                        <input required="" maxlength="20" value="<?php echo $biodata['nama']; ?>" name="nama" type="text" class="form-control">
                      </div>
                    </div>
                    <div class="form-group">
                    <label  class="col-sm-2">Jenis Kelamin</label>
                    <div class="col-md-3">
                          <input class="laki" type="radio" name="jenis_kelamin" value="L">
                          Laki-laki
                    </div>
                    <div class="col-md-3">
                          <input class="cewek" type="radio" name="jenis_kelamin" value="P">
                          Perempuan
                    </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 ">Alamat</label>
                      <div class="col-sm-10">
                        <textarea name="alamat" placeholder="Alamat" class="form-control"><?php echo $biodata['alamat']; ?></textarea>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 ">No HP</label>
                      <div class="col-sm-10">
                        <input maxlength="12" value="<?php echo $biodata['no_hp']; ?>" name="no_hp" type="number" class="form-control" placeholder="No HP">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 ">e-Mail</label>
                      <div class="col-sm-10">
                        <input maxlength="30" value="<?php echo $biodata['email']; ?>" name="email" type="email" class="form-control" placeholder="e-Mail">
                      </div>
                    </div>
                  </div><!-- /.col-md-6 -->
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="col-sm-2 ">Foto</label>
                      <div class="col-sm-10">
                        <input required="" value="<?php echo $biodata['foto']; ?>" name="foto" type="file" class="file-loading gambar2">
                      </div>
                    </div>
                  </div><!-- /.col-md-6 -->
                </div><!-- /.row -->
              </div><!-- /.box-body -->
              <div class="box-footer">
                <div class="pull-right">
                  <button type="reset" class="btn btn-primary">Reset</button>
                  <button type="submit" class="btn btn-warning">Simpan</button>
                </div>
              </div><!-- /.box-footer -->
            </form>
          </div><!-- /.tab-pane -->

          <div class="tab-pane <?php echo $class = ($tab == 'paket') ? "active" : NULL ; ?>" id="Paket">
            <?php echo form_open('adminguru/insertpaket', 'class="form-horizontal"'); ?>
            <input type="text" hidden="" name="nama_paket" class="nama_paket" value=""></input>
            <div class="box-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-sm-4">Status Paket</label>
                    <div class="col-sm-8">
                    <?php if ($paket['nama_paket']) {?>
                      <input class="form-control" type="text" disabled="" value="<?php echo $paket['nama_paket']; ?>"></input>
                    <?php
                    } else {?>
                      <input class="form-control" type="text" disabled="" value="Free User"></input>
                    <?php
                    }
                     ?>
                      
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-4">Deposit</label>
                    <div class="col-sm-8">
                      <input name="deposit" readonly="" value="<?php echo $biodata['deposit']; ?>" type="number" class="form-control">
                    </div>
                  </div>
                  <div class="box box-solid bg-purple-gradient">
                    <div class="box-header">
                      <i class="fa fa-calendar"></i>
                      <h3 class="box-title">Pemberitahuan</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body no-padding">
                      <!--The calendar -->
                      <div id="calendar" style="width: 100%"></div>
                    </div><!-- /.box-body -->
                    <div class="box-footer text-black">
                      <div class="">
                      Untuk membeli paket, anda harus mempunyai dana deposit yang cukup <br>
                      -> Rekening : 8798798797 <br>
                      -> a/n : Anandia Muhammad Y <br>
                      -> <a href="#" class="lihat_harga">Lihat daftar harga & detail</a> <br>
                      -> Setelah mengirim dana, silahkan klik konfirmasi <br>
                      <button class="btn btn-success kirim-pesan">Konfirmasi</button>
                      <button class="btn btn-success lihat_harga">Lihat harga</button>
                      </div>
                    </div>
                  </div><!-- /.box -->


                </div><!-- /.col-md-6 -->
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-sm-4">Pilih Paket</label>
                    <div class="col-sm-8">
                    <?php if ($paket['nama_paket']) {?>
                        <select disabled="" class="form-control pilih-paket" name="id_paket">
                          <option value="">Pilih Paket</option>
                          <?php foreach ($paketall as $isi) {?>
                          <option value="<?php echo $isi['id_paket']; ?>"><?php echo $isi['nama_paket']; ?></option>
                          <?php
                        } ?>
                      </select>
                    <?php
                    } else {?>
                        <select class="form-control pilih-paket" name="id_paket">
                          <option value="">Pilih Paket</option>
                          <?php foreach ($paketall as $isi) {?>
                          <option value="<?php echo $isi['id_paket']; ?>"><?php echo $isi['nama_paket'] . " -> Rp. " . $isi['harga_paket']; ?></option>
                          <?php
                        } ?>
                      </select>
                    <?php
                    }
                     ?>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4">Durasi Paket (tahun)</label>
                  <div class="col-sm-3">
                    <input name="tahun" min="1" max="10" placeholder="durasi" type="number" readonly="" class="form-control durasi-paket"></input>
                  </div>
                </div>
                * Pilih paket akan tersedia ketika paket anda habis atau belum memiliki paket.
                <div>&nbsp;</div>
                <div class="pull-right">
                  <button disabled="" type="submit" class="btn btn-warning button-pilih-paket">Pilih Paket</button>
                </div>
              </div><!-- /.col-md-6 -->
            </div><!-- /.row -->
          </div><!-- /.box-body -->
          <div class="box-footer">

          </div><!-- /.box-footer -->
        </form>
      </div><!-- /.tab-pane -->
      <div class="tab-pane <?php echo $class = ($tab == 'administrasi') ? "active" : NULL ; ?>" id="Administrasi">
        <!-- form start -->
        <?php echo form_open('adminguru/update_administrasi', 'class="form-horizontal"'); ?>
        <input type="text" name="id_akun" value="<?php echo $biodata['id_akun']; ?>" hidden=""></input>
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="col-sm-5">Username</label>
                <div class="col-sm-7">
                  <input  readonly="" required="" maxlength="20" value="<?php echo $biodata['username']; ?>" name="username" type="text" class="form-control" placeholder="Username">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-5">Password Baru</label>
                <div class="col-sm-7">
                  <input required="" maxlength="20" value="" name="password_baru" type="password" class="form-control" placeholder="Password Baru">
                </div>
              </div>
            </div><!-- /.col-md-6 -->
            <div class="col-md-6">
              <div class="form-group">
                <label class="col-sm-5">Konfirmasi Password</label>
                <div class="col-sm-7">
                  <input required="" maxlength="20" value="" name="konf_password" type="password" class="form-control" placeholder="Konfirmasi Password">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-5">Password Lama</label>
                <div class="col-sm-7">
                  <input required="" maxlength="20" value="" name="password_lama" type="password" class="form-control" placeholder="Password Lama">
                </div>
              </div>
            </div>
          </div><!-- /.row -->
        </div><!-- /.box-body -->
        <div class="box-footer">
          <div class="pull-right">
            <button type="reset" class="btn btn-primary">Reset</button>
            <button type="submit" class="btn btn-warning">Simpan</button>
          </div>
        </div><!-- /.box-footer -->
      </form>
    </div><!-- /.tab-pane -->
  </div><!-- /.tab-content -->
</div><!-- nav-tabs-custom -->
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
      <?php echo form_open('adminguru/kirimkonfirmasi'); ?>
      <div class="form-group has-feedback">
          <input hidden="" type="text" name="id_akun" value="1">
          <input readonly="" class="form-control" type="text" value="Admin">
          <span class="fa fa-male form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input readonly="" value="Konfirmasi" name="judul_pesan" type="text" class="form-control" placeholder="Subject">
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

<div class="modal fade" id="lihat_harga" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">

<div class="modal-dialog">
  <div class="box">
    <div class="box-header">
      <button type="button" class="close" data-dismiss="modal">×</button>
      <p class="login-box-msg">Lihat Harga</p>
    </div>
    <div class="box-body">
        <table id="datatable" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Nama Paket</th>
              <th>Harga</th>
              <th>Template Tugas</th>
              <th>Jumlah Kelas</th>
              <th>Jumlah Soal</th>
              <th>Iklan</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            foreach ($paketall as $isi) {?>
            <tr>
              <td><?php echo $isi['nama_paket']; ?></td>
              <td><?php echo $isi['harga_paket']; ?></td>
              <td><?php echo $isi['template_soal']; ?></td>
              <td><?php echo $isi['jumlah_kelas']; ?></td>
              <td><?php echo $isi['jumlah_soal']; ?></td>
              <td><?php echo $isi['iklan']; ?></td>
            </tr>
            <?php
          }
          ?>

        </tbody>
        <tfoot>
          <tr>
            <th>Nama Paket</th>
            <th>Harga</th>
            <th>Template Tugas</th>
            <th>Jumlah Kelas</th>
            <th>Jumlah Soal</th>
            <th>Iklan</th>
          </tr>
        </tfoot>
      </table>
    </div><!-- /.form-box -->
  </div><!-- /.register-box -->
</div>
</div>

<script>
var jenis_kelamin = "<?php echo $biodata['jenis_kelamin']; ?>";

if (jenis_kelamin == 'L') {
  $('.laki').prop('checked', true);
}else{
  $('.cewek').prop('checked', true);
}

  // ajax pilih paket
  $('.pilih-paket').change(function(){
    //alert('asdas');
    var isi;
    isi = $(".pilih-paket option:selected").val();

    // jika pilih paket kosong, maka di reset
    if (isi == "") { 
      $('.durasi-paket').prop('readonly', true);
      $('.button-pilih-paket').prop('disabled', true);
    }else{
      $('.durasi-paket').prop('readonly', false);
      $('.button-pilih-paket').prop('disabled', false);
    }
  });
</script>