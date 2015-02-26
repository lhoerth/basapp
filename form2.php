<?php
    //*** Start a session
    session_start();
    //*** Start the buffer
    ob_start();
    
    /* //DEBUGGING - OUTPUT SESSION 
	echo "<pre>";
	print_r($_POST);
	print_r($_SESSION);
	echo "</pre>";
	*/

	//Goes back to previous page
	if(isset($_POST['Previous1'])){
		header("Location: index.php?page=form1");
		exit;
	}

	//Submits data to session and moves to next page 
	if(isset($_POST['Submit1'])){
		if(isset($_POST['veteran'])){
			$_SESSION['veteran'] = $_POST['veteran'];
		}

		if(isset($_POST['is'])){
			$_SESSION['is'] = $_POST['is'];
		}

		if(isset($_POST['rs'])){
			$_SESSION['rs'] = $_POST['rs'];
		}
		
		header("Location: index.php?page=form3");
		exit;
	}
?>
        <form class="form-horizontal" method="post" action="#" role="form" >
            <div class="container">
				
			<!--Check boxes to choose statuses-->
					<div class="category">          
						<fieldset>
						<legend>I am a (please check all that apply):</legend>
								<input class="col-sm-1" type="checkbox" value="veteran" name="veteran" <?php echo ($_SESSION['veteran'] === "veteran")?"checked":""; ?>>
														<label>Veteran</label><br>
								<input class="col-sm-1" type="checkbox" value="international" name="is" <?php echo ($_SESSION['is'] === "international")?"checked":""; ?>>
														<label>International student</label><br>
								<input class="col-sm-1" type="checkbox" value="running-start" name="rs" <?php echo ($_SESSION['rs'] === "running-start")?"checked":""; ?>>
														<label>Running Start student</label><br>
						</fieldset>
					</div>
					<br>
					<div class="row">
						<button class="col-md-2 btn btn-primary" name="Previous1">Previous</button>
						<button class="col-md-2 col-md-offset-8 btn btn-primary" name="Submit1">Continue</button>
					</div>
				
            </div>
		</form>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> 

<?php
 //Flush buffer
 ob_flush();
?>