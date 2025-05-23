<?php
include_once('admin-includes.php');


session_start();
$user = $_SESSION['user'];
$pass = $_SESSION['pass'];
    if(!$user && !$pass)
    {
       header( 'Location:admin-login.php?action=ag' ) ;
    }else{
        
        

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
                  <h3  style="font-size: 26px !important;" class="fa fa-bar-chart-o"> Job Manager<small> (List)</small></h3>
                </div>
              
              </div>

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div id="placeholder33" style="height: 260px; display: none" class="demo-placeholder"></div>
                
                        <?php
                        if($user == 'admin'){
                        ?>
                        
                         <div class="x_content">
                          
                          <a href="admin-jobs-add.php?page=<?php echo @$_GET['page']; ?>"><input type="button" class="btn btn-upload " value="Add Jobs" /></a>
                           
                           <?php
                                   if(isset($_GET['message']) && $_GET['message'] == 'pup' ){
                                    
                                    echo '<b style="color:#ff0000;" >Record Unpublished.</b>';
                                    
                                   }
                                   if(isset($_GET['message']) && $_GET['message'] == 'pupe' ){
                                    
                                    echo '<b style="color:#ff0000;" >Record Unpublished Error.</b>';
                                    
                                   }
                                   
                                   if(isset($_GET['message']) && $_GET['message'] == 'pp' ){
                                    
                                    echo '<b style="color:green;" >Record Published.</b>';
                                    
                                   }
                                   if(isset($_GET['message']) && $_GET['message'] == 'ppe' ){
                                    
                                    echo '<b style="color: #ff0000;" >Record Published Error.</b>';
                                    
                                   }
                                   if(isset($_GET['message']) && $_GET['message'] == 'pd' ){
                                    
                                    echo '<b style="color:#ff0000;" >Record Deleted.</b>';
                                    
                                   }
                                   if(isset($_GET['message']) && $_GET['message'] == 'pnd' ){
                                    
                                    echo '<b style="color: #ff0000;" >Record Not Deleted.</b>';
                                    
                                   }
                                   if(isset($_GET['action']) && $_GET['action'] == 'js' ){
                                    
                                    echo '<b style="color:green;" >Record Saved.</b>';
                                    
                                   }
                                   if(isset($_GET['action']) && $_GET['action'] == 'jus' ){
                                    
                                    echo '<b style="color: #ff0000;" >Record Not Saved.</b>';
                                    
                                   }
                                     if(isset($_GET['action']) && $_GET['action'] == 'ju' ){
                                    
                                    echo '<b style="color:green;" >Record Updated.</b>';
                                    
                                   }
                                   if(isset($_GET['action']) && $_GET['action'] == 'jnu' ){
                                    
                                    echo '<b style="color: #ff0000;" >Record Not Updated.</b>';
                                    
                                   }
                                   
                                   
                                   
                                   ?>
                           
                           
                                     <table class="table table-bordered" style="text-align: center !important; " >
                                                    <thead>
                                                      <tr>
                                                        <th style="text-align: center !important; " >ID</th>
                                                        <th style="text-align: center !important; " >Job Description</th>
                                                        <th style="text-align: center !important; " >Date of Advertisement</th>
                                                        <th style="text-align: center !important; " >Last Date</th>
                                                        <th style="text-align: center !important; " >Pay Scale</th>
                                                        <th style="text-align: center !important; " >No. of Post</th>
                                                        <th style="text-align: center !important; " >Criteria</th>
                                                        <th style="text-align: center !important; " >Advertisement Link</th>
                                                        <th style="text-align: center !important; " >Publish</th>
                                                        <th style="text-align: center !important; " colspan="4" >Actions</th>	 	 	 	 	 	 	 	
                                                      </tr>
                                                    </thead>
                                                    <tbody>
                      <?php
                                            $qry = mysql_query("select * from jobs");
                                            $tenders = mysql_fetch_array($qry);
                                          	if($tenders == '')
                                        		{
                                        		?>
                                                    <tr>
                                                    	<td colspan="9" align="center"><strong><span>No Record Found</span></strong></td>
                                                    </tr>
                                        		
                                        		<?php 
                                                }
                                                @$pages = $_GET['page'];
                                                if($pages=='' || $pages=='1'){
                                                    
                                                    $page1 = 0 ;
                                                }else{
                                                    $page1 = ($pages*10)-10;
                                                }
                                                
                                                $qrry = mysql_query("select * from jobs order by id desc limit $page1,10");
                                                $rows = mysql_num_rows($qrry);
                                                  for($i=1; $i<=$rows; $i++){
                                                    
                                                    $tender = mysql_fetch_object($qrry);
                                                    
                                        		?> 
                                                    <tr>
                                                        <td align="center" width="2%"><?php echo $i; ?></td>
                                                        <td><?php echo $tender->job_description;?></td>
                                                        <td align="center"><?php echo $tender->st_date;?></td>
                                                        <td align="center"><?php echo $tender->last_date; ?></td>
                                                        <td align="center"><?php echo $tender->pay; ?></td>
                                                         <td align="center"><?php echo $tender->no_post; ?></td>
                                                        <td align="center"><?php
                                                        
                                                        $string = trim( $tender->criteria );
                                                $string = strip_tags($string);
                                                if (strlen($string) > 100) {
                                                    $stringCut = substr($string, 0, 100);
                                                    $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'... '; 
                                                }
                                                echo $string;

                                               ?> 
                                                        
                                               </td>
                                                        <td align="center"><?php echo $tender->adv_link;?></td>
                                                        <td align="center"><?php echo ($tender->publish_status ? '<a href="admin-jobsbl.php?action=unpublish&id='.$tender->id.'&page='.$pages.'"><img src="images/tick.png" border="0"></a>' : '<a href="admin-jobsbl.php?action=publish&id='.$tender->id.'&page='.$pages.'"><img src="images/publish_x.png" border="0"></a>')?></td>
                                                        <td align="center"><a style="color: blue;" target="_blank" href="files/<?php echo $tender->adv_link;?>">View</a></td>
                                                        <td align="center"><a style="color: blue;" href="files/<?php echo $tender->adv_link;?>" download>Download</a></td>
                                                    	<td align="center"><a href="admin-jobs-update.php?action=update&id=<?php echo($tender->id);?>&page=<?php echo $pages ;?>"><img src="images/edit.gif" border="0"/></a></td>
                                                        <td align="center"><a href="admin-jobsbl.php?action=delete&id=<?php echo($tender->id);?>&page=<?php echo $pages ;?>" onclick="return confirmDelete();"><img src="images/delete.gif" border="0" /></a></td>
                                                    </tr>
                                                <?php 
                                                  }
                                                
                                        		?>
                                          </tbody>
                                        </table>  
      
                              <?php
                                      $query = mysql_query("select * from jobs");
                                                    $coun = mysql_num_rows($query);
                                                    
                                                    $a = $coun/10;
                                                    $a = ceil($a);
                                                    for($b=1; $b<=$a; $b++){
                                                        
                                                        $pg_no = empty($_GET['page'])? '1' : $_GET['page'] ;
                                                         $class = ($b==$pg_no)? 'btn-default' : '';
                                                        
                                                        ?><div class="btn-group">
                                                           
                                                             <a class="btn <?php echo $class;?>" href="admin-jobs.php?page=<?php echo $b ;?>" style="text-decoration: none;" ><?php echo $b." ";?></a>
                                                        
                                                        </div><?php
                                                    }
                                      ?>

                </div>
                
                <?php
                
                }else{
     $qrery = mysql_query("select * from users where user_n='$user' ");
     $tus = mysql_fetch_array($qrery);
     $arry = $tus['u_option'];
     $rre = json_decode($arry);
     $strre = str_replace('-edit','',$rre[0]);
     $sder = str_replace('-view','',$strre);
     
     if($sder = 'jobs'){
        
        ?>
        
        <div class="x_content">
                          
                          <a href="admin-jobs-add.php?page=<?php echo $_GET['page']; ?>"><input type="button" class="btn btn-upload " value="Add Jobs" /></a>
                           
                           <?php
                                   if(isset($_GET['message']) && $_GET['message'] == 'pup' ){
                                    
                                    echo '<b style="color:#ff0000;" >Record Unpublished.</b>';
                                    
                                   }
                                   if(isset($_GET['message']) && $_GET['message'] == 'pupe' ){
                                    
                                    echo '<b style="color:#ff0000;" >Record Unpublished Error.</b>';
                                    
                                   }
                                   
                                   if(isset($_GET['message']) && $_GET['message'] == 'pp' ){
                                    
                                    echo '<b style="color:green;" >Record Published.</b>';
                                    
                                   }
                                   if(isset($_GET['message']) && $_GET['message'] == 'ppe' ){
                                    
                                    echo '<b style="color: #ff0000;" >Record Published Error.</b>';
                                    
                                   }
                                   if(isset($_GET['message']) && $_GET['message'] == 'pd' ){
                                    
                                    echo '<b style="color:#ff0000;" >Record Deleted.</b>';
                                    
                                   }
                                   if(isset($_GET['message']) && $_GET['message'] == 'pnd' ){
                                    
                                    echo '<b style="color: #ff0000;" >Record Not Deleted.</b>';
                                    
                                   }
                                   if(isset($_GET['action']) && $_GET['action'] == 'js' ){
                                    
                                    echo '<b style="color:green;" >Record Saved.</b>';
                                    
                                   }
                                   if(isset($_GET['action']) && $_GET['action'] == 'jus' ){
                                    
                                    echo '<b style="color: #ff0000;" >Record Not Saved.</b>';
                                    
                                   }
                                     if(isset($_GET['action']) && $_GET['action'] == 'ju' ){
                                    
                                    echo '<b style="color:green;" >Record Updated.</b>';
                                    
                                   }
                                   if(isset($_GET['action']) && $_GET['action'] == 'jnu' ){
                                    
                                    echo '<b style="color: #ff0000;" >Record Not Updated.</b>';
                                    
                                   }
                                   
                                   
                                   
                                   ?>
                           
                           
                                     <table class="table table-bordered" style="text-align: center !important; " >
                                                    <thead>
                                                      <tr>
                                                        <th style="text-align: center !important; " >ID</th>
                                                        <th style="text-align: center !important; " >Job Description</th>
                                                        <th style="text-align: center !important; " >Date of Advertisement</th>
                                                        <th style="text-align: center !important; " >Last Date</th>
                                                        <th style="text-align: center !important; " >Pay Scale</th>
                                                        <th style="text-align: center !important; " >No. of Post</th>
                                                        <th style="text-align: center !important; " >Criteria</th>
                                                        <th style="text-align: center !important; " >Advertisement Link</th>
                                                        <th style="text-align: center !important; " >Publish</th>
                                                        <th style="text-align: center !important; " colspan="4" >Actions</th>	 	 	 	 	 	 	 	
                                                      </tr>
                                                    </thead>
                                                    <tbody>
                      <?php
                                            $qry = mysql_query("select * from jobs");
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
                                                
                                                $qrry = mysql_query("select * from jobs order by id desc limit $page1,10");
                                                $rows = mysql_num_rows($qrry);
                                                  for($i=1; $i<=$rows; $i++){
                                                    
                                                    $tender = mysql_fetch_object($qrry);
                                                    
                                        		?> 
                                                    <tr>
                                                        <td align="center" width="2%"><?php echo $i; ?></td>
                                                        <td><?php echo $tender->job_description;?></td>
                                                        <td align="center"><?php echo $tender->st_date;?></td>
                                                        <td align="center"><?php echo $tender->last_date; ?></td>
                                                        <td align="center"><?php echo $tender->pay; ?></td>
                                                         <td align="center"><?php echo $tender->no_post; ?></td>
                                                        <td align="center"><?php
                                                        
                                                      
                                                 $string = trim( $tender->criteria );
                                                $string = strip_tags($string);
                                                if (strlen($string) > 100) {
                                                    $stringCut = substr($string, 0, 100);
                                                    $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'... '; 
                                                }
                                                echo $string;

                                               ?> 
                                                        
                                               </td>
                                                        <td align="center"><?php echo $tender->adv_link;?></td>
                                                        <td align="center"><?php echo ($tender->publish_status ? '<a href="admin-jobsbl.php?action=unpublish&id='.$tender->id.'&page='.$pages.'"><img src="images/tick.png" border="0"></a>' : '<a href="admin-jobsbl.php?action=publish&id='.$tender->id.'&page='.$pages.'"><img src="images/publish_x.png" border="0"></a>')?></td>
                                                        <td align="center"><a style="color: blue;" target="_blank" href="files/<?php echo $tender->adv_link;?>">View</a></td>
                                                        <td align="center"><a style="color: blue;" href="files/<?php echo $tender->adv_link;?>" download>Download</a></td>
                                                    	<td align="center"><a href="admin-jobs-update.php?action=update&id=<?php echo($tender->id);?>&page=<?php echo $pages ;?>"><img src="images/edit.gif" border="0"/></a></td>
                                                        
                                                    </tr>
                                                <?php 
                                                  }
                                                
                                        		?>
                                          </tbody>
                                        </table>  
      
                              <?php
                                      $query = mysql_query("select * from jobs");
                                                    $coun = mysql_num_rows($query);
                                                    
                                                    $a = $coun/10;
                                                    $a = ceil($a);
                                                    for($b=1; $b<=$a; $b++){
                                                        
                                                        $pg_no = empty($_GET['page'])? '1' : $_GET['page'] ;
                                                         $class = ($b==$pg_no)? 'btn-default' : '';
                                                        
                                                        ?><div class="btn-group">
                                                           
                                                             <a class="btn <?php echo $class;?>" href="admin-jobs.php?page=<?php echo $b ;?>" style="text-decoration: none;" ><?php echo $b." ";?></a>
                                                        
                                                        </div><?php
                                                    }
                                      ?>

                </div>
        
        <?php
     }else{
     
     header("location:admin-$sder.php?page&cat=all-category");
}
}
                
                ?>
                
                
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
   

  <!-- /datepicker -->
  <!-- /footer content -->
</body>

</html>
<?php



}
?>
