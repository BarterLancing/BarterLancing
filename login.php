<?php
require_once("includes/utility functions.php");
require_once("includes/session.php");
require_once("includes/database.php");
require_once("includes/user.php");

	//$session->logout();
	if (isset($_POST['logout'])) { // logout button has been submitted.
		unset($_POST['logout']);
		$session->logout();
	}

	
	// after you are logged in you dont turn to login until logged out.
	if($session->is_logged_in() == 1) {
		redirect_to("mainPage.php"); 
	}


	if (isset($_POST['login'])) { // Form has been submitted.
		unset($_POST['login']);
		
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		if ($username!="" && $password!="" )
			{
			$session->logout();
			//print_r (User::find_all());
  
			// Check database to see if username/password exist.
			$found_user = User::authenticate($username, $password);
			//print_r ($found_user);
			if ($found_user) {
				$session->login($found_user);
				redirect_to("mainPage.php");
			} else {
			// username/password combo was not found in the database
			//echo "user was not found in login.php";
			echo('<script>alert("Login Fields Incorrect")</script>');
			}
		}else {echo('<script>alert("No User Detected")</script>');}
	} else { // Form has not been submitted.
	$username = "";
	$password = "";
	}

if (isset($_POST['signup']))
	{
	unset($_POST['signup']);
	$session->logout();
	$new_user = new User();
	
	if (isset($_POST['firstname']))$new_user->first_name=$_POST['firstname'];
	if (isset($_POST['lastname']))$new_user->last_name=$_POST['lastname'];
	if (isset($_POST['username']))$new_user->username=$_POST['username'];
	if (isset($_POST['worktitle']))$new_user->work_title=$_POST['worktitle'];
	if (isset($_POST['email']))$new_user->email=$_POST['email'];
	if (isset($_POST['password']))$new_user->password=$_POST['password'];
	if (isset($_POST['location']))$new_user->user_location=$_POST['location'];
	if (isset($_POST['skill1']))$new_user->skill1=$_POST['skill1'];
	if (isset($_POST['skill2']))$new_user->skill2=$_POST['skill2'];
	if (isset($_POST['skill3']))$new_user->skill3=$_POST['skill3'];
	if (isset($_POST['overview']))$new_user->overview=$_POST['overview'];
	if ($new_user->first_name!="" && $new_user->last_name!="" && $new_user->username!="" && $new_user->work_title!="" && $new_user->email!="" && $new_user->password!="" && $new_user->skill1!="" && $new_user->skill2!="" && $new_user->skill3!="")
			{
			$new_user->create();
	
			// Check database to see if username/password exist.
			$found_user = User::authenticate($new_user->username, $new_user->password);
			//print_r ($found_user);
			if ($found_user) {
			$session->login($found_user);
			redirect_to("mainPage.php");
			}
		} 
	else{
		echo'<script>alert("One of the fields is empty")</script>';
		}
	
	
	}
	
?>

<?php include('includes/header.php');?>
<script src="http://localhost/Barter%20Lance/js/form.js"></script>
<?php include('includes/nav login.php');?>


<!-- login -->
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-login">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-6">
                                <a href="login.php" class="active" id="login-form-link">Login</a>
                            </div>
                            <div class="col-xs-6">
                                <a href="login.php" id="register-form-link">Register</a>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form id="login-form" action="login.php" method="post" role="form" style="display: block;">
                                    <div class="form-group">
                                        <input type="text" name="username" id="loginusername" tabindex="1" class="form-control" placeholder="Username" value="">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" id="loginpassword" tabindex="2" class="form-control" placeholder="Password">
                                    </div>
                                    <hr/>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6 col-sm-offset-3">
                                                <input type="submit" name="login" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
                                            </div>
                                        </div>
                                    </div>
                                   
                                     <ul type="circle">
                                    
                                    </ul>
                                    
                                    <hr/>
                                </form>
                                <form id="register-form" action="login.php" method="post" role="form" style="display: none;">
                                    <div class="form-group">
                                        <input type="text" name="firstname" id="firstname" tabindex="1" class="form-control" placeholder="First Name" value="" onblur="checkfirstname()"/>
										<span id="spanfirstname" style="color:red" ></span>
									</div>
									
									<div class="form-group">
                                        <input type="text" name="lastname" id="lastname" tabindex="1" class="form-control" placeholder="Last Name" value="" onblur="checklastname()"/>
										<span id="spanlastname" style="color:red" ></span>
									</div>
									<div class="form-group">
                                        <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="" onblur="checkusername()"/>
										<span id="spanusername" style="color:red" ></span>
									</div>
									<div class="form-group">
                                        <input type="text" name="worktitle" id="worktitle" tabindex="1" class="form-control" placeholder="Work Title" value="" onblur="checkworktitle()"/>
                                    	<span id="spanworktitle" style="color:red" ></span>
									</div>
									<div class="form-group">
                                        <input type="text" name="location" id="location" tabindex="1" class="form-control" placeholder="Location" value="" onblur="checklocation()"/>
                                    	<span id="spanlocation" style="color:red" ></span>
									</div>
									<div class="form-group">
                                        <input type="text" name="skill1" id="skill1" tabindex="1" class="form-control" placeholder="Skill 1:" value="" onblur="checkskill1()"/>
                                    	<span id="spanskill1" style="color:red" ></span>
									</div>
									<div class="form-group">
                                        <input type="text" name="skill2" id="skill2" tabindex="1" class="form-control" placeholder="Skill 2:" value="" onblur="checkskill2()"/>
                                    	<span id="spanskill2" style="color:red" ></span>
									</div>
									<div class="form-group">
                                        <input type="text" name="skill3" id="skill3" tabindex="1" class="form-control" placeholder="Skill 3:" value="" onblur="checkskill3()"/>
                                    	<span id="spanskill3" style="color:red" ></span>
									</div>
									<div class="form-group">
                                        <input type="text" name="overview" id="overview" tabindex="1" class="form-control" placeholder="overview:" value="" />
                                    	<span id="spanoverview" style="color:red" ></span>
									</div>
                                    <div class="form-group">
                                        <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="" onblur="checkemail()"/>
                                    	<span id="spanemail" style="color:red" ></span>
									</div>
                                    <div class="form-group">
                                        <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password" onblur="checkpassword()"/>
                                    	<span id="spanpassword" style="color:red" ></span>
									</div>
                                    <div class="form-group">
                                        <input type="password" name="confirmpassword" id="confirmpassword" tabindex="2" class="form-control" placeholder="Confirm Password" onblur="confirmpassword()"  />
                                    	<span id="spanconfirmpassword" style="color:red" ></span>
									</div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6 col-sm-offset-3">
                                                <input type="submit" name="signup" id="register-submit" tabindex="4" class="form-control btn btn-register " value="Register Now">
                                                
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- /login -->
        
        <hr>
        <!-- Footer -->
<?php include('includes/footer.php');?>