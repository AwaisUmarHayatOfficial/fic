<?php
include_once('admin-includes.php');


if(isset($_GET['action']) && $_GET['action'] == 'save' ){
    
    
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
    
    
    $file_title = $_POST['file_title'];
    $file_der = $_POST['file_der'];
    $file_cate = $_POST['file_cate'];
    $file_att = $img_nm;
    
       if($file_title == '' || $file_att == ''){
        
        header("location:admin-file-add.php?page=&action=rus&sfi=$sizefi&efi=$exfi");
        echo mysql_error();
    }else{
            
    $ins = "insert into file (file_title,file_att,file_der,file_cate) values('$file_title','$file_att','$file_der','$file_cate')";
    $run = mysql_query($ins);
    if($run){
        header("location:admin-file.php?page=&action=rs&cat=all-category&sfi=$sizefi&efi=$exfi");
    }else{
        header("location:admin-file-add.php?page=&action=rus&sfi=$sizefi&efi=$exfi");
        echo mysql_error();
    
    }
  
   } 

}
    


    
    
  


?>