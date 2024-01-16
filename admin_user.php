<?php
session_start();
require 'pungsi.php';
//cek apakah sudah masuk ke dalam session melalui login
if(!isset($_SESSION["login"])){
  header("Location: login_admin.php");
  exit;
}

$user = query("SELECT * FROM user ORDER BY id_user DESC");

//tombol cari dklik
if(isset($_POST["cari"])){
  $user = cariUser($_POST["keyword"]);
}

?>

<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <!-- <link rel="stylesheet" href="globals.css" /> -->
  <link rel="stylesheet" href="admin_user.css" />
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
        <a href = "logout.php">
            <button class="btn badge bg-white me-5" style="border-radius: 20px;">
                <img src="./img/account-pin-circle-fill-1-1.svg" class="me-2" width="25" height="25" alt="User Icon"/>
                <img src="img/arrow-right-s-line 2.png" width="25" height="25" alt="Arrow Icon"/>
            </button>
        </a>
        </div>
    </div>
</nav>

<!-- main -->
<div class="container-fluid mt-5">
  <div class="row">
    <div style="width: 220px;">
      <div class="card" style="border-radius: 0; border-top: 10px solid #284b63;border-bottom: 10px solid #284b63;margin-top: 100px;">
        <div class="card-body mx-4 my-2">
          <a href="admin_user.php" class="mb-4 d-block text-decoration-none text-black" >User</a>
          <a href="admin_event.php" class="mb-4 d-block text-decoration-none text-black" >Event</a>
          <a href="admin_tiket.php" class="d-block text-decoration-none text-black" >Ticket</a>
        </div>
      </div>
    </div>
    <div class="col-md-10"> <!--mulai sini-->
      <div class="card" style="border-radius: 0;border-top: 10px solid #284b63;border-bottom: 10px solid #284b63;">
        <div class="card-body " style="margin: 0;padding: 0;">
          <nav class="navbar table-navbar " style="  
          height: 87px; background-color: #D9D9D9;;">
          <div class="container">

            <div class="custom-button">
              <button class="btn" style="background-color: white;">
                <a href="tambah_user.php" class="text-decoration-none text-black">
                  <img src="img/add-circle-fill 1.svg"/>
                 ADD NEW
                </a>
              </button>
            </div>
            <div class="table-title">User</div>
            <div class="search">

              <form action="" method="POST">
                <span class="input-group-text border-0" style="border-radius: 30px;" id="search-addon">
                  <button id="queryButton" name="cari" type="submit" class="btn btn-outline-secondary" style="border: none;outline: none;" onclick="triggerSearch()">
                    <i class="fa fa-search"></i> <!-- Replace this with the appropriate Flaticon question mark icon -->
                  </button>
                  <input type="text" name="keyword" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                </span>
                </form>
            </div>
          </div>
          </nav>
          <div>

            <table class="table table-striped">
              <thead>
                <th style="width: 80px;" class="text-center">Action</th>
                <th style="width: 60px;">id user</th>
                <th style="width: 150px;">nama user</th>
                <th style="width: 150px;">email</th>
                <th style="width: 100px;">no telp</th>
                <!-- <th style="width: 100px;">password</th> -->
                <th style="width: 150px;">alamat</th>

              </thead>
              <tbody class="align-middle">
                <?php ?>
                <?php foreach($user as $row): 
                ?>
                <tr>
                  <td class="text-center">
                  <a href="delete_user.php?id=<?= $row["id_user"];?>"onclick="return confirm('Yakin ingin menghapus data?');">
                    <img src="./img/close-circle-line 1.png" alt="">
                  </a>
                    <a href="edit_user.php?id=<?= $row["id_user"];?>">
                      <img src="./img/write.svg" alt="">
                    </a>
                  </td>  
                  <td><?=$row["id_user"];?></td>
                  <td><?=$row["nama_user"];?></td>
                  <td><?=$row["email"];?></td>
                  <td><?=$row["no_telp"];?></td>
                  
                  <td><?=$row["alamat"];?></td>
                </tr>
                <?php?>
                <?php endforeach; ?>
                
              </tbody>
            </table>
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