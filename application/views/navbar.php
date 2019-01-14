  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">


      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
      <li class="header" style="text-align: center;color: #F79F1F;letter-spacing: 1px;font-weight: bold;">
        MENU LIST
      </li>

        <!-- FILE MENU -->
        <li class="treeview">
          <a href="#"><i class="fa fa-file icon_tree_color"></i> <span>FILE</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">

            <li><a href="<?php echo base_url()?>"><i class="far fa-circle icon_tree_color"></i> DASHBOARD</a></li>

            <li><a href="<?php echo base_url('CHANGE-PASSWORD')?>"><i class="far fa-circle icon_tree_color"></i> CHANGE PASSWORD</a></li>
            <li><a href="<?php echo base_url('admin/logout')?>"><i class="far fa-circle icon_tree_color"></i> USER LOGOUT</a></li>

          </ul>
        </li>
        <!-- END FILE MENU -->
        
        <!-- USER MENU -->
        <li class="treeview">
          <a href="#"><i class="fa fa-user icon_tree_color"></i> <span>USER</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">

            <li><a href="<?php echo base_url('CREATE-USER')?>"><i class="far fa-circle icon_tree_color"></i> CREATE USER</a></li>

            <li><a href="<?php echo base_url('USER-LIST')?>"><i class="far fa-circle icon_tree_color"></i> USER LIST</a></li>

          </ul>
        </li>
        <!-- END USER -->

         <!-- CIRCLE MENU -->
        <li class="treeview">
          <a href="#"><i class="fa fa-home icon_tree_color"></i> <span>CIRCLE</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">

            <li><a href="<?php echo base_url('CREATE-CIRCLE')?>"><i class="far fa-circle icon_tree_color"></i> CREATE CIRCLE</a></li>

            <li><a href="<?php echo base_url('CIRCLE-LIST')?>"><i class="far fa-circle icon_tree_color"></i> CIRCLE LIST</a></li>

          </ul>
        </li>
        <!-- END CIRCLE -->

         <!-- REGION MENU -->
        <li class="treeview">
          <a href="#"><i class="fa fa-registered icon_tree_color"></i> <span>REGION</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">

            <li><a href="<?php echo base_url('CREATE-REGION')?>"><i class="far fa-circle icon_tree_color"></i> CREATE REGION</a></li>

            <li><a href="<?php echo base_url('REGION-LIST')?>"><i class="far fa-circle icon_tree_color"></i> REGION LIST</a></li>

          </ul>
        </li>
        <!-- END REGION -->

         <!-- SITE MENU -->
        <li class="treeview">
          <a href="#"><i class="fa fa-sitemap icon_tree_color"></i> <span>SITE</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">

            <li><a href="<?php echo base_url('CREATE-SITE')?>"><i class="far fa-circle icon_tree_color"></i> CREATE SITE</a></li>

            <li><a href="<?php echo base_url('SITE-LIST')?>"><i class="far fa-circle icon_tree_color"></i> SITE LIST</a></li>

          </ul>
        </li>
        <!-- END SITE -->


         <!-- NODE TYPE MENU -->
        <li class="treeview">
          <a href="#"><i class="fa fa-flag icon_tree_color"></i> <span>NODE TYPE</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">

            <li><a href="<?php echo base_url('CREATE-NODE-TYPE')?>"><i class="far fa-circle icon_tree_color"></i> CREATE NODE TYPE</a></li>

            <li><a href="<?php echo base_url('NODE-TYPE-LIST')?>"><i class="far fa-circle icon_tree_color"></i> NODE TYPE LIST</a></li>

          </ul>
        </li>
        <!-- END NODE TYPE -->

         <!-- DEVICE MENU -->
        <li class="treeview">
          <a href="#"><i class="fa fa-bolt icon_tree_color"></i> <span>DEVICE</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">

            <li><a href="<?php echo base_url('CREATE-DEVICE')?>"><i class="far fa-circle icon_tree_color"></i> CREATE DEVICE</a></li>

            <li><a href="<?php echo base_url('DEVICE-LIST')?>"><i class="far fa-circle icon_tree_color"></i> DEVICE LIST</a></li>

          </ul>
        </li>
        <!-- END DEVICE -->

         <!-- IO CARD MENU -->
        <li class="treeview">
          <a href="#"><i class="fa fa-id-card icon_tree_color"></i> <span>IO CARD</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">

            <li><a href="<?php echo base_url('CREATE-IO-NUMBER')?>"><i class="far fa-circle icon_tree_color"></i> CREATE IO NUMBER</a></li>

            <li><a href="<?php echo base_url('IO-NUMBER-LIST')?>"><i class="far fa-circle icon_tree_color"></i> IO NUMBER LIST</a></li>
            <li><a href="<?php echo base_url('CREATE-IO-INPUT')?>"><i class="far fa-circle icon_tree_color"></i> CREATE IO INPUT</a></li>
            <li><a href="<?php echo base_url('IO-INPUT-LIST')?>"><i class="far fa-circle icon_tree_color"></i> IO INPUT LIST</a></li>

          </ul>
        </li>
        <!-- END IO CARD -->

         <!-- DATA RANGE MENU -->
        <li class="treeview">
          <a href="#"><i class="fa fa-bug icon_tree_color"></i> <span>DATA RANGE</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">

            <li><a href="<?php echo base_url('CREATE-DATA-RANGE')?>"><i class="far fa-circle icon_tree_color"></i> CREATE DATA RANGE</a></li>

            <li><a href="<?php echo base_url('DATA-RANGE-LIST')?>"><i class="far fa-circle icon_tree_color"></i> DATA RANGE LIST</a></li>

          </ul>
        </li>
        <!-- END DATA RANGE -->

         <!-- DATA SHEET MENU -->
        <li class="treeview">
          <a href="#"><i class="fa fa-database icon_tree_color"></i> <span>DATA SHEET</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">

            <li><a href="<?php echo base_url('SITE-ALARM-LIST')?>"><i class="far fa-circle icon_tree_color"></i> SITE ALARM LIST</a></li>

            <li><a href="<?php echo base_url('UPDATED-SITE-DATA')?>"><i class="far fa-circle icon_tree_color"></i> UPLDATED SITE DATA</a></li>

          </ul>
        </li>
        <!-- END DATA SHEET -->
        
        <!-- REPORT MENU -->
        <li class="treeview">
          <a href="<?php echo base_url('REPORT-SEARCH')?>"><i class="fa fa-bar-chart icon_tree_color"></i> <span>REPORT</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">

            <li><a href="<?php echo base_url('REPORT-SEARCH')?>"><i class="far fa-circle icon_tree_color"></i> REPORT SEARCH</a></li>

          </ul>
        </li>
        <!-- END REPORT -->
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>