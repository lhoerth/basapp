<?php
    //*** Start a session
    session_start();
    //*** Start the buffer
    ob_start();
    //See if the form has been submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
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
                        
                              $_SESSION['errorMsg']= "<div class='alert alert-success' role='alert'><p>Password Changed Successfully!</p></div>";
                              $statement->bindParam(':value', $newPassword);
                              $statement->bindParam(':email', $compareEmail);
                              $statement->execute();  
                       }
                       
                }
                else{
                       $_SESSION['errorMsg'] = "<div class='alert alert-danger' role='alert'><p>The password entered is missmatched!</p></div>";
                }
       }
    
?>
<div class="container">
    <form role="form" action="mainAdmin.php?menu=1" method="post">
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
                }
                ?>
            </div>
           <div class="form-group">
                  <button type="submit" class="btn btn-primary">Change Password</button>
           </div>
    </form>
</div>


        

</html>

<?php
 //Flush buffer
 ob_flush();
?>