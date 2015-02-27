<?php
//*** Start a session
session_start();
//*** Start the buffer
ob_start();

if(isset($_POST['Final'])){
    $counter = 0;
      require "db.php";
    
   $sql = "INSERT INTO `Student_Info`(`First`, `Last`, `Email`, `Phone`, `Degree`, `Sid`, `Status`, `Prereqs`, `Education`, `Credits`, `Transcript`,`requestedDate`) VALUES (:first, :last, :email, :phone, :degree, :sid, :status, :prereqs, :education, :credits, :transcript, :date)";

                                        
                
              $statement = $dbh->prepare($sql);
                
                
               
                $first = $_SESSION['first'];
                $last = $_SESSION['last'];
                $email = $_SESSION['email'];
                $phone = $_SESSION['phone'];
                $degree = $_SESSION['degree'];
                
                if($_SESSION['student']== "cs"){
                  $sid = $_SESSION['sid'];
                }else {
                  $sid = "NA"; //Not applicable
                }
                
                //Initialize $status
                $hasStatus = FALSE;
                $status;
                
                if(isset($_SESSION['veteran'])){
		    $status .= $_SESSION['veteran']." ";
                    $hasStatus = TRUE;
		}
		if(isset($_SESSION['is'])){
		    $status .= $_SESSION['is']." ";
                    $hasStatus = TRUE;
		}
		if(isset($_SESSION['rs'])){
		    $status .= $_SESSION['rs']." ";
                    $hasStatus = TRUE;
		}
                
                if($hasStatus == FALSE){
                  $status .= "NA";
                }
                
                
                //Prereqs determined based on degree wanting.
                $prereqs;
                if($_SESSION['degree'] == 'software'){
		    $prereqs .= implode(",", $_SESSION['softReq']); 
		}else if($_SESSION['degree']== 'network'){
		    $prereqs .= implode(",", $_SESSION['netReq']); 
		}else if($_SESSION['degree']== 'ud'){
		    $prereqs .= $_SESSION['comment'];
		} else {
                    $prereqs .= "None";
                }
                
                
                $education = $_SESSION['lvlEducation'];
                $credits = $_SESSION['collegeCredits'];
                
		//Transcript checker
		if(isset($_SESSION['transcript'])){
		  $transcript = $_SESSION['transcript'];
		} else {
		  $transcript = "NULL";
		}
		
                $date = date(DATE_ATOM);
                
            
                $statement->bindParam(':first', $first, PDO::PARAM_STR);
                $statement->bindParam(':last', $last, PDO::PARAM_STR);
                $statement->bindParam(':email', $email, PDO::PARAM_STR);
                $statement->bindParam(':phone', $phone, PDO::PARAM_INT);
                $statement->bindParam(':degree', $degree, PDO::PARAM_STR);
                $statement->bindParam(':sid', $sid, PDO::PARAM_INT);
                $statement->bindParam(':status', $status, PDO::PARAM_STR);
                $statement->bindParam(':prereqs', $prereqs, PDO::PARAM_STR);
                $statement->bindParam(':education', $education, PDO::PARAM_STR);
                $statement->bindParam(':credits', $credits, PDO::PARAM_INT);
                $statement->bindParam(':transcript', $transcript, PDO::PARAM_STR);
                $statement->bindParam(':date', $date, PDO::PARAM_STR);

               $statement->execute();
    
    //If we want to email school with student info individually
    /*if($_SESSION['degree'] == "software"){
        $toTheCollege = "casemorris@hotmail.com"; //Email to someone managing in software dev BAS
        $degree = "inquiring about a BAS in Software Development.";
    } else if($_SESSION['degree'] == "netork"){
        $toTheCollege = "mobiuswheel@gmail.com"; //Email to someone managing in the network BAS
        $degree = "inquiring about a BAS in Networking.";
    } else if($_SESSION['degree'] == "ud"){
        $toTheCollege = "mobiuswheel@gmail.com"; //Email to someone managing any BAS
        $degree = "is un-sure what degree best fits!";
    }
    */
    
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
        <a href="caseym.greenrivertech.net/328/basapp/showApplied.php" target="_blank">View Applicants</a>
      </body>
      </html>  
    ';
    $counter++;
    mail("mobiuswheel@gmail.com",$subjectToTheCollege,$messageAboutStudent,$headersToTheCollege);
    
    
    
    
    //Email sent based on student
    $to = $_SESSION['email'];
    $first_name = $_SESSION['first'];
    $last_name = $_SESSION['last'];
    $subject = "Form Submitted";
    
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
    <a href="caseym.greenrivertech.net/328/basapp/nextsteps.php" target="_blank"><em>Info:</em>What To Do Next?</a>  
    </body>
    </html>
    ';
      $counter++;
      
      if($_SESSION['student'] == "cs"){
        mail($to,$subject,$messageCurrentStudent,$headers);
    } else{
        mail($to,$subject,$messageNewStudent,$headers);
    }
    if($counter == 2){
    header("Location: thankyou.html");
    exit;
    }

}
    
 //Flush buffer
 ob_flush();
?>