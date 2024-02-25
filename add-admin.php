<?php 
include('includes/header.php');
include('includes/navbar.php');
include('includes/sidebar.php');
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
              <li class="breadcrumb-item active">Add an Admin</li>
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
                <h3 class="card-title">Please fill it up</h3>
              </div>

              <form name="add_admin_form">

                <div class="card-body">
                  	<div class="form-group">
                    	<label for="name">Name</label>
                    	<input type="text" class="form-control" name="name" id="name" placeholder="Enter full name" required>
                  	</div>
                  	<div class="form-group">
                    	<label for="email">Email</label>
                    	<input type="email" class="form-control" name="email" id="email" placeholder="Enter email" required>
                  	</div>
                  	<div class="form-group">
                    	<label for="phone">Phone Number</label>
                    	<input type="text" class="form-control" name="phone" id="phone" placeholder="Enter number" required>
                  	</div>
                  	<div class="form-group">
                    	<label for="password">Password</label>
                    	<input type="password" class="form-control" name="password" id="password" placeholder="Enter password" required>
                  	</div>
                </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
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
	$("form[name='add_admin_form']").submit(function(e) {
	    e.preventDefault();
	    var formData = new FormData(this);
	    $.ajax({
	      url: "actions/action-admin.php",
	      type: 'POST',
	      dataType: 'json',
	      data: formData,
	      success: function(data) {
	        if (data == 'true') {
	          Swal.fire("Done!", "Admin added!", "success");
	            window.setTimeout(function() {
	                location.reload()
	            }, 1000); 
	        }else{
	          Swal.fire("Error!", "Data already exists!", "error");
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
