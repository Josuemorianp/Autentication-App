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

   <link rel="stylesheet" href="/model/styles.css">
   <title>Authentication-App</title>
</head>
<body>
   <?php
   session_start();
   
   if (isset($_SESSION["duplicado"])) {
      echo "<script> alert('Correo ya existe, favor agregar otro correo'); </script>";

      unset($_SESSION["duplicado"]);
   }
   ?>

<form action="/controller/create.php" class="m-3" method="POST">
      <img src="/assets/devchallenges.svg" alt="" class="icon-dev">
      <div>
         <p class="parrafo1">Join thousands of learners from
            around the world
         </p>
         <p class="parrafo2">Master web development by making real-life
            proyects. There are multiple paths for you to choose
         </p>
      </div>
      <div class="input">
         <img src="/assets/email.svg" alt="" class="email-icon">
         <input type="email" name="email" id="email" placeholder="Email" class="form-control">
      </div>
      <div class="input">
         <img src="/assets/lock.svg" alt="" class="lock-icon">
         <input class="form-control" type="password" name="contrasena" id="contrasena" placeholder="Password">
      </div>
      
      <button class="btn btn-primary" type="submit">Start codind now</button>
      <p class="parrafo3">or continue wirh these social profile</p>
      <div class="login-icon">
         <img src="/assets/Google.svg" alt="">
         <img src="/assets/Facebook.svg" alt="">
         <img src="/assets/Twitter.svg" alt="">
         <img src="/assets/Gihub.svg" alt="">
      </div>
      <p class="parrafo4">Already a member? <a class="login" href="/views/login.php" >Login</a></p>
   </form>
</body>
</html>