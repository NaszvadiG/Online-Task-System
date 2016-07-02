
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
    <?php echo $this->session->flashdata('pesan2'); ?>
      <div class="box-body">          
            <!-- Custom Tabs -->
            <div class="nav-tabs-custom">
              <ul class="nav nav-tabs">

                <li class="<?php echo $class = ($tab == 'tampilan') ? "active" : NULL ; ?>"><a href="#Tampilan" data-toggle="tab">Tampilan</a></li>

                <li class="<?php echo $class = ($tab == 'paket') ? "active" : NULL ; ?>"><a href="#Paket" data-toggle="tab">Paket</a></li>

                <li class="<?php echo $class = ($tab == 'administrasi') ? "active" : NULL ; ?>"><a href="#Administrasi" data-toggle="tab">Administrasi</a></li>

                <li class="<?php echo $class = ($tab == 'template') ? "active" : NULL ; ?>"><a href="#Template" data-toggle="tab">Template</a></li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane <?php echo $class = ($tab == 'tampilan') ? "active" : NULL ; ?>" id="Tampilan">
                  <!-- form start -->
                  <?php echo form_open_multipart('adminutama/inserttampilan', 'class="form-horizontal"'); ?>
                  <div class="box-body">
                    <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Nama Web</label>
                          <div class="col-sm-10">
                            <input required="" maxlength="20" value="<?php echo $data2['nama_web']; ?>" name="nama_web" type="text" class="form-control" placeholder="Nama Web">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Warna Dasar</label>
                          <div class="col-sm-10">
                            <div class="input-group my-colorpicker2">
                              <input required="" minlength="7" maxlength="7" value="<?php echo $data2['warna_dasar']; ?>" name="warna_dasar" type="text" class="form-control">
                              <div class="input-group-addon">
                                <i></i>
                              </div>
                            </div><!-- /.input group -->
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Favicon</label>
                          <div class="col-sm-10">
                            <input required="" value="<?php echo $data2['favicon']; ?>" name="favicon" type="file" class="file-loading gambar2">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Iklan 430x125</label>
                          <div class="col-sm-10">
                            <textarea name="ad_430_125" placeholder="Pasang iklan di sini" class="form-control"><?php echo $data2['ad_430_125']; ?></textarea>
                          </div>
                        </div>
                      </div><!-- /.col-md-6 -->
                      <div class="col-md-6">
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Footer Credit</label>
                        <div class="col-sm-10">
                          <input maxlength="30" value="<?php echo $data2['footer_credit']; ?>" name="footer_credit" type="text" class="form-control" placeholder="Footer Credit">
                        </div>
                      </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Tentang</label>
                          <div class="col-sm-10">
                            <textarea name="tentang" placeholder="Tentang" class="form-control"><?php echo $data2['tentang']; ?></textarea>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Iklan 210x210</label>
                          <div class="col-sm-10">
                            <textarea name="ad_210_210" placeholder="Pasang iklan di sini" class="form-control"><?php echo $data2['ad_210_210']; ?></textarea>
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
                  <?php echo form_open('adminutama/update_insert_paket/update', 'class="form-horizontal"'); ?>
                    <input type="text" hidden="" name="nama_paket" class="nama_paket" value=""></input>
                    <div class="row">
                    <div class="col-md-6">
                      <div class="box-body">
                        <div class="form-group">
                          <label class="col-sm-4">Nama Paket</label>
                          <div class="col-sm-8">
                            <select class="form-control pilih-paket" name="id_paket">
                              <option value="">Pilih Paket</option>
                              <?php foreach ($paket as $isi) {?>
                                <option value="<?php echo $isi['id_paket']; ?>"><?php echo $isi['nama_paket']; ?></option>
                              <?php
                              } ?>
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-4">Harga Paket</label>
                          <div class="col-sm-8">
                            <input min="0" max="10000000" value="" name="harga_paket" type="number" class="harga_paket form-control" placeholder="Harga Paket">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-4">Tipe Paket</label>
                          <div class="col-sm-8">
                            <select name="tipe_paket" class="form-control tipe-paket">
                              <option class="tipe_paket_pilih">Pilih Tipe</option>
                              <option class="tipe_paket_guru" value="guru">Guru</option>
                              <option class="tipe_paket_siswa" value="siswa">Siswa</option>
                            </select>
                          </div>
                        </div>
                      </div><!-- /.box-body -->

                      <button class="btn btn-primary tambah-paket"><span class="fa fa-plus fa-2x"></span> <span style="font-size: 20px;"><b>Tambah Paket</b></span></button>

                      </div><!-- /.col-md-6 -->
                      <div class="col-md-6">
                      <div class="box box-solid bg-yellow-gradient">
                        <div class="box-header">
                          <i class="fa fa-calendar"></i>
                          <h3 class="box-title">Fitur</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body no-padding">
                          <!--The calendar -->
                          <div id="calendar" style="width: 100%"></div>
                        </div><!-- /.box-body -->
                        <div class="box-footer text-black">
                          <div class="">
                            <div class="form-group">
                            <label  class="col-md-5">Template Soal</label>
                            <div class="col-md-4">
                                  <input class="template_yes" type="radio" name="template_soal" value="yes">
                                  Ya
                            </div>
                            <div class="col-md-3">
                                  <input class="template_no" type="radio" name="template_soal" value="no">
                                  Tidak
                            </div>
                            </div>

                            <div class="form-group">
                            <label  class="col-md-5">Jumlah Kelas</label>
                            <div class="col-md-4">
                              <div class="input-group">
                                <span class="input-group-addon">
                                  <input class="kelas_yes" type="radio" name="jumlah_kelas" value="yes">
                                </span>
                                <input disabled="" type="number" class="form-control kelas_yes2" name="jumlah_kelas2">
                              </div><!-- /input-group -->
                            </div>
                            <div class="col-md-3">
                                  <input class="kelas_no" type="radio" name="jumlah_kelas" value="unlimited">
                                  Unlimited
                            </div>
                            </div>

                            <div class="form-group">
                            <label  class="col-md-5">Jumlah Siswa</label>
                            <div class="col-md-4">
                              <div class="input-group">
                                <span class="input-group-addon">
                                  <input class="siswa_yes" type="radio" name="jumlah_siswa" value="yes">
                                </span>
                                <input disabled="" type="number" class="form-control siswa_yes2" name="jumlah_siswa2">
                              </div><!-- /input-group -->
                            </div>
                            <div class="col-md-3">
                                  <input class="siswa_no" type="radio" name="jumlah_siswa" value="unlimited">
                                  Unlimited
                            </div>
                            </div>

                            <div class="form-group">
                            <label  class="col-md-5">Jumlah Soal</label>
                            <div class="col-md-4">
                              <div class="input-group">
                                <span class="input-group-addon">
                                  <input class="soal_yes" type="radio" name="jumlah_soal" value="yes">
                                </span>
                                <input disabled="" type="number" class="form-control soal_yes2" name="jumlah_soal2">
                              </div><!-- /input-group -->
                            </div>
                            <div class="col-md-3">
                                  <input class="soal_no" type="radio" name="jumlah_soal" value="unlimited">
                                  Unlimited
                            </div>
                            </div>

                            <div class="form-group">
                            <label  class="col-md-5">Iklan</label>
                            <div class="col-md-4">
                                  <input class="iklan_yes" type="radio" name="iklan" value="yes">
                                  Ya
                            </div>
                            <div class="col-md-3">
                                  <input class="iklan_no" type="radio" name="iklan" value="no">
                                  Tidak
                            </div>
                            </div>
                          
                          </div>
                        </div>
                      </div><!-- /.box -->
                      </div>
                      </div><!-- /.row -->
                      
                      <div class="box-footer">
                      <div class="pull-right">
                        <button type="reset" class="btn btn-primary">Reset</button>
                        <button type="submit" class="btn btn-warning">Simpan</button>
                      </div>
                      </div><!-- /.box-footer -->
                  </form>
                </div><!-- /.tab-pane -->
                <div class="tab-pane <?php echo $class = ($tab == 'administrasi') ? "active" : NULL ; ?>" id="Administrasi">
                  <!-- form start -->
                  <?php echo form_open_multipart('adminutama/update_administrasi', 'class="form-horizontal"'); ?>
                  <input type="text" name="id_akun" value="<?php echo $id_akun; ?>" hidden=""></input>
                  <div class="box-body">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="col-sm-5">Username</label>
                          <div class="col-sm-7">
                            <input required="" maxlength="20" value="<?php echo $username; ?>" name="username" type="text" class="form-control" placeholder="Username">
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
                <div class="tab-pane <?php echo $class = ($tab == 'template') ? "active" : NULL ; ?>" id="Template">
                  <!-- form start -->
                  <?php echo form_open_multipart('adminutama/update_template', 'class="form-horizontal"'); ?>
                    <input type="text" hidden="" name="nama_paket" class="nama_paket" value=""></input>
                    <div class="row">
                    <div class="col-md-6">
                      <div class="box-body">
                        <div class="form-group">
                          <label class="col-sm-4">No Template</label>
                          <div class="col-sm-8">
                            <select class="form-control pilih-template" name="id_template">
                              <option value="">Pilih Template</option>
                              <?php foreach ($template as $isi) {?>
                                <option value="<?php echo $isi['id_template']; ?>"><?php echo $isi['id_template']; ?></option>
                              <?php
                              } ?>
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-4">Nama Template</label>
                          <div class="col-sm-8">
                            <input name="nama_template" required="" class="form-control nama_template" value="" placeholder="Nama Template"></input>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-4">Deskripsi</label>
                          <div class="col-sm-8">
                            <textarea required="" name="deskripsi" class="deskripsi form-control" placeholder="Deskripsi"></textarea>
                          </div>
                        </div>
                      </div><!-- /.box-body -->

                      <button class="btn btn-primary tambah-template"><span class="fa fa-plus fa-2x"></span> <span style="font-size: 20px;"><b>Tambah Template</b></span></button>

                      </div><!-- /.col-md-6 -->
                      <div class="col-md-6">
                      <div class="box box-solid bg-yellow-gradient">
                        <div class="box-header">
                          <i class="fa fa-calendar"></i>
                          <h3 class="box-title">Gambar</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body no-padding">
                          <!--The calendar -->
                          <div id="calendar" style="width: 100%"></div>
                        </div><!-- /.box-body -->
                        <div class="box-footer text-black">
                          <div class="">
                          
                            <div class="form-group">
                            <label  class="col-md-5">Sebelum</label>
                              <img src="http://localhost/tugas_online/assets/image/background/no_image.jpg" class="template-sebelum" width="280">
                            </div>

                            <div class="form-group">
                            <label class="col-md-5">Ubah</label>

                            <div class="col-md-7">
                            <input value="" name="foto" type="file" class="file-loading gambar3">
                            </div>
                            </div>                          
                          </div>
                        </div>
                      </div><!-- /.box -->
                      </div>
                      </div><!-- /.row -->
                      
                      <div class="box-footer">
                      <div class="pull-right">
                        <button type="reset" class="btn btn-primary">Reset</button>
                        <button type="submit" name="delete" value="delete" class="btn btn-primary">Delete</button>
                        <!-- <a href="<?php echo site_url('adminutama/delete_gelar'); ?>" class="btn btn-primary">Delete</a> -->
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

