<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" type="image/png" href="<?php echo base_url(); ?>./assets/icon/icon.png"/>
  <title>GP-ABC | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
 <?php include APPPATH.'views/style.php';?>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href=""><b>GP</b>-ABC</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">
    <i>-SIGN IN ONLY USER ACCESS-</i>
  </p>

    <form action="<?php echo base_url('login/attempt_login');?>" autocomplete="off" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="username" placeholder="Username" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" placeholder="Password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary sing_in_btn">Sign In</button>
        </div>
        <div class="col-xs-2">
          <div class="social-auth-links text-center">
            <p>-OR-</p>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
      <p class="forgot">
      <a href="#"><i>Forgot Password?</i></a>
    </p>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <div class="social-auth-links text-center">
      <!--  -->
    </div>

    <p class="powered">
      <a href="http://166.62.19.0/2ra/index.php" target="_blank">
        <i>-POWERED BY 2RA TECHNOLOGY LTD-</i>
      </a>
    </p>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<?php 
$message = $this->session->userdata('message');
if($message)
{
 ?>
 <div class="target message">
  <?php echo $message; ?>
</div>

 <?php
}
$this->session->unset_userdata('message');
?>
<!-- SCRIPT -->
<?php include APPPATH.'views/script.php';?>
</body>
</html>
