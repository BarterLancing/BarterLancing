<!-- header -->
<?php include('header.php');?>
    <!-- Navigation -->
   <div id="custom-bootstrap-menu" class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header"><a class="navbar-brand" href="#"><img src="barterlance.png"></a>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-menubuilder"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse navbar-menubuilder">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="/"><span class="glyphicon glyphicon-bell" aria-hidden="true"> Notification</a>
                </li>
                <li><a href="/contact"><span class="glyphicon glyphicon-log-in" aria-hidden="true"> Login/Signup</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- login -->
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-login">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-6 col-md-offset-3">
                                <a href="#" class="active" id="login-form-link">Post a barter</a>
                            </div>
                            
                        </div>
                        <hr>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form id="login-form" action="http://phpoll.com/login/process" method="post" role="form" style="display: block;">
                                    <div class="form-group">
                                        <input type="text" name="job_title" id="jobTitle" tabindex="1" class="form-control" placeholder="Job title" value="">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="required_skill" id="requiredSkill" tabindex="2" class="form-control" placeholder="Required skill">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="offered_skill" id="offeredSkill" tabindex="1" class="form-control" placeholder="Offered skill" value="">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="skype_id" id="skypeId" tabindex="2" class="form-control" placeholder="skype-id">
                                    </div>
                                     <form accept-charset="UTF-8" action="" method="POST">
                                      <textarea class="form-control" id="text" name="text" placeholder="Type in your detail" rows="5"></textarea>
                                        <h6 class="pull-right" id="count_message"></h6>
                                        </form>
                                    <br>
                                    
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6 col-sm-offset-3">
                                                <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Post barter">
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
    </div>

<!-- /login -->
        
        <hr>
        <!-- Footer -->
<?php include('footer.php');?>