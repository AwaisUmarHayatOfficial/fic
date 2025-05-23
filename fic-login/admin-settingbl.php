<?php
include_once('admin-includes.php');


if(isset($_GET['action']) && $_GET['action'] == 'delete')
{
    $pg = $_GET['page'];
    $id = $_GET['id'];
    $del = "delete from sidemenu where id='$id' ";
    if(mysql_query($del))
    {
       $message.='pd';
    }
    else{
        echo mysql_error();
        $message.='pnd';
    }
    header('Location:admin-set-sidemenu.php?page='.$pg.'&message='.$message);
}


if(isset($_GET['action']) && $_GET['action'] == 'dep-delete')
{
    $pg = $_GET['page'];
    $id = $_GET['id'];
    $del = "delete from department where id='$id' ";
    if(mysql_query($del))
    {
       $message.='pd';
    }
    else{
        echo mysql_error();
        $message.='pnd';
    }
    header('Location:admin-dep-faculity.php?page='.$pg.'&message='.$message);
}


if(isset($_GET['action']) && $_GET['action'] == 'dep-save' ){
    
    $department = $_POST['department'];
    $order_d = $_POST['order_d'];
    
    $update = "insert into department (department,order_d) values('$department','$order_d')";
    $run = mysql_query($update);
    if($run){
        header("location:admin-dep-faculity.php?page=$pg&action=rs");
    }else{
        echo mysql_error();
        header("location:admin-dep-faculity.php?page=$pg&action=rns");
        
    
    }
  
   }

//published
if(isset($_GET['action']) && $_GET['action']=='cp-publish')
{   
    $pg = $_GET['page'];
    $p = '1';
    $id = $_GET['id'];
    $update_p = "update copyright set publish_status='$p' where id='$id' ";
	$run_update = mysql_query($update_p);
    if($run_update){
	$message.='pp';
    }
	else{
	  $message.='ppe';   
	}
	header('Location:admin-settings.php?page='.$pg.'&message='.$message);	
}
//unpublished
if(isset($_GET['action']) && $_GET['action']=='cp-unpublish')
{
        $pg = $_GET['page'];
        $p = '0';
        $id = $_GET['id'];
        $update_unp = "update copyright set publish_status='$p' where id='$id' ";
    	$update_run = mysql_query($update_unp);
        
        if($update_run){
            
            $message.='pup';
        }
        
    	else{
    		$message = 'pupe';
    	
    	}
	header('Location:admin-settings.php?page='.$pg.'&message='.$message);	
}

//published
if(isset($_GET['action']) && $_GET['action']=='ph-publish')
{   
    $pg = $_GET['page'];
    $p = '1';
    $id = $_GET['id'];
    $update_p = "update phone set publish_status='$p' where id='$id' ";
	$run_update = mysql_query($update_p);
    if($run_update){
	$message.='pp';
    }
	else{
	  $message.='ppe';   
	}
	header('Location:admin-phone.php?page='.$pg.'&message='.$message);	
}
//unpublished
if(isset($_GET['action']) && $_GET['action']=='ph-unpublish')
{
        $pg = $_GET['page'];
        $p = '0';
        $id = $_GET['id'];
        $update_unp = "update phone set publish_status='$p' where id='$id' ";
    	$update_run = mysql_query($update_unp);
        
        if($update_run){
            
            $message.='pup';
        }
        
    	else{
    		$message = 'pupe';
    	
    	}
	header('Location:admin-phone.php?page='.$pg.'&message='.$message);	
}

//published
if(isset($_GET['action']) && $_GET['action']=='sw-publish')
{   
    $pg = $_GET['page'];
    $p = '1';
    $id = $_GET['id'];
    $update_p = "update sideweight set publish_status='$p' where id='$id' ";
	$run_update = mysql_query($update_p);
    if($run_update){
	$message.='pp';
    }
	else{
	  $message.='ppe';   
	}
	header('Location:admin-set-sideweight.php?page='.$pg.'&message='.$message);	
}
//unpublished
if(isset($_GET['action']) && $_GET['action']=='sw-unpublish')
{
        $pg = $_GET['page'];
        $p = '0';
        $id = $_GET['id'];
        $update_unp = "update sideweight set publish_status='$p' where id='$id' ";
    	$update_run = mysql_query($update_unp);
        
        if($update_run){
            
            $message.='pup';
        }
        
    	else{
    		$message = 'pupe';
    	
    	}
	header('Location:admin-set-sideweight.php?page='.$pg.'&message='.$message);	
}

