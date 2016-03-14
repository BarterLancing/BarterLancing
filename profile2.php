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
<!-- menu -->
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
    </div>
    <br>
    <!-- /menu -->
 

<!-- profile -->
<div class="container">
  <div class="row">
  <!-- left column -->
       <div class="col-md-3">
        <div class="row">
        <div class="profile-header-container">   
            <div class="profile-header-img">
                <img class="img-circle" src="pic.jpg" />
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
   <h3>Personal info</h3>
    <form class="form-horizontal" role="form">
      <div class="form-group">
            <label class="col-lg-3 control-label">Name:</label>
            <div class="col-lg-8">
               <label class="control-label">Syed Muhammad Ali Zaidi</label>
            </div>
      </div>
      <div class="form-group">
            <label class="col-lg-3 control-label"><span class="glyphicon glyphicon-map-marker"></span> Location:</label>
            <div class="col-lg-8">
             <label class="control-label">Gulburg III, Lahore, Pakistan.</label>
            </div>
      </div>
      <div class="form-group">
            <label class="col-lg-3 control-label">Work Title:</label>
            <div class="col-lg-8">
              <label class="control-label">Web-Designer|Graphic Designer|Web-Developer|Logo Desiner</label>
            </div>
      </div>
      <div class="form-group">
            <label class="col-lg-3 control-label">Skills:</label>
            <div class="col-lg-8">
               <p>
                  <span class="label label-skill">Default</span>
                  <span class="label label-skill">Default</span>
                  <span class="label label-skill">Default</span>
                  <span class="label label-skill">Default</span>
                  <span class="label label-skill">Default</span>
                  <span class="label label-skill">Default</span>
                  <span class="label label-skill">Default</span>
                  <span class="label label-skill">Default</span>
                  <span class="label label-skill">Default</span>
                  <span class="label label-skill">Default</span>
              </p>
            </div>
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
                    <label class="col-lg-12 control-label-overview"><p>I have four years experience in web,logo and graphic designing and i have great skills in web-designing, web-development , graphic and logo designing. I have worked for many companies for their logo and web design. I am time flexible and have good communication skills.</p></label>
          </div>
          </div>
             <div class="bars col-md-10">
          <div class="col-md-12">
            <br>
                <label class="col-lg-3 control-label-bars"><p>Success rate:</p></label> 
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
          <div class="col-md-12">
            <br>
                <label class="col-lg-3 control-label-bars"><p>Profile:</p></label> 
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
          <div class="col-md-12">
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
                <label class="col-lg-4 control-label-overview">Review</label> 
                    <div class="col-md-0 col-md-offset-11">
      
                    </div>
                    <label class="col-lg-12 control-label-overview"><ol type="1"><li>He is good developer and i want to make long term relation</li>
                                                                                  <li>Nice communication</li>
                                                                                   <li>Great</li></ol></label>
          </div>
          </div>

   
          </div>
          </div>         
</div>
</div>
</div>
<!-- /profile -->

        

        <!-- Footer -->
        <hr>
      <?php include('footer.php');?>