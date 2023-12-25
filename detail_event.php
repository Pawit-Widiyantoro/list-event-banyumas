<?php 

session_start();

if(!isset($_SESSION['login_user'])){
  header("Location: login_user.php");
}

require('functions.php');

$id=$_GET['id'];
$event = query("SELECT * From event WHERE id_event='$id'")[0];
$events = query("SELECT * FROM event");

?>
<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="globals.css" />
  <link rel="stylesheet" href="detail_event.css" />
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
                <span class="input-group-text border-0" id="search-addon">
                  <button name="search" id="queryButton" class="btn btn-outline-secondary" style="border: none;outline: none;" onclick="triggerSearch()">
                    <i class="fa fa-search"></i> <!-- Replace this with the appropriate Flaticon question mark icon -->
                  </button>
                  <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" name="keyword"/>
                </span>
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
  <h1 class="cart-brand" >EVENT</h1>
</div>

<!-- detail -->
<form action="cart.php?action=add&id=<?= $event['id_event']; ?>" method="POST">

<div class="row justify-content-center" style="margin-top: 50px;">
  <div class="col-md-3 offset-md-1">
    <img src="./img/<?= $event['poster']; ?>" alt="Image" class="img-fluid">
    <input type="hidden" name="hidden_poster" value="<?= $event['poster']; ?>">
  </div>
  <div class="col-md-4">
    <div class="description">
      <div>
        <h3>upcoming event</h3>
        <h2 style="color: #284b63;"><?= $event['nama_event']; ?></h2>
        <input type="hidden" name="hidden_name" value="<?= $event['nama_event']; ?>">
      </div>
      <div class="item d-flex align-items-center">
        <img src="./img/Vector.svg" alt="" width="15" height="15">
        <p class="mb-0 ml-2"><?= $event['lokasi']; ?></p>
        <input type="hidden" name="hidden_lokasi" value="<?= $event['lokasi']; ?>">
      </div>
      <div class="item d-flex align-items-center">
        <img src="./img/calendar-event-line.svg" alt="" width="15" height="15">
        <p class="mb-0 ml-2"><?= $event['tgl_event']; ?></p>
        <input type="hidden" name="hidden_tgl" value="<?= $event['tgl_event']; ?>">
      </div>
      <div class="item d-flex align-items-center">
        <img src="./img/timer-2-line.svg" alt="" width="15" height="15">
        <p class="mb-0 ml-2"><?= $event['jam']; ?></p>
        <input type="hidden" name="hidden_jam" value="<?= $event['jam']; ?>">
    </div>
      <div class="item d-flex align-items-center">
        <div class="item d-flex align-items-center">
        <img src="./img/price-tag-3-line 1.svg" alt="" width="15" height="15">
        <p class="mb-0 ml-2"><?= $event['harga_tiket']; ?></p>
        <input type="hidden" name="hidden_harga" value="<?= $event['harga_tiket']; ?>">
        </div>
        <div class="item d-flex align-items-center ms-5">
        <img src="./img/ticket-line 1.svg" alt="" width="15" height="15">
        <p class="mb-0 ml-2">200</p>
        </div>
    </div>
    <div class="mb-3">
      <p>Jumlah Tiket:</p>

      <input type="number" name="quantity" id="" min="1" style="border: 1px solid #ccc;
      border-radius: 4px;
      font-size: 16px;
      width: 100px;">

    </div>
    <button class="btn custom-button" name="add">
      <img src="./img/shopping-cart-fill.svg" alt="" class="btn-icon">
      <span class="btn-text">Add to Cart</span>
    </button>
  </div>
</div>

</form>

<!-- end detail -->

<!-- about event -->
<div style="margin-top: 50px;">
<div class="container" style="width: 1341px;
height: 59px;
background-color: #d9d9d9;
border-radius: 5px;">
<h2 style="padding-top: 8px;padding-left: 8px;font-size: 24px;">About Event</h2>
</div>
<div class="container text-center" style="margin-top: 50px;margin-bottom: 100px;"><?= $event['deskripsi_event']; ?></div>
</div>
<!-- end about event -->


<!-- card -->
<div class="container-fluid mt-5" style="background-color: #D9D9D9;width: 95%;padding-bottom: 100px;">
  <h2 style="text-align: center;margin-bottom: 60px;padding-top:40px;">Upcoming Event</h2>
  <div class="row">
  <?php
  
  foreach($events as $e):
  
  ?>
      <div class="col-md-3 mb-5 text-center">
          <div class="card custom-card mx-auto mx-auto" style="width: 243px;height: 348px;">
              <img src="./img/<?= $e['poster']; ?>" class="custom-img-top" alt="Card Image">
              <div class="card-body" style="flex-grow: 1;">
                  <div class="container-card">
                    <div class="item">
                      <img src="./img/Vector.svg" alt="" width="15" height="15">
                      <p><?= $e['lokasi']; ?></p>
                    </div>
                    <div class="item">
                      <img src="./img/calendar-event-line.svg" alt="" width="15" height="15">
                      <p><?= $e['tgl_event']; ?></p>
                    </div>
                    <div class="item">
                      <img src="./img/timer-2-line.svg" alt="" width="15" height="15">
                      <p><?= $e['jam']; ?></p>
                    </div>
                  </div>                 
                </div>
                <div class="d-flex justify-content-end">               
                  <a href="detail_event.html" class="custom-badge">Detail</a>
              </div>
          </div>
      </div>

      
<?php
  endforeach;
?>
      <!-- Repeat this col-md-3 div for the next three cards in the second row -->
  </div>
</div>

<!-- end card -->
  <!-- footer -->
  <footer class="align-items-center container-fluid" style="background-color: #284b63; color: white; text-align: center;padding: 8px;width: 95%;">
    <h3>List Event Banyumas</h3>
    <p>Lorem ipsum dolor sit amet.</p><br>
    <img src="./img/icons8-twitter-1.svg" alt="" style="background-image: url(./img/rectangle-30.svg);margin-left: 5px;padding-left: 5px;">
    <img src="./img/icons8-facebook-1.svg" alt="" style="background-image: url(./img/rectangle-30.svg);margin-left: 5px;padding-left: 5px;">
    <img src="./img/vector-14.svg" alt="" style="background-image: url(./img/rectangle-30.svg);margin-left: 5px;padding-left: 5px;">
    <img src="./img/vector-16.svg" alt="" style="background-image: url(./img/rectangle-30.svg);margin-left: 5px;padding-left: 5px;">
    <br><br><br>
    <p>Copyright List Event Banyumas. All right reserved.</p>
  </footer>
  <!-- end footer -->


</div>
<script>
  // Check if the action is 'add' (after form submission)
  const urlParams = new URLSearchParams(window.location.search);
  const action = urlParams.get('action');
  
  // If the action is 'add', refresh the cart.php page
  if (action === 'add') {
    window.location.href = 'cart.php';
  }
</script>
</body>