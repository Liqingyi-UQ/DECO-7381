<?php
//connect the database and select the information of the user
session_start();

if (isset($_SESSION["user_id"])) {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = "SELECT * FROM user WHERE id = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Six pigeons</title>
  <link rel="stylesheet" href="css/style.css">
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
  
  <header class="header">
    <div class="header-text">    
      <p>The best way <br> for your health learning</p>
      <a href="topics.php" class="btn">Learn more</a>
    </div>
    <div class="header-picture">
        <img src="images/index.jpg">
    </div>
  </header>

  <!-- About section -->
  <section class="about">
    <div class="about-images">
      <img src="images/index.jpg" alt="haha">
    </div>

    <div class="about-text">
      <span>about us</span>
      <h2>We will provide the best service!</h2>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos ratione illo atque ipsum quidem dolorum sunt, incidunt, distinctio doloremque officia qui esse neque quia eaque facilis. Animi asperiores laborum quam.</p>
      <a href="about.php" class="btn">learn more</a>
    </div>
  </section>

  <!-- zone section -->
  <section class="zone">

    <div class="box">
      <h3>Distinguish between incorrect health information</h3>
      
    </div>

    <div class="box">
      <h3>Authoritative certification</h3>
      
    </div>

    <div class="box">
      <h3>enjoy these topics</h3>

    </div>
  </section>

  <footer class="footer">
    <div class="footer-container">
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