
  <!-- Start Row -->
  <div class="row">

    <!-- Start Panel -->
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-title">
          Default Table
        </div>
        <div class="panel-body table-responsive">
          <p>For basic styling&mdash;light padding and only horizontal dividers&mdash;add the base class <code>.table</code> to any <code>&lt;table&gt;</code>. It may seem super redundant, but given the widespread use of tables for other plugins like calendars and date pickers, we've opted to isolate our custom table styles.</p>

          <table class="table  table-striped">
            <thead>
              <tr>
                <td class="text-center"> S/No</td>
                <td>Mail Owner</td>
                <td>Owners Email</td>
                <td>Office Sent From</td>
                <td>Mail Type</td>
                <td>Mail Subject</td>
                <td>Mail Status</td>
              </tr>
            </thead>
            <tbody >
              <?php 
                  list_mail($_SESSION['office']);

              ?>
            </tbody>
          </table>
        </div>

      </div>
    </div>
    <!-- End Panel -->



  </div>
  <!-- End Row -->






