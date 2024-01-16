<?php
require_once('TCPDF-main/tcpdf.php');
// set connection
$conn = mysqli_connect("localhost", "root", "", "db_list_event");

// functions to simplify query execution
function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows=[];
    while($data=mysqli_fetch_assoc($result)){
        $rows[]=$data;
    }
    return $rows;
}

// function to search data
function cari($keyword){
	$query="SELECT * FROM event WHERE nama_event LIKE'%$keyword%' OR 
											lokasi LIKE'%$keyword%'";

	return query($query);
}

// Function to generate a formatted ID (USERxxx)
function generateUserID($number) {
    return 'USER' . str_pad($number, 3, '0', STR_PAD_LEFT);
}

// Function to get the latest user numeric ID from the database
function getLatestUserID($conn) {
    $result = mysqli_query($conn, "SELECT MAX(CAST(SUBSTRING(id_user, 5) AS UNSIGNED)) AS max_id FROM user");
    $row = mysqli_fetch_assoc($result);
    return $row['max_id'] ?? 0;
}
// Function to generate a formatted ID (USERxxx)
function generateTiketID($number) {
    return 'IDTIC' . str_pad($number, 3, '0', STR_PAD_LEFT);
}

// Function to get the latest user numeric ID from the database
function getLatestTiketId($conn) {
    $result = mysqli_query($conn, "SELECT MAX(CAST(SUBSTRING(id_tiket, 6) AS UNSIGNED)) AS max_id FROM tiket");
    $row = mysqli_fetch_assoc($result);
    return $row['max_id'] ?? 0;
}

// function registrasi
function registrasi($data){
	global $conn;
	
	$username = stripslashes($data['username']);
    $email = mysqli_real_escape_string($conn, $data['email']);
    $phone = mysqli_real_escape_string($conn, $data['phone']);
	$password = mysqli_real_escape_string($conn, $data['password']);
	$repeat_password = mysqli_real_escape_string($conn, $data['repeat_password']);
    $address = mysqli_real_escape_string($conn, $data['address']);

	// confirm if username already exist
	$result = mysqli_query($conn, "SELECT * FROM user WHERE nama_user = '$username'");
	
	if(mysqli_fetch_assoc($result)){
		echo "<script>
			alert('Username already used!');
			</script>";
		return false;
	}

	// confirm password
	if( $password !== $repeat_password ){
		echo "<script>
			alert('Konfirmasi password tidak sesuai');
			</script>";
		return false;
	}

    // Get the latest user numeric ID from the database
    $idUserLama = getLatestUserID($conn);

    // Increment the numeric ID for the new user
    $idUserBaru = $idUserLama + 1;
    
    // Generate the complete USERxxx ID
    $id = generateUserID($idUserBaru);
	
	// insert data
	mysqli_query($conn, "INSERT INTO user VALUES ('$id', '$username', '$email', '$phone' , '$password', '$address')");

	return mysqli_affected_rows($conn);
}

// function untuk checkout
// function checkout(){
//     global $conn;

//     $id_event = $_GET["id"];
//     $username = $_SESSION[" "];
//     $event_tgl = $_POST["hidden_tgl"];
//     $event_jam = $_POST["hidden_jam"];
//     $event_harga = $_POST["hidden_harga"];
//     $quantity = $_POST["quantity"];

//     // insert data
// 	mysqli_query($conn, "INSERT INTO user VALUES ('$id', '$username', '$email', '$phone' , '$password', '$address')");

