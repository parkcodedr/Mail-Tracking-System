  <?php 
 
 $bumber = ' <!-- Start Page Header -->
  <div class="page-header">
    <h1 class="title">Dashboard</h1>
      <ol class="breadcrumb">
        <li class="active">This is a quick overview of some features</li>
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
    <li class="col-xs-6 col-lg-3">
      <span class="title"><i class="fa fa-dot-circle-o"></i> All Staff</span>
      <h3>366</h3>
      <span class="diff"> Total Staff</span>
    </li>
    <li class="col-xs-6 col-lg-3">
      <span class="title"><i class="fa fa-calendar-o"></i> All Offices</span>
      <h3>966</h3>
      <span class="diff"> Offices registered</span>
    </li>
    <li class="col-xs-6 col-lg-3">
      <span class="title"><i class="fa fa-shopping-cart"></i> Total Mails</span>
      <h3 class="color-up">696</h3>
      <span class="diff">Mails Handled Locally</span>
    </li>
    <li class="col-xs-6 col-lg-3">
      <span class="title"><i class="fa fa-users"></i> Messages</span>
      <h3>960</h3>
      <span class="diff"> Messages Handled Locally</span>
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