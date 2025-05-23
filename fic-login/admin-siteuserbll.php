<?php
include_once('admin-includes.php');


if(isset($_GET['action']) && $_GET['action'] == 'delete')
{
    $pg = $_GET['page'];
    $id = $_GET['id'];
    $del = "delete from users where id='$id' ";
    if(mysql_query($del))
    {
       $message.='pd';
    }
    else{
        echo mysql_error();
        $message.='pnd';
    }
    header('Location:admin-siteuser.php?page='.$pg.'&message='.$message);
}

//published
if(isset($_GET['action']) && $_GET['action']=='publish')
{
    $pg = $_GET['page'];
    $p = '1';
    $id = $_GET['id'];
    $update_p = "update users set publish_status='$p' where id='$id' ";
	$run_update = mysql_query($update_p);
    if($run_update){
	$message.='pp';
    }
	else{
	  $message.='ppe';   
	}
	header('Location:admin-siteuser.php?page='.$pg.'&message='.$message);	
}
//unpublished
if(isset($_GET['action']) && $_GET['action']=='unpublish')
{
        $pg = $_GET['page'];
        $p = '0';
        $id = $_GET['id'];
        $update_unp = "update users set publish_status='$p' where id='$id' ";
    	$update_run = mysql_query($update_unp);
        
        if($update_run){
            
            $message.='pup';
        }
        
    	else{
    		$message = 'pupe';
    	
    	}
	header('Location:admin-siteuser.php?page='.$pg.'&message='.$message);	
}

if(isset($_GET['action']) && $_GET['action'] == 'updated' ){
    
    $pg = $_GET['page'];
    $id = $_GET['id'];
    $name_n = $_POST['name_n'];
    $u_option = json_encode($_POST['u_option']);
    
    if($name_n == ''){
        
        header("location:admin-users-update.php?page=$pg&action=rusar");
        
    }else{
        
    $update = "update users set name_n='$name_n',u_option='$u_option'  where id='$id'";
    $run = mysql_query($update);
    if($run){
        header("location:admin-siteuser.php?page=$pg&action=ru");
    }else{
        echo mysql_error();
        header("location:admin-siteuser.php?page=$pg&action=rnu");

    }
 
   }
  }
  
  
  


if(isset($_GET['action']) && $_GET['action'] == 'change' ){
    
    $pg = $_GET['page'];
    $id = $_GET['id'];
    $new_pass = md5($_POST['new_pass']);
    $cf_pass = md5($_POST['cf_pass']);
    

        if($new_pass == $cf_pass){
            
             $new = 'pm';
             
            $update = "update users set pass_n='$new_pass' where id='$id' ";
            $run = mysql_query($update);
            if($update){
                
                $newu = 'npiu';
                $page = 'siteuser';
                
            }else{
                $newu = 'npinu';
            }
            
             
        }else{
            
             $new = 'pnm';
             $page = 'user-pass';
        }
        
  
    header('location:admin-'.$page.'.php?action='.$new.$newu.'&page='.$pg);
    
}
if(isset($_GET['action']) && $_GET['action'] == 'user_ch' ){
    
    $pg = $_GET['page'];
    $user = $_GET['id'];
    $old_pass = md5($_POST['old_pass']);
    $new_pass = md5($_POST['new_pass']);
    $cf_pass = md5($_POST['cf_pass']);
    
    $check = "select * from users where pass_n='$old_pass'";
    $qry = mysql_query($check);
    $ma = mysql_fetch_array($qry);
    if($ma){
        
         $old = 'opio';
        
        if($new_pass == $cf_pass){
            
             $new = 'ps';
            $update = "update users set pass_n='$new_pass' where user_n='$user' ";
            $run = mysql_query($update);
            if($update){
                
                $newu = 'npiu';
                
            }else{
                $newu = 'npinu';
            }
             
        }else{
            
             $new = 'pns';
        }
        
    }else{
     
       $old = 'opiw';
        
    }
    header('location:admin-user-pass.php?action='.$old.$new.$newu.'&page='.$pg);
    
}



?>