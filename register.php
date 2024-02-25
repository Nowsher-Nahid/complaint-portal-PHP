<?php include('includes/auth-header.php') ?>

<body class="hold-transition register-page">
  <div class="mb-4 text-center">
    <div class="my-3">
      <img src="assets/images/khalid.jpg" width="200" alt="Dr. Khalid">
    </div>
    <h4>Dr. Khalid Maqbool Siddiqui, Convener</h4>
    <h5>NA 248/ PS 123-P, 124-P,125-P & 126-P</h5>
    <h5>Complaint Portal</h5>
  </div>
  <div class="register-box mb-5">

    <div class="card">
      <div class="card-body register-card-body">
        <div class="text-center mt-2 mb-3">
          <img src="assets/images/logo.png" width="90" alt="logo">
        </div>
        <p class="login-box-msg">Create an account</p>

        <form class="forms-sample" name="register">
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="name" placeholder="Full name" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="email" class="form-control" name="email" placeholder="Email" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="phone" placeholder="Phone number" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-phone"></span>
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
          <button type="submit" class="btn btn-primary btn-block">Register</button>
        </form>

        <div class="text-center mt-3">
          <a href="login.php" class="text-center">I already have an account</a>
        </div>
      </div>

    </div>
  </div>


<?php include('includes/auth-footer.php') ?>

<script>
  $("form[name='register']").submit(function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    $.ajax({
      url: "actions/action-register.php",
      type: 'POST',
      dataType: 'json',
      data: formData,
      success: function(data) {
        if (data == 'true') {
          Swal.fire({
            title: 'Registation successful.',
            icon: 'success',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Go to login'
            }).then((result) => {
              if (result.value) {
                  location.href = "login.php";
                 }
             });
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
