<?php
include_once('admin-includes.php');

if(isset($_GET['action']) && $_GET['action'] == 'change' ){
    
    $old_pass = md5($_POST['old_pass']);
    $new_pass = md5($_POST['new_pass']);
    $cf_pass = md5($_POST['cf_pass']);
    
    $check = "select * from admin where pass='$old_pass' ";
    $qry = mysql_query($check);
    $ma = mysql_fetch_array($qry);
    if($ma){
        
         $old = 'opio';
        
        if($new_pass == $cf_pass){
            
             $new = 'ps';
            $update = "update admin set pass='$new_pass' where id=1 ";
            $run = mysql_query($update);
            if($update){
                
                $newu = 'npiu';
                
            }else{
                $newu = 'npinu';
            }
             
        }else{
            
             $new = 'pns';
        }
        
    }else{
     
       $old = 'opiw';
        
    }
    header('location:admin-change-pass.php?action='.$old.$new.$newu);
    
}


?>