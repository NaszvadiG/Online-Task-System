<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $tema['nama_web']; ?> | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/iCheck/square/blue.css">
  <!-- jQuery 2.1.4 -->
  <script src="<?php echo base_url() ?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
  <link rel="shortcut icon" type="image/png" href="<?php echo base_url('assets/image/'.$tema['favicon'].''); ?>"/>


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
      </head>
      <body class="hold-transition login-page tema">
        <div class="col-md-6">
        <div class="">
          <div style="margin-left: 60px; margin-top: 50px;">
            <!-- Start WOWSlider.com BODY section -->
            <div id="wowslider-container1">
            <div class="ws_images"><ul>
                <li><img src="<?php echo base_url(); ?>assets/plugins/wow/data1/images/mg_3503.jpg" alt="Kerjakan tugas secara menyenangkan!" title="Kerjakan tugas secara menyenangkan!" id="wows1_0"/>tampilan sederhana</li>
                <li><img src="<?php echo base_url(); ?>assets/plugins/wow/data1/images/middleschoolboystudyingoutsidedpc_41578256.jpg" alt="Sekolah jadi asik dan menyenangkan" title="Sekolah jadi asik dan menyenangkan" id="wows1_1"/>coba dan buktikan</li>
                <li><img src="<?php echo base_url(); ?>assets/plugins/wow/data1/images/studentstudying.jpg" alt="Kerjakan semua di satu tempat" title="Kerjakan semua di satu tempat" id="wows1_2"/>efisien waktu dan biaya</li>
                <li><img src="<?php echo base_url(); ?>assets/plugins/wow/data1/images/studentwriting.jpg" alt="Banyak pilihan kelas" title="Banyak pilihan kelas" id="wows1_3"/>cari kelas favoritmu</li>
                <li><img src="<?php echo base_url(); ?>assets/plugins/wow/data1/images/studying.jpg" alt="Guru dari banyak sekolah" title="Guru dari banyak sekolah" id="wows1_4"/>professional dan hebat</li>
                <li><a href="http://wowslider.com"><img src="<?php echo base_url(); ?>assets/plugins/wow/data1/images/8726823600_46f28ec28d_b.jpg" alt="slider" title="Tersedia banyak pilihan soal" id="wows1_5"/></a>pilih soal sesuka hatimu</li>
                <li><img src="<?php echo base_url(); ?>assets/plugins/wow/data1/images/girl.jpg" alt="Tunggu apa lagi dan buktikan" title="Tunggu apa lagi dan buktikan" id="wows1_6"/>share ke taman-temanmu</li>
              </ul></div>
              <div class="ws_bullets"><div>
                <a href="#" title="Kerjakan tugas secara menyenangkan!"><span><img src="<?php echo base_url(); ?>assets/plugins/wow/data1/tooltips/mg_3503.jpg" alt="Kerjakan tugas secara menyenangkan!"/>1</span></a>
                <a href="#" title="Sekolah jadi asik dan menyenangkan"><span><img src="<?php echo base_url(); ?>assets/plugins/wow/data1/tooltips/middleschoolboystudyingoutsidedpc_41578256.jpg" alt="Sekolah jadi asik dan menyenangkan"/>2</span></a>
                <a href="#" title="Kerjakan semua di satu tempat"><span><img src="<?php echo base_url(); ?>assets/plugins/wow/data1/tooltips/studentstudying.jpg" alt="Kerjakan semua di satu tempat"/>3</span></a>
                <a href="#" title="Banyak pilihan kelas"><span><img src="<?php echo base_url(); ?>assets/plugins/wow/data1/tooltips/studentwriting.jpg" alt="Banyak pilihan kelas"/>4</span></a>
                <a href="#" title="Guru dari banyak sekolah"><span><img src="<?php echo base_url(); ?>assets/plugins/wow/data1/tooltips/studying.jpg" alt="Guru dari banyak sekolah"/>5</span></a>
                <a href="#" title="Tersedia banyak pilihan soal"><span><img src="<?php echo base_url(); ?>assets/plugins/wow/data1/tooltips/8726823600_46f28ec28d_b.jpg" alt="Tersedia banyak pilihan soal"/>6</span></a>
                <a href="#" title="Tunggu apa lagi dan buktikan"><span><img src="<?php echo base_url(); ?>assets/plugins/wow/data1/tooltips/girl.jpg" alt="Tunggu apa lagi dan buktikan"/>7</span></a>
              </div></div><div class="ws_script" style="position:absolute;left:-99%"><a href="http://wowslider.com">bootstrap slider</a> by WOWSlider.com v8.7</div>
            <div class="ws_shadow"></div>
            </div>  
            <!-- End WOWSlider.com BODY section -->
          </div>
        </div>
          <div class="login-box">
          <?php echo $this->session->flashdata('pesan2'); ?>
            <div class="login-logo tema2">
              Buat Tugas Online-mu Sekarang Juga... 
            </div><!-- /.login-logo -->
          </div>

          <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
          aria-hidden="true">

          <div class="modal-dialog">
            <div class="register-box">
              <div class="register-box-body">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <p class="login-box-msg">Register a new membership</p>
                <form action="<?php echo site_url('web_con/register'); ?>" method="post">
                  <div class="form-group has-feedback">
                    <input name="username" type="text" class="form-control" placeholder="Username">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                  </div>
                  <div class="form-group has-feedback">
                    <input name="fullname" type="text" class="form-control" placeholder="Full name">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                  </div>
                  <div class="form-group has-feedback">
                    <input name="email" type="email" class="form-control" placeholder="Email">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                  </div>
                  <div class="form-group has-feedback">
                    <select name="jenis" class="form-control">
                      <option value="guru">Guru</option>
                      <option value="siswa">Siswa</option>
                    </select>
                  </div>

                  <div class="form-group has-feedback">
                    <input name="password" type="password" class="form-control password" placeholder="Password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                  </div>
                  <div class="form-group has-feedback">
                    <input type="password" class="form-control retype-password" placeholder="Retype password">
                    <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                  <div class="text-danger error-retype">Retype password must same with password <span class="glyphicon glyphicon glyphicon-remove"></span></div>
                  <div class="text-success success-retype">Retype Password Success <span class="glyphicon glyphicon glyphicon-ok"></span></div>
                  </div>
                  <div class="row">
                    <div class="col-xs-8">
                      <div class="checkbox icheck">
                        <label>
                          
                            <input class="agree" value="agree" type="checkbox"> I agree to the <a href="#">terms</a>
                            <div class="text-danger error-agree">You must check above <span class="glyphicon glyphicon glyphicon-remove"></span></div>
                          
                        </label>
                      </div>
                    </div><!-- /.col -->
                    <div class="col-xs-4">
                      <button type="submit" class="btn btn-primary btn-block btn-flat register">Register</button>
                    </div><!-- /.col -->
                  </div>
                </form>
                <a href="" class="text-center close" data-dismiss="modal">I already have a membership</a>
              </div><!-- /.form-box -->
            </div><!-- /.register-box -->
            
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="login-box">
<!--       <div class="login-logo">
        Selamat datang di
        <a href="<?php echo base_url() ?>assets/index2.html">Tugas Online</a>
      </div> /.login-logo -->
      <div class="login-box-body tema">
        <p class="login-box-msg"><b>Login atau <a class="daftar" href="#">Daftar</a></b></p>
        <form action="<?php echo site_url(); ?>/web_con/proseslogin" method="post">
          <div class="form-group has-feedback">
            <input name="username" type="text" class="form-control" placeholder="Username">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input name="password" type="password" class="form-control" placeholder="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <p class="text-center"><?php echo $cap_image; ?></p>
          <div class="form-group has-feedback">
            <input value="<?php echo $cap_text; ?>" name="captcha" type="text" class="form-control" placeholder="Masukkan Captcha">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
              <div class="checkbox icheck">
                <label>
                  <input value="cookie" name="cookie" type="checkbox"> Remember Me
                </label>
              </div>
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div><!-- /.col -->
          </div>
        </form>
        
        <!-- <a href="#">I forgot my password</a><br> -->
        <a class="daftar" href="#" class="text-center">Register a new membership</a>

      </div><!-- /.login-box-body -->
      <div class="footer">
        <?php echo $tema['footer_credit']; ?>
      </div>
    </div><!-- /.login-box -->
  </div>
  <style>
    .tema{
      border: 2px solid <?php echo $tema['warna_dasar']; ?>;
      border-radius: 5px;
    }

    .tema2{
      border: 4px solid <?php echo $tema['warna_dasar']; ?>;
      border-radius: 5px;
    }
  </style>
  <!-- Bootstrap 3.3.5 -->
  <script src="<?php echo base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>
  <!-- iCheck -->
  <script src="<?php echo base_url() ?>assets/plugins/iCheck/icheck.min.js"></script>
  <!-- MyJS -->
  <script src="<?php echo base_url() ?>assets/myjs.js"></script>
  <!-- WowSlider -->
  <script type="text/javascript" src="<?php echo base_url() ?>assets/plugins/wow/engine1/wowslider.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>assets/plugins/wow/engine1/script.js"></script>
  <!-- Wow Slider -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/plugins/wow/engine1/style.css" />
  <!-- WowSlider end -->
  <script>


/*    function cek_agree(){
      //alert('berhasil');
      if ($('input:checked').val()) {
        alert('true');
      }else{
        alert('false');
        return FALSE;
      }
    }*/

    $(function () {
      $('.success-retype').hide();
      $('.error-retype').hide();
      $('.error-agree').hide();

      $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%', // optional
        });

      $('.retype-password').keyup(function(){
        //alert('berhasil');
        if ($(this).val() == $('.password').val()) {
          $('.success-retype').show();
          $('.error-retype').hide();
          //alert('berhasil');
        }else{
          $('.success-retype').hide();
          $('.error-retype').show();
          //alert('berhasil2');
        }
      });

      $('.register').click(function(e){
        if ($('input:checked').val()) {
          //alert('true');
        }else{
          //alert('false');
          $('.error-agree').show();
          e.preventDefault();
        }
      });

      $('input').on('ifChecked', function(event){
        //alert(event.type + ' callback');
        $('.error-agree').hide();
      });


        //$.backstretch("assets/img/backgrounds/1.jpg");
      });
    </script>
    

    
  </body>
  </html>

