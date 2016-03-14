<?php include('header.php');?>
<?php 
    session_start();
    //echo $_SESSION['username'];
?>
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

<!-- /menu -->
    <!-- Page Content -->
    <div class="container">
    <div class="col-md-10">
     <div class="row col-md-8 col-md-offset-4">
       <ul class="list-inline">
        <li><a href="#">Find Skills</a></li>
        <li><a href="#">My barters</a></li>
        <li><a href="#">Status</a></li>
        <li><a href="#">Message</a></li>
        <li><a href="#">Profile</a></li>
        <li><a href="#">Post barter</a></li>
     </ul>
    </div> 
       
    </div>
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
                                <li><span class="glyphicon glyphicon-chevron-right"></span><a href="#"> Plumber</a>
                                </li>
                                 <li><span class="glyphicon glyphicon-chevron-right"></span><a href="#"> Web designer</a>
                                </li>
                                 <li><span class="glyphicon glyphicon-chevron-right"></span><a href="#"> Digital media</a>
                                </li>
                                 <li><span class="glyphicon glyphicon-chevron-right"></span><a href="#"> Technical writing</a>
                                </li>
                            </ul>
                        </div>
                        
                    </div>
                    <!-- /.row -->
                </div>

            </div>
            <!-- Blog Post Content Column -->
            <div class="col-lg-9">
            <div class="container col-lg-11">
    <div class="row">
        <div class="post-list">
            <div class="row">
               
                <div class="col-sm-10">
                    <h4>
                        <a hre="#" class="username">Website required</a>
                        <label class="label label-info">Username</label>
                    </h4>
                    <h5> 
                    <i class="fa fa-calendar"></i>
                    Aug 06, 12:48 
                    </h5>
                    <p class="description">We have a website that we would like to improve its design, layout is fine just colors, buttons, logo and such we need you to be available and work per hour, fast work and finest quality work is really appreciated</p>    
                </div>
                <div class="col-sm-2" data-no-turbolink="">
                    <a class="btn btn-info btn-download btn-flat pull-right makeLoading" href="#">
                    <i class="fa fa-share"></i> View Skills
                    </a>            
                </div>
            </div>
        </div>
        <div class="post-list">
            <div class="row">
               
                <div class="col-sm-10">
                    <h4>
                        <a hre="#" class="username">Need to fix car......</a>
                        <label class="label label-info">Username</label>
                    </h4>
                    <h5> 
                    <i class="fa fa-calendar"></i>
                    Aug 06, 12:48 
                    </h5>
                    <p class="description">Hi, I need an A4 flyer designed for a client. Must adhere to the colours they use etc, plus images and logo. I will need two initial concepts and 3 revisions in this offer. Must prepare the pages for print as well. More work to come! Thanks.</p>    
                </div>
                <div class="col-sm-2" data-no-turbolink="">
                    <a class="btn btn-info btn-download btn-flat pull-right makeLoading" href="#">
                    <i class="fa fa-share"></i> View Skills
                    </a>            
                </div>
            </div>
        </div>
        <div class="post-list">
            <div class="row">
                
                <div class="col-sm-10">
                    <h4>    
                        <a hre="#" class="username">Affiliated review required</a>
                        <label class="label label-info">Username</label>
                    </h4>
                    <h5> 
                    <i class="fa fa-calendar"></i>
                    Aug 06, 12:48 
                    </h5>
                    <p class="description">Hi, I need an A4 flyer designed for a client. Must adhere to the colours they use etc, plus images and logo. I will need two initial concepts and 3 revisions in this offer. Must prepare the pages for print as well. More work to come! Thanks.</p>    
                </div>
                <div class="col-sm-2" data-no-turbolink="">
                    <a class="btn btn-info btn-download btn-flat pull-right makeLoading" href="#">
                    <i class="fa fa-share"></i> View Skills
                    </a>            
                </div>
            </div>
        </div>
        <div class="post-list">
            <div class="row">
                <div class="col-sm-10">
                    <h4>
                        <a hre="#" class="username">Technical report required</a>
                        <label class="label label-info">Username</label>
                    </h4>
                    <h5> 
                    <i class="fa fa-calendar"></i>
                    Aug 06, 12:48 
                    </h5>
                    <p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In velit lectus, efficitur eu eros vel, luctus aliquet est. Sed sit amet ligula non mauris porta dignissim..</p>    
                </div>
                <div class="col-sm-2" data-no-turbolink="">
                    <a class="btn btn-info btn-download btn-flat pull-right makeLoading" href="#">
                    <i class="fa fa-share"></i> View Skills
                    </a>            
                </div>
            </div>
        </div>
        <div class="post-list">
            <div class="row">
                <div class="col-sm-10">
                    <h4>
                        <a hre="#" class="username">Plumber required</a>
                        <label class="label label-info">Username</label>
                    </h4>
                    <h5> 
                    <i class="fa fa-calendar"></i>
                    Aug 06, 12:48 
                    </h5>
                    <p class="description">Hi, I need an A4 flyer designed for a client. Must adhere to the colours they use etc, plus images and logo. I will need two initial concepts and 3 revisions in this offer. Must prepare the pages for print as well. More work to come! Thanks.</p>    
                </div>
                <div class="col-sm-2" data-no-turbolink="">
                    <a class="btn btn-info btn-download btn-flat pull-right makeLoading" href="#">
                    <i class="fa fa-share"></i> View Skills
                    </a>            
                </div>
            </div>
        </div>
        <div class="post-list">
            <div class="row">
                <div class="col-sm-10">
                    <h4>
                        <a hre="#" class="username">Mechanic required!!!!</a>
                        <label class="label label-info">Username</label>
                    </h4>
                    <h5> 
                    <i class="fa fa-calendar"></i>
                    Aug 06, 12:48 
                    </h5>
                    <p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In velit lectus, efficitur eu eros vel, luctus aliquet est. Sed sit amet ligula non mauris porta dignissim..</p>    
                </div>
                <div class="col-sm-2" data-no-turbolink="">
                    <a class="btn btn-info btn-download btn-flat pull-right makeLoading" href="#">
                    <i class="fa fa-share"></i> View Skills
                    </a>            
                </div>
            </div>
        </div>
        <div class="post-list">
            <div class="row">
                <div class="col-sm-10">
                    <h4>
                       <a hre="#" class="username">Used to fix chairs</a>
                        <label class="label label-info">Username</label>
                    </h4>
                    <h5> 
                    <i class="fa fa-calendar"></i>
                    Aug 06, 12:48 
                    </h5>
                    <p class="description">Hi, I need an A4 flyer designed for a client. Must adhere to the colours they use etc, plus images and logo. I will need two initial concepts and 3 revisions in this offer. Must prepare the pages for print as well. More work to come! Thanks.</p>    
                </div>
                <div class="col-sm-2" data-no-turbolink="">
                    <a class="btn btn-info btn-download btn-flat pull-right makeLoading" href="#">
                    <i class="fa fa-share"></i> View Skills
                    </a>            
                </div>
            </div>
        </div>
    </div>

</div>

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
<?php include('footer.php');?>