<?php
include_once('admin-includes.php');


if(isset($_GET['action']) && $_GET['action'] == 'save' ){
    
     $title = $_POST['title'];
     $pga = str_replace(' ','-',$title);
     $paga = str_replace('.','-',$pga);
     $paaga = str_replace('?','s',$paga);
     $paagaa = str_replace('&','and',$paaga);
     $pg = strtolower($paagaa);
     $content = mysql_real_escape_string($_POST['content']);
     $custom_menu = 'page';
    
    if($title == ''){
        
        header("location:admin-add-page.php?action=rus&page");
    }else{
            
    $ins = "insert into pages (title,content,pg,custom_menu) values('$title','$content','$pg','$custom_menu')";
    $run = mysql_query($ins);
    if($run){
        header("location:admin-pages.php?action=rs&page");
    }else{
        header("location:admin-add-page.php?action=rus&page");
        echo mysql_error();
    
    }
  
   } 

}


?>