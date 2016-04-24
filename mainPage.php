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


?>

<?php include('includes/header.php');?>
<?php include('includes/nav.php');?>
<?php include('includes/menu.php');?>

    <!-- search box -->
    <br>
        <div id="custom-search-input">
                            <div class="input-group col-md-6 col-md-offset-3">
                                <input type="text" class="  search-query form-control" placeholder="Search" />
                                <span class="input-group-btn">
                                    <button class="btn btn-flat" type="button">
                                        <span class=" glyphicon glyphicon-search"></span>
                                    </button>
                                </span>
                            </div>
                        </div>

    <!-- end of search box -->
<br><br>
        <div class="row">

             <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-3">

                <!-- Blog Search Well -->
                <div class="well">
                    <div class="advance"><h4>Advance search</h4></div>
                      <div id="custom-search-input">
                            <div class="input-group col-md-12 col-md-offset-0">
                                <input type="text" class="  search-query form-control" placeholder="Search" />
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-flat dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Filter <span class="caret"></span></button>
                                        <ul class="dropdown-menu">
                                          <li><a href="#">By title</a></li>
                                          <li><a href="#">By username</a></li>
                                          <li><a href="#">By rating</a></li>
                                          <li><a href="#">By success rate</a></li>
                                          <li role="separator" class="divider"></li>
                                          <li><a href="#">Save search</a></li>
                                        </ul>
                                </span>
                            </div>
                        </div>
                                        <!-- /.input-group -->
                </div>

                <!-- Blog Categories Well -->
                <div class="well">
                 <div class="advance"><h4>My Skill Feed</h4></div>
                    <div class="row skill">
                        <div class="col-lg-12">
                            <ul class="list-unstyled">
                                
								<?php $current_user->get_user_skills_for_mainPage() ?>
								
                            </ul>
                        </div>
                        
                    </div>
                    <!-- /.row -->
                </div>

            </div>
            
			
			<div class="col-lg-9">
            <div class="container col-lg-11">
			<div class="row">
			<div class="post-list">
            <div class="row">
				
				<?php $current_user->get_user_jobs_for_mainPage(); ?>
                
            </div>
        </div>
        
        
    </div>

</div>
</form>
<nav>
  <ul class="pager">
    <li class="previous"><a href="#"><span aria-hidden="true">&larr;</span> Older</a></li>
    <li class="next"><a href="#">Newer <span aria-hidden="true">&rarr;</span></a></li>
  </ul>
</nav>
</div>

</div>
</div>
        <hr>
<?php include('includes/footer.php');?>