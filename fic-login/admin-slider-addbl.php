<?php
include_once ('admin-includes.php');

if(isset($_GET['action']) && $_GET['action'] == 'save'){
    
    
    if (isset ( $_FILES['slide'] ) ) {

    $file_size = $_FILES['slide']['size'];
    $file_type = $_FILES['slide']['type'];

    if (($file_size > 10485760)){      
        $sizefi = 'n';
    }
    elseif (  
        ($file_type != "image/jpeg") &&
        ($file_type != "image/jpg") &&
		($file_type != "image/JPEG") &&
		($file_type != "image/JPG") &&
        ($file_type != "image/gif") &&
        ($file_type != "image/png")    
    ){
         $exfi = 'n';       
    }    
    else {
        $img_nm = $_FILES["slide"] ['name'];
        move_uploaded_file($_FILES["slide"] ['tmp_name'],'images/'.$img_nm);
    }

}
    
    
    $slide = $img_nm;
    $order_s = $_POST['order_s'];
    
    if($slide == ''){
		echo mysql_error();
        header("location:admin-slider-add.php?action=nas&sfi=$sizefi&pefi=$exfi");
    }else{
           $insert = "insert into slider (slide,order_s) values('$slide','$order_s')";
            $run = mysql_query($insert);
            if($run){
                header("location:admin-slider.php?action=as&sfi=$sizefi&pefi=$exfi");
            }else{
                echo mysql_error();
                header("location:admin-slider-add.php?action=nas&sfi=$sizefi&pefi=$exfi");
            }
    }
    
    
    
}




?>