<?php  
//*** Start a session
session_start();
//*** Start the buffer
ob_start();

/*
echo "<pre>";
var_dump($_SESSION);
echo "</pre>";
*/
?>

<div class="container" id="sum">
    <h3>Summary</h3>
    <p>Please verify your information is correct and click submit</p>
    <?php
    echo "<b>First: </b>". $_SESSION['first'];
    echo "<br><b>Last: </b>". $_SESSION['last'];
     echo "<br><b>Student ID: </b>". $_SESSION['sid'];
    echo "<br><b>Email Address: </b>". $_SESSION['email'];
    echo "<br><b>Phone Number: </b>". $_SESSION['phone'];
    $status = " <br><b>Student status:</b>";
 
   if ($_SESSION['is'] == 'international') {
    $status .= "International Student," ;
   }
   
     if ($_SESSION['veteran'] == 'veteran') {
    $status .=" Veteran," ;
   }

   if ($_SESSION['rs'] == 'running-start') {
    $status .=" Running Start Student" ;
   }
   echo($status);
   
   if($_SESSION['degree']=='network'){
    echo "<br><b>Program interested:</b> Network & Security";
   }
   
    if($_SESSION['degree']=='software'){
    echo "<br><b>Program interested:</b> Software Development";
   }
   
   if($_SESSION['degree']=='ud'){
    echo "<br><b>Program interested: </b> Undecided";
   }
   
   

	
if(isset($_SESSION['netReq']) && $_SESSION['degree'] == "network"){
	$end = trim(end($_SESSION['netReq']));
	if (empty($end)){
		array_pop($_SESSION['netReq']);
	}

	echo "<br><b>Prequisites Completed: </b>" . implode(",", $_SESSION['netReq']);
}
    
if(isset($_SESSION['softReq']) && $_SESSION['degree'] == "software"){
	$end = trim(end($_SESSION['softReq']));
	if (empty($end)){
		array_pop($_SESSION['softReq']);
	}
    echo "<br><b>Prequisites Completed: </b>" . implode(",", $_SESSION['softReq']);
}
   
    
   
   if(isset($_SESSION['comment'])){
    echo "<br><b>IT class taken: </b>" . $_SESSION['comment'];
   }
 
echo "<br><b>Education: </b>" . $_SESSION['lvlEducation'];
echo "<br><b>Credits: </b>" . $_SESSION['collegeCredits'];
echo "<br>"

   
   
?>

<form action="submitData.php" method="post">
	<div class="row">
		<br>
		<button class="col-md-2 btn btn-primary" name='Previous4'>Previous</button>
		<button class="col-md-2 col-md-offset-10 btn btn-primary" name="Final">Submit</button>
	</div>
    
</form>
    
    
    
    

</div>

<?php
 //Flush buffer
 ob_flush();
?>