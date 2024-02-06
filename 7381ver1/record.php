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
  <title>Record Your Video</title>
  <link rel="stylesheet" href="css/style.css">
  <script src="js/require.js"></script>
  <script src="js/record.js"></script>
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
        
        <p><a href="login.php">Log in</a> or <a href="signup.html">sign up</a></p>
        
      <?php endif; ?>
      <?php if((isset($user))&$user["name"]=="Expert"): ?>
          &nbsp;&nbsp;<p class=user><a href="choose_area.php">Upload</a></p>
      <?php endif; ?>
      <!-- add -->
    </ul>
    <img src="https://img.icons8.com/material-outlined/24/000000/menu.png" class="menu-icon"/>
    </nav>

    <div class="videoupload">
        
        

        <video id="player" autoplay></video>
        <div class="mediacontrol" >
            <button id="openMedia" class="btn btn-success btn1">Open Camera</button>
            <button id="startRecord" class="btn btn-success btn1">Start Record</button>
            <button id="playRecord"  class="btn btn-primary btn1">Play</button>
            <button id="downRecord"  class="btn btn-info btn1">Download</button>
            <button id="uploadRecord"  class="btn btn-info btn1"><a href="upload.php">Upload</a></button>
            
        </div>
    
    </div>
    <script>
    const menuicon = document.querySelector(".menu-icon")
    const navbar = document.querySelector(".navbar")
    menuicon.addEventListener("click", ()=>{
    navbar.classList.toggle("mobile-menu")
    })
    </script>
    <script src="js/record.js"></script>
</body>
</html>
