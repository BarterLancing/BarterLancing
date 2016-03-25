<?php
require_once("includes/utility functions.php");
require_once("includes/session.php");
require_once("includes/database.php");
require_once("includes/user.php");

	
    
if($session->is_logged_in() != 1) {
	redirect_to("login.php"); 
}

?>


<?php include('includes/header.php');?>
<?php include('includes/nav.php');?>
<?php include('includes/menu.php');?>

 

<!-- search box -->
<!-- search box -->
<div class="container">
    <div class="col-md-10 col-md-offset-1">
        <h1>Proposals:</h1>
<p>Your Proposal</p>
<pre>
Text in a pre element
is displayed in a fixed-width
font, and it preserves
both      spaces and
line breaks.
</pre>

    </div>
<div class="col-sm-3 col-sm-offset-3">
  <button class="btn btn-block btn-lg btn-success">Approve</button>
</div>
 
<div class="col-sm-3 ">
  <div class="btn-group btn-block">
    <button class="col-sm-10 btn btn-lg btn-danger">Deny</button>
 
    <button class="col-sm-2 btn btn-lg btn-danger dropdown-toggle"
            data-toggle="dropdown">
      <span class="caret"></span>
    </button>
 
    <ul class="dropdown-menu btn-block">
      <li><a href="#">Reason 1</a></li>
      <li><a href="#">Reason 2</a></li>
      <li><a href="#">Reason 3</a></li>
    </ul>
  </div>
</div>
</div>
<div class="container">
    <div class="col-md-10 col-md-offset-1">
        
<p>Client Proposal</p>
<pre>
Text in a pre element
is displayed in a fixed-width
font, and it preserves
both      spaces and
line breaks.
</pre>

    </div>
<div class="col-sm-3 col-sm-offset-3">
  <button class="btn btn-block btn-lg btn-success">Approve</button>
</div>
 
<div class="col-sm-3 ">
  <div class="btn-group btn-block">
    <button class="col-sm-10 btn btn-lg btn-danger">Deny</button>
 
    <button class="col-sm-2 btn btn-lg btn-danger dropdown-toggle"
            data-toggle="dropdown">
      <span class="caret"></span>
    </button>
 
    <ul class="dropdown-menu btn-block">
      <li><a href="#">Reason 1</a></li>
      <li><a href="#">Reason 2</a></li>
      <li><a href="#">Reason 3</a></li>
    </ul>
  </div>
</div>
</div>    
    <!-- /message panal -->
        <hr>


<?php include('includes/footer.php');?>