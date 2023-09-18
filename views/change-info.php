<?php
session_start();

if(!isset($_SESSION["user_data"])){
   echo "<script> alert('Por favor inicie sesión')</script>";
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
      <div class="back-arrow">
         <img src="/assets/left-arrow.svg" alt="vector" class="arrow">
         <a href="/views/personal_info.php" class="back">Back</a>
      </div>
      <div class="edit-box">
         <div class="edit-profile">
            <div class="text-title">
               <h4 class="title2">Change Info</h4>
               <p class="parrafo7">Changes will be reflected to every services</p>
            </div>
         </div>

         <?php
            $id = $_SESSION["user_data"]["id"];

            require_once($_SERVER["DOCUMENT_ROOT"] . "/controller/database.php");

            $stmnt = $mysqli -> query("SELECT * FROM usuarios WHERE id=$id");
            $result = $stmnt -> fetch_assoc();
         ?>
         <form action="/controller/update.php" method="POST" class="m-3 textarea-boxes">
            <div class="change-photo">
               <input type="number" name="id" hidden value="<?php echo $result["id"]?>"> 
               <img src="" alt="photo-perfil" class="perfil-img">
               <label for="" class="change-label">CHANGE PHOTO</label>
            </div>
            <div class="mb-3">
               <label for="exampleFormControlInput1" class="form-label">Name</label>
               <input type="text" class="form-control name" name="name" id="name" placeholder="Enter your name..." value="<?= $result["nombre"]?>">
            
               <label for="exampleFormControlInput1" class="form-label">Bio</label>
               <input type="text" class="form-control bio" name="bio" id="bio" placeholder="Enter your bio... value="<?= $result["bio"]?>">
            
               <label for="exampleFormControlInput1" class="form-label">Phone</label>
               <input type="text" class="form-control phone" name="phone" id="phone" placeholder="Enter your phone..." value="<?= $result["phone"]?>">
            
               <label for="exampleFormControlInput1" class="form-label">Email</label>
               <input type="email" class="form-control email" name="email" id="email" placeholder="Enter your email..." value="<?= $result["email"]?>">
            
               <label for="exampleFormControlInput1" class="form-label">Password</label>
               <input type="text" class="form-control password" name="contrasena" id="contrasena" placeholder="Enter your password..." value="<?= $result["contrasena"]?>">
            </div>

            <button type="submit" class="btn btn-primary btn-save">Save</button>
         </form>
         <?php
         if(isset($_SESSION["duplicado"])){
            echo "<script> alert('Por favor ingrese otro correo electronico')</script>";
            unset($_SESSION["duplicado"]);
         }
         ?>
      </div>
   </main>
</body>
</html>