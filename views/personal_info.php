<?php
   session_start();

   if(!isset($_SESSION["user_data"])){
      header("Location: /views/login.php");
      die();
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <!-- GOOGLE FONTS -->
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;600&family=Raleway:wght@500;700&display=swap" rel="stylesheet">

   <!-- BOOTSTRAP -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

   <link rel="stylesheet" href="/model/profile.css">
   <title>Authentication-App</title>
</head>
<body>
   <div class="header">
      <img src="/assets/devchallenges.svg" alt="" class="logo-profile">
      <div class="dropdown">
         <img src="" alt="perfil-photo" class="mini-photo">
         <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Dropdown</button>
         <ul class="dropdown-menu">
            <li><img src="/assets/perfil.svg" alt="profile" class="icon-drop"><a class="dropdown-item" type="button">My Profile</a></li>
            <li><img src="/assets/group.svg" alt="group" class="icon-drop"><a class="dropdown-item" type="button">Group Chat</a></li>
            <br>
            <li class="li-exit"><img src="/assets/exit.svg" alt="exit" class="exit"><a href="/index.php" class="dropdown-item" type="button">Logout</a></li>
         </ul>
      </div>
   </div>
   <main class="personal-info">
      <div class="title-profile">
         <h2 class="titulo1">Personal info</h2>
         <p class="parrafo5">Basic info, like your name and photo</p>
      </div>
      
      <?php
      $id = $_SESSION["user_data"]["id"];

      require_once($_SERVER["DOCUMENT_ROOT"] . "/controller/database.php");
      $stmnt = $mysqli -> query("SELECT * FROM usuarios WHERE id='$i'");
      $result = $stmnt -> fetch_assoc();

      $name = ($result["name"] != NULL)? $result["nombre"]:"Add your name";
      $bio = ($result["bio"] != NULL)? $result["bio"]:"Add your name";
      $phone = ($result["phone"] != NULL)? $result["phone"]:"Add your phone";
      $email = ($result["email"] != NULL)? $result["email"]:"Add your email";
      $contrasena = $_SESSION["user_data"]["contrasena"];
      $photo = ($result["photo"] != NULL)? $result["photo"]:"Add a profile photo";

      ?>
      
      <form  action="/controller/edit.php" class="profile-box" method="POST">
         <div class="profile-edit">
            <div class="text-title">
               <h4 class="title4">Profile</h4>
               <p class="parrafo6">Some info may be visible to other people</p>
            </div>
            <a href="change-info.php">
               <button class="btn btn-light" type="button">Edit</button>
            </a>
         </div>
         <div class=" tabla profile-photo">
            <label for="">PHOTO</label>
            <p><?php echo"<p class='useri'> $photo</p>"?></p>
         </div>
         <div class="tabla profile-name">
            <label for="">NAME</label>
            <p><?php echo"<p class='useri'> $name</p>"?></p>
         </div>
         <div class="tabla profile-bio">
            <label for="">BIO</label>
            <p><?php echo"<p class='useri'> $bio</p>"?></p>
         </div>
         <div class="tabla profile-phone">
            <label for="">PHONE</label>
            <p><?php echo"<p class='useri'> $phone</p>"?></p>
         </div>
         <div class="tabla profile-email">
            <label for="">EMAIL</label>
            <p><?php echo"<p class='useri'> $email</p>"?></p>
         </div>
         <div class="tabla profile-password">
            <label for="">PASSWORD</label>
            <p><?php echo"<p class='useri'> $contrasena</p>"?></p>
         </div>
      </form>
   </main>
</body>
</html>