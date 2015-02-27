<?php
session_start();
 //*** Start the buffer
ob_start();

/* // DEBUGGING - OUTPUT SESSION 
echo "<pre>";
echo strlen($_SESSION['comment']);
print_r($_POST);
print_r($_SESSION);
echo "</pre>";
*/



	//Goes back to first page if not visited in order
	if(!isset($_SESSION['Submit2'])){
		 header("Location: index.php?page=form1");
		 exit;
	}
	
	// go back to previous page if previous button clicked
	if(isset($_POST['Previous2'])){
		header("Location: index.php?page=form2");
		exit;
	}

if (isset($_SESSION['softReq'])) {
	end($_SESSION['softReq']);
	$last_id=key($_SESSION['softReq']);
	$_SESSION['softReq'][$last_id] = substr($_SESSION['softReq'][$last_id],0,8000);
}

if (isset($_SESSION['netReq'])) {
	end($_SESSION['netReq']);
	$last_id=key($_SESSION['netReq']);
	$_SESSION['netReq'][$last_id] = substr($_SESSION['netReq'][$last_id],0,8000);
}

if (isset($_SESSION['comment'])) {
	$_SESSION['comment'] = substr($_SESSION['comment'],0,8000);
}

if(isset($_POST['Submit3'])){
	
	
		
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
		$_SESSION['Submit3'] = $_POST['Submit3'];
		header("Location: index.php?page=form4");
		exit;
	}		   
}

// extra test for repopulating checkboxes
function isChecked($array, $value){
	if (isset($_SESSION[$array]))
		return (in_array($value,$_SESSION[$array]))?"checked":""; 
}
?>

<form method="post" action="#">
		<div class="container">
				<div class="form-group text-center">
						<h3>Which degree are you interested in?</h3>
						<input type="radio" id="softwareBtn" name="degree" value="software" onclick="javascript:yesnoCheck();" <?php echo ($_SESSION['degree'] === "software")?"checked":""; ?>> 
							<label for="softwareBtn"> Software Development </label><small> (<a class="spanInterest" data-toggle="modal" data-target="#SDModal">Learn More</a>)</small>&nbsp;&nbsp;
						<input type="radio" id="networkBtn" name="degree" value="network" onclick="javascript:yesnoCheck();" <?php echo ($_SESSION['degree'] === "network")?"checked":""; ?>>
							<label for="networkBtn"> Network &amp; Security </label><small> (<a class="spanInterest" data-toggle="modal" data-target="#NASModal">Learn More</a>)</small>&nbsp;&nbsp;
						<input type="radio" id="udBtn" name="degree" value="ud" onclick="javascript:yesnoCheck();" <?php echo ($_SESSION['degree'] === "ud")?"checked":""; ?>>
							<label for="udBtn"> Undecided </label>
					
					
				  
				<div id="software">
						<div id="ss" class="degForm">
							<h4>Software Development Prerequistes</h4>
							<h5>Please check the classes you have taken</h5>
							<h6>Note: If you don't meet all of the prerequisites, or have extensive industry experience, an advisor will contact you to discuss options.</h6>
			
							<input type="checkbox" id="core" name="softReq[]" value="core" <?php echo isChecked('softReq', 'core');?> >
								<label for="core"> Programming I and II (CSCI 141&amp;145 or CSCI 131&amp;132)</label>
							<br>
							<input type="checkbox" id="201" name="softReq[]" value="201" <?php echo isChecked('softReq', '201');?> >
								<label for="201">IT 201:  Database Fundamentals, or equivalent </label>
							<br>
							<input type="checkbox" id="190" name="softReq[]" value="190" <?php echo isChecked('softReq', '190');?>>
								<label for="190">IT 190:  Intro to Linux or LPI1 or Linux Essentials</label>
							<br>
							<input type="checkbox" id="121" name="softReq[]" value="121" <?php echo isChecked('softReq', '121');?>>
								<label for="121">IT 121:  HTML/CSS, or equivalent</label>
							<br>
							<br>
								<label for="softNote">Comments:</label>
							<textarea id="softNote" name="softReq[]" class="form-control" cols="25" rows="8" maxlength="8191" placeholder="Maximum ~8000 characters. . ."><?php if (isset($_SESSION['softReq'])) echo end($_SESSION['softReq']); ?></textarea>
							<br>
							
						</div>
				</div>
			  
			
				<div id="network">
						<div id="nn" class="degForm">
								<h4>Network Administration and Security Prerequisites</h4>
								<h5>Please check the classes you have taken</h5>
								<h6>Note: If you don't meet all of the prerequisites, or have extensive industry experience, an advisor will contact you to discuss options.</h6>
								<input type="checkbox" id="CCENT" name="netReq[]" value="CCENT" <?php echo isChecked('netReq', 'CCENT');?>>
									<label for="CCENT">IT 210 or CCENT</label>
								<br>
								<input type="checkbox" id="MTA" name="netReq[]" value="MTA" <?php echo isChecked('netReq', 'MTA');?>>
									<label for="MTA">IT 160 or MTA</label>
								<br>
								<input type="checkbox" id="Linux" name="netReq[]" value="Linux" <?php echo isChecked('netReq', 'Linux');?>>
									<label for="Linux">IT 190 or LPI1 or Linux Essentials</label>
								<br>
								<input type="checkbox" id="102" name="netReq[]" value="102" <?php echo isChecked('netReq', '102');?>>
									<label for="102">IT 102 or a programming course</label>
								<br>
								<input type="checkbox" id="240" name="netReq[]" value="240" <?php echo isChecked('netReq', '240');?>> 
									<label for="240">IT 240 or 70-411 Microsoft MCP</label>
								<br>
								<br>
									<label for="netNote">Comments:</label>
								<textarea id="netNote" class="form-control" name="netReq[]" cols="25" rows="8" maxlength="8191" placeholder="Maximum ~8000 characters. . ."><?php if (isset($_SESSION['netReq'])) echo end($_SESSION['netReq']); ?></textarea>
								<br>
							  
						</div>
				</div>
					
				<div id="uu">
					 <div class="degForm">   
						<br>
						<label for="note">Please list any IT classes that you have taken:</label>
						<textarea id="note" class="form-control" name="comment" cols="25" rows="8" maxlength="8191" placeholder="Maximum ~8000 characters. . ."><?php echo $_SESSION['comment']; ?></textarea>						
						<br>						
					 </div>
				</div>

				</div>
				<div class="row" id="buttons">
						<button type="submit" class="col-md-2 btn btn-primary" name="Previous2">Previous</button>
						<button type="submit" class="col-md-2 col-md-offset-8 btn btn-primary" name="Submit3">Continue</button>
				</div>
		</div>

