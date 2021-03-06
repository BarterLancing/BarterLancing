<?php
require_once("includes/utility functions.php");
require_once("includes/session.php");
require_once("includes/database.php");
require_once("includes/user.php");

	
	
	
    $delete_option=true;
	//print_r($_SESSION);

	if (isset($_POST['logout'])) { // logout button has been submitted.
		unset($_POST['logout']);
		$session->logout();
		redirect_to("login.php");
	}
	
	if(!$session->is_logged_in()) {
		redirect_to("login.php");
		}
	else{
			if (isset($_GET['other_user_id'])) { // if you are watching other person's profile
				$current_user = User::find_by_id($_GET['other_user_id']);
				$delete_option=false;
				unset($_GET['other_user_id']);
			}else{
				$current_user = User::find_by_id($_SESSION['user_id']);
			}
		}
		
	if (isset($_POST['delete'])) { // delete button has been submitted.
		unset($_POST['delete']);
		$session->logout();
		$current_user->delete();
	}

?>


<?php include('includes/header.php');?>
<?php include('includes/nav_profile.php');?>
<?php include('includes/menu.php');?>

 

<!-- profile -->
<div class="container">
  <div class="row">
  <!-- left column -->
       <div class="col-md-3">
        <div class="row">
        <div class="profile-header-container">   
            <div class="profile-header-img">
                <img class="img-circle" src="images/profile picture.png" />
                <!-- badge -->
                <div class="rank-label-container">
                    <span class="label label-default rank-label">100 %</span>
                </div>
                <h6>Upload a different photo...</h6>
          <input type="file" class="search-query form-control" />
            </div>
        </div> 
    </div>
      </div>
<div class="col-md-9 personal-info">
   <form class="form-horizontal" role="form">
      <div class="form-group">
            <h3><label class="col-lg-3 control-label">Name:</label>
            <div class="col-lg-8">
               <label class="control-label"><?php echo $current_user->full_name(); ?></label>
            </div><h3>
      </div>
      <div class="form-group">
            <label class="col-lg-3 control-label"><span class="glyphicon glyphicon-map-marker"></span> Location:</label>
            <div class="col-lg-8">
             <label class="control-label"><?php echo $current_user->get_user_location(); //$new = $current_user->get_user_location(); echo $new->location; ?></label>
            </div>
			
      </div>
      <div class="form-group">
            <label class="col-lg-3 control-label">Work Title:</label>
            <div class="col-lg-8">
              <label class="control-label"><?php echo $current_user->work_title; ?></label>
            </div>
			
      </div>
      <div class="form-group">
            <label class="col-lg-3 control-label">Skills:</label>
            
			<div class="col-lg-8">
               <p>
			   
					<?php $current_user->get_user_skills_on_profile() ?>
                  
                  
              </p>
            </div>
			
			
</form>
        <br><br>
        
         <div class="overview col-md-10">
          <div class="col-md-12">
            <br>
                <label class="col-lg-4 control-label-overview">Overview</label> 
                    <div class="col-md-0 col-md-offset-11">
                         <!-- Trigger the modal with a button -->
                    <button type="button" class="btn btn-clean btn-sm" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-cog"></span></button>

                          <!-- Modal -->
                        <div id="myModal" class="modal fade" role="dialog">
                         <div class="modal-dialog">

                           <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title">Edit overview</h4>
                              </div>
                             <div class="modal-body">
                                  <form accept-charset="UTF-8" action="" method="POST">
                                    <textarea class="form-control" id="text" name="text" placeholder="Type in your overview" rows="6"></textarea>
                                  </form> 
                                </div>
                                  <br>
                             <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                             </div>
                           </div>
                         </div>
                        </div>
                    </div>
                    <label class="col-lg-12 control-label-overview"><p><?php echo $current_user->overview; ?></p></label>
          </div>
          </div>
             <div class="bars col-md-10">
          <div class="col-md-13">
            <br>
                <label class="col-lg-3 control-label-bars"><p>Success rate: (Not Worked yet)</p></label> 
                   <div class="details">
                          
                            <div class="progress progress-xs">
                                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
                                    <span class="">70%</span>
                                </div>
                            </div>
                        </div>
          </div>
        
          </div>
          <div class="bars col-md-10">
          <div class="col-md-13">
            <br>
                <label class="col-lg-3 control-label-bars"><p>Profile Completion: (needs a formula)</p></label> 
                   <div class="details">
                          
                            <div class="progress progress-xs">
                                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 90%">
                                    <span class="">90%</span>
                                </div>
                            </div>
                        </div>
          </div>
        
          </div>
          <div class="bars col-md-10">
          <div class="col-md-13">
            <br>
                <label class="col-lg-3 control-label-bars">Rating</label> 
                   <div class="details">
                          
                            <div class="progress progress-xs">
                                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
                                    <span class="">70%</span>
                                </div>
                            </div>
                        </div>
          </div>
        
          </div>
          <br>
             
			 <div class="overview col-md-10">
          <div class="col-md-12">
            <br>
                <label class="col-lg-4 control-label-overview">Feedbacks</label> 
                    <div class="col-md-0 col-md-offset-11">
      
                    </div>
                    <label class="col-lg-12 control-label-overview">
					<ol type="1">
					
					<?php $current_user->get_user_feedbacks(); ?>
					
					</ol>
					
					</label>
          </div>
          </div>
			
			<br>
			
			<?php
				
				if ($delete_option==true){
					echo('<div class="overview col-md-10">
						<div class="col-md-12">
							<form id="delete" action="profile2.php" method="post" role="form">
								<input id="delete" type="submit" name="delete" class="form-control btn btn-login" value="Delete Profile">
							<form/>
						</div>
					</div>');
				}
			?>
		  
			
          </div>
          </div>         
</div>
</div>
</div>
<!-- /profile -->

        

        <!-- Footer -->
        <hr>
      <?php include('includes/footer.php');?>