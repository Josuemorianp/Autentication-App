<?php
if ($_SERVER["REQUEST_METHOD"]=== "POST"){

   session_start();
   extract($_POST);
   $id = $_POST["id"];

   require_once($_SERVER["DOCUMENT_ROOT"] . "/controller/database.php");

   $name !== "" && $mysqli -> query("UPDATE usuarios SET nombre='$name' WHERE id='$id'");
   $bio !== "" && $mysqli -> query("UPDATE usuarios SET bio='$bio' WHERE id='$id'");
   $phone !== "" && $mysqli -> query("UPDATE usuarios SET phone='$phone' WHERE id='$id'");
   $email !== "" && $mysqli -> query("UPDATE usuarios SET email='$email' WHERE id='$id'");

   if ($contrasena !== "") {
      $hash = password_hash($contrasena, PASSWORD_DEFAULT);
      $mysqli -> query("UPDATE usuarios SET contrasena='$hash' WHERE id='$id'");
   }

   $stmnt = $mysqli -> query("SELECT * FROM usuarios WHERE id='$id'");
   $_SESSION["user_data"]=$stmnt -> fetch_assoc();

   header("location:/views/personal_info.php");
}
?>