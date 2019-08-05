<?php
include'include/autoload.php';
authenticate_user();
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
 if(isset($_GET['action']) && $_GET['action'] == 'logout') {        
            unset($_SESSION['user_id']);
           session_destroy();
           header("Location: ../");
  } 

  if (isset($_GET['action']) && $_GET['action'] == 'home') {
       $activeA ='active';      // 
      $page = 'main';
      $title = "DashBoard - Home";

    }else if (isset($_GET['action']) && $_GET['action'] == 'allm') {
      $activeB = 'active';      // 
      $page = 'allmail';
      $title = "All Mails";

    }else if (isset($_GET['action']) && $_GET['action'] == 'allmes') {
      $activeC = 'active';      // 
      $page = 'messall';
      $title = "All Mails";

    }else if (isset($_GET['action']) && $_GET['action'] == 'newmes') {
      $activeD = 'active';      // 
      $page = 'messnew';
      $title = "New Mails";

    }else if (isset($_GET['action']) && $_GET['action'] == 'newema') {
    $activeE = 'active';      // 
      $page = 'newemail';
      $title = "New e-Mails";

    }else if (isset($_GET['action']) && $_GET['action'] == 'newhardm') {
      $activeA = 'active';      // 
      $page = 'newhardmail';
      $title = "New Hard Mail";

    }else if (isset($_GET['action']) && $_GET['action'] == 'createhard') {
      $activeA = 'active';      // 
      $page = 'createhard';
      $title = "Create New Hard-Mail";

    }else if (isset($_GET['action']) && $_GET['action'] == 'createemail') {
      $activeA = 'active';      // 
      $page = 'createmail';
      $title = "Create New e-Mail";

    } else {
      $page = '';                             // All
     $title = "DashBoard - Home";
     $activeA ='active';  
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


