<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
   
   $email= $_POST["email"];
   $contrasena = $_POST["contrasena"];
   $hash = password_hash($contrasena, PASSWORD_DEFAULT);

   require_once($_SERVER["DOCUMENT_ROOT"] . "/controller/database.php");

   if($email === ""){
      echo "<script> alert('Por favor ingrese un correo electronico'); </script>";
      // header("Location: /index.php");
   }

   try {
      $result = $mysqli->query("INSERT INTO usuarios(email, contrasena) VALUES ('$email', '$hash')");
   
      if ($result) {
         session_start();
         
         $_SESSION['email'] = $email;
         $_SESSION['contrasena'] = $contrasena;

         echo "<script> alert('Se ha guardado correctamente el usuario'); </script>";
         header("Location: /views/personal_info.php?email=$email");

      }else{
         echo "<script> alert('Error al guardar el usuario'); </script>";
      }
   } catch (mysqli_sql_exception $e) {
      
      if ($mysqli -> errno === 1062){
         session_start();

         $_SESSION["duplicado"] = "<script> alert('Correo ya existe, favor agregar otro correo'); </script>";
         header("Location: /index.php");

      }else{
         echo "Error: " . $e->getMessage();
      }
   }
}