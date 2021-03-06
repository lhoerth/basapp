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
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/plug-ins/f2c75b7247b/integration/bootstrap/3/dataTables.bootstrap.css">
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
        

    <script type="text/javascript" language="javascript" src="//cdn.datatables.net/1.10.5/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript" src="//cdn.datatables.net/plug-ins/f2c75b7247b/integration/bootstrap/3/dataTables.bootstrap.js"></script>

        
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
                    } else if($_GET['menu'] == 3){
                        echo'<h2>Add New Admin</h2>';
                    } else{
                        echo'<h2>Student Info</h2>';
                    }
                ?>
            </div>
            
            <ul class="nav navbar-nav navbar-right">
                <li class="divide"><a href="mainAdmin.php">Student Info</a></li>
                <li class="divide"><a href="mainAdmin.php?menu=2">Logout</a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Settings<span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="mainAdmin.php?menu=1">Change Password</a></li>
                    <li><a href="mainAdmin.php?menu=3">Add New Admin</a></li>
                    
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
            } else if($_GET['menu'] == 3){
                $page = "add";
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