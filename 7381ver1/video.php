<?php

session_start();

if (isset($_SESSION["user_id"])) {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = "SELECT * FROM user WHERE id = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
}

?>
<!-- generate 3 viedo from the link in the session -->
<?php
session_start();
//m is the video's id in database.
$vedioLink=$_SESSION['linklist'][$_GET['m']];
$vedioLink1=$_SESSION['linklist'][($_GET['m']+1)%10];
$vedioLink2=$_SESSION['linklist'][($_GET['m']+2)%10];
$vedioLink3=$_SESSION['linklist'][($_GET['m']+3)%10];
$try=[$_GET['m']];
$try1=($_GET['m']+1)%10;
$try2=($_GET['m']+2)%10;;
$try3=($_GET['m']+3)%10;;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
    <!-- Navigation -->
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
  <div class="vedioGround">
    <div class="vedioplayer">
    <video class="player" controls>
        <?php
              echo"<source src=".$vedioLink." type=video/mp4>";
        ?>
      </video>
        
        
          <form class="commandPlace" action=“#”>
            <input class="command" type="text" name="FirstName" placeholder="Command here"><br>
            <input class="submit" type="button" value="Submit">
          </form>
          <div class="ShowCommand">
            <?php
            echo "<p>".$vedioLink."<p>";
            ?>
            <p>
                Some commands will be showed here......
            </p>
            <p>
                Some commands will be showed here......
            </p>
            <p>
                Some commands will be showed here......
            </p>
            <p>
                Some commands will be showed here......
            </p>

          </div>
          <div class="resource">
            <p>
                Orginal Sources......
            </p>

          </div>
          <div class="resource">
            <p>
                Orginal Sources......
            </p>

          </div>
    </div>
    <div class="vedioRecommand">
      <div class = "RecommandText">
        <p>
        Videos you may be interested in
        </p>

      </div>
        <div class="otherVedio">
            
            <video class="relationplayer" controls>
              <?php
                    echo"<source src=".$vedioLink1." type=video/mp4>";
                    echo"<source src=".$vedioLink1." type=video/webm>";
              ?>
            </video>
            <?php
              echo"<a href=video.php?m=".$try1."> Show more</a>";
            ?>
            

        </div>
        <div class="otherVedio">
            <video class="relationplayer" controls>
              <?php
                    echo"<source src=".$vedioLink2." type=video/mp4>";
              ?>
            </video>
            <?php
              echo"<a href=video.php?m=".$try2."> Show more</a>";
            ?>

        </div>
        <div class="otherVedio">
            <video class="relationplayer" controls>
              <?php
                    echo"<source src=".$vedioLink3." type=video/mp4>";
              ?>
            </video>
            <?php
              echo"<a href=video.php?m=".$try3."> Show more</a>";
            ?>

        </div>
  
  
    </div>

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