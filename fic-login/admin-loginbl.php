<?php
include_once('admin-includes.php');


if(isset($_GET['action']) && $_GET['action'] == 'login'){
    
    $user = $_POST['user'];
    $pass = md5($_POST['pass']);
    
     
    
    if($pass == '' || $user == ''){
        $massage.= 'Please fill the requird fields';
        header("location:admin-login.php?action=$massage");
    }else{
        
        $adminCheck = mysql_query("select * from admin where user='$user' ");
        $adminCheck_arr = mysql_fetch_array($adminCheck);
        if($adminCheck_arr){
          
        $umatch = mysql_query("select * from admin where user='$user'");
        $uarr = mysql_fetch_array($umatch);
        if($uarr){ $up.= 'um'; }else{ $up.= 'unm'; }
        
        $pmatch = mysql_query("select * from admin where pass='$pass' ");
        $parr = mysql_fetch_array($pmatch);
        
        if($parr){ $up.= 'pm'; }else{ $up.= 'pnm'; }
        
        
        $match = mysql_query("select * from admin where user='$user' and pass='$pass'  ");
        $arr = mysql_fetch_array($match);
        if($arr){ session_start(); $_SESSION['user'] = $user; $_SESSION['pass'] = $pass; 

        $page.='home'; $act.='admin-Successfully-Login'; 
        header('location: admin-home.php?action=$act&up=$up&page');
        
        }
        else{ $act.= 'Login-failed'; $page.='login'; echo mysql_error(); 
        header('location: admin-login.php?action=$act&up=$up&page');
        
        }
          
        }else{
        
        $umatch = mysql_query("select * from users where user_n='$user' and publish_status='1' ");
        $uarr = mysql_fetch_array($umatch);
        if($uarr){ $up.= 'um'; }else{ $up.= 'unm'; }
        
        $pmatch = mysql_query("select * from users where pass_n='$pass' and publish_status='1' ");
        $parr = mysql_fetch_array($pmatch);
        if($parr){ $up.= 'pm'; }else{ $up.= 'pnm'; }
        
        $match = mysql_query("select * from users where user_n='$user' and pass_n='$pass' and publish_status='1' ");
        $arr = mysql_fetch_array($match);
        if($arr){ session_start(); $_SESSION['user'] = $user; $_SESSION['pass'] = $pass; $page.='home'; $act.='user-Successfully-Login';
        header("location:admin-$page.php?action=$act&up=$up&page");
            
        }
        else{ $act.= 'Login-failed'; $page.='login'; echo mysql_error(); }
           
        header("location:admin-$page.php?action=$act&up=$up&page");
            
          }

        }
        
 } 

?>