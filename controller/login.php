<?php
if($_SERVER["REQUEST_METHOD"] === "POST"){
   $email = $_POST["email"];
   $contrasena = $_POST["contrasena"];

   require_once($_SERVER["DOCUMENT_ROOT"] . "/controller/database.php");

   if($email === ""){
      echo "<script> alert('Por favor ingrese un correo electronico'); </script>";
      echo "<a href='/views/login.php'>Volver</a>";
   }

   $stmnt = $mysqli -> query("SELECT * FROM usuarios WHERE email = '$email'");

   if($stmnt -> num_rows === 1){
      $result = $stmnt -> fetch_assoc();

      if (password_verify($contrasena, $result["contrasena"])) {
         session_start();

         $_SESSION["email"] = $email;
         $_SESSION["contrasena"] = $contrasena;
         header("Location: /views/personal_info.php");
      }else{
         echo "<script> alert('Error de validación de usuario'); </script>";
         // header("Location: /views/login.php");
      }
   }
   
}else{
   echo "Error al emplear POST";
}