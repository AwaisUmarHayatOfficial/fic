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
  <style>
  .error{
    color: red;
  }
  </style>

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
                  <h3  style="font-size: 26px !important;" class="fa fa-edit">Add Job<small> (add)</small></h3>
                </div>
              
              </div>

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div id="placeholder33" style="height: 260px; display: none" class="demo-placeholder"></div>
                
                <?php
                
                if($user == 'admin'){
                    
                    
                     if(@$_GET['sfi'] == 'n'){
                                
                                include_once('admin-alerts.php');
                                    echo '<script type="text/javascript">alert("'.$sfi.'");</script>'; 
                            }
                            if(@$_GET['efi'] == 'n'){
                                
                                   include_once('admin-alerts.php');
                                    echo '<script type="text/javascript">alert("'.$efi.'");</script>'; 
                            }                    
                                        
                
                ?>
                
                         <div class="x_content">
                                    
                                    <div class="col-md-2">

                                    </div>
                                      <?php 
                                      $pages = $_GET['page'];
                                      
                                      ?>
                                  <form  method="post" action="admin-jobs-addl.php?action=save&page=<?php echo $pages ;?>" onsubmit="return myForm()" enctype="multipart/form-data" >
                                  
                                     <div class="col-md-4">
                                     <label>jobs Description:* <span class="error" id="error_jobs"></span></label>
                                     <input class="form-control" onfocus="clr('error_jobs')" type="text" id="job_description" name="job_description" />
                                     
                                     <label>&nbsp;<span class="error" id="error_st_date"></span></label><br />
                                    <div class="col-md-11 xdisplay_inputx form-group has-feedback">
                                    <input id="single_cal22" onfocus="clr('error_st_date')" class="form-control has-feedback-left" name="st_date" type="text" aria-describedby="inputSuccess2Status2" placeholder="Advertisment Date:*">
                                    <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                    <span id="inputSuccess2Status2" class="sr-only">(success)</span>
                                    </div>
                                      
                                    <label>&nbsp;<span class="error" id="error_last_date"></span></label><br />
                                    <div class="col-md-11 xdisplay_inputx form-group has-feedback">
                                    <input id="single_cal2" onfocus="clr('error_last_date')" name="last_date" class="form-control has-feedback-left" type="text" aria-describedby="inputSuccess2Status2" placeholder="Last Advertisment Date:*">
                                    <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                    <span id="inputSuccess2Status2" class="sr-only">(success)</span>
                                    </div> 
                                    
                                    <label>&nbsp; Attach File:* <span class="error" id="error_adv_link"></span></label>
                                    <input type="file" onfocus="clr('error_adv_link')" class="btn btn-upload" name="adv_link" id="adv_link" />
                                    
                              
                                    </div>
                                    <div class="col-md-4">
                                      
                                    <label>No. of Post</label>
                                     <input type="text" class="form-control" name="no_post" id="no_post" /><br />
                                     
                                     <label>Pay Scale </label>
                                     <input type="text" class="form-control" name="pay" id="pay" /><br />
                                     
                                     <label>Criteria </label>
                                     <input type="text" class="form-control" name="criteria" id="criteria" /><br />
                                     
                                    <input type="submit" name="jobs_submit" value="Save Jobs" class="btn btn-primary" />
                                    </div>
                         
                                  </form>
                                  
                                    
                                    
                                    
                               
                                      
                            
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
        
        
         if(@$_GET['sfi'] == 'n'){
                                
                                include_once('admin-alerts.php');
                                    echo '<script type="text/javascript">alert("'.$sfi.'");</script>'; 
                            }
                            if(@$_GET['efi'] == 'n'){
                                
                                   include_once('admin-alerts.php');
                                    echo '<script type="text/javascript">alert("'.$efi.'");</script>'; 
                            }  
        
        
        ?>
        
        <div class="x_content">
                                    
                                    <div class="col-md-2">

                                    </div>
                                      <?php 
                                      $pages = $_GET['page'];
                                      
                                      ?>
                                  <form  method="post" action="admin-jobs-addl.php?action=save&page=<?php echo $pages ;?>" onsubmit="return myForm()" enctype="multipart/form-data" >
                                  
                                     <div class="col-md-4">
                                     <label>jobs Description:* <span class="error" id="error_jobs"></span></label>
                                     <input class="form-control" onfocus="clr('error_jobs')" type="text" id="job_description" name="job_description" />
                                     
                                     <label>&nbsp;<span class="error" id="error_st_date"></span></label><br />
                                    <div class="col-md-11 xdisplay_inputx form-group has-feedback">
                                    <input id="single_cal22" onfocus="clr('error_st_date')" class="form-control has-feedback-left" name="st_date" type="text" aria-describedby="inputSuccess2Status2" placeholder="Advertisment Date:*">
                                    <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                    <span id="inputSuccess2Status2" class="sr-only">(success)</span>
                                    </div>
                                      
                                    <label>&nbsp;<span class="error" id="error_last_date"></span></label><br />
                                    <div class="col-md-11 xdisplay_inputx form-group has-feedback">
                                    <input id="single_cal2" onfocus="clr('error_last_date')" name="last_date" class="form-control has-feedback-left" type="text" aria-describedby="inputSuccess2Status2" placeholder="Last Advertisment Date:*">
                                    <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                    <span id="inputSuccess2Status2" class="sr-only">(success)</span>
                                    </div> 
                                    
                                    <label>&nbsp; Attach File:* <span class="error" id="error_adv_link"></span></label>
                                    <input type="file" onfocus="clr('error_adv_link')" class="btn btn-upload" name="adv_link" id="adv_link" />
                                    
                              
                                    </div>
                                    <div class="col-md-4">
                                      
                                    <label>No. of Post</label>
                                     <input type="text" class="form-control" name="no_post" id="no_post" /><br />
                                     
                                     <label>Pay Scale </label>
                                     <input type="text" class="form-control" name="pay" id="pay" /><br />
                                     
                                     <label>Criteria </label>
                                     <input type="text" class="form-control" name="criteria" id="criteria" /><br />
                                     
                                    <input type="submit" name="jobs_submit" value="Save Jobs" class="btn btn-primary" />
                                    </div>
                         
                                  </form>
        
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
            
            var job_description = $('#job_description').val();
            var st_date = $('#single_cal2').val();
            var last_date = $('#single_cal22').val();
            var adv_link = $('#adv_link').val();
            
            if(job_description == ''){
                $('#error_jobs').html('(Required)');
            }
            if(st_date==''){
                $('#error_st_date').html('(Required)');
            }
            if(adv_link == ''){
                $('#error_adv_link').html('(Required)');
            }
            
            if(last_date==''){
                $('#error_last_date').html('(Required)');
            }
            if(st_date=='' || last_date=='' || job_description == '' || adv_link == ''){
                $('#all_flieds').html('fill the required fields');
            }else{
                $('adv_link='+adv_link+'&job_description='+job_description+'&st_date='+st_date+'&last_date='+last_date+'',function(data){
                $('.job_description').val('');
                $('.adv_link').val('');
                $('.st_date').val('');
                $('.last_date').val('');
                
                
                });
                 return false;
                
            }
            return false;
            
           }
         function clr(val){
            $('#'+val).html('');
         }
  
  </script>
  
   <!-- datepicker -->
  <script type="text/javascript">
    $(document).ready(function() {

      var cb = function(start, end, label) {
        console.log(start.toISOString(), end.toISOString(), label);
        $('#reportrange_right span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        //alert("Callback has fired: [" + start.format('MMMM D, YYYY') + " to " + end.format('MMMM D, YYYY') + ", label = " + label + "]");
      }

      var optionSet1 = {
        startDate: moment().subtract(29, 'days'),
        endDate: moment(),
        minDate: '01/01/2012',
        maxDate: '12/31/2015',
        dateLimit: {
          days: 60
        },
        showDropdowns: true,
        showWeekNumbers: true,
        timePicker: false,
        timePickerIncrement: 1,
        timePicker12Hour: true,
        ranges: {
          'Today': [moment(), moment()],
          'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days': [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month': [moment().startOf('month'), moment().endOf('month')],
          'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        opens: 'right',
        buttonClasses: ['btn btn-default'],
        applyClass: 'btn-small btn-primary',
        cancelClass: 'btn-small',
        format: 'MM/DD/YYYY',
        separator: ' to ',
        locale: {
          applyLabel: 'Submit',
          cancelLabel: 'Clear',
          fromLabel: 'From',
          toLabel: 'To',
          customRangeLabel: 'Custom',
          daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
          monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
          firstDay: 1
        }
      };

      $('#reportrange_right span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));

      $('#reportrange_right').daterangepicker(optionSet1, cb);

      $('#reportrange_right').on('show.daterangepicker', function() {
        console.log("show event fired");
      });
      $('#reportrange_right').on('hide.daterangepicker', function() {
        console.log("hide event fired");
      });
      $('#reportrange_right').on('apply.daterangepicker', function(ev, picker) {
        console.log("apply event fired, start/end dates are " + picker.startDate.format('MMMM D, YYYY') + " to " + picker.endDate.format('MMMM D, YYYY'));
      });
      $('#reportrange_right').on('cancel.daterangepicker', function(ev, picker) {
        console.log("cancel event fired");
      });

      $('#options1').click(function() {
        $('#reportrange_right').data('daterangepicker').setOptions(optionSet1, cb);
      });

      $('#options2').click(function() {
        $('#reportrange_right').data('daterangepicker').setOptions(optionSet2, cb);
      });

      $('#destroy').click(function() {
        $('#reportrange_right').data('daterangepicker').remove();
      });

    });
  </script>
  <!-- datepicker -->
  <script type="text/javascript">
    $(document).ready(function() {

      var cb = function(start, end, label) {
        console.log(start.toISOString(), end.toISOString(), label);
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        //alert("Callback has fired: [" + start.format('MMMM D, YYYY') + " to " + end.format('MMMM D, YYYY') + ", label = " + label + "]");
      }

      var optionSet1 = {
        startDate: moment().subtract(29, 'days'),
        endDate: moment(),
        minDate: '01/01/2012',
        maxDate: '12/31/2015',
        dateLimit: {
          days: 60
        },
        showDropdowns: true,
        showWeekNumbers: true,
        timePicker: false,
        timePickerIncrement: 1,
        timePicker12Hour: true,
        ranges: {
          'Today': [moment(), moment()],
          'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days': [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month': [moment().startOf('month'), moment().endOf('month')],
          'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        opens: 'left',
        buttonClasses: ['btn btn-default'],
        applyClass: 'btn-small btn-primary',
        cancelClass: 'btn-small',
        format: 'MM/DD/YYYY',
        separator: ' to ',
        locale: {
          applyLabel: 'Submit',
          cancelLabel: 'Clear',
          fromLabel: 'From',
          toLabel: 'To',
          customRangeLabel: 'Custom',
          daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
          monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
          firstDay: 1
        }
      };
      $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
      $('#reportrange').daterangepicker(optionSet1, cb);
      $('#reportrange').on('show.daterangepicker', function() {
        console.log("show event fired");
      });
      $('#reportrange').on('hide.daterangepicker', function() {
        console.log("hide event fired");
      });
      $('#reportrange').on('apply.daterangepicker', function(ev, picker) {
        console.log("apply event fired, start/end dates are " + picker.startDate.format('MMMM D, YYYY') + " to " + picker.endDate.format('MMMM D, YYYY'));
      });
      $('#reportrange').on('cancel.daterangepicker', function(ev, picker) {
        console.log("cancel event fired");
      });
      $('#options1').click(function() {
        $('#reportrange').data('daterangepicker').setOptions(optionSet1, cb);
      });
      $('#options2').click(function() {
        $('#reportrange').data('daterangepicker').setOptions(optionSet2, cb);
      });
      $('#destroy').click(function() {
        $('#reportrange').data('daterangepicker').remove();
      });
    });
  </script>
  <!-- /datepicker -->
  <script type="text/javascript">
    $(document).ready(function() {
      $('#single_cal1').daterangepicker({
        singleDatePicker: true,
        calender_style: "picker_1"
      }, function(start, end, label) {
        console.log(start.toISOString(), end.toISOString(), label);
      });
      $('#single_cal2').daterangepicker({
        singleDatePicker: true,
        calender_style: "picker_2"
      }, function(start, end, label) {
        console.log(start.toISOString(), end.toISOString(), label);
      });
        $('#single_cal22').daterangepicker({
        singleDatePicker: true,
        calender_style: "picker_2"
      }, function(start, end, label) {
        console.log(start.toISOString(), end.toISOString(), label);
      });
      $('#single_cal3').daterangepicker({
        singleDatePicker: true,
        calender_style: "picker_3"
      }, function(start, end, label) {
        console.log(start.toISOString(), end.toISOString(), label);
      });
      $('#single_cal4').daterangepicker({
        singleDatePicker: true,
        calender_style: "picker_4"
      }, function(start, end, label) {
        console.log(start.toISOString(), end.toISOString(), label);
      });
    });
  </script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#reservation').daterangepicker(null, function(start, end, label) {
        console.log(start.toISOString(), end.toISOString(), label);
      });
    });
  </script>
  <!-- /datepicker -->
   
  <!-- /footer content -->
</body>

</html>

<?php



}

?>
