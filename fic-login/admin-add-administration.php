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
                  <h3  style="font-size: 26px !important;" class="fa fa-wrench"> Page Setting<small></small></h3>
                </div>
              
              </div>

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div id="placeholder33" style="height: 260px; display: none" class="demo-placeholder"></div>
                
                           <?php
                        
                            if(@$_GET['sfi'] == 'n'){
                                
                                include_once('admin-alerts.php');
                                    echo '<script type="text/javascript">alert("'.$sfi.'");</script>'; 
                            }
                            if(@$_GET['pefi'] == 'n'){
                                
                                   include_once('admin-alerts.php');
                                    echo '<script type="text/javascript">alert("'.$pefi.'");</script>'; 
                            }
                            
                        
                        ?>
                         
                         <div class="x_content">
                         
                         <div class="col-md-2" style="border-right: 2px solid #e6e9ed;">
                         <br />
                         <label style="color: #1ABB9C !important;">1)<a style="color: #1ABB9C !important;" href="admin-page-setting.php?page="> Admin Team</a></label><br />
                         <br />
                         <label>2)<a href="admin-page-faculity.php?page="> Clinical Faculty</a></label><br />
                         <br />
                         <label>4)<a href="admin-page-feedback.php?page="> Feedback</a></label><br />
                         <br />
                         
                         </div>
                         
                         <div class="col-md-10" >
                         <br />
                         <label><b>Admin Team Add :</b>
                         
                         <?php
                         if(isset($_GET['action']) && $_GET['action'] == 'ru'){
                            
                            echo '<b style="color:green;">Updated.</b>';
                         }
                         if(isset($_GET['action']) && $_GET['action'] == 'rnu'){
                            
                            echo '<b style="color:#ff0000;">Not Updated.</b>';
                         }
                         if(isset($_GET['message']) && $_GET['message'] == 'pp'){
                            
                            echo '<b style="color:green;">Publish.</b>';
                         }
                         if(isset($_GET['message']) && $_GET['message'] == 'pup'){
                            
                            echo '<b style="color:#ff0000;">Unpublish.</b>';
                         }
                         
                         ?>
                         
                         </label><br />
                         
                         <div class="col-md-4">
                         <form method="post" action="admin-page-settingbl.php?action=ad-save" onsubmit="return myForm()" enctype="multipart/form-data">
                         
                         <label>Name : <span style="color: #ff0000;" id="error_na"></span></label>
                         <input type="text" name="name_a" id="name_a" class="form-control" onfocus="clr('error_na')" /><br />
                         
                         <label>Designation : <span style="color: #ff0000;" id="error_des"></span></label>
                         <textarea name="des_a" id="des_a" class="form-control" onfocus="clr('error_des')" ></textarea><br />
                         
                         <label>Photo :</label>
                         <input type="file" name="ph_a" id="ph_a" class="btn btn-upload"  /><br />
                         
                         </div>
                         <div class="col-md-4">
                         
                         <label>Education : <span style="color: #ff0000;" id="error_edu"></span></label>
                         <textarea name="edu_a" id="edu_a" class="form-control" onfocus="clr('error_edu')" ></textarea><br />
                         
                         <label>Contact : <span style="color: #ff0000;" id="error_con"></span></label>
                         <textarea class="form-control" onfocus="clr('error_con')" name="con_a" id="con_a" ></textarea><br />
                         
                         <input type="submit" name="btn" value="Save" class="btn btn-info" />
                         </form>
                         
                         </div>
                         
                         
                         </div>
                         
                    
                         
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
  <!-- chart js -->
  

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
    <script type="text/javascript" >
    function myForm(){
            
            var name_a = $('#name_a').val();
            var des_a = $('#des_a').val();
            var con_a = $('#con_a').val();
            var edu_a = $('#edu_a').val();
      
            
            if(name_a == ''){
                $('#error_na').html('(Required)');
            }
            if(des_a==''){
                $('#error_des').html('(Required)');
            }
            if(con_a == ''){
                $('#error_con').html('(Required)');
            }
            if(edu_a==''){
                $('#error_edu').html('(Required)');
            }
            if(edu_a=='' || ph_a=='' || con_a == '' || name_a == '' || des_a == '' ){
                $('#all_flieds').html('fill the required fields');
            }else{
                $('edu_a='+edu_a+'&con_a='+con_a+'&des_a='+des_a+'&name_a='+name_a+'',function(data){
                $('.name_a').val('');
                $('.des_a').val('');
                $('.edu_a').val('');
                $('.con_a').val('');
                
                
                });
                 return false;
                
            }
            return false;
            
           }
         function clr(val){
            $('#'+val).html('');
         }
  
  </script>
  

  <!-- skycons -->
  <script src="js/skycons/skycons.min.js"></script>
  <script>
    var icons = new Skycons({
        "color": "#73879C"
      }),
      list = [
        "clear-day", "clear-night", "partly-cloudy-day",
        "partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
        "fog"
      ],
      i;

    for (i = list.length; i--;)
      icons.set(list[i], list[i]);

    icons.play();
  </script>
 
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