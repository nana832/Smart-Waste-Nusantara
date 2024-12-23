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
<?php

 require_once "../controllerUserData.php";
 
error_reporting(0);
include('database.inc');
$msg ="";


if(isset($_POST['submit'])){

    $name = mysqli_real_escape_string($con,$_POST['name']);
    $mobile = mysqli_real_escape_string($con,$_POST['mobile']);
    $checkbox1=$_POST['wastetype'];  
    $chk="";  
      foreach($checkbox1 as $chk1)  
             {  
                 $chk .= $chk1.",";  
             } 

    $email = mysqli_real_escape_string($con,$_POST['email']);
	$status = mysqli_real_escape_string($con,$_POST['status']);
    $location = mysqli_real_escape_string($con,$_POST['location']);    
    $locationdescription = mysqli_real_escape_string($con,$_POST['locationdescription']);
	$date = $_POST['date'];
	
	$file = $_FILES['file']['name'];
	$target_dir = "upload/";
	$target_file = $target_dir . basename($_FILES["file"]["name"]);
  
	// Select file type
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  
	// Valid file extensions
	$extensions_arr = array("jpg","jpeg","png","gif","tif", "tiff");
  
	//validate file size 
  //   $filesize = $_FILES["file"]["size"] < 5 * 1024 ;
  
	// Check extension
	if( in_array($imageFileType,$extensions_arr) ){
   
	
	   // Upload file
	   move_uploaded_file($image = $_FILES['file']['tmp_name'],$target_dir.$file);
  
	}

		$sql = "insert into garbageinfo(name,mobile,email,wastetype,location,locationdescription,file,date,status)values('$name','$mobile','$email','$chk','$location','$locationdescription','$file','$date','$status')";
		
    	if(mysqli_query($con,$sql)){
			$msg = '<div class = "alert alert-success"><span class="fa fa-check"> "Keluhan Berhasil Didaftarkan!"</span><a href="../adminlogin/welcome.php"> lihat Keluhan </a></div>';
		
		}else {
			$msg= '<div class = "alert alert-warning"><span class="fa fa-times"> Failed to Registered !"</span></div>';
		}

 }
?>

<!DOCTYPE html>
<html>
<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet"type="text/css"href="style.css">
    <title>Complain</title>
	  <!-- Favicons -->
	  <link href="assets/img/clients/logoSWN2.jpg" rel="icon">
  <link href="assets/img/clients/logoSWN2.jpg" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  

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

  <section id="about" class="about" style="margin-top: 49px;">



   <?php 
   $error ='';   

   
   ?>

<?php if (isset($msg)) echo $msg; ?>

   <form method="post" action="trash.php" enctype="multipart/form-data">
   <div class="container" style="margin-top: 60px;">
	<div class="row">
		<div class="col-md-3">
			<div class="contact-info">
				<img src="images.jfif" alt="image"/>
				<h2>Daftarkan Keluhan Anda</h2>
				<h4>Kami siap mendengar masalah Anda!</h4>
			</div>
		</div>
		<div class="col-md-9">
			<div class="contact-form">
				<div class="form-group">
				<div id="error"></div>
              <span style="color:red"><?php echo "<b>$msg</b>"?></span>
				  <label class="control-label col-sm-2" for="fname"> Nama:</label>
				  <div class="col-sm-10">          
					<input type="text" class="form-control" id="name" placeholder="Masukkan Nama Lengkap Anda" name="name" required>
				  </div>
				</div>
				<div class="form-group">
				  <label class="control-label col-sm-2" for="lname">No.Telp:</label>
				  <div class="col-sm-10">          
					<input type="number" class="form-control" id="mobile" placeholder="Masukkan Nomor Telepon Anda" name="mobile"required min ="08-xxxxxxxxxxx" max="089999999999">
				  </div>
				</div>
				<div class="form-group">
				  <!-- <label class="control-label col-sm-2" for="email">Email:</label>
				  <div class="col-sm-10"> -->
					<input type="hidden" class="form-control" id="email" placeholder="Enter Your email" name="email" value="<?php echo   $_SESSION['email'];?>"> 
				  <!-- </div> -->
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="option">Kategori:</label>
					<div class="col-sm-10">          
					    <input type="checkbox" name="wastetype[]" value="organic"> Organik
                        <input type="checkbox" name="wastetype[]" value="inorganic"> Anorganik
                        <input type="checkbox" name="wastetype[]" value="Household"> Limbah Rumah Tangga
                        <input type="checkbox" name="wastetype[]" value="mixed"id="mycheck" checked> Semua
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-2" for="lname">Lokasi:</label>
					<div class="col-sm-10">          
					   <select class="form-control" id="location" name="location"required>
						   <option class="form-control" >WP KIPP</option>
						   <option class="form-control" >WP IKN Utara</option>
						   <option class="form-control" >WP IKN Barat</option>
						   <option class="form-control" >WP IKN Selatan</option>
						   <option class="form-control" >WP IKN Timur I</option>
						   <option class="form-control" >WP IKN Timur II</option>
						   <option class="form-control" >WP Simpang Samboja</option>
						   <option class="form-control" >WP Kuala Samboja</option>
						   <option class="form-control" >WP Muara Jawa</option>
					   </select>
					</div>
				  </div>
				<div class="form-group">
				  
				  <div class="col-sm-10">
					<textarea class="form-control" rows="5" id="locationdescription" placeholder="Masukkan Detail Lokasi.." name="locationdescription" required></textarea>
				  </div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="lname">Bukti Foto:</label>
					<div class="col-sm-10">          
					  <input type="file" class="form-control" id="file" name="file"required accept="image/*" capture="camera">
					</div>
				  </div>
				<div class="form-group">        
				  <div class="col-sm-offset-2 col-sm-10">
				   <input type='hidden' class="form-control" id="date" name="status" value="Pending">
				    <input type="hidden" class="form-control" id="date" name="date" value="<?php $timezone = date_default_timezone_set("Asia/Kathmandu");
                                                                                             echo  date("g:ia ,\n l jS F Y");?>">
					<button type="submit" class="btn btn-default" name="submit" >Daftar</button>
				  </div>
				</div>
			</div>
		</div>
	</div>
</div>
   </form>
</div>
<script type="text/javascript"  src="formValidation.js"></script>
</body>

</html>
