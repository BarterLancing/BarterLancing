    <?php
	require_once("includes/utility functions.php");
	require_once("includes/session.php");
	require_once("includes/database.php");
	require_once("includes/user.php");

	
	?>
	<!-- Navigation -->
   <div id="custom-bootstrap-menu" class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header"><a class="navbar-brand" href="login.php"><img src="images/barterlance.png"></a>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-menubuilder"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse navbar-menubuilder">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="mainPage.php"><span class="glyphicon glyphicon-bell" aria-hidden="true"> Notification</a>
                </li>
                <li>
				<form action="login.php" method="post" role="form"><input type="submit" name="logout" class="form-control btn btn-login" value="Logout"><form/>
                </li>
            </ul>
        </div>
    </div>
</div>