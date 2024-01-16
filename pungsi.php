<?php
//koneksikan ke db
$conn = mysqli_connect("localhost", "root", "", "db_list_event");

//fungsi query
function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

//function hapus user
function hapusUser($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM user WHERE id_user = '$id'");
    return mysqli_affected_rows($conn);
}

//function hapus event
function hapusEvent($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM event WHERE id_event = '$id'");
    return mysqli_affected_rows($conn);
}

//function hapus tiket
function hapusTiket($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM tiket WHERE id_tiket = '$id'");
    return mysqli_affected_rows($conn);
}

//function edit user
function editUser($data){
    global $conn;

    $id = $data["id_user"];
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $hp = htmlspecialchars($data["no_hp"]);
    $password = htmlspecialchars($data["password"]);
    $alamat = htmlspecialchars($data["alamat"]);

    //query insert data
    $query = "UPDATE user SET
                nama_user = '$nama',
                email = '$email',
                no_telp = '$hp',
                password = '$password',
                alamat = '$alamat'
                WHERE id_user = '$id'";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

//fungsi upload
function upload(){
    $namaFile = $_FILES['poster']['name'];
    $ukuranFile = $_FILES['poster']['size'];
    $error = $_FILES['poster']['error'];
    $tmpName = $_FILES['poster']['tmp_name'];

    //cek ada gambar diupload atau tidak
    if($error === 4){
        echo "<script>
        alert('Mohon upload gambar terlebih dahulu')
        </script>";
        return false;
    }

    //cek apakah yang diupload berupa gambar atau bukan
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if(!in_array($ekstensiGambar, $ekstensiGambarValid)){
        echo "<script>
        alert('Mohon upload file jpg, jpeg, atau png!')
        </script>";
        return false;
    }

    //cek jika ukrannya terlalu besar
    if($ukuranFile > 2000000){
        echo "<script>
        alert('Ukuran gambar terlalu besar!')
        </script>";
        return false;
    }

    //gambar siap diupload
    //generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;


    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
    return $namaFileBaru;

}

//function edit event
function editEvent($data){
    global $conn;

    $id = $data["id_event"];
    $nama = htmlspecialchars($data["nama_event"]);
    $tgl = htmlspecialchars($data["tgl_event"]);
    $lokasi = htmlspecialchars($data["lokasi"]);
    $jam = htmlspecialchars($data["jam"]);
    $harga = htmlspecialchars($data["harga_tiket"]);
    $deskripsi = htmlspecialchars($data["deskripsi_event"]);
    $posterLama = htmlspecialchars($data["posterLama"]);

    //cek apakah user pilih gambar baru atau tidak
    if($_FILES['poster']['error'] === 4){
        $poster = $posterLama;
    }else{
        $poster = upload();
    }

    //query insert data
    $query = "UPDATE event SET
                nama_event = '$nama',
                tgl_event = '$tgl',
                deskripsi_event = '$deskripsi',
                lokasi = '$lokasi',
                harga_tiket = '$harga',
                poster = '$poster',
                jam = '$jam'
                WHERE id_event = '$id'";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// Function to get the latest user numeric ID from the database
function getLatestUserID($conn) {
    $result = mysqli_query($conn, "SELECT MAX(CAST(SUBSTRING(id_user, 5) AS UNSIGNED)) AS max_id FROM user");
    $row = mysqli_fetch_assoc($result);
    return $row['max_id'] ?? 0;
}
// Function to generate a formatted ID (USERxxx)
function generateUserID($number) {
    return 'USER' . str_pad($number, 3, '0', STR_PAD_LEFT);
}

//fungsi tambah user
function tambahUser($data){
    global $conn;

    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $hp = htmlspecialchars($data["hp"]);
    $password = htmlspecialchars($data["password"]);
    $alamat = htmlspecialchars($data["alamat"]);

    // Get the latest user numeric ID from the database
    $idUserLama = getLatestUserID($conn);

    // Increment the numeric ID for the new user
    $idUserBaru = $idUserLama + 1;
    
    // Generate the complete USERxxx ID
    $id = generateUserID($idUserBaru);

    //query insert data
    $query = "INSERT INTO user
                VALUES ('$id', '$nama', '$email', '$hp', '$password', '$alamat')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// Function to get the latest event numeric ID from the database
function getLatestEventID($conn) {
    $result = mysqli_query($conn, "SELECT MAX(CAST(SUBSTRING(id_event, 6) AS UNSIGNED)) AS max_id FROM event");
    $row = mysqli_fetch_assoc($result);
    return $row['max_id'] ?? 0;
}
// Function to generate a formatted ID (EVENTxxx)
function generateEventID($number) {
    return 'EVENT' . str_pad($number, 3, '0', STR_PAD_LEFT);
}

//fungsi tambah event
function tambahEvent($data){
    global $conn;

    $nama = htmlspecialchars($data["nama_event"]);
    $tgl = htmlspecialchars($data["tgl"]);
    $lokasi = htmlspecialchars($data["lokasi"]);
    $jam = htmlspecialchars($data["jam"]);
    $harga = htmlspecialchars($data["harga_tiket"]);
    $deskripsi = htmlspecialchars($data["deskripsi_event"]);

    //upload gambar
    $poster = upload();
    if(!$poster){
        return false;
    }

    // Get the latest user numeric ID from the database
    $idEventLama = getLatestEventID($conn);

    // Increment the numeric ID for the new user
    $idEventBaru = $idEventLama + 1;
    
    // Generate the complete USERxxx ID
    $id = generateEventID($idEventBaru);

    //query insert data
    $query = "INSERT INTO event
                VALUES ('$id', '$nama', '$tgl', '$deskripsi', '$lokasi', '$harga', '$poster', '$jam')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

//cari user
function cariUser($keyword){
    $query = "SELECT * FROM user WHERE
               nama_user LIKE '%$keyword%' OR
               id_user LIKE '%$keyword%'
               ";

    return query($query);
}

//cari event
function cariEvent($keyword){
    $query = "SELECT * FROM event WHERE
               nama_event LIKE '%$keyword%' OR
               id_event LIKE '%$keyword%'
               ";

    return query($query);
}

//cari tiket
function cariTiket($keyword){
    $query = "SELECT * FROM tiket WHERE
               id_tiket LIKE '%$keyword%' OR
               id_user LIKE '%$keyword%' OR
               id_event LIKE '%$keyword%'
               ";

    return query($query);
}
?>