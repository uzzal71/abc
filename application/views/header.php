  <header class="main-header">

    <!-- Logo -->
    <a href="" class="logo">
      <span class="logo-mini"><b>AB</b>C</span>
      <span class="logo-lg"><b>GP</b>-ABC</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
        <P style="color: #FFFFFF;margin: 15px 11px;letter-spacing: 0.5px">
          LOGINED IN : <?php echo $this->session->userdata('username'); ?>
        </P>
      </div>
    </nav>

  </header>