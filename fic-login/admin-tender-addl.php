<?php
include_once('admin-includes.php');


if(isset($_GET['action']) && $_GET['action'] == 'save' ){
    
    
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
    
    $pg = $_GET['page'];
    $item_description = $_POST['item_description'];
    $free = $_POST['free'];
    $att_file = $img_nm;
    $cdr = $_POST['cdr'];
    $st_adv_date = $_POST['st_adv_date'];
    $last_adv_date = $_POST['last_adv_date'];
    
    if($item_description == '' || $free == '' || $att_file == '' || $st_adv_date == '' || $last_adv_date == ''){
        
        header("location:admin-tender-add.php?action=tus&page=$pg&sfi=$sizefi&efi=$exfi");
    }else{
            
    $ins = "insert into tender (item_description,free,cdr,st_adv_date,last_adv_date,att_file) values('$item_description','$free','$cdr','$st_adv_date','$last_adv_date','$att_file')";
    $run = mysql_query($ins);
    if($run){
        header("location:admin-tender.php?action=ts&page=$pg&sfi=$sizefi&efi=$exfi");
    }else{
        header("location:admin-tender-add.php?action=tus&page=$pg&sfi=$sizefi&efi=$exfi");
    
    }
  
   } 

}
    


    
    
  


?>