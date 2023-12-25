<?php 

require('functions.php');

    if(isset($_POST['register'])){
        if(registrasi($_POST) > 0){
            echo "<script>
                alert('User baru berhasil ditambahkan');
                window.location.href = 'login_user.php';
                </script>";
        }else{
            mysqli_error($conn);
        }
    }
?>

<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="globals.css" />
  <link rel="stylesheet" href="register_user.css" />
  <style>
    /* Adjust styling as needed */
    .login-section {
      padding: 50px;
    }

    .illustration-column {
      background-color: #fff; /* Change background color for illustration */
    }

    /* Style for the input fields */
  .form-control {
    border: none; /* Remove the default border */
    border-bottom: 1px solid #ced4da; /* Add a bottom border */
    border-radius: 0; /* Remove border radius */
    box-shadow: none; /* Remove any box shadow */
    padding: 8px 0; /* Adjust padding as needed */
    transition: border-color 0.2s; /* Add transition effect */
  }

  /* Style for the input fields when focused */
  .form-control:focus {
    outline: none; /* Remove the default focus outline */
    border-bottom-color: #495057; /* Change bottom border color on focus */
  }
  </style>
</head>

<body>
  <div class="container-fluid">
    <div class="row justify-content-center align-items-center me-5" style="margin-top: 50px;margin-bottom: 50px;">
      <!-- Column for illustration or image -->
      <div class="col-md-7 text-center">
        <!-- Add your image or illustration here -->
        <img src="./img/Mobile login-pana 1.png" alt="Illustration" style="width: 806px; height: 792px;overflow-clip-margin: content-box;
        overflow: clip;margin-left: 20px;">
      </div>
  
      <!-- Column for login form -->
      <div class="col-md-5">
        <div class="login-section text-center">
          <form class="login-form text-center" method="POST">
            <h2 class="mb-4 sign-in">Sign Up</h2>
            <p class="welcome-list">Welcome to List Event Banyumas</p>
            <div class="mb-4 d-inline-block text-center" style="width: 70%;">
              <!-- username -->
              <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
            </div>
            <div class="mb-4 d-inline-block text-center" style="width: 70%;">
              <!-- email -->
              <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
            </div>
            <div class="mb-4 d-inline-block text-center" style="width: 70%;">
              <!-- phone -->
              <input type="text" class="form-control" id="password" name="phone" placeholder="Phone Number" required>
            </div>
            <div class="mb-4 d-inline-block text-center" style="width: 70%;">
              <!-- password -->
              <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
            </div>
            <div class="mb-4 d-inline-block text-center" style="width: 70%;">
              <!-- password confirm -->
              <input type="password" class="form-control" id="password" name="repeat_password" placeholder="Repeat Password" required>
            </div>
            <div class="mb-4 d-inline-block text-center" style="width: 70%;">
              <!-- address -->
              <input type="text" class="form-control" id="password" name="address" placeholder="Address" required>
            </div>
            <button type="submit" name="register" class="btn btn-primary button-login" style="margin-top: 20px;">Register</button>
          </form>
          <p style="margin-top: 10px;" class="not-registered">Already Have Account? <a href="login_user.php" class="create-account">Login</a></p>
        </div>
      </div>
    </div>
  </div>
  
</body>

</html>