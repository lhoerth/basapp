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

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
   

    <title>Narrow Jumbotron Template for Bootstrap</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="bas.js"></script>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="jumbotron-narrow.css" rel="stylesheet">

 

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
        <form method="post" name="mockupbas" action="form4.php" onsubmit="return(validateForm());">
                <div class="container">
                        <div class="form-group text-center">
                                <h3>Which degree are you interested in?</h3>
                                <input type="radio" id="software" name="degree" value="software" onclick="javascript:yesnoCheck();"> Software Development </input>
                                <input type="radio" id="network" name="degree" value="network"onclick="javascript:yesnoCheck();"> Network & Security </input>
                                <input type="radio" id="ud" name="degree" value="ud" onclick="javascript:yesnoCheck();"> Undecided </input>
                            
                            
                          
                        <div id="software">
                                <div align="left" id="ss">
                                    <h4>Software Development Prerequistes</h4>
                                    <h5>Please check the classes you have taken</h5>
                                    <h6>Note: If you don't meet all of the prerequisites, or have extensive industry experience, an advisor will contact you to discuss options.</h6>
                    
                                    <input type="checkbox" id="core" name="core" value="core"> Programming I and II (CSCI 141&145 or CSCI 131&132)</input>
                                    <br>
                                    <input type="checkbox" id="201" name="201" value="201">IT 201:  Database Fundamentals, or equivalent </input>
                                    <br>
                                    <input type="checkbox" id="190" name="190" value="190">IT 190:  Intro to Linux or LPI1 or Linux Essentials</input>
                                    <br>
                                    <input type="checkbox" id="121" name="121" value="121">IT 121:  HTML/CSS, or equivalent</input>
                                    <p>Comments:<br>
                                        <textarea id="note" name="note" class="form-control" cols="25" rows="8"></textarea>
                                    </p>
                                    <br>
                                    <input type="checkbox"> I verify that the information submitted here is accurate and complete.</input>
                                    <br>
                                    
                                </div>
                        </div>
                      
                    
                        <div id="network">
                                <div align="left" id="nn">
                                        <h4>Network Administration and Security Prerequisites</h4>
                                        <h5>Please check the classes you have taken</h5>
                                        <h6>Note: If you don't meet all of the prerequisites, or have extensive industry experience, an advisor will contact you to discuss options.</h6>
                                        <input type="checkbox" id="CCENT" name="CCENT" value="CCENT">IT 210 or CCENT</input>
                                        <br>
                                        <input type="checkbox" id="MTA" name="MTA" value="MTA">IT 160 or MTA</input>
                                        <br>
                                        <input type="checkbox" id="Linux" name="Linux" value="Linux">IT 190 or LPI1 or Linux Essentials</input>
                                        <br>
                                        <input type="checkbox" id="102" name="102" value="102">IT 102 or a programming course</input>
                                        <br>
                                        <input type="checkbox" id="240" name="240" value="240">IT 240 or 70-411 Microsoft MCP</input>
                                        <p>Comments:<br>
                                                <textarea id="note" class="form-control" name="comment" cols="25" rows="8"></textarea>
                                        </p>
                                        <br>
                                        <input type="checkbox"> I verify that the information submitted here is accurate and complete.</input>
                                        <br>
                                      
                                </div>
                        </div>
                            
                        <div id="uu">
                             <div align="left">   
                                <br>Please list any IT classes that you have taken:
                                <br><textarea id="note" class="form-control" name="comment" cols="25" rows="8"></textarea></p> 
                                <input type="checkbox"> I verify that the information submitted here is accurate and complete.</input>
                                <br>
                                
                             </div>
                        </div>

                        </div>
                        <div class="row" id="buttons">
                                <button class="col-md-2 btn btn-primary" name='Previous'>Previous</button>
                                <button class="col-md-2 col-md-offset-8 btn btn-primary" name='Submit'>Continue</button>
                        </div>
                </div>

        </form>

  
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="javascript/form3.js"></script>

  </body>
</html>
<?php
 //Flush buffer
 ob_flush();
?>