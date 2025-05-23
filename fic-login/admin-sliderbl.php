<?php
include_once('admin-includes.php');

if(isset($_GET['action']) && $_GET['action'] == 'delete')
{
    $id = $_GET['id'];
    $del = "delete from slider where id='$id' ";
    if(mysql_query($del)) 
    {
       $message.='pd';
    }
    else{
        echo mysql_error();
        $message.='pnd';
    }
    header('Location:admin-slider.php?message='.$message);
}

//published
if(isset($_GET['action']) && $_GET['action']=='publish')
{
    $p = '1';
    $id = $_GET['id'];
    $update_p = "update slider set publish_status='$p' where id='$id' ";
	$run_update = mysql_query($update_p);
    if($run_update){
	$message.='pp';
    }
	else{
	  $message.='ppe';   
	}
	header('Location:admin-slider.php?message='.$message);	
}
//unpublished
if(isset($_GET['action']) && $_GET['action']=='unpublish')
{
    
        $p = '0';
        $id = $_GET['id'];
        $update_unp = "update slider set publish_status='$p' where id='$id' ";
    	$update_run = mysql_query($update_unp);
        
        if($update_run){
            
            $message.='pup';
        }
        
    	else{
    		$message = 'pupe';
    	
    	}
	header('Location:admin-slider.php?message='.$message);	
}


if(isset($_GET['action']) && $_GET['action'] == 'updated' ){
    

    $id = $_GET['id'];
    $order_s = $_POST['order_s'];
             
    $update = "update slider set order_s='$order_s' where id='$id' ";
    $run = mysql_query($update);
    if($run){
        header("location:admin-slider.php?action=tu&page=$pg");
    }else{
        echo mysql_error();
        header("location:admin-slider.php?action=tnu&page=$pg");
        
    
    }
  
   }
  if(isset($_GET['att']) && $_GET['att'] == 'up' ){
    
    $id = $_GET['id'];
       if (isset ( $_FILES['slide'] ) ) {

    $file_size = $_FILES['slide']['size'];
    $file_type = $_FILES['slide']['type'];

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
        $img_nm = $_FILES["slide"] ['name'];
        move_uploaded_file($_FILES["slide"] ['tmp_name'],'images/'.$img_nm);
    }

}
    
    $att_file = $img_nm;
    
    if($att_file == ''){
     
    }else{
       $update_att = "update slider set slide='$att_file' where id='$id' ";
       $run_att = mysql_query($update_att);
       if($run_att){
        
       } else{
        
       }
    }
  }



?>