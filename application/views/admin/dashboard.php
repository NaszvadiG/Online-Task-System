<script type="text/javascript">
  $(document).ready(function(){
    //-------------
        //- PIE CHART - BROWSER
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        var pieChartCanvas = $("#browserChart").get(0).getContext("2d");
        var pieChart = new Chart(pieChartCanvas);
        var PieData = [
        <?php 
          $warna = array("#f56954", "#4F98C2","#f39c12", "#00a65a", "#3c8dbc");        
          $no_warna = 0;
          foreach ($browser as $isi) {?>
          {
            value: <?php echo $isi['total']; ?>,
            color: "<?php echo $warna[$no_warna]; ?>",
            highlight: "<?php echo $warna[$no_warna]; ?>",
            label: "<?php echo $isi['browser']; ?>"
          },
        <?php
          $no_warna++;
          }
         ?>
        ];
        var pieOptions = {
          //Boolean - Whether we should show a stroke on each segment
          segmentShowStroke: true,
          //String - The colour of each segment stroke
          segmentStrokeColor: "#fff",
          //Number - The width of each segment stroke
          segmentStrokeWidth: 1,
          //Number - The percentage of the chart that we cut out of the middle
          percentageInnerCutout: 50, // This is 0 for Pie charts
          //Number - Amount of animation steps
          animationSteps: 100,
          //String - Animation easing effect
          animationEasing: "easeOutBounce",
          //Boolean - Whether we animate the rotation of the Doughnut
          animateRotate: true,
          //Boolean - Whether we animate scaling the Doughnut from the centre
          animateScale: false,
          //Boolean - whether to make the chart responsive to window resizing
          responsive: true,
          // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
          maintainAspectRatio: false,
          //String - A legend template
          legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>",
          //String - A tooltip template
          tooltipTemplate: "<%=value %> <%=label%> users"
        };
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        pieChart.Doughnut(PieData, pieOptions);
        //-----------------
        //- END PIE CHART -
        //-----------------
        
        //-------------
        //- PIE CHART - BROWSER
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        var pieChartCanvas = $("#osChart").get(0).getContext("2d");
        var pieChart = new Chart(pieChartCanvas);
        var PieData = [
        <?php        
          $no_warna = 0;
          foreach ($os as $isi) {?>
          {
            value: <?php echo $isi['total']; ?>,
            color: "<?php echo $warna[$no_warna]; ?>",
            highlight: "<?php echo $warna[$no_warna]; ?>",
            label: "<?php echo $isi['os']; ?>"
          },
        <?php
          $no_warna++;
          }
         ?>
        ];
        var pieOptions = {
          //Boolean - Whether we should show a stroke on each segment
          segmentShowStroke: true,
          //String - The colour of each segment stroke
          segmentStrokeColor: "#fff",
          //Number - The width of each segment stroke
          segmentStrokeWidth: 1,
          //Number - The percentage of the chart that we cut out of the middle
          percentageInnerCutout: 50, // This is 0 for Pie charts
          //Number - Amount of animation steps
          animationSteps: 100,
          //String - Animation easing effect
          animationEasing: "easeOutBounce",
          //Boolean - Whether we animate the rotation of the Doughnut
          animateRotate: true,
          //Boolean - Whether we animate scaling the Doughnut from the centre
          animateScale: false,
          //Boolean - whether to make the chart responsive to window resizing
          responsive: true,
          // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
          maintainAspectRatio: false,
          //String - A legend template
          legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>",
          //String - A tooltip template
          tooltipTemplate: "<%=value %> <%=label%> users"
        };
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        pieChart.Doughnut(PieData, pieOptions);
        //-----------------
        //- END PIE CHART -
        //-----------------

        //-------------
        //- PIE CHART - BROWSER
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        var pieChartCanvas = $("#memberChart").get(0).getContext("2d");
        var pieChart = new Chart(pieChartCanvas);
        var PieData = [
        <?php        
          $no_warna = 0;
          foreach ($member as $isi) {?>
          {
            value: <?php echo $isi['total']; ?>,
            color: "<?php echo $warna[$no_warna]; ?>",
            highlight: "<?php echo $warna[$no_warna]; ?>",
            label: "<?php echo $isi['jenis']; ?>"
          },
        <?php
          $no_warna++;
          }
         ?>
        ];
        var pieOptions = {
          //Boolean - Whether we should show a stroke on each segment
          segmentShowStroke: true,
          //String - The colour of each segment stroke
          segmentStrokeColor: "#fff",
          //Number - The width of each segment stroke
          segmentStrokeWidth: 1,
          //Number - The percentage of the chart that we cut out of the middle
          percentageInnerCutout: 50, // This is 0 for Pie charts
          //Number - Amount of animation steps
          animationSteps: 100,
          //String - Animation easing effect
          animationEasing: "easeOutBounce",
          //Boolean - Whether we animate the rotation of the Doughnut
          animateRotate: true,
          //Boolean - Whether we animate scaling the Doughnut from the centre
          animateScale: false,
          //Boolean - whether to make the chart responsive to window resizing
          responsive: true,
          // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
          maintainAspectRatio: false,
          //String - A legend template
          legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>",
          //String - A tooltip template
          tooltipTemplate: "<%=value %> <%=label%> users"
        };
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        pieChart.Doughnut(PieData, pieOptions);
        //-----------------
        //- END PIE CHART -
        //-----------------

        //--------------
        //- AREA CHART -
        //--------------

        // Get context with jQuery - using jQuery's .get() method.
        var areaChartCanvas = $("#areaChart").get(0).getContext("2d");
        // This will get the first returned node in the jQuery collection.
        var areaChart = new Chart(areaChartCanvas);

        var areaChartData = {
          labels: 
          [
          <?php 
            foreach ($visitor as $isi3) {
              echo "'".konversiBulan($isi3['bulan'])."',";
            } 
          ?>
          ],
          datasets: [
            {
              label: "Tahun 2016",
              fillColor: "rgba(60,141,188,0.9)",
              strokeColor: "rgba(60,141,188,0.8)",
              pointColor: "#3b8bba",
              pointStrokeColor: "rgba(60,141,188,1)",
              pointHighlightFill: "#fff",
              pointHighlightStroke: "rgba(60,141,188,1)",
              data: [<?php foreach ($visitor as $isi4) {echo $isi4['total'].",";} ?>]
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
  <!-- Small boxes (Stat box) -->
  <div class="col-md-12">
    <h1 class="text-center">Selamat Datang Admin</h1>
  </div>
  <div class="row">
    <div class="col-lg-4 col-xs-6">
    <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="box-title">Browser Usage</h3>
        <div class="box-tools pull-right">
          <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
      </div><!-- /.box-header -->
      <div class="box-body">
        <div class="row">
          <div class="col-md-8">
            <div class="chart-responsive">
              <canvas id="browserChart" height="150"></canvas>
            </div><!-- ./chart-responsive -->
          </div><!-- /.col -->
          <div class="col-md-4">
            <ul class="chart-legend clearfix">
            <?php 
            $no_warna = 0;
            foreach ($browser as $isi2) {
            ?>
              <li><i class="fa fa-circle-o" style="color: <?php echo $warna[$no_warna]; ?>"></i> <?php echo $isi2['browser']; ?></li>
            <?php
            $no_warna++;
            } 
            ?>
            </ul>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.box-body -->
    </div><!-- /.box -->
    </div><!-- ./col -->
    <div class="col-lg-4 col-xs-6">
    <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="box-title">OS Usage</h3>
        <div class="box-tools pull-right">
          <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
      </div><!-- /.box-header -->
      <div class="box-body">
        <div class="row">
          <div class="col-md-7">
            <div class="chart-responsive">
              <canvas id="osChart" height="150"></canvas>
            </div><!-- ./chart-responsive -->
          </div><!-- /.col -->
          <div class="col-md-5">
            <ul class="chart-legend clearfix">
            <?php 
            $no_warna = 0;
            foreach ($os as $isi2) {
            ?>
              <li><i class="fa fa-circle-o" style="color: <?php echo $warna[$no_warna]; ?>"></i> <?php echo $isi2['os']; ?></li>
            <?php
            $no_warna++;
            } 
            ?>
            </ul>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.box-body -->
    </div><!-- /.box -->
    </div><!-- ./col -->
    <div class="col-lg-4 col-xs-6">
    <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="box-title">Jumlah Member</h3>
        <div class="box-tools pull-right">
          <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
      </div><!-- /.box-header -->
      <div class="box-body">
        <div class="row">
          <div class="col-md-7">
            <div class="chart-responsive">
              <canvas id="memberChart" height="150"></canvas>
            </div><!-- ./chart-responsive -->
          </div><!-- /.col -->
          <div class="col-md-5">
            <ul class="chart-legend clearfix">
            <?php 
            $no_warna = 0;
            foreach ($member as $isi) {
            ?>
              <li><i class="fa fa-circle-o" style="color: <?php echo $warna[$no_warna]; ?>"></i> <?php echo $isi['jenis']; ?></li>
            <?php
            $no_warna++;
            } 
            ?>
            </ul>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.box-body -->
    </div><!-- /.box -->
    </div><!-- ./col -->
  </div><!-- /.row -->
  <div class="row">
    <div class="col-md-12">
      <!-- AREA CHART -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Visitor</h3>
        </div>
        <div class="box-body">
          <div class="chart">
            <canvas id="areaChart" style="height:250px"></canvas>
          </div>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!-- /.col-md-6 -->
  </div><!-- /.row -->


  </section><!-- /.content -->
</div><!-- /.content-wrapper -->