<?php
include_once('admin-includes.php');


session_start();
$user = $_SESSION['user'];
$pass = $_SESSION['pass'];
    if(!$user && !$pass)
    {
       header( 'Location:admin-login.php?action=ag' ) ;
    }else{
        
        if($user == 'admin'){


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Faisalabad Institute of cardiology | Home</title>

  <!-- Bootstrap core CSS -->

  <link href="css/bootstrap.min.css" rel="stylesheet">

  <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
  <link href="css/animate.min.css" rel="stylesheet">

  <!-- Custom styling plus plugins -->
  <link href="css/custom.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/maps/jquery-jvectormap-2.0.3.css" />
  <link href="css/icheck/flat/green.css" rel="stylesheet" />
  <link href="css/floatexamples.css" rel="stylesheet" type="text/css" />
  <script src="js/jquery.min.js"></script>
  <script src="js/nprogress.js"></script>



</head>


<body class="nav-md">

  <div class="container body">


    <div class="main_container">

      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">

          <!-- sidebar menu -->
            <?php
              
              include ('admin-sidemenu.php');
            
            ?>
          <!-- /sidebar menu -->

        </div>
      </div>

      <!-- top navigation -->
      <div class="top_nav">

        <?php
              
              include ('admin-blogout.php');
            
            ?>

      </div>
      <!-- /top navigation -->


      <!-- page content -->
      <div class="right_col" role="main">

        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="dashboard_graph">

              <div class="row x_title">
              <h3><center><b>Welcome</b> <span>(<?php echo $user; ?>)</span></center></h3>
                <div class="col-md-6">
                  <h3  style="font-size: 26px !important;" class="fa fa-sliders"> Slider<small> (List)</small></h3>
                </div>
              
              </div>

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div id="placeholder33" style="height: 260px; display: none" class="demo-placeholder"></div>
                
                         <div class="x_content">
                                  
                                  <a href="admin-slider-add.php"><input type="button" class="btn btn-upload " value="Add Slide" /></a>
                                  
                                  
                                               
                                   <?php
                                   if(isset($_GET['message']) && $_GET['message'] == 'pup' ){
                                    
                                    echo '<b style="color:#ff0000;" >Slide Unpublished.</b>';
                                    
                                   }
                                   if(isset($_GET['message']) && $_GET['message'] == 'pupe' ){
                                    
                                    echo '<b style="color:#ff0000;" >Slide Unpublished Error.</b>';
                                    
                                   }
                                   
                                   if(isset($_GET['message']) && $_GET['message'] == 'pp' ){
                                    
                                    echo '<b style="color:green;" >Slide Published.</b>';
                                    
                                   }
                                   if(isset($_GET['message']) && $_GET['message'] == 'ppe' ){
                                    
                                    echo '<b style="color: #ff0000;" >Slide Published Error.</b>';
                                    
                                   }
                                   if(isset($_GET['message']) && $_GET['message'] == 'pd' ){
                                    
                                    echo '<b style="color:#ff0000;" >Slide Deleted.</b>';
                                    
                                   }
                                   if(isset($_GET['message']) && $_GET['message'] == 'pnd' ){
                                    
                                    echo '<b style="color: #ff0000;" >Slide Not Deleted.</b>';
                                    
                                   }
                                   if(isset($_GET['action']) && $_GET['action'] == 'as' ){
                                    
                                    echo '<b style="color:green;" >Slide Saved.</b>';
                                    
                                   }
                                   if(isset($_GET['action']) && $_GET['action'] == 'nas' ){
                                    
                                    echo '<b style="color: #ff0000;" >Slide Not Saved.</b>';
                                    
                                   }
                                     if(isset($_GET['action']) && $_GET['action'] == 'tu' ){
                                    
                                    echo '<b style="color:green;" >Slide Updated.</b>';
                                    
                                   }
                                   if(isset($_GET['action']) && $_GET['action'] == 'tnu' ){
                                    
                                    echo '<b style="color: #ff0000;" >Slide Not Updated.</b>';
                                    
                                   }
                                   
                                   
                                   
                                   ?>
                            
                                   <table class="table table-bordered" style="text-align: center !important; " >
                                        <thead>
                                          <tr>
                                            <th style="text-align: center !important; " >ID</th>
                                            <th style="text-align: center !important; " >Slide</th>
                                            <th style="text-align: center !important; " >Order</th>
                                            <th style="text-align: center !important; " >Publish</th>
                                            <th style="text-align: center !important; " colspan="2" >Action</th>	 	 	 	 	 	 	 	
                                          </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $qry = mysql_query("select * from slider");
                                            $tenders = mysql_fetch_array($qry);
                                          	if($tenders == '')
                                        		{
                                        		?>
                                                    <tr>
                                                    	<td colspan="9" align="center"><strong><span>No Record Found</span></strong></td>
                                                    </tr>
                                        		
                                        		<?php 
                                                }
                                                $qrry = mysql_query("select * from slider order by order_s limit 0,10");
                                                $rows = mysql_num_rows($qrry);
                                                  for($i=1; $i<=$rows; $i++){
                                                    
                                                    $tender = mysql_fetch_object($qrry);
                                                    
                                        		?> 
                                                    <tr>
                                                        <td align="center" width="2%"><?php echo $i; ?></td>
                                                        <td align="center"><img src="images/<?php echo $tender->slide;?>" style="width: 120px;" /></td>
                                                        <td align="center"><?php echo $tender->order_s;?></td>
                                                        <td align="center"><?php echo ($tender->publish_status ? '<a href="admin-sliderbl.php?action=unpublish&id='.$tender->id.'"><img src="images/tick.png" border="0"></a>' : '<a href="admin-sliderbl.php?action=publish&id='.$tender->id.'"><img src="images/publish_x.png" border="0"></a>')?></td>
                                                        <td align="center"><a href="admin-slider-update.php?action=edit&id=<?php echo($tender->id);?>"><img src="images/edit.gif" border="0" /></a></td>
                                                        <td align="center"><a href="admin-sliderbl.php?action=delete&id=<?php echo($tender->id);?>" onclick="return confirmDelete();"><img src="images/delete.gif" border="0" /></a></td>
                                                    </tr>
                                                <?php 
                                                  }
                                                
                                        		?>
                                                </tbody>
                                        
                                        
                                      </table>   
                                      
                            
                         </div>

                  

                </div>
                
                

              <div class="clearfix"></div>
            </div>
          </div>
          

        </div>
        <br />

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            &copy; Copyright 2016 Faisalabad Institute of Cardiology, Faisalabad  | <a target="_blank"  href="http://nimblewebsolutions.com/"> Nimble Web Solutions</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
      <!-- /page content -->
    </div>

  </div>

  <div id="custom_notifications" class="custom-notifications dsp_none">
    <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
    </ul>
    <div class="clearfix"></div>
    <div id="notif-group" class="tabbed_notifications"></div>
  </div>

  <script src="js/bootstrap.min.js"></script>

  <!-- bootstrap progress js -->
  <script src="js/progressbar/bootstrap-progressbar.min.js"></script>
  <!-- icheck -->
  <script src="js/icheck/icheck.min.js"></script>
  <!-- daterangepicker -->
  <script type="text/javascript" src="js/moment/moment.min.js"></script>
  <script type="text/javascript" src="js/datepicker/daterangepicker.js"></script>

  <script src="js/custom.js"></script>

  <!-- flot js -->
  <!--[if lte IE 8]><script type="text/javascript" src="js/excanvas.min.js"></script><![endif]-->
  <script type="text/javascript" src="js/flot/jquery.flot.js"></script>
  <script type="text/javascript" src="js/flot/jquery.flot.pie.js"></script>
  <script type="text/javascript" src="js/flot/jquery.flot.orderBars.js"></script>
  <script type="text/javascript" src="js/flot/jquery.flot.time.min.js"></script>
  <script type="text/javascript" src="js/flot/date.js"></script>
  <script type="text/javascript" src="js/flot/jquery.flot.spline.js"></script>
  <script type="text/javascript" src="js/flot/jquery.flot.stack.js"></script>
  <script type="text/javascript" src="js/flot/curvedLines.js"></script>
  <script type="text/javascript" src="js/flot/jquery.flot.resize.js"></script>
   
  <!-- /footer content -->
</body>

</html>

<?php
}else{
     $qrery = mysql_query("select * from users where user_n='$user' ");
     $tus = mysql_fetch_array($qrery);
     $arry = $tus['u_option'];
     $rre = json_decode($arry);
     $strre = str_replace('-edit','',$rre[0]);
     $sder = str_replace('-view','',$strre);
     header("location:admin-$sder.php?page&cat=all-category");
}


}

?>