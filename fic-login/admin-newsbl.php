<?php
include_once('admin-includes.php');


if(isset($_GET['action']) && $_GET['action'] == 'delete')
{   
    $pg = $_GET['page'];
    $id = $_GET['id'];
    $del = "delete from news where id='$id' ";
    if(mysql_query($del))
    {
       $message.='pd';
    }
    else{
        echo mysql_error();
        $message.='pnd';
    }
    header('Location:admin-news.php?message='.$message.'&page='.$pg);
}

//published
if(isset($_GET['action']) && $_GET['action']=='publish')
{
    $pg = $_GET['page'];
    $p = '1';
    $id = $_GET['id'];
    $update_p = "update news set publish_status='$p' where id='$id' ";
	$run_update = mysql_query($update_p);
    if($run_update){
	$message.='pp';
    }
	else{
	  $message.='ppe';   
	}
	header('Location:admin-news.php?message='.$message.'&page='.$pg);	
}
//unpublished
if(isset($_GET['action']) && $_GET['action']=='unpublish')
{
        $pg = $_GET['page'];
        $p = '0';
        $id = $_GET['id'];
        $update_unp = "update news set publish_status='$p' where id='$id' ";
    	$update_run = mysql_query($update_unp);
        
        if($update_run){
            
            $message.='pup';
        }
        
    	else{
    		$message = 'pupe';
    	
    	}
	header('Location:admin-news.php?message='.$message.'&page='.$pg);	
}

if(isset($_GET['action']) && $_GET['action'] == 'updated' ){
    
    $pg = $_GET['page'];
    $id = $_GET['id'];
    $description = mysql_real_escape_string($_POST['description']);
    $dated = date_create($_POST['date']);
    $date = date_format($dated,"y-m-d");
    $title = $_POST['title'];
    $link = str_replace(' ', '-', $title);
    $link = str_replace('/', '-', $link);
    $link = strtolower($link);
    $link = 'news-'.$link;
             
    $update = "update news set title='$title',date='$date',description='$description',news_link='$link' where id='$id'";
    $run = mysql_query($update);
    if($run){
        header("location:admin-news.php?action=ru&page=$pg");
    }else{
        echo mysql_error();
        header("location:admin-news.php?action=rnu&page=$pg");
        
    
    }
  
   } 
   
   


?>