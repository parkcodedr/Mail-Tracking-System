  <?php 
 
 $bumber = ' <!-- Start Page Header -->
  <div class="page-header">
    <h1 class="title">Dashboard</h1>
      <ol class="breadcrumb">
        <li class="active"><b>Welcome to '.return_single_value("office_name", "office", "office_id", $_SESSION["office"]).' \'s office Dashboard</b></li>
    </ol>

    <!-- Start Page Header Right Div -->
    <div class="right">
      <div class="btn-group" role="group" aria-label="...">
        <a href="index.php" class="btn btn-light">Dashboard</a>
        <a href="#" class="btn btn-light"><i class="fa fa-refresh"></i></a>
        <a href="#" class="btn btn-light"><i class="fa fa-search"></i></a>
        <a href="#" class="btn btn-light" id="topstats"><i class="fa fa-line-chart"></i></a>
      </div>
    </div>
    <!-- End Page Header Right Div -->

  </div>
  <!-- End Page Header -->';


    if (!file_exists('pages/'.$page.'.php')) {
       echo $bumber;
    } 
  ?>

 <!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTAINER -->
<div class="container-widget">
  <?php 
$oluwa = '
<!-- Start Top Stats -->
  <div class="col-md-12">
  <ul class="topstats clearfix">
    <li class="arrow"></li>
    <li class="col-xs-6 col-lg-2">
      <span class="title"><i class="fa fa-dot-circle-o"></i> All Mails</span>
      <h3>90</h3>
      <span class="diff"> Total Mails</span>
    </li>
    <li class="col-xs-6 col-lg-2">
      <span class="title"><i class="fa fa-calendar-o"></i> Unattended Mails</span>
      <h3>60</h3>
      <span class="diff"> Mails, yet to be replied</span>
    </li>
    <li class="col-xs-6 col-lg-2">
      <span class="title"><i class="fa fa-shopping-cart"></i> Total Messages</span>
      <h3 class="color-up">50</h3>
      <span class="diff">Replied & Unreplied Messages</span>
    </li>
    <li class="col-xs-6 col-lg-2">
      <span class="title"><i class="fa fa-users"></i> Unread Messages</span>
      <h3>30</h3>
      <span class="diff">Unread Messages</span>
    </li>
    <li class="col-xs-6 col-lg-2">
      <span class="title"><i class="fa fa-eye"></i> HardCopy Mails</span>
      <h3 class="color-up">23</h3>
      <span class="diff">Hard Copy Mails</span>
    </li>
    <li class="col-xs-6 col-lg-2">
      <span class="title"><i class="fa fa-clock-o"></i> Electronic Mails</span>
      <h3 class="color-down">60</h3>
      <span class="diff">Total E-Mails</span>
    </li>
  </ul>
  </div>
  <!-- End Top Stats -->

';
?>
  <?php 
    if (file_exists('pages/'.$page.'.php')) {
      include('pages/'.$page.'.php');
    } else {
      echo $oluwa;
      include 'pages/main.php';
     
    }
  ?>

</div>
<!-- END CONTAINER -->