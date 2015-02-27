<?php  
//*** Start a session
session_start();
//*** Start the buffer
ob_start();
echo"<prev>";
var_dump($_SESSION);
echo"</prev>";
?>
<div class="container">
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
   
   
   
   if(isset($_SESSION['netReq'])){
    $require = "<br><b>Prequisites Completed:</b>";
    foreach($_SESSION['netReq'] as $info){
        $require .= $info;
    }
    echo $require;
   }
   
   
   
   
if(isset($_SESSION['softReq'])){
    $require = "<br><b>Prequisites Completed:</b>";
    foreach($_SESSION['softReq'] as $info){
        $require .= $info;
    }
    echo $require;
   }
   
    
   
   if(isset($_SESSION['comment'])){
    echo "<br><b>IT class taken: </b>" . $_SESSION['comment'];
   }
 
echo "<br><b>Education: </b>" . $_SESSION['lvlEducation'];
echo "<br><b>Credits: </b>" . $_SESSION['collegeCredits'];
echo "<br>"

   
   
?>
<form action="submitData.php" method="post">
    <button class="col-md-2 col-md-offset-10 btn btn-primary" name="Final">Submit</button>
</form>
    
    
    
    

</div>

<?php
 //Flush buffer
 ob_flush();
?>