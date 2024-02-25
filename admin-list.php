<?php 
include('includes/header.php');
include('includes/navbar.php');
include('includes/sidebar.php');

$counter = 1;
$get_admins = $crudObj->dynamic_query("SELECT * FROM tbl_users WHERE type = 'Admin'");
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Admin List</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active">Admin List</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <div class="content">
      <div class="container-fluid">

        <div class="card">
          <div class="card-header bg-primary">
            <h3 class="card-title">List of the admins</h3>
          </div>
          <div class="card-body">
            <table id="datatable1" class="table table-bordered table-striped datatable">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone number</th>
                  <th>Added on</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>

                <?php foreach($get_admins as $data){ ?>
                  <tr>
                    <td><?php echo $counter++ ?></td>
                    <td><?php echo $data["name"] ?></td>
                    <td><?php echo $data["email"] ?></td>
                    <td><?php echo $data["phone"] ?></td>
                    <td><?php echo $data["created_date"]." ".$data["created_time"] ?></td>
                    <td>
                      <button class="btn btn-sm btn-primary">
                        <a class="text-light" href="edit-admin.php?u-id=<?php echo $data['id'] ?>"><i class="fas fa-edit"></i></a>
                      </button>
                      <button onclick="deleteData(<?php echo $data['id'] ?>)" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
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

<?php include('includes/footer.php') ?>

<script>
// delete
function deleteData(id) {
  Swal.fire({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.value) {
        $.ajax({
          url: "actions/action-admin.php",
          method: "POST",
          data: {id:id},
          crossDomain: true,
          cache: false,
          success: function(data) {
            Swal.fire("Done!", "Admin deleted!", "success");
            window.setTimeout(function() {
              location.reload()
            }, 1000)
          }
        });
       }
    });
}
</script>

</body>
</html>
