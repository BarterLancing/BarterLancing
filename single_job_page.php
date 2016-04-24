<?php
require_once("includes/utility functions.php");
require_once("includes/session.php");
require_once("includes/database.php");
require_once("includes/user.php");
	
	if (isset($_POST['logout'])) { 
		unset($_POST['logout']);
		$session->logout();
		redirect_to("login.php");
	}
	
	if(!$session->is_logged_in()) {
		redirect_to("login.php");
	}else{
		$current_user = User::find_by_id($_SESSION['user_id']);
	}

	
	$owner=0;
	$proposer=0;
		
	
	$JOB_ID = 0;
	if (isset($_GET['job_ID'])) { 
		$JOB_ID = $_GET['job_ID'];
	
		global $database;
		$job = $database->query("SELECT * FROM job WHERE job_ID={$_GET['job_ID']} LIMIT 1");
		$job2 = $database->fetch_array($job);
		$user = $database->query("SELECT * FROM user WHERE user_ID={$job2['user_ID']} LIMIT 1");
		$user2 = $database->fetch_array($user);
				
	}
	
	if (isset($_GET['client_completion'])) { 
		//echo($_GET['job_ID']);
		$JOB_ID = $_GET['client_completion'];
		$owner=1;
		global $database;
			
		
		$job = $database->query("SELECT * FROM job WHERE job_ID = {$_GET['client_completion']} LIMIT 1");
		$job2 = $database->fetch_array($job);
		$user = $database->query("SELECT * FROM user WHERE user_ID = {$job2['user_ID']} LIMIT 1");
		$user2 = $database->fetch_array($user);
		
		$sql = "UPDATE job SET ";
		$sql .= "client_completion=". $database->escape_value($current_user->id) ." ";
		$sql .= "WHERE job_ID=". $database->escape_value($_GET['client_completion']);
		$database->query($sql);
				
	}
	
	if (isset($_GET['proposer_completion'])) { 
		//echo($_GET['job_ID']);
		$JOB_ID = $_GET['proposer_completion'];
		$proposer=1;
		global $database;
			
		
		$job = $database->query("SELECT * FROM job WHERE job_ID = {$_GET['proposer_completion']} LIMIT 1");
		$job2 = $database->fetch_array($job);
		$user = $database->query("SELECT * FROM user WHERE user_ID = {$job2['user_ID']} LIMIT 1");
		$user2 = $database->fetch_array($user);
		
		$sql = "UPDATE job SET ";
		$sql .= "applicant_completion=". $database->escape_value($current_user->id) ." ";
		$sql .= "WHERE job_ID=". $database->escape_value($_GET['proposer_completion']);
		$database->query($sql);
		$sql = "UPDATE proposal SET ";
		$sql .= "status= 3 ";
		$sql .= "WHERE job_ID=". $database->escape_value($_GET['proposer_completion']) ." AND user_ID = ".$database->escape_value($current_user->id);
		$database->query($sql);
				
	}
	
	if (isset($_POST['sendProposal'])) { 
		//echo($_POST['proposal']);
		$current_user->send_proposals($job2['job_ID'], $current_user->id, $_POST['proposal']);
	
	}
	
	//if the current person logged in is the one who created this job $owner=1
	$job = $database->query("SELECT * FROM job WHERE job_ID = {$JOB_ID}");
	$job2 = $database->fetch_array($job);
	if (!empty($result_array)) {
	if($job2['user_ID']==$current_user->id){$owner=1;}
	}
	$proposal = $database->query("SELECT * FROM proposal WHERE (job_ID={$JOB_ID} AND user_ID={$current_user->id} AND status=1 )");
	$proposal2 = $database->fetch_array($proposal);
	if (!empty($result_array)) {
	if($proposal2['user_ID']==$current_user->id){$proposer=1;}
	}
	if (isset($_POST['sendFeedback'])) { 
		
		global $database;
		
		if ($owner==1)
		{
		$proposer = $database->query("SELECT * FROM proposal WHERE job_ID = {$JOB_ID} AND status=1");
		$proposer2 = $database->fetch_array($proposer);
		$current_user->send_feedbacks($job2['job_ID'],$current_user->id, $proposer2['user_ID'], $_POST['feedback']);
		}
		else
		{
		$owner = $database->query("SELECT * FROM job WHERE job_ID = {$JOB_ID}");
		$owner2 = $database->fetch_array($owner);
		$current_user->send_feedbacks($job2['job_ID'],$current_user->id, $owner2['user_ID'], $_POST['feedback']);
		}
	}
	
	//echo($JOB_ID);
	//echo($current_user->id);
