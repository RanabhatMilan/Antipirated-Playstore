<?php 
$current_page=pathinfo($_SERVER['PHP_SELF'],PATHINFO_BASENAME);
 ?>

 <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
              <a href="adminpage.php"><h3 style="background-color: white; padding: 2px;">Admin Panel</h3></a>
            </div>





            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
       
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['user_name']; ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                     
                        <li class="divider"></li>
                        <li>
                            <a href="process/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                        <li>
                            <a href="../"><i class="fa fa-fw fa-power-off"></i> Visit Website</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
             <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
              
                    <li  class="<?php echo ($current_page== 'news_add.php' || $current_page == 'news_list.php')? 'active' : '';  ?>">
                        <a href="javascript:;" data-toggle="collapse" data-target="#news"><i class="fa fa-folder"></i> Applications Management <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="news" class="collapse">
                            <li>
                                <a href="apps_add.php">Add Apps</a>
                            </li>
                            <li>
                                <a href="apps_list.php">Apps Lists </a>
                            </li>
                        </ul>
                    </li>
                  

                    <li  class="<?php echo ($current_page== 'category_add.php' || $current_page == 'category_list.php')? 'active' : '';  ?>">
                        <a href="javascript:;" data-toggle="collapse" data-target="#category"><i class="fa fa-futbol-o"></i> Games Management <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="category" class="collapse">
                            <li>
                                <a href="add_games.php">Add Games</a>
                            </li>
                            <li>
                                <a href="list_games.php">Games List</a>
                            </li>
                        </ul>
                    </li>
                   
                    <li  class="<?php echo ($current_page== 'category_add.php' || $current_page == 'category_list.php')? 'active' : '';  ?>">
                        <a href="javascript:;" data-toggle="collapse" data-target="#contact"><i class="fa fa-address-card"></i> Contact Info Management <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="contact" class="collapse">
                            <li>
                                <a href="contact_info.php">View Contact Info</a>
                            </li>
                            
                        </ul>
                    </li>
                   
                    

                   

                </ul>
            </div> 
            <!-- /.navbar-collapse -->
        </nav>

      	