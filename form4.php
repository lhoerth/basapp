<?php
session_start();
 //*** Start the buffer
ob_start();

$errorsArray = array();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['Submit3'])){
                $isValid = TRUE;
    
                //Checks the posts and if valid submits information
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
                    
                    if ($_POST['fileToUpload'] != ""){
                            $_SESSION['transcript'] = $_POST['fileToUpload'];
                    }else{
                        $_SESSION['transcript'] = "None";
                    }
                    
                    if ($_POST['checkBox']=="agree"){
                            $_SESSION['isChecked'] = $_POST['checkBox'];
                    }else{
                        $errorsArray['checkbox'] = "Please agree to terms and conditions!";
                        $isValid = FALSE;
                    }
                    
                    if($isValid){
                        header("Location: index.php?page=form5");
                            exit;
                    } 
                    
                
                }
        }
        
        if(isset($_POST['Previous3'])){
            header("Location: index.php?page=form3");
            exit;
        }
}

//Displays error
    function error($name){
        global $errorsArray;
        if($errorsArray[$name]){
            return "<div class='formError'>". $errorsArray[$name]."</div>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <title>Education</title>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
        <form class="form-inline" method="post" action="#" onsubmit="return(validateForm());">


       

      <div class="container">
          <h4>Please check all that you have achieved</h4>
        
            <input type="radio" id="degree" name="degree" value="GED">High school diploma or GED</input>
            <br><input type="radio" id="degree" name="degree" value="Associates degree (AA, AS, AAS, AAS-T)">Associates degree (AA, AS, AAS, AAS-T)</input>
            <br><input type="radio" id="degree" name="degree" value="Bachelor's degree">BDBachelor's degree</input>
            <br><input type="radio" id="degree" name="degree" value="Master's degree">Master's degree</input>
            <br><input type="radio" id="degree" name="degree" value="PHD">Ph.D.</input>
            <?php echo error('degree') ?>
          

          <h4>Credits</h4>
          <h5>Please enter the number of credits you have earned thus far</h5>
          <input type="number" class="form-control" id="collegeCredits" name="collegeCredits"  min= 0 max= 999 value = 0 required>
          <?php echo error('collegeCredits') ?>
          <h4>Transcripts</h4>
          <h5>If you want, you can upload your unofficial transcript here</h5>
       
          <input type="file" class="btn btn-lg" name="fileToUpload" id="fileToUpload">
        
          <br>
          <input type="checkbox" name="checkbox" required> I verify that the information submitted here is accurate and complete.</input>
          <?php echo error('checkbox') ?>  
        
        <br>
        <div class="row">
            <br>
            <button class="col-md-2 btn btn-primary" name='Previous3'>Previous</button>
            <button class="col-md-2 col-md-offset-8 btn btn-primary" name='Submit3'>Continue</button>
        </div>
    </div>
        
        

    </form>



    </div> <!-- /container -->
  
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>


  </body>
</html>
<?php
         //Flush buffer
        ob_flush();
?>