?>

<?php include('includes/header.php');?>
<?php include('includes/nav_single_job_page.php');?>
<?php include('includes/menu.php');?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

             <!-- Blog Sidebar Widgets Column -->
           
            <!-- Blog Post Content Column -->
            <div class="col-lg-8">
       <!-- Blog Post -->

                <!-- Title -->
                <h1>Job Title: <?php echo($job2['job_title']); ?></h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="profile2.php?other_user_id=<?php echo($user2['user_ID'])?>"><?php echo($user2['first_name']."  ".$user2['last_name']); ?></a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo($job2['job_start']); ?></p>

                <hr>

                <!-- Preview Image -->
               

            

                <!-- Post Content -->
                <p class="lead">Job Details</p>
                <div class="well">
                    <h6><?php echo($job2['job_description']); ?></h6>
                </div>

                <hr>

                
                 <div class="col-lg-12">
                 <div class="row">
                    <div class="col-md-4">
                     <h4> Offered Skills</h4>   
                    </div>
                     <div class="col-md-4 col-md-offset-1">
                     <h4> Required Skills</h4>   
                    </div>
                     
                 </div>
                 
                    <div class="col-md-5">
                         <div class="form-group">
                                        <input type="text" name="skill_1" id="skill_1" tabindex="1" class="form-control" placeholder="Skill_1" value="<?php echo($job2['return_skill1']); ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                         <input type="text" name="skill_2" id="skill_2" tabindex="1" class="form-control" placeholder="Skill_2" value="<?php echo($job2['return_skill2']); ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                         <input type="text" name="skill_3" id="skill_3" tabindex="1" class="form-control" placeholder="Skill_3" value="<?php echo($job2['return_skill2']); ?>" readonly>
                                    </div>
                                    
                                     
                                    <br>
                                    
                                    
                                    <div class="form-group">
                                        <div class="row">
                                            
                                        </div>
                                    </div>
                                
                    </div>
                        
                    <div class="col-md-5">
									<div class="form-group">
                                        <input type="text" name="skill_1" id="skill_1" tabindex="1" class="form-control" placeholder="Skill_1" value="<?php echo($job2['required_skill1']); ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                         <input type="text" name="skill_2" id="skill_2" tabindex="1" class="form-control" placeholder="Skill_2" value="<?php echo($job2['required_skill2']); ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                         <input type="text" name="skill_3" id="skill_3" tabindex="1" class="form-control" placeholder="Skill_3" value="<?php echo($job2['required_skill3']); ?>" readonly>
                                    </div>
                                    
                                     
                                    <br>
                                    
                                    
                                    <div class="form-group">
                                        <div class="row">
                                            
                                        </div>
                                    </div>
                                
                    </div>
                               
                 </div>

                 <div class="col-md-12">
                 <div class="row">
                     <div class="col-md-4">
                     <h4>Coins Offered:<?php echo($job2['coins_offered']); ?></h4>

                 </div>
                 
                 <div class="col-md-4 col-md-offset-1">
                     <h4>Coins Demanded:<?php echo($job2['coins_required']); ?></h4>
                 </div>
                     
                 </div>
                 </div>

                 
                <!-- Blog Comments -->

                
				
				<?php 
				//show if job not complete
				function show_proposal_form(){
                echo ('<div class="col-md-12"> ');
                echo ('    <div class="well"> ');
                echo ('    <h4>Proposal</h4> ');
                echo ('        <div class="form-group"> ');
                echo ('<textarea class="form-control" id="text" name="proposal" placeholder="Type in your detail" rows="5"></textarea> ');
                echo ('                        <h6 class="pull-right" id="count_message"></h6> ');
                echo ('       </div> ');
                echo ('        <button type="submit" name="sendProposal" class="btn btn-primary">Send</button> ');
                echo ('</div> ');
                echo ('</div> ');
                
				}
				
				function show_feedback_form(){
                echo ('<div class="col-md-12"> ');
                echo ('    <div class="well"> ');
                echo ('    <h4>Feedback</h4> ');
                echo ('        <div class="form-group"> ');
                echo ('<textarea class="form-control" id="text" name="feedback" placeholder="Type in your detail" rows="5"></textarea> ');
                echo ('                        <h6 class="pull-right" id="count_message"></h6> ');
                echo ('       </div> ');
                echo ('        <button type="submit" name="sendFeedback" class="btn btn-primary">Send</button> ');
                echo ('</div> ');
                echo ('</div> ');
                
				}
				?>
				
				<?php
				//show_proposal_form(); 
				?>
				
				
                <hr>


                
				
				
				<!-- Posted Proposals -->
				<?php	
					
					global $database;
					$sql = "SELECT * from job ";
					$sql .= " WHERE (job_ID={$JOB_ID} AND (client_completion={$current_user->id} OR applicant_completion={$current_user->id})) ";
					$result_array = $database->query($sql);
					if (!empty($result_array) AND mysql_num_rows($result_array)!=0) 
					{
						if($owner=1 OR $proposer=1){show_feedback_form();}
						echo("<hr>");
						echo("<h3>Job Has been marked Complete</h3>");
						echo("<hr>");
						echo("<h4>Feedbacks</h4>");
						
						$sql = "SELECT * from feedback ";
						$sql .= " WHERE job_ID={$JOB_ID} LIMIT 1";
						$result_array = $database->query($sql);
						if (!empty($result_array)) {
							while ($row = $database->fetch_array($result_array)) 
							{
								$user2 = $database->query("SELECT * FROM user WHERE user_ID = {$row['user_ID']} LIMIT 1");
								$user = $database->fetch_array($user2);
								$feedbacker2 = $database->query("SELECT * FROM user WHERE user_ID = {$row['feedbacker_ID']} LIMIT 1");
								$feedbacker = $database->fetch_array($feedbacker2);
						
								echo('<div class="media">
								<a class="pull-left" href="#">
								<img class="media-object" src="http://placehold.it/64x64" alt="">
								</a>
								<div class="media-body">
								<h4 class="media-heading"><a href="profile2.php?other_user_id=$'.$feedbacker['user_ID'].'" >'.$feedbacker['first_name'].' '.$feedbacker['last_name']
								.'</a><br><small>'.$row['date'].'</small>');
								echo('</h4>
								'.$row['feedback'].'
								</div>
								</div>');
							}
						
						}
						
							
						
					}else{
						show_proposal_form();
						echo("<h4>Sent Proposals</h4>");
						//some dummy data to show real proposals properly
						/*echo('<div class="media">
						<a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
						</a>
						<div class="media-body">
                        <h4 class="media-heading">No Body
                            <small>No_month 00, 2014 at 00:00 PM</small>
                        </h4>
                        No Proposal Set Yet
						</div>
						</div>');*/
						
						$sql = "SELECT * from proposal ";
						$sql .= " WHERE job_ID =  {$JOB_ID}";
						$result_array = $database->query($sql);
						if (!empty($result_array)) {
							while ($row = $database->fetch_array($result_array)) 
							{
							$user2 = $database->query("SELECT * FROM user WHERE user_ID = {$row['user_ID']} LIMIT 1");
							$user = $database->fetch_array($user2);
					
							echo('<div class="media">
							<a class="pull-left" href="#">
							<img class="media-object" src="http://placehold.it/64x64" alt="">
							</a>
							<div class="media-body">
							<h4 class="media-heading"><a href="profile2.php?other_user_id='.$user['user_ID'].'}" >'.$user['first_name'].' '.$user['last_name'].'</a><br><small>'.$row['date'].'</small>');
							echo('</h4>
							'.$row['proposal'].'
							</div>
							</div>');
							
					
						
						}
					}
				}


				?>
                <!-- Comment -->
                

            </div>

           

        </div>
        <!-- /.row -->

        <hr>
</form>
        <!-- Footer -->
<?php include('includes/footer.php');?>