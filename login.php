<?php include('includes/auth-header.php') ?>

<body class="hold-transition login-page">
  <div class="mb-4 text-center">
    <div class="my-3">
      <img src="assets/images/khalid.jpg" width="200" alt="Dr. Khalid">
    </div>
    <h4>Dr. Khalid Maqbool Siddiqui, Convener</h4>
    <h5>NA 248/ PS 123-P, 124-P,125-P & 126-P</h5>
    <h5>Complaint Portal</h5>
  </div>
  <div class="login-box">

    <div class="card">
      <div class="card-body login-card-body">
        <div class="text-center mt-2 mb-3">
          <img src="assets/images/logo.png" width="90" alt="logo">
        </div>
        <p class="login-box-msg">Login Form</p>

        <form class="forms-sample" name="login">
          <div class="input-group mb-3">
            <input type="email" class="form-control" name="email" placeholder="Email" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" name="password" placeholder="Password" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-block">Sign In</button>
        </form>

        <!-- <p class="mb-1">
          <a href="forgot-password.html">I forgot my password</a>
        </p> -->
        <p class="mt-3 text-center">
          <a href="register.php" class="text-center">Register a new account.</a>
        </p>
      </div>
    </div>
  </div>

<?php include('includes/auth-footer.php') ?>

<script>
  $("form[name='login']").submit(function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    $.ajax({
      url: "actions/action-login.php",
      type: 'POST',
      dataType: 'json',
      data: formData,
      success: function(data) {
        if (data == 'false') {
          Swal.fire("Error!", "Wrong Details!", "error");
        }else if(data == 'User'){
          location.href = "send-complaint.php";
        }else if(data == 'Admin' || data == 'Super Admin'){
          location.href = "complaint-list.php";
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
