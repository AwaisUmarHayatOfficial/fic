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

  <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>


<body class="nav-md">

  <div class="container body">


    <div class="main_container">

      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
         
         <!-- 
          <div class="navbar nav_title" style="border: 0;">
            <a href="index.html" class="site_title"> </a>
          </div>
          <div class="clearfix"></div>

          
          <div class="profile">
            <div class="profile_pic">
              <img src="images/img.jpg" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span>Welcome,</span>
              <h2>John Doe</h2>
            </div>
          </div>
           -->

          <!-- sidebar menu -->
            <?php
              
              include ('admin-sidemenu.php');
            
            ?>
          <!-- /sidebar menu -->

          <!-- /menu footer buttons 
          <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
              <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
              <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
              <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout">
              <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
          </div>
          menu footer buttons -->
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
                <h3  style="font-size: 26px !important;" class="fa fa-asterisk"> Change Password<small></small></h3>
                </div>
              
              </div>

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div id="placeholder33" style="height: 260px; display: none" class="demo-placeholder"></div>
                
                         <div class="x_content">
                         <div class="col-md-4">
                         </div>

                       <form method="post" onsubmit="return myForm()" action="admin-siteuserbl.php?action=change">
                       
                       
                       
                       <div class="col-md-4" >
                       <label>Username</label>
                       <input class="form-control" disabled="disabled" type="text" value="admin" /><br />
                       <label>Old password : <span style="color: #ff0000 ;" id="error_old"></span></label>
                       <input type="password" name="old_pass" id="old_pass" onfocus="clr('error_old')"  class="form-control" /><br />
                       <label>New Password : <span style="color: #ff0000 ;" id="error_new"></span></label>
                       <input type="password" name="new_pass" onfocus="clr('error_new')" id="new_pass" class="form-control" /><br />
                       <label>Confirm Password : <span style="color: #ff0000 ;" id="error_cf"></span></label>
                       <input type="password" name="cf_pass" onfocus="clr('error_cf')" id="cf_pass" class="form-control" /><br />
                       <input type="submit" value="<?php 
                       
                       if(isset($_GET['action']) && $_GET['action'] == 'opiopsnpiu'){
                           
                           echo 'update';
                       }else{
                          echo 'change';
                       }
                       
                       
                        ?>" class="btn btn-primary" />
                       
                       
                       
                       <?php
                       

                       
                       if(isset($_GET['action']) && $_GET['action'] == 'opiw'){
                        
                        echo '<b style="color:#ff0000;" >Old Password is Wrong!</b>';
                        
                       }
                       if(isset($_GET['action']) && $_GET['action'] == 'opiopns'){
                        
                        echo '<b style="color:#ff0000;" >Confirm Password Not Match!</b>';
                        
                       }
                       if(isset($_GET['action']) && $_GET['action'] == 'opiopsnpiu'){
                        
                        echo '<b style="color:green;" >Password Updated.</b>';

                       }
                       
                       
                       ?>
                       </div>
                       </form>

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
   
  
  <script type="text/javascript">
  
  function myForm(){
    
    var old_pass = $('#old_pass').val();
    var new_pass = $('#new_pass').val();
    var cf_pass = $('#cf_pass').val(); 
    
    if(old_pass == ''){
        $('#error_old').html('(Required)');
    }
    if(new_pass == ''){
        $('#error_new').html('(Required)');
    }
    if(cf_pass == ''){
        $('#error_cf').html('(Required)');
    }
    if(old_pass == '' || new_pass == '' || cf_pass == ''){
        $('#error_all').html('all fields empty');
    }else{
        $('old_pass='+old_pass+'&new_pass='+new_pass+'&cf_pass='+cf_pass+'',function(data){
                $('.old_pass').val('');
                $('.new_pass').val('');
                $('.cf_pass').val('');
                
                });
                 return false;
    }
    return false;
    
    }
    
     function clr(val){
            $('#'+val).html('');
         }
  
  </script>
  
 
  <!-- /datepicker -->
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