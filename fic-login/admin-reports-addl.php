<?php
include_once('admin-includes.php');


if(isset($_GET['action']) && $_GET['action'] == 'save' ){
      
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
    
    
    $pg = $_GET['page'];
    $report_title = $_POST['report_title'];
    $file_link = $img_nm;
    $st_date = $_POST['st_date'];
    $last_date = $_POST['last_date'];
    
    if($report_title == '' || $file_link == '' || $st_date == '' || $last_date == ''){
        
        header("location:admin-reports-add.php?action=rus&page=$pg&sfi=$sizefi&efi=$exfi");
    }else{
            
    $ins = "insert into report (report_title,st_date,last_date,file_link) values('$report_title','$st_date','$last_date','$file_link')";
    $run = mysql_query($ins);
    if($run){
        header("location:admin-reports.php?action=rs&page=$pg&sfi=$sizefi&efi=$exfi");
    }else{
        header("location:admin-reports-add.php?action=rus&page=$pg&sfi=$sizefi&efi=$exfi");
        echo mysql_error();
    
    }
  
   } 

}
    


    
    
  


?>