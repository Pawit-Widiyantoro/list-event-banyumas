<?php
require 'functions.php';

//cek apakah submit pernah diklik atau belum
if(isset($_POST["submit"])){

  //cek apakah data berhasil ditambahkan atau tidak
  if(tambahUser($_POST) > 0){
    echo "<script>
    alert('Data user baru berhasil ditambahkan!');
    document.location.href = 'admin_user.php';
    </script>";
  }else{
    echo "<script>
    alert('Data user baru gagal ditambahkan!');
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
                        <p>Tambah Tiket</p>
                    </div>
                    <div class="container" style="padding-right: 150px; padding-left: 150px;">

                        <form action="" method="post" class="my-5">
                            <div class="mb-3">
                              <label class="form-label">id user</label>
                              <input type="text" name="id_user" class="form-control" aria-describedby="id_user" required>
                            </div>
                            <div class="mb-3">
                              <label class="form-label">Tgl Event</label>
                              <input type="date" name="tgl_event" class="form-control" aria-describedby="tgl_event" required>
                            </div>
                            <div class="mb-3">
                              <label for="jam" class="form-label">Jam</label>
                              <input type="time" name="jam" class="form-control" id="jam" required>
                            </div>
                            <div class="mb-3">
                              <label for="jumlah_tiket" class="form-label">Jumlah Tiket</label>
                              <input type="text" name="jumlah_tiket" class="form-control" id="jumlah_tiket" required>
                            </div>
                            <div class="mb-3">
                              <label for="harga_tiket" class="form-label">Harga Tiket</label>
                              <input type="harga_tiket" name="harga_tiket" class="form-control" id="harga_tiket" required>
                            </div>
                            <div class="mb-3">
                              <label for="metode_pembayaran" class="form-label">Metode Pembayaran</label>
                              <input type="text" name="metode_pembayaran" class="form-control" id="metode_pembayaran" required>
                            </div>
                            <div class="text-center">

                                <button type="submit" class="btn text-white" style="background-color: #284b63;">Tambah</button>
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
    <p>Lorem ipsum dolor sit amet.</p><br>
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