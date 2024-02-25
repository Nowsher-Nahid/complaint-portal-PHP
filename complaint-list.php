<?php 
include('includes/header.php');
include('includes/navbar.php');
include('includes/sidebar.php');

if(isset($_GET['from_date']) && isset($_GET['to_date'])){
  $from_date = $_GET['from_date'];
  $to_date  = $_GET['to_date'];
}else{
  $from_date = date('Y-m-01');
  $to_date  = date('Y-m-t');
}

$condition = " created_date BETWEEN '".$from_date."' AND '".$to_date."' ORDER by id DESC";
$counter = 1;
$get_unread_complaints = $crudObj->dynamic_query("SELECT * FROM tbl_complaints WHERE status = 0 AND $condition");
$get_read_complaints = $crudObj->dynamic_query("SELECT * FROM tbl_complaints WHERE status = 1 AND $condition");
?>

  <div class="content-wrapper">
    
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Complaint List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Complaint</a></li>
              <li class="breadcrumb-item active">Complaint List</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <div class="content">
      <div class="container-fluid">

        <div class="card mb-5">
          <div class="card-header bg-primary">
            <h3 class="card-title">Filter by dates</h3>
          </div>
          <div class="card-body">

            <form method="GET">
              <div class="row">
                <div class="col-md-5">
                  <div class="form-group">
                    <label for="">From date</label>
                    <input type="date" class="form-control" value="<?php echo $from_date ?>" name="from_date" required>
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="form-group">
                    <label for="">To date</label>
                    <input type="date" class="form-control" value="<?php echo $to_date ?>" name="to_date" required>
                  </div>
                </div>
                <div class="col-md-2">
                  <button class="btn btn-primary btn-block" type="submit" style="margin-top: 30px;">Search</button>
                </div>
              </div>
            </form>

          </div>
        </div>

        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Unread Complaints</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Read Complaints</a>
          </li>
        </ul>

        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

              <div class="card">
                <div class="card-header bg-primary">
                  <h3 class="card-title">List of unread complaints</h3>
                </div>
                <div class="card-body">
                  <table id="datatable1" class="table table-bordered table-striped datatable">
                    <thead>
                      <tr>
                        <th>#</th>
                        <td>Date</td>
                        <th>Title</th>
                        <th>Sender name</th>
                        <th>Sender email</th>
                        <th>Phone number</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php foreach($get_unread_complaints as $unread){ ?>
                        <tr>
                          <td><?php echo $counter++ ?></td>
                          <td><?php echo $unread["created_date"] ?></td>
                          <td><?php echo $unread["title"] ?></td>
                          <td><?php echo $unread["sender_name"] ?></td>
                          <td><?php echo $unread["sender_email"] ?></td>
                          <td><?php echo $unread["sender_phone"] ?></td>
                          <td>
                            <button class="btn btn-primary">
                              <a class="text-light" href="complaint-details.php?com-id=<?php echo $unread['id'] ?>">View details</a>
                            </button>
                          </td>
                        </tr>
                      <?php } ?>
                      
                    </tbody>
                  </table>
                </div>
              </div>

          </div>
          <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            
            <div class="card">
                <div class="card-header bg-primary">
                  <h3 class="card-title">List of read complaints</h3>
                </div>
                <div class="card-body">
                  <table id="datatable1" class="table table-bordered table-striped datatable">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Title</th>
                        <th>Sender name</th>
                        <th>Sender email</th>
                        <th>Phone number</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php foreach($get_read_complaints as $read){ ?>
                        <tr>
                          <td><?php echo $counter++ ?></td>
                          <td><?php echo $read["created_date"] ?></td>
                          <td><?php echo $read["title"] ?></td>
                          <td><?php echo $read["sender_name"] ?></td>
                          <td><?php echo $read["sender_email"] ?></td>
                          <td><?php echo $read["sender_phone"] ?></td>
                          <td>
                            <button class="btn btn-primary">
                              <a class="text-light" href="complaint-details.php?com-id=<?php echo $read['id'] ?>">View details</a>
                            </button>
                          </td>
                        </tr>
                      <?php } ?>
                      
                    </tbody>
                  </table>
                </div>
            </div>

          </div>
        </div>
        
      </div>
    </div>
  </div>

<?php include('includes/footer.php') ?>

</body>
</html>
