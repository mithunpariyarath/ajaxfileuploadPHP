<?php

//Check if user is coming from upload form
//Check if file exists
if (isset($_FILES['files']) && !empty($_FILES['files'])) {

	//Count Number Of files - for processing each file by looping.
	$no_files = count($_FILES["files"]['name']);
	
	//Show succesfull upload count.
	$successUploads=0;
	//If no:of files greater than 1. Loop through each file
    for ($i = 0; $i < $no_files; $i++) {

		//If there are any errors from client side/
		//Show Errors.

        if ($_FILES["files"]["error"][$i] > 0) {
            echo "Error: " . $_FILES["files"]["error"][$i] . "<br>";
		} else {
			//If there are no error. Process files.
			//Write Unique FileName -> uniquid+randno
			$filename=uniqid();
			$filename.=rand(10001,99999);
			$filename.=$_FILES["files"]["name"][$i];
            if (file_exists('uploads/' . $_FILES["files"]["name"][$i])) {
                echo '<p role="alert" class="alert alert-danger"><b>File already exists : </b>' . $_FILES["files"]["name"][$i] .'</p>';
            } else{
				move_uploaded_file($_FILES["files"]["tmp_name"][$i], 'uploads/' . $filename);
				$successUploads++;
            }
		}
	}
	if($successUploads>0){
		echo '<p role="alert" class="alert alert-success"><b>File successfully uploaded : '.$successUploads.'</b> </p>';
	}
} else { //If files doesn't exists show error
    echo '<p class="alert alert-danger" role="alert"><b>Please choose at least one file</b></p>';
}
    
/* 
 * End of script
 */