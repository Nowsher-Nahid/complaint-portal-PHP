<?php
// CURRENT MONTH
$current_month_start_date = date('Y-m-01');
$current_month_end_date  = date('Y-m-t');

$current_month_total_complaints = $crudObj->dynamic_query("SELECT COUNT(id) as count FROM tbl_complaints WHERE nt_status=0 AND created_date BETWEEN '$current_month_start_date' AND '$current_month_end_date'");
$get_current_month_total_replies = $crudObj->dynamic_query("SELECT COUNT(id) as count FROM tbl_replies WHERE nt_status=0 AND created_date BETWEEN '$current_month_start_date' AND '$current_month_end_date'");

$current_month_total = $current_month_total_complaints[0]['count'];
$current_month_total_replies = $get_current_month_total_replies[0]['count'];
$current_month_name  = date('F');
$current_year = date('Y');


// LAST MONTH 
$currentDate = new DateTime();
$currentDate->modify('first day of this month');
$currentDate->modify('-1 month');
$firstDateOfLastMonth = $currentDate->format('Y-m-01');
$currentDate->modify('last day of this month');
$lastDateOfLastMonth = $currentDate->format('Y-m-d');

$last_month_total_complaints = $crudObj->dynamic_query("SELECT COUNT(id) as count FROM tbl_complaints WHERE nt_status=0 AND created_date BETWEEN '$firstDateOfLastMonth' AND '$lastDateOfLastMonth'");
$get_last_month_total_replies = $crudObj->dynamic_query("SELECT COUNT(id) as count FROM tbl_replies WHERE nt_status=0 AND created_date BETWEEN '$firstDateOfLastMonth' AND '$lastDateOfLastMonth'");

$last_month_total = $last_month_total_complaints[0]['count'];
$last_month_total_replies = $get_last_month_total_replies[0]['count'];
$last_month_name  = $currentDate->format('F');
$last_year  = $currentDate->format('Y');


// MONTH BEFORE LAST MONTH
$currentDate = new DateTime();
$currentDate->modify('first day of this month');
$currentDate->modify('-2 month');
$firstDateOfLastLastMonth = $currentDate->format('Y-m-01');
$currentDate->modify('last day of this month');
$lastDateOfLastLastMonth = $currentDate->format('Y-m-d');

$last_last_month_total_complaints = $crudObj->dynamic_query("SELECT COUNT(id) as count FROM tbl_complaints WHERE nt_status=0 AND created_date BETWEEN '$firstDateOfLastLastMonth' AND '$lastDateOfLastLastMonth'");
$get_last_last_month_total_replies = $crudObj->dynamic_query("SELECT COUNT(id) as count FROM tbl_replies WHERE nt_status=0 AND created_date BETWEEN '$firstDateOfLastLastMonth' AND '$lastDateOfLastLastMonth'");

$last_last_month_total = $last_last_month_total_complaints[0]['count'];
$last_last_month_total_replies = $get_last_last_month_total_replies[0]['count'];
$last_last_month_name  = $currentDate->format('F');
$last_last_year  = $currentDate->format('Y');


$total_complaints = $current_month_total+$last_month_total+$last_last_month_total;
$total_replies = $current_month_total_replies+$last_month_total_replies+$last_last_month_total_replies;

if($user_type == "User"){
  $cm_total = $current_month_total_replies;
  $lm_total = $last_month_total_replies;
  $llm_total = $last_last_month_total_replies;
  $net_total = $total_replies;
  $ext = "replies";
}else{
  $cm_total = $current_month_total;
  $lm_total = $last_month_total;
  $llm_total = $last_last_month_total;
  $net_total = $total_complaints;
  $ext = "complaints";
}

?>

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
      
      <?php if($cm_total == 0 && $lm_total == 0 && $llm_total == 0){ ?>
      <?php }else{ ?>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            
            <?php if($cm_total != 0){ ?>
              <div class="dropdown-item">
                <i class="fas fa-envelope mr-2"></i> <?php echo $cm_total.' '.$ext ?>
                <span class="float-right text-muted text-sm"><?php echo $current_month_name.', '.$current_year ?></span>
              </div>
              <div class="dropdown-divider"></div>
            <?php } ?>
    
            <?php if($lm_total != 0){ ?>
              <div class="dropdown-item">
                <i class="fas fa-envelope mr-2"></i> <?php echo $lm_total.' '.$ext ?>
                <span class="float-right text-muted text-sm"><?php echo $last_month_name.', '.$last_year ?></span>
              </div>
              <div class="dropdown-divider"></div>
            <?php } ?>
    
            <?php if($llm_total != 0){ ?>
              <div class="dropdown-item">
                <i class="fas fa-envelope mr-2"></i> <?php echo $llm_total.' '.$ext ?>
                <span class="float-right text-muted text-sm"><?php echo $last_last_month_name.', '.$last_last_year ?></span>
              </div>
              <div class="dropdown-divider"></div>
            <?php } ?>
    
            <?php if($user_type == "Super Admin" || $user_type == "Admin"){ ?>
              <a href="new-complaint-list.php" class="dropdown-item dropdown-footer">See All Complaints</a>
            <?php }else{ ?>
              <a href="new-reply-list.php" class="dropdown-item dropdown-footer">See All Replies</a>
            <?php } ?>
    
          </div>
        <?php } ?>
    </li>

  </ul>
</nav>
