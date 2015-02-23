<?php  
//*** Start a session
session_start();
//*** Start the buffer
ob_start();

$errorsArray = array();


//Check if POST
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	if(isset($_POST['Submit'])){	
		//Validating POST
		//Pattern to match
		$patternStr = "/\S+/";
		$patternNum = "/^[0-9\_]{7,10}/";
		$patternEmail = "/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/";
		$patternSID = "/^[0-9\_]{9}/";
		
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
			$errorsArray['phone'] = "Please enter a valid number.";
		}else{
			$_SESSION['phone']= $_POST['phone'];
		}
		
		if($_POST['student']== "cs"){
			if(0 == preg_match($patternSID, $_POST['studentId'])){
				$errorsArray['sid'] = "Please enter your 9 digit student ID.";
			}else{
				$_SESSION['sid'] = $_POST['studentId'];
				$_SESSION['student'] = "cs";
			}
		}else{
			$_SESSION['student'] = "ns";
		}

		// If no errors, execute status.php
		if(0 === count($errorsArray)){
			header("Location: index.php?page=form2");
			exit;
		}		
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

<form role="form" method="post" class="form-horizontal" name="mockupbas" action="#" onsubmit="return(validateForm());">
	<div class="container">
		<div class="form-group text-center">
			<h3>Please select one:</h3>
			<input type='radio' name='student' value='cs' id='cs'<?php echo ($_SESSION['student'] === "cs")?"checked":""; ?>>
				<label for="cs">I am a current student&nbsp;&nbsp;</label>
			<input type='radio' name='student' value='ns' id='ns'<?php echo ($_SESSION['student'] === "ns")?"checked":""; ?>>
				<label for="ns">I am a new student</label>
		</div>                 
		<div class="show form-group">
			<label for="first" class="col-sm-3 control-label">First name:</label>
			<div class="col-sm-6">
				<input type="text" class="form-control" id="first" name="first" pattern="[a-zA-Z]{0,50}" placeholder="ex. John" maxlength=50 value="<?PHP echo htmlspecialchars($_SESSION['first']); ?>" required >
				<?php echo error('first') ?>
			</div>
		</div>
		<div class="show form-group">
			<label for="last" class="col-sm-3 control-label">Last name:</label>
			<div class="col-sm-6">
				<input type="text" class="form-control" id="last" name="last" pattern="[a-zA-Z]{0,50}" placeholder="ex. Smith" maxlength=50 value="<?PHP echo htmlspecialchars($_SESSION['last']); ?>" required >
				<?php echo error('last') ?>
			</div>
		</div>
	
			<div id="sid" class="form-group">
				<label for="studentId" class="col-sm-3 control-label">Student ID:</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="studentId" name="studentId" placeholder="must be 9 digits (SID not required for new students)" maxlength="9" value="<?PHP echo $_SESSION['sid'];?>">
					<?php echo error('sid') ?>
				</div>
			</div>
	 
		<div class="show form-group">
			<label for="email" class="col-sm-3 control-label">Email:</label>
			<div class="col-sm-6">
				<input type="email" class="form-control" id="email" name="email" placeholder="ex. jsmith@mail.greenriver.edu" value="<?PHP echo htmlspecialchars($_SESSION['email']); ?>" required>
				<?php echo error('email') ?>
			</div>
		</div>
		<div class="show form-group">
			<label for="phone" class="col-sm-3 control-label">Phone:</label>
			<div class="col-sm-6">
				<input type="text" class="form-control" id="phone" name="phone" pattern="[0-9]{3,3}[0-9]{3,3}[0-9]{4,4}$" placeholder="ex. 2534445555" maxlength=10 value="<?PHP echo htmlspecialchars($_SESSION['phone']); ?>" required>
				<?php echo error('phone') ?>
			</div>
		</div>
		<br>			
		<button class="col-md-2 col-md-offset-10 btn btn-primary" name='Submit'>Continue</button>
	</div>
</form>
<script src="javascript/contact.js"></script>      

<?php   
    if($_SESSION['student'] == "ns"){
        echo "<script>show();</script>";
    }else if($_SESSION['student'] == "cs"){
        echo "<script>showAll();</script>";
    }
?>

<?php
 //Flush buffer
 ob_flush();
?>
