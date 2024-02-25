<?php 
include('includes/header.php');
include('includes/navbar.php');
include('includes/sidebar.php');

$where = array("id"=>$_GET["u-id"]);
$user_data = $crudObj->select_record("*", $where, "tbl_users");
?>

  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Admin Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active">Update Admin</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6">
            
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update admin info</h3>
              </div>

              <form name="update_admin_form">
              	<input type="text" name="user_id" value="<?php echo $_GET['u-id'] ?>" hidden>
                <div class="card-body">
                  	<div class="form-group">
                    	<label for="name">Name</label>
                    	<input type="text" class="form-control" name="edit_name" id="name" value="<?php echo $user_data[0]['name'] ?>" required>
                  	</div>
                  	<div class="form-group">
                    	<label for="email">Email</label>
                    	<input type="email" class="form-control" name="edit_email" id="email" value="<?php echo $user_data[0]['email'] ?>" required>
                  	</div>
                  	<div class="form-group">
                    	<label for="phone">Phone Number</label>
                    	<input type="text" class="form-control" name="edit_phone" id="phone" value="<?php echo $user_data[0]['phone'] ?>" required>
                  	</div>
                </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php include('includes/footer.php') ?>

<script>
	// Insert
	$("form[name='update_admin_form']").submit(function(e) {
	    e.preventDefault();
	    var formData = new FormData(this);
	    $.ajax({
	      url: "actions/action-admin.php",
	      type: 'POST',
	      dataType: 'json',
	      data: formData,
	      success: function(data) {
	        if (data == 'true') {
	          Swal.fire("Done!", "Admin info updated!", "success");
	            window.setTimeout(function() {
	                location.reload()
	            }, 1000); 
	        }
	      },
	      cache: false,
	      contentType: false,
	      processData: false
	    });
	 });
</script>

</body>
</html>
