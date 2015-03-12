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
        
        $subject = "Forgot Password";
    
        $headers = 'MIME-Version: 1.0'."\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        
        $message = '
          <html>
          <body>
            <h1>Hello,</h1>
            <p>Your password reset link send to your e-mail address.</p>
            <a href="http://caseym.greenrivertech.net/328/basapp/admin/passReset.php?'.$myemail.'" target="_blank">Reset Password</a>
          </body>
          </html>  
        ';
        
        mail($myemail,$subject,$message,$headers);
        header("Location:index.php");
        exit;
           
    }else{
        $_SESSION['errorMsg']="Not able to reset password!";
        header("Location:index.php");
        exit;
    }
    
}
//Flush buffer
ob_flush();
?>
