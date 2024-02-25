<?php 
include('includes/header.php');
include('includes/navbar.php');
include('includes/sidebar.php');

$where = array("id"=>$_GET["rep-id"]);
$reply_data = $crudObj->select_record("*", $where, "tbl_replies");
$attachments = json_decode($reply_data[0]['files']);

// Set status to 1 as it is read now
$data = array("status"=>1,"nt_status"=>1);
$crudObj->update_record("tbl_replies",$where,$data);
?>

  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Reply Details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Reply</a></li>
              <li class="breadcrumb-item active">Reply Details</li>
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
                <h3 class="card-title">Details of the Reply</h3>
              </div>

                <div class="card-body">
                  	<div class="form-group">
                      	<h5><b>Title : </b><?php echo $reply_data[0]['title'] ?></h5>
                  	</div>
                  	<div class="form-group mt-4">
                      	<h5><b>Reply : </b><?php echo $reply_data[0]['reply'] ?></h5>
                    </div>
                    <div class="form-group mt-4">
                      	<h5 class="mb-2"><b>Download Attachments : </b></h5>

                      	<?php if(!empty($attachments)){ ?>
	                      	<div class="d-flex">
		                        <?php 
		                        foreach($attachments as $file){
		                          $ext = pathinfo($file, PATHINFO_EXTENSION);
		                          if($ext == "pdf"){ ?>

		                            <div class="mt-2 mr-3">
		                              <i class="fa-3x far fa-file-pdf"></i><br>
		                              <a href="assets/files/complaint/<?php echo $file ?>" download>Download</a>
		                            </div>

		                          <?php }else if($ext == "jpg" || $ext == "jpeg" || $ext == "png" || $ext == "webp"){ ?>

		                            <div class="mt-2 mr-3">
		                              <i class="fa-3x far fa-image"></i><br>
		                              <a href="assets/files/complaint/<?php echo $file ?>" download>Download</a>
		                            </div>

		                          <?php }else if($ext == "mp4"){ ?>

		                            <div class="mt-2 mr-3">
		                              <i class="fa-3x fas fa-video"></i><br>
		                              <a href="assets/files/complaint/<?php echo $file ?>" download>Download</a>
		                            </div>

		                          <?php }
		                        }
		                        ?>
	                      	</div>
	                    <?php }else{ ?>
	                    	<h5 class="text-danger">No attachment available!</h5>
	                    <?php } ?>

                    </div>

                </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php include('includes/footer.php') ?>

<script>
$("form[name='reply_form']").submit(function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    $.ajax({
      url: "actions/action-complaint.php",
      type: 'POST',
      dataType: 'json',
      data: formData,
      success: function(data) {
        if (data == 'true') {
          Swal.fire("Done!", "Reply sent successfully!", "success");
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
