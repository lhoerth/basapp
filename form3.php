<?php
session_start();
 //*** Start the buffer
    ob_start();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['Submit'])){
            header("Location: index.php?page=form4");
            exit;
        }
        if(isset($_POST['Previous'])){
            header("Location: index.php?page=form2");
            exit;
        }
}
$_SESSION['veteran'] = $_POST['veteran'];
$_SESSION['is'] = $_POST['is'];
$_SESSION['rs'] = $_POST['rs'];
$_SESSION['GED'] = $_POST['GED'];
$_SESSION['AD'] = $_POST['AD'];
$_SESSION['BD'] = $_POST['BD'];
$_SESSION['MD'] = $_POST['MD'];
$_SESSION['PHD'] = $_POST['PHD'];
$_SESSION['note'] = $_POST['note'];
$_SESSION['fileToUpload'] = $_POST['fileToUpload'];
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   

    <title>Degree</title>

  </head>

  <body>
    
        <form method="post" name="mockupbas" action="form3.php" onsubmit="return(validateForm());">
            <div class="container text-center">
         

       
                <h3>Which degree are you interested in?</h3>
                <input type="radio" id="degree" name="degree" value="software">Software Development</input>
                <input type="radio" id="degree" name="degree" value="network">Network & Security</input>
                <input type="radio" id="degree" name="degree" value="ud">Undecided</input>
                
                <br>
                    
                
                    
                    
                  
                    <div class="row marketing" id="software">
                    <div align="left" class="col-lg-6" id="ss">
                      <h4>Software Development Prerequistes</h4>
                     <h5>Please check the classes you have taken</h5>
                      <h6>Note: If you don't meet all of the prerequisites, or have extensive industry experience, an advisor will contact you to discuss options.</h6>
            
                        <input type="checkbox" id="core" name="core" value="core"> Programming I and II (CSCI 141&145 or CSCI 131&132)</input>
                        <br><input type="checkbox" id="201" name="201" value="201">IT 201:  Database Fundamentals, or equivalent </input>
                        <br><input type="checkbox" id="190" name="190" value="190">IT 190:  Intro to Linux or LPI1 or Linux Essentials</input>
                        <br><input type="checkbox" id="121" name="121" value="121">IT 121:  HTML/CSS, or equivalent</input>
                        <p>Comments:<br>
             <textarea id="note" name="note" cols="10" rows="3"></textarea></p>
                    <br><input type="checkbox"> I verify that the information submitted here is accurate and complete.</input>
             <br><button href='form4.php' name='Submit'>Submit</button> 
                    </div>
              
            
                    <div class="col-lg-6" id="network">
                        <div align="left" id="nn">
                      <h4>Network Administration and Security Prerequisites</h4>
                      <h5>Please check the classes you have taken</h5>
                      <h6>Note: If you don't meet all of the prerequisites, or have extensive industry experience, an advisor will contact you to discuss options.</h6>
                        <input type="checkbox" id="CCENT" name="CCENT" value="CCENT">IT 210 or CCENT</input>
                        <br><input type="checkbox" id="MTA" name="MTA" value="MTA">IT 160 or MTA</input>
                        <br><input type="checkbox" id="Linux" name="Linux" value="Linux">IT 190 or LPI1 or Linux Essentials</input>
                        <br><input type="checkbox" id="102" name="102" value="102">IT 102 or a programming course</input>
                        <br><input type="checkbox" id="240" name="240" value="240">IT 240 or 70-411 Microsoft MCP</input>
                          <p>Comments:<br>
             <textarea id="note" name="comment" cols="10" rows="3"></textarea></p>
                <br><input type="checkbox"> I verify that the information submitted here is accurate and complete.</input>
             <br><button href='form4.php' name='Submit'>Submit</button> 
                    </div>
                        </div>
                    
                    <div id="ud">
                        
                        <br>Please list any IT classes that you have taken:
                        <br><textarea id="note" name="comment" cols="25" rows="8"></textarea></p> 
                        <input type="checkbox"> I verify that the information submitted here is accurate and complete.</input>
             <br><button href='form4.php' name='Submit'>Submit</button> 
                    </div>
                        
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
            
            
                
            
                
            </div>
        </form>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="javascript/form3.js"></script>    


  </body>
</html>
<?php
 //Flush buffer
 ob_flush();
?>