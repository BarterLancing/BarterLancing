<?php include('includes/header.php');?>

 <?php include('includes/nav.php');?>
<?php include('includes/menu.php');?>

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
<?php include('includes/footer.php');?>