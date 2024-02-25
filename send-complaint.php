<?php 
include('includes/header.php');
include('includes/navbar.php');
include('includes/sidebar.php');
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Complaint Form</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Complaint</a></li>
              <li class="breadcrumb-item active">Send a Complaint</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6">
            
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Please fill it up</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form name="complaint_form">
              	<input type="text" name="user_name" value="<?php echo $user_name ?>" hidden>
              	<input type="text" name="user_email" value="<?php echo $user_email ?>" hidden>
              	<input type="text" name="user_phone" value="<?php echo $user_phone ?>" hidden>

                <div class="card-body">
                  	<div class="form-group">
                    	<label for="title">Title of the complaint</label>
                    	<input type="text" class="form-control" name="title" id="title" placeholder="Enter title" required>
                  	</div>
                  	<div class="form-group">
                  		<label>Description of the complaint</label>
                      <textarea class="form-control" rows="5" name="description" placeholder="Enter ..." required></textarea>
                  	</div>
                  	<div class="form-group">
                      <label>Attach files <small>(Images, pdf or mp4 videos)</small></label>
                  		<input type="file" name="files[]" class="form-control" accept="video/*,image/*,application/pdf" multiple style="height: unset;">
                  	</div>
                </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>

            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>

<?php include('includes/footer.php') ?>

<script>
$("form[name='complaint_form']").submit(function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    $.ajax({
      url: "actions/action-complaint.php",
      type: 'POST',
      dataType: 'json',
      data: formData,
      success: function(data) {
        if (data == 'true') {
          Swal.fire("Done!", "Complaint sent successfully!", "success");
            window.setTimeout(function() {
                location.reload()
            }, 1000); 
        }else{
          Swal.fire("Error!", "Someting went wrong!", "error");
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
