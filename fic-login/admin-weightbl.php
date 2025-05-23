<?php
include_once('admin-includes.php');


if(isset($_GET['action']) && $_GET['action'] == 'delete')
{   
    $pg = $_GET['page'];
    $id = $_GET['id'];
    $del = "delete from weight where id='$id' ";
    if(mysql_query($del))
    {
       $message.='pd';
    }
    else{
        echo mysql_error();
        $message.='pnd';
    }
    header('Location:admin-weight.php?message='.$message.'&page='.$pg);
}

//published
if(isset($_GET['action']) && $_GET['action']=='publish')
{
    $pg = $_GET['page'];
    $p = '1';
    $id = $_GET['id'];
    $update_p = "update weight set publish_status='$p' where id='$id' ";
	$run_update = mysql_query($update_p);
    if($run_update){
	$message.='pp';
    }
	else{
	  $message.='ppe';   
	}
	header('Location:admin-weight.php?message='.$message.'&page='.$pg);	
}
//unpublished
if(isset($_GET['action']) && $_GET['action']=='unpublish')
{
        $pg = $_GET['page'];
        $p = '0';
        $id = $_GET['id'];
        $update_unp = "update weight set publish_status='$p' where id='$id' ";
    	$update_run = mysql_query($update_unp);
        
        if($update_run){
            
            $message.='pup';
        }
        
    	else{
    		$message = 'pupe';
    	
    	}
	header('Location:admin-weight.php?message='.$message.'&page='.$pg);	
}

if(isset($_GET['action']) && $_GET['action'] == 'updated' ){
    
    $pg = $_GET['page'];
    $id = $_GET['id'];
    $content_w = mysql_real_escape_string($_POST['content_w']);
    $title_w = $_POST['title_w'];
    $line_w = $_POST['line_w'];
    $pg_wa = str_replace(' ','-',$title_w);
    $pg_waw = str_replace('&','and',$pg_wa);
    $pg_w = strtolower($pg_waw.'-w');
    
             
    $update = "update weight set title_w='$title_w',content_w='$content_w',line_w='$line_w',pg_w='$pg_w' where id='$id'";
    $run = mysql_query($update);
    if($run){
        header("location:admin-weight.php?action=ru&page=$pg");
    }else{
        echo mysql_error();
        header("location:admin-weight.php?action=rnu&page=$pg");
        
    
    }
  
   } 
   
   
  if(isset($_GET['att']) && $_GET['att'] == 'up' ){
    
    $id = $_GET['id'];
       if (isset ( $_FILES['image_w'] ) ) {

    $file_size = $_FILES['image_w']['size'];
    $file_type = $_FILES['image_w']['type'];

    if (($file_size > 10485760)){      
        $sizefi = 'n';
    }
    elseif (  
        ($file_type != "image/jpeg") &&
        ($file_type != "image/jpg") &&
        ($file_type != "image/gif") &&
        ($file_type != "image/png")    
    ){
         $exfi = 'n';       
    }    
    else {
        $img_nm = $_FILES["image_w"] ['name'];
        move_uploaded_file($_FILES["image_w"] ['tmp_name'],'images/'.$img_nm);
    }

}
    
    $att_file = $img_nm;
    
    if($att_file == ''){
     
    }else{
       $update_att = "update weight set image_w='$att_file' where id='$id' ";
       $run_att = mysql_query($update_att);
       if($run_att){
        
       } else{
        
       }
    }
  }

?>