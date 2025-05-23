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

  <title>Faisalabad Institute of cardiology | Pages</title>

  <!-- Bootstrap core CSS -->

  <link href="css/bootstrap.min.css" rel="stylesheet">

  <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
  <link href="css/animate.min.css" rel="stylesheet">

  <!-- Custom styling plus plugins -->
  <link href="css/custom.css" rel="stylesheet">
  <link href="css/icheck/flat/green.css" rel="stylesheet">
  <!-- editor -->
  <link href="css/editor/external/google-code-prettify/prettify.css" rel="stylesheet">
  <link href="css/editor/index.css" rel="stylesheet">
  <!-- select2 -->
  <link href="css/select/select2.min.css" rel="stylesheet">
  <!-- switchery -->
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
                  <h3  style="font-size: 26px !important;" class="fa fa-files-o"> Add Pages<small></small></h3>
                </div>
              
              </div>

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div id="placeholder33" style="height: 260px; display: none" class="demo-placeholder"></div>
                
                <div class="x_content">
                           <?php
                           $pg = $_GET['page'];
                           ?>
                          <form method="post" onsubmit="return myForm()" action="admin-pagebl.php?action=save&page=<?php echo $pg; ?>" >
                    
                                        <div class="form-group">
                                            <label>Enter Page Name <span id="error_tit" style="color: #ff0000;"></span></label>
                                            <input type="text" class="form-control" onfocus="clr('error_tit')" id="title" name="title" placeholder="Enter Page Title" />
                                        </div>
                                        <div class="form-group">
                                            <label>Page Content</label>
                                            <textarea  name="content" id="Text_1"></textarea>
                                            <br />
                                            <input type="submit" class="btn btn-primary" value="Add Page" />
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
  <script type="text/javascript" src="js/moment/moment.min.js"></script>
  <script type="text/javascript" src="js/datepicker/daterangepicker.js"></script>
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
<script type="text/javascript" >

function myForm(){
    var title = $('#title').val();
    
    if(title == ''){
        $('#error_tit').html('(Required)');
    }else{
        $('title='+title+'',function(data){
            $('.title').html('');
        });
        return false;
    }
    return false;
}

function clr(val){
   
   $('#'+val).html('');
   
}

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