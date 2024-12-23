<?php 
require_once '../controllerUserData.php';
$email = $_SESSION['email'];
$password = $_SESSION['password'];
if($email != false && $password != false){
    $sql = "SELECT * FROM usertable WHERE email = '$email'";
    $run_Sql = mysqli_query($con, $sql);
    if($run_Sql){
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $status = $fetch_info['status'];
        $code = $fetch_info['code'];
        if($status == "verified"){
            if($code != 0){
                header('Location: ../reset-code.php');
            }
        }else{
            header('Location: ../user-otp.php');
        }
    }
}else{
    header('Location: ../login-user.php');
}?>

<!DOCTYPE html>
<html>

   <head>
      <title>Welcome </title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
    body {
  margin: 0;
  font-family: "Lato", sans-serif;
}

    #ch {
    position: fixed;
    text-align: center;
    overflow: hidden;
    }
    </style>
      <!-- cdn for awesome fonts icons -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       <!-- End -->
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     
   </head>

<body>
   
  
  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">

    <!-- cdn for awesome fonts icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

     <!-- Google Fonts -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css" crossorigin="anonymous" />

  
</head>
<body>

 <header id="header" class="fixed-top " style="background: #37517e;">
    <div class="container d-flex align-items-center">

      <h2 class="logo me-auto"><a href="../index.html">Smart Waste Nusantara</a></h2>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logoSWN.jpg" alt="" class="img-fluid"></a> -->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto " href="../index.html"><span class="fa fa-home"> Home </span></a></li>
          <!-- NEW Navbar Item: Data Real-Time -->
          <li><a class="nav-link scrollto" href="../real-time.html"><span class="fa fa-bar-chart"> Data Real-Time</span></a></li>
           <!-- NEW Dropdown Navbar Item: Edukasi -->
          <li class="dropdown">
          <a href="#" class="nav-link scrollto"><span class="fa fa-book"> Edukasi</span> <i class="bi bi-chevron-down"></i></a>
          <ul>
            <li><a href="../edukasi.html">Edukasi</a></li>
          <li><a href="../JejakCarbon.html">Jejak Karbon</a></li>
          <li><a href="PengelolaanSampah.html">Pengolahan Kerajinan Sampah</a></li>
            </ul>
              </li>
			  <li class="dropdown">
                <a href="#" class="nav-link scrollto active"><span class="fa fa-trash"> Pelaporan</span> <i class="fa fa-chevron-down"></i></a>
                <ul>
                    <li><a href="../phpGmailSMTP/trash.php">Daftar Pelaporan</a></li>
                    <li><a href="../adminlogin/welcome.php">Riwayat Pelaporan Keluhan</a></li>
                </ul>
            </li>
          <!-- <li><a class="nav-link scrollto" href="#contact">Contact</a></li> -->
          <li><a class="nav-link scrollto" href="../index.html #about"><span class="fa fa-info-circle" aria-hidden="true"> About us</span></a></li>
          <li><a class="nav-link scrollto" href="../index.html #faq"><span class="fa fa-question-circle"> FAQ</span></a></li>
          <li><a class="nav-link scrollto" href="../logout-user.php"><span class="fas fa-sign-out-alt">Logout</span></a></li>
         </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <section id="about" class="about" style="margin-top: 10px;">

      
   <!-- <nav class="fixed-top">
    <a class="navbar-brand" href="http://localhost/EmailVerification/index.html">Home</a>
    </nav>
    <br> -->
    <!-- <div class="container"id="ch"> <b><mark> YOUR COMPLAIN HISTORY</mark></b></div> -->
      <div class="container", style="margin: 10px;"

 >     
      <table  class='table' >
             <br><br>
             <tr>
                 <th>Tanggal</th>
                 <th>Nama</th>
                 <th>Nomor Telepon</th>
                 <th>Email</th>
                 <th>Kategori</th>
                 <th>Lokasi</th>
                 <th>Detail Lokasi</th>
                 <th>Bukti Foto</th>
                 <th>Status</th>
                 <th colspan="2">Operator</th>
                 <tr><br>

   <?php
   // error_reporting(0);
  
   include("connection.php");
   require_once "../controllerUserData.php";

$sessionEmail = $_SESSION['email'];
   $hostForImage ="../phpGmailSMTP/upload/";
   $query = "select * from garbageinfo where email = '$sessionEmail' ";
   $data = mysqli_query($db,$query);
   $total = mysqli_num_rows($data);
     
   if($total!=0) {

     
      while($result=mysqli_fetch_assoc($data)){

     echo "
           <tr class='shadow p-3 mb-5 bg-white rounded'>
               <td>   ".$result['date']." </td>
               <td>   ".$result['name']." </td>
               <td>   ".$result['mobile']."  </td>
               <td>   ".$result['email']." </td>
               <td>   ".$result['wastetype']." </td>
               <td>   ".$result['location']." </td>
               <td>   ".$result['locationdescription']."  </td>
               <td><a href = '".$hostForImage.$result['file']. "'><img src = '".$hostForImage.$result['file']. " 'height='200'width='200'style='object-fit: contain;'/></a> </td>   
               <td>   ".$result['status']." </td>            
               <td><a href = 'delete.php?i=$result[Id] 'class='btn btn-danger'data-toggle='modal' data-target='#exampleModalCenter' onclick='modalLauch(".$result['Id'].")'>Hapus</a></td>
               
               
              <td> <a href = 'update.php?i=$result[Id]&n=$result[name]&mbl=$result[mobile]&em=$result[email]&wt=$result[wastetype]&lo= $result[location]&lod=$result[locationdescription]&f=$result[file]&d=$result[date]' class='btn btn-success'>Edit</a></td>

           </tr> ";
      
      }
      

   }
?>

<div class='modal fade' id='exampleModalCenter' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
               <div class='modal-dialog modal-dialog-centered' role='document'>
               <div class='modal-content'>
               <div class='modal-header'>
               <h5 class='modal-title' id='exampleModalLongTitle'>Hapus</h5>
               <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
               <span aria-hidden='true'>&times;</span>
               </button>
               </div>
               <div class='modal-body'>
              Apakah kamu yakin ingin menghapus keluhan?
               <input id="toDeleteId" type="hidden" value="">
               </div>
              <div class='modal-footer'>
              <button type='button' class='btn btn-light' data-dismiss='modal'>Tutup</button>
              <button type='button' class='btn btn-danger' onclick="confirmDelete()">Hapus</button>
              </div>
              </div>
              </div>
             </div>
   
</table>
</div>
<script>
var delId;
function modalLauch(id){
    delId=id;
    $('#toDeleteId').val(id);
}
function confirmDelete(){
    window.location.replace("http://localhost/waste-management-system/adminlogin/delete.php?i="+delId);
}
</script>
</body>
</html>