</form>

<!-- Modal for SD-->
<div class="modal fade" id="SDModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
	<div class="modal-content">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title" id="myModalLabel">Software Development</h4>
	  </div>
	  <div class="modal-body">
		<div>
				<p><b>We prepare students for the real world by teaching the high demand skills that employers 
				are seeking</b></p>
				<ul>
					<li>C, C++</li>
					<li>Java</li>
					<li>Linux Administration</li>
					<li>Web Development & Design</li>
				</ul>
				<p><b>Gain hands on experience</b>
				</p>
				<ul>
					<li>Learn how to code in our computer-labs</li>
					<li>Receive one-on-one instructor assistance</li>
					<li>Develop real websites for industry/community partners</li>
					<li>Build a portfolio</li>
				</ul>
				<p><b>Make yourself invaluable with a well-rounded skill set</b></p>
				<ul>
					<li>Be self-sufficient</li>
					<li>Create efficient and reliable programs</li>
					<li>Maintain virtual development environments</li>
				</ul>    
				<a href="http://www.greenriver.edu/Documents/academic-programs/degrees/proftech/it_software_development_bas.pdf" target="_blank"><h6>Learn More</h6></a>
			</div>
	  </div>
	  <div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	  </div>
	</div>
  </div>
</div>

<!-- Modal for NAS -->
<div class="modal fade" id="NASModal" tabindex="-1" role="dialog" aria-labelledby="NASModalLabel" aria-hidden="true">
  <div class="modal-dialog">
	<div class="modal-content">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title" id="NASModalLabel">Network Security & Administration</h4>
	  </div>
	  <div class="modal-body">
			<div>
				<p><b>We prepare students for the real world by teaching the high demand skills that employers 
				are seeking</b></p>
				<ul>
					<li>PC Repair</li>
					<li>Windows Server Administration</li>
					<li>Newtwork Security</li>
				</ul>
				<p><b>Gain hands on experience</b>
				</p>
				<ul>
					<li>Work with active routing hardware in fully equipped labs</li>
					<li>Receive one-on-one instructor assistance</li>
					<li>Build a portfolio</li>
				</ul>
				
				<p><b>Make yourself invaluable with a well-rounded skill set</b></p>
				<ul>
					<li>Install and configure servers</li>
					<li>Monitor network traffic</li>
					<li>Secure network devices</li>
				</ul>
				<a href="http://www.greenriver.edu/Documents/academic-programs/degrees/proftech/info_tech_network_admin_security_bas.pdf" target="_blank"><h6>Learn More</h6></a>
			</div>
	  </div>
	  <div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	  </div>
	</div>
  </div>
</div>        

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="javascript/form3.js"></script>

<?php

    
 //Flush buffer
 ob_flush();
 
?>