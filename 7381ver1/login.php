<?php

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = sprintf("SELECT * FROM user
                    WHERE email = '%s'",
                   $mysqli->real_escape_string($_POST["email"]));
    
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();

    
    if ($user) {
        
        if (password_verify($_POST["password"], $user["password"])) {
            
            session_start();
            
            session_regenerate_id();
            
            $_SESSION["user_id"] = $user["id"];
            
            header("Location: index.php");
            exit;
        }
    }
    
    $is_invalid = true;
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>login</title>
  <link rel="stylesheet" href="css/style.css">
  <script src="js/script.js"></script>
</head>
<body>
  <header>
    <div class="nav container">
        <a href="index.php" class="logo">anthology</a>

        <a href="signup.html" class="btn">sign up</a>
    </div>
  </header>

  <!-- Login form -->
  <div class="login">
      <div class="login-container">
          <h2>login to continue</h2>
            <?php if ($is_invalid): ?>
                <em>Invalid login</em>
            <?php endif; ?>
    
    <form method="post">
        <label for="email">email</label>
        <input type="email" name="email" id="email" value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">
        
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        
        <button>Log in</button>
    </form>
          <a href="signup.html" class="btn">sign up now</a>
      </div>
  </div>

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
