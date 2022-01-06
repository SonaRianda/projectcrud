   <?php
   //koneksi ke data base
   $server ="localhost";
   $user ="root";
   $pass ="";
   $database ="aman_cafe";

   $koneksi = mysqli_connect($server, $user ,$pass ,$database)or die(my_sqli_error($koneksi));


   //tombol simpan
   $nama ="";
   $email ="";
   $alamat ="";
   $kelamin ="";
   $sukses ="";
   $error ="";

   if(isset($_GET['hal'])){
     $hal =$_GET['hal'];
   }else{
     $hal="";
   }

   if($hal == 'delete'){
     $id =$_GET['id'];
     $sql1 ="delete from tmbr where id_mbr ='$id'";
     $q1 =mysqli_query($koneksi,$sql1);
     if($q1){
       $sukses ="Anda berhasil menghapus data";
     }else{
       $error ="Gagal menghapus data";
     }

   }
   
    if($hal == 'edit'){
      $id     =$_GET['id'];
      $sql1   ="select * from tmbr where id_mbr = '$id'";
      $q1     =mysqli_query($koneksi,$sql1);
      $r1     =mysqli_fetch_array($q1);
      $nama   =$r1['nama'];
      $email  =$r1['email'];
      $alamat =$r1['alamat'];
      $kelamin=$r1['kelamin'];



    }

   if(isset($_POST['kirim'])){
       $nama =$_POST['nama'];
       $email =$_POST['email'];
       $alamat =$_POST['alamat'];
       $kelamin =$_POST['kelamin'];

       if($nama && $email && $alamat && $kelamin){
          if($hal == 'edit'){
             $sql1 ="update tmbr set nama ='$nama',email= '$email',alamat= '$alamat',kelamin ='$kelamin' where id_mbr='$id'";
             $q1 =mysqli_query($koneksi,$sql1);
             if($q1){
               $sukses ="data berhasil di update";
             }else{
               $error ="data gagal di update";
             }
          }else{
            $sql1 = "insert into tmbr (nama,email,alamat,kelamin ) values ('$nama','$email','$alamat','$kelamin')";
            $q1   = mysqli_query($koneksi,$sql1);
            if($q1){
                $sukses    = "Data anda berhasil kami proses"; 
            }else{
                $error     = "Gagal memproses data anda";
            }  
          }
       }else{
         $error ="Masukkan  data anda dengan benar";
       }
   }
  
   
?>




<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

    <title>Daftar Member</title>
  </head>
  <body style="background-color:antiquewhite;" >
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
          <a class="nav-link" href="cerita.html"><i class="fas fa-history faa-bounce animated"></i>Cerita</a>
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

    <!--ahir nav bar-->

    <!--awal keterangan-->
    <div class="card text-center">
  <div>
  </div>
  <div class="card-body btn-outline-success">
    <h5 class="card-title">Alasan Daftar Menjadi Member Aman Sona Coffee</h5>
    <p class="card-text">Ketika kamu menjadi anggota terdaftar di Aman Sona Coffee kamu akan mendapatkan banyak Informasi
      diskon dan events yang seru!!. kamu juga lebih mudah saat mendaftar menjadi Mintra Aman Sona.Inc
    </p>
  </div>
</div><br>
    <!--ahir keterangan-->

    <!--awal froms-->
    <div class="container">
    <div class="card">
  <div class="card-header bg-primary text-white">
    Lengkapi data kamu di bawah ini
  </div>
  <div class="card-body">
    <?php
    if($error){
      ?>
      <div class="alert alert-danger" role="alert">
          <?php echo $error?>
      </div>
      <?php
      header("refresh:2;url=daftar.php");
    } 
    ?>
    <?php
    if($sukses){
      ?>
      <div class="alert alert-success" role="alert">
          <?php echo $sukses?>
      </div>
      <?php
      header("refresh:2;url=daftar.php");
    } 
    ?>

    <form method="POST" action="">
      <div class="form-group">
        <label>Nama</label>
        <input type="text" name="nama" id="nama" class="form-control" placeholder="masukkan nama anda" value="<?php echo $nama ?>" >
      </div>
      <div class="form-group">
        <label>email</label>
        <input type="text" name="email" id="email" class="form-control" placeholder="masukkan email anda" value="<?php echo $email ?>" >
      </div>
      <div class="form-group">
        <label>Alamat</label>
        <input type="text" name="alamat" id="alamat" class="form-control" value="<?php echo $alamat ?>" >
      </div>
      <div class="form-group">
        <label>Kelamin</label>
        <select class="form-control" name="kelamin" id="kelamin" >
          <option>pilih kelamin anda</option>
          <option value="laki-laki" <?php if($kelamin == "laki-laki") echo "selected" ?>>laki-laki</option>
          <option value="wanita" <?php if($kelamin == "wanita") echo "selected" ?>>wanita</option>
        </select><br> 
        <button type="submit" class="btn btn-success" name="kirim" value="simpan data" >Kirim</button>
        <a href="#"><button type="reset" class="btn btn-danger" name="batal" value="batal data">Batal</button></a>
      </div>
    </form>
  </div>
</div><br>
    </div>
    <!--ahir froms-->

    <!--awal table--->
    <div class=container>
    <div class="card">
    <h5 class="card-header bg-success text-white">cek data member kamu disini!</h5>
    <div class="card-body ">
    <table class="table table-bordered table-striped">
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>email</th>
          <th>Alamat</th>
          <th>Kelamin</th>
          <th>Aksi</th>
        </tr>

        <?php
           
           $no =1;
           $tampil = mysqli_query ($koneksi, "SELECT * from tmbr order by id_mbr desc");
           while($data = mysqli_fetch_array($tampil)):
        ?>
        <tr>
          <td><?=$no++;?></td>
          <td><?=$data['nama']?></td>
          <td><?=$data['email']?></td>
          <td><?=$data['alamat']?></td>
          <td><?=$data['kelamin']?></td>
          <td>
            <a href="daftar.php?hal=edit&id=<?=$data['id_mbr']?>" class="btn btn-warning" >edit</a>
            <a href="daftar.php?hal=delete&id=<?=$data['id_mbr']?>" onclick="return confirm('Yakin anda ingin menghapus data ? ')" class="btn btn-danger">hapus</a>
          </td>
        </tr>
        <?php 
          endwhile; ?>
      </table>

   
  </div>
</div>

    </div>
    <!--ahir table-->


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>

  </body>
</html>