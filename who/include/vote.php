<?php
require('autoload.php');
if (isset($_GET['vote'])) {
  echo selectqueryrr('office' ,'office_id','office_name');
}

?>