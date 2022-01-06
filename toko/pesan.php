<?php

$server ="localhost";
$user ="root";
$pass ="";
$database="aman_cafe";

$koneksi =mysqli_connect ($server,$user,$pass,$database);
if(!$koneksi){
  die("Tidak tersambung");
}
$meja ="";
$jml="";
$sukses="";
$error="";

if(isset($_POST['pesan'])){
  $meja =$_POST['meja'];
  $jml =$_POST['jumlah']; 

  if($meja && $jml){
    $sql1 ="insert into tpsn (kodemeja,jmlh) values ('$meja','$jml') ";
    $q1 =mysqli_query($koneksi,$sql1);
    if($q1){
      $sukses ="pesanan  kamu akan segera di antar & pastikan kamu dapat bill dari pelayan kami ya :)";
    }else{
      $error ="pastikan pesanan kamu";
    }
  }else{
    $error ="pastikan pesanan kamu";
  }
}


?>
<!doctype html>
<html lang="en">
  <head>
    <!--  meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

    

    <title>Halaman pesanan</title>
  </head>
  <body style="background-color : antiquewhite;">
    <!--awal nav bar-->
    <nav class="navbar navbar-expand-lg navbar-light bg-warning shadow-lg ">
  <div class="container-fluid">
  <div class="container">
    <a class="navbar-brand" href="https://instagram.com/amansona_kopi?utm_medium=copy_link" >Aman sona coffee</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php" ><i class="fas fa-mug-hot"></i>Bar </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cerita.html"><i class="fas fa-history"></i>Cerita</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="daftar.php"><i class="fas fa-book"></i>Daftar</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav><br>

   <!--awal form-->
   <div class="container">
    <div class="card">
  <div class="card-header bg-primary text-white">
    Barista & Koki udah siap-siap nih!! pastikan pesanan mu ya
  </div>
  <div class="card-body">
    <?php
    if($error){
      ?>
      <div class="alert alert-danger" role="alert">
          <?php echo $error?>
      </div>
      <?php
      header("refresh:3;url=pesan.php");
    } 
    ?>
    <?php
    if($sukses){
      ?>
      <div class="alert alert-success" role="alert">
          <?php echo $sukses?>
      </div>
      <?php
      header("refresh:5;url=pesan.php");
    } 
    ?>

    <form method="POST" action="">
      <div class="form-group">
        <label>Kode Meja</label>
        <input type="text" name="meja" id="meja" class="form-control" placeholder="masukkan kode meja anda" value="<?php echo $meja ?>" >
      </div>
      <div class="form-group">
        <label>Jumlah pesanan</label>
        <input type="text" name="jumlah" id="jumlah" class="form-control" placeholder="masukkan jumlah pesanan  anda" value="<?php echo $jml ?>" >
      </div>
      <div class="form-group"><br> 
        <button type="submit" class="btn btn-success" id="pesan" name="pesan" value="pesan data" >Pastikan pesanan</button>
      </div><br>
      <a class="btn btn-primary" href="index.php" role="button">Pesan lagi</a>
   <!--ahir form-->

    <!--ahir nav bar-->

    <br><br>
<footer align="right" style="color:Dark Gray">Aman sona.INC</footer>

    <!-- java script bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>

  </body>
</html>