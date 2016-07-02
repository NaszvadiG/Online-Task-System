<!-- Tambah Paket -->
<div class="modal fade" id="tambah-paket" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">
  <div class="modal-dialog">
  <?php echo form_open('adminutama/update_insert_paket/insert', 'class="form-horizontal"'); ?>
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Tambah Paket</h4>
      </div>
      <div class="modal-body">
                          
                    <div class="row">
                      <div class="box-body">
                        <div class="form-group">
                          <label class="col-sm-4">Nama Paket</label>
                          <div class="col-sm-8">
                            <input type="text" name="nama_paket" class="form-control"></input>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-4">Harga Paket</label>
                          <div class="col-sm-8">
                            <input value="" name="harga_paket" type="number" class="form-control" placeholder="Harga Paket">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-4">Tipe Paket</label>
                          <div class="col-sm-8">
                            <select name="tipe_paket" class="form-control tipe-paket2">
                              <option class="tipe_paket_pilih">Pilih Tipe</option>
                              <option class="tipe_paket_guru" value="guru">Guru</option>
                              <option class="tipe_paket_siswa" value="siswa">Siswa</option>
                            </select>
                          </div>
                        </div>
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
                              <label  class="col-md-6">Template Soal</label>
                              <div class="col-md-3">
                                    <input class="template_yesx" type="radio" name="template_soal" value="yes">
                                    Ya
                              </div>
                              <div class="col-md-3">
                                    <input class="template_nox" type="radio" name="template_soal" value="no">
                                    Tidak
                              </div>
                              </div>

                              <div class="form-group">
                              <label  class="col-md-6">Jumlah Kelas</label>
                              <div class="col-md-3">
                                <div class="input-group">
                                  <span class="input-group-addon">
                                    <input class="kelas_yesx" type="radio" name="jumlah_kelas" value="yes">
                                  </span>
                                  <input disabled="" type="number" class="form-control kelas_yes2x" name="jumlah_kelas2">
                                </div><!-- /input-group -->
                              </div>
                              <div class="col-md-3">
                                    <input class="kelas_nox" type="radio" name="jumlah_kelas" value="unlimited">
                                    Unlimited
                              </div>
                              </div>

                              <div class="form-group">
                              <label  class="col-md-6">Jumlah Siswa</label>
                              <div class="col-md-3">
                                <div class="input-group">
                                  <span class="input-group-addon">
                                    <input class="siswa_yesx" type="radio" name="jumlah_siswa" value="yes">
                                  </span>
                                  <input disabled="" type="number" class="form-control siswa_yes2x" name="jumlah_siswa2">
                                </div><!-- /input-group -->
                              </div>
                              <div class="col-md-3">
                                    <input class="siswa_nox" type="radio" name="jumlah_siswa" value="unlimited">
                                    Unlimited
                              </div>
                              </div>

                              <div class="form-group">
                              <label  class="col-md-6">Jumlah Soal</label>
                              <div class="col-md-3">
                                <div class="input-group">
                                  <span class="input-group-addon">
                                    <input class="soal_yesx" type="radio" name="jumlah_soal" value="yes">
                                  </span>
                                  <input disabled="" type="number" class="form-control soal_yes2x" name="jumlah_soal2">
                                </div><!-- /input-group -->
                              </div>
                              <div class="col-md-3">
                                    <input class="soal_nox" type="radio" name="jumlah_soal" value="unlimited">
                                    Unlimited
                              </div>
                              </div>

                              <div class="form-group">
                              <label  class="col-md-6">Iklan</label>
                              <div class="col-md-3">
                                    <input class="iklan_yesx" type="radio" name="iklan" value="yes">
                                    Ya
                              </div>
                              <div class="col-md-3">
                                    <input class="iklan_nox" type="radio" name="iklan" value="no">
                                    Tidak
                              </div>
                              </div>
                            
                            </div>
                          </div>
                        </div><!-- /.box -->
                      </div><!-- /.box-body -->
                      </div><!-- /.row -->
                      
                      
                      <div class="pull-right">

                      </div>
                      
                  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <button type="reset" class="btn btn-primary">Reset</button>
        <button type="submit" class="btn btn-warning">Simpan</button>
      </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->

</div>
<!-- Tambah Paket End -->