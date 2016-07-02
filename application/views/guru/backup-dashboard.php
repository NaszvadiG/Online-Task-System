        <div class="row">
          <div class="col-md-12">
            <div class="box-body">
            <form action="<?php site_url('adminsiswa/dashboard') ?>" method="POST">
              <div class="form-group">
                <label class="col-md-2">Pilih range tahun :</label>
                <div class="col-md-1">
                  <input value="<?php echo "$tahun1"; ?>" name="tahun1" type="text" id="tahun1" class="form-control tahun" placeholder="Tahun 1"></input>
                </div>
                <div class="col-md-1">
                  <input value="<?php echo "$tahun2"; ?>" name="tahun2" type="text" id="tahun2" class="form-control tahun" placeholder="Tahun 2"></input>
                </div>
                <div class="col-md-1">
                  <button type="submit" class="btn btn-success">Tampilkan</button>
                </div>
              </div>
            </form>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <!-- AREA CHART -->
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Perbandingan Rata-rata Nilai per-Bulan tahun <?php echo $tahun1 ;?> dan <?php echo $tahun2 ;?></h3>
              </div>
              <div class="box-body">
                <div class="chart">
                  <canvas id="areaChart" style="height:250px"></canvas>
                </div>
              </div><!-- /.box-body -->
            </div><!-- /.box -->
          </div><!-- /.col-md-6 -->
        </div><!-- /.row -->