<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Kerjakan Tugas | Admin Page</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.5 -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/bootstrap/css/bootstrap.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/font-awesome/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/ionicons/css/ionicons.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datatables/dataTables.bootstrap.css">
	<!-- Date Picker -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datepicker/datepicker3.css">
	<!-- Select2 -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/select2/select2.min.css"><!-- JConfirmation -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/jConfirmAction-master/jconfirmaction.css">
	<!-- FileInput -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/fileinput/css/fileinput.min.css">
	<!-- ColorPicker -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/colorpicker/bootstrap-colorpicker.min.css">
	<!-- DateTimePicker -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/bootstrap-datetimepicker-master/build/css/bootstrap-datetimepicker.css">
	<!-- Prettify -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/prettify/prettify.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/mycss.css">
    
    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url() ?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
    	<div class='container'>

    		<section id="wizard">
    			<div class="page-header">
    				<div class="row">
    					<div class="col-md-6">
    						<div class="row">
    							<div class="col-md-3">
    								NAMA
    							</div>
    							<div class="col-md-6">
    								: <?php echo "$nama"; ?>
    							</div>
    						</div>
    						<div class="row">
    							<div class="col-md-3">
    								KELAS
    							</div>
    							<div class="col-md-6">
    								: VII A
    							</div>
    						</div>
    						<div class="row">
    							<div class="col-md-3">
    								JUDUL
    							</div>
    							<div class="col-md-6">
    								: <?php echo $soal['judul']; ?>
    							</div>
    						</div>
    						<div class="row">
    							<div class="col-md-3">
    								DESKRIPSI
    							</div>
    							<div class="col-md-6">
    								: <?php echo $soal['deskripsi']; ?>
    							</div>
    						</div>
    					</div>
    					<div class="col-md-6">
    						<span class="batas"><?php echo $soal['berhenti']; ?></span><br>
    					</div>
    				</div>
    			</div>
    			<div id="rootwizard">
    				<div class="navbar">
    					<div class="navbar-inner">
    						<div class="container">
    							<ul>
    								<li><a href="#tab1" data-toggle="tab">First</a></li>
    								<li><a href="#tab2" data-toggle="tab">Second</a></li>
    								<li><a href="#tab3" data-toggle="tab">Third</a></li>
    								<li><a href="#tab4" data-toggle="tab">Fourth</a></li>
    								<li><a href="#tab5" data-toggle="tab">Fifth</a></li>
    								<li><a href="#tab6" data-toggle="tab">Sixth</a></li>
    								<li><a href="#tab7" data-toggle="tab">Seventh</a></li>
    							</ul>
    						</div>
    					</div>
    				</div>
    				<div id="bar" class="progress">
    					<div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
    				</div>
    				<form action="#" method="post">
    				<div class="tab-content">
    					<div class="tab-pane" id="tab1">
    					<?php foreach ($pil_ganda as $isi) {?>
    						<div class="row">
    							<div class="col-md-12">
    								<p>
    								<?php echo $isi['soal']; ?>
    								</p>
    							</div>
    							<div class="col-md-6">
    								<p>
    								<input type="radio" name="jawaban[]"></input> a. <?php echo $isi['pilihan_a']; ?>	
    								</p>
    								<p>
    								<input type="radio" name="jawaban[]"></input> b. <?php echo $isi['pilihan_b']; ?>	
    								</p>
    							</div>
    							<div class="col-md-6">
    								<p>
    								<input type="radio" name="jawaban[]"></input> c. <?php echo $isi['pilihan_c']; ?>	
    								</p>
    								<p>
    								<input type="radio" name="jawaban[]"></input> d. <?php echo $isi['pilihan_d']; ?>	
    								</p>
    							</div>
    						</div>
    						<br>
    					<?php
    					} ?>

    					</div>
    					<div class="tab-pane" id="tab2">
    						2
    					</div>
    					<div class="tab-pane" id="tab3">
    						3
    					</div>
    					<div class="tab-pane" id="tab4">
    						4
    					</div>
    					<div class="tab-pane" id="tab5">
    						5
    					</div>
    					<div class="tab-pane" id="tab6">
    						6
    					</div>
    					<div class="tab-pane" id="tab7">
    						7
    					</div>
    					<ul class="pager wizard">
    						<li class="previous first" style="display:none;"><a href="#">First</a></li>
    						<li class="previous"><a href="#">Previous</a></li>
    						<li class="next last" style="display:none;"><a href="#">Last</a></li>
    						<li class="next"><a href="#">Next</a></li>
    					</ul>
    				</div>
    				</form>
    			</div>
    		</section>
    	</div>

    	<script>
    		$(document).ready(function() {
    			$('#rootwizard').bootstrapWizard({onTabShow: function(tab, navigation, index) {
    				var $total = navigation.find('li').length;
    				var $current = index+1;
    				var $percent = ($current/$total) * 100;
    				$('#rootwizard .progress-bar').css({width:$percent+'%'});
    			}});
    			window.prettyPrint && prettyPrint()
    		});
    	</script>
    	<!-- jQuery UI -->
    	<script src="<?php echo base_url() ?>assets/plugins/jQueryUI/jquery-ui.min.js"></script>
    	<!-- Bootstrap 3.3.5 -->
    	<script src="<?php echo base_url() ?>assets/bootstrap/js/bootstrap.js"></script>
    	<!-- Select2 -->
    	<script src="<?php echo base_url() ?>assets/plugins/select2/select2.full.min.js"></script>
    	<!-- SlimScroll -->
    	<script src="<?php echo base_url() ?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    	<!-- FastClick -->
    	<script src="<?php echo base_url() ?>assets/plugins/fastclick/fastclick.min.js"></script>
    	<!-- AdminLTE App -->
    	<script src="<?php echo base_url() ?>assets/dist/js/app.min.js"></script>
    	<!-- AdminLTE for demo purposes -->
    	<script src="<?php echo base_url() ?>assets/dist/js/demo.js"></script>
    	<!-- DataTables -->
    	<script src="<?php echo base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
    	<script src="<?php echo base_url() ?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
    	<!-- datepicker -->
    	<script src="<?php echo base_url() ?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
    	<!-- ChartJS 1.0.1 -->
    	<script src="<?php echo base_url() ?>assets/plugins/chartjs/Chart.min.js"></script>    
    	<!-- JConfirmation -->
    	<script src="<?php echo base_url() ?>assets/plugins/jConfirmAction-master/jconfirmaction.jquery.js"></script>
    	<!-- FileInput -->
    	<script src="<?php echo base_url() ?>assets/plugins/fileinput/js/fileinput.min.js"></script>
    	<!-- ColorPicker -->
    	<script src="<?php echo base_url() ?>assets/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
    	<!-- Moment -->
    	<script src="<?php echo base_url() ?>assets/plugins/moment/moment.js"></script>
    	<!-- DateTimePicker -->
    	<script src="<?php echo base_url() ?>assets/plugins/bootstrap-datetimepicker-master/src/js/bootstrap-datetimepicker.js"></script>
    	<!-- Bootstrap Wizard -->
    	<script src="<?php echo base_url() ?>assets/plugins/wizard/jquery.bootstrap.wizard.js"></script>
    	<!-- Pretify -->
    	<script src="<?php echo base_url() ?>assets/plugins/prettify/prettify.js"></script>
    	<!-- MyJS -->
    	<script src="<?php echo base_url('assets/myjs.js') ?>"></script>
    </body>
    </html>