<?php

###Simpan FOTO###
if (isset($_FILES['fileToUpload']) && isset($_POST['submit'])) {
#if (isset($_POST['submit'])) {
	$target_dir = "assets/img/item/";
	$name=$_FILES['fileToUpload']['name'];
	$tmp_name=$_FILES['fileToUpload']['tmp_name'];
	$size=$_FILES['fileToUpload']['size'];

	$hidden_id=$_POST['hidden_id'];

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

	        $sql="UPDATE barang SET img=? WHERE id=?;";
			$stmt=$conn->prepare($sql);
			$stmt->bind_param('si',$name,$hidden_id);
			$stmt->execute();
			$stmt->close();

	    } else {
	        echo "Sorry, there was an error uploading your file.";
	    }
	}

	header('location: '.base_url().'?ref=barang');
}
###Simpan FOTO###
$id="";$nama="";$imd="";
if (isset($_GET['id']) && isset($_GET['nama']) && isset($_GET['img'])) {
	$id=$_GET['id'];
	$nama=$_GET['nama'];
	$img=$_GET['img'];
}

?>

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Tambahkan / Ubah Foto</h3>
  </div>
  <div class="panel-body">
  	<div>
  		<center>
  			<h3><?php echo $nama;?></h3>
  		<form id="form-foto" method="post" action=""  enctype="multipart/form-data">
  			<input type="file" name="fileToUpload" id="fileToUpload" onchange="readURL(this);"/>
  			<input type="hidden" name="hidden_id" value="<?php echo $id;?>" />
  			<br/>
  			<img id="gambar" src="assets/img/item/<?php echo $img;?>" width="250px" height="250px" style="border:1px dashed #ccc;border-radius: 5px;margin:2px; padding: 2px;" />
  			<br/>
  			<br/>
  			<div class="btn-group" role="group" aria-label="...">
			  <a href="?ref=barang" class="btn btn-warning btn-lg"><span class="glyphicon glyphicon-chevron-left"></span> Kembali</a>
			  <button type="submit" name="submit" id="submit" class="btn btn-primary btn-lg">Simpan <span class="glyphicon glyphicon-floppy-disk"></span></button>
			</div>
  		</form>
  		</center>
  	</div>
  </div>
</div>

<script type="text/javascript">
	function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#gambar')
                    .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>