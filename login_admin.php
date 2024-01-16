<?php
session_start();
require 'pungsi.php';

//cek cookie udah atau belum
if(isset($_COOKIE['id']) && isset($_COOKIE['key'])){
  $id = $_COOKIE['id'];
  $key = $_COOKIE['key'];

  //ambil username berdasarkan id
  $result = mysqli_query($conn, "SELECT nama_admin FROM admin WHERE id_admin = $id");
  $row = mysqli_fetch_assoc($result);

  //cek cookie dan username
  if($key === hash('sha256', $row['nama_admin'])){
    $_SESSION['login'] = true;
  }
}

//cek session udah ada atau belum
if(isset($_SESSION["login"])){
  header("Location: admin_user.php");
  exit;
}

//cek tombol sudah diclick belum
if(isset($_POST["login"])){
  $username = $_POST["u"];
  $password = $_POST["p"];

  $result = mysqli_query($conn, "SELECT * FROM admin WHERE nama_admin = '$username'");

  //cek username
  if(mysqli_num_rows($result) === 1){
    
    //cek password 
    $row = mysqli_fetch_assoc($result);
    if ($password == $row["password"]){
    
      //set session
      $_SESSION["login"] = true;
      $_SESSION['nama_admin'] = $row['nama_admin'];

      //cek cookie remember me
      if(isset($_POST['remember'])){

        //buat cookie
        setcookie('id', $row['id'], time()+1800);
        setcookie('key',hash('sha256', $row['nama_admin']), time()+1800);
      }
      header("Location: admin_user.php");
      exit;
    }
  }

  $error = true;
}
?>


<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="globals.css" />
  <link rel="stylesheet" href="login_admin.css" />
</head>

<body>
  <div class="login-admin">
    <div class="div">
      <img class="key-rafiki" src="img/key-rafiki 1.svg" />
      <div class="sign-in">Sign In<br />Administrator</div>
      <p class="welcome-to-list">
        <span class="text-wrapper">Welcome to </span> <span class="span">List Event Banyumas</span>
      </p>
      <img class="line" src="img/line 6.svg" />
      <img class="img" src="img/line 7.svg" />
      <form method="post" action="">
        <input type="text" name="u" placeholder="Username" required="required" />
        <input type="password" name="p" placeholder="Password" required="required" />
        <?php if(isset($error)):?>
          <script>
          alert('Username / Password salah!');
          document.location.href = 'login_admin.php';
          </script>
        <?php endif; ?>
        <input type="checkbox" name="remember" id="remember" style="margin-top: 485px; margin-left: 915px;">    <!--html berantakan-->
        <label for="remember">Remember me</label>
        <div class="overlap-group">
          <div class="rectangle"><div class="text-wrapper-5"><button type="submit" name="login">Login</button></div></div>
        </div>
      </form>

    </div>
  </div>
</body>

</html>