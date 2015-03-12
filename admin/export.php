<?php
 require "../db.php";
    $sql = "SELECT * FROM `Student_Info`";
	    $statement = $dbh->prepare($sql);			      
      	    $statement->execute();
	    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
	    
	     // filename for download
            $filename = "students_" . date('Ymd') . ".xls"; 
	      //header info for browser
	      header("Content-Type: application/xls");    
	      header("Content-Disposition: attachment; filename=$filename");  
	      header("Pragma: no-cache"); 
	      header("Expires: 0");
	      /*******Start of Formatting for Excel*******/   
	      //define separator (defines columns in excel & tabs in word)
	      $sep = "\t"; //tabbed character
	      
		 
                  ?>
                  
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
					  $sql = "SELECT * FROM `Student_Info`";
					  $statement = $dbh->prepare($sql);
				      
					   $statement->execute();
					   $result = $statement->fetchAll(PDO::FETCH_ASSOC);
					  foreach ($result as $row) {
					    $transcript;
					      if($row['Transcript'] == "NULL"){
						$transcript = "No Transcript";
					      } else {
						$transcript = '<a class="btn btn-primary" target="_blank" href="http://caseym.greenrivertech.net/328/basapp/'.$row['Transcript'].'">View Transcript</a>';
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
							  echo '<td>'.$row['Credits']. '</td>';
							  echo '<td>'.$transcript.'</td>';
							  '</tr>' ;
					  }
                                        ?>

		  </tbody>
				</table>


	   

