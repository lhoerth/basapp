<?php  
//*** Start a session
session_start();
//*** Start the buffer
ob_start();

/* // DEBUGGING - OUTPUT SESSION 
echo "<pre>";
print_r($_POST);
print_r($_SESSION);
echo "</pre>";
*/

//Goes back to previous page
	if(!isset($_SESSION['Submit4'])){
		 header("Location: index.php?page=form1");
		 exit;
	}

?>
<div class="container">

</div>

<?php
 //Flush buffer
 ob_flush();
?>