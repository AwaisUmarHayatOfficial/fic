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

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Faisalabad Institute of cardiology | Pages</title>



  <link href="css/bootstrap.min.css" rel="stylesheet">

  <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
  <link href="css/animate.min.css" rel="stylesheet">

  
  <link href="css/custom.css" rel="stylesheet">
  <link href="css/icheck/flat/green.css" rel="stylesheet">

  <link href="css/editor/external/google-code-prettify/prettify.css" rel="stylesheet">
  <link href="css/editor/index.css" rel="stylesheet">

  <link href="css/select/select2.min.css" rel="stylesheet">

  <link rel="stylesheet" href="css/switchery/switchery.min.css" />

  <script src="js/jquery.min.js"></script>
<link rel="stylesheet" href="froala/css/froala_style.css" />
<link rel="stylesheet" href="froala/css/font-awesome.min.css" />
<link rel="stylesheet" href="froala/css/froala_editor.min.css" />
<link rel="stylesheet" href="froala/css/froala_style.min.css" />


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
                  <h3  style="font-size: 26px !important;" class="fa fa-files-o"> Pages<small></small></h3>
                </div>
              
              </div>

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div id="placeholder33" style="height: 260px; display: none" class="demo-placeholder"></div>
                
                <div class="x_content">
                <a href="admin-add-page.php?page=<?php echo $_GET['page']; ?>"><input type="button" class="btn btn-upload " value="Add Page" /></a>
                
                 <?php
                                   if(isset($_GET['message']) && $_GET['message'] == 'pup' ){
                                    
                                    echo '<b style="color:#ff0000;" >Page Unpublished.</b>';
                                    
                                   }
                                   if(isset($_GET['message']) && $_GET['message'] == 'pupe' ){
                                    
                                    echo '<b style="color:#ff0000;" >Page Unpublished Error.</b>';
                                    
                                   }
                                   
                                   if(isset($_GET['message']) && $_GET['message'] == 'pp' ){
                                    
                                    echo '<b style="color:green;" >Page Published.</b>';
                                    
                                   }
                                   if(isset($_GET['message']) && $_GET['message'] == 'ppe' ){
                                    
                                    echo '<b style="color: #ff0000;" >Page Published Error.</b>';
                                    
                                   }
                                   if(isset($_GET['message']) && $_GET['message'] == 'pd' ){
                                    
                                    echo '<b style="color:#ff0000;" >Page Deleted.</b>';
                                    
                                   }
                                   if(isset($_GET['message']) && $_GET['message'] == 'pnd' ){
                                    
                                    echo '<b style="color: #ff0000;" >Page Not Deleted.</b>';
                                    
                                   }
                                   if(isset($_GET['action']) && $_GET['action'] == 'rs' ){
                                    
                                    echo '<b style="color:green;" >Page Saved.</b>';
                                    
                                   }
                                   if(isset($_GET['action']) && $_GET['action'] == 'rus' ){
                                    
                                    echo '<b style="color: #ff0000;" >Page Not Saved.</b>';
                                    
                                   }
                                     if(isset($_GET['action']) && $_GET['action'] == 'ru' ){
                                    
                                    echo '<b style="color:green;" >Page Updated.</b>';
                                    
                                   }
                                   if(isset($_GET['action']) && $_GET['action'] == 'rnu' ){
                                    
                                    echo '<b style="color: #ff0000;" >Page Not Updated.</b>';
                                    
                                   }
                                   
                                   
                                   
                                   ?>
                      
                      <table class="table table-bordered" style="text-align: center !important; " >
                                        <thead>
                                          <tr>
                                            <th style="text-align: center !important; " >ID</th>
                                            <th style="text-align: center !important; " >Page Title</th>
                                            <th style="text-align: center !important; " >Date / Time</th>
                                            <th style="text-align: center !important; " >Publish</th>
                                            <th style="text-align: center !important; " colspan="2" >Actions</th>	 	 	 	 	 	 	 	
                                          </tr>
                                        </thead>
                                        <tbody>  	 	 	
                               
                                             <?php
                                            $qry = mysql_query("select * from pages");
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
                                                
                                                $qrry = mysql_query("select * from pages where custom_menu='page' order by id desc limit $page1,10");
                                                $rows = mysql_num_rows($qrry);
                                                  for($i=1; $i<=$rows; $i++){
                                                    
                                                    $tender = mysql_fetch_object($qrry);
                                                    
                                        		?> 
                                                    <tr>
                                                        <td align="center" width="2%"><?php echo $i; ?></td>
                                                        <td><?php echo $tender->title;?></td>
                                                        <td align="center"><?php echo $tender->date_time;?></td>
                                                        <td align="center"><?php echo ($tender->publish_status ? '<a href="admin-add-pagebl.php?action=unpublish&id='.$tender->id.'&page='.$pages.'"><img src="images/tick.png" border="0"></a>' : '<a href="admin-add-pagebl.php?action=publish&id='.$tender->id.'&page='.$pages.'"><img src="images/publish_x.png" border="0"></a>')?></td>
                                                    	<td align="center"><a href="admin-editpage.php?action=update&id=<?php echo($tender->id);?>&page=<?php echo $pages ;?>"><img src="images/edit.gif" border="0"/></a></td>
                                                        <td align="center"><a href="admin-add-pagebl.php?action=delete&id=<?php echo($tender->id);?>&page=<?php echo $pages ;?>" onclick="return confirmDelete();"><img src="images/delete.gif" border="0" /></a></td>
                                                    </tr>
                                                <?php 
                                                  }                                          
                                        		?>
                                        </tbody>
                                      </table>   
                                      
                                      <?php
                                      $query = mysql_query("select * from pages where custom_menu='page' ");
                                                    $coun = mysql_num_rows($query);
                                                    
                                                    $a = $coun/10;
                                                    $a = ceil($a);
                                                    for($b=1; $b<=$a; $b++){
                                                        
                                                        $pg_no = empty($_GET['page'])? '1' : $_GET['page'] ;
                                                         $class = ($b==$pg_no)? 'btn-default' : '';
                                                        
                                                        ?><div class="btn-group">
                                                           
                                                             <a class="btn <?php echo $class ;?>" href="admin-pages.php?page=<?php echo $b ;?>" style="text-decoration: none;" ><?php echo $b." ";?></a>
                                                        
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
  <!-- tags -->
  <script src="js/tags/jquery.tagsinput.min.js"></script>
  <!-- switchery -->
  <script src="js/switchery/switchery.min.js"></script>
  <!-- daterangepicker -->

  <!-- richtext editor -->
  <script src="js/editor/bootstrap-wysiwyg.js"></script>
  <script src="js/editor/external/jquery.hotkeys.js"></script>
  <script src="js/editor/external/google-code-prettify/prettify.js"></script>
  <!-- select2 -->
  <script src="js/select/select2.full.js"></script>
  <!-- form validation -->
  <script type="text/javascript" src="js/parsley/parsley.min.js"></script>
  <!-- textarea resize -->
  <script src="js/textarea/autosize.min.js"></script>
  <script>
    autosize($('.resizable_textarea'));
  </script>
  <!-- Autocomplete -->
  <script type="text/javascript" src="js/autocomplete/countries.js"></script>
  <script src="js/autocomplete/jquery.autocomplete.js"></script>
  <!-- pace -->
  <script src="js/pace/pace.min.js"></script>
  <script type="text/javascript">
    $(function() {
      'use strict';
      var countriesArray = $.map(countries, function(value, key) {
        return {
          value: value,
          data: key
        };
      });
      // Initialize autocomplete with custom appendTo:
      $('#autocomplete-custom-append').autocomplete({
        lookup: countriesArray,
        appendTo: '#autocomplete-container'
      });
    });
  </script>
  <script src="js/custom.js"></script>
<script src="froala/js/froala_editor.min.js"></script>
<script src="froala/js/plugins/tables.min.js"></script>
<script src="froala/js/plugins/lists.min.js"></script>
<script src="froala/js/plugins/colors.min.js"></script>
<script src="froala/js/plugins/font_family.min.js"></script>
<script src="froala/js/plugins/font_size.min.js"></script>
<script src="froala/js/plugins/block_styles.min.js"></script>
<script src="froala/js/plugins/media_manager.min.js"></script>
<script src="froala/js/plugins/video.min.js"></script>
<script>
$(document).ready(function(){
    $('#Text_1').editable({
          inlineMode: false,
          blockTags: {
            'n': 'Normal',
            'main': 'Main',
            'article': 'Article',
            'h1': 'Heading 1',
            'h2': 'Heading 2',
            'h3': 'Heading 3',
            'h4': 'Heading 4',
            'h5': 'Heading 5',
            'h6': 'Heading 6'
          }
        });
});
</script>
  <!-- /editor -->
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