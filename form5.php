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

</div>

<?php
 //Flush buffer
 ob_flush();
?>