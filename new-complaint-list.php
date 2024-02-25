<?php 
include('includes/header.php');
include('includes/navbar.php');
include('includes/sidebar.php');

$counter = 1;
$get_new_complaints = $crudObj->dynamic_query("SELECT * FROM tbl_complaints WHERE nt_status = 0");

// Set notification status to 1 as it is read now
$where = array("nt_status"=>0);
$data = array("nt_status"=>1);
$crudObj->update_record("tbl_complaints",$where,$data);
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
              <li class="breadcrumb-item active">New Complaint List</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <div class="card">
        <div class="card-header bg-primary">
          <h3 class="card-title">List of new complaints</h3>
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

              <?php foreach($get_new_complaints as $data){ ?>
                <tr>
                  <td><?php echo $counter++ ?></td>
                  <td><?php echo $data["created_date"] ?></td>
                  <td><?php echo $data["title"] ?></td>
                  <td><?php echo $data["sender_name"] ?></td>
                  <td><?php echo $data["sender_email"] ?></td>
                  <td><?php echo $data["sender_phone"] ?></td>
                  <td>
                    <button class="btn btn-primary">
                      <a class="text-light" href="complaint-details.php?com-id=<?php echo $data['id'] ?>">View details</a>
                    </button>
                  </td>
                </tr>
              <?php } ?>
              
            </tbody>
          </table>
        </div>
      </div>

  </div>

<?php include('includes/footer.php') ?>

</body>
</html>
