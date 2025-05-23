 
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

            <div class="menu_section">
              <ul class="nav side-menu">
                 
                 <?php
                 if($_SESSION['user'] == 'admin'){
                    ?>
                    
                    <li><a href="admin-home.php?page&" ><i class="fa fa-home"></i> Home <span class="fa fa-chevron"></span></a></li>
                <li><a href="admin-tender.php?page&" ><i class="fa fa-edit"></i> Tenders <span class="fa fa-chevron"></span></a></li>
                 <li><a href="admin-pages.php?page&" ><i class="fa fa-files-o"></i> Pages <span class="fa fa-chevron"></span></a></li>
                 <li><a href="admin-page-setting.php?page&" ><i class="fa fa-wrench"></i> Page Setting <span class="fa fa-chevron"></span></a></li>
                 <li><a href="admin-editmenu.php?page&" ><i class="fa fa-navicon"></i> Menu <span class="fa fa-chevron"></span></a></li>
                <li><a href="admin-jobs.php?page&" ><i class="fa fa-bar-chart-o"></i> Jobs <span class="fa fa-chevron"></span></a></li>
                <li><a href="admin-weight.php?page&" ><i class="fa fa-bookmark"></i> Widgets <span class="fa fa-chevron"></span></a></li>
                <li><a href="admin-reports.php?page&" ><i class="fa fa-file-text-o"></i> Reports <span class="fa fa-chevron"></span></a></li>
                <li><a href="admin-slider.php?page&" ><i class="fa fa-sliders"></i> Slider <span class="fa fa-chevron"></span></a></li>
                <li><a href="admin-news.php?page&" ><i class="fa fa-newspaper-o"></i> News <span class="fa fa-chevron"></span></a></li>
                <li><a href="admin-file.php?page&cat=all-category" ><i class="fa fa-floppy-o"></i> Shared Files <span class="fa fa-chevron"></span></a></li>
                <li><a href="admin-change-pass.php?page&" ><i class="fa fa-asterisk"></i> Change Password <span class="fa fa-chevron"></span></a></li>
                <li><a href="admin-siteuser.php?page&" ><i class="fa fa-users"></i> Users <span class="fa fa-chevron"></span></a></li>
                <li><a href="admin-settings.php?page&" ><i class="fa fa-cog"></i> Settings <span class="fa fa-chevron"></span></a></li>
                    
                    <?php
                    
                 }else{
                    $user = $_SESSION['user'];
                    $query = mysql_query("select * from users where user_n='$user' ");
                                $data = mysql_fetch_assoc($query);
                                $arry = $data['u_option'];
                               
                 
                    
                    
                    ?>
                    <li <?php if (preg_match("/tender-edit/", "$arry")) { echo "";} else {echo "style='display:none;'";} ?> ><a href="admin-tender.php?page&" ><i class="fa fa-edit"></i> Tenders <span class="fa fa-chevron"></span></a></li>
                    <li <?php if (preg_match("/jobs-edit/", "$arry")) { echo "";} else {echo "style='display:none;'";} ?> ><a href="admin-jobs.php?page&" ><i class="fa fa-bar-chart-o"></i> Jobs <span class="fa fa-chevron"></span></a></li>
                    <li <?php if (preg_match("/reports-edit/", "$arry")) { echo "";} else {echo "style='display:none;'";} ?> ><a href="admin-reports.php?page&" ><i class="fa fa-file-text-o"></i> Reports <span class="fa fa-chevron"></span></a></li>
                    <li <?php if (preg_match("/file/", "$arry")) { echo "";} else {echo "style='display:none;'";} ?> ><a href="admin-file.php?page&cat=all-category" ><i class="fa fa-floppy-o"></i> Shared Files <span class="fa fa-chevron"></span></a></li>
                    
                  <?php
                    
                  
                  
                  ?>
                  <li><a href="admin-user-pass.php?page&" ><i class="fa fa-asterisk"></i> Change Password <span class="fa fa-chevron"></span></a></li>
                  <?php
                  
                  }
           
                 ?>
             
              </ul>
            </div>

          </div>