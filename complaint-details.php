<?php 
include('includes/header.php');
include('includes/navbar.php');
include('includes/sidebar.php');

$where = array("id"=>$_GET["com-id"]);
$complaint_data = $crudObj->select_record("*", $where, "tbl_complaints");
$attachments = json_decode($complaint_data[0]['files']);

// Set status to 1 as it is read now
$data = array("status"=>1,"nt_status"=>1);
$crudObj->update_record("tbl_complaints",$where,$data);

?>

  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Complaint Details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Complaint</a></li>
              <li class="breadcrumb-item active">Complaint Details</li>
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
                <h3 class="card-title">Details of the complaint</h3>
              </div>

              <form name="reply_form">

                <input type="text" name="receiver_name" value="<?php echo $complaint_data[0]['sender_name'] ?>" hidden>
                <input type="text" name="receiver_email" value="<?php echo $complaint_data[0]['sender_email'] ?>" hidden>
                <input type="text" name="complaint_title" value="<?php echo $complaint_data[0]['title'] ?>" hidden>

                <div class="card-body">
                    <div class="form-group">
                      <h5><b>Complaint By :</b></h5>
                      <h5>Name : <?php echo $complaint_data[0]['sender_name'] ?></h5>
                      <h5>Email : <?php echo $complaint_data[0]['sender_email'] ?></h5>
                      <h5>Phone Number : <?php echo $complaint_data[0]['sender_phone'] ?></h5>
                    </div>
                  	<div class="form-group mt-4">
                      <h5><b>Title : </b><?php echo $complaint_data[0]['title'] ?></h5>
                  	</div>
                  	<div class="form-group mt-4">
                      <h5><b>Description : </b><?php echo $complaint_data[0]['description'] ?></h5>
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

                    <div class="form-group">
                      <label>Reply to the complaint</label>
                      <textarea class="form-control" rows="5" name="reply" placeholder="Enter ..." required></textarea>
                    </div>
                    <div class="form-group">
                      <label>Attach files <small>(Images, pdf or mp4 videos)</small></label>
                      <input type="file" name="files[]" class="form-control" accept="video/*,image/*,application/pdf" multiple style="height: unset;">
                    </div>

                </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Reply</button>
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
