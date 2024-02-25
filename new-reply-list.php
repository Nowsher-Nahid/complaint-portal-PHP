<?php 
include('includes/header.php');
include('includes/navbar.php');
include('includes/sidebar.php');

$counter = 1;
$get_new_replies = $crudObj->dynamic_query("SELECT * FROM tbl_replies WHERE nt_status = 0");

// Set notification status to 1 as it is read now
$where = array("nt_status"=>0);
$data = array("nt_status"=>1);
$crudObj->update_record("tbl_replies",$where,$data);
?>

  <div class="content-wrapper">
    
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Reply List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Reply</a></li>
              <li class="breadcrumb-item active">New Reply List</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <div class="card">
        <div class="card-header bg-primary">
          <h3 class="card-title">List of new replies</h3>
        </div>
        <div class="card-body">
          <table id="datatable1" class="table table-bordered table-striped datatable">
            <thead>
              <tr>
                <th>#</th>
	            <td>Replied Date</td>
	            <th>Title</th>
	            <th>Actions</th>
              </tr>
            </thead>
            <tbody>

              <?php foreach($get_new_replies as $data){ ?>
                <tr>
                  <td><?php echo $counter++ ?></td>
                  <td><?php echo $data["created_date"] ?></td>
                   <td><?php echo $data["title"] ?></td>
                  <td>
                    <button class="btn btn-primary">
                      <a class="text-light" href="reply-details.php?com-id=<?php echo $data['id'] ?>">View details</a>
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
