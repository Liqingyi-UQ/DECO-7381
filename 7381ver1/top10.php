<?php

session_start();

if (isset($_SESSION["user_id"])) {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = "SELECT * FROM user WHERE id = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
}

?>
<!-- Select 10 newly uploaded video ids and add their name and link to the different list -->

<?php
$mysqli = require __DIR__ . "/database.php";
$sql = "SELECT name,id,location FROM videos ORDER BY id desc LIMIT 10";
$result = $mysqli->query($sql);
$videoslist=array();
$namelist=array();
$i=0;
$j=0;
$k=1;
while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
    $videoslist[$i] = $row['location'];
    $namelist[$i] = $row['name'];
    $i++;
}
session_start();
$_SESSION['linklist']=$videoslist;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top 10 topics</title>
    <link rel="stylesheet" href="css/style.css">
    <!-- link Swiper's CSS -->
    <link rel="stylesheet" href="js/swiper/css/swiper.min.css">  
    <script src="js/script.js"></script>  
</head>
<body>
    <nav class="nav">
        <a href="index.php" class="logo">anthology</a>
    
        <ul class="navbar">
          <li class="active"><a href="index.php">home</a></li>
          <li><a href="top10.php">topics</a></li>
          <li><a href="about.php">about us</a></li>
          <!-- add -->
      <?php if (isset($user)): ?>
        
        &nbsp;<p class=username><?= htmlspecialchars($user["name"]) ?></p>
        &nbsp;&nbsp;<p class=user><a href="logout.php">Log out</a></p>
        
      <?php else: ?>
        
        <p class=user><a href="login.php">Log in</a> or <a href="signup.html">sign up</a></p>
        
      <?php endif; ?>
      <?php if((isset($user))&$user["name"]=="Expert"): ?>
          &nbsp;&nbsp;<p class=user><a href="choose_area.php">Upload</a></p>
      <?php endif; ?>
      <!-- add -->
        </ul>
        <img src="https://img.icons8.com/material-outlined/24/000000/menu.png" class="menu-icon"/>
    </nav>


    <section class="topics">   
        <div class="title">
            <h1>Top 10 topics</h1>
            <div class="line"></div>
        </div>

        <div class="swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="top10vedioGround">
                        <div class="top10vedioplayer">
                            <video class="top10player" controls>
                                <!-- Generate videos from links in the videoslist -->
                                <?php
                                    echo"<source src=". $videoslist[$j]." type=video/mp4>";
                                    echo"<source src=". $videoslist[$j]." type=video/webm>";
                                    
                                ?>
                                
                            </video>
                        </div>
                    </div>
                    <!-- Generate videos' name from links in the videoslist -->
                    <?php
                        echo"<p>Topic".$k++.": ". $namelist[$j++]." </p>";
                        echo"<a href=video.php?m=0> Show more</a>";
                    ?>
                </div>
                
                <div class="swiper-slide">
                    <div class="top10vedioGround">
                        <div class="top10vedioplayer">
                            <video class="top10player" controls>
                                <?php
                                    echo"<source src=". $videoslist[$j]." type=video/mp4>";
                                    echo"<source src=". $videoslist[$j]." type=video/webm>";
                                ?>
                            </video>
                        </div>
                    </div>
                    <?php
                        echo"<p>Topic".$k++.": ". $namelist[$j++]." </p>";
                        echo"<a href=video.php?m=1> Show more</a>";
                    ?>
                    
                </div>

                <div class="swiper-slide">
                    <div class="top10vedioGround">
                        <div class="top10vedioplayer">
                            <video class="top10player" controls>
                                <?php
                                    echo"<source src=". $videoslist[$j]." type=video/mp4>";
                                    echo"<source src=". $videoslist[$j]." type=video/webm>";
                                ?>
                            </video>
                        </div>
                    </div>
                    <?php
                        echo"<p>Topic".$k++.": ". $namelist[$j++]." </p>";
                        echo"<a href=video.php?m=2> Show more</a>";
                    ?>
                </div>

                <div class="swiper-slide">
                    <div class="top10vedioGround">
                        <div class="top10vedioplayer">
                            <video class="top10player" controls>
                                <?php
                                    echo"<source src=". $videoslist[$j]." type=video/mp4>";
                                    echo"<source src=". $videoslist[$j]." type=video/webm>";
                                ?>
                            </video>
                        </div>
                    </div>
                    <?php
                        echo"<p>Topic".$k++.": ". $namelist[$j++]." </p>";
                        echo"<a href=video.php?m=3> Show more</a>";
                    ?>
                </div>

                <div class="swiper-slide">
                    <div class="top10vedioGround">
                        <div class="top10vedioplayer">
                            <video class="top10player" controls>
                                <?php
                                    echo"<source src=". $videoslist[$j]." type=video/mp4>";
                                    echo"<source src=". $videoslist[$j]." type=video/webm>";
                                ?>
                            </video>
                        </div>
                    </div>
                    <?php
                        echo"<p>Topic".$k++.": ". $namelist[$j++]." </p>";
                        echo"<a href=video.php?m=4> Show more</a>";
                    ?>
                </div>

                <div class="swiper-slide">
                    <div class="top10vedioGround">
                        <div class="top10vedioplayer">
                            <video class="top10player" controls>
                                <?php
                                    echo"<source src=". $videoslist[$j]." type=video/mp4>";
                                    echo"<source src=". $videoslist[$j]." type=video/webm>";
                                ?>
                            </video>
                        </div>
                    </div>
                    <?php
                        echo"<p>Topic".$k++.": ". $namelist[$j++]." </p>";
                        echo"<a href=video.php?m=5> Show more</a>";
                    ?>
                </div>
                
                <div class="swiper-slide">
                    <div class="top10vedioGround">
                        <div class="top10vedioplayer">
                            <video class="top10player" controls>
                                <?php
                                    echo"<source src=". $videoslist[$j]." type=video/mp4>";
                                    echo"<source src=". $videoslist[$j]." type=video/webm>";
                                    
                                ?>
                            </video>
                        </div>
                    </div>
                    <?php
                        echo"<p>Topic".$k++.": ". $namelist[$j++]." </p>";
                        echo"<a href=video.php?m=6> Show more</a>";
                    ?>
                </div>

                <div class="swiper-slide">
                    <div class="top10vedioGround">
                        <div class="top10vedioplayer">
                            <video class="top10player" controls>
                                <?php
                                    echo"<source src=". $videoslist[$j]." type=video/mp4>";
                                    echo"<source src=". $videoslist[$j]." type=video/webm>";
                                ?>
                            </video>
                        </div>
                    </div>
                    <?php
                        echo"<p>Topic".$k++.": ". $namelist[$j++]." </p>";
                        echo"<a href=video.php?m=7> Show more</a>";
                    ?>
                </div>
                
                <div class="swiper-slide">
                    <div class="top10vedioGround">
                        <div class="top10vedioplayer">
                            <video class="top10player" controls>
                                <?php
                                    echo"<source src=". $videoslist[$j]." type=video/mp4>";
                                    echo"<source src=". $videoslist[$j]." type=video/webm>";
                                ?>
                            </video>
                        </div>
                    </div>
                    <?php
                        echo"<p>Topic".$k++.": ". $namelist[$j++]." </p>";
                        echo"<a href=video.php?m=8> Show more</a>";
                    ?>
                </div>

                <div class="swiper-slide">
                    <div class="top10vedioGround">
                        <div class="top10vedioplayer">
                            <video class="top10player" controls>
                                <?php
                                    echo"<source src=". $videoslist[$j]." type=video/mp4>";
                                    echo"<source src=". $videoslist[$j]." type=video/webm>";
                                ?>
                            </video>
                        </div>
                    </div>
                    <?php
                        echo"<p>Topic".$k++.": ". $namelist[$j++]." </p>";
                        echo"<a href=video.php?m=9> Show more</a>";
                    ?>
                </div>
            </div>

            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
            <!-- Add Arrows -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
        <div class="topicbtn">
            <a href="topics.php" class="btn">More Topics</a>
        </div>

    </section>
    
    <footer class="footer">
        <div class="footer-container container">
          <h2>anthology</h2>
          <div class="footer-box">
            <h3>information</h3>
            <a href="https://www.google.com/maps/place/死海/@31.5369436,35.346974,10.97z/data=!4m13!1m7!3m6!1s0x15033c2eaf9fbba1:0xf38cff48a0c15882!2z5q275rW3!3b1!8m2!3d31.5590287!4d35.4731895!3m4!1s0x15033c2eaf9fbba1:0xf38cff48a0c15882!8m2!3d31.5590287!4d35.4731895">map</a>
            <a href="https://en.wikipedia.org/wiki/Dead_Sea">Six Pigenons</a>
            <a href="https://en.wikipedia.org/wiki/Dead_Sea#666_and_leisure">666</a>
          </div>
            
          <div class="footer-box">
            <h3>contact</h3>
            <a href="#">+777 (0)666 666 6666</a>
            <a href="#">sixpigeonsmail@gmail.com</a>
    
            <div class="app">
              <img src="https://img.icons8.com/material-outlined/24/000000/facebook-new.png"/>
              <img src="https://img.icons8.com/material-outlined/24/000000/instagram-new.png"/>
              <img src="https://img.icons8.com/material-outlined/24/000000/twitter.png"/>
            </div>
          </div>
        </div>
    </footer>
    <div class="copyright">
        <p>&#169; Six Pigeons all right reserved</p>
    </div>

    <script src="js/swiper/js/swiper.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- link Swiper's JS -->
    <script src="js/swiperjs.js"></script>

    <script>
        const menuicon = document.querySelector(".menu-icon")
        const navbar = document.querySelector(".navbar")
        menuicon.addEventListener("click", ()=>{
          navbar.classList.toggle("mobile-menu")
        })
    </script>
</body>
</html>