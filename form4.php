<?php
session_start();
 //*** Start the buffer
ob_start();

/* DEBUGGING - OUTPUT SESSION */
echo "<pre>";
print_r($_POST);
print_r($_SESSION);
echo "</pre>";
*/

$errorsArray = array();

        if(isset($_POST['Submit3'])){
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
                        $errorsArray['collegeCredits'] = "Credits enter are invalid!";
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
                                echo "<p class='error'>File is too large to upload. Maximum file size is 2 MB.</p>";
                    }	
                    // Then check file type
                    else if (in_array($_FILES['file']['type'], $valid_types)) {
                                $_SESSION['error'] = "invalid type";
                                // Check for duplicate file name
                                if (file_exists($newFile))
                                        echo "<p class='error'>Error uploading: {$_FILES['file']['name']} already exists.</p>";
                                else {
                                    // No bugs, move file to upload directory
                                    move_uploaded_file($_FILES['file']['tmp_name'],$newFile);
                                    $_SESSION['transcript'] = $newFile;
                                    echo "<p class='success'>Uploaded {$_FILES['file']['name']} successfully!</p>";
                                }
                    }
                           
                    
                    
                    if ($_POST['checkbox']=="agree"){
                            $_SESSION['isChecked'] = $_POST['checkbox'];
                    }else{
                        $errorsArray['checkbox'] = "Please agree to terms and conditions!";
                        $isValid = FALSE;
                    }
                    
                    if($isValid){
                        header("Location: index.php?page=form5");
                        exit;
                    } 
                    
                
                }
        }else if(isset($_POST['Previous3'])){
            header("Location: index.php?page=form3");
            exit;
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
		<input type="radio" id="hs" name="degree" value="GED" required>
			<label for="hs">High school diploma or GED</label>
		<br><input type="radio" id="aDeg" name="degree" value="Associates degree (AA, AS, AAS, AAS-T)">
			<label for="aDeg">Associates degree (AA, AS, AAS, AAS-T)</label>
		<br><input type="radio" id="bDeg" name="degree" value="Bachelor's degree">
			<label for="bDeg">Bachelor's degree</label>
		<br><input type="radio" id="mDeg" name="degree" value="Master's degree">
			<label for="mDeg">Master's degree</label>
		<br><input type="radio" id="phd" name="degree" value="PHD">
			<label for="phd">Ph.D.</label>
		<?php echo error('degree') ?>          

        <h4>Credits</h4>
        <h5>Please enter the number of credits you have earned thus far</h5>
        <input type="number" class="form-control" id="collegeCredits" name="collegeCredits"  min= 0 max= 999 value = 0 required>
        <?php echo error('collegeCredits') ?>
        <h4>Transcripts</h4>
        <h5>You can upload an unofficial transcript here</h5>
       
        <input type="file" class="btn btn-lg" name="file" id="file">
        
        <br>
        <input type="checkbox" id="agree" name="checkbox" value="agree" required>
			<label for="agree"> I verify that the information submitted here is accurate and complete.</label>
        <?php echo error('checkbox') ?>  
        
        <br>
        <div class="row">
            <br>
            <button class="col-md-2 btn btn-primary" name='Previous3'>Previous</button>
            <button class="col-md-2 col-md-offset-8 btn btn-primary" name='Submit3'>Continue</button>
        </div>
    </div>
</form>
  
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>

<?php
         //Flush buffer
        ob_flush();
?>