//     return mysqli_affected_rows($conn);
// }
// Function to process orders
function checkout($data) {
    global $conn;

    foreach ($_SESSION["cart"] as $keys => $values) {
        $id_event = $values["id_event"];
        $event_lokasi = $values["event_lokasi"];
        $event_tgl = $values["event_tgl"];
        $event_jam = $values["event_jam"];
        $event_harga = $values["event_harga"];
        $event_quantity = $values["quantity"];
        $metode_pembayaran = $data['metode_bayar'];
        $username =$_SESSION['username'];

        $result = mysqli_query($conn, "SELECT * FROM user WHERE nama_user ='$username'");
        $row = mysqli_fetch_assoc($result); // Fetch the data
        $id_user = $row['id_user']; // Access the 'id_user' field from the fetched row
       
        // Get the latest user numeric ID from the database
        $idTiketLama = getLatestTiketId($conn);

        // Increment the numeric ID for the new user
        $idTiketBaru = $idTiketLama + 1;
        
        // Generate the complete USERxxx ID
        $id_tiket = generateTiketID($idTiketBaru);

        $query = "INSERT INTO tiket 
                VALUES ('$id_tiket', '$id_user', '$id_event', '$event_harga', '$event_quantity', '$event_tgl', '$metode_pembayaran', '$event_jam')";

        // insert data
        mysqli_query($conn, $query);
            
        $affectedRows = mysqli_affected_rows($conn);
         // Add checkout data to the array
         $checkoutData[] = [
            'id_tiket' => $id_tiket,
            'id_user' => $id_user,
            'id_event' => $id_event,
            'event_harga' => $event_harga,
            'event_quantity' => $event_quantity,
            'event_tgl' => $event_tgl,
            'metode_pembayaran' => $metode_pembayaran,
            'event_jam' => $event_jam,
        ];
    }
    return ['affected_rows' => $affectedRows, 'checkout_data' => $checkoutData];
}

function generatePDF($checkoutData) {
    // Extract values from the checkout data array
    $id_tiket = $checkoutData['id_tiket'];
    $id_user = $checkoutData['id_user'];
    $id_event = $checkoutData['id_event'];
    $event_harga = $checkoutData['event_harga'];
    $event_quantity = $checkoutData['event_quantity'];
    $event_tgl = $checkoutData['event_tgl'];
    $metode_pembayaran = $checkoutData['metode_pembayaran'];
    $event_jam = $checkoutData['event_jam'];

    // Rest of your PDF generation code...
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    // Set document information
    $pdf->SetCreator('Your Creator');
    $pdf->SetAuthor('Your Author');
    $pdf->SetTitle('Your Title');
    $pdf->SetSubject('Your Subject');

    // Add a page
    $pdf->AddPage();

    // Set font
    $pdf->SetFont('dejavusans', '', 12);

   // Add content to the PDF
    $html = '
    <style>
        .ticket {
            width: 100%;
            max-width: 400px; /* Adjust the width as needed */
            margin: 0 auto;
            border: 2px solid #000;
            padding: 10px;
            text-align: left;
        }

        .id-ticket {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .item {
            margin-bottom: 10px;
        }
    </style>

    <div class="ticket">
        <div class="id-ticket">ID Tiket: ' . $id_tiket . '</div>
        <div class="item"><strong>Name:</strong> ' . $id_user . '</div>
        <div class="item"><strong>Event:</strong> ' . $id_event . '</div>
        <div class="item"><strong>Price:</strong> ' . $event_harga . '</div>
        <div class="item"><strong>Quantity:</strong> ' . $event_quantity . '</div>
        <div class="item"><strong>Date:</strong> ' . $event_tgl . '</div>
        <div class="item"><strong>Payment Method:</strong> ' . $metode_pembayaran . '</div>
        <div class="item"><strong>Time:</strong> ' . $event_jam . '</div>
    </div>';

    // Continue with the existing code
    $pdf->writeHTML($html);

    // Specify the path to save the PDF file
    $pdfFilePath = 'C:/Users/Lenovo/Downloads/invoice_' . date('YmdHis') . '.pdf';

    // Save the PDF file
    $pdf->Output($pdfFilePath, 'F');

    // You may also want to store the PDF file name or path in your database or associate it with the user's order
    return $pdfFilePath;
}

?>