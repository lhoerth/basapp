<?php
session_start();
 //*** Start the buffer
ob_start();

if(isset($_POST['Previous2'])){
                header("Location: index.php?page=form2");
                exit;
        }


        if(isset($_POST['Submit2'])){
                if(isset($_POST['degree'])){
                        $_SESSION['degree'] = $_POST['degree'];
                        if($_SESSION['degree'] == 'software'){
                                if(isset($_POST['softReq'])){
                                       $_SESSION['softReq'] = $_POST['softReq']; 
                                }
                                
                        }else if($_SESSION['degree']== 'network'){
                                if(isset($_POST['netReq'])){
                                       $_SESSION['netReq'] = $_POST['netReq']; 
                                } 
                        }else if($_SESSION['degree']== 'ud'){
                                if(isset($_POST['comment'])){
                                        $_SESSION['comment'] = $_POST['comment'];
                                }
                        }
                        header("Location: index.php?page=form4");
                        exit;
                }
                       
        }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Degree</title>
    

    <!-- Bootstrap core CSS -->
    <link href="bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
        <form method="post" action="#" onsubmit="return(validateForm());">
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
                    
                                    <input type="checkbox" id="core" name="softReq[]" value="core"> Programming I and II (CSCI 141&145 or CSCI 131&132)</input>
                                    <br>
                                    <input type="checkbox" id="201" name="softReq[]" value="201">IT 201:  Database Fundamentals, or equivalent </input>
                                    <br>
                                    <input type="checkbox" id="190" name="softReq[]" value="190">IT 190:  Intro to Linux or LPI1 or Linux Essentials</input>
                                    <br>
                                    <input type="checkbox" id="121" name="softReq[]" value="121">IT 121:  HTML/CSS, or equivalent</input>
                                    <p>Comments:<br>
                                        <textarea id="note" name="softReq[]" class="form-control" cols="25" rows="8"></textarea>
                                    </p>
                                    <br>
                                    
                                </div>
                        </div>
                      
                    
                        <div id="network">
                                <div align="left" id="nn">
                                        <h4>Network Administration and Security Prerequisites</h4>
                                        <h5>Please check the classes you have taken</h5>
                                        <h6>Note: If you don't meet all of the prerequisites, or have extensive industry experience, an advisor will contact you to discuss options.</h6>
                                        <input type="checkbox" id="CCENT" name="netReq[]" value="CCENT">IT 210 or CCENT</input>
                                        <br>
                                        <input type="checkbox" id="MTA" name="netReq[]" value="MTA">IT 160 or MTA</input>
                                        <br>
                                        <input type="checkbox" id="Linux" name="netReq[]" value="Linux">IT 190 or LPI1 or Linux Essentials</input>
                                        <br>
                                        <input type="checkbox" id="102" name="netReq[]" value="102">IT 102 or a programming course</input>
                                        <br>
                                        <input type="checkbox" id="240" name="netReq[]" value="240">IT 240 or 70-411 Microsoft MCP</input>
                                        <p>Comments:<br>
                                                <textarea id="note" class="form-control" name="netReq[]" cols="25" rows="8"></textarea>
                                        </p>
                                        <br>
                                      
                                </div>
                        </div>
                            
                        <div id="uu">
                             <div align="left">   
                                <br>Please list any IT classes that you have taken:
                                <br><textarea id="note" class="form-control" name="comment" cols="25" rows="8"></textarea></p> 
                                
                                <br>
                                
                             </div>
                        </div>

                        </div>
                        <div class="row" id="buttons">
                                <button type="submit" class="col-md-2 btn btn-primary" name="Previous2">Previous</button>
                                <button type="submit" class="col-md-2 col-md-offset-8 btn btn-primary" name="Submit2">Continue</button>
                        </div>
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