<?php
$target_dir = "./";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ". " ;
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check if file already exists
if (file_exists($target_file)) {
	
	echo ("Hello from $target_dir   ");
	//echo ($_FILES["fileToUpload"]["tmp_name"]);
	echo ("Hello from $target_dir   " + $target_file);
	echo ("<br/><br/><br/>");

	//new - DAVIDS ADDITION, still doesn't work
	chmod($target_file,0755); //Change the file permissions if allowed
    	
    	
	if(!unlink($target_file)) {
		echo ("Error deleting old $target_file");	
		echo ("<br/><br/><br/>");
		$uploadOk = 0;
	}	
	else {	
		$uploadOk = 1;
	}
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 200000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed. ";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded. ";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename($_FILES["fileToUpload"]["name"]). " has been uploaded.".
        '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.js"></script>
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/additional-methods.min.js"></script>'
        .'<script> $( document ).ready(function() {window.location.href = "../editor.html";});</script>';
    } else {
        echo "Sorry, there was an error uploading your file. <br/>" . $_FILES["fileToUpload"]["tmp_name"] . " " . $target_file . ' '. basename($_FILES["fileToUpload"]["name"]);
    }
}
?>
