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
    <br><br>
    <!-- /menu -->
<!-- search box -->
<!-- search box -->
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
<br>
    <!-- end of search box -->
<!-- /search box -->
    <!-- message panal -->
    <div class="container">
        <div class="row col-md-7 col-md-offset-1">
            <form accept-charset="UTF-8" action="" method="POST">
        <textarea class="form-control" id="text" name="text" placeholder="Type in your message" rows="12"></textarea>
        <h6 class="pull-right" id="count_message"></h6>
        <br>
        <button class="btn btn-flat" type="submit">Send Message</button>
            </form>    
        </div>
        <div class="row col-md-4">
            <div class="">
                  <div class="col-xs-12">
            
            <div class="well" style="max-height: 300px;overflow: auto;">
                <ul class="list-group checked-list-box">
                  <li class="list-group-item">Ali zaidi</li>
                  <li class="list-group-item" data-checked="true">Ahmed Bilal</li>
                  <li class="list-group-item">Zakir</li>
                  <li class="list-group-item">Waqas ahmed awan</li>
                  <li class="list-group-item">Basit Khan</li>
                  <li class="list-group-item">Omer</li>
                  <li class="list-group-item">Jubran</li>
                  <li class="list-group-item">Kamran khan</li>
                </ul>
            </div>
        </div>
            </div>
        </div>
        </div>
    <!-- /message panal -->
        <hr>

        <!-- Footer -->
<?php include('footer.php');?>