<?php

session_start();
// cek apakah user sudah login
if(!isset($_SESSION['login_user'])){
  header("Location: login_user.php");
}

require("functions.php");
$events = query("SELECT * FROM event");

if(isset($_POST['cari'])){
  $events = cari($_POST['keyword']);
}
?>


<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="globals.css" />
  <link rel="stylesheet" href="home_page_user.css" />
</head>

<body>
   <!-- nav -->
   <nav class="navbar navbar-expand-lg" style="background-color: #fff; height: 87px;">
    <div class="container-fluid">
      <a class="navbar-brand" href="#" id="list-event" style="display: flex; align-items: center;">
        <img src="./img/poster" alt="" style="vertical-align: middle;">
        <div style="margin-left: 5px;">
            <div>List Event</div>
            <div style="margin-top: -5px;">Banyumas</div>
        </div>
      </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav  w-100 d-flex justify-content-center custom-navbar">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="home_page_user.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Event</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="category.html">Category</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"  href="gallery_event.html">Gallery Event</a>
                </li>
            </ul>
            <div class="d-flex flex-grow-1 rectangle-2" style="width: 900px;">
              <div class="input-group rounded">
                <form action="" method="POST">
                <span class="input-group-text border-0" id="search-addon">
                  <button id="queryButton" name="cari" type="submit" class="btn btn-outline-secondary" style="border: none;outline: none;" onclick="triggerSearch()">
                    <i class="fa fa-search"></i> <!-- Replace this with the appropriate Flaticon question mark icon -->
                  </button>
                  <input type="text" name="keyword" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                </span>
                </form>
            </div>
                <div class="d-flex align-items-center ms-auto">
                    <img src="./img/notification-2-line-1.svg" alt="" class="me-5">
                </div>
                <div class="d-flex align-items-center ms-auto">
                  <a href="cart.php">
                    <img src="./img/shopping-cart-fill-1-1.svg" alt="" class="me-5">
                    </a>
                </div>
                <div class="d-flex align-items-center ms-auto">
                  <a href="logout_user.php">
                    <img src="./img/account-pin-circle-fill-1-1.svg" alt="" width="50" height="50" class="me-5">
                  </a>
                  </div>
            </div>
        </div>
    </div>
</nav>
<!-- end nav -->

<div style="background-color: #C9ccd6; margin-bottom: 5px; display: flex;align-items: center; ">
  <img src="./img/1792-1.png" alt="">
  <h1 class="cart-brand" >SCHEDULE OF EVENTS</h1>
</div>

<!-- card -->
<div class="container mt-5">
  <div class="row">
    <?php

      foreach($events as $event):

    ?>
      <div class="col-md-3 mb-5">
          <div class="card custom-card" style="width: 243px;height: 348px;">
              <img src="img/<?= $event['poster']; ?>" class="custom-img-top" alt="Card Image">
              <div class="card-body" style="flex-grow: 1;">
                  <div class="container-card">
                    <div class="item">
                      <img src="./img/Vector.svg" alt="" width="15" height="15">
                      <p><?= $event['lokasi']; ?></p>
                    </div>
                    <div class="item">
                      <img src="./img/calendar-event-line.svg" alt="" width="15" height="15">
                      <p><?= $event['tgl_event']; ?></p>
                    </div>
                    <div class="item">
                      <img src="./img/timer-2-line.svg" alt="" width="15" height="15">
                      <p><?= $event['jam']; ?></p>
                    </div>
                  </div>                 
                </div>
                <div class="d-flex justify-content-end">               
                  <a href="detail_event.php?id=<?=$event['id_event']; ?>" class="custom-badge">Detail</a>
              </div>
          </div>
      </div>
      <?php endforeach; ?>
<!-- end card -->
</div>
      </div>
<!-- footer -->
<footer class="align-items-center" style="background-color: #284b63; color: white; text-align: center;padding: 8px;margin-top: 30px;">
  <h3>List Event Banyumas</h3>
  <p>Lorem ipsum dolor sit amet.</p><br>
  <img src="./img/icons8-twitter-1.svg" alt="" style="background-image: url(./img/rectangle-30.svg);margin-left: 5px;padding-left: 5px;">
  <img src="./img/icons8-facebook-1.svg" alt="" style="background-image: url(./img/rectangle-30.svg);margin-left: 5px;padding-left: 5px;">
  <img src="./img/vector-14.svg" alt="" style="background-image: url(./img/rectangle-30.svg);margin-left: 5px;padding-left: 5px;">
  <img src="./img/vector-16.svg" alt="" style="background-image: url(./img/rectangle-30.svg);margin-left: 5px;padding-left: 5px;">
  <br><br><br>
  <p>Copyright List Event Banyumas. All right reserved.</p>
</footer>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      var detailLinks = document.querySelectorAll('.text-wrapper-3, .text-wrapper-6, .text-wrapper-9, .text-wrapper-12, .text-wrapper-15, .text-wrapper-18, .text-wrapper-21, .text-wrapper-24, .text-wrapper-27, .text-wrapper-30, .text-wrapper-33, .text-wrapper-36, .text-wrapper-40');

      // Add click event listener to each "Detail" link
      detailLinks.forEach(function (link) {
        link.addEventListener('click', function () {
          // Navigate to the "detail_event.html" page
          window.location.href = 'detail_event.html';
        });
      });

      var categoryLinks = document.querySelectorAll('.text-wrapper-44, .text-wrapper-45, .text-wrapper-46, .text-wrapper-47, .text-wrapper-48, .text-wrapper-49');

      // Add click event listener to each "category" link
      categoryLinks.forEach(function (link) {
        link.addEventListener('click', function () {
          // Navigate to the "category.html" page
          window.location.href = 'category.html';
        });
      });

      // Get the element with the class "arrow-right-s-line"
      var galleryLink = document.querySelector('.arrow-right-s-line');

      // Add click event listener to the "arrow-right-s-line" icon
      galleryLink.addEventListener('click', function () {
        // Navigate to the "gallery_event.html" page
        window.location.href = 'gallery_event.html';
      });

      var galleryLink = document.querySelector('.shopping-cart-fill');

      // Add click event listener to the "shopping-cart-fill" icon
      galleryLink.addEventListener('click', function () {
        // Navigate to the "cart.html" page
        window.location.href = 'cart.html';
      });

      // Get the element with the class "account-pin-circle"
      var logoutLink = document.querySelector('.account-pin-circle');

      // Add click event listener to the "account-pin-circle" icon
      logoutLink.addEventListener('click', function () {
        // Use the confirm dialog to ask for user confirmation
        var userConfirmed = confirm('Anda akan logout. Apakah Anda yakin ingin kembali ke halaman utama?');

        // If the user confirms, navigate to the "Landing_Page.html" page
        if (userConfirmed) {
          window.location.href = 'Landing_Page.html';
        }
      });
    });

  </script>
</body>

</html>