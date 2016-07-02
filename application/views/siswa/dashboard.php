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
  <?php echo $this->session->flashdata('pesan2'); ?>
  <!-- Small boxes (Stat box) -->
  <div class="row">
    <div class="col-lg-3 col-xs-6 col-md-offset-2">
      <!-- small box -->
      <div class="small-box bg-aqua">
        <div class="inner">
          <h3><?php echo "$jumlah_kelas"; ?></h3>
          <p>Jumlah Kelas</p>
        </div>
        <div class="icon">
          <i class="ion ion-bag"></i>
        </div>
        <a href="adminsiswa/kelas" class="small-box-footer">Lihat info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-yellow">
        <div class="inner">
          <h3><?php echo "$jumlah_soal"; ?></h3>
          <p>Jumlah Soal</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="adminsiswa/tugas_sudah_dikerjakan" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div><!-- ./col -->

   <!--  <div class="col-lg-3 col-xs-6">
      <div class="small-box bg-red">
        <div class="inner">
          <h3><?php echo $rata_rata; ?></h3>
          <p>Rata-rata Nilai</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
        <a href="adminsiswa/nilai" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>-->

    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box">
        <div class="text-center">
          <img width="100px" height="100px" src="<?php echo base_url('assets/image/gelar/' . $gelar['logo'] . ''); ?>">
        </div>
        
        <a href="#" class="small-box-footer bg-green">Gelar <?php echo $gelar['nama_gelar']; ?></a>
      </div>
    </div><!-- ./col -->
  </div><!-- /.row -->

<!--
  <div class="row">
    <div class="col-md-12">
      
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Perbandingan Rata-rata Nilai per-Bulan tahun <?php echo $tahun2 ;?></h3>
        </div>
        <div class="box-body">
          <div class="chart">
            <canvas id="areaChart" style="height:250px"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div> -->


  </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<script type="text/javascript">
  $(document).ready(function(){

    $(".tahun").datepicker({
      format: 'yyyy',
      minViewMode: "years",
      autoclose: true,
    });

    //--------------
    //- AREA CHART -
    //--------------

    // Get context with jQuery - using jQuery's .get() method.
    var areaChartCanvas = $("#areaChart").get(0).getContext("2d");
    // This will get the first returned node in the jQuery collection.
    var areaChart = new Chart(areaChartCanvas);

    var areaChartData = {
      labels:           [
          <?php 
            foreach ($hasil_rata_per_bulan2 as $isi3) {
              echo "'".konversiBulan($isi3['bulan'])."',";
            } 
          ?>
          ],
      datasets: [
        {
          label: "Tahun 2",
          fillColor: "rgba(60,141,188,0.9)",
          strokeColor: "rgba(60,141,188,0.8)",
          pointColor: "#3b8bba",
          pointStrokeColor: "rgba(60,141,188,1)",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(60,141,188,1)",
          data: [<?php foreach ($hasil_rata_per_bulan2 as $isi4) {echo $isi4['rata'].",";} ?>]
        }
      ]
    };

    var areaChartOptions = {
      //Boolean - If we should show the scale at all
      showScale: true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines: true,
      //String - Colour of the grid lines
      scaleGridLineColor: "rgba(0,0,0,.05)",
      //Number - Width of the grid lines
      scaleGridLineWidth: 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines: true,
      //Boolean - Whether the line is curved between points
      bezierCurve: true,
      //Number - Tension of the bezier curve between points
      bezierCurveTension: 0.3,
      //Boolean - Whether to show a dot for each point
      pointDot: true,
      //Number - Radius of each point dot in pixels
      pointDotRadius: 4,
      //Number - Pixel width of point dot stroke
      pointDotStrokeWidth: 1,
      //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
      pointHitDetectionRadius: 20,
      //Boolean - Whether to show a stroke for datasets
      datasetStroke: true,
      //Number - Pixel width of dataset stroke
      datasetStrokeWidth: 2,
      //Boolean - Whether to fill the dataset with a color
      datasetFill: true,
      //String - A legend template
      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
      //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio: true,
      //Boolean - whether to make the chart responsive to window resizing
      responsive: true
    };

    //Create the line chart
    areaChart.Line(areaChartData, areaChartOptions);
  });
</script>