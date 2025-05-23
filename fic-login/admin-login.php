<?php 
include_once('admin-includes.php');
session_start();

    if(isset($_SESSION['user']) && isset($_SESSION['pass']))
    {
       header( 'Location:admin-home.php?action=Successfully-Login' ) ;
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

  <title>Faisalabad Institute of cardiology | Admin panel</title>

  <!-- Bootstrap core CSS -->

  <link href="css/bootstrap.min.css" rel="stylesheet">

  <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
  <link href="css/animate.min.css" rel="stylesheet">

  <!-- Custom styling plus plugins -->
  <link href="css/custom.css" rel="stylesheet">
  <link href="css/icheck/flat/green.css" rel="stylesheet">


  <script src="js/jquery.min.js"></script>

  <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>

<body style="background:#F7F7F7;">

  <div class="">
    <a class="hiddenanchor" id="toregister"></a>
    <a class="hiddenanchor" id="tologin"></a>

    <div id="wrapper">
      <div id="login" class="animate form">
        <section class="login_content">
        
        
          <form method="post" action="admin-loginbl.php?action=login&user=login" >
            <h1>Admin panel</h1>
            
              <div style="padding-bottom: 10px;">
                 
        <div style="color: green;" >
        <?php
         
         if(isset($_GET['logout']) && $_GET['logout'] == 'sucess' ){
            
            echo '<b>successfully Logout!</b>';
            echo '<br>';
         }
        
        ?>
        
        </div>
        
        <div style="color:#ff0000 ;">
        <?php
    
         
             if(isset($_GET['up']) && $_GET['up'] == 'unmpm' ){
                
                 $massage_u = ' <b>username.</b> ';
                 $massage_l = '<b>ERROR: </b> ';
                 
                 echo $massage_l.'Invalid'.$massage_u;
                 echo '<br>';    
             }
             if(isset($_GET['up']) && $_GET['up'] == 'umpnm' ){
                
                 $massage_p = ' <b>password.</b>';
                 $massage_l = '<b>ERROR: </b> ';
                 echo $massage_l.'Invalid'.$massage_p;   
                 echo '<br>'; 
             }
             if(isset($_GET['up']) && $_GET['up'] == 'unmpnm' ){
                
                 $massage_u = ' <b>username</b>';
                 $massage_p = '<b>password.</b>';
                 $massage_l = '<b>ERROR: </b> ';
                 
                 echo $massage_l.'Invalid'.$massage_u.','.$massage_p ;    
                 echo '<br>';
             }
             if(isset($_GET['action']) && $_GET['action'] == 'ag'){
                
                echo '<b>ERROR: Please Login!</b>';
                echo '<br>';
                
             }
             
        
        ?>
        </div>
              
              </div>
            
            <div>
              <input type="text" class="form-control"  name="user" id="user" placeholder="Username" required="" />
            </div>
            <div>
              <input type="password" class="form-control" name="pass" id="pass" placeholder="Password" required="" />
            </div>
            <div>
             <input type="submit" class="btn btn-default submit" value="Log in" />
             
             
             
              <!-- <a class="reset_pass" href="#">Lost your password?</a> --->
            </div>
            <div class="clearfix"></div>
            <div class="separator">

             <!--- <p class="change_link">New to site?
                <a href="#toregister" class="to_register"> Create Account </a>
              </p> --->
              <div class="clearfix"></div>
              <br />
              <div>
                <h1>Faisalabad Institute of cardiology</h1>

                <p>©2016 All Rights Reserved.</p>
              </div>
            </div>
          </form>
          <!-- form -->
        </section>
        <!-- content -->
      </div>

    </div>
  </div>

</body>

</html>
<?php
}
?>
