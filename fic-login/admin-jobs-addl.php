<?php
include_once('admin-includes.php');


if(isset($_GET['action']) && $_GET['action'] == 'save' ){

    
     if (isset ( $_FILES['adv_link'] ) ) {

    $file_size = $_FILES['adv_link']['size'];
    $file_type = $_FILES['adv_link']['type'];

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
        $img_nm = $_FILES["adv_link"] ['name'];
        move_uploaded_file($_FILES["adv_link"] ['tmp_name'],'files/'.$img_nm);
    }

}
    
    $pg = $_GET['page'];
    $job_description = $_POST['job_description'];
    $pay = $_POST['pay'];
    $adv_link = $img_nm;
    $no_post = $_POST['no_post'];
    $criteria = $_POST['criteria'];
    $st_date = $_POST['st_date'];
    $last_date = $_POST['last_date'];
    
    if($job_description == '' || $adv_link == '' || $st_date == '' || $last_date == ''){
        
        header("location:admin-jobs-add.php?action=jus&page=$pg&sfi=$sizefi&efi=$exfi");
    }else{
            
    $ins = "insert into jobs (job_description,st_date,last_date,pay,no_post,criteria,adv_link) values('$job_description','$st_date','$last_date','$pay','$no_post','$criteria','$adv_link')";
    $run = mysql_query($ins);
    if($run){
        header("location:admin-jobs.php?action=js&page=$pg&sfi=$sizefi&efi=$exfi");
    }else{
        header("location:admin-jobs-add.php?action=jus&page=$pg&sfi=$sizefi&efi=$exfi");
    
    }
  
   } 

}
    


    
    
  


?>