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
                
                <h3  style="font-size: 26px !important;" class="fa fa-users"> Site Users<small></small></h3>
                </div>
              
              </div>

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div id="placeholder33" style="height: 260px; display: none" class="demo-placeholder"></div>
                
                         <div class="x_content">
                        <a href="admin-users-add.php?page=<?php echo $_GET['page']; ?>"><input type="button" class="btn btn-upload " value="Add user" /></a>
                                   
                                   <?php
                                   
                                   
                                   
                                   if(isset($_GET['action']) && $_GET['action'] == 'pmnpiu' ){
                                    
                                    echo '<b style="color:green;" >User Password Updated.</b>';
                                    
                                   }
                                   if(isset($_GET['message']) && $_GET['message'] == 'pup' ){
                                    
                                    echo '<b style="color:#ff0000;" >User Block.</b>';
                                    
                                   }
                                   if(isset($_GET['message']) && $_GET['message'] == 'pupe' ){
                                    
                                    echo '<b style="color:#ff0000;" >User Block Error.</b>';
                                    
                                   }
                                   
                                   if(isset($_GET['message']) && $_GET['message'] == 'pp' ){
                                    
                                    echo '<b style="color:green;" >User Active.</b>';
                                    
                                   }
                                   if(isset($_GET['message']) && $_GET['message'] == 'ppe' ){
                                    
                                    echo '<b style="color: #ff0000;" >User Active Error.</b>';
                                    
                                   }
                                   if(isset($_GET['message']) && $_GET['message'] == 'pd' ){
                                    
                                    echo '<b style="color:#ff0000;" >User Deleted.</b>';
                                    
                                   }
                                   if(isset($_GET['message']) && $_GET['message'] == 'pnd' ){
                                    
                                    echo '<b style="color: #ff0000;" >User Not Deleted.</b>';
                                    
                                   }
                                   if(isset($_GET['action']) && $_GET['action'] == 'rs' ){
                                    
                                    echo '<b style="color:green;" >User Saved.</b>';
                                    
                                   }
                                   if(isset($_GET['action']) && $_GET['action'] == 'rus' ){
                                    
                                    echo '<b style="color: #ff0000;" >User Not Saved.</b>';
                                    
                                   }
                                     if(isset($_GET['action']) && $_GET['action'] == 'ru' ){
                                    
                                    echo '<b style="color:green;" >User Updated.</b>';
                                    
                                   }
                                   if(isset($_GET['action']) && $_GET['action'] == 'rnu' ){
                                    
                                    echo '<b style="color: #ff0000;" >User Not Updated.</b>';
                                    
                                   }
                                   
                                   
                                   
                                   ?>
                      
                      <table class="table table-bordered" style="text-align: center !important; " >
                                        <thead>
                                          <tr>
                                            <th style="text-align: center !important; " >ID</th>
                                            <th style="text-align: center !important; " >Name</th>
                                            <th style="text-align: center !important; " >Username</th>
                                            <th style="text-align: center !important; " >User rights</th>
                                            <th style="text-align: center !important; " >Status</th>
                                            <th style="text-align: center !important; " >Password</th>
                                            <th style="text-align: center !important; " colspan="2" >Actions</th>	 	 	 	 	 	 	 	
                                          </tr>
                                        </thead>
                                        <tbody>  	 	 	
                               
                                             <?php
                                            $qry = mysql_query("select * from users");
                                            $tenders = mysql_fetch_array($qry);
                                          	if($tenders == '')
                                        		{
                                        		?>
                                                    <tr>
                                                    	<td colspan="9" align="center"><strong><span>No Record Found</span></strong></td>
                                                    </tr>
                                        		
                                        		<?php 
                                                }
                                                $pages = $_GET['page'];
                                                if($pages=='' || $pages=='1'){
                                                    
                                                    $page1 = 0 ;
                                                }else{
                                                    $page1 = ($pages*10)-10;
                                                }
                                                
                                                $qrry = mysql_query("select * from users order by id desc limit $page1,10");
                                                $rows = mysql_num_rows($qrry);
                                                  for($i=1; $i<=$rows; $i++){
                                                    
                                                    $tender = mysql_fetch_object($qrry);
                                                    
                                        		?> 
                                                    <tr>
                                                        <td align="center" width="2%"><?php echo $i; ?></td>
                                                        <td><?php echo $tender->name_n;?></td>
                                                        <td><?php echo $tender->user_n;?></td>
                                                        <td><?php 
                                                    
                                                            $arry = json_decode($tender->u_option);
                                                               
                                                            foreach($arry as $val){
                                                                echo ' ( ';
                                                                 $vali = str_replace('-',' ',$val) ;
                                                                 echo ucfirst($vali);
                                                                echo ' ) ';
                                                            } 
                                                                
                                                           
                                                        
                                                        
                                                        ?></td>
                                                        
                                                        <td align="center"><?php echo ($tender->publish_status ? '<a href="admin-siteuserbll.php?action=unpublish&id='.$tender->id.'&page='.$pages.'">Active</a>' : '<a href="admin-siteuserbll.php?action=publish&id='.$tender->id.'&page='.$pages.'">Block</a>')?></td>
                                                        <td align="center"><a href="admin-user-pass.php?action=forpass&id=<?php echo($tender->id);?>&page=<?php echo $pages; ?>">Reset Password</a></td>
                                                    	<td align="center"><a href="admin-users-update.php?action=update&id=<?php echo($tender->id);?>&page=<?php echo $pages; ?>"><img src="images/edit.gif" border="0"/></a></td>
                                                        <td align="center"><a href="admin-siteuserbll.php?action=delete&id=<?php echo($tender->id);?>&page=<?php echo $pages; ?>" onclick="return confirmDelete();"><img src="images/delete.gif" border="0" /></a></td>
                                                    </tr>
                                                <?php 
                                                  }                                          
                                        		?>
                                        </tbody>
                                      </table>   
                                      
                                      <?php
                                      $query = mysql_query("select * from users");
                                                    $coun = mysql_num_rows($query);
                                                    
                                                    $a = $coun/10;
                                                    $a = ceil($a);
                                                    for($b=1; $b<=$a; $b++){
                                                        
                                                        $pg_no = empty($_GET['page'])? '1' : $_GET['page'] ;
                                                         $class = ($b==$pg_no)? 'btn-default' : '';
                                                        
                                                        ?><div class="btn-group">
                                                           
                                                             <a class="btn <?php echo $class; ?>" href="admin-siteuser.php?page=<?php echo $b ;?>" style="text-decoration: none;" ><?php echo $b." ";?></a>
                                                        
                                                        </div><?php
                                                    }
                                      ?>
               

                         

                       

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