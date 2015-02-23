<style>
    p.error {
        color:darkred;
    }
    p.success {
	color:darkgreen;
    }
</style>
<form method="post" action="" enctype="multipart/form-data">
	<fieldset><legend>Upload transcript</legend>
		<label for="file">Image File: </label>
			<input type="file" name="file" id="file" required>		
		<input type="submit" name="submit_file" value="Submit" >
		<input type="reset" name="reset" value="Reset" >
	</fieldset>
</form>

<?php 

/*
print "<pre>";
	print_r($_FILES);
print "</pre>";	

Array
(
    [img] => Array
        (
            [name] => style.pdf
            [type] => application/pdf
            [tmp_name] => /tmp/phpRo1fq6
            [error] => 0
            [size] => 1847353
        )

)
*/

// connect to database
include "model/dbconnect.php";

    /*
     *  Accept file information from html form, then move the
     *  file to designated folder.
     */
	 
	$validDoc = false;
    //Define upload directory
    $dirName = "uploads/";
	
    //Define valid file types
    $valid_types = array(
		"application/msword", // .doc
		"application/vnd.openxmlformats-officedocument.wordprocessingml.document", // .docx
		"application/pdf", // .pdf
		"text/plain" // .txt
	);
	
    //Check file size - 2 MB maximum
    if($_SERVER['CONTENT_LENGTH'] > 2000000) {
		echo "<p class='error'>File is too large to upload. Maximum file size is 2 MB.</p>";
    }	
    // Then check file type
    else if (in_array($_FILES['file']['type'], $valid_types)) {
		if ($_FILES['file']['error'] > 0)
			echo "<p class='error'>Return Code: {$_FILES['file']['error']}</p>";
		
		// Check for duplicate file name
		if (file_exists($dirName . $_FILES['file']['name']))
			echo "<p class='error'>Error uploading: {$_FILES['file']['name']} already exists.</p>";
		else {
			// No bugs, move file to upload directory
			move_uploaded_file($_FILES['file']['tmp_name'],
			$dirName . $_FILES['file']['name']);
			echo "<p class='success'>Uploaded {$_FILES['file']['name']} successfully!</p>";
			
			// store the filename in the database
			$sql = "INSERT INTO uploads (filename)
				VALUES ('{$_FILES['file']['name']}');";
			//echo "<p>$sql</p>";
			$dbh->exec($sql);
			print_r($dbh->errorInfo());
		}
    }
    //Invalid file type
    else if ($_FILES['file']['type'] != "") {
		echo "<p class='error'>Invalid file type. Allowed types:  doc, docx, pdf.</p>";
    }
	else 
		//echo "Something went wrong...";
	
    /*
     *	List each file as a hyperlink.
     */
    //Open file directory
    $dir = opendir($dirName);
	
    //Get names of files ("uploads" is my test table)
    $sql = "SELECT * FROM uploads ORDER BY filename;";
    $result = $dbh->query($sql);
    if (sizeof($result) >= 1) {	
		echo "<h2>Uploaded Files</h2>";
		
		// List filenames
		foreach ($result as $row) {
			$file = $row['filename'];
			if ($file != "." && $file != "..") {
				echo "<a href='$dirName$file' target='_blank'>$file</a><br>";
			}
		}
    }
    //Close file directory
    closedir($dir);
?>