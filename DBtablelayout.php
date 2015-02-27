




<!DOCTYPE html>
<html lang="en">
  <head>
    <style>
        #example
        {
            margin-left: 20px;
            
        }
	
     
    </style>
      
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


     

    ?>    

			
				<table id="example" class="table table-striped table-bordered" cellspacing="0" width="97%" >
					<thead>
						<tr>
							
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
                                            
                                            echo
                                           
                                                   	'<tr>';
							
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
                                                        echo '<td><a href="'.$row['Transcript'].'" target="_blank">'.$row['Transcript'].'</a></td>';
                                                        '</tr>' ;
                                                        }
                                                        ?>
                                        
                            
                                        
                                        
                                        
                                        </tbody>
				</table>

	
  


                                   
                                          

  
  
  
  </body>
  


<script type="text/javascript" class="init">

$(document).ready(function() {
	$('#example').dataTable();
        
} );

	</script>
  

  
  
</html>