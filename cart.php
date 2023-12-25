<?php

session_start();

if(!isset($_SESSION['login_user'])){
  header("Location: login_user.php");
}
// Check the individual hidden input values
// if (isset($_POST['hidden_name'])) {
//   $hiddenName = $_POST['hidden_name'];
//   echo "Hidden Name: " . $hiddenName . "<br>";
// }
// if (isset($_POST['hidden_poster'])) {
//   $hiddenPoster = $_POST['hidden_poster'];
//   echo "Hidden Name: " . $hiddenPoster . "<br>";
// }

// if (isset($_POST['hidden_lokasi'])) {
//   $hiddenLokasi = $_POST['hidden_lokasi'];
//   echo "Hidden Price: " . $hiddenLokasi . "<br>";
// }

// if (isset($_POST['hidden_tgl'])) {
//   $hiddenTgl = $_POST['hidden_tgl'];
//   echo "Hidden RID: " . $hiddenTgl . "<br>";
// }
// if (isset($_POST['harga'])) {
//   $hiddenHarga = $_POST['harga'];
//   echo "Hidden RID: " . $hiddenHarga . "<br>";
// }

// if (isset($_POST['kuantitas'])) {
//   $kuantitas = $_POST['quantity'];
//   echo "Quantity: " . $quantity . "<br>";
// }

// // Check the GET parameter (id) received in the URL
// if (isset($_GET['id_event'])) {
//   $id_event = $_GET['id'];
//   echo "Food ID (GET param): " . $id_event . "<br>";
// }

// // Display the entire $_POST array for debugging purposes
// echo "<pre>";
// print_r($_POST); // Print the entire POST array
// echo "</pre>";

require('functions.php');

?>
<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="globals.css" />
  <link rel="stylesheet" href="cart.css" />
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
  <h1 class="cart-brand" >CART</h1>
</div>

<!-- table -->
<?php
$total = 0;
if(!empty($_SESSION['cart'])){

?>
<div class="table-items-center" style="width: 90%;margin-top: 30px;">
  <table class="table-head" style="width: 100%; text-align: center;">
    <thead style="margin-bottom: 10px;">
      <tr class="">
        <th ></th>
        <th >Product</th>
        <th >Price</th>
        <th >Quantity</th>
        <th >Total</th>
      </tr>
    </thead>
    <?php
    
    
    foreach($_SESSION['cart'] as $keys => $values):
    
    ?>

    <tbody class="mt-10">
      <tr>
        <td><a href="cart.php?action=delete&id=<?= $values['id_event']; ?>"><img src="./img/close-circle-line 1.png" alt=""></a></td>
        <td><img src="./img/<?= $values['event_poster']; ?>" alt="" width="150" height="200" style="margin-top:10px;margin-bottom:10px;object-fit:cover;"></td>
        <td><?= $values['event_harga']; ?></td>
        <td><div class="cart-item">
          
          <span class="item-count"><?= $values['quantity']; ?></span>
          
          </div></td>

        <td>Rp. <?= number_format($values["quantity"] * $values["event_harga"], 2); ?></td>
      </tr>
    </tbody>

    <?php
    
    $total= $total + ($values["quantity"] * $values["event_harga"]);
    endforeach;

    ?>

  </table>
  </div>
  <?php

  } 
  if(empty($_SESSION["cart"]))
{
  ?>
    <div>
    <h2 class="justify-content-center align-items-center text-center">Cart still empty!</h2>
  </div>
  <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <?php
}
?>


  <!-- end table -->


<!-- create session -->

<?php



if(isset($_POST["add"]))
{
  if(isset($_SESSION["cart"]))
  {
    $item_array_id = array_column($_SESSION["cart"], "id_event");
    if(!in_array($_GET["id"], $item_array_id))
    {
      $count = count($_SESSION["cart"]);

      $item_array = array(
      'id_event' => $_GET["id"],
      'event_name' => $_POST["hidden_name"],
      'event_poster' => $_POST["hidden_poster"],
      'event_lokasi' => $_POST["hidden_lokasi"],
      'event_tgl' => $_POST["hidden_tgl"],
      'event_jam' => $_POST["hidden_jam"],
      'event_harga' => $_POST["hidden_harga"],
      'quantity' => $_POST["quantity"]
      );
      $_SESSION["cart"][$count] = $item_array;
      echo '<script>window.location="cart.php"</script>';
      // echo '<script>window.location.reload(true);</script>';
    }
    else
    {
      // echo '<script>window.location.reload(true);</script>';
      echo '<script>alert("Products already added to cart")</script>';
      echo '<script>window.location="cart.php"</script>';
    }
  }
  else
  {
    $item_array = array(
      'id_event' => $_GET["id"],
      'event_name' => $_POST["hidden_name"],
      'event_poster' => $_POST["hidden_poster"],
      'event_lokasi' => $_POST["hidden_lokasi"],
      'event_tgl' => $_POST["hidden_tgl"],
      'event_jam' => $_POST["hidden_jam"],
      'event_harga' => $_POST["hidden_harga"],
      'quantity' => $_POST["quantity"]
    );
    $_SESSION["cart"][0] = $item_array;
  }
}


if(isset($_GET["action"]))
{
  if($_GET["action"] == "delete")
  {
    foreach($_SESSION["cart"] as $keys => $values)
    {
      if($values["id_event"] == $_GET["id"])
    {
      unset($_SESSION["cart"][$keys]);
      echo '<script>alert("Food has been removed")</script>';
      echo '<script>window.location="cart.php"</script>';
    }
    }
  }
}


?>

<!-- end create session -->


  <!-- Card -->
  
  <div class="row" style="margin-top: 50px;">
    <div class="col-md-8">
      <div style="height: 100%;"></div>
    </div>
    <div class="col-md-4">

    <!-- foreach -->

   
      <div class="card bottom-0 end-0 mb-4" style="border-color: #284b63;border-top-width: 5px;">    
        <div class="card-body text-center" style="height: 100%;">
            <!-- Card content -->
            <h5 class="card-title" style="color: #284b63;">CART TOTALS</h5><br>
            <hr><br>
            <p class="card-text" style="letter-spacing: 5px;">Total : <?= $total; ?></p><br><br>
        </div>
        <div class="card-footer text-center" style="border-color: #284b63;border-top-width: 5px;">
            <!-- Button in card footer -->
            <button type="button" class="btn btn-primary btn-block" style="width: 80%;border-radius: 20px;background-color: #284b63;">
              <a href="check_out.php" class="text-decoration-none text-white" name="proceed_checkout">Proceed to Checkout</a>
            </button>
        </div>
        <!-- </form> -->
        <!-- endforeach -->
      </div>
    </div>
  </div>
  
<!-- end card -->

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
  <!-- end footer -->
</div>




<script>
  function incrementItem(element) {
      let itemCountElement = element.parentElement.querySelector('.item-count');
      let itemCount = parseInt(itemCountElement.textContent);
      itemCount++;
      itemCountElement.textContent = itemCount;
  }

  function decrementItem(element) {
      let itemCountElement = element.parentElement.querySelector('.item-count');
      let itemCount = parseInt(itemCountElement.textContent);
      if (itemCount > 1) {
          itemCount--;
          itemCountElement.textContent = itemCount;
      }
  }
</script>

</body>

</html>