<?php    
 session_start();

         

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CometCat</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
  
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
</head>

<body>
    <div class="wrapper">
        <nav id="sidebar">                
         <div class="sidebar-header">
       <?php
       if(isset($_SESSION['user_name']) && !empty($_SESSION['user_name']) ){
        ?>
        <p><?php echo "Hello, " . $_SESSION['user_name'];?>!</p>
        <button class='form_links' id='logout_link'><a  href="logout.php">Logout</a></button>
       <?php }else{  ?> 
       <button class='form_links' id='login_link'><a  href="login.php">Login</a></button>
       <button class='form_links' id='signup_link'><a href="signup.php">Register</a></button>
       <?php }  ?>   
         </div>
          <ul class="list-unstyled components">             
              <li class="active">
                <a href="#">Home</a>
              </li>
              <li>
                <a class='ow_Item' href="pages/our_world.php">Our World</a>
              </li>
              <li>
                <a class="sn_Item" href="pages/space_neighbors.php">Our Space Neighbors</a>    
              </li>

              <li>
                <a class="ffa_Item" href="pages/ff_away.php">Far Far Away</a>
              </li>

              <li>
                <a class="se_Item" href="/pages/space_explorers.php">Space Explorers</a>
              </li>

              <li>
                <a class="cc_Item" href="/pages/comet_cadets.html">Comet Cadets</a>
              </li>
          </ul>        
        </nav>        

        <div id="content">
            <header id='header-banner'class="container-fluid" style="position:relative;">
             <button type="button" id="sidebarCollapse" class="btn btn-info" title="toggle_sidebar">
              <i class="fas fa-align-left"></i>   
             </button>
              <img src="images/logo.png" alt="cat jumping over words" id="logo">
              <div class='weather_box'>
                <div id='current_info' class='appear'>
                  <p id='cur_location' class='text-center'></p>
                  <div id="cur_condition_icon">
                  </div>
                    <div id='cur_weather'>
                     <p id="cur_degrees"></p>
                     <p id="cur_condition"></p>
                    </div>
                </div>
                 
               <button id='weather_btn'><img id='weather_arrow' src="images/weather_arrow.png" alt=""></button>
               <div id='forecast_box'>
                 
                  <div id='forecast_info'>
                   <div class='forecast_hours' id="first_hour">
                    <div class='icon' id="icon_one"></div>
                    <p class='temp' id='temp_one'></p>
                    <p class='time' id='hour_one'></p>
                   </div>
                   <div class='forecast_hours'  id="second_hour">
                    <div class='icon' id="icon_two"></div>
                    <p class='temp' id='temp_two'></p>
                    <p class='time' id='hour_two'></p>
                   </div>                
                   <div class='forecast_hours'  id="third_hour">
                    <div class='icon' id="icon_three"></div>
                    <p class='temp' id='temp_three'></p>
                    <p class='time' id='hour_three'></p>
                   </div>              
                   <div class='forecast_hours'  id="fourth_hour">
                    <div class='icon' id="icon_four"></div>
                    <p class='temp' id='temp_four'></p>
                    <p class='time' id='hour_four'></p>
                   </div>                    
                  </div>

               </div> 

              </div>
            </header>


             <div class='grid_container'>   
          
               <div class='intro_section'>
                 <img class='star_wp' src="images/space_long.jpg" alt="">
                  <div class='intro_text'>
                    <h1>Welcome to CometCat</h1>
                    <p>
                     Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sint sunt fuga sit voluptas aspernatur officia enim alias possimus unde laborum,
                     aliquam non expedita quas obcaecati porro est nostrum! Dolorum, tempore.
                    </p>
                  </div>
                  
                  <img id='cometCat_intro' src="images/cometCat_intro.png" alt="">
                   <!-- <img id='comet' src="images/comet.png" alt="">
                    <img id='catOnShip' src="images/catOnSpaceship.png" alt=""> -->                 
                  
                      
               </div> 
               

   
              <div class='model' id='profile'> 
                <?php if(empty($_SESSION['user_name'])){
                  echo 'There is no data';
                } else{
                  echo $_SESSION['user_name'];
                }
                ?>
                <br>
                <?php echo $_SESSION['email'];?>                 
                <br>
                <?php echo $_SESSION['password'];?>
                <br>
                <form action="logout.php" method="post" novalidate> 
                  <input type="submit" name='logout' value="Logout"> 
                </form>                  
              </div>


               <div class='article_section'>
                <p class='header text-center'>Featured Articles</p>
                <div class='article_grid'>
                  <div class='article' id='article_one'>
                    <div id='article_one_bkgrd'></div>
                    <div id='article_one_bkgrd2'></div>
                    <p>Search for life: World's most powerful telescopes</p>
                    <img id='telescope' src="images/telescope_sky.jpg" alt="">
                  </div>

                  <div class='article' id='article_two'>
                    <p>The first rocket</p>
                    <div id='article_two_bkgrd'></div>
                    <div id='article_two_bkgrd2'></div>
                    <img id='rocket_launch' src="images/rocket_launch.jpg" alt="">
                  </div>
                  <div class='article' id='article_three'>
                    <div id='article_three_bkgrd'></div>
                    <div id='article_three_bkgrd2'></div>
                    <p>How does <br> black holes work?</p>
                    <img id='black_hole' src="images/black_hole.png" alt="">
                  </div>
                  <div class='article' id='article_four'> 
                    <img id='multi_verse' src="images/multi_verse.jpg" alt="">
                    <p>The Multiverse Theory</p> 
                    <div id='article_four_bkgrd'></div> 
                    <div id='article_four_bkgrd2'></div> 
                       
                  </div>
                </div>
                
               </div>

               <div class='rec_section'>
                  <img id='rec_wp' class='star_wp' src="images/space_long.jpg" alt="">
                  <img id='planetCat' src="images/planetCat.png" alt="">  
                  <div id='rec_text'>
                    <h1>There's so much to see out there</h1>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quidem quisquam impedit asperiores earum rerum aliquid autem veritatis tempore, unde velit nam repudiandae voluptatem laboriosam incidunt voluptates vero obcaecati perspiciatis cumque.</p>
                  </div>
                 <div id='rec_topics'>
                   <h1 class='header'>Here are some recommended topics</h1>
                   <div id='btn_section'>
                     <div>
                      <a id='one_left' href="pages/ff_away.php" class='topic_btns'><p>Supernovas</p></a>
                      <a id='two_left' href="pages/space_neighbors.php" class='topic_btns'><p>The Solar System</p></a>
                      <a id='three_left' href="pages/space_explorers.php" class='topic_btns'><p>Albert Einstein</p></a>
                     </div>
                    <div>
                      <a id='one_right' class='topic_btns' href="pages/our_world.php" ><p>Fun facts about Earth</p></a>
                      <a id='two_right' class='topic_btns' href="pages/space_explorers.php"><p>First Man on the Moon</p></a>
                      <a id='three_right' class='topic_btns' href="pages/ff_away.php"><p>The Milky Way</p></a>                      
                    </div>

                   </div>
                 </div>
               </div>

               <div class='cta_section'>
                <div id='cta_box'>
                  <h1 class='header'>Join the Comet Cadets newsletter</h1>
                  <p>Receive current news, fun facts, and other fascinating <br> content every week!</p>               
                  <button>Join</button>                  
                </div>                  
               </div>

               <div class="container footer">
                 <footer class="row row-cols-1 row-cols-sm-2 row-cols-md-5 py-5 my-5 border-top">
                     <div class="col mb-3">
                       <a href="/" class="d-flex align-items-center mb-3 link-dark text-decoration-none">
                         <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
                       </a>
                       <p class="text-muted">&copy; 2022</p>
                     </div>
                 
                     <div class="col mb-3">
                     </div>
                 
                     <div class="col mb-3">
                       <h5>Section</h5>
                       <ul class="nav flex-column">
                         <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
                         <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
                         <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
                         <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
                         <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
                       </ul>
                     </div>
                 
                     <div class="col mb-3">
                       <h5>Section</h5>
                       <ul class="nav flex-column">
                         <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
                         <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
                         <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
                         <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
                         <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
                       </ul>
                     </div>
                 
                     <div class="col mb-3">
                       <h5>Section</h5>
                       <ul class="nav flex-column">
                         <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
                         <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
                         <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
                         <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
                         <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
                       </ul>
                     </div>
                 </footer>
               </div>
               
             </div>


        </div>

      </div>      
          
     </div>
    

    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <script type="text/javascript" src="script.js"></script>
</body>
</html>

