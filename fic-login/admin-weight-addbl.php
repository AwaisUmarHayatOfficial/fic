<?php
include_once('admin-includes.php');


if(isset($_GET['action']) && $_GET['action'] == 'save' ){
    
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
    
    $pg = $_GET['page'];
    $content_w = mysql_real_escape_string($_POST['content_w']);
    $image_w = $img_nm;
    $title_w = $_POST['title_w'];
    $line_w = $_POST['line_w'];
    $pg_wa = str_replace(' ','-',$title_w);
    $pg_waw = str_replace('&','and',$pg_wa);
    $pg_w = strtolower($pg_waw.'-w');
    
    if($image_w == '' || $content_w == '' || $title_w == '' || $line_w == ''){
        
        header("location:admin-weight-add.php?action=jus&page=$pg&sfi=$sizefi&pefi=$exfi");
    }else{
            
    $ins = "insert into weight (image_w,title_w,content_w,line_w,pg_w) values('$image_w','$title_w','$content_w','$line_w','$pg_w')";
    $run = mysql_query($ins);
    if($run){
        header("location:admin-weight.php?action=rs&page=$pg&sfi=$sizefi&pefi=$exfi");
    }else{
        header("location:admin-weight-add.php?action=jus&page=$pg&sfi=$sizefi&pefi=$exfi");
        echo mysql_error();
    
    }
  
   } 

}
    


    
    
  


?>