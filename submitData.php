<?php
//*** Start a session
session_start();
//*** Start the buffer
ob_start();

if(isset($_POST['submit'])){
    if($_SESSION['degree'] == "software"){
        $toTheCollege = "casemorris@hotmail.com"; //Email to someone managing in software dev BAS
        $degree = "inquiring about a BAS in Software Development.";
    } else if($_SESSION['degree'] == "netork"){
        $toTheCollege = "mobiuswheel@gmail.com"; //Email to someone managing in the network BAS
        $degree = "inquiring about a BAS in Networking.";
    } else if($_SESSION['degree'] == "ud"){
        $toTheCollege = "mobiuswheel@gmail.com"; //Email to someone managing any BAS
        $degree = "is un-sure what degree best fits!";
    }
    
    $subjectToTheCollege = "A new possible student!";
    
    $headersToTheCollege = 'MIME-Version: 1.0'."\r\n";
    $headersToTheCollege .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    
    
    if($_SESSION['student'] == "cs"){
        $student = "Current";
    } else{
        $student = "New";
    }
    
    $messageAboutStudent = '
    <html>
    <body>
        <h1>'.$student.' student '.$degree.'</h1>
        
    ';
    
    //Email sent based on student
    $to = $_SESSION['email'];
    $first_name = $_SESSION['first'];
    $last_name = $_SESSION['last'];
    $subject = "Form Submitted";
    $subject2 = "Copy of your form submission";
    
    $headers = 'MIME-Version: 1.0'."\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    
    
    $messageCurrentStudent ='
    <html>
    <body>
    <h3>Hello '.$first_name.' '.$last_name.':</h3>
    <p>Thank you for your application to Green River\'s BAS program. An advisor will contact you within 2 business days.</p>
    <br>
    <p>In the meantime, please check us out on...</p>
    <br>
    <a href="https://twitter.com/GreenRiverIT">
        <img title="Twitter" alt="Twitter" src="https://socialmediawidgets.files.wordpress.com/2014/03/01_twitter.png" width="35" height="35" /></a>
    <a href="https://www.facebook.com/greenrivertechnologyprograms">
        <img title="Facebook" alt="Facebook" src="https://socialmediawidgets.files.wordpress.com/2014/03/02_facebook.png" width="35" height="35" /></a>
    <a href="https://www.linkedin.com/groups/Green-River-Technology-Program-6781985?home=&gid=6781985&trk=anet_ug_hm ">
        <img title="LinkedIn" alt="LinkedIn" src="https://socialmediawidgets.files.wordpress.com/2014/03/07_linkedin.png" width="35" height="35" /></a>
    <a href="http://instagram.com/greenrivertech">
        <img title="Instagram" alt="RSS" src="https://socialmediawidgets.files.wordpress.com/2014/03/10_instagram.png" width="35" height="35" /></a>
    </body>
    </html>
    ';
    
    $messageNewStudent = '
    <html>
    <body>
    <h3>Hello '.$first_name.' '.$last_name.':</h3>
    <p>Thank you for your application to Green River\'s BAS program. An advisor will contact you within 2 business days.</p>
    <br>
    <p>In the meantime, please check us out on...</p>
    <br>
    <a href="https://twitter.com/GreenRiverIT">
        <img title="Twitter" alt="Twitter" src="https://socialmediawidgets.files.wordpress.com/2014/03/01_twitter.png" width="35" height="35" /></a>
    <a href="https://www.facebook.com/greenrivertechnologyprograms">
        <img title="Facebook" alt="Facebook" src="https://socialmediawidgets.files.wordpress.com/2014/03/02_facebook.png" width="35" height="35" /></a>
    <a href="https://www.linkedin.com/groups/Green-River-Technology-Program-6781985?home=&gid=6781985&trk=anet_ug_hm ">
        <img title="LinkedIn" alt="LinkedIn" src="https://socialmediawidgets.files.wordpress.com/2014/03/07_linkedin.png" width="35" height="35" /></a>
    <a href="http://instagram.com/greenrivertech">
        <img title="Instagram" alt="RSS" src="https://socialmediawidgets.files.wordpress.com/2014/03/10_instagram.png" width="35" height="35" /></a>
    <br>
    <br>
    <a href="nextsteps.php" target="_blank"><em>Info:</>What To Do Next?</a>  
    </body>
    </html>
    ';
    
      if($_SESSION['student'] == "cs"){
        mail($to,$subject,$messageCurrentStudent,$headers);
    } else{
        mail($to,$subject,$messageNewStudent,$headers);
    }
    
    }
    
 //Flush buffer
 ob_flush();
?>