<?php 
include 'modal_tambah_paket.php'; 
include 'modal_tambah_template.php';
?>

<script>
  function siswa_reset_tipe_paket() {
    // radio disabled true
    $('.template_yes').prop('disabled', true);
    $('.template_no').prop('disabled', true);
    $('.kelas_yes').prop('disabled', true);
    $('.kelas_no').prop('disabled', true);
    $('.siswa_yes').prop('disabled', true);
    $('.siswa_no').prop('disabled', true);
    $('.soal_yes').prop('disabled', true);
    $('.soal_no').prop('disabled', true);

    // radio checked false
    $('.template_yes').prop('checked', false);
    $('.template_no').prop('checked', false);
    $('.kelas_yes').prop('checked', false);
    $('.kelas_no').prop('checked', false);
    $('.siswa_yes').prop('checked', false);
    $('.siswa_no').prop('checked', false);
    $('.soal_yes').prop('checked', false);
    $('.soal_no').prop('checked', false);

    // input number disabled true
    $('.kelas_yes2').prop('disabled', true).val("");
    $('.siswa_yes2').prop('disabled', true).val("");
    $('.soal_yes2').prop('disabled', true).val("");
  }

  function guru_reset_tipe_paket() {
    // radio disabled true
    $('.template_yes').prop('disabled', false);
    $('.template_no').prop('disabled', false);
    $('.kelas_yes').prop('disabled', false);
    $('.kelas_no').prop('disabled', false);
    $('.siswa_yes').prop('disabled', false);
    $('.siswa_no').prop('disabled', false);
    $('.soal_yes').prop('disabled', false);
    $('.soal_no').prop('disabled', false);

    // input number disabled true
    $('.kelas_yes2').prop('disabled', true);
    $('.siswa_yes2').prop('disabled', true);
    $('.soal_yes2').prop('disabled', true);
  }

  // kelas yes di klik
  $('.kelas_yes').click(function(){
    $('.kelas_yes2').prop('disabled', false);
  });

  // siswa yes di klik
  $('.siswa_yes').click(function(){
    $('.siswa_yes2').prop('disabled', false);
  });

  // soal yes di klik
  $('.soal_yes').click(function(){
    $('.soal_yes2').prop('disabled', false);
  });

  // kelas no di klik
  $('.kelas_no').click(function(){
    $('.kelas_yes2').prop('disabled', true);
  });

  // siswa no di klik
  $('.siswa_no').click(function(){
    $('.siswa_yes2').prop('disabled', true);
  });

  // soal no di klik
  $('.soal_no').click(function(){
    $('.soal_yes2').prop('disabled', true);
  });

  $('.tipe-paket').change(function(){
    var isi;
    isi = $('.tipe-paket option:selected').val();
    //alert(isi);

    if (isi == 'siswa') {
      siswa_reset_tipe_paket();
    }else{
      guru_reset_tipe_paket();
    }
  });

  //Tipe Paket -> Tambah Paket
  $('.tipe-paket2').change(function(){
    var isi;
    isi = $('.tipe-paket2 option:selected').val();
    //alert(isi);

    if (isi == 'siswa') {
      // radio disabled true
      $('.template_yesx').prop('disabled', true);
      $('.template_nox').prop('disabled', true);
      $('.kelas_yesx').prop('disabled', true);
      $('.kelas_nox').prop('disabled', true);
      $('.siswa_yesx').prop('disabled', true);
      $('.siswa_nox').prop('disabled', true);
      $('.soal_yesx').prop('disabled', true);
      $('.soal_nox').prop('disabled', true);

      // radio checked false
      $('.template_yes').prop('checked', false);
      $('.template_no').prop('checked', false);
      $('.kelas_yes').prop('checked', false);
      $('.kelas_no').prop('checked', false);
      $('.siswa_yes').prop('checked', false);
      $('.siswa_no').prop('checked', false);
      $('.soal_yes').prop('checked', false);
      $('.soal_no').prop('checked', false);

      // input number disabled true
      $('.kelas_yes2x').prop('disabled', true);
      $('.siswa_yes2x').prop('disabled', true);
      $('.soal_yes2x').prop('disabled', true);
    }else{
      // radio disabled true
      $('.template_yesx').prop('disabled', false);
      $('.template_nox').prop('disabled', false);
      $('.kelas_yesx').prop('disabled', false);
      $('.kelas_nox').prop('disabled', false);
      $('.siswa_yesx').prop('disabled', false);
      $('.siswa_nox').prop('disabled', false);
      $('.soal_yesx').prop('disabled', false);
      $('.soal_nox').prop('disabled', false);

      // input number disabled true
      $('.kelas_yes2x').prop('disabled', true);
      $('.siswa_yes2x').prop('disabled', true);
      $('.soal_yes2x').prop('disabled', true);
    }
  });

  // ajax pilih paket
  $('.pilih-template').change(function(){
    

    var isi2;
    isi2 = $(".pilih-template option:selected").val();

    // jika pilih paket kosong, maka di reset
    if (isi2 == "") { 
      // harga dan tipe paket

      $('.nama_template').val("NULL");
      $('.deskripsi').text("NULL");
      $('.template-sebelum').attr('src', 'http://localhost/tugas_online/assets/image/background/no_image.jpg');
    }
    
    $.ajax({
      url : "<?php echo site_url('adminutama/ajaxtemplate'); ?>",
      type : 'POST',
      dataType : 'json',
      data : 'id_template='+isi2,
      success : function(data){
        
        $.each(data, function(i, datas){
          $('.nama_template').val(datas['nama_template']);
          $('.deskripsi').text(datas['deskripsi']);
          $('.template-sebelum').attr('src', datas['thumbnail']);
        })

      }
    });

  });
</script>