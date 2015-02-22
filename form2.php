<?php
    //*** Start a session
    session_start();
    //*** Start the buffer
    ob_start();
     if(isset($_POST['Previous'])){
            header("Location: index.php?page=form1");
            exit;
        }
        
        if(isset($_POST['Submit'])){
            header("Location: index.php?page=form3");
            exit;
        }
?>
<!DOCTYPE html>

<html>
<head>
    <title>BAS More Info Form</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
</head>
    
<body>
        <form class="form-horizontal" method="post" action="form2.php" role="form" >
            <div class="container">
		<!--Check boxes to choose statuses-->
                <div class="category">          
                        <fieldset>
                        <legend>I am a (please check all that apply):</legend>
                                <input type="checkbox" value="veteran" name="stats[]" >
                                                        <label>Veteran</label><br>
                                <input type="checkbox" value="international" name="stats[]" >
                                                        <label>International student</label><br>
                                <input type="checkbox" value="running-start" name="stats[]" >
                                                        <label>Running Start student</label><br>
                        </fieldset>
                </div>
		<br>
                <div class="row">
                    <button class="col-md-2 btn btn-primary" name='Previous'>Previous</button>
                    <button class="col-md-2 col-md-offset-8 btn btn-primary" name='Submit'>Continue</button>
                </div>
            </div>
		</form>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> 
    <script src="javascript/status.js"></script>
</body>
</html>
<?php
 //Flush buffer
 ob_flush();
?>