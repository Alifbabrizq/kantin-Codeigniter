<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Assignment Project Alif&Sibro</title>
    <!-- Bootstrap Styles-->
    <link href="<?php echo base_url();?>assets1/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="<?php echo base_url();?>assets1/css/font-awesome.css" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="<?php echo base_url();?>assets1/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="<?php echo base_url();?>assets1/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link href="<?php echo base_url()?>assets/custom.css" rel="stylesheet">
</head>

<body>

  <div id="wrapper">

    <?php
  if($this->session->userdata('level') == 'admin'){
  ?>

                  <nav class="navbar navbar-default top-navbar" role="navigation">
                    <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Mager.In</a>
            </div>
                <!-- /.dropdown -->

                <!-- /.dropdown -->
                <div class="container">

                  <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                      <li><a href="<?php echo base_url();?>index.php/Home/dashboard"><i class="glyphicon glyphicon-home"></i> Home</a></li>
                      <li><a href="<?php echo base_url();?>index.php/login/logout "><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
                    </ul>
                  </div><!--/.nav-collapse -->
                </div>
                <!-- /.dropdown -->
                <!-- /.dropdown -->

        </nav>

        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">


                <li>
                    <a class="" href="<?php echo base_url(); ?>index.php/Home/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>index.php/Kantin1"><i class="fa fa-sitemap"></i> Daftar Kantin<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/Kantin1/index">Kantin 01</a>
                        </li>
                        <li>
                            <a href="#">Kantin 02</a>
                        </li>
                        <li>
                            <a href="#">Kantin 03</a>
                        </li>
                        <li>
                            <a href="#">Kantin 04</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>index.php/"><i class="fa fa-desktop"></i> UI Element</a>
                </li>
                <li>
                    <a href="chart.html"><i class="fa fa-bar-chart-o"></i> Charts</a>
                </li>
                <li>
                    <a href="tab-panel.html"><i class="fa fa-qrcode"></i> Tabs & Panels</a>
                </li>

                <li>
                    <a href="table.html"><i class="fa fa-table"></i> Responsive Tables</a>
                </li>
                <li>
                    <a href="form.html"><i class="fa fa-edit"></i> Forms </a>
                </li>

                <li>
                    <a href="empty.html"><i class="fa fa-fw fa-file"></i> Empty Page</a>
                </li>

                <li><a href="<?php echo base_url('index.php/Shopping/riwayat'); ?>" class=""><i class="lnr lnr-cog"></i> <span>Riwayat Transaksi</span></a></li>

                </ul>

            </div>
        </nav>
        <!-- /. NAV SIDE  -->

        <?php
      } else {
        ?>

        <nav class="navbar navbar-default top-navbar" role="navigation">
          <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.html">Mager.In</a>
  </div>
      <!-- /.dropdown -->

      <!-- /.dropdown -->
      <div class="container">

        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="<?php echo base_url();?>index.php/Home"><i class="glyphicon glyphicon-home"></i> Home</a></li>
            <li><a href="<?php echo base_url();?>index.php/Home/tentang"><i class="glyphicon glyphicon-user"></i> Tentang</a></li>
            <li><a href="<?php echo base_url();?>index.php/Home/cara_bayar"><i class="glyphicon glyphicon-briefcase"></i> Cara Bayar</a></li>
            <li><a href="<?php echo base_url();?>index.php/Shopping/tampil_cart"><i class="glyphicon glyphicon-shopping-cart"></i>  Keranjang Belanja</a></li>
            <li><a href="<?php echo base_url();?>index.php/login/logout "><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
      <!-- /.dropdown -->
      <!-- /.dropdown -->

</nav>

<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">

        <li>
            <a href="<?php echo base_url(); ?>index.php/Home"><i class="fa fa-sitemap"></i> Daftar Kantin<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li>
                    <a href="<?php echo base_url(); ?>index.php/Home">Kantin 01</a>
                </li>
                <li>
                    <a href="#">Kantin 02</a>
                </li>
                <li>
                    <a href="#">Kantin 03</a>
                </li>
                <li>
                    <a href="#">Kantin 04</a>
                </li>
            </ul>
        </li>
        <li>

            <a><i class="fa fa-sitemap"></i> Kategori<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li>
                  <a href="<?php echo base_url();?>index.php/Shopping/index/">Semua</a>
                  <?php
                          foreach ($kategori as $row)
                              {
                  ?>
                  <a href="<?php echo base_url();?>index.php/Shopping/index/<?php echo $row['id'];?>"><?php echo $row['nama_kategori'];?></a>
                  <?php
                              }
                  ?>
                </li>
            </ul>

        </li>
        <li>
          <a href="<?php echo base_url();?>index.php/Shopping/tampil_cart"><i class="glyphicon glyphicon-shopping-cart"></i> Keranjang Belanja</a>
         <?php

           $cart= $this->cart->contents();

// If cart is empty, this will show below message.
           if(empty($cart)) {
               ?>
               <a class="list-group-item">Keranjang Belanja Kosong</a>
               <?php
           }
           else
               {
                   $grand_total = 0;
                   foreach ($cart as $item)
                       {
                           $grand_total+=$item['subtotal'];
               ?>
               <a class="list-group-item"><?php echo $item['name']; ?> (<?php echo $item['qty']; ?> x <?php echo number_format($item['price'],0,",","."); ?>)=<?php echo number_format($item['subtotal'],0,",","."); ?></a>
               <?php
                       }
               ?>

               <?php
               }
?>
        </li>
      </ul>

  </div>
</nav>
        <?php
      }
    ?>

        <!-- CONTENT -->
        <div id="page-wrapper">


          <?php
          $this->load->view($content_view);
          ?>





        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="<?php echo base_url();?>assets1/js/jquery-1.10.2.js"></script>
    <!-- Bootstrap Js -->
    <script src="<?php echo base_url();?>assets1/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="<?php echo base_url();?>assets1/js/jquery.metisMenu.js"></script>
    <!-- Morris Chart Js -->
    <script src="<?php echo base_url();?>assets1/js/morris/raphael-2.1.0.min.js"></script>
    <script src="<?php echo base_url();?>assets1/js/morris/morris.js"></script>
    <!-- Custom Js -->
    <script src="<?php echo base_url();?>assets1/js/custom-scripts.js"></script>

    <script src="<?php echo base_url();?>assets/jquery/jquery-3.2.1.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/arf.js"></script>
    <script src="<?php echo base_url();?>assets/js/prs.js"></script>
    <script src="<?php echo base_url();?>assets/js/validation.js"></script>
    <script src="<?php echo base_url();?>assets/jquery/jquery-ui.js"></script>
    <script src="<?php echo base_url();?>assets/jquery/jquery.validate.min.js"></script>
    <script>window.jQuery || document.write('<script src="<?php echo base_url();?>assets/vendor/jquery.min.js"><\/script>')</script>
    <script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?php echo base_url();?>assets/asie/js/ie10-viewport-bug-workaround.js"></script>


</body>

</html>
