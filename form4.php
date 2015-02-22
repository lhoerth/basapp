<?php
session_start();
 //*** Start the buffer
    ob_start();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['Submit'])){
            header("Location: index.php?page=form5");
            exit;
        }
        if(isset($_POST['Previous'])){
            header("Location: index.php?page=form3");
            exit;
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

    <script src="bas.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
        <form class="form-inline" method="post" name="mockupbas" action="form4.php" onsubmit="return(validateForm());">


       

      <div class="container">
          <h4>Please check all that you have achieved</h4>
        
            <input type="radio" id="degree" name="degree" value="GED">High school diploma or GED</input>
            <br><input type="radio" id="degree" name="degree" value="Associates degree (AA, AS, AAS, AAS-T)">Associates degree (AA, AS, AAS, AAS-T)</input>
            <br><input type="radio" id="degree" name="degree" value="Bachelor's degree">BDBachelor's degree</input>
            <br><input type="radio" id="degree" name="degree" value="Master's degree">Master's degree</input>
            <br><input type="radio" id="degree" name="degree" value="PHD">Ph.D.</input>                 
          

          <h4>Credits</h4>
          <h5>Please enter the number of credits you have earned thus far</h5>
          <textarea id="note" name="note" cols="3" rows="1"></textarea>
          
          <h4>Transcripts</h4>
          <h5>If you want, you can upload your unofficial transcript here</h5>
       
          <input type="file" name="fileToUpload" id="fileToUpload">
             
        
        <br>
        <div class="row">
            <button class="col-md-2 btn btn-primary" name='Previous'>Previous</button>
            <button class="col-md-2 col-md-offset-8 btn btn-primary" name='Submit'>Continue</button>
        </div>
    </div>
        
        

    </form>



    </div> <!-- /container -->
  
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>


  </body>
</html><?php

?>