  <aside class="main-sidebar sidebar-dark-primary elevation-4">

<?php
$filename = basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']);
if($filename == "send-complaint.php"){
  $complaint_active = "active";
}else if($filename == "dashboard.php"){
  $dashboard_active = "active";
}else if($filename == "complaint-list.php"){
  $complaint_list_active = "active";
}else if($filename == "reply-list.php"){
  $reply_list_active = "active";
}else if($filename == "user-list.php"){
  $user_list_active = "active";
}else if($filename == "profile.php"){
  $profile_active = "active";
}else if($filename == "add-admin.php"){
  $add_admin_active = "active";
  $admin_active = "active";
}else if($filename == "admin-list.php"){
  $admin_list_active = "active";
  $admin_active = "active";
}
?>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="assets/images/logo.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block text-light"><?php echo $user_name ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <?php if($user_type == "User"){ ?>
            <li class="nav-item">
              <a href="send-complaint.php" class="nav-link <?php echo $complaint_active ?>">
              	<i class="nav-icon fas fa-share-square"></i>
                <p>Send a Complaint</p>
              </a>
            </li>
          <?php } ?>

          <?php if($user_type == "Admin" || $user_type == "Super Admin"){ ?>
            <li class="nav-item">
              <a href="dashboard.php" class="nav-link <?php echo $dashboard_active ?>">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="complaint-list.php" class="nav-link <?php echo $complaint_list_active ?>">
                <i class="nav-icon fas fa-list"></i>
                <p>Complaint List</p>
              </a>
            </li>
          <?php } ?>

          <?php if($user_type == "User"){ ?>
            <li class="nav-item">
              <a href="reply-list.php" class="nav-link <?php echo $list_list_active ?>">
              	<i class="nav-icon fas fa-th-list"></i>
                <p>Reply List</p>
              </a>
            </li>
          <?php } ?>

          <?php if($user_type == "Admin" || $user_type == "Super Admin"){ ?>
            <li class="nav-item">
              <a href="user-list.php" class="nav-link <?php echo $user_list_active ?>">
                <i class="nav-icon fas fa-users"></i>
                <p>User List</p>
              </a>
            </li>
          <?php } ?>

          <?php if($user_type == "Super Admin"){ ?>
            <li class="nav-item">
            <a href="#" class="nav-link <?php echo $admin_active ?>">
              <i class="nav-icon fas fa-user-check"></i>
              <p>
                Admin
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="add-admin.php" class="nav-link <?php echo $add_admin_active ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add an Admin</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="admin-list.php" class="nav-link <?php echo $admin_list_active ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Admin List</p>
                </a>
              </li>
            </ul>
          </li>
          <?php } ?>

          <li class="nav-item">
            <a href="profile.php" class="nav-link <?php echo $profile_active ?>">
              <i class="nav-icon fas fa-user"></i>
              <p>Profile</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="actions/action-logout.php" class="nav-link">
            	<i class="nav-icon fas fa-sign-out-alt"></i>
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
    <!-- /.sidebar -->
  </aside>