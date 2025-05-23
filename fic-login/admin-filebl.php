<?php
include_once('admin-includes.php');


if(isset($_GET['action']) && $_GET['action'] == 'delete')
{
    $cat = $_GET['cat'];
    $pg = $_GET['page'];
    $id = $_GET['id'];
    $del = "delete from file where id='$id' ";
    if(mysql_query($del))
    {
       $message.='pd';
    }
    else{
        echo mysql_error();
        $message.='pnd';
    }
    header('Location:admin-file.php?cat='.$cat.'&page='.$pg.'&message='.$message);
}


if(isset($_GET['action']) && $_GET['action'] == 'delete-cate')
{
    $cat = $_GET['cat'];
    $id = $_GET['id'];
    $del = "delete from file_category where id='$id' ";
    if(mysql_query($del))
    {
       $message.='pd';
    }
    else{
        echo mysql_error();
        $message.='pnd';
    }
    header('Location:admin-file-cate.php?cat='.$cat.'&page='.$pg.'&message='.$message);
}

//published
if(isset($_GET['action']) && $_GET['action']=='publish')
{   
    $cat = $_GET['cat'];
    $pg = $_GET['page'];
    $p = '1';
    $id = $_GET['id'];
    $update_p = "update file set publish_status='$p' where id='$id' ";
	$run_update = mysql_query($update_p);
    if($run_update){
	$message.='pp';
    }
	else{
	  $message.='ppe';   
	}
	header('Location:admin-file.php?cat='.$cat.'&page='.$pg.'&message='.$message);	
}
//unpublished
if(isset($_GET['action']) && $_GET['action']=='unpublish')
{
        $cat = $_GET['cat'];
        $pg = $_GET['page'];
        $p = '0';
        $id = $_GET['id'];
        $update_unp = "update file set publish_status='$p' where id='$id' ";
    	$update_run = mysql_query($update_unp);
        
        if($update_run){
            
            $message.='pup';
        }
        
    	else{
    		$message = 'pupe';
    	
    	}
	header('Location:admin-file.php?cat='.$cat.'&page='.$pg.'&message='.$message);	
}

if(isset($_GET['action']) && $_GET['action'] == 'updated' ){
    
    $cat = $_GET['cat'];
    $pg = $_GET['page'];
    $id = $_GET['id'];
    $file_title = $_POST['file_title'];
    $file_der = $_POST['file_der'];
    $file_cate = $_POST['file_cate'];
    
    $update = "update file set file_title='$file_title',file_der='$file_der',file_cate='$file_cate'  where id='$id'";
    $run = mysql_query($update);
    if($run){
        header("location:admin-file.php?cat=$cat&page=$pg&action=ru");
    }else{
        echo mysql_error();
        header("location:admin-file.php?cat=$cat&page=$pg&action=rnu");
        
    
    }
  
   }
   
   if(isset($_GET['att']) && $_GET['att'] == 'up' ){
    
    $cat = $_GET['cat'];
    $pg = $_GET['page'];
    $id = $_GET['id'];
    
    if (isset ( $_FILES['file_att'] ) ) {

    $file_size = $_FILES['file_att']['size'];
    $file_type = $_FILES['file_att']['type'];

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
        $img_nm = $_FILES["file_att"] ['name'];
        move_uploaded_file($_FILES["file_att"] ['tmp_name'],'files/'.$img_nm);
    }

}
    
    $att_file = $img_nm;
    
    if($att_file == ''){
     
    }else{
       $update_att = "update file set file_att='$att_file' where id='$id' ";
       $run_att = mysql_query($update_att);
       if($run_att){
        
       } else{
          
       }
    }
  }
  
  
  if(isset($_GET['action']) && $_GET['action'] == 'add' ){
    
    $file_cate = $_POST['file_cate'];
    $file_ord = $_POST['file_ord'];
    
    if($file_cate == '' || $file_ord == ''){
        
        header("location:admin-file-add-cate.php?page=$pg&action=rus");
        echo mysql_error();
    }else{
            
    $ins = "insert into file_category (file_cate,file_ord) values('$file_cate','$file_ord')";
    $run = mysql_query($ins);
    if($run){
        header("location:admin-file-cate.php?page=$pg&action=rs");
    }else{
        header("location:admin-file-add-cate.php?page=$pg&action=rus");
        echo mysql_error();
    
    }
  
   } 

}

if(isset($_GET['action']) && $_GET['action'] == 'update-cate' ){
    
    $id = $_GET['id'];
    $file_cate = $_POST['file_cate'];
    $file_ord = $_POST['file_ord'];
    
    $update = "update file_category set file_cate='$file_cate',file_ord='$file_ord'  where id='$id'";
    $run = mysql_query($update);
    if($run){
        header("location:admin-file-cate.php?page=&action=ru");
    }else{
        echo mysql_error();
        header("location:admin-file-cate.php?page=&action=rnu");
        
    
    }
  
   }
    


?>