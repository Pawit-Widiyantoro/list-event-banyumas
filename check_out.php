<?php

session_start();

require("functions.php");
if(!isset($_SESSION['login_user'])){
  header("Location: login_user.php");
}

if(isset($_POST['checkout'])){
  if(checkout($_POST) > 0){
    echo "<script>
        alert('Tiket berhasil ditambahkan');
        window.location.href = 'done_checkout.php';
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
  <link rel="stylesheet" href="check_out.css" />
</head>

<body>
   <!-- nav -->
   <nav class="navbar navbar-expand-lg" style="background-color: #fff; height: 87px;">
    <div class="container-fluid">
      <a class="navbar-brand" href="#" id="list-event" style="display: flex; align-items: center;">
        <img src="./img/icons8-ticket-100 1.png" alt="" style="vertical-align: middle;">
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
                    <a class="nav-link" aria-current="page" href="home_page_user.html">Home</a>
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
                <span class="input-group-text border-0" id="search-addon">
                  <button id="queryButton" class="btn btn-outline-secondary" style="border: none;outline: none;" onclick="triggerSearch()">
                    <i class="fa fa-search"></i> <!-- Replace this with the appropriate Flaticon question mark icon -->
                  </button>
                  <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                </span>
            </div>
                <div class="d-flex align-items-center ms-auto">
                    <img src="./img/notification-2-line-1.svg" alt="" class="me-5">
                </div>
                <div class="d-flex align-items-center ms-auto">
                  <a href="cart.html">
                    <img src="./img/shopping-cart-fill-1-1.svg" alt="" class="me-5">
                    </a>
                </div>
                <div class="d-flex align-items-center ms-auto">
                    <img src="./img/account-pin-circle-fill-1-1.svg" alt="" width="50" height="50" class="me-5">
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

<?php
$gtotal = 0;
  foreach($_SESSION["cart"] as $keys => $values)
  {

    $id_event = $values["id_event"];
    $event_name = $values["event_name"];
    $event_poster = $values["event_poster"];
    $event_lokasi =  $values["event_lokasi"];
    $event_tgl =  $values["event_tgl"];
    $event_jam =  $values["event_jam"];
    $event_harga =  $values["event_harga"];
    $event_quantity =  $values["quantity"];
    $total = ($values["quantity"] * $values["event_harga"]);
    
    $gtotal = $gtotal + $total;
  }
?>


<!-- cards -->
<div>
  <div class="mt-5 mb-5">
    <h3 class="text-center" style="font-size: 20px;font-family: Just Bold, Helvetica;">Billing Details</h3>
  </div>
  <div>
    <div class="row text-center d-flex justify-content-center">
      <div class="col-md-4">
        <div class="card" style="border-color: #284b63;border-top-width: 6px;border-bottom-width: 6px;width: 472px;
        height: 411px;">
          <div class="card-body">
            <h5 class="card-title pt-3">CART TOTALS</h5>
          
              <p class="card-text" style="padding-top: 100px;">TOTAL : <?= $gtotal; ?></p>

          </div>
        </div>
      </div>
      <div class="col-md-4">
        <form action="" method="POST">
        <div class="card justify-content-center align-items-center" style="border-color: #284b63;border-top-width: 6px;border-bottom-width: 6px;width: 472px;
        height: 411px;">
          <div class="card-body" style=" width: 472px;height: 411px;">
            <h5 class="card-title pt-3">PAYMENT METHOD</h5>
            <br><br>
            <div style="padding-left: 30%;">
            <div class="d-flex mb-4 ">

              <input type="radio" name="metode_bayar" id="bank_transfer" value="bank_transfer">
              <label for="bank_transfer" class="ms-3">Bank Transfer</label>
            </div>
            <div class="d-flex mb-4 ">

              <input type="radio" name="metode_bayar" id="kartu_kredit" value="credit_card">
              <label for="kartu_kredit" class="ms-3">Credit Cards</label>
            </div>
            <div class="d-flex mb-4 ">

              <input type="radio" name="metode_bayar" id="mobile_payment" value="mobile_payment">
              <label for="mobile_payment" class="ms-3">Mobile Payment</label>
            </div>
            <div class="d-flex mb-4 ">

              <input type="radio" name="metode_bayar" id="cash" value="cash">
              <label for="cash" class="ms-3">Cash</label>
            </div>
          </div>
            <button type="submit" name="checkout" class="btn btn-primary btn-block" style="width: 362px;border-radius: 25px;background-color: #284b63;margin-top: 20px;height: 50px;">
              Place an Order
            </button>
          </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end cards -->

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
</div>
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