<?php
include_once('admin-includes.php');

if(isset($_GET['action']) && $_GET['action'] == 'delete')
{
    $pg = $_GET['page'];
    $id = $_GET['id'];
    $del = "delete from tender where id='$id' ";
    if(mysql_query($del))
    {
       $message.='pd';
    }
    else{
        echo mysql_error();
        $message.='pnd';
    }
    header('Location:admin-tender.php?message='.$message.'&page='.$pg);
}

//published
if(isset($_GET['action']) && $_GET['action']=='publish')
{
    $pg = $_GET['page'];
    $p = '1';
    $id = $_GET['id'];
    $update_p = "update tender set publish_status='$p' where id='$id' ";
	$run_update = mysql_query($update_p);
    if($run_update){
	$message.='pp';
    }
	else{
	  $message.='ppe';   
	}
	header('Location:admin-tender.php?message='.$message.'&page='.$pg);	
}
//unpublished
if(isset($_GET['action']) && $_GET['action']=='unpublish')
{
    $pg = $_GET['page'];
    
        $p = '0';
        $id = $_GET['id'];
        $update_unp = "update tender set publish_status='$p' where id='$id' ";
    	$update_run = mysql_query($update_unp);
        
        if($update_run){
            
            $message.='pup';
        }
        
    	else{
    		$message = 'pupe';
    	
    	}
	header('Location:admin-tender.php?message='.$message.'&page='.$pg);	
}

if(isset($_GET['action']) && $_GET['action'] == 'updated' ){
    
    $pg = $_GET['page'];
    $id = $_GET['id'];
    $item_description = $_POST['item_description'];
    $free = $_POST['free'];
    $cdr = $_POST['cdr'];
    $st_adv_date = $_POST['st_adv_date'];
    $last_adv_date = $_POST['last_adv_date'];
             
    $update = "update tender set item_description='$item_description',free='$free',cdr='$cdr',st_adv_date='$st_adv_date',last_adv_date='$last_adv_date' where id='$id'";
    $run = mysql_query($update);
    if($run){
        header("location:admin-tender.php?action=tu&page=$pg");
    }else{
        echo mysql_error();
        header("location:admin-tender.php?action=tnu&page=$pg");
        
    
    }
  
   }
  if(isset($_GET['att']) && $_GET['att'] == 'up' ){
    
    $id = $_GET['id'];
if (isset ( $_FILES['att_file'] ) ) {

    $file_size = $_FILES['att_file']['size'];
    $file_type = $_FILES['att_file']['type'];

    if (($file_size > 10485760)){      
        $sizefi = 'n';
    }
    elseif (  
        ($file_type != "application/pdf") &&
        ($file_type != "application/doc") &&
        ($file_type != "application/docx") &&
        ($file_type != "application/xlsx") &&
        ($file_type != "application/xls") &&
        ($file_type != "application/zip") &&
        ($file_type != "text/plain") &&
        ($file_type != "image/jpeg") &&
        ($file_type != "image/jpg") &&
        ($file_type != "image/gif") &&
        ($file_type != "image/png")    
    ){
         $exfi = 'n';       
    }    
    else {
        $img_nm = rand(1,1000).$_FILES["att_file"] ['name'];
        move_uploaded_file($_FILES["att_file"] ['tmp_name'],'files/'.$img_nm);
    }

}
    
    $att_file = $img_nm;
    
    if($att_file == ''){
     
    }else{
       $update_att = "update tender set att_file='$att_file' where id='$id' ";
       $run_att = mysql_query($update_att);
       if($run_att){
        
       } else{
        
       }
    }
  }
   
  


?>