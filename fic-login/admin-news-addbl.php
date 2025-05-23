<?php
include_once('admin-includes.php');


if(isset($_GET['action']) && $_GET['action'] == 'save' ){
    
    $pg = $_GET['page'];
    $description = mysql_real_escape_string($_POST['description']);
    $dated = date_create($_POST['date']);
    $date = date_format($dated,"y-m-d");
    $title = $_POST['title'];
    $link = str_replace(' ', '-', $title);
    $link = str_replace('/', '-', $link);
    $link = strtolower($link);
    $link = 'news-'.$link;
    
    if($description == '' || $date == '' || $title == ''){
        
        header("location:admin-news-add.php?action=jus&page=$pg");
    }else{
            
    $ins = "insert into news (title,date,description,news_link) values('$title','$date','$description','$link')";
    $run = mysql_query($ins);
    if($run){
        header("location:admin-news.php?action=rs&page=$pg");
    }else{
        header("location:admin-news-add.php?action=jus&page=$pg");
    
    }
  
   } 

}
    


    
    
  


?>