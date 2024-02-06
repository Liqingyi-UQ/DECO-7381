<?php
//select the information of the user who is logging now
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
  <title>Choose the Area</title>
  <link rel="stylesheet" href="css/style.css">
  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/choose_area.js"></script>
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
        
        <p><a href="login.php">Log in</a> or <a href="signup.html">sign up</a></p>
        
      <?php endif; ?>
      <!-- add -->
    </ul>
    <img src="https://img.icons8.com/material-outlined/24/000000/menu.png" class="menu-icon"/>
    </nav>

    <div class="choose_area_container">
        
      <div class="choose_area_item_text" >
        <h1>Please choose one topic to upload: </h1>     
      </div>
      
      <div class="choose_area_item_box">

        <button class="area_box" id="AreaBox1">
          <img src="images/index.jpg" alt="??">
          
          <div class="record_content">
            <h3>Common Diseases</h3>
          </div>
        </button>

        <button class="area_box" id="AreaBox2">
          <img src="images/index.jpg" alt="??">
          
          <div class="record_content">
            <h3>Aid</h3>
          </div>
        </button>

        <button class="area_box" id="AreaBox3">
          <img src="images/index.jpg" alt="??">
          
          <div class="record_content">
            <h3>Sports</h3>
          </div>
        </button>

        <button class="area_box" id="AreaBox4">
          <img src="images/index.jpg" alt="??">
          
          <div class="record_content">
            <h3>Food</h3>
          </div>
        </button>
     
      </div>
      <script>
      const menuicon = document.querySelector(".menu-icon")
      const navbar = document.querySelector(".navbar")
      menuicon.addEventListener("click", ()=>{
      navbar.classList.toggle("mobile-menu")
      })
      </script>
      <script src="js/choose_area.js"></script>
</body>
</html>
