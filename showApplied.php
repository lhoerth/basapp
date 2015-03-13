<?php  
//*** Start a session
session_start();
//*** Start the buffer
ob_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
      
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Applicants</title>
    <!-- Bootstrap CSS-->
   <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/plug-ins/f2c75b7247b/integration/bootstrap/3/dataTables.bootstrap.css">
    
    
    <script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" language="javascript" src="//cdn.datatables.net/1.10.5/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="//cdn.datatables.net/plug-ins/f2c75b7247b/integration/bootstrap/3/dataTables.bootstrap.js"></script>
    
  </head>
  <body>

        
  <?php  
  require "db.php";
    
     $sql = "SELECT * FROM `Student_Info`";
    $statement = $dbh->prepare($sql);

     $statement->execute();
     $result = $statement->fetchAll(PDO::FETCH_ASSOC);
     
     if(isset($_POST['Export'])){
      // Original PHP code by Chirp Internet: www.chirp.com.au
      // Please acknowledge use of this code by including this header.
      function cleanData(&$str)
      {
	$str = preg_replace("/\t/", "\\t", $str);
	$str = preg_replace("/\r?\n/", "\\n", $str);
	if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
      }
    
      // file name for download
      $filename = "website_data_" . date('Ymd') . ".txt";
    
      header("Content-Disposition: attachment; filename=\"$filename\"");
      header("Content-Type: application/vnd.ms-excel");
    
      $flag = false;
      foreach($result as $row) {
	if(!$flag) {
	  // display field/column names as first row
	  echo implode("\t", array_keys($row)) . "\n";
	  $flag = true;
	}
	array_walk($row, 'cleanData');
	echo implode("\t", array_values($row)) . "\n";
      }
    
      exit;
	 }

    ?>    

    <div class="container-fluid">
      <form action="#" method="post">
      <button name="Export">Export to Text</button>
      </form>
	<table id="example" class="table table-striped table-bordered" cellspacing="0" width="97%" >
	      <thead>
		<tr>
				  <th>Date Applied</th>
				  <th>First</th>
				  <th>Last Name</th>
				  <th>Email</th>
				  <th>Phone Number</th>
				  <th>Degree</th>
				  <th>SID</th>
				  <th>Status</th>
				  <th>Prereqs</th>
				  <th>Education</th>
				  <th>Credits</th>
				  <th>Transcript</th>
			  </tr>
		  </thead>

		  <!--<tfoot>
			  <tr>
				  <th>Key</th>
				  <th>First Name</th>
				  <th>Last Name</th>
				  <th>Email</th>
				  <th>Phone Number</th>
				  <th>Degree</th>
				  <th>SID</th>
				  <th>Status</th>
				  <th>Prereqs</th>
				  <th>Education</th>
				  <th>Credits</th>
				  <th>Transcript</th>
			  </tr>
		  </tfoot>-->

		  <tbody>
					<?php
                                        foreach ($result as $row) {
					  $transcript;
                                            if($row['Transcript'] == "NULL"){
					      $transcript = "No Transcript";
					    } else {
					      $transcript = '<a href="../' .$row['Transcript'].'" target="_blank">'.$row['Transcript'].'</a>';
					    }
                                            echo
                                           
                                                   	'<tr><td>'.$row['requestedDate'].'</td>';
							
                                                       echo '<td>'.$row['First'].'</td>';
							echo '<td>'.$row['Last']. '</td>';
							echo '<td>'.$row['Email']. '</td>';
							echo '<td>'.$row['Phone']. '</td>';
							echo '<td>'.$row['Degree']. '</td>';
							echo '<td>'.$row['Sid']. '</td>';
                                                        echo '<td>'.$row['Status']. '</td>';
                                                        echo '<td>'.$row['Prereqs']. '</td>';
                                                        echo '<td>'.$row['Education']. '</td>';
                                                        echo '<td>'.$row['Credits']. '</th>';
                                                        echo '<td>'.$transcript.'</td>';
                                                        '</tr>' ;
                                                        }
                                                        ?>

		  </tbody>
				</table>
			</div>
  
  </body>
  


<script type="text/javascript" class="init">

$(document).ready(function() {
	$('#example').dataTable({"order": [ 0, "desc" ]});
	
	
} );

	</script>
</html>
<?php
 //Flush buffer
 ob_flush();
?>
