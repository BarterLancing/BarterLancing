<?php
require_once("includes/utility functions.php");
require_once("includes/session.php");
require_once("includes/database.php");
require_once("includes/user.php");

	//$session->logout();
	if (isset($_POST['logout'])) { // logout button has been submitted.
		unset($_POST['logout']);
		$session->logout();
		redirect_to("login.php");
	}
	
    
	if($session->is_logged_in() != 1) {
		redirect_to("login.php");
		}
	else{
		$current_user = User::find_by_id($_SESSION['user_id']);	
		}
	
	
	
	if (isset($_GET['proposal_for']) AND isset($_GET['proposal_by']) ) { 
	global $database;
		$sql = "UPDATE proposal SET ";
		$sql .= " status='". $database->escape_value($_GET['proposal_status']) ."' ";
		$sql .= " WHERE job_ID=". $database->escape_value($_GET['proposal_for']);
		$sql .= " AND user_ID=". $database->escape_value($_GET['proposal_by']);
	  $database->query($sql);
	  
	}
?>


<?php include('includes/header.php');?>
<?php include('includes/nav_myBarters.php');?>
<?php include('includes/menu.php');?>

<!-- search box -->


           
<div class="container">
    <div class="col-md-10 col-md-offset-1"> 
	    <center><h1><a href='myBarters.php'>My Barters</a></h1></center>
		
		<hr><br><br>
		
		<h3>Barters Posted</h3>

		
			<div class="well" style="background-color:#f5f5f5 !important; color:black;">
			
			<?php $current_user->show_posted_barter(); ?>
		
			</div>
			 
		</div>

    </div>

 







    <br>
<div class="container">
    <div class="col-md-10 col-md-offset-1"> 
			<h3>Completed Barters</h3>
			<div class="well" style="background-color:#f5f5f5 !important; color:black;">
					
					<?php $current_user->show_completed_barter(); ?>
					
					
					
			</div>
	</div>

</div>

 
</form>
    
    <!-- /message panal -->
        <hr>

<?php include('includes/footer.php');?>