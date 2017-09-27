<?php
/*
###Simpan FOTO###
if (isset($_FILES['fileToUpload'])) {
	$target_dir = "/home/rail/Pictures/pengaduan/";
	$name=$_FILES['fileToUpload']['name'];
	$tmp_name=$_FILES['fileToUpload']['tmp_name'];
	$size=$_FILES['fileToUpload']['size'];

	$target_file = $target_dir . basename($name);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	// Check if image file is a actual image or fake image
	#if(isset($_POST["submit"])) {
	#if (isset($name) {
	    $check = getimagesize($tmp_name);
	    if($check !== false) {
	        echo "File is an image - " . $check["mime"] . ".";
	        $uploadOk = 1;
	    } else {
	        echo "File is not an image.";
	        $uploadOk = 0;
	    }
	#}
	// Check if file already exists
	if (file_exists($target_file)) {
	    echo "Sorry, file already exists.";
	    $uploadOk = 0;
	}
	// Check file size
	if ($size > 500000) {
	    echo "Sorry, your file is too large.";
	    $uploadOk = 0;
	}
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
	    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	    $uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
	    echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
	    if (move_uploaded_file($tmp_name, $target_file)) {
	        echo "The file ". basename($name). " has been uploaded.";
	    } else {
	        echo "Sorry, there was an error uploading your file.";
	    }
	}
}*/
###Simpan FOTO###
?>

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Tambahkan Foto</h3>
  </div>
  <div class="panel-body">
  </div>
</div>