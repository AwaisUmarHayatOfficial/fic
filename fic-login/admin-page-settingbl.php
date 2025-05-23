<?php
include_once('admin-includes.php');

if(isset($_GET['action']) && $_GET['action'] == 'ad-save'){
    
    if (isset ( $_FILES['ph_a'] ) ) {
    $file_size = $_FILES['ph_a']['size'];
    $file_type = $_FILES['ph_a']['type'];

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
        $img_nm = $_FILES["ph_a"] ['name'];
        move_uploaded_file($_FILES["ph_a"] ['tmp_name'],'images/'.$img_nm);
    }

}
    
    $name_a = mysql_real_escape_string($_POST['name_a']);
    $des_a = mysql_real_escape_string($_POST['des_a']);
    $con_a = mysql_real_escape_string($_POST['con_a']);
    $edu_a = mysql_real_escape_string($_POST['edu_a']);
    $ph_a = $img_nm;
    
    $ins = "insert into administration (name_a,des_a,con_a,edu_a,ph_a) values('$name_a','$des_a','$con_a','$edu_a','$ph_a')";
    $run = mysql_query($ins);
    if($run){
        header("location:admin-page-setting.php?action=rs&page");
    }else{
        //header("location:admin-add-administration.php?action=rus&page");
        echo mysql_error();
    }
    
}
if(isset($_GET['action']) && $_GET['action'] == 'ads-delete')
{
    $pg = $_GET['page'];
    $id = $_GET['id'];
    $del = "delete from administration where id='$id' ";
    if(mysql_query($del))
    {
       $message.='pd';
    }
    else{
        echo mysql_error();
        $message.='pnd';
    }
    header('Location:admin-page-setting.php?page='.$pg.'&message='.$message);
}

//published
if(isset($_GET['action']) && $_GET['action']=='ads-publish')
{   
    $pg = $_GET['page'];
    $p = '1';
    $id = $_GET['id'];
    $update_p = "update administration set publish_status='$p' where id='$id' ";
	$run_update = mysql_query($update_p);
    if($run_update){
	$message.='pp';
    }
	else{
	  $message.='ppe';   
	}
	header('Location:admin-page-setting.php?page='.$pg.'&message='.$message);	
}
//unpublished
if(isset($_GET['action']) && $_GET['action']=='ads-unpublish')
{
        $pg = $_GET['page'];
        $p = '0';
        $id = $_GET['id'];
        $update_unp = "update administration set publish_status='$p' where id='$id' ";
    	$update_run = mysql_query($update_unp);
        
        if($update_run){
            
            $message.='pup';
        }
        
    	else{
    		$message = 'pupe';
    	
    	}
	header('Location:admin-page-setting.php?page='.$pg.'&message='.$message);	
}


if(isset($_GET['action']) && $_GET['action'] == 'ad-update' ){
    
    $id = $_GET['id'];
    $name_a = $_POST['name_a'];
    $des_a = mysql_real_escape_string($_POST['des_a']);
    $con_a = mysql_real_escape_string($_POST['con_a']);
    $edu_a = mysql_real_escape_string($_POST['edu_a']);;

    $update = "update administration set name_a='$name_a',des_a='$des_a',con_a='$con_a',edu_a='$edu_a' where id='$id' ";
    $run = mysql_query($update);
    if($run){
        header("location:admin-page-setting.php?page=$pg&action=ru");
    }else{
        echo mysql_error();
       header("location:admin-page-setting.php?page=$pg&action=rnu");
        
    
    }
  
   }
   
 if(isset($_GET['att']) && $_GET['att'] == 'up' ){
    
    $id = $_GET['id'];
   
     if (isset ( $_FILES['ph_a'] ) ) {

    $file_size = $_FILES['ph_a']['size'];
    $file_type = $_FILES['ph_a']['type'];

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
        $img_nm = $_FILES["ph_a"] ['name'];
        move_uploaded_file($_FILES["ph_a"] ['tmp_name'],'images/'.$img_nm);
    }

}
    
    
    
    $att_file = $img_nm;
    
    if($att_file == ''){
     
    }else{
       $update_att = "update administration set ph_a='$att_file' where id='$id' ";
       $run_att = mysql_query($update_att);
       if($run_att){
        
       } else{
        
       }
    }
  }

/////


if(isset($_GET['action']) && $_GET['action'] == 'adf-save'){

    if (isset($_FILES['ph_f'] ) ) {

    $file_size = $_FILES['ph_f']['size'];
    $file_type = $_FILES['ph_f']['type'];

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
        $img_nm = $_FILES["ph_f"] ['name'];
        move_uploaded_file($_FILES["ph_f"] ['tmp_name'],'images/'.$img_nm);
    }

}
    
    $name_f = mysql_real_escape_string($_POST['name_f']);
    $des_f = mysql_real_escape_string($_POST['des_f']);
    $des_note = mysql_real_escape_string($_POST['des_note']);
    $dep_f = $_POST['dep_f'];
    $order_dep = $_POST['order_dep'];
    $ph_f = $img_nm;
    
    $ins = "insert into faculity (dep_f,name_f,des_f,ph_f,des_note,order_dep) values('$dep_f','$name_f','$des_f','$ph_f','$des_note','$order_dep')";
    $run = mysql_query($ins);
    if($run){
        header("location:admin-page-faculity.php?action=rs&page");
    }else{
        header("location:admin-add-faculity.php?action=rus&page");
        echo mysql_error();
    }
    
}

