<?php
//Start a session
session_start();
// Start the buffer
ob_start();
 
$tbl_name="admin"; // Table name 
//Connect to the database
require "../db.php";
    
if(isset($_POST[Submit]))
{
    // email and password sent from form 
     $myemail=$_POST['email']; 
     $mypassword=$_POST['password']; 
    
    // To protect MySQL injection
    $myemail = htmlspecialchars($myemail);
    $mypassword = htmlspecialchars($mypassword);
    
    $sql="SELECT * FROM $tbl_name WHERE email='$myemail' and password='$mypassword'";
    $result = $dbh->query($sql);
    
    
    
    // Counting table row
     $count=$result->rowCount();
    
    // If result matched $myemail and $mypassword, table row must be 1 row
    
    if($count==1){
    
    // Register $myemail, $mypassword and redirect to file "adminMenu.php"
     $_SESSION["myemail"] = $myemail;
     header("Location:mainAdmin.php");
     }
     else {
     // Records an error and goes back to index
     $_SESSION["errorEmail"] = $myemail;
     $_SESSION['errorMsg'] ="Invalid Email and Password";
     header("Location:index.php");
     }
}else if(isset($_POST['Reset'])){
    $myemail=$_POST['email'];
    $sql="SELECT * FROM $tbl_name WHERE email='$myemail'";
    $result = $dbh->query($sql);
    $emailCount=$result->rowCount();
    
    if($emailCount==1){
        $_SESSION['resetEmail'];
        $encrypt = md5($myemail);
        $message = "Your password reset link send to your e-mail address.";
        $to=$myemail;
        $subject="Forget Password";
        $body='Hello<br><br>Click here to reset your password http://caseym.greenrivertech.net/328/basapp/admin/passReset.php?encrypt='.$encrypt;
        
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

        mail($to,$subject,$body,$headers);
        
    }else{
        $_SESSION['errorMsg']="Not able to reset password!";
        header("Location:index.php");
    }
    
}
//Flush buffer
ob_flush();
?>
