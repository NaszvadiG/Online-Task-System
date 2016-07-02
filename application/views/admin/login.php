<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Tugas Online | Log in</title>
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

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
      </head>
      <body class="hold-transition login-page">
        <div class="col-md-6">
          <div class="login-box">
            <div class="login-logo">
              Selamat Datang Admin Silahkan Login untuk Masuk
            </div><!-- /.login-logo -->
          </div>
      </div>
      <div class="col-md-6">
        <div class="login-box">
        <?php echo $this->session->flashdata('pesan2'); ?>
      <div class="login-box-body">
        <p class="login-box-msg"><b>Login</b></p>
        <form action="<?php echo site_url(); ?>/adminutama/proseslogin" method="post">
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
            	<input value="admin" name="admin" class="hidden"></input>
              <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div><!-- /.col -->
          </div>
        </form>
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
  </div>
  <!-- jQuery 2.1.4 -->
  <script src="<?php echo base_url() ?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
  <!-- Bootstrap 3.3.5 -->
  <script src="<?php echo base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>
  <!-- iCheck -->
  <script src="<?php echo base_url() ?>assets/plugins/iCheck/icheck.min.js"></script>
  <!-- MyJS -->
  <script src="<?php echo base_url() ?>assets/myjs.js"></script>
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
    <?php echo "$pesan"; ?>

    <?php //echo $this->session->flashdata('login');?>
  </body>
  </html>

