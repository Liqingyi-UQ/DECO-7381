<?php

session_start();

if (isset($_SESSION["user_id"])) {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = "SELECT * FROM user WHERE id = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
}

?>
<!-- Use SQL to filter out the maximum and minimum values of video IDs, and then generate 10 random numbers in this interval.
Use SQL to read the name and link corresponding to the 10 random numbers and add them to the list -->
<?php
$mysqli = require __DIR__ . "/database.php";
$sql = "SELECT name,id,location FROM videos ORDER BY id desc LIMIT 10";
$result = $mysqli->query($sql);
$videoslist=array();
$namelist=array();
$sql_check_range="SELECT * FROM videos ORDER BY id desc LIMIT 1";
$sql_check_range2="SELECT * FROM videos ORDER BY id LIMIT 1";
$maxId=$mysqli->query($sql_check_range);
$minId=$mysqli->query($sql_check_range2);
$resultrow=mysqli_fetch_array($maxId,MYSQLI_ASSOC);
$resultrow2=mysqli_fetch_array($minId,MYSQLI_ASSOC);
              $k=0;
              $j=0;
              while($k<10){
                $sqltry="SELECT * FROM videos where id = ".rand((int)$resultrow2['id'], (int)$resultrow['id']);
                $result1=$mysqli->query($sqltry);
                $result12=mysqli_fetch_array($result1,MYSQLI_ASSOC);
                $videoslist[$k] = $result12['location'];
                $namelist[$k] = $result12['name'];
                $k++;
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
    <title>topics</title>
    <link rel="stylesheet" href="css/style.css">
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
        
        <a href='test.php?text=3' >click me to new page</a>

        &nbsp;<p class=username><?= htmlspecialchars($user["name"]) ?></p>
        &nbsp;&nbsp;<p class=user><a href="logout.php">Log out</a></p>
        
      <?php else: ?>
        
        <p><a href="login.php">Log in</a> or <a href="signup.html">sign up</a></p>
        
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
            <h1>Other topics</h1> 
            <div class="line"></div>
        </div>
        <!-- Use the link stored in the list and name to generate a video list -->

        <div class="topics-container">
            <div class="accommodation-container">
          
                <div class="box">
                  
                  <div class="topicvedioGround">
                        <div class="topicvedioplayer">
                            <video class="topicplayer" controls>
                                <?php
                                    echo"<source src=". $videoslist[$j]." type=video/mp4>";
                                    echo"<source src=". $videoslist[$j]." type=video/webm>";    
                                ?>
                                
                            </video>
                        </div>
                    </div>
                  <?php
                        echo"<h3>". $namelist[$j++]."</h3>";  
                        echo"<a href=video.php?m=0> Show more</a>";         
                  ?>
                  
                  <div class="video_content">
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsum, obcaecati consectetur facilis rem temporibus quod deserunt aliquam tenetur labore accusantium aliquid repellat adipisci architecto, corporis esse soluta excepturi nihil porro.</p>
                  </div>
                </div>

                <div class="box">
                <div class="topicvedioGround">
                        <div class="topicvedioplayer">
                            <video class="topicplayer" controls>
                                <?php
                                    echo"<source src=". $videoslist[$j]." type=video/mp4>";
                                    echo"<source src=". $videoslist[$j]." type=video/webm>";
                                   
                                ?>
                                
                            </video>
                        </div>
                    </div>
                    <?php
                        echo"<h3>". $namelist[$j++]."</h3>";  
                        echo"<a href=video.php?m=1> Show more</a>";         
                  ?>
                  
                  <div class="video_content">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente hic, laborum velit ratione quibusdam maxime ad praesentium, quae fuga facilis ducimus aperiam at suscipit non! Tempore fugiat eum aut quibusdam!</p>
                  </div>
                </div>

                <div class="box">
                <div class="topicvedioGround">
                        <div class="topicvedioplayer">
                            <video class="topicplayer" controls>
                                <?php
                                    echo"<source src=". $videoslist[$j]." type=video/mp4>";
                                    echo"<source src=". $videoslist[$j]." type=video/webm>";
                                   
                                ?>
                                
                            </video>
                        </div>
                    </div>
                    <?php
                        echo"<h3>". $namelist[$j++]."</h3>";  
                        echo"<a href=video.php?m=2> Show more</a>";         
                  ?>
                  
                  <div class="video_content">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem facilis eum veritatis quas soluta voluptates asperiores, assumenda a ea quidem illum dolore aliquid libero, aspernatur possimus corporis laboriosam harum omnis?</p>
                  </div>
                </div>

                <div class="box">
                <div class="topicvedioGround">
                        <div class="topicvedioplayer">
                            <video class="topicplayer" controls>
                                <?php
                                    echo"<source src=". $videoslist[$j]." type=video/mp4>";
                                    echo"<source src=". $videoslist[$j]." type=video/webm>";
                                   
                                ?>
                                
                            </video>
                        </div>
                    </div>
                    <?php
                        echo"<h3>". $namelist[$j++]."</h3>";  
                        echo"<a href=video.php?m=3> Show more</a>";         
                  ?>
                  
                  <div class="video_content">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem facilis eum veritatis quas soluta voluptates asperiores, assumenda a ea quidem illum dolore aliquid libero, aspernatur possimus corporis laboriosam harum omnis?</p>
                  </div>
                </div>

                <div class="box">
                <div class="topicvedioGround">
                        <div class="topicvedioplayer">
                            <video class="topicplayer" controls>
                                <?php
                                    echo"<source src=". $videoslist[$j]." type=video/mp4>";
                                    echo"<source src=". $videoslist[$j]." type=video/webm>";
                                   
                                ?>
                                
                            </video>
                        </div>
                    </div>
                    <?php
                        echo"<h3>". $namelist[$j++]."</h3>";  
                        echo"<a href=video.php?m=4> Show more</a>";         
                  ?>
                  
                  <div class="video_content">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem facilis eum veritatis quas soluta voluptates asperiores, assumenda a ea quidem illum dolore aliquid libero, aspernatur possimus corporis laboriosam harum omnis?</p>
                  </div>
                </div>

                <div class="box">
                <div class="topicvedioGround">
                        <div class="topicvedioplayer">
                            <video class="topicplayer" controls>
                                <?php
                                    echo"<source src=". $videoslist[$j]." type=video/mp4>";
                                    echo"<source src=". $videoslist[$j]." type=video/webm>";
                                   
                                ?>
                                
                            </video>
                        </div>
                    </div>
                    <?php
                        echo"<h3>". $namelist[$j++]."</h3>";  
                        echo"<a href=video.php?m=5> Show more</a>";         
                  ?>
                  
                  <div class="video_content">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem facilis eum veritatis quas soluta voluptates asperiores, assumenda a ea quidem illum dolore aliquid libero, aspernatur possimus corporis laboriosam harum omnis?</p>
                  </div>
                </div>

                <div class="box">
                <div class="topicvedioGround">
                        <div class="topicvedioplayer">
                            <video class="topicplayer" controls>
                                <?php
                                    echo"<source src=". $videoslist[$j]." type=video/mp4>";
                                    echo"<source src=". $videoslist[$j]." type=video/webm>";
                                   
                                ?>
                                
                            </video>
                        </div>
                    </div>
                    <?php
                        echo"<h3>". $namelist[$j++]."</h3>";  
                        echo"<a href=video.php?m=6> Show more</a>";         
                  ?>
                  
                  <div class="video_content">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem facilis eum veritatis quas soluta voluptates asperiores, assumenda a ea quidem illum dolore aliquid libero, aspernatur possimus corporis laboriosam harum omnis?</p>
                  </div>
                </div>

                <div class="box">
                <div class="topicvedioGround">
                        <div class="topicvedioplayer">
                            <video class="topicplayer" controls>
                                <?php
                                    echo"<source src=". $videoslist[$j]." type=video/mp4>";
                                    echo"<source src=". $videoslist[$j]." type=video/webm>";
                                   
                                ?>
                                
                            </video>
                        </div>
                    </div>
                    <?php
                        echo"<h3>". $namelist[$j++]."</h3>";  
                        echo"<a href=video.php?m=7> Show more</a>";         
                  ?>
                  
                  <div class="video_content">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem facilis eum veritatis quas soluta voluptates asperiores, assumenda a ea quidem illum dolore aliquid libero, aspernatur possimus corporis laboriosam harum omnis?</p>
                  </div>
                </div>

                <div class="box">
                <div class="topicvedioGround">
                        <div class="topicvedioplayer">
                            <video class="topicplayer" controls>
                                <?php
                                    echo"<source src=". $videoslist[$j]." type=video/mp4>";
                                    echo"<source src=". $videoslist[$j]." type=video/webm>";
                                   
                                ?>
                                
                            </video>
                        </div>
                    </div>
                    <?php
                        echo"<h3>". $namelist[$j++]."</h3>";  
                        echo"<a href=video.php?m=8> Show more</a>";         
                  ?>
                  
                  <div class="video_content">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem facilis eum veritatis quas soluta voluptates asperiores, assumenda a ea quidem illum dolore aliquid libero, aspernatur possimus corporis laboriosam harum omnis?</p>
                  </div>
                </div>

                <div class="box">
                <div class="topicvedioGround">
                        <div class="topicvedioplayer">
                            <video class="topicplayer" controls>
                                <?php
                                    echo"<source src=". $videoslist[$j]." type=video/mp4>";
                                    echo"<source src=". $videoslist[$j]." type=video/webm>";
                                   
                                ?>
                                
                            </video>
                        </div>
                    </div>
                    <?php
                        echo"<h3>". $namelist[$j++]."</h3>";  
                        echo"<a href=video.php?m=9> Show more</a>";         
                  ?>
                  
                  <div class="video_content">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem facilis eum veritatis quas soluta voluptates asperiores, assumenda a ea quidem illum dolore aliquid libero, aspernatur possimus corporis laboriosam harum omnis?</p>
                  </div>
                  
                  
                </div>
                
            </div>
            <div class="Refresh">
            <a href="topics.php" >
                    <button>change topics</button>
            </a>
            </div>
               
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
    <script>
        const menuicon = document.querySelector(".menu-icon")
        const navbar = document.querySelector(".navbar")
        menuicon.addEventListener("click", ()=>{
          navbar.classList.toggle("mobile-menu")
        })
    </script>
</body>
</html>