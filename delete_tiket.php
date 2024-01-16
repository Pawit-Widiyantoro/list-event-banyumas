<?php
session_start();
require 'pungsi.php';
//cek apakah sudah masuk ke dalam session melalui login
if(!isset($_SESSION["login"])){
  header("Location: login_admin.php");
  exit;
}

$id = $_GET["id"];

if(hapusTiket($id) > 0){
  echo "<script>
  alert('Data tiket berhasil dihapus!');
  document.location.href = 'admin_tiket.php';
  </script>";
}else{
  echo "<script>
  alert('Data tiket gagal dihapus!');
  document.location.href = 'admin_tiket.php';
  </script>";
}
?>