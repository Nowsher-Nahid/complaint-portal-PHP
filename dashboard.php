<?php 
include('includes/header.php');
include('includes/navbar.php');
include('includes/sidebar.php');

$total_complaints = $crudObj->countRows("tbl_complaints");
$get_total_admins = $crudObj->dynamic_query("SELECT COUNT(id) as count FROM tbl_users WHERE type = 'Admin'");
$total_admins = $get_total_admins[0]['count'];
$get_total_users = $crudObj->dynamic_query("SELECT COUNT(id) as count FROM tbl_users WHERE type = 'User'");
$total_users = $get_total_users[0]['count'];
$total_replies = $crudObj->countRows("tbl_replies");
?>

  <div class="content-wrapper">
    
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active">Admin Dashboard</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <div class="content">
      <div class="container-fluid">

        <div class="row">
          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $total_complaints ?></h3>
                <p>Total Complaints</p>
              </div>
            </div>
          </div>
          <?php if($user_type == "Super Admin"){ ?>
	          <div class="col-lg-3 col-6">
	            <div class="small-box bg-warning">
	              <div class="inner">
	                <h3><?php echo $total_admins ?></h3>
	                <p>Total Admins</p>
	              </div>
	            </div>
	          </div>
	        <?php } ?>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-primary">
              <div class="inner">
                <h3><?php echo $total_users ?></h3>
                <p>Total Users</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $total_replies ?></h3>
                <p>Total Replies</p>
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
