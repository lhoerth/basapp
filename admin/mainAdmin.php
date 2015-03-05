<?php
     //Start a session
    session_start();
    //Start the buffer
    ob_start();
    if(!isset($_SESSION['myemail'])){
        header("Location:index.php");
    }
    
    require "../db.php";
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
        <nav class="navbar navbar-default">
            <div class="navbar-header">
                <?php
            
                    if($_GET['menu']== 1){
                        echo'<h2>Change Password</h2>';
                    } else if($_GET['menu'] == 2){
                        echo'<h2>Logged Out</h2>';
                    } else{
                        echo'<h2>Who has applied</h2>';
                    }
                ?>
            </div>
            
            <ul class="nav navbar-nav navbar-right">
                <li class="divide"><a href="mainAdmin.php?menu=2">Logout</a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Account Maintenance<span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="mainAdmin.php?menu=1">Change Password</a></li>
                    <li><a href="mainAdmin.php">Who has applied</a></li>
                  </ul>
                </li>
              </ul>
        </nav>
        <div class="row">
            <?php
            
            if($_GET['menu']== 1){
                $page = "chngPass";
            } else if($_GET['menu'] == 2){
                $page = "logout";
            } else{
                $page = "../showApplied";
            }
              include ($page.".php");
            ?>
           
        </div>
        
    </body>
</html>
<?php
     //Flush buffer
    ob_flush();
?>