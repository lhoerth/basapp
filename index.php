<?php
 session_start();
 ob_start();
?>
 
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Application</title>

    
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
   <style>
    <!---->
    
    ol.track-progress{
     margin: 0;
     padding: 0;
     overflow: hidden;
    }
    
    ol.track-progress li{
     list-style-type: none;
     display: inline-block;
     position: relative;
     margin: 0;
     padding: 0;
     text-align: center;
     line-height: 30px;
     height: 30px;
     background-color: #f0f0f0;
    }
    
    .track-progress[data-steps="3"] li {width:20%;}
    .track-progress[data-steps="4"] li {width:20%;}
    .track-progress[data-steps="5"] li {width:20%;}
    .track-progress[data-steps="6"] li {width:20%;}
    .track-progress[data-steps="7"] li {width:20%;}
    
    
    .track-progress li > span {
      display: block;
    
      color: #999;
      font-weight: bold;
      text-transform: uppercase;
    }

    .track-progress li.done > span {
      color: #666;
      background-color: #ccc;
    }
    
    .track-progress li > span:after,
    .track-progress li > span:before {
      content: "";
      display: block;
      width: 0px;
      height: 0px;
    
      position: absolute;
      top: 0;
      left: 0;
    
      border: solid transparent;
      border-left-color: #f0f0f0;
      border-width: 15px;
    }
    
    .track-progress li > span:after {
      top: -5px;
      z-index: 1;
      border-left-color: white;
      border-width: 20px;
    }
    
    .track-progress li > span:before {
      z-index: 2;
    }
    
    .track-progress li.done + li > span:before {
      border-left-color: #ccc;
    }
    
    .track-progress li:first-child > span:after,
    .track-progress li:first-child > span:before {
      display: none;
    }
    .track-progress li:first-child i,
    .track-progress li:last-child i {
       display: block;
       height: 0;
       width: 0;
     
       position: absolute;
       top: 0;
       left: 0;
     
       border: solid transparent;
       border-left-color: white;
       border-width: 15px;
     }
     
     .track-progress li:last-child i {
       left: auto;
       right: -15px;
     
       border-left-color: transparent;
       border-top-color: white;
       border-bottom-color: white;
     }
     form{
            background: #f0f0f0;
        }
        
       .container {
          width: 940px;
        
        }
        
        form{
            background: #f0f0f0;
        }
        
   </style>
  </head>
  
 <body>
  <!-- Main content area -->
    <div class="container">
      
      <div class="header">
       <h3 class="text-muted">Application</h3>
      </div>
      
      <div class="row">
        
        <ol class="track-progress" data-steps="3">

        <?php
          // Nav buttons
          $options = array("form1"=>"Information", "form2"=>"Tell Us More", "form3" =>"Degree", "form4" =>"Education","form5" =>"Summary");
          if(!isset($_GET['page'])){
           $_GET['page'] = "form1";
          };
          
          foreach ($options as $key => $value) {
            echo "<li ";
            if ($_GET['page'] == $key){
              echo "class='active' ";
            }else{
              echo "class='done' "; 
            };
            echo "><span><a href='?page=".$key."'>";
            echo ucwords($value);
            echo "</a></span></li>";
          }
        ?>
        </ul>
      </div> <!-- End nav bar -->
      <div class="row">
      
       <!-- Page content goes here -->
       <?php
         if (isset($_GET['page']))
         {
           $page = $_GET['page'];
       
         }else{
           $page = "form1";//Default
         }
         include ($page.".php");
       ?>
      </div>
      
      <!-- Footer -->
      <hr>
      <footer>
     
      </footer>
      
    </div>
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> 
 
 </body>
 </html>
 <?php
 //Flush buffer
 ob_flush();
?>