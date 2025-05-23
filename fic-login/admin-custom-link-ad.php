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
                  <h3  style="font-size: 26px !important;" class="fa fa-navicon"> Add Menu<small></small></h3>
                </div>
              
              </div>

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div id="placeholder33" style="height: 260px; display: none" class="demo-placeholder"></div>
                <div class="x_content">

               <div class="col-md-2" style="border-right: 2px solid #e6e9ed;">
               <br />
               <label >1) <a href="admin-editmenu.php?page=">Pages Link</a></label><br />
               <br />
               <label style="color: #1ABB9C !important;" >2) <a style="color: #1ABB9C !important;" href="admin-custom-link.php?page=">Custom Link</a></label>
               </div>
               
               <div class="col-md-10">
               <label>Pages Link :</label><br /><br />
               
               <div class="col-md-4">
               
                <form method="post" onsubmit="return myForm()" action="admin-page-settingbl.php?action=cmenu-save">
                
                <label>Page Title : <span id="er_title" style="color: #ff0000;"></span></label>
                <input type="text" id="title" name="title" onfocus="clr('er_title')" class="form-control" /><br />
                
                <label>Page Link : <span id="er_link" style="color: #ff0000;"></span></label>
                <input type="text" name="link" id="link" onfocus="clr('er_link')" class="form-control" /><br />
                
                <label>Order : <span id="er_order" style="color: #ff0000;"></span></label>
                <input type="number" name="order_c" id="order_c" onfocus="clr('er_order')" class="form-control" /><br />
                 
                 <label>Add menu :</label>
                  <select class="form-control" name="mennu">
                    <option value="none">Select Menu</option>
                    <option value="about-us">About us</option>
                    <option value="cardilogy">Cardilogy</option>
                    <option value="cardiac-surgery">Cardiac surgery</option>
                    <option value="diagnostics">Diagnostics</option>
                    <option value="auxiliary-services">Auxiliary services</option>
                    <option value="contact-us">Contact us</option>
                    <option value="none">None</option>
                  </select>
                  <br />
                  <input type="submit"  name="update_menu" class="btn btn-info" value="Save" />
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
            
            var title = $('#title').val();
            var link = $('#link').val();
            
            if(title == ''){
                $('#er_title').html('(Required)');
            }
            if(link == ''){
                $('#er_link').html('(Required)');
            }if(link == '' || title == ''){
                
            }else{
                $('title='+title+'&link='+link+'',function(data){
                $('.title').val('');
                $('.link').val('');
 
                });
                 return false;
                
            }
            return false;
            
           }
         function clr(val){
            $('#'+val).html('');
         }
  
  </script>
  <script>
    $(document).ready(function() {
      // [17, 74, 6, 39, 20, 85, 7]
      //[82, 23, 66, 9, 99, 6, 2]
      var data1 = [
        [gd(2012, 1, 1), 17],
        [gd(2012, 1, 2), 74],
        [gd(2012, 1, 3), 6],
        [gd(2012, 1, 4), 39],
        [gd(2012, 1, 5), 20],
        [gd(2012, 1, 6), 85],
        [gd(2012, 1, 7), 7]
      ];

      var data2 = [
        [gd(2012, 1, 1), 82],
        [gd(2012, 1, 2), 23],
        [gd(2012, 1, 3), 66],
        [gd(2012, 1, 4), 9],
        [gd(2012, 1, 5), 119],
        [gd(2012, 1, 6), 6],
        [gd(2012, 1, 7), 9]
      ];
      $("#canvas_dahs").length && $.plot($("#canvas_dahs"), [
        data1, data2
      ], {
        series: {
          lines: {
            show: false,
            fill: true
          },
          splines: {
            show: true,
            tension: 0.4,
            lineWidth: 1,
            fill: 0.4
          },
          points: {
            radius: 0,
            show: true
          },
          shadowSize: 2
        },
        grid: {
          verticalLines: true,
          hoverable: true,
          clickable: true,
          tickColor: "#d5d5d5",
          borderWidth: 1,
          color: '#fff'
        },
        colors: ["rgba(38, 185, 154, 0.38)", "rgba(3, 88, 106, 0.38)"],
        xaxis: {
          tickColor: "rgba(51, 51, 51, 0.06)",
          mode: "time",
          tickSize: [1, "day"],
          //tickLength: 10,
          axisLabel: "Date",
          axisLabelUseCanvas: true,
          axisLabelFontSizePixels: 12,
          axisLabelFontFamily: 'Verdana, Arial',
          axisLabelPadding: 10
            //mode: "time", timeformat: "%m/%d/%y", minTickSize: [1, "day"]
        },
        yaxis: {
          ticks: 8,
          tickColor: "rgba(51, 51, 51, 0.06)",
        },
        tooltip: false
      });

      function gd(year, month, day) {
        return new Date(year, month - 1, day).getTime();
      }
    });
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