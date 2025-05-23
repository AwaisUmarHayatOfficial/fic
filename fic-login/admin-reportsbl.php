<?php
include_once('admin-includes.php');


if(isset($_GET['action']) && $_GET['action'] == 'delete')
{
    $pg = $_GET['page'];
    $id = $_GET['id'];
    $del = "delete from report where id='$id' ";
    if(mysql_query($del))
    {
       $message.='pd';
    }
    else{
        echo mysql_error();
        $message.='pnd';
    }
    header('Location:admin-reports.php?message='.$message.'&page='.$pg);
}

//published
if(isset($_GET['action']) && $_GET['action']=='publish')
{
    $pg = $_GET['page'];
    $p = '1';
    $id = $_GET['id'];
    $update_p = "update report set publish_status='$p' where id='$id' ";
	$run_update = mysql_query($update_p);
    if($run_update){
	$message.='pp';
    }
	else{
	  $message.='ppe';   
	}
	header('Location:admin-reports.php?message='.$message.'&page='.$pg);	
}
//unpublished
if(isset($_GET['action']) && $_GET['action']=='unpublish')
{
        $pg = $_GET['page'];
        $p = '0';
        $id = $_GET['id'];
        $update_unp = "update report set publish_status='$p' where id='$id' ";
    	$update_run = mysql_query($update_unp);
        
        if($update_run){
            
            $message.='pup';
        }
        
    	else{
    		$message = 'pupe';
    	
    	}
	header('Location:admin-reports.php?message='.$message.'&page='.$pg);	
}

if(isset($_GET['action']) && $_GET['action'] == 'updated' ){
    
    $pg = $_GET['page'];
    $id = $_GET['id'];
    $report_title = $_POST['report_title'];
    $st_date = $_POST['st_date'];
    $last_date = $_POST['last_date'];
    
    $update = "update report set report_title='$report_title',st_date='$st_date',last_date='$last_date'  where id='$id'";
    $run = mysql_query($update);
    if($run){
        header("location:admin-reports.php?action=ru&page=$pg");
    }else{
        echo mysql_error();
        header("location:admin-reports.php?action=rnu&page=$pg");
        
    
    }
  
   }
   
   if(isset($_GET['att']) && $_GET['att'] == 'up' ){
    
    $id = $_GET['id'];
       if (isset ( $_FILES['file_link'] ) ) {

    $file_size = $_FILES['file_link']['size'];
    $file_type = $_FILES['file_link']['type'];

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
        $img_nm = $_FILES["file_link"] ['name'];
        move_uploaded_file($_FILES["file_link"] ['tmp_name'],'files/'.$img_nm);
    }

}
    
    
    $att_file = $img_nm;
    
    if($att_file == ''){
     
    }else{
       $update_att = "update report set file_link='$att_file' where id='$id' ";
       $run_att = mysql_query($update_att);
       if($run_att){
        
       } else{
        
       }
    }
  }
    


?>