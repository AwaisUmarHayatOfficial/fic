<?php
include_once('admin-includes.php');


if(isset($_GET['action']) && $_GET['action'] == 'delete')
{
    $pg = $_GET['page'];
    $id = $_GET['id'];
    $del = "delete from pages where id='$id' ";
    if(mysql_query($del))
    {
       $message.='pd';
    }
    else{
        echo mysql_error();
        $message.='pnd';
    }
    header('Location:admin-pages.php?message='.$message.'&page='.$pg);
}

//published
if(isset($_GET['action']) && $_GET['action']=='publish')
{
    $pg = $_GET['page'];
    $p = '1';
    $id = $_GET['id'];
    $update_p = "update pages set publish_status='$p' where id='$id' ";
	$run_update = mysql_query($update_p);
    if($run_update){
	$message.='pp';
    }
	else{
	  $message.='ppe';   
	}
	header('Location:admin-pages.php?message='.$message.'&page='.$pg);	
}
//unpublished
if(isset($_GET['action']) && $_GET['action']=='unpublish')
{
        $pg = $_GET['page'];
        $p = '0';
        $id = $_GET['id'];
        $update_unp = "update pages set publish_status='$p' where id='$id' ";
    	$update_run = mysql_query($update_unp);
        
        if($update_run){
            
            $message.='pup';
        }
        
    	else{
    		$message = 'pupe';
    	
    	}
	header('Location:admin-pages.php?message='.$message.'&page='.$pg);	
}

if(isset($_GET['action']) && $_GET['action'] == 'updated' ){
    
    $pg = $_GET['page'];
    $id = $_GET['id'];
    $title = $_POST['title'];
     $pga = str_replace(' ','-',$title);
     $paga = str_replace('.','-',$pga);
     $paaga = str_replace('?','s',$paga);
     $paagaa = str_replace('&','and',$paaga);
     $pgs = strtolower($paagaa);
    $content = mysql_real_escape_string($_POST['content']);
    
    $update = "update pages set title='$title',content='$content',pg='$pgs' where id='$id'";
    $run = mysql_query($update);
    if($run){
        header("location:admin-pages.php?action=ru&page=$pg");
    }else{
        echo mysql_error();
        header("location:admin-pages.php?action=rnu&page=$pg");
        
    
    }
  
   }
   
    


?>