if(isset($_GET['action']) && $_GET['action'] == 'cmenu-save'){
    
    $title = $_POST['title'];
    $linkaa = str_replace(' ','-',$_POST['link']);
    $link = strtolower($linkaa);
    $mennu = $_POST['mennu'];
    $order_c = $_POST['order_c'];
    $custom_menu = 'custom';
    $publish_status = '1';
    
    $ins = "insert into pages (title,pg,menun,order_m,custom_menu,publish_status) values('$title','$link','$mennu','$order_c','$custom_menu','$publish_status')";
    $run = mysql_query($ins);
    if($run){
        header("location:admin-custom-link.php?action=rs&page");
    }else{
        header("location:admin-custom-link-ad.php?action=rus&page");
        echo mysql_error();
    }
    
}

if(isset($_GET['action']) && $_GET['action'] == 'adsf-delete')
{
    $pg = $_GET['page'];
    $id = $_GET['id'];
    $del = "delete from faculity where id='$id' ";
    if(mysql_query($del))
    {
       $message.='pd';
    }
    else{
        echo mysql_error();
        $message.='pnd';
    }
    header('Location:admin-page-faculity.php?page='.$pg.'&message='.$message);
}

if(isset($_GET['action']) && $_GET['action'] == 'mail-delete')
{
    $pg = $_GET['page'];
    $id = $_GET['id'];
    $del = "delete from feedback where id='$id' ";
    if(mysql_query($del))
    {
       $message.='pd';
    }
    else{
        echo mysql_error();
        $message.='pnd';
    }
    header('Location:admin-page-feedback.php?page='.$pg.'&message='.$message);
}

//published
if(isset($_GET['action']) && $_GET['action']=='adsf-publish')
{   
    $pg = $_GET['page'];
    $p = '1';
    $id = $_GET['id'];
    $update_p = "update faculity set publish_status='$p' where id='$id' ";
	$run_update = mysql_query($update_p);
    if($run_update){
	$message.='pp';
    }
	else{
	  $message.='ppe';   
	}
	header('Location:admin-page-faculity.php?page='.$pg.'&message='.$message);	
}
//unpublished
if(isset($_GET['action']) && $_GET['action']=='adsf-unpublish')
{
        $pg = $_GET['page'];
        $p = '0';
        $id = $_GET['id'];
        $update_unp = "update faculity set publish_status='$p' where id='$id' ";
    	$update_run = mysql_query($update_unp);
        
        if($update_run){
            
            $message.='pup';
        }
        
    	else{
    		$message = 'pupe';
    	
    	}
	header('Location:admin-page-faculity.php?page='.$pg.'&message='.$message);	
}


if(isset($_GET['action']) && $_GET['action'] == 'adf-update' ){
    
    $id = $_GET['id'];
    $name_f = $_POST['name_f'];
    $des_f = mysql_real_escape_string($_POST['des_f']);
    $dep_f = $_POST['dep_f'];
    $des_note = $_POST['des_note'];
    $order_dep = $_POST['order_dep'];

    $update = "update faculity set name_f='$name_f',des_f='$des_f',dep_f='$dep_f',order_dep='$order_dep',des_note='$des_note' where id='$id' ";
    $run = mysql_query($update);
    if($run){
        header("location:admin-page-faculity.php?page=$pg&action=ru");
    }else{
        echo mysql_error();
       header("location:admin-page-faculity.php?page=$pg&action=rnu");
        
    
    }
  
   }
   
if(isset($_GET['action']) && $_GET['action'] == 'mail-update' ){
    
    $mail_me = $_POST['mail_me'];
    
    $update = "update feedback_mail set mail_me='$mail_me' where id=1 ";
    $run = mysql_query($update);
    if($run){
        header("location:admin-page-feedback-mail.php?page=$pg&action=ru");
    }else{
        echo mysql_error();
       header("location:admin-page-feedback-mail.php?page=$pg&action=rnu");
        
    
    }
  
   }
   
if(isset($_GET['action']) && $_GET['action'] == 'menun-update' ){
    
    $id = $_GET['id'];
    $pagesa = $_GET['page'];
    $menun = $_POST['menun'];
    $order_m = $_POST['order_m'];
    
    $update = "update pages set menun='$menun',order_m='$order_m' where id='$id' ";
    $run = mysql_query($update);
    if($run){
        header("location:admin-editmenu.php?page=$pagesa&action=ru");
    }else{
        echo mysql_error();
       header("location:admin-editmenu.php?page=$pagesa&action=rnu");
        
    
    }
  
   }
if(isset($_GET['action']) && $_GET['action'] == 'cmenu-update' ){
    
    $id = $_GET['id'];
    $pagesa = $_GET['page'];
    $title = $_POST['title'];
    $linkaa = str_replace(' ','-',$_POST['link']);
    $link = strtolower($linkaa);
    $mennu = $_POST['mennu'];
    $order_c = $_POST['order_c'];
    
    $update = "update pages set title='$title',pg='$link',menun='$mennu',order_m='$order_c' where id='$id' ";
    $run = mysql_query($update);
    if($run){
        header("location:admin-custom-link.php?page=$pagesa&action=ru");
    }else{
        echo mysql_error();
       header("location:admin-custom-link.php?page=$pagesa&action=rnu");
        
    
    }
  
   }
   
 if(isset($_GET['att']) && $_GET['att'] == 'up' ){
    
    $id = $_GET['id'];
 if (isset ( $_FILES['ph_f'] ) ) {

    $file_size = $_FILES['ph_f']['size'];
    $file_type = $_FILES['ph_f']['type'];

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
        $img_nm = $_FILES["ph_f"] ['name'];
        move_uploaded_file($_FILES["ph_f"] ['tmp_name'],'images/'.$img_nm);
    }

}
    
    
    
    $att_file = $img_nm;
    
    if($att_file == ''){
     
    }else{
       $update_att = "update faculity set ph_f='$att_file' where id='$id' ";
       $run_att = mysql_query($update_att);
       if($run_att){
        
       } else{
        
       }
    }
  }


?>