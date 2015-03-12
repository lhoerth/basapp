<?php
    //Start a session
    session_start();
    //Start the buffer
    ob_start();
    
    $email = $_GET['email'];
   
   require "../db.php";
   $tbl_name="admin"; // Table name
   if(!isset($_SESSION['myemail'])){
        $sql = "SELECT * FROM $tbl_name WHERE email='$email'";
        $result = $dbh->query($sql);
            
        // Counting table row check if email valid
        $count=$result->rowCount();
        
        if($count == 1){
            $_SESSION['myemail']= $email;
            exit;   
        }else{
            $_SESSION['errorMsg'] ="Invalid Email Entry";
            header("Location:index.php");
            exit;    
        }
   }
   
  
   if (isset($_POST['Submit'])){
                // Isset used for buttons
                //echo "Form was submitted.";  
            
                $compareEmail = $_SESSION['myemail'];
                $newPassword = $_POST['newPass'];
                $confirmPassword = $_POST['confirmPass'];
                // Prepare database
                $sql = "UPDATE admin SET password = :value where email = :email";
                $statement = $dbh->prepare($sql);
                
             
                if ($newPassword == $confirmPassword)
                {
                    
                       if (strlen($newPassword) < 8)
                       {
                              $_SESSION['errorMsg'] = "<div class='alert alert-danger' role='alert'><p>Password needs to be a minimum of 8 characters long.</p></div>";
                       }
                       else
                       {
                        
                             
                              $statement->bindParam(':value', $newPassword);
                              $statement->bindParam(':email', $compareEmail);
                              $statement->execute();
                              $_SESSION['sucess'] ="Password updated! Please sign in.";
                              header("Location:index.php");
                              exit;
                       }
                       
                }
                else{
                       $_SESSION['errorMsg'] = "<div class='alert alert-danger' role='alert'><p>The password entered is missmatched!</p></div>";
                }
    }
  
    
    
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin Main</title>
        
        <!-- Latest compiled and minified Bootsrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
        <style>
        
        body { padding-bottom: 70px; }
        
        .divide{
            border-right-style: solid;
            border-right-width: 1px;
            border-right-color: lightgray;}
        
        </style>        
            <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> 
        
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->   
    </head>
    <body>
        <div class="container">
            <form role="form" action="passReset.php?<?php echo($_SESSION['myemail'])?>" method="post">
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" name='email' value='<?php echo($_SESSION['myemail'])?>' disabled>
                    </div>
                    <div class="form-group">
                        <label for="newPass">New Password</label>
                        <input type='text' class='form-control input-large search-query' id='newPass' name='newPass'>
                    </div>
                    <div class="form-group">
                        <label for="confirmPass">Confirm Password</label>
                        <input type='text' class='form-control input-large search-query' id='confirmPass' name='confirmPass'>
                        <?php
                        if(isset($_SESSION['errorMsg'])){
                            echo($_SESSION['errorMsg']);
							unset($_SESSION['errorMsg']);
                        }
                        ?>
                    </div>
                   <div class="form-group">
                          <button type="submit" class="btn btn-primary" name="Submit">Change Password</button>
                   </div>
            </form>
        </div>
    </body>
</html>
<?php
     //Flush buffer
    ob_flush();
?>
