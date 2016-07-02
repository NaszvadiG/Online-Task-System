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
        <a class="btn bg-yellow" href="<?php echo site_url('adminguru/tugas'); ?>">
          <i class="fa fa-google-wallet"></i> All
        </a>  
        <a class="btn bg-blue" href="<?php echo site_url('adminguru/published'); ?>">
          <i class="fa fa-ils"></i> Published
        </a>   
        <a class="btn bg-red" href="<?php echo site_url('adminguru/unpublished'); ?>">
          <i class="fa fa-columns"></i> Un-Published
        </a>    
      </div><!-- /.box-header -->
      <!-- form start -->
      <form method="POST" class="form-horizontal" action="<?php echo site_url('adminguru/insert_tugas') ?>">
        <div class="box-body">
        <div class="row">
          <div class="col-md-6">
          <div class="form-group">
            <label class="col-sm-2">Judul</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" placeholder="Judul" name="judul">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2">Kelas</label>

            <div class="col-sm-8">
                <select class="form-control select2" multiple="multiple" data-placeholder="Pilih Kelas" name="id_kelas[]">
                  <?php 
                  foreach ($kelas as $isi) {?>
                  <option value="<?php echo $isi['id_kelas']; ?>"><?php echo $isi['kelas']; ?></option>
                  <?php
                }
                ?>
              </select>
          </div>
              <button type="button" class="btn btn-primary col-sm-2 tambah">Buat Kelas</button>
          </div>
          <div class="form-group">
            <label class="col-sm-2">Batas</label>
            <div class="col-sm-10">
            <div class='input-group date' id='tanggal'>
                <input name="berhenti" type='text' class="form-control" />
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
            </div>
          </div>
          </div><!-- /.col-md-6 -->
          <div class="col-md-6">
          <div class="form-group">
            <label class="col-sm-2">Deskripsi</label>
            <div class="col-sm-10">
              <textarea class="form-control" name="deskripsi"></textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2">Pesan</label>
            <div class="col-sm-10">
              <textarea class="form-control" name="pesan"></textarea>
            </div>
          </div>
          </div><!-- /.col-md-6 -->
          </div><!-- /.row -->
          <br>           
              <div class="box">
              <div class="box-header">
                <i class="fa fa-calendar"></i>
                <h3 class="box-title">Pilih Template</h3>
              </div>
              <div class="box-body clearfix">
                <?php 
                if ($fitur['template_soal'] != 'yes') {?>
                <img class="transparant" src="<?php echo base_url('assets/image/home/unlock-paket.jpg'); ?>" alt="">
                <?php
              }
              ?>
              <div class="scroll col-sm-offset-1">
              <div class="">

                <select name="id_template" class="image-picker show-html">
                    <?php foreach ($template as $isi) {?>
                    <option readonly data-img-src="<?php echo $isi['thumbnail']; ?>" value="<?php echo $isi['id_template']; ?>"></option>
                    <?php
                  } ?>
                </select>
                </div>
              </div>
              </div>
            
          </div>

          <div class="row baris-tambah-soal">

            <div class="col-sm-2">
            <div class="btn-group">
              <button type="button" class="btn btn-primary tambah-soal" jumlah-soal='0'><i class="fa fa-plus"></i></button>
              <button type="button" class="btn btn-danger kurang-soal" jumlah-soal='0'><i class="fa fa-minus"></i></button>
            </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label class="col-sm-4">Jumlah Soal</label>
                <div class="col-sm-3">
                  <input class="form-control jumlah-soal" readonly="" type="text" name="jumlah-soal"></input>
                </div>
              </div>
            </div>
          </div>
        </div><!-- /.box-body -->
        <div class="box-footer">
          <button type="submit" class="btn btn-default">Reset</button>
          <div class="pull-right">
<!--           <input type="submit" class="btn btn-primary" value="Save" name="submit"></input>
          <input type="submit" class="btn btn-success" value="Publish" name="submit"></input> -->
            
            <button name="submit" value="unpublished" type="submit" class="btn btn-primary submit">Save</button>
            <button name="submit" value="published" type="submit" class="btn btn-success submit">Save & Publish</button>
          </div>
        </div><!-- /.box-footer -->
      </form>
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
    
    <?php echo form_open_multipart('adminguru/insertkelas/2'); ?>
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
          <div class="form-group">
            <label for="kelas">Masukkan Siswa</label>
            <select class="form-control i_username" multiple="multiple" data-placeholder="Masukkan username siswa" style="width: 100%;">
              <?php foreach ($siswa as $isi) {?>
              <option value="<?php echo $isi['id_akun']; ?>"><?php echo $isi['username']; ?></option>
              <?php
            } ?>
          </select>
        </div><!-- /.form-group -->

        <p class="text-purple">atau sebarkan</p>
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

<!-- Modal Alert Transparant -->
<div class="modal fade modal-danger" id="alert" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h3 class="modal-title"><i class="fa fa-exclamation-triangle fa-3x"></i> Peringatan</h3>

    </div>
      <div class="modal-body">
        <p class="text-center h4">Untuk Mengaktifkan Fitur Ini, silahkan membeli paket yang mempunyai fitur ini. Untuk membeli paket, klik link di bawah ini.</p>
        <p class="text-center"><i class="fa fa-hand-o-right fa-2x"></i> <a href="<?php echo site_url('adminguru/setting/paket'); ?>" class="btn btn-outline bg-green">Beli Paket</a> <i class="fa fa-hand-o-left fa-2x"></i></p>

        <!-- <p class="text-center"><i class="fa fa-hand-o-right fa-2x"></i> <a href="<?php echo site_url('adminguru/harga_paket'); ?>" class="btn btn-outline bg-green">Harga Paket</a> <i class="fa fa-hand-o-left fa-2x"></i></p> -->
      </div><!-- /.box-body -->
  <div class="modal-footer">
    <button type="button" class="btn btn-outline btn-default pull-left" data-dismiss="modal">Tutup</button>
  </div>
  </form>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div>
<!-- Modal Kelas End -->