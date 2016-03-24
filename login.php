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
	$session->logout();
  $username = trim($_POST['username']);
  $password = trim($_POST['password']);
  
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
    $message = "Username/password combination incorrect.";
  }
  
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
	
	$new_user->create();
	
	// Check database to see if username/password exist.
	$found_user = User::authenticate($new_user->username, $new_user->password);
	//print_r ($found_user);
	if ($found_user) {
    $session->login($found_user);
	redirect_to("mainPage.php");
		} 
	else{
    // username/password combo was not found in the database
	//echo "user was not found in login.php";
    $message = "Username/password combination incorrect.";
		}
	
	
	}
	
?>

<?php include('includes/header.php');?>

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
                                        <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
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
                                        <input type="text" name="firstname" id="firstname" tabindex="1" class="form-control" placeholder="First Name" value="">
                                    </div>
									
									<div class="form-group">
                                        <input type="text" name="lastname" id="lastname" tabindex="1" class="form-control" placeholder="Last Name" value="">
                                    </div>
									<div class="form-group">
                                        <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
                                    </div>
									<div class="form-group">
                                        <input type="text" name="worktitle" id="worktitle" tabindex="1" class="form-control" placeholder="Work Title" value="">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="confirm_password" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password">
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