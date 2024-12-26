<?php
include_once('connection.php');

// error_reporting(0);
$id=$_GET['i'];
$n = $_GET['n'];
$mbl = $_GET['mbl'];
$em = $_GET['em'];
$wt = $_GET['wt'];
$lo = $_GET['lo'];
$lod = $_GET['lod'];
$f = $_GET['f'];
$d = $_GET['d'];

if(isset($_POST['update'])){
  $id= $_POST['id'];
   $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $checkbox1=$_POST['wastetype'];  
    $chk="";  
      foreach($checkbox1 as $chk1)  
             {  
                 $chk .= $chk1.",";  
             } 

    $email =$_POST['email'];
    $location = $_POST['location'];    
    $locationdescription = $_POST['locationdescription'];
    $date =$_POST['date'];
	// @unlink('upload/'.$f[0]['file']) ;

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
    $query = "update garbageinfo set name='$name',mobile='$mobile',email='$email',wastetype='$chk',location='$location',locationdescription='$locationdescription',file= '$file',date='$date' WHERE Id='$id'" ;
   
    $data = mysqli_query($db,$query);
    
    
    if($data) {

        echo " <span style='color:red'>Record Updated!</span>";   
        
       header("Location: http://localhost/smart-waste-nusantara/adminlogin/welcome.php", TRUE, 301);
       exit();
  
    }
    else {
        echo "Failed to Update!";
    }



}
?>
<!DOCTYPE html>
<html>
<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet"type="text/css"href="styleupdate.css">
    <title>Edit || Perbarui</title>
  
</head>
<body>
  
   <?php 
   $error ='';   
   echo $error; 
   ?>
   <form method="post" action="update.php"enctype="multipart/form-data">
   <div class="container contact">
	<div class="row">
		<div class="col-md-3">
			<div class="contact-info">
				<img src="images.jfif" alt="image"/>
				<h2>Edit Keluhan</h2>
				<h4>Mohon berikan informasi yang valid !</h4>
			</div>
		</div>
		<div class="col-md-9">
			<div class="contact-form">
				<div class="form-group">	
				  <label class="control-label col-sm-2" for="fname"> Nama:</label>
				  <div class="col-sm-10">          
					<input type="text" class="form-control" id="name" placeholder="Enter Your Name" name="name" required value="<?php echo "$n"?>" required>
				  </div>
				</div>
				<div class="form-group">
				  <label class="control-label col-sm-2" for="lname">No.Telp:</label>
				  <div class="col-sm-10">  
                    <input  value="<?php echo $id ?>" name ="id"  style="display:none">        
					<input type="number" class="form-control" id="mobile" placeholder="Enter Your Mobile Number" name="mobile" required value="<?php echo "$mbl"?>">
				  </div>
				</div>
				<div class="form-group">
				  <div class="col-sm-10">
					<input type="hidden" class="form-control" id="email" placeholder="Enter Your email" name="email" value="<?php echo "$em"?>">
				  </div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="option">Kategori:</label>
					<div class="col-sm-10">          
					    <input type="checkbox" name="wastetype[]" value="organic">Organik
                        <input type="checkbox" name="wastetype[]" value="inorganic">Anorganik
                        <input type="checkbox" name="wastetype[]" value="Household"> Limbah Rumah Tangga
                        <input type="checkbox" name="wastetype[]" value="mixed"checked> Semua
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-2" for="lname">Lokasi:</label>
					<div class="col-sm-10">          
					   <select class="form-control" id="location" name="location" value="<?php echo "$lo"?>">
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
					<input type="comment" class="form-control" rows="5" id="locationdescription" placeholder="Masukkan Detail Lokasi.." name="locationdescription" value="<?php echo "$lod"?>" required>
				  </div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="lname">Bukti Foto:</label>
					<div class="col-sm-10">          
					  <input type="file" class="form-control" id="file" name="file" value="<?php echo "$f"?>"required accept="image/*" capture="camera">
					</div>
				  </div>
				<div class="form-group">        
				  <div class="col-sm-offset-2 col-sm-10">
				    <input type="hidden" class="form-control" id="date" name="date" value="<?php $timezone = date_default_timezone_set("Asia/Kathmandu");
                                                                                             echo  date("g:ia ,\n l jS F Y");?>">
					<button type="submit" class="btn btn-default" name="update" id="update"  onclick ="CheckBoxCheck()">Perbarui</button>
				  </div>
				</div>
			</div>
		</div>
	</div>
</div>
   </form>
</div>
</body>
</html>