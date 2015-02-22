<?php  
    //*** Start a session
    session_start();
    //*** Start the buffer
    ob_start();
    $errorsArray = array();
    
    //Check if POST
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        //Validating POST
        //Pattern to match
        $patternStr = "/\S+/";
        $patternNum = "/^[0-9\_]{7,10}/";
        $patternEmail = "/.+@.+\..+/";
        
        if(0 === preg_match($patternStr, $_POST['first'])){
            $errorsArray['first'] = "Please enter a first name.";
            
        }else{
            $_SESSION['first']= $_POST['first'];
        }
        
        if(0 === preg_match($patternStr, $_POST['last'])){
            $errorsArray['last'] = "Please enter a last name.";
        }else{
            $_SESSION['last']= $_POST['last'];
        }
        
        if(0 === preg_match($patternEmail, $_POST['email'])){
            $errorsArray['email'] = "Please enter a valid email.";
        }else{
            $_SESSION['email']= $_POST['email'];
        }
        
        if(0 === preg_match($patternNum, $_POST['phone'])){
            $errorsArray['phone'] = "Please enter a valid number";
        }else{
            $_SESSION['phone']= $_POST['phone'];
        }

        // If no errors than execute status.php
        if(0 === count($errorsArray)){
            header("Location: index.php?page=form2");
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
    
   

    <title>Applying to Green River Bachelors in Applied Science</title>
    
  </head>

  <body>
        <form role="form" method="post" class="form-horizontal" name="mockupbas" action="form1.php" onsubmit="return(validateForm());">
            <div class="container">
                <div class="form-group text-center">
                    <h3>Please select one:</h3>
                    <input  type='radio' name='student' value='cs' id='cs'>I am a current student
                    <input type='radio' name='student' value='ns' id='ns'> New student 
                </div>
                
                
                <div class="show form-group">
                    <label for="first" class="col-sm-3 control-label">First:</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="first" name="first" pattern="[a-zA-Z]{0,50}" placeholder="First" maxlength=50 value="<?PHP echo htmlspecialchars($_POST['first']); ?>" required >
                        <?php echo error('first') ?>
                    </div>
                </div>
                <div class="show form-group">
                    <label for="last" class="col-sm-3 control-label">Last:</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="last" name="last" pattern="[a-zA-Z]{0,50}" placeholder="Last" maxlength=50 value="<?PHP echo htmlspecialchars($_POST['last']); ?>" required >
                        <?php echo error('last') ?>
                    </div>
                </div>
            
                    <div id="sid" class="form-group">
                        <label for="studentId" class="col-sm-3 control-label">Student ID:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="studentId" name="studentId" placeholder="must be 9 characters" maxlength="9">
                        </div>
                    </div>
             
                <div class="show form-group">
                    <label for="email" class="col-sm-3 control-label">Email:</label>
                    <div class="col-sm-6">
                        <input type="email" class="form-control" id="email" name="email"  placeholder="Email" value="<?PHP echo htmlspecialchars($_POST['email']); ?>" required>
                        <?php echo error('email') ?>
                    </div>
                </div>
                <div class="show form-group">
                    <label for="phone" class="col-sm-3 control-label">Phone:</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="phone" name="phone" pattern="[0-9]{3,3}[0-9]{3,3}[0-9]{4,4}$" placeholder="Phone" maxlength=10 value="<?PHP echo htmlspecialchars($_POST['phone']); ?>" required>
                        <?php echo error('phone') ?>
                    </div>
                </div>
                
       
 
            <br>
            <button class="col-md-2 col-md-offset-10 btn btn-primary" name='Submit'>Continue</button>
            </div>
        </form>
        
     
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="javascript/bas.js"></script>



  </body>
</html>