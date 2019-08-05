<?php

require('../include/autoload.php');
  $activeA ='';
  $activeB ='';
  $activeC ='';
  $activeD ='';
  $activeE =''; 
  $activeF ='';
  $activeG ='';
 // $active ='';
 // $active ='';
 
 /* if(isset($_GET['action']) && $_GET['action'] == 'logout') {       
            unset($_SESSION['user_id']);
           session_destroy();
           header("Location: ../");
  } */
 

  if (isset($_GET['action']) && $_GET['action'] == 'home') {
       $activeA ='active';      // 
      $page = 'main';
      $title = "DashBoard - Home";

    }else if (isset($_GET['action']) && $_GET['action'] == 'allm') {
      $activeB = 'active';      // 
      $page = 'createmail';
      $title = "Add New Admin";

    }else if (isset($_GET['action']) && $_GET['action'] == 'allmes') {
      $activeC = 'active';      // 
      $page = 'office';
      $title = "Office Creation";

    }else if (isset($_GET['action']) && $_GET['action'] == 'officer') {
      $activeD = 'active';      // 
      $page = 'officer';
      $title = "Create New Staff";

    }else if (isset($_GET['action']) && $_GET['action'] == 'newema') {
    $activeE = 'active';      // 
      $page = 'dept';
      $title = "Create Department";

    }else if (isset($_GET['action']) && $_GET['action'] == 'newhardm') {
      $activeA = 'active';      // 
      $page = 'fact';
      $title = "New Faculty";

    }else {
      $page = '';                             // All
      $title = "DashBoard";
      $activeH = 'active';
    }

    

?>
<?php
include 'pages/head.php';
?>

<!-- START CONTENT -->
<div class="content">

 
<?php 
include 'pages/stats.php';
?>
 <!-- //////////////////////////////////////////////////////////////////////////// -->

 <?php 
include 'pages/footer.php';
?>
</div>
<!-- End Content -->
 <!-- //////////////////////////////////////////////////////////////////////////// --> 
<?php 
include 'pages/sidepanel.php';
?>


