<!-- Tambah Template -->
<div class="modal fade" id="tambah-template" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">
  <div class="modal-dialog">
  <?php echo form_open_multipart('adminutama/insert_template', 'class="form-horizontal"'); ?>
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Tambah Template</h4>
      </div>
      <div class="modal-body">
                          
                    <div class="row">
                      <div class="box-body">
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
                        <div class="box box-solid bg-yellow-gradient">
                          <div class="box-header">
                            <i class="fa fa-calendar"></i>
                            <h3 class="box-title">Background minimal 1024px</h3>
                          </div><!-- /.box-header -->
                          <div class="box-body no-padding">
                            <!--The calendar -->
                            <div id="calendar" style="width: 100%"></div>
                          </div><!-- /.box-body -->
                          <div class="box-footer text-black">
                          <div class="form-group">
                          <label class="col-md-5">Background</label>

                          <div class="col-md-7">
                          <input required="" value="" name="foto" type="file" class="file-loading gambar3">
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
<!-- Tambah Template End -->