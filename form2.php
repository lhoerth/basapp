<?php
    //*** Start a session
    session_start();
    //*** Start the buffer
    ob_start();
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
            <button class="col-md-2 col-md-offset-10 btn btn-primary" name='Submit'>Continue</button>
		
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