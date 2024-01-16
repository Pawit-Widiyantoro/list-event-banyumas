<?php
session_start();
require 'pungsi.php';
//cek apakah sudah masuk ke dalam session melalui login
if(!isset($_SESSION["login"])){
  header("Location: login_admin.php");
  exit;
}

$id = $_GET["id"];

if(hapusUser($id) > 0){
    echo "<script>
    alert('Data user berhasil dihapus!');
    document.location.href = 'admin_user.php';
    </script>";
  }else{
    echo "<script>
    alert('Data user gagal dihapus!');
    document.location.href = 'admin_user.php';
    </script>";
}

?>