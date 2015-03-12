<?php
session_start();
 //*** Start the buffer
ob_start();

/* // DEBUGGING - OUTPUT SESSION 
echo "<pre>";
print_r($_POST);
print_r($_SESSION);
echo "</pre>";
*/

	//Goes back to first page if not visited in order
	if(!isset($_SESSION['Submit3'])){
		 header("Location: index.php?page=form1");
		 exit;
	}
	
	// go back to previous page if previous button clicked
	if(isset($_POST['Previous3'])){
		header("Location: index.php?page=form3");
		exit;
	}
	
$errorsArray = array();

        if(isset($_POST['Submit4'])){
			$isValid = TRUE;

			// Validate POST; submit if valid
			if (isset($_POST)){
				if ($_POST['degree'] != ""){
					$_SESSION['lvlEducation'] = $_POST['degree'];
				} else {
					$errorsArray['degree'] = "Education not selected!";
					$isValid = FALSE;
				}
				
				if ($_POST['collegeCredits'] >= 0 && $_POST['collegeCredits'] <= 999){
					$_SESSION['collegeCredits'] = $_POST['collegeCredits'];
				} else {
					$errorsArray['collegeCredits'] = "Credits entered invalid!";
					$isValid = FALSE;
				}
				
				
				/*
				*  Accept file information from html form, then move the
				*  file to designated folder.
				*/
					
			   
			   //Define upload directory
			   $dirName = "transcripts/";
			   
			   
			   $newFile = $dirName.basename($_FILES["file"]["name"]);
				   
			   //Define valid file types
			   $valid_types = array(
						   "application/msword", // .doc
						   "application/vnd.openxmlformats-officedocument.wordprocessingml.document", // .docx
						   "application/pdf", // .pdf
						   "text/plain", // .txt
						   "image/png",
						   "image/jpeg",
						   "image/jpeg",
						   "image/jpeg",
						   "image/gif" 
				   );
			   
				
				//Check file size - 2 MB maximum
				if($_SERVER['CONTENT_LENGTH'] > 2000000) {
							$errorsArray['fileUpload'] = "<p class='error'>File is too large to upload. Maximum file size is 2 MB.</p>";
							$isValid = FALSE;
				}	
				// Then check file type
				else if (in_array($_FILES['file']['type'], $valid_types)) {
					// (This is the valid type case)
					
					// Check for duplicate file name
					if (file_exists($newFile)){
						// duplicate file name
						$errorsArray['fileUpload'] = "<p class='error'>Error uploading: {$_FILES['file']['name']} already exists.</p>";
						$isValid = FALSE;
					}
					else {
						// No bugs, move file to upload directory
						move_uploaded_file($_FILES['file']['tmp_name'],$newFile);
						$_SESSION['transcript'] = $newFile;
						//echo "<p class='success'>Uploaded {$_FILES['file']['name']} successfully!</p>";
					}
				}			
				else {
					// invalid file type
					$errorsArray['fileUpload'] = "invalid file type";
					$isValid = FALSE;
				}
				
				// Verify user agrees to terms
				if ($_POST['checkbox']=="agree"){
						$_SESSION['isChecked'] = $_POST['checkbox'];
				}else{
					$errorsArray['checkbox'] = "Please agree to terms and conditions!";
					$isValid = FALSE;
				}
				
				if($isValid){
					$_SESSION['Submit4'] = $_POST['Submit4'];
					header("Location: index.php?page=form5");
					exit;
				} 
				
			
			}
        }


//Displays error
    function error($name){
        global $errorsArray;
        if($errorsArray[$name]){
            return "<div class='text-danger'>". $errorsArray[$name]."</div>";
        }
    }

?>
<form role="form" class="form-inline" method="post" action="index.php?page=form4" enctype="multipart/form-data">
    <div class="container">
        <h4>Please select the highest that you have achieved</h4>        
		<input type="radio" id="hs" name="degree" value="HS/GED" required <?php echo ($_SESSION['lvlEducation'] == "HS/GED")?"checked":"";?>>
			<label for="hs">High school diploma or GED</label>
		<br><input type="radio" id="aDeg" name="degree" value="Associates degree (AA, AS, AAS, AAS-T)" <?php echo ($_SESSION['lvlEducation'] == "Associates degree (AA, AS, AAS, AAS-T)")?"checked":"";?>>
			<label for="aDeg">Associates degree (AA, AS, AAS, AAS-T)</label>
		<br><input type="radio" id="bDeg" name="degree" value="Bachelor's degree" <?php echo ($_SESSION['lvlEducation'] == "Bachelor's degree")?"checked":"";?>>
			<label for="bDeg">Bachelor's degree</label>
		<br><input type="radio" id="mDeg" name="degree" value="Master's degree" <?php echo ($_SESSION['lvlEducation'] == "Master's degree")?"checked":"";?>>
			<label for="mDeg">Master's degree</label>
		<br><input type="radio" id="phd" name="degree" value="PHD" <?php echo ($_SESSION['lvlEducation'] == "PHD")?"checked":"";?>>
			<label for="phd">Ph.D.</label>
		<?php echo error('degree') ?>          

        <h4>Credits</h4>
        <h5>Please enter the number of credits you have earned thus far</h5>
        <input type="number" class="form-control" id="collegeCredits" name="collegeCredits"  min= 0 max= 999 value=<?php echo isset($_SESSION['collegeCredits'])?$_SESSION['collegeCredits']:0;?> required>
        <?php echo error('collegeCredits') ?>
        <h4>Transcripts</h4>
        <h5>You can upload an unofficial transcript here</h5>
       
        <input type="file" class="btn btn-lg" name="file" id="file">
        <?php echo error('fileUpload') ?>
        <br>
        <input type="checkbox" id="agree" name="checkbox" value="agree" required>
			<label for="agree"> I verify that the information submitted here is accurate and complete.</label>
        <?php echo error('checkbox') ?>  
        
        <br>
        <div class="row">
            <br>
            <button class="col-md-2 btn btn-primary" name='Previous3'>Previous</button>
            <button class="col-md-2 col-md-offset-8 btn btn-primary" name='Submit4'>Continue</button>
        </div>
    </div>
</form>

<?php
         //Flush buffer
        ob_flush();
?>