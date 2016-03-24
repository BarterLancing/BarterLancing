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
<div class="container">
    <div class="col-md-10 col-md-offset-1">
        <center><h1>My Barters</h1></center>
<p>Work in progress</p>
<div class="well" style="background-color:#f5f5f5 !important; color:black;">
        <ol type="1">
         <li>Software development</li>
         <li>Repairing</li>
         <li>content writing</li>
    </ol>  

        </div>

    </div>

 

</div>
    <br>
<div class="container">
    <div class="col-md-10 col-md-offset-1"> 
<p>Work completed</p>
<div class="well" style="background-color:#f5f5f5 !important; color:black;">
 <ol type="1">
         <li>book review</li>
         <li>ebooks</li>
         
    </ol>
        </div>

    </div>

 

</div>    
    <!-- /message panal -->
        <hr>

<?php include('includes/footer.php');?>