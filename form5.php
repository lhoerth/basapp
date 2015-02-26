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

?>
<div class="container">

</div>

<?php
 //Flush buffer
 ob_flush();
?>