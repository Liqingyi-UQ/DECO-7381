<?php

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
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/script.js"></script>
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
        &nbsp;<p class=user><a href="choose_area.php">Upload</a></p>
        &nbsp;&nbsp;<p class=user><a href="logout.php">Log out</a></p>
        
      <?php else: ?>
        
        <p class=user><a href="login.php">Log in</a> or <a href="signup.html">sign up</a></p>
        
      <?php endif; ?>
      <!-- add -->

    </ul>
    <img src="https://img.icons8.com/material-outlined/24/000000/menu.png" class="menu-icon"/>
  </nav>

  <section class="modal-container">
    
      <img id="myimage" src="images/index.jpg" alt="??">
      <div id="mymodal" class="modal">
          <span class="close-btn">&times;</span>
          <img id="modal-img" class="modal-content">
          <div id="img-text"></div>
      </div>
  </section>

  <section class="gallery">
    <h3>click on our gallery to look for information about us！</h3>
    <div id="fiterBtn-container">
      <button class="btn active" onclick="filterColumn('all')">show all</button>
    
    </div>

    <div class="row">
      <div class="column scenery">
        <div class="content">
          <img src="images/yueqing.jpg" alt="yueqingxiao">
          <h4>Yueqing Xiao</h4>
          <p>Group Leader, Coordinator, UI designer</p>
          <p>Responsible for recording meeting content and UI design</p>

        </div>
      </div>

      <div class="column scenery">
        <div class="content">
          <img src="images/ningwang.jpg" alt="ningwang">
          <h4>Ning wang</h4>
          <p> UI designer</p>
          <p>Responsible for page design</p>
        
          
        </div>
      </div>

      <div class="column scenery">
        <div class="content">
          <img src="images/yibo.jpg" alt="yibozhang">
          <h4>Yibo Zhang</h4>
          <p> UI designer,Implementer</p>
          <p>Responsible for the construction and maintenance of the video recording page</p>
        </div>
      </div>

      <div class="column visitors">
        <div class="content">
          <img src="images/xinyuan.jpg" alt="xinyuanxu">
          <h4>Xinyuan Xu</h4>
          <p> UI designer,Implementer</p>
          <p>Responsible for the construction and maintenance of the video page.</p>
          <p>Responsible for the exchange of databases and web pages</p>
        </div>
      </div>

      <div class="column visitors">
        <div class="content">
          <img src="images/shengquan.jpg" alt="shengquan">
          <h4>Shengquan Zhang</h4>
          <p>Implementer</p>
          <p>Responsible for the construction and maintenance of the database </p>
          <p>Responsible for the interaction between the web page and the database</p>
        </div>
      </div>

      <div class="column visitors">
        <div class="content">
          <img src="images/qingyi.jpg" alt="qingyiLi">
          <h4>Qingyi Li</h4>
          <p>Implementer</p>
          <p>Responsible for the construction and maintenance of the database and the interaction between the web page and the database</p>
          <p>Responsible for maintenance of server related issues</p>

        </div>
      </div>
    </div>
  </section>



  <!-- contact section -->
  <section class="contact">
    <h2>if you have questions in mind <br> contact us</h2>

    <form action="">
      <input type="email" name="" id="emial-box" placeholder="email@gmail.com" required>
      <input type="submit" value="send" class="btn">

    </form>
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
    <p>&#169; Six pigeons all right reserved</p>
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