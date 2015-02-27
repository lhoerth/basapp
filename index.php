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
    <title>Bachelor's Degree Program Application</title>
    
    <!-- Latest compiled and minified Bootsrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="style/index.css">
	
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
  <!-- Main content area -->
    <div class="container">      
      <div class="header">
		<h3 class="text-muted">Bachelor's Degree Program Application</h3>
      </div>      
      <div class="row">        
        <ol class="track-progress" data-steps="3">
			<?php
			  // Nav buttons
			  $options = array("form1"=>"Information", "form2"=>"Tell Us More", "form3" =>"Degree", "form4" =>"Education","form5" =>"Summary");
			  
			  // form1 is the default page
			  if(!isset($_GET['page'])){				
				$_GET['page'] = "form1";
			  };
			  
			  foreach ($options as $key => $value) {
				echo "<li ";
				if ($_GET['page'] == $key){
				  echo "class='active' >";
				}else{
				  echo "class='done' >"; 
				};
				
				echo "<span>";
				echo "<a href='?page=".$key."'>";
				echo ucwords($value);
				echo "</a></span></li>";
			  }
			?>
        </ol>
      </div> <!-- End nav bar -->
      <div class="row">      
       <!-- Page content goes here -->
       <?php
         $page = $_GET['page'];
         include ($page.".php");
       ?>
      </div>
      
      <!-- Footer -->
      <hr>
      <footer>
     
      </footer>      
    </div> 
 </body>
 </html>
 <?php
 //Flush buffer
 ob_flush();
?>