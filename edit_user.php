<?php
session_start();
require 'pungsi.php';
//cek apakah sudah masuk ke dalam session melalui login
if(!isset($_SESSION["login"])){
  header("Location: login_admin.php");
  exit;
}

//ambil data di URL
$id = $_GET["id"];

//query data user berdasarkan id
$usr = query("SELECT * FROM user WHERE id_user = '$id'")[0];

//cek apakah submit pernah diklik atau belum
if(isset($_POST["submit"])){

  //cek apakah data berhasil diubah atau tidak
  if(editUser($_POST) > 0){
    echo "<script>
    alert('Data user berhasil diubah!');
    document.location.href = 'admin_user.php';
    </script>";
  }else{
    echo "<script>
    alert('Data user gagal diubah!');
    document.location.href = 'admin_user.php';
    </script>";
  }
  
}

?>


<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <!-- <link rel="stylesheet" href="globals.css" /> -->
  <link rel="stylesheet" href="tambah_user.css" />
  <style>

  </style>
</head>

<body>
  <nav class="navbar custom-navbar navbar-expand-lg">
    <div class="container-fluid">
        <div class="navbar-brand custom-brand" style="margin-left: 100px;">
            <p>List</p>
            <p>Event</p>
            <p>Banyumas</p>
        </div>
        <div class="navbar-title text-center custom-title">
            Administrator
        </div>
        <div class="navbar-left ms-5">
            <button class="btn badge bg-white me-5" style="border-radius: 20px;">
                <img src="./img/account-pin-circle-fill-1-1.svg" class="me-2" width="25" height="25" alt="User Icon"/>
                <img src="img/arrow-right-s-line 2.png" width="25" height="25" alt="Arrow Icon"/>
            </button>
        </div>
    </div>
</nav>

<!-- main -->
<div class="container-fluid mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card" style="border-radius: 0;border-top: 10px solid #284b63;border-bottom: 10px solid #284b63;">
                <div class="card-body" style="margin: 0;padding: 0;">
                    <div class="table-title text-center p-3" style="  
                    height: 60px; background-color: #D9D9D9;">
                        <p>Edit User</p>
                    </div>
                    <div class="container" style="padding-right: 150px; padding-left: 150px;">

                        <form action="" method="post" class="my-5">
                        <input type="hidden" name="id">
                          <div class="mb-3">
                            <label class="form-label">id user</label>
                            <input type="text" name="id_user" class="form-control" aria-describedby="id_user" required value="<?= $usr["id_user"];?>">
                          </div>
                            <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">Nama User</label>
                              <input type="text" name="nama" class="form-control" aria-describedby="nama_user" required value="<?= $usr["nama_user"];?>">
                            </div>
                            <div class="mb-3">
                              <label for="email" class="form-label">Email</label>
                              <input type="email" name="email" class="form-control" id="email" required value="<?= $usr["email"];?>">
                            </div>
                            <div class="mb-3">
                              <label for="no_hp" class="form-label">No HP</label>
                              <input type="text" name="no_hp" class="form-control" id="no_hp" required value="<?= $usr["no_telp"];?>">
                            </div>
                            <div class="mb-3">
                              <label for="password" class="form-label">Password</label>
                              <input type="password" name="password" class="form-control" id="password" required value="<?= $usr["password"];?>">
                            </div>
                            <div class="mb-3">
                              <label for="alamat" class="form-label">Alamat</label>
                              <input type="alamat" name="alamat" class="form-control" id="alamat" required value="<?= $usr["alamat"];?>">
                            </div>
                            <div class="text-center">

                                <button type="submit" name="submit" class="btn text-white" style="background-color: #284b63;">Edit</button>
                            </div>
                          </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end main -->

  <!-- footer -->
  <footer class="align-items-center" style="background-color: #284b63; color: white; text-align: center;padding: 8px;margin-top: 30px;">
    <h3>List Event Banyumas</h3>
    <p>Explore Budaya dan Event Banyumas</p><br>
    <img src="./img/icons8-twitter-1.svg" alt="" style="background-image: url(./img/rectangle-30.svg);margin-left: 5px;padding-left: 5px;">
    <img src="./img/icons8-facebook-1.svg" alt="" style="background-image: url(./img/rectangle-30.svg);margin-left: 5px;padding-left: 5px;">
    <img src="./img/vector-14.svg" alt="" style="background-image: url(./img/rectangle-30.svg);margin-left: 5px;padding-left: 5px;">
    <img src="./img/vector-16.svg" alt="" style="background-image: url(./img/rectangle-30.svg);margin-left: 5px;padding-left: 5px;">
    <br><br><br>
    <img src="./img/vector-15.svg" alt="">
    <p>Copyright List Event Banyumas. All right reserved.</p>
  </footer>
  <!-- end footer -->
  
  
</body>

</html>