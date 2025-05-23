<?php
include_once('admin-includes.php');


if(isset($_GET['action']) && $_GET['action'] == 'save' ){

    $pg = $_GET['page'];
    $user_n = $_POST['user_n'];
    $name_n = $_POST['name_n'];
    $pass_n = md5($_POST['pass_n']);
    $u_option = json_encode($_POST['u_option']);
    
    if($user_n == '' || $pass_n == ''){
        
        header("location:admin-users-add.php?page=$pg&action=rusar");
        echo mysql_error();
    }else{
        
    $sele = mysql_query("select * from users where user_n='$user_n'");
    $check = mysql_fetch_array($sele);
    if($check){
        
        header("location:admin-users-add.php?page=$pg&action=sun");
    }else{
        
         $ins = "insert into users (name_n,user_n,pass_n,u_option) values('$name_n','$user_n','$pass_n','$u_option')";
    $run = mysql_query($ins);
    if($run){
        header("location:admin-siteuser.php?page=$pg&action=rs");
    }else{
        header("location:admin-users-add.php?page=$pg&action=rus");
        echo mysql_error();
    
    }
        
    }
            
   
  
   } 

}
    


?>