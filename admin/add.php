<?php
    //Start a session
    session_start();
    //Start the buffer
    ob_start();
       //Flag variable for valid data
        $valid = true; 
    if($_GET['action'] == "delete"){
      
        //counts the amount of admins. Making sure that atleast one is still available
       $sql = "SELECT * from admin";
       $result = $dbh->query($sql);
       // Counting table row
       $count=$result->rowCount();
       
       if($count > 1){
              $sql = "DELETE FROM admin WHERE UUID = :UUID";
              $statement = $dbh->prepare($sql);
              $statement->bindParam(':UUID', $_GET['id'], PDO::PARAM_STR);
              $statement->execute();
       }
       
       
    }
    
    if(isset($_POST['Add'])){
       
       // Isset used for buttons
        //echo "Form was submitted.";
        
           
    
    
        
        if (!empty($_POST['email'])){
            
            $email = $_POST['email'];
            // Sanitize email
            $emailSanitized = filter_var($email, FILTER_SANITIZE_EMAIL);
            if (filter_var($emailSanitized, FILTER_VALIDATE_EMAIL))
            {
                if(strpos($emailSanitized, "@greenriver.edu")=== false && strpos($emailSanitized, "@mail.greenriver.edu")=== false){
                    $emailErr="<p class='error'>Email address is not the correct Green River email.</p>";
                    echo $emailSanitized;
                    
                    $valid = false;
                }
            }
            else
            {
                $emailErr = "<p class='error'>Email address invalid!</p>";
                $valid = false;
            }
           
        }   else {
            $emailErr = "<p class='error'>Email is required.</p>";
            $valid = false;
        
        }
        
         //First name
        if (!empty($_POST['firstName'])) {
            $first = $_POST['firstName'];
            
            if (!ctype_alpha($first)) {
                $firstErr = "<p class='error'>First name may only contain alphabetic characters.</p>";
                $valid = false;               
            }
        } else {
            $firstErr = "<p class='error'>Please enter first name.</p>";
            $valid = false;
        }
        //Last name
        if (!empty($_POST['lastName'])) {
            $last = $_POST['lastName'];
            if (!ctype_alpha($last)) {
                $lastErr = "<p class='error'>Last name may only contain alphabetic characters.</p>";
                $valid = false;               
            }            
        } else {
            $lastErr = "<p class='error'>Please enter last name.</p>";
            $valid = false;
        }
        
        
        //Password
        if (!empty($_POST['password'])) {
            $password= $_POST['password'];
            if (strlen($password) < 8){
                $passErr = "<p class='error'>Password needs to be a minimum of 8 characters long.</p>";
                $valid = false;
            }
        } else {
            $passErr = "<p class='error'>Password needs to be entered to add user.</p>";
            $valid = false;
        }
        
        //If the data is valid, write to DB
        
        if ($valid) {
           $sql = "INSERT INTO admin(firstName, lastName, email, password)
            VALUES (:first, :last, :email, :password)";
            $statement = $dbh->prepare($sql);
            $statement->bindParam(':first', $first, PDO::PARAM_STR);
            $statement->bindParam(':last', $last, PDO::PARAM_STR);
            $statement->bindParam(':email', $emailSanitized, PDO::PARAM_STR);
            $statement->bindParam(':password', $password, PDO::PARAM_STR);
            $statement->execute();
            unset($_POST);
            header("Location: mainAdmin.php?menu=3");
            
        }
    }
?>

<div class="container">
<h2>List of Administrator Accounts:</h2>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
  Add Administrator
</button>
 
 <!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">New Administrator</h4>
      </div>
      <div class="modal-body">
              <h2>Add</h2>
              <form role="form" action="mainAdmin.php?menu=3&complete=yes" method="post">
                <div class="form-group">
                  <div class="form-group">
                     <label for="firstName">First Name: <?php echo "<span class='alert-danger'>".$firstErr."</span>"; ?></label>
                     <input type="text" class="form-control" name="firstName" id="firstName" value= '<?php echo $_POST['firstName']; ?>'>
                   </div>
                   <div class="form-group">
                     <label for="lastName">Last Name:</label><?php echo "<span class='alert-danger' >".$lastErr."</span>"; ?>
                     <input type="text" class="form-control" name="lastName" id="lastName" value= '<?php echo $_POST['lastName']; ?>'>
                   </div>
                  <div class="form-group">
                  <label for="email">Email Address:</label><?php echo "<span class='alert-danger' >".$emailErr."</span>"; ?>
                  <input type="email" class="form-control" name="email" id="email" value= '<?php echo $_POST['email']; ?>'>
                 </div>
                <div class="form-group">
                  <label for="password">Password</label><?php echo "<span class='alert-danger' >".$passErr."</span>"; ?>
                  <input type="password" class="form-control" name="password" id="password" value= '<?php echo $_POST['password']; ?>'>
                      <p class="help-block">Minimal requirement of 8 or more characters.</p>
                </div>
                  <div class="form-group">
                <button type="submit" class="btn btn-primary" name="Add">Add</button>
                  </div>
              </form>
      </div>
      </div>
    </div>
  </div>
</div>
 
 <table id="example" width="100%" class="table table-striped table-bordered" cellspacing="0">
        <thead>
            <tr>
                <th>Delete</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
            </tr>
        </thead>
 
        <tfoot>
            <tr>
                <th>Delete</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
            </tr>
        </tfoot>
        <tbody>
            
            <?php
                //Display contacts from database
                $sql = "SELECT * from admin";
                $result = $dbh->query($sql);
                printf("<tr>");
                foreach ($result as $row) {
                    echo("<td><a href='?menu=3&action=delete&id=".$row['UUID']."'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></a></td>");
                    printf("<td>%s</td>", $row['firstName']);
                    printf("<td>%s</td>", $row['lastName']);
                    printf("<td>%s</td></tr>", $row['email']);
                }
            ?>
        </tbody>
    </table>
        
</div>
<script type="text/javascript" class="init">

    $(document).ready(function() {
              $('#example').dataTable();
              //Re-open model if error message
              var formErrors = "<?php echo($valid);?>";
              if (!formErrors) {
                $('.modal').modal('show');
              }

            
            
    } );

</script>
<?php
     //Flush buffer
    ob_flush();
?>