    <!-- Start Row -->
<div class="row">
    <div class="col-md-12"> 
    <h4>Quick Menu</h4>

  <!-- Start Quick Menu -->
  <ul class="panel quick-menu clearfix">
    <li class="col-sm-3">
      <a href="?action=allm"><i class="fa fa-life-ring"></i>View all Mails</a>
    </li>
    <li class="col-sm-3">
      <a href="?action=allmes"><i class="fa fa-line-chart"></i>View all Messages</a>
    </li>
    <li class="col-sm-3">
      <a href="?action=newema"><i class="fa fa-upload"></i>View Unattended e-Mails</a>
    </li>
    <li class="col-sm-3"> 
      <a href="?action=newhardm"><i class="fa fa-upload"></i>View Unattended Hard-Mails</a>
    </li>
    <li class="col-sm-3"> 
      <a href="?action=newmes"><i class="fa fa-cogs"></i>View Unread Messages</a>
    </li>
     <li class="col-sm-3">
      <a  data-toggle="modal" data-target="#himodal" ><i class="fa fa-cogs"></i>Create a Mail</a>
    </li>
    
  </ul>
  <!-- End Quick Menu -->

    </div>
</div>
  <!-- End Row -->

    <!-- Modal -->
  <div class="modal fade" id="himodal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Mail Creation </h4>
        </div>
        <div class="modal-body">
          <p>Please choose the type of mail you want to create</p><br> <br>

          <a href="?action=createhard" type="button" class="btn btn-primary pull-left" >Create Hard-Mail</a> 

          <a href="?action=createemail" type="button" class="btn btn-secondary pull-right" >Create E-Mail</a>
          <br><br>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>