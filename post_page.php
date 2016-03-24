<?php
	require_once("includes/utility functions.php");
	require_once("includes/session.php");
	require_once("includes/database.php");
	require_once("includes/user.php");
	require_once("includes/barter.php");

	print_r($_POST);
	
	if (isset($_POST['barterpost'])){
		echo 'barter post button works';
		unset($_POST['barterpost']);
		$new_barter = new Barter();
		//correct the form values
		if (isset($_POST['jobtitle']))$new_barter->job_title=$_POST['jobtitle'];
		if (isset($_POST['location']))$new_barter->job_location=$_POST['location'];
		if (isset($_SESSION['user_id']))$new_barter->user_id=$_SESSION['user_id'];
		if (isset($_POST['details']))$new_barter->job_description=$_POST['details'];
		if (isset($_POST['coinsoffer']))$new_barter->coins_offered=$_POST['coinsoffer'];
		if (isset($_POST['coinsdemand']))$new_barter->coins_demanded=$_POST['coinsdemand'];
		if (isset($_POST['requiredskill1']))$new_barter->required_skill1=$_POST['requiredskill1'];
		if (isset($_POST['requiredskill2']))$new_barter->required_skill2=$_POST['requiredskill2'];
		if (isset($_POST['requiredskill3']))$new_barter->required_skill3=$_POST['requiredskill3'];
		if (isset($_POST['offeredskill3']))$new_barter->offered_skill3=$_POST['offeredskill3'];
		if (isset($_POST['offeredskill3']))$new_barter->offered_skill3=$_POST['offeredskill3'];
		if (isset($_POST['offeredskill3']))$new_barter->offered_skill3=$_POST['offeredskill3'];
		
		$new_barter->create();
		redirect_to(myBarters.php);
	}
	
	//if($session->is_logged_in() != 1) {
	//redirect_to("login.php"); 
	//}
	
	if(!$session->is_logged_in()) {
		redirect_to("login.php");
	
		}
	else{
		$current_user = User::find_by_id($_SESSION['user_id']);
			/*if (isset($current_user)){
				echo"yesss";
				print_r($current_user);
				}*/		
		}
	
	


?>

<!-- header -->
<?php include('includes/header.php');?>
<?php include('includes/nav.php');?>
<?php include('includes/menu.php');?>

<!-- login -->
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-login">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-6 col-md-offset-3">
                                <a href="post_page.php" class="active" id="login-form-link">Post a barter</a>
                            </div>
                            
                        </div>
                        <hr>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                
								<form id="barter-form" action="myBarters.php" method="post" role="form" style="display: block;">
                                    <div class="form-group">
                                        <input type="text" name="jobtitle" id="jobTitle" tabindex="1" class="form-control" placeholder="Job title" value="">
                                    </div>
									<div class="form-group">
                                        <input type="text" name="location" id="jobTitle" tabindex="1" class="form-control" placeholder="Location (Optional)" value="">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="requiredskill1" id="requiredSkill" tabindex="2" class="form-control" placeholder="Required skill 1">
                                    </div>
									<div class="form-group">
                                        <input type="text" name="requiredskill2" id="requiredSkill" tabindex="2" class="form-control" placeholder="Required skill 2">
                                    </div>
									<div class="form-group">
                                        <input type="text" name="requiredskill3" id="requiredSkill" tabindex="2" class="form-control" placeholder="Required skill 3">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="offeredskill1" id="offeredSkill" tabindex="1" class="form-control" placeholder="Offered skill 1" value="">
                                    </div>
									<div class="form-group">
                                        <input type="text" name="offeredskill2" id="offeredSkill" tabindex="1" class="form-control" placeholder="Offered skill 2" value="">
                                    </div>
									<div class="form-group">
                                        <input type="text" name="offeredskill3" id="offeredSkill" tabindex="1" class="form-control" placeholder="Offered skill 3" value="">
                                    </div>
                                    
                                     <textarea class="form-control" id="text" name="details" placeholder="Type in your detail" rows="5"></textarea>
                                        <h6 class="pull-right" id="count_message"></h6>
                                        
										
									<div class="form-group">
                                        <input type="text" name="coinsoffer" id="offeredSkill" tabindex="1" class="form-control" placeholder="Offered coins" value="">
                                    </div>
									<div class="form-group">
                                        <input type="text" name="coinsdemand" id="offeredSkill" tabindex="1" class="form-control" placeholder="Demanded coins" value="">
                                    </div>
                                    <br>
                                    
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6 col-sm-offset-3">
                                                <input type="submit" name="barterpost" id="barter-submit" tabindex="4" class="form-control btn btn-login" value="Post barter">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">   
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div></div>

       
        <hr>
        <!-- Footer -->
<?php include('includes/footer.php');?>