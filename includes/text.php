<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">

    <!-- Notification Dropdown Menu -->
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-bell"></i>
        <span class="badge badge-danger navbar-badge"><?php echo $net_total ?></span>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        
        <?php if($current_month_total != 0){ ?>
          <div class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> <?php echo $cm_total ?>
            <span class="float-right text-muted text-sm"><?php echo $current_month_name.', '.$current_year ?></span>
          </div>
          <div class="dropdown-divider"></div>
        <?php } ?>

        <?php if($last_month_total != 0){ ?>
          <div class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> <?php echo $lm_total ?>
            <span class="float-right text-muted text-sm"><?php echo $last_month_name.', '.$last_year ?></span>
          </div>
          <div class="dropdown-divider"></div>
        <?php } ?>

        <?php if($last_last_month_total != 0){ ?>
          <div class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> <?php echo $llm_total ?>
            <span class="float-right text-muted text-sm"><?php echo $last_last_month_name.', '.$last_last_year ?></span>
          </div>
          <div class="dropdown-divider"></div>
        <?php } ?>

        <?php if($user_type == "Super Admin" || $user_type == "Admin"){ ?>
          <a href="new-complaint-list.php" class="dropdown-item dropdown-footer">See All Complaints</a>
        <?php }else{ ?>
          <a href="reply-list.php" class="dropdown-item dropdown-footer">See All Replies</a>
        <?php } ?>

      </div>
    </li>

  </ul>
</nav>