
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="<?php echo base_url(); ?>./assets/icon/icon.png"/>
  <title>GP-ABC | SUCCESS</title>
  <!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- STYLE -->
<?php include APPPATH.'views/style.php';?>
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<!-- Main Header -->
<?php include APPPATH.'views/header.php';?>

<!-- Navbar -->
<?php include APPPATH.'views/navbar.php';?>






  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="page_title" style="font-size: 20px">
        <?php echo $page_title;
        ?>
        <b style="color: #f79f1f;">
        <?php
          if(isset($site_id)){
          $this->db->select('*');
          $this->db->from('site');
          $this->db->where('site_id', $site_id);
          $query_result = $this->db->get();
          $result = $query_result->row();
          echo ' - '.$result->site_name;
        }
        ?>
        </b>
        <?php 
        ?>
      </h1>
    </section>

    <?php echo $main_contain; ?>


  </div>
  <!-- content-wrapper -->







<!-- Main Footer -->
<?php include APPPATH.'views/footer.php';?>


</div>
<!-- ./wrapper -->


<!-- SCRIPT -->
<?php include APPPATH.'views/script.php';?>
</body>
</html>