//published
if(isset($_GET['action']) && $_GET['action']=='sm-publish')
{   
    $pg = $_GET['page'];
    $p = '1';
    $id = $_GET['id'];
    $update_p = "update sidemenu set publish_status='$p' where id='$id' ";
	$run_update = mysql_query($update_p);
    if($run_update){
	$message.='pp';
    }
	else{
	  $message.='ppe';   
	}
	header('Location:admin-set-sidemenu.php?page='.$pg.'&message='.$message);	
}
//unpublished
if(isset($_GET['action']) && $_GET['action']=='sm-unpublish')
{
        $pg = $_GET['page'];
        $p = '0';
        $id = $_GET['id'];
        $update_unp = "update sidemenu set publish_status='$p' where id='$id' ";
    	$update_run = mysql_query($update_unp);
        
        if($update_run){
            
            $message.='pup';
        }
        
    	else{
    		$message = 'pupe';
    	
    	}
	header('Location:admin-set-sidemenu.php?page='.$pg.'&message='.$message);	
}

if(isset($_GET['action']) && $_GET['action'] == 'cp-update' ){
    
    $text_c = mysql_real_escape_string($_POST['text_c']);

    $update = "update copyright set text_c='$text_c' where id=1 ";
    $run = mysql_query($update);
    if($run){
        header("location:admin-settings.php?page=$pg&action=ru");
    }else{
        echo mysql_error();
        header("location:admin-settings.php?page=$pg&action=rnu");
        
    
    }
  
   }
   
if(isset($_GET['action']) && $_GET['action'] == 'dep-update' ){
    
    $id = $_GET['id'];
    $department = $_POST['department'];
    $order_d = $_POST['order_d'];

    $update = "update department set department='$department',order_d='$order_d' where id='$id' ";
    $run = mysql_query($update);
    if($run){
        header("location:admin-dep-faculity.php?page=$pg&action=ru");
    }else{
        echo mysql_error();
        header("location:admin-dep-faculity.php?page=$pg&action=rnu");
        
    
    }
  
   }

if(isset($_GET['action']) && $_GET['action'] == 'ph-update' ){
    
    $phone_s = $_POST['phone_s'];

    $update = "update phone set phone_s='$phone_s' where id=1 ";
    $run = mysql_query($update);
    if($run){
        header("location:admin-phone.php?page=$pg&action=ru");
    }else{
        echo mysql_error();
        header("location:admin-phone.php?page=$pg&action=rnu");
        
    
    }
  
   }

if(isset($_GET['action']) && $_GET['action'] == 'sm-update' ){
    
    $id = $_GET['id'];
    $menu_n = $_POST['title_bn'];
    $link_sws = str_replace(' ','-',$menu_n);
    $link_sw = strtolower('breaking-news-'.$link_sws);
    $date_bn = $_POST['date_bn'];
    $content_bn = mysql_real_escape_string($_POST['content_bn']);

    $update = "update sidemenu set title_bn='$menu_n',link_sw='$link_sw',date_bn='$date_bn',content_bn='$content_bn' where id='$id' ";
    $run = mysql_query($update);
    if($run){
        header("location:admin-set-sidemenu.php?page=$pg&action=ru");
    }else{
        echo mysql_error();
        header("location:admin-set-sidemenu.php?page=$pg&action=rnu");
        
    
    }
  
   }

if(isset($_GET['action']) && $_GET['action'] == 'sm-save' ){
    
    $menu_n = $_POST['menu_n'];
    $link_sws = str_replace(' ','-',$menu_n);
    $link_sw = strtolower($link_sws);

    $update = "insert into sidemenu (menu_n,link_sw) values('$menu_n','$link_sw')";
    $run = mysql_query($update);
    if($run){
        header("location:admin-set-sidemenu.php?page=$pg&action=rs");
    }else{
        echo mysql_error();
        header("location:admin-set-sidemenu.php?page=$pg&action=rns");
        
    
    }
  
   }

if(isset($_GET['action']) && $_GET['action'] == 'sw-update' ){
    
    $id = $_GET['id'];
    $heading = $_POST['heading'];
    $content = mysql_real_escape_string($_POST['content']);
    $btn_lto = str_replace(' ','-',$_POST['btn_l']);
    $btn_l = strtolower($btn_lto);
    
    $btn_n = $_POST['btn_n'];

    $update = "update sideweight set heading='$heading',content='$content',btn_n='$btn_n',btn_l='$btn_l' where id='$id' ";
    $run = mysql_query($update);
    if($run){
        header("location:admin-set-sideweight.php?page=$pg&action=ru");
    }else{
        echo mysql_error();
       header("location:admin-set-sideweight.php?page=$pg&action=rnu");
        
    
    }
  
   }
   
 if(isset($_GET['att']) && $_GET['att'] == 'up' ){
    
    $id = $_GET['id'];
    
 if (isset ( $_FILES['image_sw'] ) ) {

    $file_size = $_FILES['image_sw']['size'];
    $file_type = $_FILES['image_sw']['type'];

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
        $img_nm = $_FILES["image_sw"] ['name'];
        move_uploaded_file($_FILES["image_sw"] ['tmp_name'],'images/'.$img_nm);
    }

}
    
    
    $att_file = $img_nm;
    
    if($att_file == ''){
     
    }else{
       $update_att = "update sideweight set image_sw='$att_file' where id='$id' ";
       $run_att = mysql_query($update_att);
       if($run_att){
        
       } else{
        
       }
    }
  }
    

?>