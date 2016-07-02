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
    <style type="text/css">
        /*img.bg {
            display: block;
            min-height: 100%;
            min-width: 1024px;
            width: 100%;
            height: auto;
            position: fixed;
            top: 0;
            left: 0;
        }*/

        body {
            background-image:url(<?php echo $soal['isi']; ?>);
            margin:0 auto;
        }

        .container{
            border-radius: 25px;
            margin-top: 30px;
            padding-bottom: 10px;
            background-color: #fff;
        }

        .page-header{
            border-bottom: 1px solid #5D656C;
        }

        .page-footer{
            border-top: 1px solid #5D656C;   
        }

        .biodata{
            margin-left: 10px;
        }

        .info{
            padding: 0px;
            width: 435px;
            height: 130px;
            /* border: 2px solid #000; */
        }

        .waktu-info {
            margin-right: 15px;
            padding-left: 5px;
            background-color: #EFEFEF;
            border-radius: 0px 25px 0px 0px;
            padding-right: 5px;
        }
    </style>
    </head>
    <body>

    	<div class='container'>
    			<div class="page-header">
    				<div class="row">
    					<div class="col-md-5 biodata">
    						<div class="row">
    							<div class="col-md-3">
    								NAMA
    							</div>
    							<div class="col-md-6">
    								: <?php echo "$nama"; ?>
    							</div>
    						</div><!-- 
                            <div class="row">
                                <div class="col-md-3">
                                    KELAS
                                </div>
                                <div class="col-md-6">
                                    : VII A
                                </div>
                            </div> -->
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
    								: <?php echo $soal['deskripsi_soal']; ?>
    							</div>
    						</div>
    					</div>
                        <div class="col-md-3 info">
                            <?php
                            if ($iklan == "yes") {
                                 echo $setting['ad_430_125']; 
                            }  
                            ?>
                        </div>
    					<div class="pull-right waktu-info">
    						<div class="text-red">Batas Waktu :</div>
                            <span class="batas"><?php echo $soal['berhenti'];?></span><br>
                            <div class="text-red">Sisa Waktu :</div>
                            <span class="waktu"></span><br>
    					</div>
    				</div>
    			</div>

                <?php 
                    $id_pil_ganda = array();
                 ?>
                <form action="<?php echo site_url('adminsiswa/jawab_tugas'); ?>" method="post">
                    <input hidden="" type="text" name="id_soal" value="<?php echo $soal['id_soal']; ?>"></input>
                   <?php foreach ($pil_ganda as $isi) {?>
                   <div class="row">
                     <div class="col-md-12">
                        <p>
                            <input hidden="" type="text" name="id_pil_ganda[]" value="<?php echo $isi['id_pil_ganda']; ?>"></input>
                            <?php echo $isi['soal']; ?>
                        </p>
                    </div>
                    <div class="col-md-6">
                        <p>
                            <input value="a" type="radio" name="<?php echo $isi['id_pil_ganda']; ?>"></input> a. <?php echo $isi['pilihan_a']; ?>	
                        </p>
                        <p>
                            <input value="b" type="radio" name="<?php echo $isi['id_pil_ganda']; ?>"></input> b. <?php echo $isi['pilihan_b']; ?>	
                        </p>
                    </div>
                    <div class="col-md-6">
                        <p>
                            <input value="c" type="radio" name="<?php echo $isi['id_pil_ganda']; ?>"></input> c. <?php echo $isi['pilihan_c']; ?>	
                        </p>
                        <p>
                            <input value="d" type="radio" name="<?php echo $isi['id_pil_ganda']; ?>"></input> d. <?php echo $isi['pilihan_d']; ?>	
                        </p>
                    </div>
                </div>
                <br>
                <?php
            } ?>
        
        <div class="page-footer">
            <div class="pull-left">
                <span><?php echo $soal['pesan']; ?></span>
            </div>  
            <div class="pull-right">
                <a href="<?php echo site_url('adminsiswa/tugas'); ?>" class="btn bg-red">Batal</a>
                <button type="reset" class="btn btn-default">Reset</button>
                <button type="submit" class="btn btn-primary">Selesai</button>    
            </div>
        </div>
        </form>
    	</div>
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
        <!-- Countdown -->
        <script src="<?php echo base_url() ?>assets/plugins/countdown/jquery.countdown.js"></script>
    	<!-- MyJS -->
    	<script src="<?php echo base_url('assets/myjs.js') ?>"></script>
    </body>
    </html>

    <script type="text/javascript">
        var batas = $(".batas").text();
        $('.waktu').countdown(batas, function(event){
         $(this).text(event.strftime('%H:%M:%S'));
        })
        .on('finish.countdown', function(event){
         $(this).text(event.strftime('%H:%M:%S'));
         alert("Waktu telah habis");
            window.location = "<?php echo site_url('adminsiswa/tugas'); ?>";
        });
    </script>